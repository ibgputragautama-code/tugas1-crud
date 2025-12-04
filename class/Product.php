<?php
class Product {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM products");
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->db->query("SELECT * FROM products WHERE id = ?", [$id]);
        return $stmt->fetch();
    }

    public function create($name, $category, $price, $stock, $status, $image) {
        $sql = "INSERT INTO products (name, category, price, stock, status, image) VALUES (?, ?, ?, ?, ?, ?)";
        $this->db->query($sql, [$name, $category, $price, $stock, $status, $image]);
        return $this->db->lastInsertId();
    }

    public function update($id, $name, $category, $price, $stock, $status, $image) {
        $sql = "UPDATE products SET name=?, category=?, price=?, stock=?, status=?, image=? WHERE id=?";
        return $this->db->query($sql, [$name, $category, $price, $stock, $status, $image, $id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM products WHERE id=?";
        return $this->db->query($sql, [$id]);
    }
}
