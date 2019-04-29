<?php

class Home extends Controller{
    public function index(){
        $home = $this->model('Homepage');

        $this->view('home/index');
    }


}