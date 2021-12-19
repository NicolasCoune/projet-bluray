<?php
$sql = "SELECT b.id, b.name, b.description, b.note, b.price, b.cover,  c.category
FROM bluray b
LEFT JOIN category c
ON b.cat_id = c.id
ORDER BY name";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$movies = $stmt->fetchAll();
?>

<main class="container">
    <section id="listing">
        <h2 class="display-5 my-4">Liste des Blurays</h2>
        <a href="?action=addbluray"<i class="bi bi-plus-circle"></i></a>
        <h3><?= count($movies) ?></h3>
        <div class="row">
            <div class="col-md-12">
                <?php if($movies) :?>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Cover</th>
                            <th>Nom du film</th>
                            <th>Catégorie du film</th>
                            <th>Description</th>
                            <th> Evaluations</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($movies as $movie) : ?>
                            <tr>
                                <td><img src="img/covers/<?= $movie->cover ?>" alt="<?= $movie->name ?>"></td>
                                <td><?= $movie->name ?></td>
                                <td><?= $movie->category?></td>
                                <td><p><small class="text-muted"><?= $movie->description ?></small></p></td>
                                <td><?= stars($movie->note) ?></td>
                                <td><a href="src/delbluray.php?id=<?= $movie->id ?>"onclick="return confirm('Est-ce votre ultime bafouille?')"<i class="bi bi-trash"></i></a></td>
                                <td><a href="?action=editbluray&id=<?= $movie->id?>" <i class="bi bi-pencil"></i></a></td>

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