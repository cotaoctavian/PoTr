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

    function poezie($author_id, $title, $language)
    {
        //$values = array([$var, $var1]);
        $this->view->poemData = $this->model->poem($author_id, $title, $language);
        $this->view->pdata = $this->model->getPoem($author_id, $title, $language);
        $this->view->annotations = $this->model->getAnnotations($author_id, $title, $language);
        $this->view->commentaries = $this->model->getCommentaries($author_id, $title, $language);
        $this->view->poemInfo = $this->model->getPoemInfo($author_id, $title, $language);
        $this->view->commData = $this->model->poem_comm($author_id, $title);
        //$this->view->authorData = $values;
        $this->view->language = $language;
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged) {
            $this->view->userInfo = $this->model->userInfo(Session::get('id'));
            $this->view->rateData = $this->model->rateInfo(Session::get('id'));
        }
        if (isset($_POST['comment']) && !empty($_POST['comment']) && !ctype_space($_POST['comment'])) {
            if ($logged) {
                $this->model->addComm($_POST['comment'], Session::get('id'), $author_id, $title, $language);
            } else {
                return 0;
            }
        }
        $this->view->render('poem/index');
    }

    function verseAnnotation($author_id, $title, $language, $verse_id)
    {
        Session::init();
        $logged = Session::get('loggedIn');
        if (isset($_POST['annotation']) && !empty($_POST['annotation']) && !ctype_space($_POST['annotation'])) {
            if ($logged) {
                $this->model->addAnnotation($_POST['annotation'], Session::get('id'), $author_id, $title, $language, $verse_id);
            } else {
                return 0;
            }
        } else return 0;
    }

    function verseComments($author_id, $title, $language, $verse_id)
    {
        Session::init();
        $logged = Session::get('loggedIn');
        if (isset($_POST['comm']) && !empty($_POST['comm']) && !ctype_space($_POST['comm'])) {
            if ($logged) {
                $this->model->addComment($_POST['comm'], Session::get('id'), $author_id, $title, $language, $verse_id);
            } else {
                return 0;
            }
        } else return 0;
    }

    function verseRating($author_id, $title, $language, $verse_id)
    {
        Session::init();
        $logged = Session::get('loggedIn');
        if (isset($_POST['rating'])) {
            if ($logged) {
                $this->model->addRating($_POST['rating'], $author_id, $title, $language, $verse_id, Session::get('id'));
            } else {
                return 0;
            }
        } else return 0;
    }

    function addTranslation($author_id, $title, $language, $poem_id, $no_verse)
    {
        Session::init();
        if (isset($_POST['translate']) && !empty($_POST['translate']) && !ctype_space($_POST['translate'])) {
            $this->model->addTranslation($author_id, $title, $language, $poem_id, $no_verse, Session::get('id'), $_POST['translate']);
        }
    }

    function deleteTranslation($author_id, $title, $language, $poem_id)
    {
        $this->model->deleteTranslation($author_id, $title, $language, $poem_id);
    }

    function deleteVerseComment($author_id, $title, $language, $comm_id)
    {
        $this->model->deleteVerseComment($author_id, $title, $language, $comm_id);
    }

    function deleteVerseAnnotation($author_id, $title, $language, $adn_id)
    {
        $this->model->deleteVerseAnnotation($author_id, $title, $language, $adn_id);
    }

    function deleteComm($author_id, $title, $language, $comm_id)
    {
        $this->model->deleteComment($author_id, $title, $language, $comm_id);
    }

    function share($author_id, $title, $language, $verse_id)
    {
        $this->model->share($author_id, $title, $language, $verse_id);
    }
}

