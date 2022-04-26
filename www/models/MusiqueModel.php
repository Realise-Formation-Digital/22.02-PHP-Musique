<?php
require_once __DIR__ . "/Database.php";

class MusiqueModel extends Database
{
  public $id;
  public $nom;
  public $durée;
  public $album;
  // public $style_id;

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function getAllMusique($offset = 0, $limit = 10)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->getMany(
      "SELECT id, nom, durée, album FROM musique ORDER BY nom ASC LIMIT $offset, $limit",
      "MusiqueModel"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function getSingleMusique($id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->getSingle(
      "SELECT * FROM musique WHERE id = $id",
      "MusiqueModel"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function insertMusique($array)
  {
    // ---- TODO : Commenter ce bout de code ----
    $keys = implode(", ", array_keys($array));
    $values = implode("', '", array_values($array));

    // ---- TODO : Commenter ce bout de code ----
    return $this->insert(
      "INSERT INTO musique ($keys) VALUES ('$values')",
      "MusiqueModel",
      "SELECT * FROM musique"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function updateMusique($array, $id)
  {
    // ---- TODO : Commenter ce bout de code ----
    $values_array = [];
    foreach($array as $key => $value) {
      $values_array[] = "$key = '$value'";
    }
    $values = implode(",", array_values($values_array));

    // ---- TODO : Commenter ce bout de code ----
    return $this->update(
      "UPDATE musique SET $values WHERE id = $id",
      "MusiqueModel",
      "SELECT id FROM musique WHERE id=$id",
      "SELECT * FROM musique WHERE id=$id"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function deleteMusique($id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->delete(
      "DELETE FROM musique WHERE id=$id",
      "SELECT id FROM musique WHERE id=$id"
    );
  }

  public function getArtisteTitle($musiqueID) {
    return $this->getMany(
      "SELECT * FROM musique m
      INNER JOIN artiste_musique am ON am.musique_id = m.id
      INNER JOIN artiste a ON a.id = am.artiste_id
      WHERE m.id = $musiqueID",
      "MusiqueModel"
    );
  }

}
