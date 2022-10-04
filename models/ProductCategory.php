<?php

namespace Model;

use Classes\Database;
use PDO;
use PDOException;

class ProductCategory extends Database{
    private $stmt, $sql, $conn, $table;

    public function __construct()
    {
        $this->conn = parent::conn();

        $this->table = 'product_category';
    }

    public function create($data)
    {
        try {

            $this->setSql("INSERT INTO " . $this->table . " (name, slug, status) VALUES ('" . $data['name'] . "', '" . $data['slug'] . "', " . $data['status'] . ")");

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
        try {

            $this->setSql("SELECT * FROM " . $this->table . " WHERE status = 1");

            $this->stmt = $this->conn->prepare($this->getSql());

            $this->stmt->execute();

            if ($this->stmt->rowCount()) {
                return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return false;
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }

    public function readAll()
    {
        try {

            $this->setSql("SELECT * FROM " . $this->table . " ORDER BY category_id");

            $this->stmt = $this->conn->prepare($this->getSql());

            $this->stmt->execute();

            if ($this->stmt->rowCount()) {
                return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return false;
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }

    public function readWithCount()
    {
        try {

            $this->setSql("SELECT pc.*, (SELECT COUNT(p.name) FROM product as p WHERE p.category_id = pc.category_id) AS 'count' FROM " . $this->table . " as pc ORDER BY pc.status DESC");

            $this->stmt = $this->conn->prepare($this->getSql());

            $this->stmt->execute();

            if ($this->stmt->rowCount()) {
                return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return false;
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }

    public function readById($id)
    {
        try {

            $this->setSql("SELECT * FROM " . $this->table . " WHERE category_id = {$id}");

            $this->stmt = $this->conn->prepare($this->getSql());

            $this->stmt->execute();

            if ($this->stmt->rowCount()) {
                return $this->stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                return false;
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }

    public function readBySlug($slug)
    {
        try {

            $this->setSql("SELECT * FROM " . $this->table . " WHERE slug = '{$slug}'");

            $this->stmt = $this->conn()->prepare($this->getSql());

            $this->stmt->execute();
            
            if ($this->stmt->rowCount()) {
                return $this->stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function readByCategory($id)
    {
        try {
            $this->setSql("SELECT po.* FROM
                {$this->table} pc
            INNER JOIN product po on po.category_id = pc.category_id
            WHERE pc.category_id = $id ORDER BY status DESC");

            $this->stmt = $this->conn->prepare($this->getSql());

            $this->stmt->execute();

            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function countProducts($id)
    {
        try {

            $this->setSql("SELECT * FROM product WHERE category_id = $id");

            $this->stmt = $this->conn->prepare($this->getSql());

            $this->stmt->execute();

            if ($this->stmt->rowCount()) {
                return count($this->stmt->fetchAll(PDO::FETCH_ASSOC));
            } else {
                return false;
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }

    public function update($data)
    {
        try {

            $this->setSql("UPDATE " . $this->table ." SET name = '" . $data['name'] . "', slug = '" . $data['slug'] . "', status = " . $data['status'] . " WHERE category_id = " . $data['category_id'] . "");

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

    public function updateByField($data, string $field, $categoryId): bool
    {
        try {
            $this->setSql(
            "UPDATE " . $this->table . "
                SET $field = '$data'
            WHERE
                category_id = $categoryId
            ");

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

    public function deleteStatus($id)
    {
        try {

            $this->setSql("UPDATE " . $this->table ." SET status = 0 WHERE category_id = {$id}");

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

    public function delete($id)
    {
        try {

            $this->setSql("DELETE FROM " . $this->table ." WHERE category_id = {$id}");

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

    public function setSql($sql)
    {
        $this->sql = $sql;
    }

    public function getSql()
    {
        return $this->sql;
    }
}