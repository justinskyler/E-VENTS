<?php
require '../config/database.php';

use config\Database;

class Model
{
    protected $db;
    public function __construct()
    {
        $connection = new Database();
        $this->db = $connection->getConnection();
    }

    public function save($tblname, $data)
    {
        $columns = implode(", ", array_keys($data));
        $val = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $tblname ($columns) VALUES ($val)";
        $smt = $this->db->prepare($sql);
        return $smt->execute($data);
    }

    public function find($tblname)
    {
        $sql = "SELECT * FROM $tblname";
        $smt = $this->db->prepare($sql);
        $smt->execute();
        return $smt->fetch(PDO::FETCH_ASSOC);
    }

    private function getPDOType($value)
    {
        switch (gettype($value)) {
            case 'integer':
                return PDO::PARAM_INT;
            case 'boolean':
                return PDO::PARAM_BOOL;
            case 'NULL':
                return PDO::PARAM_NULL;
            case 'string':
            default:
                return PDO::PARAM_STR;
        }
    }

    public function findBy($tblname, $data)
    {
        $column = array_key_first($data);
        $val=$data[$column];
        $sql = "SELECT * FROM $tblname WHERE $column= :value";
        $pdoType = $this->getPDOType($val);
        $smt = $this->db->prepare($sql);
        $smt->bindParam(':value', $val, $pdoType);
        $smt->execute();
        return $smt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($tblname, $data)
    {
        if (!isset($data['id'])) {
            throw new Exception("L'ID est requis pour mettre à jour un enregistrement.");
        }
        $id = $data['id'];
        unset($data['id']);
        $setClause = [];
        foreach ($data as $column => $value) {
            $setClause[] = "$column = :$column";
        }
        $setClause = implode(", ", $setClause);
        $sql = "UPDATE $tblname SET  $setClause WHERE id= :id ";
        $smt = $this->db->prepare($sql);
        foreach ($data as $column => $value) {
            $smt->bindValue(":$column", $value);
        }
        $smt->bindValue(":id", $id, PDO::PARAM_INT);
        return $smt->execute();
    }

    public function delete() {}

    // public function findByID($tblname, $id)
    // {
    //     $sql = "SELECT * FROM $tblname WHERE id= :id";
    //     $smt = $this->db->prepare($sql);
    //     $smt->bindParam(':id', $id, PDO::PARAM_INT);
    //     $smt->execute();
    //     return $smt->fetch(PDO::FETCH_ASSOC);
    // }
}
