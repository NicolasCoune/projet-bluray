<?php
session_start();
require_once '../functions/connect.php';
$dbh= db();
$sql = "SELECT * FROM users WHERE login = :login";
$stmt = $dbh->prepare($sql);
$stmt->bindValue('login', $_POST['login'], PDO::PARAM_STR);
$stmt->execute();
$user = $stmt->fetch();
// var_dump($user);
if ($user) {
    if (password_verify($_POST['password'], $user->password)){

        $_SESSION['login'] = $user->first_name.' '. $user->last_name;
        header('location:../admin.php');
    } else{
        header('location:../login.php');
    }
} else {
        header('location:../index.php');
}
