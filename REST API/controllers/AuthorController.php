<?php

require_once 'models/AuthorModel.php';

class Author extends ControllerAPI
{
    function __construct()
    {
        $this->model = new AuthorModel();
    }

    function index(){
        $var = apache_request_headers();
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            if(isset($var['Authorization']) && $var['Authorization'] == $this->authorization) {
                echo $this->model->getAuthors();
            }
            else {
                $message = "Autorizare invalida!";
                echo json_encode(array('message' => $message));
            }
        }
        else {
            $message = "INVALID REQUEST METHOD";
            echo json_encode(array('message' => $message));
        }
    }
}