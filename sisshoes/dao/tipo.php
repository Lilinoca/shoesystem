<?php

class Tipo extends Connection
{
  private $table = 'tbtipo';
  private $query = 'SELECT * FROM tbtipo';
  
  public function getAll()
  {   
    $result = $this->connection->query($this->query);
    $lista = array();
    while ($record = $result->fetch_object()) {
      array_push($lista, $record);
    }
    $result->close();
    return $lista;		
  }

  public function getById($id)
  {
    return $this->connection->query($this->query . ' WHERE id = ' . $id)->fetch_assoc();
  }

  public function insert($tipo)
  {
    $sql = "INSERT INTO " . $this->table . " (tipo) VALUES ('" . $tipo . "')";
    return $this->connection->query($sql);
  }

  public function update($id, $tipo)
  {
    $sql = "UPDATE " . $this->table . " SET tipo='" . $tipo . "' WHERE id=" . $id;
    return $this->connection->query($sql);
  }

  public function delete($id)
  {
    $sql = "DELETE FROM  " . $this->table . " WHERE id=" . $id;
    return $this->connection->query($sql);
  }
}
