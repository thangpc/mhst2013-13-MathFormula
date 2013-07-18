<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Đăng nhập hệ thống</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="author" href="humans.txt">
        <style>
            body {
                background: 
                #7f9b4e url(<?php echo base_url(); ?>public/backend/images/bg3.jpg) no-repeat center top;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                background-size: cover;
            }
            #admin_area {
                margin: 0 auto;
                width: 300px;
                text-align: center;
            }
            form {
                width: 200px;
                margin: 10px auto 30px;
                padding: 10px;
                position: relative;
                font-family: 'Raleway', 'Lato', Arial, sans-serif;
                color: #333;
                text-shadow: 0 2px 1px 
                rgba(0,0,0,0.3);
            }
            input[type="text"], input[type="password"] {
                width: 180px;
                padding: 8px 4px 8px 10px;
                margin-bottom: 15px;
                border: 1px solid 
                #4e3043;
                border: 1px solid 
                rgba(78,48,67, 0.8);
                background: 
                rgba(0,0,0,0.15);
                border-radius: 2px;
                box-shadow: 0 1px 0 rgba(255,255,255,0.2), inset 0 1px 1px rgba(0,0,0,0.1);
                -webkit-transition: all 0.3s ease-out;
                -moz-transition: all 0.3s ease-out;
                -ms-transition: all 0.3s ease-out;
                -o-transition: all 0.3s ease-out;
                transition: all 0.3s ease-out;
                font-family: 'Raleway', 'Lato', Arial, sans-serif;
                color: 
                #fff;
                font-size: 13px;
            }
            input[type="submit"] {
                width: 100%;
                padding: 8px 5px;
                background: #634056;
                background: -moz-linear-gradient(
                rgba(99,64,86,0.5), 
                rgba(76,49,65,0.7));
                background: -ms-linear-gradient(
                rgba(99,64,86,0.5), 
                rgba(76,49,65,0.7));
                background: -o-linear-gradient(
                rgba(99,64,86,0.5), 
                rgba(76,49,65,0.7));
                background: -webkit-gradient(linear, 0 0, 0 100%, from(
                rgba(99,64,86,0.5)), to(
                rgba(76,49,65,0.7)));
                background: -webkit-linear-gradient(
                rgba(99,64,86,0.5), 
                rgba(76,49,65,0.7));
                background: linear-gradient(
                rgba(99,64,86,0.5), 
                rgba(76,49,65,0.7));
                border-radius: 5px;
                border: 1px solid #4e3043;
                box-shadow: inset 0 1px rgba(255,255,255,0.4), 0 2px 1px rgba(0,0,0,0.1);
                cursor: pointer;
                -webkit-transition: all 0.3s ease-out;
                -moz-transition: all 0.3s ease-out;
                -ms-transition: all 0.3s ease-out;
                -o-transition: all 0.3s ease-out;
                transition: all 0.3s ease-out;
                color: white;
                text-shadow: 0 1px 0 
                rgba(0,0,0,0.3);
                font-size: 16px;
                font-weight: bold;
                font-family: 'Raleway', 'Lato', Arial, sans-serif;
            }
        </style>
    </head>
    <body>
        <div id="admin_area">
            <h1> Login Administrator </h1>
            <?php echo form_open('admin/login'); ?>
            <p>
               <?php 
                  echo form_label('Username: ', 'username');
                  echo form_input('username', set_value('username'), 'id="username" autofocus');
               ?>
            </p>

            <p>
               <?php 
                  echo form_label('Password:', 'password');
                  echo form_password('password', '', 'id="password"');
               ?>
            </p>

            <p>
               <?php echo form_submit('submit', 'Login'); ?>
            </p>
            <?php echo form_close(); ?>

            <?php echo validation_errors(); ?>
        </div>
    </body>
</html>
