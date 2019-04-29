<?php

class AboutUs extends Controller{
    public function index(){
        $about = $this->model('About');

        $this->view('about/index');
    }


}