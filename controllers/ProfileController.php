<?php

require 'models/profile_model.php';
require 'models/signin_model.php';

class Profile extends Controller{

    function __construct(){
        $this->view = new View();
        $this->model = new Profile_Model();
    }

    function index(){
        $this->view->render('profile/index');
    }

    function upload(){
        Session::init();
        $logged = Session::get('loggedIn');
        if(isset($_FILES['image'])){
            $errors= array();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $tmp = explode('.',$_FILES['image']['name']);
            $file_ext = strtolower(end($tmp));

            $extensions= array("jpeg","jpg","png");

            if(in_array($file_ext, $extensions)=== false){
                $errors[] = "Extensia nu este acceptata, JPEG, JPG si PNG sunt extensiile acceptate!";
            }

            if($file_size > 2097152) {
                $errors[] = 'Poza poate avea maxim 2 MB!';
            }

            if(empty($errors)==true && $logged == true) {
                move_uploaded_file($file_tmp,"assets/uploads/".$file_name);
                $this->model->upload_image($file_name, Session::get('id'));
            } else{
                print_r($errors);
            }
        }
    }

    function description(){
        Session::init();
        $logged = Session::get('loggedIn');
        if(isset($_POST['descriere'])){
            if($logged == true){
                $this->model->upload_bio($_POST['descriere'], Session::get('id'));
            }
            else{
                echo 'EROARE';
            }
        }
    }

}