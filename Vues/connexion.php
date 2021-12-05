<!DOCTYPE html>


<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="styleCo.css" media="screen" type="text/css" />
</head>

<body>
    <div id="container">
        <?php
        if (isset($_GET['login_err'])) {
            $err = htmlspecialchars($_GET['login_err']);

            switch ($err) {
                case 'password':
        ?>
                    <div class="alert alert-danger">
                        <strong>Erreur </strong>mot de passe incorrect
                    </div>
                <?php
                    break;

                case 'mail':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur </strong>adresse mail incorrect
                    </div>
                <?php
                    break;

                case 'already':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur </strong> compte non existant
                    </div>

        <?php
                    break;
            }
        }
        ?>
        <form action="Authentification.php" method="post">
            <h1>Connexion</h1>

            <label><b>Adresse email</b></label>
            <input type="text" placeholder="Entrer votre email" name="mail" required>

            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>

            <input type="submit">
        </form>
    </div>
</body>

</html>