<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container-sm">
        <?php
        if (isset($_GET['reg_err'])) {
            $err = htmlspecialchars($_GET['reg_err']);

            switch ($err) {
                case 'success':
        ?>
                    <div class="alert alert-sucess">
                        <strong>Succès </strong>Inscription réussie !
                    </div>
                <?php
                    break;
                case 'password':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur </strong>Les mots de passes ne corespondent pas !
                    </div>
                <?php
                    break;
                case 'mail':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur </strong>Adresse mail non valide
                    </div>
                <?php
                    break;
                case 'mail_lenght':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur </strong>L'adresse mail fournis est trop longue
                    </div>
                <?php
                    break;
                case 'prenom_lenght':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur </strong> Le prenom donné est trop long
                    </div>
                <?php
                    break;

                case 'nom_Lenght':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur </strong>Le nom donné est trop long
                    </div>
                <?php
                    break;
                case 'already':
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur </strong>Compte déja existant
                    </div>
        <?php
            }
        }
        ?>
        <form action="inscription_verif.php" method="POST">
            <h1>Inscription</h1>


            <label><b>Adresse mail</b></label>
            <input type="mail" placeholder="Entrer l'adresse mail" name="mail" required>

            <label><b>Nom</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="nom" required>

            <label><b>Prénom</b></label>
            <input type="text" placeholder="Entrer le prénom d'utilisateur" name="prenom" required>

            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>
            <label><b>Confirmer le mot de passe</b></label>
            <input type="password" placeholder="Retapper le mot de passe" name="password_retype" required>
            <input type="submit" id='submit' value="S'inscrire">
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
        background-color: #53af57;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    input[type=submit]:hover {
        background-color: white;
        color: #53af57;
        border: 1px solid #53af57;
    }
</style>

</html>