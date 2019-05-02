<?php

require 'models/dashboard_model.php';

class Dashboard extends Controller
{
    function __construct()
    {
        $this->view = new View();
        $this->model = new Dashboard_Model();
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == false) {
            Session::destroy();
            header('location:../signin');
            exit;
        }
    }
    function index()
    {
        $this->view->render('dashboard/index');
    }

    function logout(){
        Session::destroy();
        header('location:../signin');
        exit;

    }
}