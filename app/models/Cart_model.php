<?php
  class Cart_model
  {
    private $table = 'carts';
    private $relation_one = 'products';
    private $relation_two = 'users';
    private $pivot_table = 'cart_products';
    private $db;

    public function __construct()
    {
      $this->db = new Database;
    }

    public function getProductsFromCart($user_id)
    {
      $query = "SELECT products.product_name, products.price, products.image, pivot_table.product_id, pivot_table.quantity, pivot_table.subtotal FROM $this->relation_one products JOIN $this->pivot_table pivot_table ON products.id = pivot_table.product_id WHERE pivot_table.cart_id = (SELECT id FROM $this->table users WHERE users.user_id = :user_id)";

      $this->db->query($query);
      $this->db->bind('user_id', $user_id);
      
      return $this->db->resultSet();
    }

    public function createCart($user_id) 
    {
      $query = "INSERT INTO $this->table (user_id) VALUES (:user_id)";

      $this->db->query($query);
      $this->db->bind('user_id', $user_id);
      $this->db->execute();

      return $this->db->rowCount();
    }

    public function getCartId($user_id)
    {
      $query = "SELECT id FROM $this->table WHERE user_id = :user_id";

      $this->db->query($query);
      $this->db->bind('user_id', $user_id);

      return $this->db->single();
    }

    public function storePivotTable($cart_id, $data)
    {
      $query = "INSERT INTO $this->pivot_table (cart_id, product_id, quantity, subtotal) VALUES (:cart_id, :product_id, :quantity, :subtotal)";

      $this->db->query($query);
      $this->db->bind('cart_id', $cart_id);
      $this->db->bind('product_id', $data['product_id']);
      $this->db->bind('quantity', $data['quantity']);
      $this->db->bind('subtotal', $data['subtotal']);
      $this->db->execute();

      return $this->db->rowCount();
    }

    public function updateCart($cart_id, $data) {
      $query = "UPDATE $this->pivot_table SET quantity = :quantity, subtotal = :subtotal WHERE cart_id = :cart_id AND product_id = :product_id";

      $this->db->query($query);
      $this->db->bind('cart_id', $cart_id);
      $this->db->bind('product_id', $data['product_id']);
      $this->db->bind('quantity', $data['quantity']);
      $this->db->bind('subtotal', $data['subtotal']);
      $this->db->execute();

      return $this->db->rowCount();
    }

    public function getTotalPrice($cart_id) {
      $query = "SELECT SUM(subtotal) as total_price FROM $this->pivot_table WHERE cart_id = :cart_id";

      $this->db->query($query);
      $this->db->bind('cart_id', $cart_id);

      return $this->db->single();
    }

    public function updateTotalPrice($cart_id, $total_price) {
      $query = "UPDATE $this->table SET total_price = :total_price WHERE cart_id = :cart_id";

      $this->db->query($query);
      $this->db->bind('total_price', $total_price);
      $this->db->bind('cart_id', $cart_id);
      $this->db->execute();

      return $this->db->rowCount();
    }

    public function deleteProductFromCart($data) {
      $query = "DELETE FROM $this->pivot_table WHERE cart_id = :cart_id AND product_id = :product_id";

      $this->db->query($query);
      $this->db->bind('cart_id', $data['cart_id']);
      $this->db->bind('product_id', $data['product_id']);
      $this->db->execute();

      return $this->db->rowCount();
    }

    public function productInCart($cart_id, $data) {
      $query = "SELECT * FROM $this->pivot_table WHERE cart_id = :cart_id AND product_id = :product_id";

      $this->db->query($query);
      $this->db->bind('cart_id', $cart_id);
      $this->db->bind('product_id', $data['product_id']);

      return $this->db->single();
    }

    public function sumQuantity($cart_id) {
      $query = "SELECT SUM(quantity) as total FROM $this->pivot_table WHERE cart_id = :cart_id";

      $this->db->query($query);
      $this->db->bind('cart_id', $cart_id);

      return $this->db->single();
    }

    public function getCartAdmin()
    {
      $query = "SELECT carts.*, users.name, users.email, users.no_telpon, users.alamat FROM $this->table carts JOIN $this->relation_two users ON carts.user_id = users.id WHERE users.name != 'Admin'";

      $this->db->query($query);

      return $this->db->resultSet();
    }
  }