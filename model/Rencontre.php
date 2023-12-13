<?php

class Rencontre{

    private $id_rencontre;
    private $lieu;
    private $type;
    private $id_equipe_a;
    private $id_equipe_b;
    private $date_rencontre;

    public function getId_rencontre(){
        return $this->id_rencontre;
    }
    public function setId_rencontre($id_rencontre){
        $this->id_rencontre = $id_rencontre;
    }

    public function getLieu(){
        return $this->lieu;
    }
    public function setLieu($lieu){
        $this->lieu = $lieu;
    }

    public function getType(){
        return $this->type;
    }
    public function setType($type){
        $this->type = $type;
    }

    public function getId_equipe_a(){
        return $this->id_equipe_a;
    }
    public function setId_equipe_a($id_equipe_a){
        $this->id_equipe_a = $id_equipe_a;
    }

    public function getId_equipe_b(){
        return $this->id_equipe_b;
    }
    public function setId_equipe_b($id_equipe_b){
        $this->id_equipe_b = $id_equipe_b;
    }

    public function getDate_rencontre(){
        return $this->date_rencontre;
    }
    public function setDate_rencontre($date_rencontre){
        $this->date_rencontre = $date_rencontre;
    }
}