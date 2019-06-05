<?php


class PoemsModel extends APIModel
{
    function __construct()
    {
        parent::__construct();
    }

    public function getPoems(){
        $sql = "SELECT c.nume, titlu, poezie FROM POEZIE_ROMANA p
                JOIN AUTOR c ON c.id = p.id_autor";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $count = $stmt->rowCount();
        if($count){
            http_response_code(200);
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }
        else {
            http_response_code(404);

            $message = "Nu exista poezii!";
            return json_encode(array(  'message' => $message ));
        }
    }

}