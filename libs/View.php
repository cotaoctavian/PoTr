<?php

class View {

    public $userInfo;
    public $poemData;
    public $authorData;
    public $commData;
    public $language;
    public $pdata;
    public $annotations;
    public $comm_data;
    public $poemInfo;
    public $rateData;
    public $userData;
    public $commentData;

    public function render($name){
        require 'views/' . $name . '.php';
    }

}