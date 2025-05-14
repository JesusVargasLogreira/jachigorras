<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Las JachiGorras</title>
    <link rel="stylesheet" href="../../css/index.css">
    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Vincular JS -->
    <script src="../../js/index.js"></script>
</head>

<body>
    <div class="Caja_Negro">
        <div class="Menu">
            <nav class="Menu1">
                <ul>
                    <li class="titulo"><img src="../../../IMG/jachi_gorras_color_4.png" alt="" width="70px" height="70px"></li>
                    <li><span class="iconos">
                            <ion-icon name="globe-outline"></ion-icon>
                        </span>
                        <input type="text" placeholder="www.jachi-gorras.com"><span class="iconos1"><ion-icon
                                name="mic-outline"></ion-icon></span>
                    </li>
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
                                        <!-- Producto -->
                                        <div class="car-prod">
                                            <img src="../../../IMG/gorra.blanca-removebg-preview.png" alt="" width="80px">
                                            <div class="car-prod-detalles">
                                                <span class="car-prod-titulo">Gorra Blanca</span>
                                                <!-- Selector de Cantidad -->
                                                <div class="selector-cantidad">
                                                    <i class="fa-solid fa-minus restar-can"></i>
                                                    <input type="text" value="1" class="carProdCantidad" disabled>
                                                    <i class="fa-solid fa-plus sumar-can"></i>
                                                </div>
                                                <span class="carrito-prod-precio">$70.000</span>
                                            </div>
                                            <!-- Botón Eliminar -->
                                            <span class="boton-eliminar">
                                                <i class="fa-solid fa-trash"></i>
                                            </span>
                                        </div>

                                        <!-- Producto 2 -->
                                        <div class="car-prod">
                                            <img src="../../../IMG/gorra.negra-removebg-preview.png" alt="" width="80px">
                                            <div class="car-prod-detalles">
                                                <span class="car-prod-titulo">Gorra Negra</span>
                                                <!-- Selector de Cantidad -->
                                                <div class="selector-cantidad">
                                                    <i class="fa-solid fa-minus restar-can"></i>
                                                    <input type="text" value="2" class="carProdCantidad" disabled>
                                                    <i class="fa-solid fa-plus sumar-can"></i>
                                                </div>
                                                <span class="carrito-prod-precio">$70.000</span>
                                            </div>
                                            <!-- Botón Eliminar -->
                                            <span class="boton-eliminar">
                                                <i class="fa-solid fa-trash"></i>
                                            </span>
                                        </div>

                                        <!-- Producto 3 -->
                                        <div class="car-prod">
                                            <img src="../../../IMG/OIP-removebg-preview.png" alt="" width="80px">
                                            <div class="car-prod-detalles">
                                                <span class="car-prod-titulo">Gorra</span>
                                                <!-- Selector de Cantidad -->
                                                <div class="selector-cantidad">
                                                    <i class="fa-solid fa-minus restar-can"></i>
                                                    <input type="text" value="3" class="carProdCantidad" disabled>
                                                    <i class="fa-solid fa-plus sumar-can"></i>
                                                </div>
                                                <span class="carrito-prod-precio">$70.000</span>
                                            </div>
                                            <!-- Botón Eliminar -->
                                            <span class="boton-eliminar">
                                                <i class="fa-solid fa-trash"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Total del Carrito -->
                                    <div class="car-total">
                                        <div class="fila">
                                            <strong>Tu Total</strong>
                                            <span class="car-prec-total">
                                                
                                            </span>
                                        </div>
                                        <button class="boton-pagar">Pagar <i
                                                class="fa-solid fa-dollar-sign"></i></button>
                                    </div>
                                </div>

                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="Caja_Contenido">
        <div class="columnas3">
            <img class="fondo" src="../../../IMG/4.png" alt="">
            <img class="gorra" src="../../../IMG/OIP-removebg-preview.png" alt="">
            <img class="blanca" src="../../../IMG/gorra.blanca-removebg-preview.png" alt="">
            <img class="negra" src="../../../IMG/gorra.negra-removebg-preview.png" alt="">
            <h1>Descripción</h1>
            <p class="texto">Nuestras gorras podrían destacar por <br> diseños modernos y versátiles. Con <br>un gran
                estilo, comodidad y funcionalidad.</p>
        </div>
    </div>

    <!-- Catalogo -->
    <h2 class="titulo-catalogo">Nuevas Gorras</h2>
    <section class="contenedor">
        <!-- Contenedor para el catalogo -->
        <div class="contenedor-productos">
            <div class="producto"> <!-- Producto 1 -->
                <span class="nombre-gorra">Gorra Blanca</span>
                <img src="../../../IMG/gorra.blanca-removebg-preview.png" class="img-item">
                <span class="precio">$70.000</span>
                <button class="boton-carrito">Agregar al Carrito</button>
            </div>
            <div class="producto"> <!-- Producto 2 -->
                <span class="nombre-gorra" id="gorras">Gorra Negra</span>
                <img src="../../../IMG/gorra.negra-removebg-preview.png" class="img-item">
                <span class="precio">$70.000</span>
                <button class="boton-carrito">Agregar al Carrito</button>
            </div>
            <div class="producto"> <!-- Producto 3 -->
                <span class="nombre-gorra">Gorra</span>
                <img src="../../../IMG/OIP-removebg-preview.png" class="img-item">
                <span class="precio">$70.000</span>
                <button class="boton-carrito">Agregar al Carrito</button>
            </div>
        </div>
    </section>
    <!--pagina de los iconos seleccionados-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
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
</html>
