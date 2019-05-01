<?php

require 'models/poems_model.php';

class Poems extends Controller{

    function __construct(){
        $this->view = new View();
        $this->model = new Poems_Model();
    }

    function index(){
        $this->view->render('poems/index');
    }

}