<?php
function db(): object
{
    $dsn = 'mysql:dbname=bluray; host=localhost; charset=utf8;port=3308';
    $user = 'root';
    $password = '';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ];

    try {
        $dbh = new PDO($dsn, $user, $password, $options);
    } catch (Exception $e) {
        die('Erreur de connexion: ' . $e->getMessage());
    }
    return $dbh;
}
function stars(int $eval): void
{
    for ($i = 1; $i <= $eval; $i++) {
        echo '<i class="bi bi-star-fill text-success"></i>';
    }
    // echo $i;
    for (; $i <= 5; $i++) {
        echo '<i class="bi bi-star-fill text-danger"></i>';
    }
}
