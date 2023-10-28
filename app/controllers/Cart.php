<?php
  class Cart extends Controller 
  {
    public function index() 
    {
      $data['carts'] = $this->model('Cart_model')->getProductsFromCart($_SESSION['user_logged']['id']);
      echo json_encode($data['carts']);
    }
  }