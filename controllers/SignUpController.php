<?php

require 'models/signup_model.php';

class SignUp extends Controller{

    function __construct(){
        $this->view = new View();
        $this->model = new SignUp_Model();
    }

    function index(){
        $this->view->render('signup/index');
    }

}