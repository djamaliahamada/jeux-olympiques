<?php

class resultat_match{

    private $id_match;
    private $score_equipe_a;
    private $score_equipe_b;
    private $id_rencontre;

    public function getId_match(){
        return $this->id_match;
    }
    public function setId_match($id_match){
        $this->id_match = $id_match;
    }

    public function getScore_equipe_a(){
        return $this->score_equipe_a;
    }
    public function setScore_equipe_a($score_equipe_a){
        $this->score_equipe_a = $score_equipe_a;
    }

    public function getScore_equipe_b(){
        return $this->score_equipe_b;
    }
    public function setScore_equipe_b($score_equipe_b){
        $this->score_equipe_b = $score_equipe_b;
    }

    public function getId_rencontre(){
        return $this->id_rencontre;
    }
    public function setId_rencontre($id_rencontre){
        $this->id_rencontre = $id_rencontre;
    }
}