<!DOCTYPE html>


<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        <form action="../Modele/Authentification.php" method="post">
            <h1>Connexion</h1>

            <label><b>Adresse email</b></label>
            <input type="text" placeholder="Entrer votre email" name="mail" required>

            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>

            <input type="submit">
            <p class="text-center"><a href="creerUtilisateur.php">Inscription</a></p>

        </form>

    </div>
</body>

<style>
    body {
        background: #90cbff;
    }

    #container {
        width: 400px;
        margin: 0 auto;
        margin-top: 10%;
    }

    form {
        width: 100%;
        padding: 30px;
        border: 1px solid #f1f1f1;
        background: #fff;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }

    #container h1 {
        align-self: center;
        width: fit-content;
        margin: 0 auto;
        padding-bottom: 10px;
    }

    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    input[type=mail],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    input[type=number],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    input[type=submit] {
        background-color: #fea347;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    input[type=submit]:hover {
        background-color: white;
        color: #fea347;
        border: 1px solid #fea347;
    }
</style>

</html>