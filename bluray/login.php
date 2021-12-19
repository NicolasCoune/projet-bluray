<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<main class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3>Please Sign In</h3>
            <form action="src/login.php" method="post">
                <div class="form-group">
                    <label for="login">Votre login</label>
                    <input type="text" id="login" name="login" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Votre password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Sign In</button>
                </div>
            </form>
        </div>
    </div>
</main>
</body>
</html>