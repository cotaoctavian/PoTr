<?php

require_once 'classes/Database.php';



class Model
{
    function __construct(){
            $this->db=Database::instance();
    }
}