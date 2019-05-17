<?php


class Reset_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function changePassword()
    {
        $email = $_POST['email'];
        $subject = 'Resetare parola';
        $message = 'Parola dumneavoastra a fost modificata cu succes! ';
        $headers = 'From: ' . $email . "\r\n" .
            'Reply-To: ' . $email . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        $erori = 0;
        if (!isset($_POST['email']) || strlen($_POST['email']) == 0) {
            $erori = 1;
        } elseif (!isset($_POST['parola']) || strlen($_POST['parola']) == 0) {
            $erori = 1;
        } elseif (!isset($_POST['pass']) || strlen($_POST['pass']) == 0) {
            $erori = 1;
        }
        if ($erori == 1) {
            echo "Toate campurile sunt obligatorii!";
        } else {
            if ((preg_match('/\b@yahoo.com/', $_POST['email'])) || (preg_match('/\b@gmail.com/', $_POST['email']))) {
                if (strcmp($_POST['parola'], $_POST['pass']) == 0 && strlen($_POST['parola']) > 5) {
                    $sth = $this->db->prepare("UPDATE user set parola=:parola WHERE email=:email");
                    $sth->execute(array(
                        ':parola' => $_POST['parola'],
                        ':email' => $_POST['email']
                    ));

                    $count = $sth->rowCount();
                    if ($count > 0) {

                        if (isset($email)) {
                            if (mail($email, $subject, $message, $headers)) {
                                header('location:../signin');
                            } else {
                                echo "Eroare la resetare parola!";
                            }
                        } else echo "Eroare la resetare parola!";
                    } else echo "Parolele nu se potrivesc!";
                } else echo "Eroare!";

            }
        }
    }
}