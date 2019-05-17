<?php

class View {

    public $poemData;
    public $authorData;
    public $commData;
    public $language;
    public $pdata;
    public $annotations;
    public $commentaries;
    public $poemInfo;

    public function render($name){
        require 'views/' . $name . '.php';
    }

}