<?php
  class Category_model
  {
    private $table = 'categories';
    private $db;

    public function __construct()
    {
      $this->db = new Database;
    }

    public function getAllCategories()
    {
      $query = "SELECT * FROM $this->table";

      $this->db->query($query);

      return $this->db->resultSet();
    }

    public function createCategory($category_name)
    {
      $query = "INSERT INTO $this->table (category_name) VALUES (:category_name)";

      $this->db->query($query);
      $this->db->bind('category_name', $category_name);
      $this->db->execute();

      return $this->db->rowCount();
    }

    public function deleteCategory($category_id)
    {
      $query = "DELETE FROM $this->table WHERE id = :category_id";

      $this->db->query($query);
      $this->db->bind('category_id', $category_id);
      $this->db->execute();

      return $this->db->rowCount();
    }

    public function editCategory($category_id, $category_name)
    {
      $query = "UPDATE $this->table SET category_name = :category_name WHERE id = :category_id";

      $this->db->query($query);
      $this->db->bind('category_name', $category_name);
      $this->db->bind('category_id', $category_id);
      $this->db->execute();

      return $this->db->rowCount();
    }

    public function getCategoryById($category_id)
    {
      $query = "SELECT * FROM $this->table WHERE id = :category_id";

      $this->db->query($query);
      $this->db->bind('category_id', $category_id);

      return $this->db->single();
    }
  }