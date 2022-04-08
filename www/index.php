<?php

  // ---- TODO : Commenter en détail ce bout de code, qu'est-ce qu'il recherche ? ----
  require_once __DIR__ . "/config.php";

  // ---- TODO : Commenter en détail ce bout de code, qu'est-ce qu'il recherche ? ----
  require_once __DIR__ . "/routes.php";

  // ---- TODO : Commenter ce bout de code ----
  $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  if (!isset($routes[$uri]) || $_SERVER['REQUEST_METHOD'] != $routes[$uri][0]) {
    header("HTTP/1.1 404 Not Found");
    exit();
  }

  // ---- TODO : Commenter ce bout de code ----
  $className = $routes[$uri][1];
  $methodeName = $routes[$uri][2];
  $objController = new $className();
  $objController->{$methodeName}();

?>
