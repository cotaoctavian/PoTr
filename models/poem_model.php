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

        $array = [
            ':lang' => $var2
        ];

        $st=$this->db->prepare("UPDATE strofa_tradusa SET vizualizari = vizualizari + 1 WHERE limba = :lang");
        $st->execute($array);

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
                ORDER BY b.nr_strofa, b.rating DESC
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
        $sql = "SELECT p.poezie, p.titlu AS titlu_ro , c.nume AS nume_autor , c.id AS autor_id , b.strofa, b.nr_strofa, b.rating, u.nume AS username , u.id AS user_id, d.id AS id_poezie_tradusa, d.titlu AS titlu_trad, d.limba, b.id AS id_strofa FROM POEZIE_ROMANA p 
                JOIN autor c ON p.id_autor = c.id 
                JOIN poezie_tradusa d ON d.id_poezie_romana = p.id
                JOIN strofa_tradusa b ON b.id_poezie_tradusa = d.id 
                JOIN USER u ON u.id = b.id_user 
                WHERE p.titlu = :title AND c.id = :id AND d.limba = :lang AND b.limba = :langs
                ORDER BY b.nr_strofa, b.rating DESC
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
                WHERE p.titlu = :title AND c.id = :id AND d.limba = :lang AND b.limba = :langs ";
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
                WHERE p.titlu = :title AND c.id = :id AND d.limba = :lang AND b.limba = :langs";
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

        $sql = "SELECT c.nume, p.text, p.id FROM POEZIE_ROMANA b
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
            return 1;
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
            return 1;
        }
        else {
            return 0;
        }
    }
    
    public function addRating($rating, $author_id, $title, $language, $verse_id, $user_id){
        $array = [
            ':rating' => $rating,
            ':verse_id' => $verse_id,
        ];
        $sql = "UPDATE strofa_tradusa SET rating = :rating+rating WHERE id = :verse_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($array);

        $data = [
          ':id_user' => $user_id,
          ':id_vers' => $verse_id,
        ];

        $query = "INSERT INTO rating (id_user, id_strofa_tradusa) VALUES (:id_user, :id_vers)";
        $state = $this->db->prepare($query);
        $state->execute($data);

        $count = $stmt->rowCount();
        $count1 = $state->rowCount();
        if($count && $count1){
            header('location:../../../../poezie/'.$author_id.'/'.strtolower($title).'/'.$language);
            return 1;
        }
        else {
            return 0;
        }
    }

    public function addTranslation($author_id, $title, $language, $poem_id, $no_verse, $user_id, $strofa){
        $array = [
            ':id' => $user_id,
            ':id_poezie' => $poem_id,
            ':strofa' => '<pre class = "textarea">' . $strofa . '</pre>',
            ':nr_strofa'=> $no_verse,
            ':vizualizari' => 0,
            ':rating' => 0,
            ':lang' => $language,
        ];
        $sql = "INSERT INTO strofa_tradusa (id_user, id_poezie_tradusa, strofa, nr_strofa, vizualizari, rating, limba, data_adaugarii) VALUES (:id, :id_poezie, :strofa, :nr_strofa, :vizualizari, :rating, :lang, NOW())";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($array);

        $count = $stmt->rowCount();
        if($count){
            header('location:../../../../../poezie/'.$author_id.'/'.strtolower($title).'/'.$language);
            return 1;
        }
        else {
            return 0;
        }
    }

    public function deleteTranslation($author_id, $title, $language, $poem_id)
    {
        $array = [
            ':poem_id' => $poem_id,
        ];

        $query = "DELETE FROM rating WHERE id_strofa_tradusa = :poem_id";
        $query = $this->db->prepare($query);
        $query->execute($array);

        $sql = "DELETE FROM strofa_tradusa WHERE id = :poem_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($array);

        $count = $stmt->rowCount();
        if($count){
            header('location:../../../../poezie/'.$author_id.'/'.strtolower($title).'/'.$language);
            return 1;
        }else {
            return 0;
        }
    }

    public function deleteVerseComment($author_id, $title, $language, $comm_id)
    {
        $array = [
            ':comm_id' => $comm_id,
        ];

        $sql = "DELETE FROM comentarii_strofa WHERE id = :comm_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($array);

        $count = $stmt->rowCount();
        if($count){
            header('location:../../../../poezie/'.$author_id.'/'.strtolower($title).'/'.$language);
            return 1;
        }else {
            return 0;
        }
    }

    public function deleteVerseAnnotation($author_id, $title, $language, $adn_id)
    {
        $array = [
            ':adn_id' => $adn_id,
        ];

        $sql = "DELETE FROM adnotari WHERE id = :adn_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($array);

        $count = $stmt->rowCount();
        if($count){
            header('location:../../../../poezie/'.$author_id.'/'.strtolower($title).'/'.$language);
            return 1;
        }else {
            return 0;
        }
    }


    public function share($author_id, $title, $language, $verse_id)
    {
        $data = [
            ':verse_id' => $verse_id
        ];
        $sql = "SELECT strofa FROM strofa_tradusa WHERE id = :verse_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        $options = array(
            'http' =>
                array(
                    'ignore_errors' => true,
                    'method' => 'POST',
                    'header' =>
                        array(
                            0 => 'Authorization: Bearer xCLVc^1dgI**nRrHwsq2w6tlVPYgFH^Q^kJY9rm4b^x!n$vkK)A*zwL@nC1o#K8i',
                            1 => 'Content-Type: application/x-www-form-urlencoded',
                        ),
                    'content' =>
                        http_build_query(array(
                            'title' => ucfirst($title),
                            'content' => $result->strofa,
                            'tags' => 'PoTr',
                            'categories' => 'Poems',
                        )),
                ),
        );

        $context = stream_context_create($options);
        $response = file_get_contents(
            'https://public-api.wordpress.com/rest/v1.2/sites/162185500/posts/new/',
            false,
            $context
        );
        $response = json_decode($response);
        header('location:../../../../../poem/poezie/'.$author_id.'/'.$title.'/'.$language);
    }

    public function userInfo($id)
    {
        $array = [
            ':id' => $id
        ];

        $sql = "SELECT admin FROM user WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($array);

        $count = $stmt->rowCount();
        if($count){
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        else return 0;
    }

    public function deleteComment($author_id, $title, $language, $comm_id)
    {
        $array = [
            ':comm_id' => $comm_id,
        ];

        $sql = "DELETE FROM comentarii_poezie WHERE id = :comm_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($array);

        $count = $stmt->rowCount();
        if($count){
            header('location:../../../../poezie/'.$author_id.'/'.strtolower($title).'/'.$language);
            return 1;
        }else {
            return 0;
        }
    }

    public function rateInfo($user_id)
    {
        $array = [':user_id' => $user_id];

        $sql = "SELECT * FROM RATING WHERE id_user = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($array);

        $count = $stmt->rowCount();
        if($count){
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        else return 0;
    }

}