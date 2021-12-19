<?php
require_once '../functions/connect.php';
$dbh = db();
$sql = "UPDATE bluray SET name = :name, cat_id = :category, price = :price, release_date = :release_date, note = :note, cover = :cover, description = :description
WHERE id = :id";
$stmt = $dbh->prepare($sql);
$stmt->bindValue('id', $_POST['id'], PDO::PARAM_INT);
$stmt->bindValue('name', $_POST['name'], PDO::PARAM_STR);
$stmt->bindValue('category', $_POST['category'], PDO::PARAM_INT);
$stmt->bindValue('price', $_POST['price'], PDO::PARAM_STR);
$stmt->bindValue('release_date', $_POST['release_date'], PDO::PARAM_STR);
$stmt->bindValue('note', $_POST['note'], PDO::PARAM_INT);
$stmt->bindValue('cover', 'default.png', PDO::PARAM_STR);
$stmt->bindValue('description', $_POST['description'], PDO::PARAM_STR);
$stmt->execute();
header('location:../admin.php');