<?php

class SignUp_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function register()
    {
        $email = $_POST['email'];
        $subject = 'Inregistrare efectuata!';
        $message = '
        Bine ati venit!
        PoTr Translater este un site pentru cei pasionati de poezie, aici puteti adauga traduceri unor poezii sau puteti citi poeziile favorite! 
        Echipa PoTr Translater va doreste o calatorie frumoasa in lumea poeziei.';
        $headers = 'From: ' . $email . "\r\n" .
            'Reply-To: ' . $email . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        $erori = 0;

        if (!isset($_POST['email']) || strlen($_POST['email']) == 0) {
            $erori = 1;
        } elseif (!isset($_POST['username']) || strlen($_POST['username']) == 0) {
            $erori = 1;
        } elseif (!isset($_POST['parola']) || strlen($_POST['parola']) == 0) {
            $erori = 1;
        } elseif (!isset($_POST['pass']) || strlen($_POST['pass']) == 0) {
            $erori = 1;
        }
        if ($erori == 1) {
            echo "Toate campurile sunt obligatorii!";
        }
            else {
            $sql = $this->db->prepare("SELECT email from user where email=:email or nume=:nume");
            $sql->execute(array(
                ':email' => $_POST['email'],
                ':nume' => $_POST['username'],
            ));
             $sql->fetch(PDO::FETCH_OBJ);
            $count1 = $sql->rowCount();
            if ($count1 == 0) {
                if ((preg_match('/\b@yahoo.com/', $_POST['email'])) || (preg_match('/\b@gmail.com/', $_POST['email']))) {
                    if (strcmp($_POST['parola'], $_POST['pass']) == 0) {
                        $sth = $this->db->prepare("INSERT INTO  user(nume, parola, email,photo,bio,admin) values(:nume,:parola,:email,:photo,:bio,:admin)");
                        $sth->execute(array(
                            ':nume' => $_POST['username'],
                            ':parola' => md5($_POST['parola']),
                            ':email' => $_POST['email'],
                            ':photo' => null,
                            ':bio' => null,
                            ':admin' => 0
                        ));
                         $sth->fetch(PDO::FETCH_OBJ);
                        $count = $sth->rowCount();
                        if ($count > 0) {
                            if (isset($email)) {
                                if (mail($email, $subject, $message, $headers)) {
                                    header('location:../signin');
                                } else echo "Eroare la register";
                            } else echo "Eroare la register!";
                        }
                    }
                    else echo "Parolele nu se potrivesc!";
                } else echo "Eroare!";
            } else echo "Acest nume sau mail a fost folosit deja!";
        }
    }
}
