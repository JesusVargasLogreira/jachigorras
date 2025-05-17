document.addEventListener('DOMContentLoaded', function() {
    // Selectores
    const addToCartButtons = document.querySelectorAll('.boton-carrito');
    const minusButtons = document.querySelectorAll('.restar-can');
    const plusButtons = document.querySelectorAll('.sumar-can');
    const deleteButtons = document.querySelectorAll('.boton-eliminar');

    // Agregar al carrito
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.id;
            addToCart(productId);
        });
    });

    // Disminuir cantidad
    minusButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.id;
            updateQuantity(productId, 'decrease');
        });
    });

    // Aumentar cantidad
    plusButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.id;
            updateQuantity(productId, 'increase');
        });
    });

    // Eliminar del carrito
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.id;
            removeFromCart(productId);
        });
    });

    // Funciones auxiliares
    function addToCart(productId) {
        fetch('/cart/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `product_id=${productId}`
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                location.reload();
            }
        });
    }

    function updateQuantity(productId, action) {
        const quantityInput = document.querySelector(`[data-id="${productId}"]`)
            .parentElement.querySelector('.carProdCantidad');
        let quantity = parseInt(quantityInput.value);

        if(action === 'increase') {
            quantity++;
        } else if(quantity > 1) {
            quantity--;
        }

        fetch('/cart/update', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `product_id=${productId}&quantity=${quantity}`
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                location.reload();
            }
        });
    }

    function removeFromCart(productId) {
        fetch('/cart/remove', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `product_id=${productId}`
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                location.reload();
            }
        });
    }
});