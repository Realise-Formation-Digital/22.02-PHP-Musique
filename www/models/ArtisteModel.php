<?php
require_once __DIR__ . "/Database.php";

class ArtisteModel extends Database
{
  public $id;
  public $nom;
  public $groupe;
  
  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function getAllArtistes($offset = 0, $limit = 10)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->getMany(
      "SELECT * FROM artiste ORDER BY nom ASC LIMIT $offset, $limit",
      "ArtisteModel"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function getSingleArtiste($id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->getSingle(
      "SELECT * FROM artiste WHERE id = $id",
      "ArtisteModel"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function insertArtiste($array)
  {
    // ---- TODO : Commenter ce bout de code ----
    $keys = implode(", ", array_keys($array));
    $values = implode("', '", array_values($array));

    // ---- TODO : Commenter ce bout de code ----
    return $this->insert(
      "INSERT INTO artiste ($keys) VALUES ('$values')",
      "ArtisteModel",
      "SELECT * FROM artiste"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function updateArtiste($array, $id)
  {
    // ---- TODO : Commenter ce bout de code ----
    $values_array = [];
    foreach($array as $key => $value) {
      $values_array[] = "$key = '$value'";
    }
    $values = implode(",", array_values($values_array));

    // ---- TODO : Commenter ce bout de code ----
    return $this->update(
      "UPDATE artiste SET $values WHERE id = $id",
      "ArtisteModel",
      "SELECT id FROM artiste WHERE id=$id",
      "SELECT * FROM artiste WHERE id=$id"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function deleteArtiste($id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->delete(
      "DELETE FROM artiste WHERE id=$id",
      "SELECT id FROM artiste WHERE id=$id"
    );
  }

  public function nomGroupeArtisteMusique($artisteID)
  {
    return $this->getSingle(
      "SELECT a.nom, a.groupe, m.nom FROM artiste a
        INNER JOIN artiste_musique am ON am.artiste_id = a.id
        INNER JOIN musique m ON m.id = am.musique_id
        WHERE a.id = $artisteID",
        "ArtisteModel"
    );
  }

  // 
  public function ajoutMusiqueArtiste($valArtiste, $valMusique,) {
    return $this->addRelation(
      'artiste_musique', 'artiste_id', 'musique_id', 

      "INSERT INTO artiste_musique(artiste_id, musique_id)
        VALUES ($valArtiste, $valMusique)"

    
    );
  }

  public function supprimeMusiqueArtiste($tableName, $id1Name, $id2Name, $id1Value, $id2Value) {
    return $this->removeRelation(
      'artiste_musique', 'artiste_id', 'musique_id',

     

    );
  }

}


// "SELECT * FROM artiste a
    //   INNER JOIN artiste_musique am on am.artiste_id = a.id
    //   INNER JOIN musique m ON m.id = am.musique_id
    //   WHERE a.id = $artisteID"

