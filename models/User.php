<?php

namespace Model;

use Classes\Database;

use PDO;
use PDOException;

class User extends Database {
    private $stmt, $sql, $table, $conn;

    public function __construct()
    {
        $this->setConn(parent::conn());

        $this->setTable('user');
    }

    public function create($email, $password)
    {
        try {

            $emailExists = $this->conn->query("SELECT email FROM " . $this->table . " WHERE email = '{$email}'")->fetch(PDO::FETCH_ASSOC);

            if ($emailExists) {
                $response = [
                    'response' => false,
                    'message' => 'O E-mail inserido já foi cadastrado! Adicione outro e tente novamente.'
                ];

                echo json_encode($response, JSON_UNESCAPED_UNICODE);

                exit();
            }
            
            $this->setSql("INSERT INTO " . $this->table . " (email, password) VALUES ('{$email}', '{$password}')");
    
            $this->stmt = $this->conn->prepare($this->getSql());
    
            $this->stmt->execute();
    
            if ($this->stmt->rowCount()) {
    
                return true;
            } else {
    
                return false;
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function read()
    {

    }

    public function checkUser($email, $password)
    {
        try {
            
            $this->setSql("SELECT email FROM " . $this->getTable() . " WHERE email = '$email' AND BINARY password = '$password' AND status = 1");

            $this->stmt = $this->conn->prepare($this->getSql());

            $this->stmt->execute();

            if ($this->stmt->rowCount()) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function update()
    {

    }

    public function delete()
    {

    }

    // Getters e Setters
    public function setSql($sql) {
        $this->sql = $sql;
    }

    public function getSql() {
        return $this->sql;
    }

    public function setStmt($stmt)
    {
        $this->stmt = $stmt;
    }

    public function getStmt()
    {
        return $this->stmt;
    }

    public function setConn($conn)
    {
        $this->conn = $conn;
    }

    public function getConn()
    {
        return $this->conn;
    }

    public function setTable($table)
    {
        $this->table = $table;
    }

    public function getTable()
    {
        return $this->table;
    }
}