
<?php
require_once 'includes/header.php';

$sql = "SELECT b.name, b.release_date, b.note, b.description, b.cover, c.id
        FROM bluray b
        LEFT JOIN category c
        ON b.cat_id = c.id
        WHERE b.id = :id";
$stmt = $dbh->prepare($sql);
$stmt->bindValue('id', $_GET['id'], PDO::PARAM_INT);
$stmt->execute();
$movie = $stmt->fetch();
?>
<main class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="img/covers/<?= $movie->cover ?>" alt="..." class="img-fluid">
                    </div>
                    <div class="col-md-8 px-5">
                        <div class="card-body">
                            <h3 class="card-title"><?= $movie->name ?></h3>
                            <p class="card-text"><?= stars($movie->note) ?></p>
                            <p class="card-text"><small class="text-muted"><?= $movie->description ?></small></p>
                            <a href="index.php" class="btn btn-outline-primary">Retour à la liste</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
require_once 'includes/footer.php';