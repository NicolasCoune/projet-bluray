<main class="container">
    <section id="insert">
        <div class="row">
            <div class="col-md-8 offset-2">
                <h2 class="display-4 my-3">Insertion d'un utilisateur</h2>
                <form action="src/adduser.php" method="post">
                    <div class="form-group">
                        <label for="firstname">Prénom de l'utilisateur</label>
                        <input type="text" id="firstname" name="firstname" placeholder="Prénom" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="lastname">Nom de l'utilisateur</label>
                        <input type="text" id="lastname" name="lastname" placeholder="Nom" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="login">Login de l'utilisateur</label>
                        <input type="text" id="login" name="login" placeholder="Login" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Password de l'utilisateur</label>
                        <input type="password" id="password" name="password" placeholder="Password" required class="form-control">
                    </div>
                    <input type="submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </section>
</main>