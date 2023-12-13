<?php

class Admin{

    private $id;
    private $login;
    private $mdp;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id=$id;
    }

    public function getLogin(){
        return $this->login;
    }
    public function setLogin($login){
        $this->login=$login;
    }

    public function getMdp(){
        return $this->mdp;
    }
    public function setMdp($mdp){
        $this->mdp=$mdp;
    }
}