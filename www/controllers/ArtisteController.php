<?php
  require_once __DIR__ . "/../models/ArtisteModel.php";

  class ArtisteController extends BaseController
  {

    /**
     * ---- TODO : Commenter cette méthode ----
     */
    public function getList() {
      try {
        // ---- TODO : Commenter ce bout de code ----
        $artisteModel = new ArtisteModel();

        // ---- TODO : Commenter ce bout de code ----
        $limit = 10;
        $urlParams = $this->getQueryStringParams();
        if (isset($urlParams['limit']) && is_numeric($urlParams['limit'])) {
          $limit = $urlParams['limit'];
        }

        // ---- TODO : Commenter ce bout de code ----
        $offset = 0;
        $urlParams = $this->getQueryStringParams();
        if (isset($urlParams['page']) && is_numeric($urlParams['page']) && $urlParams['page'] > 0) {
          $offset = ($urlParams['page'] - 1) * $limit;
        }

        // ---- TODO : Commenter ce bout de code ----
        $artistes = $artisteModel->getAllArtistes($offset, $limit);

        // ---- TODO : Commenter ce bout de code ----
        $responseData = json_encode($artistes);

        // ---- TODO : Commenter ce bout de code ----
        $this->sendOutput($responseData);
      } catch (Error $e) {
        // ---- TODO : Commenter ce bout de code ----
        $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
      }
    }

    /**
     * ---- TODO : Commenter cette méthode ----
     */
    public function get() {
      try {
        // ---- TODO : Commenter ce bout de code ----
        $artisteModel = new ArtisteModel();

        // ---- TODO : Commenter ce bout de code ----
        $urlParams = $this->getQueryStringParams();
        if (!isset($urlParams['id']) || !is_numeric($urlParams['id'])) {
          throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
        $artiste = $artisteModel->getSingleArtiste($urlParams['id']);

        // ---- TODO : Commenter ce bout de code ----
        $responseData = json_encode($artiste);

        // ---- TODO : Commenter ce bout de code ----
        $this->sendOutput($responseData);
      } catch (Error $e) {
        // ---- TODO : Commenter ce bout de code ----
        $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
      }
    }

    /**
     * ---- TODO : Commenter cette méthode ----
     */
    public function store() {
      try {
        // ---- TODO : Commenter ce bout de code ----
        $artisteModel = new ArtisteModel();

        // ---- TODO : Commenter ce bout de code ----
        $body = $this->getBody();
        if (!$body) {
          throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
        if (!isset($body['nom'])) {
          throw new Exception("Aucun nom n'a été spécifié");
        }
        if (!isset($body['groupe'])) {
          throw new Exception("Aucun groupe n'a été spécifié");
        }
        
        // ---- TODO : Commenter ce bout de code ----
        $keys = array_keys($body);
        $valuesToInsert = [];
        foreach($keys as $key) {
          if (in_array($key, ['nom', 'groupe'])) {
            $valuesToInsert[$key] = $body[$key];
          }
        }

        // ---- TODO : Commenter ce bout de code ----
        $artiste = $artisteModel->insertArtiste($valuesToInsert);

        // ---- TODO : Commenter ce bout de code ----
        $responseData = json_encode($artiste);

        // ---- TODO : Commenter ce bout de code ----
        $this->sendOutput($responseData);
      } catch (Error $e) {
        // ---- TODO : Commenter ce bout de code ----
        $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
      }
    }

    /**
     * ---- TODO : Commenter cette méthode ----
     */
    public function update() {
      try {
        // ---- TODO : Commenter ce bout de code ----
        $artisteModel = new ArtisteModel();

        // ---- TODO : Commenter ce bout de code ----
        $body = $this->getBody();
        if (!$body) {
          throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
        if (!isset($body['id'])) {
          throw new Exception("Aucun identifiant n'a été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
        $keys = array_keys($body);
        $valuesToUpdate = [];
        foreach($keys as $key) {
          if (in_array($key, ['nom', 'groupe'])) {
            $valuesToUpdate[$key] = $body[$key];
          }
        }

        // ---- TODO : Commenter ce bout de code ----
        $artiste = $artisteModel->updateArtiste($valuesToUpdate, $body['id']);

        // ---- TODO : Commenter ce bout de code ----
        $responseData = json_encode($artiste);

        // ---- TODO : Commenter ce bout de code ----
        $this->sendOutput($responseData);
      } catch (Error $e) {
        // ---- TODO : Commenter ce bout de code ----
        $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
      }
    }

    /**
     * ---- TODO : Commenter cette méthode ----
     */
    public function destroy() {
      try {
        // ---- TODO : Commenter ce bout de code ----
        $artisteModel = new ArtisteModel();

        // ---- TODO : Commenter ce bout de code ----
        $urlParams = $this->getQueryStringParams();
        if (!isset($urlParams['id']) || !is_numeric($urlParams['id'])) {
          throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
        $artiste = $artisteModel->deleteArtiste($urlParams['id']);

        // ---- TODO : Commenter ce bout de code ----
        $responseData = json_encode("L'utilisateur a été correctement supprimé");

        // ---- TODO : Commenter ce bout de code ----
        $this->sendOutput($responseData);
      } catch (Error $e) {
        // ---- TODO : Commenter ce bout de code ----
        $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
      }
    }

// Xavier 


    public function getArtisteGroupeMusique() {
      try {
        // ---- TODO : Commenter ce bout de code ----
        $artisteModel = new ArtisteModel();

        // ---- TODO : Commenter ce bout de code ----
        $urlParams = $this->getQueryStringParams();
        if (!isset($urlParams['artisteID']) || !is_numeric($urlParams['artisteID'])) {
          throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
        $artiste = $artisteModel->nomGroupeArtisteMusique($urlParams['artisteID']);

        // ---- TODO : Commenter ce bout de code ----
        $responseData = json_encode($artiste);

        // ---- TODO : Commenter ce bout de code ----
        $this->sendOutput($responseData);
      } catch (Error $e) {
        // ---- TODO : Commenter ce bout de code ----
        $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
      }
    }


    public function addMusiqueArtiste() {

      try {
        // ---- Création d'un objet en instanciant musiqueModel ----
        $musiqueModel = new MusiqueModel();

        // ---- Vérification si body vide ----
        $body = $this->getBody();
        if (!$body) {
          throw new Exception("Le champ n'est pas valide");
        }

        // ---- Vérification si artiste id est spécifié ----
        if (!isset($body['artiste_id'])) {
          
          throw new Exception("Aucun artiste n'a été spécifié");
        }
        // ---- Vérification si artiste id est spécifié ----
        if (!isset($body['musique_id'])) {
          throw new Exception("Aucune musique n'a été spécifiée");
        }

        // ---- Variable musiqueArtiste = à la référence de la fonction ajoutMusiqueArtiste qui contient dans $body les valeurs renvoyées aux variables
          // $id1Value, $id2Value dans la fonction ----
        $musiqueArtiste = $musiqueModel->ajoutMusiqueArtiste($body['artiste_id'], $body['musique_id']);

        // ---- Change les string en objet Json ----
        $responseData = json_encode($musiqueArtiste);

        // ---- TODO : Commenter ce bout de code ----
        $this->sendOutput($responseData);
      } catch (Error $e) {
        // ---- TODO : Commenter ce bout de code ----
        $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
      }
    }


  }
