<?php

class Calcado extends Connection
{
  private $table = 'tbcalcado';
  private $query = 'SELECT tbcalcado.id, tbcalcado.idTipo, tbcalcado.modelo, tbcalcado.material, tbtipo.tipo  FROM tbcalcado INNER JOIN tbtipo ON tbcalcado.idTipo = tbtipo.id';
  
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
    return $this->connection->query($this->query . ' WHERE tbcalcado.id = ' . $id)->fetch_assoc();
  }

  public function insert($idTipo, $modelo, $material)
  {
    $sql = "INSERT INTO " . $this->table . " (idTipo, modelo, material) VALUES (".$idTipo.", '".$modelo."','".$material."')";
    return $this->connection->query($sql);
  }

  public function update($id, $tipo, $modelo, $material)
  {
    $sql = "UPDATE " . $this->table . " SET idTipo='" . $tipo . "', modelo='".$modelo."', material='".$material."' WHERE id=" . $id;
    return $this->connection->query($sql);
  }

  public function delete($id)
  {
    $sql = "DELETE FROM  " . $this->table . " WHERE id=" . $id;
    return $this->connection->query($sql);
  }
}
