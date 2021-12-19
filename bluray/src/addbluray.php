
<?php

require_once '../functions/connect.php';
$dbh = db();
$sql = "INSERT INTO bluray (name, cat_id, price, release_date, note, cover, description)
        VALUES (:name, :category, :price, :release_date, :note, :cover, :description)";
$stmt = $dbh->prepare($sql);
$stmt->bindValue('name', $_POST['name'], PDO::PARAM_STR);
$stmt->bindValue('category', $_POST['category'], PDO::PARAM_INT);
$stmt->bindValue('price', $_POST['price'], PDO::PARAM_STR);
$stmt->bindValue('release_date', $_POST['release_date'], PDO::PARAM_STR);
$stmt->bindValue('note', $_POST['note'], PDO::PARAM_INT);
$stmt->bindValue('cover', 'default.png', PDO::PARAM_STR);
$stmt->bindValue('description', $_POST['description'], PDO::PARAM_STR);
$stmt->execute();
header('location:../admin.php');
