<?php

class SignIn_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $erori = 0;
        if (!isset($_POST['username']) || strlen($_POST['username']) == 0) {
            $erori = 1;
        } elseif (!isset($_POST['password']) || strlen($_POST['password']) == 0) {
            $erori = 1;
        }
        if ($erori == 1) {
            echo "Toate campurile sunt obligatorii!";
        } else {
            $sth = $this->db->prepare("SELECT ID, photo, email, bio FROM user WHERE nume=:nume AND parola=:parola");
            $sth->execute(array(
                ':nume' => $_POST['username'],
                ':parola' =>md5( $_POST['password'])
            ));


            $result = $sth->fetch(PDO::FETCH_OBJ);

            $count = $sth->rowCount();
            if ($count > 0) {
                Session::init();
                Session::set('loggedIn', true);
                Session::set('username', $_POST['username']);
                Session::set('id', $result->ID);
                Session::set('photo', 'assets/uploads/' . $result->photo);
                Session::set('bio', $result->bio);
                Session::set('email',$result->email);
                header('location:../dashboard');
            } else {
                header('location:../signin');
            }
        }
    }
}