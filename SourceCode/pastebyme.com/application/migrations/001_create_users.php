<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_users extends CI_Migration {

	public function up() {

		$this->dbforge->add_field(array(
			'user_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'username' => array(
				'type' => 'VARCHAR',
				'constraint' => '25'
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '100'
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => '100'
			),
			'fullname' => array(
				'type' => 'VARCHAR',
				'constraint' => '100'
			),
			'oauth_id' => array(
				'type' => 'INT',
				'constraint' => '11'
			),
			'date_created' => array(
				'type' => 'VARCHAR',
				'constraint' => '50'
			),
			'role' => array(
				'type' => 'INT',
				'constraint' => '1'
			),
			'is_active' => array(
				'type' => 'INT',
				'constraint' => '1'
			),
		));
		$this->dbforge->add_key('user_id', TRUE);
		$this->dbforge->create_table('users');
	}

	public function down() {

		$this->dbforge->drop_table('users');
	}
}