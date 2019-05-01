<?php

require_once 'libs/Database.php';

Database::instance();

abstract class Model
{
    abstract function __construct();
}