<?php

class SignUp extends Controller{
    public function index(){
        $sign_up = $this->model('SignUp');

        $this->view('sign_up/index');
    }


}