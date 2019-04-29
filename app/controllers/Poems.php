<?php

class Poems extends Controller{
    public function index(){
        $poems = $this->model('Poems');

        $this->view('poems/index');
    }


}