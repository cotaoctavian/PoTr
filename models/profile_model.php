<?php

class Profile_Model extends Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function upload_image($data, $id){
        $array = [
            ':photo' => $data,
            ':id' => $id
        ];
        $sql = "UPDATE user SET photo=:photo WHERE id=:id";
        $stmt= $this->db->prepare($sql);
        $stmt->execute($array);

        $sth = $this->db->prepare("SELECT ID FROM user WHERE id=:id");
        $sth->execute(array(
            ':id' => $id
        ));

        //$data = $sth->fetchAll();
        // print_r($data);

        $photo = 'assets/uploads/'.$data;
        $count = $sth->rowCount();
        if ($count > 0) {
            Session::init();
            Session::set('photo', $photo);
            header('location:../profile');
        }
        else {
            echo 'EROARE!';
        }
    }

    public function upload_bio($data, $id){
        $array = [
            ':bio' => $data,
            ':id' => $id
        ];

        $sql = "UPDATE user SET bio=:bio WHERE id=:id";
        $stmt= $this->db->prepare($sql);
        $stmt->execute($array);

        $sth = $this->db->prepare("SELECT ID FROM user WHERE id=:id");
        $sth->execute(array(
            ':id' => $id
        ));

        $count = $sth->rowCount();
        if ($count > 0) {
            Session::init();
            Session::set('bio', $data);
            header('location:../profile');
        }
        else {
            echo 'EROARE!';
        }
    }

    public function changePass(){
        Session::init();
        $email = Session::get('email');
        $subject = 'Resetare parola';
        $message = 'Parola dumneavoastra a fost modificata cu succes! ';
        $headers = 'From: ' . $email . "\r\n" .
            'Reply-To: ' . $email . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        $erori = 0;

        if (!isset($_POST['parola']) || empty($_POST['parola'])) {
            $erori = 1;
        } elseif (!isset($_POST['pass']) || empty($_POST['pass'])) {
            $erori = 1;
        }
        if ($erori == 1) {
            echo "Toate campurile sunt obligatorii!";
        } else {
            if ((preg_match('/\b@yahoo.com/', $email)) || (preg_match('/\b@gmail.com/', $email))) {
                if (strcmp($_POST['parola'], $_POST['pass']) == 0 && strlen($_POST['parola']) > 5) {
                    $sth = $this->db->prepare("UPDATE user set parola=:parola WHERE email=:email");
                    $sth->execute(array(
                        ':parola' => $_POST['parola'],
                        ':email' => $email
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
                } else echo "Parolele nu se potrivesc!";
            } else echo "Eroare!";

        }
    }

}