<?php

// ---- TODO : Commenter ce bout de code, qu'est-ce qu'il recherche ? ----
require_once __DIR__ . "/controllers/BaseController.php";
require_once __DIR__ . "/controllers/UserController.php";
require_once __DIR__ . "/controllers/StyleController.php";

// ---- TODO : Commenter ce bout de code ----
$routes = [
  "/api/users/list" => ['GET', 'UserController', 'getList'],
  "/api/users/get" => ['GET', 'UserController', 'get'],
  "/api/users/add" => ['POST', 'UserController', 'store'],
  "/api/users/update" => ['PUT', 'UserController', 'update'],
  "/api/users/remove" => ['DELETE', 'UserController', 'destroy'],
];

$routes = [
  "/api/style/list" => ['GET', 'StyleController', 'getList'],
  "/api/style/get" => ['GET', 'StyleController', 'get'],
  "/api/style/add" => ['POST', 'StyleController', 'store'],
  "/api/style/update" => ['PUT', 'StyleController', 'update'],
  "/api/style/remove" => ['DELETE', 'StyleController', 'destroy'],
];
