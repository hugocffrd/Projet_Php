<?php
session_start();

if (isset($_POST['mail']) && isset($_POST['password'])) {
    require 'Connection.php';
    $connect = new Connection("mysql:host=localhost;dbname=dbroot", "root", "");

    $mail = isset($_POST['mail']) ? $_POST['mail'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";

    if ($mail !== "" && $password !== "") {
        $requete = "SELECT count(*) FROM utilisateur where Mail =$mail and Pwd = $password";
        //     $req = $connect->executeQuery($requete, array(
        //         ":Mail" => array($mail, PDO::PARAM_STR),
        //         ":Pwd" => array($password, PDO::PARAM_STR)

        //     ));


        $exec_requete = $connect->executeQuery($requete);
        $reponse = $connect->getResults();
        $count = $reponse['count(*)'];

        if ($count != 0) // nom d'utilisateur et mot de passe correctes
        {
            $_SESSION['Mail'] = $mail;
            header('Location: ../Vues/creerTache.php');
        } else {
            header('Location: ../Vues/connexion.php'); // utilisateur ou mot de passe incorrect
        }
    }
}