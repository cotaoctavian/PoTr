<?php

require 'models/community_model.php';

class Community extends Controller{

    function __construct(){

        $this->view = new View();
        $this->model = new Community_Model();
    }

    function index(){
        $this->view->userData=$this->model->activeUser();
        $this->view->commentData=$this->model->mostComment();
        $this->view->render('community/index');
    }

    function topuri(){
        $this->view->userData=$this->model->activeUser();
        $this->view->commentData=$this->model->mostComment();
        $this->view->render('community/index');
    }

}