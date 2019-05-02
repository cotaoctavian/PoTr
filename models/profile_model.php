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
}