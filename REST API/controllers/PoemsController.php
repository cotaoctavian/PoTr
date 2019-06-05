<?php

require_once 'models/PoemsModel.php';

class Poems extends ControllerAPI
{
    function __construct()
    {
        $this->model = new PoemsModel();
    }

    function index(){
        $var = apache_request_headers();
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            if(isset($var['Authorization']) && $var['Authorization'] == $this->authorization) {
                echo $this->model->getPoems();
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