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
    $banco1 = mysqli_connect($this->server, $this->username, $this->password, $this->db);

    if (mysqli_connect_errno()) {
      return print("Falha na conexão com o banco de dados: ");
    }

    print("Conexão realizada com sucesso Conections/banco1.php!");

    mysqli_set_charset($banco1, "utf8");
    return $banco1;
  }

  public function query($sql)
  {
    return mysqli_query($this->connect(), $sql);
  }
}

$banco1 = new Connection();

$banco1->connect();
