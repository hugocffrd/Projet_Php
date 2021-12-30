<?php
session_start();
require_once '../ConnectBDD/ConnectBDD.php';
require_once '../Modele/TacheGateway.php';
require_once '../Modele/ListeTacheGateway.php';


// si la session existe pas soit si l'on est pas connecté on redirige
if (!isset($_SESSION['user'])) {
    header('Location:connexion.php');
    die();
}
$con = new ConnectBDD();
$connect = $con->getConnect();
// On récupere les données de l'utilisateur
$req = $connect->prepare('SELECT * FROM utilisateur WHERE Nom = ?');
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


        <a href="creerTache.php" class="btn btn-primary btn-lg">Creer une tâche</a>
        <a href="deconnexion.php" class="btn btn-danger btn-lg">Déconnexion</a>
    </div>

    <?php
    require_once '../Modele/TacheGateway.php';
    require_once '../Modele/ListeTacheGateway.php';
    $Tgateway = new TacheGateway("mysql:host=localhost;dbname=dbroot", "root", "");
    $LTgateway = new ListeTacheGateway("mysql:host=localhost;dbname=dbroot", "root", "");
    $tabFindListeTache[] = $LTgateway->findAll();
    ?>
    <div class="text-center">
        <select class="form-select form-select-lg mb-3">
            <option selected="selected">Sélectionner une liste</option>
            <?php


            // Parcourir le tableau des langues
            foreach ($tabFindListeTache as $tabL) {
                foreach ($tabL as $liste) {
                    if ($liste->getPrivee() == true) {
                        if ($liste->getMailU() == $data['Mail']) {
            ?>
                            <option value="<?php echo $liste->getNom(); ?>"><?php echo $liste->getNom(); ?></option>
            <?php
                        }
                    }
                }
            }
            ?>
        </select>
    </div>
</body>

<style>
    body {
        background: #90cbff;
    }
</style>

</html>