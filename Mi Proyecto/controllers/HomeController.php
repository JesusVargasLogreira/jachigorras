<?php
<?php
class HomeController {
    public function index() {
        // Por ahora cargaremos la vista directamente
        require_once 'views/home/index.php';
    }

    public function about() {
        require_once 'views/about/index.php';
    }
}