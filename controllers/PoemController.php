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
        //$values = array([$var, $var1]);
         if($this->model->poem($var, $var1, $var2)){
             $this->view->poemData = $this->model->poem($var, $var1, $var2);
        }
        $this->view->pdata = $this->model->getPoem($var, $var1, $var2);
        $this->view->annotations = $this->model->getAnnotations($var, $var1, $var2);
        $this->view->commentaries = $this->model->getCommentaries($var, $var1, $var2);
        $this->view->poemInfo = $this->model->getPoemInfo($var, $var1, $var2);
        $this->view->commData = $this->model->poem_comm($var, $var1);
        //$this->view->authorData = $values;
        $this->view->language = $var2;
        Session::init();
        $logged = Session::get('loggedIn');
        if($logged)  {
            $this->view->userInfo = $this->model->userInfo(Session::get('id'));
            $this->view->rateData = $this->model->rateInfo(Session::get('id'));
        }
        if (isset($_POST['comment']) && !empty($_POST['comment']) && !ctype_space($_POST['comment'])) {
            if ($logged) {
                $this->model->addComm($_POST['comment'], Session::get('id'), $var, $var1, $var2);
            } else {
                return 0;
            }
        }
        $this->view->render('poem/index');
    }

    function verseAnnotation($author_id, $title, $language, $verse_id){
        Session::init();
        $logged = Session::get('loggedIn');
        if(isset($_POST['annotation']) && !empty($_POST['annotation']) && !ctype_space($_POST['annotation'])){
            if($logged){
                $this->model->addAnnotation($_POST['annotation'], Session::get('id'), $author_id, $title, $language, $verse_id);
            }
            else {
                return 0;
            }
        }else return 0;
    }

    function verseComments($author_id, $title, $language, $verse_id){
        Session::init();
        $logged = Session::get('loggedIn');
        if(isset($_POST['comm']) && !empty($_POST['comm']) && !ctype_space($_POST['comm'])){
            if($logged){
                $this->model->addComment($_POST['comm'], Session::get('id'), $author_id, $title, $language, $verse_id);
            }
            else {
                return 0;
            }
        }else return 0;
    }

    function verseRating($author_id, $title, $language, $verse_id){
        Session::init();
        $logged = Session::get('loggedIn');
        if(isset($_POST['rating'])){
            if($logged){
                $this->model->addRating($_POST['rating'], $author_id, $title, $language, $verse_id, Session::get('id'));
            }
            else{
                return 0;
            }
        } else return 0;
    }

    function addTranslation($author_id, $title, $language, $poem_id, $no_verse){
        Session::init();
        if(isset($_POST['translate'])  && !empty($_POST['translate']) && !ctype_space($_POST['translate']) ){
            $this->model->addTranslation($author_id, $title, $language, $poem_id, $no_verse, Session::get('id'), $_POST['translate']);
        }
    }

    function deleteTranslation($author_id, $title, $language, $poem_id){
        $this->model->deleteTranslation($author_id, $title, $language, $poem_id);
    }

    function deleteVerseComment($author_id, $title, $language, $comm_id){
        $this->model->deleteVerseComment($author_id, $title, $language, $comm_id);
    }

    function deleteVerseAnnotation($author_id, $title, $language, $adn_id){
        $this->model->deleteVerseAnnotation($author_id, $title, $language, $adn_id);
    }

    function deleteComm($author_id, $title, $language, $comm_id){
        $this->model->deleteComment($author_id, $title, $language, $comm_id);
    }

    function share($author_id, $title, $language, $verse_id)
    {
       $this->model->share($author_id, $title, $language, $verse_id);
    }
}

