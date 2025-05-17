<?php
class Product {
    private $conn;
    private $table_name = "products";

    // Propiedades del producto
    private $id;
    private $name;
    private $price;
    private $image;
    private $description;
    private $featured;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Getters y Setters
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getPrice() { return $this->price; }
    public function getImage() { return $this->image; }
    public function getDescription() { return $this->description; }
    public function getFeaturedStatus() { return $this->featured; }

    // Métodos CRUD
    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFeatured() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE featured = TRUE";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $price, $image, $description, $featured = false) {
        $query = "INSERT INTO " . $this->table_name . " 
                (name, price, image, description, featured) 
                VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$name, $price, $image, $description, $featured]);
    }

    public function update($id, $name, $price, $image, $description, $featured) {
        $query = "UPDATE " . $this->table_name . " 
                SET name = ?, price = ?, image = ?, description = ?, featured = ? 
                WHERE id = ?";
        
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$name, $price, $image, $description, $featured, $id]);
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}