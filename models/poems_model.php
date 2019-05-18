<?php

class Poems_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function authors()
    {
        $sth=$this->db->prepare("SELECT nume,id FROM autor");
        $sth->execute();
        $data=$sth->fetchAll(PDO::FETCH_ASSOC);
        $count = $sth->rowCount();
        if($count){
            return $data;
        }
        else echo "No results found";
    }

    public function authorsPoem($var)
    {
        $data = [
            ':id' => $var,
        ];
        $sth=$this->db->prepare("SELECT p.id_autor, p.titlu,a.nume FROM poezie_romana p 
                                           JOIN autor a on p.id_autor=a.id 
                                           WHERE p.id_autor=:id");
        $sth->execute($data);
        $result=$sth->fetchAll(PDO::FETCH_ASSOC);

        $count = $sth->rowCount();
        if($count>0){
            return $result;
        }
        else echo "No results found!";
    }

}
