<?php
$dbh = db();
$sql = "SELECT * FROM category ORDER BY category";
$stmt = $dbh -> prepare($sql);
$stmt ->execute();
$categories = $stmt->fetchAll();
?>

<main class="container">
    <section id="addsite">
        <div class="row">
            <div class="col-md-8 offset-2">
                <h2 class="display-5">Insérez un bluray</h2>
                <form action="src/addbluray.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name" class="form-label">Nom du bluray</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="category" class="form-label">Choisissez la categorie</label>
                        <select name="category" id="category" class="form-control">
                            <option value="">Choisissez...</option>
                            <?php foreach($categories as $category): ?>
                            <option value="<?= $category->id ?>"><?= $category->category ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="release_date" class="form-label">Date de réalisation</label>
                        <input class="form-control" id="release_date" name="release_date" type="date" value="2000-03-22">
                    </div>
                    <div class="form-group">
                        <label for="note" class="form-label">Evaluez le bluray</label>
                        <select name="note" id="note" class="form-control">
                        <option value="">Choisissez...</i></option>
                        <?php for($i = 1;$i <= 5; $i++): ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price" class="form-label">Indiquez le prix</label>
                        <input type="number" class="form-control" name="price" id="price" min="1" max="30">
                    </div>
                    <div class="form-group">
                        <label for="description" id="description" class="form-label">Ajoutez une description</label>
                        <textarea id="description" name="description" class="form-control"></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary" value="ajouter">
                </form>
            </div>
        </div>
    </section>

</main>
