<?php
  class Auth extends Controller
  {
    public function login()
    {
      $data['title'] = 'Login';

      $this->view('layout/auth/header', $data);
      $this->view('auth/login');
      $this->view('layout/auth/footer');
    }

    public function register()
    {
      $data['title'] = 'Register';

      $this->view('layout/auth/header', $data);
      $this->view('auth/register');
      $this->view('layout/auth/footer');
    }

    public function store()
    {
      $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $registered = $this->model('User_model')->getUserByEmail($_POST['email']);

      if(!$registered) {
        $this->model('User_model')->createUser($_POST);

        $user = $this->model('User_model')->getUserByEmail($_POST['email']);
        $this->model('Cart_model')->createCart($user['id']);

        Flasher::setFlash('green', 'Registration successful! Please login to your account');
        header('Location: ' . BASEURL . '/auth/login');
        exit;    
      }

      Flasher::setFlash('red', 'Registration failed! Please check your inputs and try again');
      header('Location: ' . BASEURL . '/auth/register');
    }

    public function check() {
      $user = $this->model('User_model')->getUserByEmail($_POST['email']);

      if($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user_logged'] = [
          'id' => $user['id'],
          'name' => $user['name'],
          'email' => $user['email'],
          'is_admin' => $user['is_admin'],
        ];

        if(isset($_POST['remember'])) {
          setcookie('user_logged', $user['email'], strtotime("+7 days"), "/");
        }

        if($user['is_admin']) {
          header('Location: ' . BASEURL . '/dashboard');
          exit;
        }

        header('Location: ' . BASEURL . '/');
        exit;
      }

      Flasher::setFlash('red', 'Login failed! Please check your inputs and try again');
      header('Location: ' . BASEURL . '/auth/login');
    }

    public function logout() {
      session_destroy();
      setcookie('user_logged', '', time() - 3600, '/');
      header('Location: '. BASEURL . '/');
    }
  }