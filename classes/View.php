<?php

class View{

    private $template;

    public function __construct($template=null)
    {
        $this->template = $template;
    }

    public function render($params=array()){

        // on doit parcourir les params et le nom et il va creer une variable dynamique
        extract($params); // soit on recupere un element d'un objet soit des elements

        $template = $this->template;

        // on utilise un styteme de cache pour stocker les pages dans une memoire tempon avant de l'afficher
        ob_start();
        include(VIEW.$template.'.php');
        $contentPage = ob_get_clean();  // vider la memoire puis le mettre dans la variable $contentPage
        include_once(VIEW.'_gabarit.php');
    }
}

