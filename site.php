<?php
//chemin du systeme
define('PATH_SYSTEM', __DIR__ .'/system');
define('PATH_APPLICATION', __DIR__ . '/site');

//prendre les constants configuration
require (PATH_SYSTEM . '/config/config.php');

//Ouvrir le fichier Common.php, charger la fonction Load() dans ce fichier
include_once PATH_SYSTEM . '/core/Common.php';

// lancer la progamation principal
Load();

?>