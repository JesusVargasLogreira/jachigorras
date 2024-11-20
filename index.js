// Comprobar si los elementos de la pagina cargaron
if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

// Carrito de compras
function ready() {
    // Eliminar todos los productos del carrito
    var carritoProds = document.getElementsByClassName('carrito-prods')[0];
    while (carritoProds.hasChildNodes()) {
        carritoProds.removeChild(carritoProds.firstChild);
    }
    actualizarTotal();
    // Boton eliminar
    var botonEliminar = document.getElementsByClassName('boton-eliminar');
    for (var i = 0; i < botonEliminar.length; i++) {
        var button = botonEliminar[i];
        button.addEventListener('click', eliminarProducto);
    }

    // Boton sumar
    var botonSumar = document.getElementsByClassName('sumar-can');
    for (var i = 0; i < botonSumar.length; i++) {
        var button = botonSumar[i];
        button.addEventListener('click', sumarCantidad);
    }

    // Boton restar
    var botonRestar = document.getElementsByClassName('restar-can');
    for (var i = 0; i < botonRestar.length; i++) {
        var button = botonRestar[i];
        button.addEventListener('click', restarCantidad);
    }

    // Boton agregar al carrito
    var BotonAgregar = document.getElementsByClassName('boton-carrito');
    for (var i = 0; i < BotonAgregar.length; i++) {
        var button = BotonAgregar[i];
        button.addEventListener('click', agregarProd);
    }

    // Boton de pagar
    document.getElementsByClassName('boton-pagar')[0].addEventListener('click', pagar);
}

// Eliminar producto del carrito
function eliminarProducto(event) {
    var buttonClicked = event.target;
    buttonClicked.parentElement.remove();
    // Actualizar total carrito despues de eliminar producto
    actualizarTotal();
}

// Funcion Actualizar total carrito
function actualizarTotal() {
    var carrito = document.getElementsByClassName('carrito')[0];
    var carProd = document.getElementsByClassName('car-prod');
    var total = 0;

    // Recorrer cada elemento para actualizar el total
    for (var i = 0; i < carProd.length; i++) {
        var producto = carProd[i];
        var precioProd = producto.getElementsByClassName('carrito-prod-precio')[0];
        console.log(precioProd);
        // Convertir cadena de texto en decimales
        var precio = parseFloat(precioProd.innerHTML.replace("$", "").replace(".", ""));
        console.log(precio);

        // Contador cantidad de productos
        var carProdCantidad = producto.getElementsByClassName('carProdCantidad')[0];
        var cantidad = carProdCantidad.value;
        console.log(cantidad);
        total = total + (precio * cantidad);
    }
    total = Math.round(total * 100) / 100;
    document.getElementsByClassName('car-prec-total')[0].innerHTML = '$' + total.toLocaleString("en");

}

// Funcion sumar cantidad
function sumarCantidad(event) {
    var buttonClicked = event.target;
    var selector = buttonClicked.parentElement;
    var cantidadActual = selector.getElementsByClassName('carProdCantidad')[0].value;
    cantidadActual++;
    selector.getElementsByClassName('carProdCantidad')[0].value = cantidadActual;

    // Actualizar total del carrito
    actualizarTotal();
}

// Funcion restar cantidad
function restarCantidad(event) {
    var buttonClicked = event.target;
    var selector = buttonClicked.parentElement;
    var cantidadActual = selector.getElementsByClassName('carProdCantidad')[0].value;
    cantidadActual--;

    // Cantidad no puede ser menor que 1
    if (cantidadActual >= 1) {
        selector.getElementsByClassName('carProdCantidad')[0].value = cantidadActual;

        // Actualizar total del carrito
        actualizarTotal();
    }
}

// Funcion agregar un producto al carrito
function agregarProd(event) {
    var buttonClicked = event.target;
    var prod = buttonClicked.parentElement;
    var nombre = prod.getElementsByClassName('nombre-gorra')[0].innerText;
    var precio = prod.getElementsByClassName('precio')[0].innerText;
    var imgsrc = prod.getElementsByClassName('img-item')[0].src;

    // Agregar producto al carrito
    agregarProdcarrito(nombre, precio, imgsrc);
}

function agregarProdcarrito(nombre, precio, imgsrc) {
    var prod = document.createElement('div');
    prod.classList.add = 'prod';
    var prodcarrito = document.getElementsByClassName('carrito-prods')[0];

    var prodCarritoContenido = `
    <div class="car-prod">
        <img src="${imgsrc}" alt="" width="80px">
        <div class="car-prod-detalles">
        <span class="car-prod-titulo">${nombre}</span>
        <!-- Selector de Cantidad -->
        <div class="selector-cantidad">
        <i class="fa-solid fa-minus restar-can"></i>
        <input type="text" value="1" class="carProdCantidad" disabled>
        <i class="fa-solid fa-plus sumar-can"></i>
        </div>
        <span class="carrito-prod-precio">${precio}</span>
        </div>
        <!-- Botón Eliminar -->
        <span class="boton-eliminar">
        <i class="fa-solid fa-trash"></i>
        </span>
    </div>
    `
    prod.innerHTML = prodCarritoContenido;
    prodcarrito.append(prod);

    // Agregar funcionalidad al nuevo producto
    prod.getElementsByClassName('boton-eliminar')[0].addEventListener('click', eliminarProducto);
    prod.getElementsByClassName('restar-can')[0].addEventListener('click', restarCantidad);
    prod.getElementsByClassName('sumar-can')[0].addEventListener('click', sumarCantidad);

     // Actualizar total del carrito
        actualizarTotal();
}

// funcion boton pagar
function pagar(event) {
    alert("Gracias por su compra");
    // Eliminar todos los productos del carrito
    var carritoProds = document.getElementsByClassName('carrito-prods')[0];
    while (carritoProds.hasChildNodes()) {
        carritoProds.removeChild(carritoProds.firstChild);
    }
    actualizarTotal();
}
