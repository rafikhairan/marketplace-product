<?php
  class Product_model
  {
    private $table = 'products';
    private $relation = 'categories';
    private $db;

    public function __construct()
    {
      $this->db = new Database;
    }

    public function getAllProductByCategory($category_id, $limit = false, $offset = false)
    {
      if(!$limit || !$offset) {
        $query = "SELECT * FROM $this->table WHERE category_id = :category_id";
      } else {
        $query = "SELECT * FROM $this->table WHERE category_id = :category_id LIMIT $limit OFFSET $offset";
      }

      $this->db->query($query);
      $this->db->bind('category_id', $category_id);

      return $this->db->resultSet();
    }

    public function getProductById($product_id)
    {
      $query = "SELECT $this->table.*, $this->relation.category_name FROM $this->table JOIN $this->relation ON $this->table.category_id = $this->relation.id WHERE $this->table.id = :product_id";

      $this->db->query($query);
      $this->db->bind('product_id', $product_id);

      return $this->db->single();
    }

    public function countProductByCategory($category_id)
    {
      $query = "SELECT COUNT(*) as total_product FROM $this->table WHERE category_id = :category_id";

      $this->db->query($query);
      $this->db->bind('category_id', $category_id);

      return $this->db->single();
    }
  }