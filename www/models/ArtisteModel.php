<?php
require_once __DIR__ . "/Database.php";

class UserModel extends Database
{
  public $id;
  public $nom;
  public $telephone;
  public $email;
  public $profil;

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function getAllUsers($offset = 0, $limit = 10)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->getMany(
      "SELECT * FROM users ORDER BY nom ASC LIMIT $offset, $limit",
      "UserModel"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function getSingleUser($id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->getSingle(
      "SELECT * FROM users WHERE id = $id",
      "UserModel"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function insertUser($array)
  {
    // ---- TODO : Commenter ce bout de code ----
    $keys = implode(", ", array_keys($array));
    $values = implode("', '", array_values($array));

    // ---- TODO : Commenter ce bout de code ----
    return $this->insert(
      "INSERT INTO users ($keys) VALUES ('$values')",
      "UserModel",
      "SELECT * FROM users"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function updateUser($array, $id)
  {
    // ---- TODO : Commenter ce bout de code ----
    $values_array = [];
    foreach($array as $key => $value) {
      $values_array[] = "$key = '$value'";
    }
    $values = implode(",", array_values($values_array));

    // ---- TODO : Commenter ce bout de code ----
    return $this->update(
      "UPDATE users SET $values WHERE id = $id",
      "UserModel",
      "SELECT id FROM users WHERE id=$id",
      "SELECT * FROM users WHERE id=$id"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function deleteUser($id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->delete(
      "DELETE FROM users WHERE id=$id",
      "SELECT id FROM users WHERE id=$id"
    );
  }

}
