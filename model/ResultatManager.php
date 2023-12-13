<?php

class ResultatManager{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new PDO("mysql:host=localhost;dbname=projet_jeux_olympiques","root","") or die("echec de connexion");
    }

    
}