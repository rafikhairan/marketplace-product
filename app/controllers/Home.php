<?php
  class Home extends Controller 
  {
    public function index() 
    {
      $data['title'] = 'Home';

      $this->view('layout/header', $data);
      $this->view('home/index');
      $this->view('layout/footer');
    }
  }