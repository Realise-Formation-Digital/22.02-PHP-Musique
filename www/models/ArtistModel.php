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
      "SELECT * FROM artistes ORDER BY nom ASC LIMIT $offset, $limit",
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
      "SELECT * FROM artistes WHERE id = $id",
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
      "INSERT INTO artistes ($keys) VALUES ('$values')",
      "ArtisteModel",
      "SELECT * FROM artistes"
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
      "UPDATE artistes SET $values WHERE id = $id",
      "ArtisteModel",
      "SELECT id FROM artistes WHERE id=$id",
      "SELECT * FROM artistes WHERE id=$id"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function deleteArtiste($id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->delete(
      "DELETE FROM artistes WHERE id=$id",
      "SELECT id FROM artistes WHERE id=$id"
    );
  }

}
