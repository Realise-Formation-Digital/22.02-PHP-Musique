<?php
require_once __DIR__ . "/Database.php";

class ArtistModel extends Database
{
  public $id;
  public $nom;
  public $groupe;
  
  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function getAllArtists($offset = 0, $limit = 10)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->getMany(
      "SELECT * FROM artists ORDER BY nom ASC LIMIT $offset, $limit",
      "ArtistModel"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function getSingleArtist($id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->getSingle(
      "SELECT * FROM artists WHERE id = $id",
      "ArtistModel"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function insertArtist($array)
  {
    // ---- TODO : Commenter ce bout de code ----
    $keys = implode(", ", array_keys($array));
    $values = implode("', '", array_values($array));

    // ---- TODO : Commenter ce bout de code ----
    return $this->insert(
      "INSERT INTO artists ($keys) VALUES ('$values')",
      "ArtistModel",
      "SELECT * FROM artists"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function updateArtist($array, $id)
  {
    // ---- TODO : Commenter ce bout de code ----
    $values_array = [];
    foreach($array as $key => $value) {
      $values_array[] = "$key = '$value'";
    }
    $values = implode(",", array_values($values_array));

    // ---- TODO : Commenter ce bout de code ----
    return $this->update(
      "UPDATE artists SET $values WHERE id = $id",
      "ArtistModel",
      "SELECT id FROM artists WHERE id=$id",
      "SELECT * FROM artists WHERE id=$id"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function deleteArtist($id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->delete(
      "DELETE FROM artists WHERE id=$id",
      "SELECT id FROM artists WHERE id=$id"
    );
  }

}
