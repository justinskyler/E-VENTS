<?php
namespace config;
use PDO;
use PDOException;

class Database
{
    public $con;
    private $host = '172.18.0.1';
    private $port = '3306';
    private $db = 'EVENTS';
    private $user = 'root';
    private $pass = 'secret';
    public function getConnection()
    {
        $this->con=null;
        try {
            $this->con = new PDO(
                "mysql:host={$this->host};port={$this->port};dbname={$this->db}",
                $this->user,
                $this->pass,
                array(
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                )
            );
        } catch (PDOException $e) {
             echo "Connection failed: " . $e->getMessage();
        }
        return $this->con;
    }
}
