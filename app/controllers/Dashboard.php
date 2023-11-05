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

    public function createProduct()
    {
      $data['categories'] = $this->model('Category_model')->getAllCategories();

      $this->view('layout/dashboard/header');
      $this->view('dashboard/create_product', $data);
      $this->view('layout/dashboard/footer');
    }

    public function storeProduct()
    {
      $explode_image = explode('.', $_FILES['image']['name']);

      $_POST['image'] = $explode_image[0] . time() . '.' . $explode_image[1];
      move_uploaded_file($_FILES['image']['tmp_name'], './images/uploads/products/' . $_POST['image']);

      $category = $this->model('Category_model')->getCategoryById($_POST['category']);
      $this->model('Product_model')->createProduct($_POST);

      Flasher::setFlash('green', 'Product successfully created!');

      header('Location: ' . BASEURL . '/dashboard/products/' . strtolower($category['category_name']));
      exit;
    }

    public function editProduct($category_id)
    {
      $data = [
        'categories' => $this->model('Category_model')->getAllCategories(),
        'product' => $this->model('Product_model')->getProductById($category_id)
      ];

      $this->view('layout/dashboard/header');
      $this->view('dashboard/edit_product', $data);
      $this->view('layout/dashboard/footer');
    }

    public function deleteProduct($product_id)
    {
      $product = $this->model('Product_model')->getProductById($product_id);

      if(file_exists('./images/uploads/products/' . $product['image'])) {
        unlink('./images/uploads/products/' . $product['image']);
      }

      $this->model('Product_model')->deleteProduct($product_id);
      
      Flasher::setFlash('green', 'Product successfully deleted!');
      
      header('Location: ' . BASEURL . '/dashboard/products/' . strtolower($product['category_name']));
      exit;
    }

    public function updateProduct($product_id)
    {
      $product = $this->model('Product_model')->getProductById($product_id);

      if($_FILES['image']['error'] !== 4) {
        if(file_exists('./images/uploads/products/' . $product['image'])) {
          unlink('./images/uploads/products/' . $product['image']);
        }
        
        $explode_image = explode('.', $_FILES['image']['name']);

        $_POST['image'] = $explode_image[0] . time() . '.' . $explode_image[1];
        move_uploaded_file($_FILES['image']['tmp_name'], './images/uploads/products/' . $_POST['image']);
      }

      $this->model('Product_model')->updateProduct($product_id, $_POST);
      $category = $this->model('Category_model')->getCategoryById($_POST['category']);
      
      Flasher::setFlash('green', 'Product successfully edited!');

      header('Location: ' . BASEURL . '/dashboard/products/' . strtolower($category['category_name']));
      exit;
    }
  }