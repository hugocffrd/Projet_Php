<?php
require_once "../Modele/Tache.php";
require_once '../Modele/TacheGateway.php';

if (isset($_POST['nom']) && $_POST['desc']) {

    $Tgateway = new TacheGateway("mysql:host=localhost;dbname=dbroot", "root", "");

    $nom = isset($_POST['nom']);
    $desc = isset($_POST['desc']);

    if (isset($_POST['dateF'])) {
        $date = isset($_POST['dateF']);
    }

    $nbid = 0;
    $idl = 0; // 0 pour public de base

    //Pour connaitre le nombre de tâches totales
    $connect = new Connection("mysql:host=localhost;dbname=dbroot", "root", "");
    $check = $connect->prepare('SELECT IdT from tache');
    $check->execute(array($nbid));
    $Nbrow = $check->rowCount();

    //Pour savoir si une tâche avec le même nom existe
    $check = $connect->prepare('SELECT Nom from tache WHERE Nom = ?');
    $check->execute(array($nom));
    $row = $check->rowCount();

    $id = $Nbrow['IdT'] + 1; // Créer une id pour la tâche que l'on créer

    if ($row == 0) {
        if (strlen($nom) <= 100) {
            $tacheCreer = new Tache($id, $nom, $desc, null, $idl);
            $Tgateway->insertTache($tacheCreer);
            header('Location : CreerTache.php');
        } else header('Location: CreerTache.php?reg_err=nom)');
    } else header('Location: CreerTache.php?reg_err=already');
} else header('Location : CreerTache.php?reg_err=ErreurTache');
