<?php


class AuthorModel extends APIModel
{
    function __construct()
    {
        parent::__construct();
    }

    public function getAuthors(){
        $sql = "SELECT nume FROM autor";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $count = $stmt->rowCount();
        if($count){
            http_response_code(200);
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }
        else {
            http_response_code(404);

            $message = "Nu exista autori!";
            return json_encode(array(  'message' => $message ));
        }
    }
}