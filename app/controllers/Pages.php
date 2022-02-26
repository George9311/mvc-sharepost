<?php
  class Pages extends Controller {

    public function __construct(){
    }

    public function index(){
        


      $data = [
        'title' => 'trainerup.ro',
        'description' => 'Simple houseitems counter',
        'searchTitle' => 'Hi! How can we help You?'
      ];
      

     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [

        'title' => 'About items',
        'description' => 'All your items are here!'
        
      ];
      $this->view('pages/about', $data);
    }
    public function search(){
      $data = [

        'title' => 'Lista cu...',
        'description' => '...'
        
      ];
      $this->view('pages/search', $data);
    }

  }