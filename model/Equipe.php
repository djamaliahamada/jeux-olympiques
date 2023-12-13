<?php

class Equipe{

    private $id_equipe;
    private $nom_equipe;

    public function getId_equipe(){
        return $this->id_equipe;
    }
    public function setId_equipe($id_equipe){
        $this->id_equipe = $id_equipe;
    }

    public function getNom_equipe(){
        return $this->nom_equipe;
    }
    public function setNom_equipe($nom_equipe){
        $this->nom_equipe = $nom_equipe;
    }
}