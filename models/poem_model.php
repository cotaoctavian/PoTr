<?php

class Poem_Model extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function poem($var, $var1, $var2){
        $data = [
            ':title' => $var1,
            ':id' => $var,
            ':lang' => $var2,
            ':langs' => $var2,
        ];
        $sql = "SELECT p.poezie, p.titlu AS titlu_ro , c.nume AS nume_autor , c.id AS autor_id , b.strofa, b.nr_strofa, u.nume AS username , u.id AS user_id , adn.text AS adnotare , comm.descriere AS comentariu , d.titlu AS titlu_trad, d.limba, b.id AS id_strofa, comm.id AS comm_id, adn.id AS adn_id FROM POEZIE_ROMANA p 
                JOIN autor c ON p.id_autor = c.id 
                JOIN poezie_tradusa d ON d.id_poezie_romana = p.id
                JOIN strofa_tradusa b ON b.id_poezie_tradusa = d.id 
                JOIN USER u ON u.id = b.id_user 
                JOIN comentarii_strofa comm ON comm.id_strofa_tradusa = b.id 
                JOIN adnotari adn ON adn.id_strofa_tradusa = b.id 
                WHERE p.titlu = :title AND c.id = :id AND d.limba = :lang AND b.limba = :langs
                ORDER BY b.nr_strofa, b.rating
                ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        $count = $stmt->rowCount();
        if($count > 0){
            return $result;
        }
        else{
            return 0;
        }
    }

    public function getPoem($var, $var1, $var2){
        $data = [
            ':title' => $var1,
            ':id' => $var,
            ':lang' => $var2,
            ':langs' => $var2,
        ];
        $sql = "SELECT p.poezie, p.titlu AS titlu_ro , c.nume AS nume_autor , c.id AS autor_id , b.strofa, b.nr_strofa, u.nume AS username , u.id AS user_id , adn.text AS adnotare , comm.descriere AS comentariu , d.titlu AS titlu_trad, d.limba, b.id AS id_strofa, comm.id AS comm_id, adn.id AS adn_id FROM POEZIE_ROMANA p 
                JOIN autor c ON p.id_autor = c.id 
                JOIN poezie_tradusa d ON d.id_poezie_romana = p.id
                JOIN strofa_tradusa b ON b.id_poezie_tradusa = d.id 
                JOIN USER u ON u.id = b.id_user 
                JOIN comentarii_strofa comm ON comm.id_strofa_tradusa = b.id 
                JOIN adnotari adn ON adn.id_strofa_tradusa = b.id 
                WHERE p.titlu = :title AND c.id = :id AND d.limba = :lang AND b.limba = :langs
                ORDER BY b.nr_strofa, b.rating
                ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        $count = $stmt->rowCount();
        if($count > 0){
            return $result;
        }
        else{
            return 0;
        }
    }

    public function poem_comm($var, $var1){
        $data = [
            ':id' => $var,
            ':title' => $var1
        ];

        $sql = "SELECT c.nume, p.text FROM POEZIE_ROMANA b
                JOIN autor a ON b.id_autor = a.id
                JOIN COMENTARII_POEZIE p ON p.id_poezie_romana = b.id
                JOIN user c ON c.id = p.id_user
                WHERE a.id = :id AND b.titlu = :title";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        $count = $stmt->rowCount();
        if($count > 0){
            return $result;
        }
        else{
            return 0;
        }
    }

    public function addComm($text, $var ,$var1, $var2, $var3){

        $data = [
            ':id_author' => $var1,
            ':title' => $var2,
        ];

        $sql = "SELECT p.id FROM POEZIE_ROMANA p 
                JOIN autor c ON c.id = p.id
                WHERE c.id = :id_author AND p.titlu = :title";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);

        $stmt = $stmt->fetch(PDO::FETCH_OBJ);

        $array = [
            ':id_poezie_romana'=> $stmt->id,
            ':id_user' => $var,
            ':text' => $text,
        ];


        $sql = "INSERT INTO comentarii_poezie (id_poezie_romana, id_user, text) VALUES (:id_poezie_romana, :id_user, :text)";
        $state= $this->db->prepare($sql);
        $state->execute($array);

        $sth = $this->db->prepare("SELECT * FROM COMENTARII_POEZIE");
        $sth->execute();

        $count = $sth->rowCount();
        if ($count > 0) {
            header('location:../../../poezie/'.$var1.'/'.strtolower($var2).'/'.$var3);
            return $sth->fetchAll();
        }
        else {
            return 0;
        }
    }

}