<?php
    //include(CONTROLLER."HomeController.php");
class Routeur{

    private $request;
    private $routes=[
        "home"=>["controller"=>'HomeController',"method"=>'showHome'],
        
        "login"=>["controller"=>'HomeController',"method"=>'showLogin'],
        "connexion"=>["controller"=>'HomeController',"method"=>'connexion'],
        "deconnexion"=>["controller"=>'HomeController',"method"=>'deconnexion'],
        "board"=>["controller"=>'HomeController',"method"=>'showboard'],

        "add-admin"=>["controller"=>'HomeController',"method"=>'addAdmin'],
        "delete-admin"=>["controller"=>'HomeController',"method"=>'deleteAdmin'],
        "edit-admin"=>["controller"=>'HomeController',"method"=>'editAdmin'],
        "update-admin"=>["controller"=>'HomeController',"method"=>'updateAdmin'],

        // equipe 
        "equipe"=>["controller"=>'HomeController',"method"=>'showEquipe'],
        "edit-equipe"=>["controller"=>'HomeController',"method"=>'editEquipe'],
        "add-equipe"=>["controller"=>'HomeController',"method"=>'addEquipe'],
        "delete-equipe"=>["controller"=>'HomeController',"method"=>'deleteEquipe'],
        "update-equipe"=>["controller"=>'HomeController',"method"=>'updateEquipe'],

        // personnel
        "personnel"=>["controller"=>'HomeController',"method"=>'showPersonnel'],
        "ajouter-personnel"=>["controller"=>'HomeController',"method"=>'formAddPersonnel'],
        "add-personnel"=>["controller"=>'HomeController',"method"=>'AddPersonnel'],
        "delete-personnel"=>["controller"=>'HomeController',"method"=>'deletePersonnel'],
        "edit-personnel"=>["controller"=>'HomeController',"method"=>'editPersonnel'],
        "update-personnel"=>["controller"=>'HomeController',"method"=>'updatePersonnel'],

        // rencontre
        "rencontre"=>["controller"=>'HomeController',"method"=>'showRencontre'],
        "planifier-rencontre"=>["controller"=>'HomeController',"method"=>'planifierRencontre'],
        "ajouter-rencontre"=>["controller"=>'HomeController',"method"=>'addRencontre'],
        "delete-rencontre"=>["controller"=>'HomeController',"method"=>'deleteRencontre'],
        "edit-rencontre"=>["controller"=>'HomeController',"method"=>'editRencontre'],

    ];
    public function __construct($request)
    {
        $this->request=$request;
    }

    public function renderController(){
        $request=$this->request;

        if(key_exists($request,$this->routes)){
            $controller = $this->routes[$request]['controller'];
            $method     = $this->routes[$request]['method'];

            // controller demander
            $controllerDemander= new $controller();
            // on va appeler une methode
            $controllerDemander->$method();
        }else{
            $controllerDemander="";
        }
    }
}