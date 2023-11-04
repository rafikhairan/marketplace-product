<?php
  class Cart extends Controller 
  {
    protected $cart;

    public function __construct()
    {
      if(isset($_SESSION['user_logged'])) {
        $this->cart = $this->model('Cart_model')->getCartID($_SESSION['user_logged']['id']);
      }
    }

    public function index() 
    {
      $data = [
        'products' => $this->model('Cart_model')->getProductsFromCart($_SESSION['user_logged']['id']),
        'quantity' => $this->model('Cart_model')->sumQuantity($this->cart['id'])
      ];

      echo json_encode($data);
    }

    public function store() 
    {
      $data = json_decode(file_get_contents("php://input"), true);
      
      if(!$this->cart) {
        $this->model('Cart_model')->createCart($_SESSION['user_logged']['id']);
        $this->cart = $this->model('Cart_model')->getCartID($_SESSION['user_logged']['id']);
      }
      
      $productInCart = $this->model('Cart_model')->productInCart($data);

      if($productInCart) {
        $this->model('Cart_model')->updateCart($data);
        exit;
      }

      $this->model('Cart_model')->storePivotTable($data);
    }

    public function update() {
      $data = json_decode(file_get_contents("php://input"), true);
      $total_price = $this->model('Cart_model')->getTotalPrice($this->cart['id']);
      
      foreach($data['products'] as $product) {
        $this->model('Cart_model')->updateCart($this->cart['id'], $product);
      }

      $this->model('Cart_model')->updateTotalPrice($this->cart['id'], $total_price);
    }

    public function deleteProduct() {
      $data = json_decode(file_get_contents("php://input"), true);
      $this->model('Cart_model')->deleteProductFromCart($data);
    }
  }