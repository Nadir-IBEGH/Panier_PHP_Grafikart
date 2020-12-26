<?php


class Database
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'panier_grafikart';
    public $db;

    public function __construct($host = null, $username = null, $password = null, $database = null)
    {
        if ($host != null) {
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }

        try {
            $this->db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database, $this->username, $this->password
                , array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'   // pour ne pas avoir de problème avec utf8 on rajoute le paramètre qui y dans le tableau
                ,   PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING // pour voir le message d'erreur (warning) sans cela onne verra pas le message d'érreur
                ));

        }catch (PDOException $e){
            die('<h1>Impossible de se connecter a la base de donnees</h1>');
        }

    }
    public function query($sql,$data=array()){
        $req = $this->db->prepare($sql);
        $req->execute($data);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
}












