<?php

class Personnel{

    private $id_personnel;
    private $prenom;
    private $nom;
    private $sexe;
    private $role;
    private $id_equipe;

    public function getId_personnel(){
        return $this->id_personnel;
    } 
    public function setId_personnel($id_personnel){
        $this->id_personnel = $id_personnel;
    }

    public function getPrenom(){
        return $this->prenom;
    } 
    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function getNom(){
        return $this->nom;
    } 
    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getSexe(){
        return $this->sexe;
    } 
    public function setSexe($sexe){
        $this->sexe = $sexe;
    }

    public function getRole(){
        return $this->role;
    } 
    public function setRole($role){
        $this->role = $role;
    }
    public function getId_equipe(){
        return $this->id_equipe;
    } 
    public function setId_equipe($id_equipe){
        $this->id_equipe = $id_equipe;
    }
}