<?php
require_once __DIR__ . '/../models/product.php';
require_once __DIR__ . '/../config/database.php';

class ProductController {
    private $db;
    private $product;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->product = new Product($this->db);
    }

    public function index() {
        // Obtener todos los productos
        $products = $this->product->getAll();
        // Incluir la vista
        require_once '../views/home/index.php';
    }

    public function showFeatured() {
        // Obtener productos destacados
        $featuredProducts = $this->product->getFeatured();
        // Incluir la vista
        require_once '../views/home/featured.php';
    }

    public function addProduct($name, $price, $image, $description, $featured = false) {
        try {
            $result = $this->product->create($name, $price, $image, $description, $featured);
            if($result) {
                return ["success" => true, "message" => "Producto agregado correctamente"];
            }
            return ["success" => false, "message" => "Error al agregar el producto"];
        } catch (Exception $e) {
            return ["success" => false, "message" => $e->getMessage()];
        }
    }

    public function updateProduct($id, $name, $price, $image, $description, $featured) {
        try {
            $result = $this->product->update($id, $name, $price, $image, $description, $featured);
            if($result) {
                return ["success" => true, "message" => "Producto actualizado correctamente"];
            }
            return ["success" => false, "message" => "Error al actualizar el producto"];
        } catch (Exception $e) {
            return ["success" => false, "message" => $e->getMessage()];
        }
    }

    public function deleteProduct($id) {
        try {
            $result = $this->product->delete($id);
            if($result) {
                return ["success" => true, "message" => "Producto eliminado correctamente"];
            }
            return ["success" => false, "message" => "Error al eliminar el producto"];
        } catch (Exception $e) {
            return ["success" => false, "message" => $e->getMessage()];
        }
    }
}