<?php

class SignIn extends Controller{
    public function index(){
        $sign_in = $this->model('SignIn');

        $this->view('sign_in/index');
    }


}