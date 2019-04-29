<?php

class Community extends Controller{
    public function index(){
        $community = $this->model('Community');

        $this->view('community/index');
    }


}