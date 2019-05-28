<?php

class View {

    public $userInfo;
    public $poemData;
    public $authorData;
    public $commData;
    public $language;
    public $pdata;
    public $annotations;
    public $commentaries;
    public $poemInfo;
    public $rateData;
    public $rssData;

    public function render($name){
        require 'views/' . $name . '.php';
    }

}