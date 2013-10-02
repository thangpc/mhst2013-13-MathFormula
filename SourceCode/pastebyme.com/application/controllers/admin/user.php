<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Admin_Controller {

    public function __construct(){
        parent::__construct();
    }

    /*
        @author: trunghieuhf@gmail.com
        @description: Login account
        @route: admin/login
        @return View
    */
    public function login() {
        
        $this->user_model->loggedin('admin') != 'admin' || redirect('admin/dashboard');
    	$rules = $this->user_model->rules_login_admin;
    	$this->form_validation->set_rules($rules);

    	if ($this->form_validation->run() == TRUE) {
    		if ($this->user_model->loginAdmin() == TRUE) {

                redirect('admin');
            }
            else {
                $this->session->set_flashdata('error', 'Access denied!');
                redirect('admin/login', 'refresh');
            }
    	}
        $this->data['title_page'] = 'Login';
        $this->load->view('admin/user/login', $this->data);
    }

    /*
        @author: trunghieuhf@gmail.com
        @description: Logout user
        @route: admin/logout
        @return View
    */
    public function logout(){
        $this->user_model->logout('admin');
        redirect('admin/user/login');
    }

    /*
        @author: trunghieuhf@gmail.com
        @description: list all users and permissions
        @route: admin/user/
        @return View
    */
    public function index($keyword ='',$page = 1) {

        $this->user_model->loggedin('user') != 'admin' || redirect('home', 'refresh');
        $this->data['admin'] = $this->session->userdata('admin');
        $this->load->library('pagination');
        $this->load->helper('pagination');
        $limit = ($page - 1) * 8;
        if ($this->input->get('keyword')) {            
            $keyword = $this->input->get('keyword');
            $sql = "SELECT * FROM users WHERE username LIKE '%" . $keyword . "%' LIMIT " .$limit . ",8";            
            $q = $this->db->query($sql);
            $total_rows = 0;
            if($q->num_rows() > 0) { 
                $total_rows = $q->num_rows();
                foreach($q->result() as $row) {
                        $user[] = $row;                
                }
            } else $user = null;
        } else {
            $keyword = "";
            $total_rows = count($this->user_model->get());
            $user = $this->user_model->get(NULL, FALSE, 8, $limit);
        }
        $this->data['keyword'] = $keyword;
        if ($user == null) {
            $users = array();
        } else {
            if ($keyword != "")
                $config = pagination(site_url("admin/user/$keyword"), $total_rows, 8, $page, 4);
            else
                $config = pagination(site_url("admin/user/all"), $total_rows, 8, $page, 4);            
            $this->pagination->initialize($config);
            $this->data['pages'] = array();
            $this->data['pages'] = $this->pagination->create_links();

            foreach ($user as $key => $val) {
                $t['u_id'] = alphaID($val->user_id);
                $t['username'] = $val->username;
                $t['is_active'] = $val->is_active;
                $t['role'] = $val->role;
                $t['time_created'] = date('d-m-Y',$val->time_created);
                
                $users[] = $t;
            }
        }
        $this->data['users'] = $users;
        $this->data['title_page'] = "List user registed";
        $this->data['content_view'] = 'user/list';
        $this->load->view('admin/_layout', $this->data);
    }

    /*
        @author: trunghieuhf@gmail.com
        @description: delete user
        @route: admin/user/delete-user
        @return JSON
    */
    public function delete() {

        $this->user_model->loggedin('user') != 'admin' || redirect('home', 'refresh');

        $aid = $this->input->post('aid');
        $id = alphaID($aid, TRUE);
        $ok = $this->user_model->delete($id);
        if ($ok) {
            $data['status'] = 'success';            
        } else {
            $data['status'] = 'failed';
            $data['message'] = 'Connection db err.';
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('data' => $data)));
    }

    /*
        @author: trunghieuhf@gmail.com
        @description: block user
        @route: admin/user/block-user
        @return JSON
    */
    public function block() {

        $this->user_model->loggedin('user') != 'admin' || redirect('home', 'refresh');
        $aid = $this->input->post('aid');
        $id = alphaID($aid, TRUE);
        $user = $this->user_model->get($id);        
        $data = array('is_active' => (int)(1 - (int)$user->is_active));        
        //var_dump($data);die;
        $ok = $this->user_model->save($data, $id);
        if ($ok) {
            $data['status'] = 'success';            
        } else {
            $data['status'] = 'failed';
            $data['message'] = 'Connection db err.';
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('data' => $data)));
    }

    /*
        @author: trunghieuhf@gmail.com
        @description: set user to admin permission
        @route: admin/user/set-admin
        @return JSON
    */
    public function setAdmin() {

        $this->user_model->loggedin('user') != 'admin' || redirect('home', 'refresh');
        $aid = $this->input->post('aid');
        $id = alphaID($aid, TRUE);
        $user = $this->user_model->get($id);
        if ($user->role == "user") $role = "admin";
        else $role = "user";
        $data = array('role' => $role);
        
        $ok = $this->user_model->save($data, $id);
        if ($ok) {
            $data['status'] = 'success';            
        } else {
            $data['status'] = 'failed';
            $data['message'] = 'Connection db err.';
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('data' => $data)));
    }

    /*
        @author: trunghieuhf@gmail.com
        @description: change password
        @route: /change-pass
        @return View
    */
    public function changePass() {

        $this->user_model->loggedin('user') == 'public' || redirect('home', 'refresh');
        $this->data['title_page'] = "Change Password";
        $this->data['col_left'] = $this->load->view('account/col_left', $this->data, TRUE);
        $this->data['content_view'] = 'account/changePass';
        $this->load->view('_layout', $this->data);
    }
}