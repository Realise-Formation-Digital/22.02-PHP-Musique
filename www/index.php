<?php

  // Récupération des constantes d'accès pour la base de données
  require_once __DIR__ . "/config.php";

  // Liste des routes (endpoints) qui seront accessibles depuis le front-end
  require_once __DIR__ . "/routes.php";

  /**
   * Récupération d'une partie de l'url en entrée 
   * (ex.: https://localhost:8080/api/users/list => on récupère /api/users/list)
   */
  $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

  /**
   * Vérification si l'url ne correspond pas à une des clé du tableau routes (ex. /api/users/list)
   * ou si la 1ère valeur de l'élément du tableau trouvé ne correspond pas à la méthode de la requête
   * (GET, POST, etc.), alors envoie une erreur 404 en retour.
   */
  if (!isset($routes[$uri]) || $_SERVER['REQUEST_METHOD'] != $routes[$uri][0]) {
    header("HTTP/1.1 404 Not Found");
    exit();
  }

  // Récupère la 2ème valeur de l'élément du tableau route (Le nom de la classe du controleur, ex. "UserController")
  $className = $routes[$uri][1];

  // Récupère la 3ème valeur de l'élément du tableau route (Le nom de la méthode, ex. "getList")
  $methodeName = $routes[$uri][2];

  // Crée un objet en fonction du nom du contrôleur (ex. new UserController(); )
  $objController = new $className();

  // Fait appel à la méthode du contrôleur (ex. $objController->getList(); )
  $objController->{$methodeName}();

?>