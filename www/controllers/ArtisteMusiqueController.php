<?php
  require_once __DIR__ . "/../models/ArtisteMusiqueModel.php";

  class ArtisteMusiqueController extends BaseController
  {

    /**
     * ---- TODO : Commenter cette méthode ----
     */
    // public function getList() {
    //   try {
    //     // ---- TODO : Commenter ce bout de code ----
    //     $artisteMusiqueModel = new ArtisteMusiqueModel();

    //     // ---- TODO : Commenter ce bout de code ----
    //     $limit = 10;
    //     $urlParams = $this->getQueryStringParams();
    //     if (isset($urlParams['limit']) && is_numeric($urlParams['limit'])) {
    //       $limit = $urlParams['limit'];
    //     }

    //     // ---- TODO : Commenter ce bout de code ----
    //     $offset = 0;
    //     $urlParams = $this->getQueryStringParams();
    //     if (isset($urlParams['page']) && is_numeric($urlParams['page']) && $urlParams['page'] > 0) {
    //       $offset = ($urlParams['page'] - 1) * $limit;
    //     }

    //     // ---- TODO : Commenter ce bout de code ----
    //     $artisteMusique = $artisteMusiqueModel->getAllArtisteMusique($offset, $limit);

    //     // ---- TODO : Commenter ce bout de code ----
    //     $responseData = json_encode($artisteMusique);

    //     // ---- TODO : Commenter ce bout de code ----
    //     $this->sendOutput($responseData);
    //   } catch (Error $e) {
    //     // ---- TODO : Commenter ce bout de code ----
    //     $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
    //     $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
    //     $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
    //   }
    // }

    /**
     * ---- TODO : Commenter cette méthode ----
     */
    public function get() {
      try {
        // ---- TODO : Commenter ce bout de code ----
        $artisteMusiqueModel = new ArtisteMusiqueModel();

        // ---- TODO : Commenter ce bout de code ----
        $urlParams = $this->getQueryStringParams();
        if (!isset($urlParams['artiste_id']) || !is_numeric($urlParams['artiste_id'])) {
          throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
        $artisteMusique = $artisteMusiqueModel->getSingleArtisteMusique($urlParams['artiste_id']);

        // ---- TODO : Commenter ce bout de code ----
        $responseData = json_encode($artisteMusique);

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
        $artisteMusiqueModel = new ArtisteMusiqueModel();

        // ---- TODO : Commenter ce bout de code ----
        $body = $this->getBody();
        if (!$body) {
          throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
        if (!isset($body['artiste_id'])) {
          throw new Exception("Aucun artiste n'a été spécifié");
        }
        if (!isset($body['musique_id'])) {
          throw new Exception("Aucune musique n'a été spécifiée");
        }
        
        // ---- TODO : Commenter ce bout de code ----
        $keys = array_keys($body);
        $valuesToInsert = [];
        foreach($keys as $key) {
          if (in_array($key, ['artiste_id', 'musique_id'])) {
            $valuesToInsert[$key] = $body[$key];
          }
        }

        // ---- TODO : Commenter ce bout de code ----
        $artisteMusique = $artisteMusiqueModel->insertArtisteMusique($valuesToInsert);

        // ---- TODO : Commenter ce bout de code ----
        $responseData = json_encode($artisteMusique);

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
    // public function update() {
    //   try {
    //     // ---- TODO : Commenter ce bout de code ----
    //     $artisteMusiqueModel = new ArtisteMusiqueModel();

    //     // ---- TODO : Commenter ce bout de code ----
    //     $body = $this->getBody();
    //     if (!$body) {
    //       throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
    //     }

    //     // ---- TODO : Commenter ce bout de code ----
    //     if (!isset($body['artiste_id'])) {
    //       throw new Exception("Aucun identifiant n'a été spécifié");
    //     }

    //     // ---- TODO : Commenter ce bout de code ----
    //     $keys = array_keys($body);
    //     $valuesToUpdate = [];
    //     foreach($keys as $key) {
    //       if (in_array($key, ['artiste_id', 'musique_id'])) {
    //         $valuesToUpdate[$key] = $body[$key];
    //       }
    //     }

        // ---- TODO : Commenter ce bout de code ----
    //     $artisteMusique = $artisteMusiqueModel->updateArtisteMusique($valuesToUpdate, $body['id']);

    //     // ---- TODO : Commenter ce bout de code ----
    //     $responseData = json_encode($artisteMusique);

    //     // ---- TODO : Commenter ce bout de code ----
    //     $this->sendOutput($responseData);
    //   } catch (Error $e) {
    //     // ---- TODO : Commenter ce bout de code ----
    //     $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
    //     $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
    //     $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
    //   }
    // }

    /**
     * ---- TODO : Commenter cette méthode ----
     */
    // public function destroy() {
    //   try {
    //     // ---- TODO : Commenter ce bout de code ----
    //     $artisteMusiqueModel = new ArtisteMusiqueModel();

    //     // ---- TODO : Commenter ce bout de code ----
    //     $urlParams = $this->getQueryStringParams();
    //     if (!isset($urlParams['id']) || !is_numeric($urlParams['id'])) {
    //       throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
    //     }

    //     ---- TODO : Commenter ce bout de code ----
    //     $artisteMusique = $artisteMusiqueModel->deleteArtisteMusique($urlParams['id']);

    //     // ---- TODO : Commenter ce bout de code ----
    //     $responseData = json_encode("L'utilisateur a été correctement supprimé");

    //     // ---- TODO : Commenter ce bout de code ----
    //     $this->sendOutput($responseData);
    //   } catch (Error $e) {
    //     // ---- TODO : Commenter ce bout de code ----
    //     $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
    //     $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
    //     $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
    //   }
    // }

    //Patrick
    public function getAllArtisteMusique() {
      try {
        // ---- TODO : Commenter ce bout de code ----
        $artisteMusiqueModel = new ArtisteMusiqueModel();

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
        $artisteMusique = $artisteMusiqueModel->getAllArtisteMusique($offset, $limit);

        // ---- TODO : Commenter ce bout de code ----
        $responseData = json_encode($artisteMusique);

        // ---- TODO : Commenter ce bout de code ----
        $this->sendOutput($responseData);
      } catch (Error $e) {
        // ---- TODO : Commenter ce bout de code ----
        $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
      }
    }
    
    public function updateArtisteMusique() {
      try {
        // ---- TODO : Commenter ce bout de code ----
        $artisteMusiqueModel = new ArtisteMusiqueModel();

        // ---- TODO : Commenter ce bout de code ----
        $body = $this->getBody();
        if (!$body) {
          throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
        if (!isset($body['artiste_id'])) {
          throw new Exception("Aucun identifiant n'a été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
        $keys = array_keys($body);
        $valuesToUpdate = [];
        foreach($keys as $key) {
          if (in_array($key, ['artiste_id', 'musique_id'])) {
            $valuesToUpdate[$key] = $body[$key];
          }
        }

        // ---- TODO : Commenter ce bout de code ----
        $artisteMusiqueModel = $artisteMusiqueModel->updateArtisteMusique($valuesToUpdate, $body['artiste_id']);

        // ---- TODO : Commenter ce bout de code ----
        $responseData = json_encode($artisteMusiqueModel);

        // ---- TODO : Commenter ce bout de code ----
        $this->sendOutput($responseData);
      } catch (Error $e) {
        // ---- TODO : Commenter ce bout de code ----
        $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
      }
    }

    public function deleteArtisteMusique() {
      try {
        // ---- TODO : Commenter ce bout de code ----
        $musiqueArtisteModel = new ArtisteMusiqueModel();

        // ---- TODO : Commenter ce bout de code ----
        $urlParams = $this->getQueryStringParams();
        if (!isset($urlParams['artiste_id']) || !is_numeric($urlParams['artiste_id'])) {
          throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
        }


        // ---- TODO : Commenter ce bout de code ----
        $musiqueArtiste = $musiqueArtisteModel->deleteArtisteMusique($urlParams['artiste_id']);

        // ---- TODO : Commenter ce bout de code ----
        $responseData = json_encode("La musique a été correctement supprimée");

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
