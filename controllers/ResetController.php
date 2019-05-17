<?php

require 'models/reset_model.php';

class Reset extends Controller{

    function __construct(){
        $this->view = new View();
        $this->model = new Reset_Model();
    }

    function index(){
        $this->view->render('reset/index');
    }

    function changePassword(){
        $this->model->changePassword();
    }

}