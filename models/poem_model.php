<?php

class Poem_Model extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function poem($var, $var1, $var2){ //Poem romana.
        $data = [
            ':title' => $var1,
            ':id' => $var,
            ':lang' => $var2,
        ];
        $sql = "SELECT p.poezie, p.titlu AS titlu_ro, c.nume AS nume_autor , c.id AS autor_id, d.titlu AS titlu_trad FROM POEZIE_ROMANA p 
                JOIN autor c ON p.id_autor = c.id 
                JOIN poezie_tradusa d ON d.id_poezie_romana = p.id
                WHERE p.titlu = :title AND c.id = :id AND d.limba = :lang
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

    public function getPoemInfo($var, $var1, $var2){
        $data = [
            ':title' => $var1,
            ':id' => $var,
            ':lang' => $var2,
            ':langs' => $var2,
        ];
        $sql = "SELECT b.strofa, b.nr_strofa, b.id AS id_strofa FROM POEZIE_ROMANA p 
                JOIN autor c ON p.id_autor = c.id 
                JOIN poezie_tradusa d ON d.id_poezie_romana = p.id
                JOIN strofa_tradusa b ON b.id_poezie_tradusa = d.id 
                WHERE p.titlu = :title AND c.id = :id AND d.limba = :lang AND b.limba = :langs
                ORDER BY b.nr_strofa
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

    public function getPoem($var, $var1, $var2){ //Strofe traduse.
        $data = [
            ':title' => $var1,
            ':id' => $var,
            ':lang' => $var2,
            ':langs' => $var2,
        ];
        $sql = "SELECT p.poezie, p.titlu AS titlu_ro , c.nume AS nume_autor , c.id AS autor_id , b.strofa, b.nr_strofa, u.nume AS username , u.id AS user_id, d.titlu AS titlu_trad, d.limba, b.id AS id_strofa FROM POEZIE_ROMANA p 
                JOIN autor c ON p.id_autor = c.id 
                JOIN poezie_tradusa d ON d.id_poezie_romana = p.id
                JOIN strofa_tradusa b ON b.id_poezie_tradusa = d.id 
                JOIN USER u ON u.id = b.id_user 
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

    public function getAnnotations($var, $var1, $var2){ //Adnotari per traducere.
        $data = [
            ':title' => $var1,
            ':id' => $var,
            ':lang' => $var2,
            ':langs' => $var2,
        ];
        $sql = "SELECT u.nume AS username, adn.id, adn.text AS adnotare, adn.id_strofa_tradusa FROM POEZIE_ROMANA p 
                JOIN autor c ON p.id_autor = c.id 
                JOIN poezie_tradusa d ON d.id_poezie_romana = p.id
                JOIN strofa_tradusa b ON b.id_poezie_tradusa = d.id 
                JOIN USER u ON u.id = b.id_user 
                JOIN adnotari adn ON adn.id_strofa_tradusa = b.id 
                WHERE p.titlu = :title AND c.id = :id AND d.limba = :lang AND b.limba = :langs
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

    public function getCommentaries($var, $var1, $var2){ //Comentarii per traducere.
        $data = [
            ':title' => $var1,
            ':id' => $var,
            ':lang' => $var2,
            ':langs' => $var2,
        ];
        $sql = "SELECT u.nume AS username, comm.descriere AS comentariu , comm.id, comm.id_strofa_tradusa FROM POEZIE_ROMANA p 
                JOIN autor c ON p.id_autor = c.id 
                JOIN poezie_tradusa d ON d.id_poezie_romana = p.id
                JOIN strofa_tradusa b ON b.id_poezie_tradusa = d.id 
                JOIN USER u ON u.id = b.id_user 
                JOIN comentarii_strofa comm ON comm.id_strofa_tradusa = b.id 
                WHERE p.titlu = :title AND c.id = :id AND d.limba = :lang AND b.limba = :langs
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

    public function poem_comm($var, $var1){ //Comentarii per poezie.
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

    public function addComm($text, $var ,$var1, $var2, $var3){ //Adaugare comentarii per poezie.

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

        $array = [
            ':id_poezie_romana'=> $stmt->id,
        ];

        $sth = $this->db->prepare("SELECT * FROM COMENTARII_POEZIE WHERE id_poezie_romana = :id_poezie_romana");
        $sth->execute($array);

        $count = $sth->rowCount();
        if ($count > 0) {
            header('location:../../../poezie/'.$var1.'/'.strtolower($var2).'/'.$var3);
            return $sth->fetchAll();
        }
        else {
            return 0;
        }
    }

    public function addAnnotation($annotation, $id, $author_id, $title, $language, $verse_id){ //Adaugare adnotari per traducere
        $data = [
            ':verse_id' => $verse_id,
            ':user_id' => $id,
            ':text' => $annotation,
        ];

        $sql = "INSERT INTO adnotari (id_strofa_tradusa, id_user, text) VALUES (:verse_id, :user_id, :text)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);

        $count = $stmt->rowCount();
        if($count > 0){
            header('location:../../../../poezie/'.$author_id.'/'.strtolower($title).'/'.$language);
        }
        else {
            return 0;
        }
    }

    public function addComment($comment, $id, $author_id, $title, $language, $verse_id) { //Adaugare comentarii per traducere
        $data = [
            ':verse_id' => $verse_id,
            ':user_id' => $id,
            ':text' => $comment,
        ];

        $sql = "INSERT INTO comentarii_strofa (id_strofa_tradusa, id_user, descriere) VALUES (:verse_id, :user_id, :text)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);

        $count = $stmt->rowCount();
        if($count > 0){
            header('location:../../../../poezie/'.$author_id.'/'.strtolower($title).'/'.$language);
        }
        else {
            return 0;
        }
    }

}