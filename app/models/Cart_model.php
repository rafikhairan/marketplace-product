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
      $query = "SELECT $this->relation_one.product_name, $this->relation_one.image, $this->pivot_table.quantity, $this->pivot_table.subtotal FROM $this->relation_one JOIN $this->pivot_table ON $this->relation_one.id = $this->pivot_table.product_id WHERE $this->pivot_table.cart_id = (SELECT id FROM $this->table WHERE $this->table.user_id = :user_id)";

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

    public function getCartID($user_id)
    {
      $query = "SELECT id FROM $this->table WHERE user_id = :user_id";

      $this->db->query($query);
      $this->db->bind('user_id', $user_id);

      return $this->db->single();
    }

    public function storePivotTable($data)
    {
      $query = "INSERT INTO $this->pivot_table VALUES (:cart_id, :product_id, :quantity, :subtotal)";

      $this->db->query($query);
      $this->db->bind('cart_id', $data['cart_id']);
      $this->db->bind('product_id', $data['product_id']);
      $this->db->bind('quantity', $data['quantity']);
      $this->db->bind('subtotal', $data['subtotal']);
      $this->db->execute();

      return $this->db->rowCount();
    }
  }