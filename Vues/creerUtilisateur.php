<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styleCo.css" media="screen" type="text/css" />
</head>

<body>
    <div id="container">
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
            <label><b>Retapper mot de passe</b></label>
            <input type="password" placeholder="Retapper le mot de passe" name="password_retype" required>
            <input type="submit" id='submit' value='Register'>
        </form>
    </div>
</body>

</html>