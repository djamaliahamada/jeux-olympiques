<?php
    //echo '<pre>'; print_r($_SERVER); exit;
    

class MyAutoload{

    public static function start(){

        // on declare la fonction qui va permettre à notre app de declancher automatiquement
        // cette methode dans la classe encours et de lancer autoload

        spl_autoload_register(array(__CLASS__,'autoload'));

        $root= $_SERVER['DOCUMENT_ROOT'];
        $host= $_SERVER['HTTP_HOST'];
        $http= $_SERVER['REQUEST_SCHEME'];

        define('HOST',$http.'://'.$host.'/jeux_olympiques/');
        define('ROOT',$root.'/jeux_olympiques/');

        define('CONTROLLER', ROOT.'controller/');
        define('VIEW', ROOT.'view/');
        define('CLASSES', ROOT.'classes/');
        define('MODEL', ROOT.'model/');

        // tous les elements qui sont dans assets se font a partir d'une url et pas vers un emplacement
        define('ASSETS', HOST.'assets/');
        //echo HOST; exit;
    }

    public static function autoload($class){
        if(file_exists(MODEL.$class.'.php')){
            include_once(MODEL.$class.'.php');
        }else if(file_exists(CLASSES.$class.'.php')){
            include_once(CLASSES.$class.'.php');
        }else if(file_exists(CONTROLLER.$class.'.php')){
            include_once(CONTROLLER.$class.'.php');
        }
    }
}
    /* define('HOST','http://'.$host.'/jeux_olympiques/');
    define('ROOT',$root.'/jeux_olympiques/');

    define('CONTROLLER', ROOT.'controller/');
    define('VIEW', ROOT.'view/');
    define('CLASSES', ROOT.'classes/');

    // tous les elements qui sont dans assets se font a partir d'une url et pas vers un emplacement
    define('ASSETS', HOST.'assets/');
    //echo HOST; exit; */