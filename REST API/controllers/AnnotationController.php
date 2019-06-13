<?php

require_once 'models/AnnotationModel.php';

class Annotation extends ControllerAPI
{
    function __construct()
    {
        $this->model = new AnnotationModel();
    }

    function index()
    {
        $var = apache_request_headers();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (isset($var['Authorization']) && $var['Authorization'] == $this->authorization) {
                echo $this->model->getAnnotations();
            } else {
                $message = "Autorizare invalida!";
                echo json_encode(array('message' => $message));
            }
        } else {
            $message = "INVALID REQUEST METHOD";
            echo json_encode(array('message' => $message));
        }
    }

    function create()
    {
        $var = apache_request_headers();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($var['Authorization']) && $var['Authorization'] == $this->authorization) {
                $body = file_get_contents('php://input');
                $info = json_decode($body);
                echo $this->model->addAnnotation($info);
            } else {
                $message = "Autorizare invalida!";
                echo json_encode(array('message' => $message));
            }
        } else {
            $message = "INVALID REQUEST METHOD";
            echo json_encode(array('message' => $message));
        }
    }

    function delete()
    {
        $var = apache_request_headers();
        if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
            if (isset($var['Authorization']) && $var['Authorization'] == $this->authorization) {
                $body = file_get_contents('php://input');
                $info = json_decode($body);
                echo $this->model->deleteAnnotation($info);
            } else {
                $message = "Autorizare invalida!";
                echo json_encode(array('message' => $message));
            }
        } else {
            $message = "INVALID REQUEST METHOD";
            echo json_encode(array('message' => $message));
        }
    }

    function update()
    {
        $var = apache_request_headers();
        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            if (isset($var['Authorization']) && $var['Authorization'] == $this->authorization) {
                $body = file_get_contents('php://input');
                $info = json_decode($body);
                echo $this->model->updateAnnotation($info);
            } else {
                $message = "Autorizare invalida!";
                echo json_encode(array('message' => $message));
            }
        } else {
            $message = "INVALID REQUEST METHOD";
            echo json_encode(array('message' => $message));
        }
    }

}