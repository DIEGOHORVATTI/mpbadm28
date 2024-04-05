<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

require_once('Connections/banco1.php');
?>

<h2>mailer a baixo</h2>


<?php
//These must be at the top of your script, not inside a function


print("<h2>mailer a baixo2</h2>");
$mail = new PHPMailer(true);
?>

<?php
$sql = "SELECT * FROM banner WHERE local = 'Slide'";
$result = $conn->query($sql);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
  $data[] = $row;
}

$json_output = json_encode($data, JSON_PRETTY_PRINT);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #444;
      color: #ffff;
      margin: 1rem;
      padding: 0;
    }

    pre {
      border: 1px solid #ced4da;
      border-radius: 0.25rem;
      font-size: 85%;
      margin: 0;
      overflow: auto;
      padding: 1em;
      white-space: pre;
      word-wrap: normal;
    }
  </style>

  <title>Teste de sql</title>
</head>

<body>
  <? echo '<pre>' . $json_output . '</pre>'; ?>
  <br />

  <h4>Tamanho: <? print(count($data)); ?></h4>

</body>

</html>