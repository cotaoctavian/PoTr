<?php

class AboutUs extends Controller{

    function __construct(){
        $this->view = new View();
    }

    function index(){
        $this->view->render('about/index');
    }

}