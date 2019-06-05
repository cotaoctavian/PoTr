<?php


class VerseCommentsModel extends APIModel
{
    function __construct()
    {
        parent::__construct();
    }

    function getComments(){
        $sql = "SELECT c.nume, p.descriere FROM comentarii_strofa p
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

            $message = "Nu exista comentarii!";
            return json_encode(array(  'message' => $message ));
        }
    }

}