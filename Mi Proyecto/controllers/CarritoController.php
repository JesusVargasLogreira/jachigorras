<?php
require_once __DIR__ . '/../models/carrito.php';
require_once __DIR__ . '/../models/product.php';
require_once __DIR__ . '/../config/database.php';

class CartController {
    private $cart;
    private $productModel;

    public function __construct() {
        session_start();
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = new Cart();
        }
        $this->cart = $_SESSION['cart'];
        
        $database = new Database();
        $db = $database->getConnection();
        $this->productModel = new Product($db);
    }

    public function addToCart() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
            $productId = $_POST['product_id'];
            $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
            
            $product = $this->productModel->getById($productId);
            if ($product) {
                $this->cart->addItem($product, $quantity);
                echo json_encode(['success' => true]);
                return;
            }
        }
        echo json_encode(['success' => false]);
    }

    public function updateCart() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'], $_POST['quantity'])) {
            $productId = $_POST['product_id'];
            $quantity = (int)$_POST['quantity'];
            
            $this->cart->updateQuantity($productId, $quantity);
            echo json_encode([
                'success' => true,
                'total' => $this->cart->getTotal()
            ]);
            return;
        }
        echo json_encode(['success' => false]);
    }

    public function removeFromCart() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
            $productId = $_POST['product_id'];
            $this->cart->removeItem($productId);
            echo json_encode([
                'success' => true,
                'total' => $this->cart->getTotal()
            ]);
            return;
        }
        echo json_encode(['success' => false]);
    }

    public function getCartItems() {
        return $this->cart->getItems();
    }
}