document.addEventListener('DOMContentLoaded', function() {
    // Variables
    const carrito = [];
    const carritoProductos = document.querySelector('.carrito-prods');
    const totalElement = document.querySelector('.car-prec-total');
    const botonesAgregar = document.querySelectorAll('.btn-agregar');

    // Función para actualizar el carrito
    function actualizarCarrito() {
        carritoProductos.innerHTML = '';
        let total = 0;

        carrito.forEach(producto => {
            const productoHTML = `
                <div class="car-prod">
                    <img src="${producto.imagen}" alt="${producto.nombre}" width="80px">
                    <div class="car-prod-detalles">
                        <span class="car-prod-titulo">${producto.nombre}</span>
                        <div class="selector-cantidad">
                            <i class="fa-solid fa-minus restar-can"></i>
                            <input type="text" value="${producto.cantidad}" class="carProdCantidad" disabled>
                            <i class="fa-solid fa-plus sumar-can"></i>
                        </div>
                        <span class="carrito-prod-precio">$${producto.precio}</span>
                    </div>
                    <span class="boton-eliminar">
                        <i class="fa-solid fa-trash"></i>
                    </span>
                </div>
            `;
            carritoProductos.innerHTML += productoHTML;
            total += producto.precio * producto.cantidad;
        });

        totalElement.textContent = `$${total.toLocaleString()}`;
    }

    // Evento para agregar productos al carrito
    botonesAgregar.forEach(boton => {
        boton.addEventListener('click', (e) => {
            const card = e.target.closest('.producto-card');
            const producto = {
                nombre: card.querySelector('h3').textContent,
                precio: parseInt(card.querySelector('.precio').textContent.replace('$', '').replace('.', '')),
                imagen: card.querySelector('img').src,
                cantidad: 1
            };

            // Verificar si el producto ya está en el carrito
            const index = carrito.findIndex(item => item.nombre === producto.nombre);
            if (index !== -1) {
                carrito[index].cantidad++;
            } else {
                carrito.push(producto);
            }

            actualizarCarrito();
            
            // Mostrar mensaje de confirmación
            alert('Producto agregado al carrito');
        });
    });

    // Evento para eliminar productos (delegación de eventos)
    carritoProductos.addEventListener('click', (e) => {
        if (e.target.classList.contains('fa-trash')) {
            const producto = e.target.closest('.car-prod');
            const nombre = producto.querySelector('.car-prod-titulo').textContent;
            
            const index = carrito.findIndex(item => item.nombre === nombre);
            carrito.splice(index, 1);
            actualizarCarrito();
        }
    });

    // Eventos para modificar cantidad
    carritoProductos.addEventListener('click', (e) => {
        if (e.target.classList.contains('fa-plus') || e.target.classList.contains('fa-minus')) {
            const producto = e.target.closest('.car-prod');
            const nombre = producto.querySelector('.car-prod-titulo').textContent;
            const index = carrito.findIndex(item => item.nombre === nombre);

            if (e.target.classList.contains('fa-plus')) {
                carrito[index].cantidad++;
            } else if (e.target.classList.contains('fa-minus') && carrito[index].cantidad > 1) {
                carrito[index].cantidad--;
            }

            actualizarCarrito();
        }
    });

    // Agregar manejo para mantener el carrito visible
    const carritoIcon = document.querySelector('.tamaño1');
    const carritoContainer = document.querySelector('.carrito');
    let carritoVisible = false;

    carritoIcon.addEventListener('click', function(e) {
        e.preventDefault();
        if (!carritoVisible) {
            carritoContainer.style.display = 'block';
            carritoVisible = true;
        } else {
            carritoContainer.style.display = 'none';
            carritoVisible = false;
        }
    });

    // Evitar que el carrito se cierre al hacer clic dentro de él
    carritoContainer.addEventListener('click', function(e) {
        e.stopPropagation();
    });

    // Cerrar el carrito al hacer clic fuera de él
    document.addEventListener('click', function(e) {
        if (!carritoContainer.contains(e.target) && !carritoIcon.contains(e.target)) {
            carritoContainer.style.display = 'none';
            carritoVisible = false;
        }
    });
});