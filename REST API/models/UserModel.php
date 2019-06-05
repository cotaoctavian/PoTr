<?php

class UserModel extends APIModel{

    public function __construct()
    {
        parent::__construct();
    }

    public function getUsers(){
        $sql = "SELECT nume, email, photo, admin FROM USER";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $count = $stmt->rowCount();
        if($count){
            http_response_code(200);
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }
        else {
            http_response_code(404);

            $message = "Nu exista niciun utilizator!";
            return json_encode(array(  'message' => $message ));
        }
    }
}