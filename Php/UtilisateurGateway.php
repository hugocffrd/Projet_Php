<?php

require_once 'Connection.php';
require_once 'Utilisateur.php';

class UtilisateurGateway
{
    private $connect;
    public function __construct($dsn,$user,$pwd){
        $this->connect=new Connection($dsn,$user,$pwd);
    }




}