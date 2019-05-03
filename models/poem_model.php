<?php

class Poem_Model extends Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function poem($var, $var1){
        $data = [
            ':id' => $var,
            ':title' => $var1
        ];
        $sql = "SELECT p.poezie, p.titlu, c.nume, c.id FROM POEZIE_ROMANA p 
                JOIN autor c ON c.id = :id AND p.titlu = :title";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);


        $result = $stmt->fetch(PDO::FETCH_OBJ);

        $count = $stmt->rowCount();
        if($count > 0){
            return $result;
        }
        else{
            echo 'Nici o linie cu acest id!';
        }


    }
}