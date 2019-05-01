<?php

class View {

    public function render($name){
        require 'views/' . $name . '.php';
    }
}