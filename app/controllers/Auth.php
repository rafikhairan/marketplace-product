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
        Flasher::setFlash('green', '<span class="font-medium">Registration successful!</span> Please login to your account');
        header('Location: ' . BASEURL . '/auth/login');
        exit;    
      }

      Flasher::setFlash('red', '<span class="font-medium">Registration failed!</span> Please check your inputs and try again');
      header('Location: ' . BASEURL . '/auth/register');
    }

    public function check() {
      $user = $this->model('User_model')->getUserByEmail($_POST['email']);

      if($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user_logged'] = [
          'name' => $user['name'],
          'email' => $user['email']
        ];

        if(isset($_POST['remember'])) {
          setcookie('user_logged', $user['email'], strtotime("+7 days"), "/");
        }

        header('Location: ' . BASEURL . '/');
        exit;
      }

      Flasher::setFlash('red', '<span class="font-medium">Login failed!</span> Please check your inputs and try again');
      header('Location: ' . BASEURL . '/auth/login');
    }

    public function logout() {
      session_destroy();
      setcookie('user_logged', '', time() - 3600, '/');
      header('Location: '. BASEURL . '/');
    }
  }