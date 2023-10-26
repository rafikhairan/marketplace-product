<?php
  class Product extends Controller
  {
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
      
      $data['title'] = ucwords($category);
      $data['products'] = $this->model('Product_model')->getAllProductByCategory($category_id, $limit, $offset);
      $data['count'] = $this->model('Product_model')->countProductByCategory($category_id);
      $data['current_page'] = $current_page;
      $data['total_page'] = ceil($data['count']['total_product'] / $limit);

      $this->view('layout/main/header', $data);
      $this->view('product/index', $data);
      $this->view('layout/main/footer');
    }

    public function detail($product_id) {
      $data['product'] = $this->model('Product_model')->getProductById($product_id);
      $data['title'] = $data['product']['product_name'];

      $this->view('layout/main/header', $data);
      $this->view('product/detail', $data);
      $this->view('layout/main/footer');
    }
  }