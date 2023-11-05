<?php
  class Dashboard extends Controller 
  {
    public function index() 
    {
      $data['users'] = $this->model('User_model')->getAllUsers();

      $this->view('layout/dashboard/header');
      $this->view('dashboard/index', $data);
      $this->view('layout/dashboard/footer');
    }

    public function products($category)
    {
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

      $data = [
        'title' => $category,
        'products' => $this->model('Product_model')->getAllProductByCategory($category_id),
      ];

      $this->view('layout/dashboard/header');
      $this->view('dashboard/products', $data);
      $this->view('layout/dashboard/footer');
    }

    public function categories()
    {
      $data['categories'] = $this->model('Category_model')->getAllCategories();

      $this->view('layout/dashboard/header');
      $this->view('dashboard/categories', $data);
      $this->view('layout/dashboard/footer');
    }

    public function createCategory()
    {
      $this->model('Category_model')->createCategory($_POST['category']);

      Flasher::setFlash('green', 'Category successfully created!');

      header('Location: ' . BASEURL . '/dashboard/categories');
      exit;
    }

    public function deleteCategory($category_id)
    {
      $this->model('Category_model')->deleteCategory($category_id);
      
      Flasher::setFlash('green', 'Category successfully deleted!');
      
      header('Location: ' . BASEURL . '/dashboard/categories');
      exit;
    }
    
    public function editCategory($category_id)
    {
      $this->model('Category_model')->editCategory($category_id, $_POST['edit-category']);
      
      Flasher::setFlash('green', 'Category successfully edited!');

      header('Location: ' . BASEURL . '/dashboard/categories');
      exit;
    }
  }