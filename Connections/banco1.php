<?php
ini_set('display_errors', 0);
error_reporting(0);

class Connection
{
  private $server = "localhost";
  private $username = "mpbadm28_mpb";
  private $password = "mpb@#admjudicial";
  private $db = "mpbadm28_mpbadmjudicial";

  public function connect()
  {
    $conn = mysqli_connect($this->server, $this->username, $this->password, $this->db);

    if (mysqli_connect_errno()) {
      return print("Falha na conexão com o banco de dados: ");
    }

    print("Conexão realizada com sucesso Conections/banco1.php!");

    mysqli_set_charset($conn, "utf8");
    return $conn;
  }


  public function getError()
  {
    $error = mysqli_connect_error();
    return $error;
  }

  public function query($sql)
  {
    return mysqli_query($this->connect(), $sql);
  }

  public function insert($table, $data)
  {
    $columns = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";

    $sql = "INSERT INTO $table ($columns) VALUES ($values)";
    return $this->query($sql);
  }

  public function update($table, $data, $where)
  {
    $set = [];
    foreach ($data as $column => $value) {
      $set[] = "$column = '$value'";
    }

    $set = implode(", ", $set);

    $sql = "UPDATE $table SET $set WHERE $where";
    return $this->query($sql);
  }

  public function delete($table, $where)
  {
    $sql = "DELETE FROM $table WHERE $where";
    return $this->query($sql);
  }

  public function select($table, $columns = "*", $where = null)
  {
    $sql = "SELECT $columns FROM $table";
    if ($where) {
      $sql .= " WHERE $where";
    }

    $result = $this->query($sql);

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
    }

    return $data;
  }

  public function selectOne($table, $columns = "*", $where = null)
  {
    $result = $this->select($table, $columns, $where);
    return $result[0];
  }

  public function close()
  {
    mysqli_close($this->connect());
  }
}

$conn = new Connection();
