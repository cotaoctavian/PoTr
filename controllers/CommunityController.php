<?php

require 'models/community_model.php';

class Community extends Controller{

    function __construct(){
        $this->view = new View();
        $this->model = new Community_Model();
    }

    function index(){
        $this->view->render('community/index');
    }

}