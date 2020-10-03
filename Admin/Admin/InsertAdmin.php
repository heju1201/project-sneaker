
<?php 
require_once('../../lib/database.php');
require_once('../../lib/initialize.php');

        $admin = [];
        $admin['name'] = $_POST['name'];
        $admin['password'] = $_POST['password'];
        $admin['phone'] = $_POST['phone'];
        $admin['email'] = $_POST['email'];
        $result = InsertAdmin($admin);
        redirect_to('../Admin.php?Key=Admin');
        ?>