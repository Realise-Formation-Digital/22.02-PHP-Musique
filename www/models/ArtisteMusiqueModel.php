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
      "SELECT * FROM artiste_musique ORDER BY artiste_id ASC LIMIT $offset, $limit",
      "ArtisteMusiqueModel"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function getSingleArtisteMusique($artiste_id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->getSingle(
      "SELECT * FROM artiste_musique WHERE artiste_id = $artiste_id",
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
  // public function updateArtisteMusique($array, $artiste_id)
  // {
  //   // ---- TODO : Commenter ce bout de code ----
  //   $values_array = [];
  //   foreach($array as $key => $value) {
  //     $values_array[] = "$key = '$value'";
  //   }
  //   $values = implode(",", array_values($values_array));

  //   // ---- TODO : Commenter ce bout de code ----
  //   return $this->update(
  //     "UPDATE artiste_musique SET $values WHERE artiste_id = $artiste_id",
  //     "ArtisteMusiqueModel",
  //     "SELECT artiste_id FROM artiste_musique WHERE artiste_id = $artiste_id",
  //     "SELECT * FROM artiste_musique WHERE artiste_id = $artiste_id"
  //   );
  // }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  // public function deleteArtisteMusique($artiste_id)
  // {
  //   // ---- TODO : Commenter ce bout de code ----
  //   return $this->delete(
  //     "DELETE FROM artiste_musique WHERE artiste_id=$artiste_id",
  //     "SELECT artiste_id FROM artiste_musique WHERE artiste_id=$artiste_id"
  //   );
  // }


  //Patrick
  public function updateArtisteMusique($array, $artiste_id)
  {
    // ---- TODO : Commenter ce bout de code ----
    $values_array = [];
    foreach ($array as $key => $value) {
      $values_array[] = "$key = '$value'";
    }
    $values = implode(",", array_values($values_array));

    // ---- TODO : Commenter ce bout de code ----
    return $this->update(
      "UPDATE artiste_musique SET $values WHERE artiste_id = $artiste_id",
      "ArtisteMusiqueModel",
      "SELECT artiste_id FROM artiste_musique WHERE artiste_id = $artiste_id",
      "SELECT * FROM artiste_musique WHERE artiste_id = $artiste_id"
    );
  }

  public function deleteArtisteMusique($artiste_id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->delete(
      "DELETE FROM `artiste_musique` am WHERE artiste_id=$artiste_id",
    );
  }
}
