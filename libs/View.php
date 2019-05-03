<?php

class View {

    /**
     * @var array
     */
    public $poemData;
    public $authorData;

    public function render($name){
        require 'views/' . $name . '.php';
    }

}