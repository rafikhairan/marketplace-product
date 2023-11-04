<?php
  class Product extends Controller
  {
    protected $data;
    
    public function __construct()
    {
      if(isset($_SESSION['user_logged'])) {
        $cart = $this->model('Cart_model')->getCartID($_SESSION['user_logged']['id']);
        $this->data['cart_id'] = $cart['id'];
      }
    }

    public function index($category = 'men', $current_page = 1)
    {
      $current_page = (int)$current_page;
      $category_id = null;
      switch($category) {
        case 'women':
          $category_id = 2;
          break;
        case 'kid':
          $category_id = 3;
          break;
        default:
          $category_id = 1;
          break;
      }

      $limit = 12;
      $offset = ($current_page - 1) * $limit;
      
      $this->data = [
        'title' => ucwords($category),
        'products' => $this->model('Product_model')->getAllProductByCategory($category_id, $limit, $offset),
        'count' => $this->model('Product_model')->countProductByCategory($category_id),
        'current_page' => $current_page
      ];
      $this->data['total_page'] = ceil($this->data['count']['total_product'] / $limit);

      $this->view('layout/main/header', $this->data);
      $this->view('product/index', $this->data);
      $this->view('layout/main/footer', $this->data);
    }

    public function detail($product_id) {
      if(!isset($_SESSION['user_logged'])) {
        Flasher::setFlash('red', '<span class="font-medium">Unauthorized Access!</span> Please login first');
        header('Location: ' . BASEURL . '/auth/login');
        exit; 
      }

      $this->data['product'] = $this->model('Product_model')->getProductById($product_id);
      $this->data['title'] = $this->data['product']['product_name'];

      $this->view('layout/main/header', $this->data);
      $this->view('product/detail', $this->data);
      $this->view('layout/main/footer', $this->data);
    }
  }