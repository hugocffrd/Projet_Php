<?php

require_once 'Connection.php';
require_once 'Utilisateur.php';

class UtilisateurGateway
{
    private $connect;
    public function __construct($dsn,$user,$pwd){
        $this->connect=new Connection($dsn,$user,$pwd);
    }

    public	function insertUtilisateur(Utilisateur $user){
        $query="INSERT INTO utilisateur VALUES(:Mail,:Nom,:Prenom,:Pwd)";
        $this->connect->executeQuery($query,array(
            ":Mail"=>array($user->Mail,PDO::PARAM_STR),
            ":Nom"=>array($user->Nom,PDO::PARAM_STR),
            ":Prenom"=>array($user->Prenom,PDO::PARAM_STR),
            ":Pwd"=>array($user->Pwd,PDO::PARAM_STR)));
    }

    public function findByMail ($Mail):array{

        $query="SELECT * FROM utilisateur WHERE Mail=:Mail";
        $this->connect->executeQuery($query,array(
            ":Mail"=>array($Mail,PDO::PARAM_STR)));
        $results=$this->connect->getResults();
        foreach ($results as $row){
            $tabUtilisateur[]=new Utilisateur($row["Mail"],$row["Nom"],$row["Prenom"],$row["Pwd"]);
        }
        return $tabUtilisateur;

    }



}