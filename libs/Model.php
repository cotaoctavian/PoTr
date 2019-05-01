<?php

require_once 'classes/Database.php';

Database::instance();

abstract class Model
{
    abstract function __construct();
}