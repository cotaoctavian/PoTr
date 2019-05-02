<?php

class SignIn_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $sth = $this->db->prepare("SELECT ID FROM user WHERE nume=:nume AND parola=:parola");
        $sth->execute(array(
            ':nume' => $_POST['username'],
            ':parola' => $_POST['password']
        ));

        //$data = $sth->fetchAll();
       // print_r($data);

        $count = $sth->rowCount();
        if ($count > 0) {
            Session::init();
            Session::set('loggedIn', true);
            header('location:../dashboard');
        }
        else {
            header('location:../signin');
        }
    }
}