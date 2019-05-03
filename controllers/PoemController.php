<?php

require 'models/poem_model.php';


class Poem extends Controller{
    function __construct(){
        $this->view = new View();
        $this->model = new Poem_Model();
    }

    function index(){
        $this->view->render('poem/index');
    }

    function poem($var, $var1){
        $this->view->poemData = $this->model->poem($var, $var1);
        $this->view->render('poem/index');
    }
}