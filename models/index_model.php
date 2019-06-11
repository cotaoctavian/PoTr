<?php

class Index_Model extends Model {
    public function __construct(){

             parent::__construct();
    }

    public function rssTable(){

        $dom = new DOMDocument('1.0', 'utf-8');
        $sth=$this->db->prepare("SELECT pt.titlu, a.nume, s.data_adaugarii, s.vizualizari, u.nume as utiliz FROM strofa_tradusa s 
                                JOIN poezie_tradusa pt on s.id_poezie_tradusa=pt.id
                                JOIN poezie_romana p on p.id=pt.id_poezie_romana
                                JOIN autor a on a.id=p.id_autor
                                JOIN user u on u.id=s.id_user
                                ORDER BY s.data_adaugarii DESC");
        $sth->execute();
        $datas=$sth->fetchAll(PDO::FETCH_ASSOC);
        $root=$dom->createElement('rss');
        $root=$dom->appendChild($root);
        $cnt=0;

        foreach ($datas as $data) {
          if($cnt<5) {
                $row = $dom->createElement('row');
                $row = $root->appendChild($row);
                $element = $dom->createElement('titlu', $data['titlu']);
                $element = $row->appendChild($element);
                $element4 = $dom->createElement('utilizator', $data['utiliz']);
                $element4 = $row->appendChild($element4);
                $element2 = $dom->createElement('nume', $data['nume']);
                $element2 = $row->appendChild($element2);
                $timestamp = time();
                $date_a = strtotime($data['data_adaugarii']);
                $date_b = strtotime(date("F d Y h:i:s", $timestamp));
                $result = $date_b - $date_a;
                $days    = abs(round($result / 86400));
                $hours   = floor(($result - ($days * 86400)) / 3600);
                $hrs= floor(abs($result / 3600) / 60);
                $minutes = floor(($result - ($days * 86400) - ($hours * 3600))/60);
                $seconds = floor(($result - ($days * 86400) - ($hours * 3600) - ($minutes*60)));
                $element3 = $dom->createElement('data', $days . ' days ' . $hrs . ' hours ' . $minutes . ' minutes ');
                $element3 = $row->appendChild($element3);
                $element1 = $dom->createElement('vizualizari', $data['vizualizari']);
                $element1 = $row->appendChild($element1);
                $cnt++;
            }
          else break;
        }
         $dom->save('rss.xml');
    }

}