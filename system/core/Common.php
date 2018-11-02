<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
session_start(); // declare session
/**
 * fonction pour lancer l'application
 */
function Load()
{
    // Obtenir la configuration d'initialisation initiale
    $config = include_once PATH_APPLICATION . '/config/init.php';
 
    // Si vous ne transmettez pas le contrôleur, obtenez le contrôleur par défaut
    $controller = empty($_GET['c']) ? $config['default_controller'] : $_GET['c'];
 
    // Si vous ne transmettez pas l'action, obtenez l'action par défaut
    $action = empty($_GET['a']) ? $config['default_action'] : $_GET['a'];
 
    //take cookie
    
    if( isset($_COOKIE['VietPro']) ){
        $username = $_COOKIE['VietPro'];
        //verify session
         if(!$_SESSION[$username]){
            die('<br><br><br><center><h1>La page que vous recherchez est introuvable.</h1></center>');
        }
    }else if($controller != 'welcome'){
        die('<br><br><br><center><h1>La page que vous recherchez est introuvable.</h1></center>');
    }
    
    
    // Convertit le nom du contrôleur car il a le format {Nom} _Controller
    $controller = ucfirst(strtolower($controller)) . '_Controller';
 
    //Convertit le nom de l'action car elle a le format {name}Action
    $action = strtolower($action) . 'Action';

    // vérifier que le fichier contrôleur existe ou non
    if (!file_exists(PATH_APPLICATION . '/controller/' . $controller . '.php')){
        die ('<br><br><br><center><h1>La page que vous recherchez est introuvable.</h1></center>');
    }
     
    // Inclure le contrôleur principal
    include_once PATH_SYSTEM . '/core/Controller.php';
     
    // Appeler le fichier contrôleur 
    require_once PATH_APPLICATION . '/controller/' . $controller . '.php';
 
    // vérifier que la class du contrôleur existe ou non
    if (!class_exists($controller)){
        die ('<br><br><br><center><h1>La page que vous recherchez est introuvable.</h1></center>');
    }
 
    // Contrôleur d'initialisation
    $controllerObject = new $controller();
 
    // vérifier que l'action du contrôleur existe ou non
    if ( !method_exists($controllerObject, $action)){
        die ('<br><br><br><center><h1>La page que vous recherchez est introuvable.</h1></center>');
    }
     
    // Lancer l'application
    $controllerObject->{$action}();
}


?>