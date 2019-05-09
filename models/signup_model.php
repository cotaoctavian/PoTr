<?php

class SignUp_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function register()
    {
        if (strcmp($_POST['parola'], $_POST['pass'])==0) {
            $sth = $this->db->prepare("INSERT INTO  user(nume, parola, email,photo,bio) values(:nume,:parola,:email,:photo,:bio)");
            $sth->execute(array(
                ':nume' => $_POST['username'],
                ':parola' => $_POST['parola'],
                ':email' => $_POST['email'],
                ':photo' => null,
                ':bio' => null
            ));
            $result = $sth->fetch(PDO::FETCH_OBJ);
            $count = $sth->rowCount();
            if ($count > 0) {
                header("location:../signin");
            }
            else echo "Eroare la register!";
        }
        else echo "Parolele nu se potrivesc!";
    }
}