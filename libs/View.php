<?php

class View {

    /**
     * @var array
     */
    public $poemData;

    public function render($name){
        require 'views/' . $name . '.php';
    }
}