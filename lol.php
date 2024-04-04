<?php require_once('Connections/banco1.php'); ?>

<?php
print('-Falencia_documentos-');

$sql = "SELECT * FROM falencia_documentos";
$result = $banco1->query($sql);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
  $data[] = $row;
}

$json_output = json_encode($data, JSON_PRETTY_PRINT);

echo '<pre>' . $json_output . '</pre>';
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