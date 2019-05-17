<?php

require 'models/poem_model.php';


class Poem extends Controller
{

    function __construct()
    {
        $this->view = new View();
        $this->model = new Poem_Model();
    }

    function index()
    {
        $this->view->render('poem/index');
    }

    function poezie($var, $var1, $var2)
    {
        $values = array([$var, $var1]);
        $this->view->poemData = $this->model->poem($var, $var1, $var2);
        $this->view->pdata = $this->model->getPoem($var, $var1, $var2);
        $this->view->commData = $this->model->poem_comm($var, $var1);
        //$this->view->authorData = $values;
        $this->view->language = $var2;
        Session::init();
        $logged = Session::get('loggedIn');
        if (isset($_POST['comment']) && !empty($_POST['comment']) && !ctype_space($_POST['comment'])) {
            if ($logged == true) {
                $this->model->addComm($_POST['comment'], Session::get('id'), $var, $var1, $var2);
            } else {
                echo 'EROARE';
            }
        }
        $this->view->render('poem/index');
    }

    function share($var, $var1, $var2)
    {
        $options = array(
            'http' =>
                array(
                    'ignore_errors' => true,
                    'method' => 'POST',
                    'header' =>
                        array(
                            0 => 'Authorization: Bearer xCLVc^1dgI**nRrHwsq2w6tlVPYgFH^Q^kJY9rm4b^x!n$vkK)A*zwL@nC1o#K8i',
                            1 => 'Content-Type: application/x-www-form-urlencoded',
                        ),
                    'content' =>
                        http_build_query(array(
                            'title' => 'My first post!',
                            'content' => 'Hello, Im Octavian!',
                            'tags' => 'potr',
                            'categories' => 'poems',
                        )),
                ),
        );

        $context = stream_context_create($options);
        $response = file_get_contents(
            'https://public-api.wordpress.com/rest/v1.2/sites/162185500/posts/new/',
            false,
            $context
        );
        $response = json_decode($response);
        header('location:../../../../poem/poezie/'.$var.'/'.$var1.'/'.$var2);
    }
}

