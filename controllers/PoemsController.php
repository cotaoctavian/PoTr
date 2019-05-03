<?php

require 'models/poems_model.php';

class Poems extends Controller{

    function __construct(){
        $this->view = new View();
        $this->model = new Poems_Model();
    }

    function index(){
        $this->view->authorData=$this->model->authors();
        $this->view->render('poems/index');
    }

    function authorsPoem($var){
        $this->view->authorData=$this->model->authors();
        $this->view->poemData=$this->model->authorsPoem($var);
        $this->view->render('poems/index');
    }

}