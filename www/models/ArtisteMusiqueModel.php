<?php
require_once __DIR__ . "/Database.php";

class ArtisteMusiqueModel extends Database
{
  public $artiste_id;
  public $musique_id;
  
  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function getAllArtisteMusique($offset = 0, $limit = 10)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->getMany(
      "SELECT * FROM artiste_musique ORDER BY nom ASC LIMIT $offset, $limit",
      "ArtisteMusiqueModel"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function getSingleArtisteMusique($id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->getSingle(
      "SELECT * FROM artiste_musique WHERE id = $id",
      "ArtisteMusiqueModel"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function insertArtisteMusique($array)
  {
    // ---- TODO : Commenter ce bout de code ----
    $keys = implode(", ", array_keys($array));
    $values = implode("', '", array_values($array));

    // ---- TODO : Commenter ce bout de code ----
    return $this->insert(
      "INSERT INTO artiste_musique ($keys) VALUES ('$values')",
      "ArtisteMusiqueModel",
      "SELECT * FROM artiste_musique"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function updateArtisteMusique($array, $id)
  {
    // ---- TODO : Commenter ce bout de code ----
    $values_array = [];
    foreach($array as $key => $value) {
      $values_array[] = "$key = '$value'";
    }
    $values = implode(",", array_values($values_array));

    // ---- TODO : Commenter ce bout de code ----
    return $this->update(
      "UPDATE artiste_musique SET $values WHERE id = $id",
      "ArtisteMusiqueModel",
      "SELECT id FROM artiste_musique WHERE id=$id",
      "SELECT * FROM artiste_musique WHERE id=$id"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function deleteArtisteMusique($id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->delete(
      "DELETE FROM artiste_musique WHERE id=$id",
      "SELECT id FROM artiste_musique WHERE id=$id"
    );
  }

}
