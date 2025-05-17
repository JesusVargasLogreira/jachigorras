
<?php
class Cart {
    private $items = [];
    
    public function addItem($product, $quantity = 1) {
        $id = $product['id'];
        if (isset($this->items[$id])) {
            $this->items[$id]['quantity'] += $quantity;
        } else {
            $this->items[$id] = [
                'product' => $product,
                'quantity' => $quantity
            ];
        }
    }

    public function removeItem($productId) {
        if (isset($this->items[$productId])) {
            unset($this->items[$productId]);
        }
    }

    public function updateQuantity($productId, $quantity) {
        if (isset($this->items[$productId])) {
            $this->items[$productId]['quantity'] = $quantity;
        }
    }

    public function getItems() {
        return $this->items;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['product']['price'] * $item['quantity'];
        }
        return $total;
    }

    public function clear() {
        $this->items = [];
    }
}