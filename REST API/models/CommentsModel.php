<?php


class CommentsModel extends APIModel
{
    function __construct()
    {
        parent::__construct();
    }

    public function getComments(){
        $sql = "SELECT c.nume, a.titlu, p.text FROM comentarii_poezie p
                JOIN user c ON c.id = p.id_user
                JOIN poezie_romana a ON a.id = p.id_poezie_romana";
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