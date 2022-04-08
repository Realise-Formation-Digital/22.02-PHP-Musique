<?php

  class Database
  {
    protected $connection = null;

    /**
     * Constructor - Connect to the database.
     */
    public function __construct()
    {
      try {
        // Connect to the database.
        $this->connection = new PDO("mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_DATABASE_NAME, DB_USERNAME, DB_PASSWORD);
      } catch(PDOException $e) {
        // Send an error because it could not connect to the database.
        throw new Exception($e->getMessage());
      }      
    }

    /**
     * Get many objects from the database.
     * 
     * @param string $query
     * @param string $className
     * @return array
     */
    public function getMany($query, $className)
    {
      try {
        // Prepare the query to the statement.
        $statement = $this->connection->prepare($query);
        // Execute the statement.
        $statement->execute();
        // Return an array of objects using $className.
        return $statement->fetchAll(PDO::FETCH_CLASS, $className);         
      } catch(PDOException $e) {
        // Send an error because something went wrong with the query.
        throw new Exception($e->getMessage());
      }
    }

    /**
     * Return a single object from the database.
     * 
     * @param string $query
     * @param string $className
     * @return object
     */
    public function getSingle($query, $className = "")
    {
      try {
        // Prepare the query to the statement.
        $statement = $this->connection->prepare($query);
        // Execute the statement.
        $statement->execute();
        // Return a single object using $className.
        if ($className) {
          $statement->setFetchMode(PDO::FETCH_CLASS, $className);
        }
        return $statement->fetch();         
      } catch(PDOException $e) {
        // Send an error because something went wrong with the query.
        throw new Exception($e->getMessage());
      }
    }

    /**
     * Insert a new entry to the database and return either an object or the last ID.
     * 
     * @param string $query
     * @param string $className
     * @param string $returnQuery
     * @return mixed
     */
    public function insert($query, $className, $returnQuery = "")
    {
      try {
        // Execute the query.
        $this->connection->exec($query);
        // Get the last ID (the one from the new entry).
        $last_id = $this->connection->lastInsertId();
        // If a return query is set, return the full object else return the last ID.
        if ($returnQuery) {
          return $this->getSingle($returnQuery . " WHERE id=" . $last_id, $className);
        } else {
          return $last_id;
        }
      } catch(PDOException $e) {
        // Send an error because something went wrong with the query.
        throw new Exception($e->getMessage());
      }
    }

    /**
     * Update an existing entry in the database and return either an object or nothing.
     * 
     * @param string $query
     * @param string $className
     * @param string $checkQuery
     * @param string $returnQuery
     * @return mixed
     */
    public function update($query, $className, $checkQuery = "", $returnQuery = "")
    {
      try {
        // Check if the entry exists before updating it (if $checkQuery has been defined).
        if (!$checkQuery || $this->getSingle($checkQuery)) {
          // Execute the query.
          $this->connection->exec($query);
        }
        // If a return query is set, return the full object.
        if ($returnQuery) {
          return $this->getSingle($returnQuery, $className);
        }
      } catch(PDOException $e) {
        // Send an error because something went wrong with the query.
        throw new Exception($e->getMessage());
      }
    }

    /**
     * Delete an existing entry to the database.
     * 
     * @param string $query
     * @param string $checkQuery
     * @return mixed
     */
    public function delete($query, $checkQuery = "") {
      try {
        // Check if the entry exists before deleting it (if $checkQuery has been defined).
        if (!$checkQuery || $this->getSingle($checkQuery)) {
          // Execute the query.
          $this->connection->exec($query);
        } else {
          throw new Exception("Impossible de supprimer, car aucune entrée avec cet identifié n'a été trouvé.");
        }
      } catch(PDOException $e) {
        // Send an error because something went wrong with the query.
        throw new Exception($e->getMessage());
      }
    }

    /**
     * Add a n..m relation between two table.
     * 
     * @param string $tableName
     * @param string $id1Name
     * @param string $id2Name
     * @param string $id1Value
     * @param string $id2Value
     */
    public function addRelation($tableName, $id1Name, $id2Name, $id1Value, $id2Value)
    {
      try {
        // Prepare the query to the statement.
        $statement = $this->connection->prepare("SELECT * FROM $tableName WHERE $id1Name = '$id1Value' AND $id2Name = '$id2Value'");
        // Execute the statement.
        $statement->execute();
        // Get the result.
        $result = $statement->fetch();
        
        // Check if the relation does not exists before inserting it.
        if (!$result) {
          // Execute the query.
          $this->connection->exec("INSERT INTO $tableName ($id1Name, $id2Name) VALUES ('$id1Value', '$id2Value')");
        } else {
          throw new Exception("Impossible d'ajouter la relation, car elle existe déjà.");
        }
      } catch(PDOException $e) {
        // Send an error because something went wrong with the query.
        throw new Exception($e->getMessage());
      }
    }

    /**
     * Remove a n..m relation between two table.
     * 
     * @param string $tableName
     * @param string $idName
     * @param string $idValue
     */
    public function removeRelation($tableName, $idName, $idValue)
    {
      try {
        // Prepare the query to the statement.
        $statement = $this->connection->prepare("SELECT * FROM $tableName WHERE $idName = '$idValue'");
        // Execute the statement.
        $statement->execute();
        // Get the result.
        $result = $statement->fetch();
        
        // Check if the relation exists before delete it.
        if ($result) {
          // Execute the query.
          $this->connection->exec("DELETE FROM $tableName WHERE $idName = '$idValue'");
        } else {
          throw new Exception("Impossible de supprimer la relation, car aucune entrée avec cet identifié n'a été trouvé.");
        }
      } catch(PDOException $e) {
        // Send an error because something went wrong with the query.
        throw new Exception($e->getMessage());
      }
    }
    
  }