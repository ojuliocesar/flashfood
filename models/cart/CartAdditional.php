<?php

namespace Model\Cart;

use Classes\Database;
use PDO;
use PDOException;

class CartAdditional extends Database {

    private $stmt, $sql, $conn, $table;

    public function __construct()
    {
        $this->conn = parent::conn();

        $this->table = 'cart_additional';
    }

    public function create($cartId, $additionals)
    {

        try {
            
            foreach($additionals as $additional) {

                $this->setSql("INSERT INTO " . $this->table . " (cart_id, additional_id) VALUES ({$cartId}, {$additional})");

                $this->stmt = $this->conn->prepare($this->getSql());

                $this->stmt->execute();

            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function read()
    {

    }

    public function update()
    {

    }

    public function delete()
    {
        
    }

    public function setSql($sql)
    {
        $this->sql = $sql;
    }

    public function getSql()
    {
        return $this->sql;
    }

}