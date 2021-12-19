<?php
session_start();
if (!$_SESSION['login']) header('location:index.php');
require 'functions/connect.php';
require 'includes/header_admin.php';
$dbh = db();
if(isset($_GET['action'])){
    if ($_GET['action']=='addbluray'){
        require 'forms/addbluray.php';
    } elseif ($_GET['action']=='editbluray'){
        require 'forms/editbluray.php';
    } elseif ($_GET['action']=='adduser'){
        require 'forms/adduser.php';
    }
} else{
    require 'includes/admin_table.php';
}

require_once 'includes/footer.php';
?>
