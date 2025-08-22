<?php
session_start();
// On inclut l'autoloader généré par Composer pour charger automatiquement les classes nécessaires
require 'vendor/autoload.php';

// On inclut manuellement la classe AltoRouter (nécessaire si elle n'est pas bien autoloadée)
// require 'vendor/altorouter:altorouter:Altorouter.php';

// Création de l'instance routeur
$router = new AltoRouter();

// Définition de chemin de base de l'application
$router->setBasePath('/CodeCoin');


// Page d'accueil
$router->map('GET', '/', 'ControllerPage#homePage', 'homepage');
// Page de connexion
$router->map('GET|POST', '/connexion', 'ControllerAuth#connexion', 'connexion');
// Page d'inscription
$router->map('GET|POST', '/inscription', 'ControllerAuth#inscription', 'inscription');
// Page de déconnexion
$router->map('GET', '/deconnexion', 'ControllerAuth#deconnexion', 'deconnexion');
// Page de création d'annonce
$router->map('GET|POST', '/annonce/nouvelle', 'ControllerAnnonce#creerAnnonce', 'annonce_creer');
// Page détail d'une annonce
$router->map('GET', '/annonce/[i:id]', 'ControllerAnnonce#AnnoncePage', 'annonce_detail');
// Page profil
$router->map('GET', '/profil', 'ControllerUtilisateur#profil', 'profil');


// --- Matching ---
$match = $router->match();

if (is_array($match)) {
    list($controller, $action) = explode('#', $match['target']);
    $controller = new $controller();           
    if (is_callable([$controller, $action])) {
        call_user_func_array([$controller, $action], $match['params']);
    } else {
        http_response_code(404);
        echo "404 - Méthode non trouvée";
    }
} else {
    http_response_code(404);
    echo "404 - Page non trouvée";
}