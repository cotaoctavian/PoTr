<?php


class StrofeModel extends APIModel
{
    function __construct()
    {
        parent::__construct();
    }

    public function getStrofe(){
        $sql = "SELECT c.nume, p.strofa, p.vizualizari, p.rating, p.limba, p.data_adaugarii FROM STROFA_TRADUSA p 
                JOIN USER c ON c.id = p.id_user
                ORDER BY p.data_adaugarii DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $count = $stmt->rowCount();
        if($count){
            http_response_code(200);
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }
        else {
            http_response_code(404);

            $message = "Nu exista strofe!";
            return json_encode(array(  'message' => $message ));
        }
    }
}