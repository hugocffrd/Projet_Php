<?php
session_start();
require '../Modele/Connection.php';
// si la session existe pas soit si l'on est pas connecté on redirige
if (!isset($_SESSION['user'])) {
    header('Location:connexion.php');
    die();
}

// On récupere les données de l'utilisateur
$bdd = new Connection("mysql:host=localhost;dbname=dbroot", "root", "");
$req = $bdd->prepare('SELECT * FROM utilisateur WHERE Nom = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();

?>
<!doctype html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="text-center">
        <h1 class="p-5">Bonjour <?php echo $data['Prenom'];
                                echo " ";
                                echo $data['Nom'];
                                ?> !</h1>
        <hr />

        <a href="deconnexion.php" class="btn btn-danger btn-lg">Déconnexion</a>
    </div>

</body>
<style>
    body {
        background: #90cbff;
    }
</style>

</html>