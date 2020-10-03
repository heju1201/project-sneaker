<?php 
require_once('../../lib/database.php');
require_once('../../lib/initialize.php');

            $admin = $_POST['idadmin'];
            DeleteAdmin($admin);
            redirect_to('../Admin.php?Key=Admin');
        ?>