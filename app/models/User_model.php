<?php
  class User_model
  {
    private $table = 'users';
    private $db;

    public function __construct()
    {
      $this->db = new Database;
    }

    public function getUserByEmail($email)
    {
      $query = "SELECT id, email, name, password, is_admin FROM $this->table WHERE email = :email";

      $this->db->query($query);
      $this->db->bind('email', $email);

      return $this->db->single();
    }

    public function createUser($data)
    {
      $query = "INSERT INTO $this->table (email, password, name) VALUES (:email, :password, :name)";

      $this->db->query($query);
      $this->db->bind('email', $data['email']);
      $this->db->bind('password', $data['password']);
      $this->db->bind('name', $data['name']);
      $this->db->execute();

      return $this->db->rowCount();
    }

    public function getAllUsers() {
      $query = "SELECT name, no_telpon, alamat FROM $this->table WHERE name != 'Admin'";

      $this->db->query($query);

      return $this->db->resultSet();
    }
  }