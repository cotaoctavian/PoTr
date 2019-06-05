<?php

require_once 'APIDatabase.php';

class APIModel
{
    function __construct(){
        $this->db = APIDatabase::instance();
    }
}