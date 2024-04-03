<?php 
  $hostname_banco1 = "localhost";
  $database_banco1 = "mpbadm28_mpbadmjudicial";
  $username_banco1 = "mpbadm28_mpb";
  $password_banco1 = "mpb@#admjudicial";

  // Criando a conexão com o banco de dados usando mysqli
  $banco1 = new mysqli($hostname_banco1, $username_banco1, $password_banco1, $database_banco1);

  // Verificando a conexão
  if ($banco1->connect_error) {
      print("Falha na conexão: " . $banco1->connect_error);
  }

  $banco1->set_charset("");

  print("Conexão realizada com sucesso!");

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


  <h4>kapa</h4>

</body>
</html>