<?php
<?php
require_once __DIR__ . '/../models/usuario.php';

class UserController {
    private $userModel;
    
    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->userModel = new User($db);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if($user = $this->userModel->login($email, $password)) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('Location: /');
                exit;
            }
            
            $_SESSION['error'] = 'Email o contraseña incorrectos';
            header('Location: /views/Register.php');
            exit;
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if($this->userModel->register($username, $email, $password)) {
                $_SESSION['success'] = 'Registro exitoso. Por favor inicia sesión';
                header('Location: /views/Register.php');
                exit;
            }
            
            $_SESSION['error'] = 'Error al registrar usuario';
            header('Location: /views/Register.php');
            exit;
        }
    }

    public function logout() {
        session_destroy();
        header('Location: /');
        exit;
    }
}