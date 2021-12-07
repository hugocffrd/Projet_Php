<?php
require_once "../Modele/Tache.php";
require_once '../Modele/TacheGateway.php';

if (isset($_POST['nom']) && $_POST['desc'] && $_POST['date']) {

    $Tgateway = new TacheGateway("mysql:host=localhost;dbname=dbroot", "root", "");

    $nom = isset($_POST['nom']);
    $desc = isset($_POST['desc']);
    $date = isset($_POST['date']);

    $idl = 0; // 0 pour public de base

    $connect = new Connection("mysql:host=localhost;dbname=dbroot", "root", "");
    $check = $connect->prepare('SELECT IdT, Nom, Texte,DateFin,IdL from tache where Nom = ?');
    $check->execute(array($nom));
    $data = $check->fetch();
    $row = $check->rowCount();

    $id = $row['IdT'] + 1;


    $tacheCreer = new Tache($id, $nom, $desc, $date, $idl);
    $Tgateway->insertTache($tacheCreer);

    header('Location : CreerTache.php');
} else {
    header('Location : CreerTache.php?reg_err=ErreurTache');
}
