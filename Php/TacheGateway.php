<?php

require_once 'Connection.php';
require_once  'Tache.php';

class TacheGateway
{
    private $connect;


        public function __contruct($dsn,$user,$pwd){
        $this->connect=new Connection($dsn,$user,$pwd);
        }

    public	function CreateTache($id,$nom,$texte,$dateFin){
            $query="INSERT INTO TACHE (Nom,Texte,dateFin)VALUES($id,$nom,$texte,$dateFin)";
            $this->connect->executeQuery($query,array(
                ":IdT"=>array($id,PDO::PARAM_STR),
                ":Nom"=>array($nom,PDO::PARAM_STR),
                ":Texte"=>array($texte,PDO::PARAM_STR),
                ":DateFin"=>array($dateFin,PDO::PARAM_STR)));
    }

    public function findById ($id):array{
        $query="SELECT * FROM tache WHERE IdT=:id";
        $this->connect->executeQuery($query,array(
            ":IdT"=>array($id,PDO::PARAM_STR),
            ":Nom"=>array($id,PDO::PARAM_STR),
            ":Texte"=>array($id,PDO::PARAM_STR),
            ":DateFin"=>array($id,PDO::PARAM_STR)));
        $results=$this->connect->getResults();
        foreach ($results as $row){
            $tabTache[]=new Tache($row ["IdT"]);}
        return $tabTache;
    }

}

