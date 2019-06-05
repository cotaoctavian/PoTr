<?php

require_once "models/UserModel.php";

class User extends ControllerAPI
{

    function __construct(){
        $this->model = new UserModel();
    }

    function index(){
        $var = apache_request_headers();
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            if(isset($var['Authorization']) && $var['Authorization'] == $this->authorization) {
                echo $this->model->getUsers();
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

    function users(){

    }
}