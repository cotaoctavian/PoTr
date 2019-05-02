<?php

require 'models/signin_model.php';

class SignIn extends Controller{

    function __construct(){
        $this->view = new View();
        $this->model = new SignIn_Model();
    }

    function index(){
        $this->view->render('signin/index');
    }

    function login(){
        $this->model->login();
    }
}