<?php

class Community_Model extends Model {
    public function __construct()
    {
       parent::__construct();
    }

    public function activeUser(){
        $sth= $this->db->prepare("SELECT u.nume, count(s.id_user) FROM user u JOIN strofa_tradusa s on u.id=s.id_user GROUP BY u.nume
                               ORDER BY COUNT(s.id_user) DESC");
        $sth->execute();
        $data=$sth->fetchAll(PDO::FETCH_ASSOC);
        $count = $sth->rowCount();
        if($count){
            return $data;
        }
        else echo "No results found";
    }

    public function mostComment(){
        $sth=$this->db->prepare("SELECT p.titlu, a.nume, COUNT(cp.id) AS 'comments' FROM poezie_romana p 
                                 JOIN autor a on a.id=p.id_autor 
                                 JOIN comentarii_poezie cp on cp.id_poezie_romana=p.id
                                 GROUP BY p.titlu, a.nume,p.id
                                 ORDER BY 3 DESC");
        $sth->execute();
        $data=$sth->fetchAll(PDO::FETCH_ASSOC);
        $count=$sth->rowCount();
        if($count){
            return $data;
        }
        else echo "No results found";

    }


}