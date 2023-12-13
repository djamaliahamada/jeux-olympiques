<?php
  
  include("_config.php");

  //appelé le systeme d'autoload
    MyAutoload::start();

  //include(CLASSES."Routeur.php");
  // au lieu d'avoir quelque chose comme jeux_olympique/index.php 
  // on veut avoir jeux_olympiques/home 

  
  if(isset($_GET['r'])){
    $request =$_GET['r']; //index.php?r=...
  }else{
    header("location: home");
  }

  /* if($request== "home"){
    include(CONTROLLER."HomeController.php");
  }else{
    echo " 404";
  } */
  // pour eviter d'avoir une url comme ca http://localhost/jeux_olympiques/idex.php?r=home
  // on va faire la reecriture d'url pour avoir quelque chose comme http://localhost/jeux_olympiques/home
  
  // nous allons utiliser un systeme de routage 

  $routeur= new Routeur($request);
  $routeur->renderController();

