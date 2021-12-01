
<!DOCTYPE html>


<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="styleCo.css" media="screen" type="text/css" />
</head>

<body>
    <div id="container">

        <form action="verification.php" method="POST">
            <h1>Connexion</h1>

            <label><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>

            <input type="submit" id='submit' value='LOGIN'>
        </form>
    </div>
</body>

</html>