<?php
require_once '../functions/connect.php';
$dbh=db();
$sql = "DELETE FROM bluray WHERE id = :id";
$stmt=$dbh->prepare($sql);
$stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$stmt->execute();
header('location:../admin.php');