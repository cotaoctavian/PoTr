<?php


class APIView
{
    public function render($name){
        require 'views/' . $name . '.php';
    }
}