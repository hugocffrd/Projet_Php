<?php
require_once '../ConnectBDD/ConnectBDD.php';
require_once "../Modele/ListeTache.php";
require_once '../Modele/ListeTacheGateway.php';
require_once "../Modele/Tache.php";
require_once '../Modele/TacheGateway.php';

$con = new ConnectBDD();
$connect = $con->getConnect();
$LTgateway = new ListeTacheGateway($connect);
$nom = htmlspecialchars (($_POST['idListe']));