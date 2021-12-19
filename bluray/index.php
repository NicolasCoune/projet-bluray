<?php

require 'includes/header.php';
if(!isset($_GET['cat'])) {
    $sql = "SELECT b.id, b.name, b.description, b.note, b.price, b.cover,  c.category
        FROM bluray b 
        LEFT JOIN category c
        ON b.cat_id = c.id
        ORDER BY name";
    $stmt = $dbh->prepare($sql);
} else {
    $sql = "SELECT b.id, b.name, b.price, b.note,b.description, b.cover,  c.category
        FROM bluray b
        LEFT JOIN category c
        ON b.cat_id = c.id
        WHERE b.cat_id = :cat
        ORDER BY name";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue('cat', $_GET['cat'], PDO::PARAM_INT);
}
$stmt->execute();
$movies = $stmt->fetchAll();
?>
    <main class="container">
        <section id="listing">
            <h2 class="display-5 my-4">Liste des Blurays</h2>
            <h3><?= count($movies) ?></h3>
            <div class="row">
                <div class="col-md-12">
                    <?php if($movies) :?>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Cover</th>
                                <th>Nom du film</th>
                                <th>Description</th>
                                <th> Evaluations</th>
                                <th>Prix</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($movies as $movie) : ?>
                                <tr>
                                    <td><img src="img/covers/<?= $movie->cover ?>" alt="<?= $movie->name ?>"></td>
                                    <td><a href="detail.php?id=<?= $movie->id ?>"><?= $movie->name ?></a></td>
                                    <td><p><small class="text-muted"><?= $movie->description ?></small></p></td>

                                    <td><?= stars($movie->note) ?></td>
                                    <td><?= $movie->price ?>€</td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <h5 class="text-muted">Aucun site pour cette catégorie</h5>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>




<?php
require_once 'includes/footer.php';
