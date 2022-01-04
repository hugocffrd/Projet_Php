<?php
require_once '../ConnectBDD/ConnectBDD.php';
require_once "../Modele/ListeTache.php";
require_once '../Modele/ListeTacheGateway.php';

if (isset($_GET['action'])) {
    $Mail = $_GET['action'];
}
if (isset($_POST['nom'])) {


    $con = new ConnectBDD();
    $connect = $con->getConnect();
    $LTgateway = new ListeTacheGateway($connect);
    $nom = htmlspecialchars(($_POST['nom']));
    $nbid = 0;

    //Pour connaitre le nombre de listes totales
    $check = $connect->prepare('SELECT IdL from listetache');
    $check->execute(array($nbid));
    $Nbrow = $check->rowCount();

    //Pour savoir si une liste avec le même nom existe
    $check = $connect->prepare('SELECT Nom from listetache WHERE Nom = ?');
    $check->execute(array($nom));
    $row = $check->rowCount();

    // si il n'y a aucune liste alors on créer l'id 0
    if ($Nbrow == 0) {
        $id = 0;
    } else {
        $id = $Nbrow + 1; // Créer une id pour la tâche que l'on créer
    }

    if ($row == 0) {
        if (strlen($nom) <= 100) {
            $NewListe = new ListeTache($id, $nom, 1, $Mail); // on met privée à 1 pour indiquer que c'est une liste privée
            $LTgateway->insertListe($NewListe);
            header('Location:accueilco.php');
        } else header('Location:creerListe.php?reg_err=nom)');
    } else header('Location:creerListe.php?reg_err=already');
} else header('Location:creerListe.php?reg_err=ErreurListe');
