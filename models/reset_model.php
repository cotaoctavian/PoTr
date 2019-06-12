<?php


class Reset_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function changePassword()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $new_pass= '';
        for ($i = 0; $i < 10; $i++) {
            $new_pass .= $characters[rand(0,50)];
        }
        $email = $_POST['email'];
        $subject = 'Resetare parola';
        $message = 'Noua parola este: '. $new_pass . ' ! ';
        $headers = 'From: ' . $email . "\r\n" .
            'Reply-To: ' . $email . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        $erori = 0;
        if (!isset($_POST['email']) || strlen($_POST['email']) == 0) {
            $erori = 1;
        }
        if ($erori == 1) {
            echo "Toate campurile sunt obligatorii!";
        } else {
            if ((preg_match('/\b@yahoo.com/', $_POST['email'])) || (preg_match('/\b@gmail.com/', $_POST['email']))) {
                    $sth = $this->db->prepare("UPDATE user set parola=:parola WHERE email=:email");
                    $sth->execute(array(
                        ':parola' => md5($new_pass),
                        ':email' => $_POST['email']
                    ));

                    $count = $sth->rowCount();
                    if ($count > 0)
                        if (isset($email)) {
                            if (mail($email, $subject, $message)) {
                                header('location:../signin');
                            } else {
                                echo "Eroare la resetare parola!";
                            }
                        } else echo "Eroare la resetare parola!";
                } else echo "Eroare!";

            }
        }
}