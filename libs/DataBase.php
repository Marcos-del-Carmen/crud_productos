<?php 

class DataBase {
    private $host;
    private $db;
    private $user;
    private $pass;
    private $charset;

    public function __construct(){
        $this->host     = constant('HOST');
        $this->db       = constant('DB');
        $this->user     = constant('USER');
        $this->pass     = constant('PASSWORD');
        $this->charset  = constant('CHARSET');
    }

    public function connect() {
        try{
            $connection = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                        PDO::ATTR_EMULATE_PREPARES => false];
            $pdo = new PDO($connection, $this->user, $this->pass, $options);
            return $pdo;
        } catch(PDOException $e) {
            print_r("Error connection: {$e->getMessage()}");
        }
    }
}