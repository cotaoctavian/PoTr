<?php

class ResetPass extends Controller{
    public function index(){
        $reset_pass = $this->model('ResetPass');

        $this->view('reset_pass/index');
    }


}