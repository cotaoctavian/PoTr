<?php

class AnnotationModel extends APIModel
{
    function __construct()
    {
        parent::__construct();
    }

    function getAnnotations(){
        $sql = "SELECT c.nume, p.text FROM adnotari p
                JOIN user c ON c.id = p.id_user";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $count = $stmt->rowCount();
        if($count){
            http_response_code(200);
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }
        else {
            http_response_code(404);

            $message = "Nu exista adnotari!";
            return json_encode(array('message' => $message ));
        }
    }

    function addAnnotation($info){
        $data = [
            ":verse_id" => $info->id_strofa_tradusa,
            ":user_id" => $info->id_user,
            ":text" => $info->text,
        ];

        $sql = "INSERT INTO adnotari (id_strofa_tradusa, id_user, text) VALUES (:verse_id, :user_id, :text)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);

        $count = $stmt->rowCount();
        if($count > 0){
            http_response_code(200);
            return json_encode(array('message' => "Adnotare creata cu succes!"));
        }
        else {
            http_response_code(404);

            $message = "Adaugarea adnotarii a esuat!";
            return json_encode(array('message' => $message ));
        }
    }

    function deleteAnnotation($info){
        $data = [
            ":id" => $info->id,
            ":text" => $info->text,
        ];

        $sql = "UPDATE Adnotari SET text = :text WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);

        $count = $stmt->rowCount();
        if($count > 0){
            http_response_code(200);
            return json_encode(array('message' => "Adnotare modificata cu succes!"));
        }
        else {
            http_response_code(404);

            $message = "Modificarea adnotarii a esuat!";
            return json_encode(array('message' => $message ));
        }
    }




}