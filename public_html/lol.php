<?php require_once('banco1.php'); ?>

<?php

$connection = "SELECT * FROM equipe";
$result = $conn->query($connection);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"] . " - Nome: " . $row["nome"] . " - Função: " . $row["funcao"] . "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();

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

  <h4>kapa 12</h4>

</body>

</html>