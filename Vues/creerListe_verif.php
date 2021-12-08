<?php
require_once "../Modele/ListeTache.php";
require_once '../Modele/ListeTacheGateway.php';

if (isset($_POST['nom'])){

    $LTgateway = new ListeTacheGateway("mysql:host=localhost;dbname=dbroot", "root", "");

    $nom = isset($_POST['nom']);

    $nbid = 0;

    //Pour connaitre le nombre de listes totales
    $connect = new Connection("mysql:host=localhost;dbname=dbroot", "root", "");
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
            $NewListe = new ListeTache($id, $nom, 0,NULL );
            $LTgateway->insertListe($NewListe);
            header('Location: creerListe.php');
        } else header('Location: creerListe.php?reg_err=nom)');
    } else header('Location: creerListe.php?reg_err=already');
} else header('Location: CreerListe.php?reg_err=ErreurListe');

