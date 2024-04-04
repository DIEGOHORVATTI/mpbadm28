<?php require_once('Connections/banco1.php'); ?>

<?php
print('-Example query-');

$sql = "SELECT * FROM falencia_documentos";
$result = $banco1->query($sql);

while ($row = mysqli_fetch_assoc($result)) {
  print_r($row);
}
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

  <h4>kapa 11</h4>

</body>

</html>