<?php

abstract class Controller{
    protected $model;
    protected $view;

    abstract public function __construct();
    abstract public function index();
}