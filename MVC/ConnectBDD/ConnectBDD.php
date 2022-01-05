<?php
require 'Connection.php';

class ConnectBDD
{
    private $connect;
    private $dsn = "mysql:host=localhost;dbname=dbroot";
    private $user = "ToDoUser";
    private $pwd = "iIj4T7GCa1AkUmX0";

    public function __construct()
    {
        $this->connect = new Connection($this->dsn, $this->user, $this->pwd);
    }

    public function getConnect(): Connection
    {
        return $this->connect;
    }
}
