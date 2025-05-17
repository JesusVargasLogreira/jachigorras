
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda - Las JachiGorras</title>
    <link rel="stylesheet" href="../../css/tienda.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Vincular JS -->
    <script src="../../js/carrito.js"></script>
</head>
<body>
    <!-- Menu copiado del index -->
    <div class="Caja_Negro">
        <div class="Menu">
            <nav class="Menu1">
                <ul>
                    <li class="titulo"><img src="../../../IMG/jachi_gorras_color_4.png" alt="" width="70px" height="70px"></li>
                    <li class="tamaño"><a href="#">Tienda</a></li>
                    <li class="tamaño"><a href="../acercaphp/Acerca.php">Acerca de nosotros</a> </li>
                    <li class="tamaño1"><a href="#"><ion-icon name="cart-outline"></ion-icon></a>
                        <ul>
                            <li>
                                <!-- Carrito de Compras -->
                                <div class="carrito">
                                    <!-- Encabezado del Carrito -->
                                    <div class="header-carrito">
                                        <h2 class="titulo-carrito"><a href="">Tu carrito</a></h2>
                                    </div>

                                    <!-- Productos en el Carrito -->
                                    <div class="carrito-prods">
                                        <!-- El contenido del carrito se llenará dinámicamente con JavaScript -->
                                    </div>

                                    <!-- Total del Carrito -->
                                    <div class="car-total">
                                        <div class="fila">
                                            <strong>Tu Total</strong>
                                            <span class="car-prec-total"></span>
                                        </div>
                                        <button class="boton-pagar">Pagar <i class="fa-solid fa-dollar-sign"></i></button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Contenido de la tienda -->
    <div class="filtros-container">
        <div class="filtros">
            <div class="categoria-botones">
                <button class="filtro-btn active" data-categoria="todos">Todas</button>
                <button class="filtro-btn" data-categoria="deportivas">Deportivas</button>
                <button class="filtro-btn" data-categoria="casual">Casual</button>
                <button class="filtro-btn" data-categoria="vintage">Vintage</button>
            </div>
            <div class="filtro-precio-container">
                <span class="precio-label">Rango de precio:</span>
                <select class="filtro-precio">
                    <option value="todos">Todos los precios</option>
                    <option value="0-50000">Hasta $50.000</option>
                    <option value="50000-100000">$50.000 - $100.000</option>
                    <option value="100000+">Más de $100.000</option>
                </select>
            </div>
        </div>
    </div>

        <!-- Grid de productos -->
        <div class="productos-grid">
            <!-- Producto 1 -->
            <div class="producto-card">
                <img src="../../../IMG/gorra.blanca-removebg-preview.png" alt="Gorra Blanca">
                <h3>Gorra Blanca Premium</h3>
                <p class="descripcion">Gorra deportiva de alta calidad, perfecta para cualquier ocasión</p>
                <span class="precio">$70.000</span>
                <div class="producto-acciones">
                    <button class="btn-agregar">Agregar al Carrito</button>
                    <button class="btn-detalles">Ver Detalles</button>
                </div>
            </div>

            <!-- Producto 2 -->
            <div class="producto-card">
                <img src="../../../IMG/gorra.negra-removebg-preview.png" alt="Gorra Negra">
                <h3>Gorra Negra Clásica</h3>
                <p class="descripcion">Diseño clásico y elegante, ideal para uso diario</p>
                <span class="precio">$70.000</span>
                <div class="producto-acciones">
                    <button class="btn-agregar">Agregar al Carrito</button>
                    <button class="btn-detalles">Ver Detalles</button>
                </div>
            </div>

            <!-- Producto 3 -->
            <div class="producto-card">
                <img src="../../../IMG/OIP-removebg-preview.png" alt="Gorra Vintage">
                <h3>Gorra Vintage</h3>
                <p class="descripcion">Estilo retro con un toque moderno</p>
                <span class="precio">$70.000</span>
                <div class="producto-acciones">
                    <button class="btn-agregar">Agregar al Carrito</button>
                    <button class="btn-detalles">Ver Detalles</button>
                </div>
            </div>

            <!-- Producto 4 -->
            <div class="producto-card">
                <img src="../../../IMG/gorra.blanca-removebg-preview.png" alt="Gorra Deportiva">
                <h3>Gorra Deportiva Pro</h3>
                <p class="descripcion">Material transpirable y diseño deportivo</p>
                <span class="precio">$85.000</span>
                <div class="producto-acciones">
                    <button class="btn-agregar">Agregar al Carrito</button>
                    <button class="btn-detalles">Ver Detalles</button>
                </div>
            </div>
        </div>

        <!-- Paginación -->
    <div class="paginacion">
        <button class="btn-pagina" title="Anterior">
            <i class="fas fa-chevron-left"></i>
        </button>
        <div class="numeros-pagina">
            <button class="btn-numero active">1</button>
            <button class="btn-numero">2</button>
            <button class="btn-numero">3</button>
            <span class="separador">...</span>
            <button class="btn-numero">12</button>
        </div>
        <button class="btn-pagina" title="Siguiente">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
    
    <!--pagina de los iconos seleccionados-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- Footer copiado del index -->
    <footer>
        <!-- Columna 3: Contacto -->
        <div class="footer-column">
            <h3>Contacto</h3>
            <ul>
                <li>300 507 10 00</li>
                <li>PBX: 01 8000 41 37 57</li>
            </ul>
        </div>

        <!-- Logotipo y redes sociales -->
        <div class="footer-logo-socials">
            <h2>JACHIGORRAS</h2>
            <div class="social-icons">
                <a href="#"><i class="fab fa-whatsapp"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-tiktok"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>