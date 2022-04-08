<?php

// ---- TODO : Commenter ce bout de code, qu'est-ce qu'il recherche ? ----
require_once __DIR__ . "/controllers/BaseController.php";
require_once __DIR__ . "/controllers/ArtistController.php";
require_once __DIR__ . "/controllers/MusiqueController.php";
require_once __DIR__ . "/controllers/StyleController.php";


// ---- TODO : Commenter ce bout de code ----
$routes = [
  "/api/artists/list" => ['GET', 'ArtistController', 'getList'],
  "/api/artists/get" => ['GET', 'ArtistController', 'get'],
  "/api/artists/add" => ['POST', 'ArtistController', 'store'],
  "/api/artists/update" => ['PUT', 'ArtistController', 'update'],
  "/api/artists/remove" => ['DELETE', 'ArtistController', 'destroy'],

  "/api/musique/list" => ['GET', 'MusiqueController', 'getList'],
  "/api/musique/get" => ['GET', 'MusiqueController', 'get'],
  "/api/musique/add" => ['POST', 'MusiqueController', 'store'],
  "/api/musique/update" => ['PUT', 'MusiqueController', 'update'],
  "/api/musique/remove" => ['DELETE', 'MusiqueController', 'destroy'],

  "/api/style/list" => ['GET', 'StyleController', 'getList'],
  "/api/style/get" => ['GET', 'StyleController', 'get'],
  "/api/style/add" => ['POST', 'StyleController', 'store'],
  "/api/style/update" => ['PUT', 'StyleController', 'update'],
  "/api/style/remove" => ['DELETE', 'StyleController', 'destroy'],
];
