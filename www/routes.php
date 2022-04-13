<?php

// Appel aux controlleurs
require_once __DIR__ . "/controllers/BaseController.php";
require_once __DIR__ . "/controllers/ArtisteController.php";
require_once __DIR__ . "/controllers/MusiqueController.php";
require_once __DIR__ . "/controllers/StyleController.php";
require_once __DIR__ . "/controllers/ArtisteMusiqueController.php";

// Liste des URI
$routes = [

  // Artistes
  "/api/artistes/list" => ['GET', 'ArtisteController', 'getList'],
  "/api/artistes/get" => ['GET', 'ArtisteController', 'get'],
  "/api/artistes/add" => ['POST', 'ArtisteController', 'store'],
  "/api/artistes/update" => ['PUT', 'ArtisteController', 'update'],
  "/api/artistes/remove" => ['DELETE', 'ArtisteController', 'destroy'],
  // artisteID
  "/api/artistegroupemusique/get" => ['GET', 'ArtisteController', 'getArtisteGroupeMusique'],
  // artisteID
  "/api/artistemusique/add" => ['POST', 'ArtisteController', 'addMusiqueArtiste'],

  // Musique
  "/api/musique/list" => ['GET', 'MusiqueController', 'getList'],
  "/api/musique/get" => ['GET', 'MusiqueController', 'get'],
  "/api/musique/artistetitle" => ['GET', 'MusiqueController', 'getArtisteTitle'],
  "/api/musique/add" => ['POST', 'MusiqueController', 'store'],
  "/api/musique/update" => ['PUT', 'MusiqueController', 'update'],
  "/api/musique/remove" => ['DELETE', 'MusiqueController', 'destroy'],

  // Style
  "/api/style/list" => ['GET', 'StyleController', 'getList'],
  "/api/style/get" => ['GET', 'StyleController', 'get'],
  "/api/style/add" => ['POST', 'StyleController', 'store'],
  "/api/style/update" => ['PUT', 'StyleController', 'update'],
  "/api/style/remove" => ['DELETE', 'StyleController', 'destroy'],
  "/api/titlestyle/list" => ['GET', 'StyleController', 'getTitleStyle' ],
  // styleID
  "/api/stylemusique/get" => ['GET', 'StyleController', 'getStyleMusique' ],

  // Artiste Musique
  "/api/artistemusique/list" => ['GET', 'ArtisteMusiqueController', 'getAllArtisteMusique' ],
  "/api/artistemusique/update" => ['PUT', 'ArtisteMusiqueController', 'updateArtisteMusique' ],
  "/api/artistemusique/delete" => ['DELETE', 'ArtisteMusiqueController', 'deleteArtisteMusique' ],


];
