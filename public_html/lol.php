<?php
class Connection
{
  private $server = "localhost";
  private $username = "mpbadm28_mpb";
  private $password = "mpb@#admjudicial";
  private $db = "mpbadm28_mpbadmjudicial";

  public function connect()
  {
    $connection = mysqli_connect($this->server, $this->username, $this->password, $this->db);

    if (mysqli_connect_errno()) {
      return print("Falha na conexão com o banco de dados: ");
    }

    print("Conexão realizada com sucesso!");

    mysqli_set_charset($connection, "utf8");
    return $connection;
  }
}

$connection = new Connection();

$connection->connect();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h2>Dados da Equipe:</h2>

  <h4>kapa 10</h4>

</body>

</html>