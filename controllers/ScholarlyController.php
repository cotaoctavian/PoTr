<?php


class Scholarly extends Controller
{
    function __construct()
    {
        $this->view = new View();
    }

    function index()
    {
        $this->view->render('scholarly/index');
    }

}