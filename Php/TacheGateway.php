<?php

require_once 'Connection.php';
require_once 'Tache.php';

class TacheGateway
{
    private $connect;


        public function __contruct($dsn,$user,$pwd){
        $this->connect=new Connection($dsn,$user,$pwd);
        }

    public	function insertTache(Tache $tache){
        $query="INSERT INTO tache VALUES(:IdT,:Nom,:Texte,:DateFin)";
        $this->connect->executeQuery($query,array(
            ":IdT"=>array($tache->IdT,PDO::PARAM_STR),
            ":Nom"=>array($tache->Nom,PDO::PARAM_STR),
            ":Texte"=>array($tache->Texte,PDO::PARAM_STR),
            ":DateFin"=>array($tache->DateFin,PDO::PARAM_STR)));
    }

    public function findById ($id):Tache{
        $query="SELECT * FROM Tache WHERE IdT=:id";
        $this->connect->executeQuery($query,array(
            ":IdT"=>array($id,PDO::PARAM_STR),
            ":Nom"=>array($id,PDO::PARAM_STR),
            ":Texte"=>array($id,PDO::PARAM_STR),
            ":DateFin"=>array($id,PDO::PARAM_STR)));
        $results=$this->connect->getResults();
        foreach ($results as $row){
            $newTache=new Tache($row ["IdT"],$row ["Nom"],$row ["Texte"],$row ["DateFin"]);}
        return $newTache;
    }

}
