<?php

class View {

    public $poemData;
    public $authorData;
    public $commData;
    public $language;
    public $pdata;

    public function render($name){
        require 'views/' . $name . '.php';
    }

}