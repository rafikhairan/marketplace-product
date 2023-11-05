<?php
  class Home extends Controller 
  {
    protected $data;

    public function __construct()
    {
      if(isset($_SESSION['user_logged'])) {
        $cart = $this->model('Cart_model')->getCartID($_SESSION['user_logged']['id']);
        $this->data['cart_id'] = $cart['id'];
      }
    }

    public function index() 
    {

      if(isset($_COOKIE['user_logged']) && !isset($_SESSION['user_logged'])) {
        $user = $this->model('User_model')->getUserByEmail($_COOKIE['user_logged']);

        if(!$user) {
          Flasher::setFlash('red', '<span class="font-medium">Authentication failed!</span> Please login to your account');
          setcookie('user_logged', '', time() - 3600, '/');
          header('Location: ' . BASEURL . '/auth/login');
          exit; 
        }

        $_SESSION['user_logged'] = [
          'name' => $user['name'],
          'email' => $user['email']
        ];
      }

      $this->data['title'] = 'Home';

      $this->view('layout/main/header', $this->data);
      $this->view('home/index');
      $this->view('layout/main/footer', $this->data);
    }
  }