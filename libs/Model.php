<?php

require_once 'classes/Database.php';

class Model
{
    public $db;
    function __construct(){
            $this->db = Database::instance();
    }
}