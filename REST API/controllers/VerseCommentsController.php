<?php

require_once 'models/VerseCommentsModel.php';
class VerseComments extends ControllerAPI
{
    function __construct()
    {
        $this->model = new VerseCommentsModel();
    }

    function index(){
        $var = apache_request_headers();
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            if(isset($var['Authorization']) && $var['Authorization'] == $this->authorization) {
                echo $this->model->getComments();
            }
            else {
                $message = "Invalid authorization!";
                echo json_encode(array('message' => $message));
            }
        }
        else {
            $message = "INVALID REQUEST METHOD";
            echo json_encode(array('message' => $message));
        }
    }
}