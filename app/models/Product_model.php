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

    public function deleteProduct($product_id)
    {
      $query = "DELETE FROM $this->table WHERE id = :product_id";

      $this->db->query($query);
      $this->db->bind('product_id', $product_id);
      $this->db->execute();

      return $this->db->rowCount();
    }

    public function createProduct($data)
    {
      $query = "INSERT INTO $this->table (category_id, product_name, description, stock, price, image) VALUES (:category_id, :product_name, :description, :stock, :price, :image)";

      $this->db->query($query);
      $this->db->bind('category_id', $data['category']);
      $this->db->bind('product_name', $data['product_name']);
      $this->db->bind('description', $data['description']);
      $this->db->bind('stock', $data['stock']);
      $this->db->bind('price', $data['price']);
      $this->db->bind('image', $data['image']);
      $this->db->execute();

      return $this->db->rowCount();
    }

    public function updateProduct($product_id, $data)
    {
      $query = "UPDATE $this->table SET category_id = :category_id, product_name = :product_name, description = :description, stock = :stock, price = :price, image = :image WHERE id = :product_id";

      $this->db->query($query);
      $this->db->bind('category_id', $data['category']);
      $this->db->bind('product_name', $data['product_name']);
      $this->db->bind('description', $data['description']);
      $this->db->bind('stock', $data['stock']);
      $this->db->bind('price', $data['price']);
      $this->db->bind('image', $data['image']);
      $this->db->bind('product_id', $product_id);

      $this->db->execute();

      return $this->db->rowCount();
    }
  }