<?php


header("Content-Type: application/json; charset=UTF-8");

abstract class ControllerAPI
{
    protected $model;
    protected $authorization = "2F413F4428472B4B6250655368566D5971337436763979244226452948404D63";

    abstract public function __construct();
    abstract public function index();
}