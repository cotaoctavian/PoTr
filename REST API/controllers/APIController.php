<?php

class API extends ControllerAPI
{

    function __construct()
    {
        $this->view = new APIView();
    }

    function index()
    {
        header('Content-Type: text/html');
        $this->view->render('index/index');
    }
}