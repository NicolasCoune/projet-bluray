<?php
$sql = "SELECT b.id, b.name, b.description, b.note, b.release_date, b.price, b.cover,  c.category, c.id AS idcat
FROM bluray b
LEFT JOIN category c
ON b.cat_id = c.id
WHERE b.id = :id";
$stmt=$dbh->prepare($sql);
$stmt->bindValue('id', $_GET['id'], PDO::PARAM_INT);
$stmt ->execute();
$movie = $stmt->fetch();

$sql = "SELECT * FROM category ORDER BY category";
$stmt = $dbh -> prepare($sql);
$stmt ->execute();
$categories = $stmt->fetchAll();
?>

<main class="container">
    <section id="editbluray">
        <div class="row">
            <div class="col-md-8 offset-2">
                <h2 class="display-5">Modifier un bluray</h2>
                <form action="../src/editbluray.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name" class="form-label">Nom du bluray</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $movie->name ?>">
                    </div>

                    <div class="form-group">
                        <label for="category" class="form-label">Choisissez la categorie</label>
                        <select name="category" id="category" class="form-control">
                            <option value=""><?= $movie->category ?></option>
                            <?php foreach($categories as $category): ?>
                                <option value="<?= $category->id ?>"><?= $category->category ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="release_date" class="form-label">Date de réalisation</label>
                        <input class="form-control" id="release_date" name="release_date" type="date" value="<?= $movie->release_date?>">
                    </div>
                    <div class="form-group">
                        <label for="note" class="form-label">Evaluez le bluray</label>
                        <select name="note" id="note" class="form-control">
                            <option value=""><?= $movie->note ?></i></option>
                            <?php for($i = 1;$i <= 5; $i++): ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price" class="form-label">Indiquez le prix</label>
                        <input type="number" class="form-control" name="price" id="price" min="1" max="30" value="<?= $movie->price ?>">
                    </div>
                    <div class="form-group">
                        <label for="description" id="description" class="form-label">Ajoutez une description</label>
                        <textarea id="description" name="description" class="form-control"><?= $movie->description ?></textarea>
                    </div>
                    <input type="hidden" value="<?=$movie->id ?>" name="id">
                    <input type="submit" class="btn btn-primary" >
                </form>
            </div>
        </div>
    </section>

</main>
