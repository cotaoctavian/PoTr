<?php

class App
{
    function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        // print_r($url);

        if (empty($url[0])) {
            require_once 'controllers/IndexController.php';
            $controller = new Index();
            $controller->index();
            return false;
        } else {
            $file = 'controllers/' . $url[0] . 'Controller.php';
            if (file_exists($file)) {
                require $file;
            } else {
                throw new \mysql_xdevapi\Exception('Nu exista fisierul cu numele: ' . $file . '!');
            }

            $controller = new $url[0];
            if(isset($url[4])){
                $controller->{$url[1]}($url[2], $url[3], $url[4]);
            } else if (isset($url[3])) {
                $controller->{$url[1]}($url[2], $url[3]);
            } else if (isset($url[2])) {
                $controller->{$url[1]}($url[2]);
            } else {
                if (isset($url[1])) {
                    if (method_exists($controller, $url[1])) {
                        $controller->{$url[1]}();
                    } else {
                        echo 'Invalid method!';
                    }
                } else if (!isset($url[1])) {
                    $controller->index();
                }
            }

        }
    }
}