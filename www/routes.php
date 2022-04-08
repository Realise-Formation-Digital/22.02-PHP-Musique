<?php

// ---- TODO : Commenter ce bout de code, qu'est-ce qu'il recherche ? ----
require_once __DIR__ . "/controllers/BaseController.php";
require_once __DIR__ . "/controllers/ArtistController.php";

// ---- TODO : Commenter ce bout de code ----
$routes = [
  "/api/artists/list" => ['GET', 'ArtistController', 'getList'],
  "/api/artists/get" => ['GET', 'ArtistController', 'get'],
  "/api/artists/add" => ['POST', 'ArtistController', 'store'],
  "/api/artists/update" => ['PUT', 'ArtistController', 'update'],
  "/api/artists/remove" => ['DELETE', 'ArtistController', 'destroy'],
];
