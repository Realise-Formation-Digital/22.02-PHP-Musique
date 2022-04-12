<?php
require_once __DIR__ . "/Database.php";

class StyleModel extends Database
{
  public $id;
  public $nom;
  public $type;

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function getAllStyle($offset = 0, $limit = 10)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->getMany(
      "SELECT * FROM style ORDER BY nom ASC LIMIT $offset, $limit",
      "StyleModel"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function getSingleStyle($id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->getSingle(
      "SELECT * FROM style WHERE id = $id",
      "StyleModel"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function insertStyle($array)
  {
    // ---- TODO : Commenter ce bout de code ----
    $keys = implode(", ", array_keys($array));
    $values = implode("', '", array_values($array));

    // ---- TODO : Commenter ce bout de code ----
    return $this->insert(
      "INSERT INTO style ($keys) VALUES ('$values')",
      "StyleModel",
      "SELECT * FROM style"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function updateStyle($array, $id)
  {
    // ---- TODO : Commenter ce bout de code ----
    $values_array = [];
    foreach($array as $key => $value) {
      $values_array[] = "$key = '$value'";
    }
    $values = implode(",", array_values($values_array));

    // ---- TODO : Commenter ce bout de code ----
    return $this->update(
      "UPDATE style SET $values WHERE id = $id",
      "StyleModel",
      "SELECT id FROM style WHERE id=$id",
      "SELECT * FROM style WHERE id=$id"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function deleteStyle($id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->delete(
      "DELETE FROM style WHERE id=$id",
      "SELECT id FROM style WHERE id=$id"
    );
  }

  public function getTitleStyle($offset = 0, $limit = 10)
  {
    return $this->getMany(
    "SELECT m.id, m.nom, m.durée, m.album, CONCAT(s.nom, '/', s.type) as style
      FROM musique m
      INNER JOIN style s ON s.id = m.style_id
      ORDER BY m.nom ASC LIMIT $offset, $limit",
      "MusiqueModel"
    );
  }

  public function styleMusique($styleID)
  {
    return $this-> getMany(
    "SELECT m.id, m.nom, m.durée, m.album, CONCAT(s.nom, '/', s.type) as style
      FROM style s
      INNER JOIN musique m ON s.id = m.style_id
      WHERE s.id = $styleID",
      "StyleModel"
    );
  }

}
