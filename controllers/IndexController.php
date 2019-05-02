<?php

require 'models/index_model.php';

class Index extends Controller{

    function __construct(){
        $this->view = new View();
        $this->model = new Index_Model();
    }

    function index(){
        $this->view->render('index/index');
    }
}