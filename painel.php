<?php require_once('Connections/banco1.php'); ?>

<?php require_once('./getSQLValueString.php'); ?>

<h3>teste</h3>

<?php
session_start();

$glogin = $_SESSION["rrlogin"];
$gsenha = $_SESSION["rrsenha"];


$query_rsLlogin = "SELECT * FROM cadastro WHERE email = '$glogin' AND senha = '$gsenha'";
$rsLlogin = $conn->query($query_rsLlogin);
$row_rsLlogin = $rsLlogin->fetch_assoc();
$totalRows_rsLlogin = $rsLlogin->num_rows;

$idd = $row_rsLlogin['Id'];

?>

<div style="color:#000000">

  <? if ($row_rsLlogin['Id'] <> '') { ?>
    <!DOCTYPE html>



    <html dir="ltr" lang="pt-BR">



    <head>

      <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

    </head>

    <body>
      <h3 align="center">Bem vindo ao sistema MPB Administra&ccedil;&atilde;o Judicial, <strong><?php echo $row_rsLlogin['nome']; ?></strong></h3>

      <p align="center">Neste espa&ccedil;o estar&aacute; contida toda a documenta&ccedil;&atilde;o que voc&ecirc; enviar para nossos sistemas. Ap&oacute;s pr&eacute;via an&aacute;lise, o acesso ser&aacute; liberado.</p>

      <div align="center">

        <a class="btn btn-dark mt-20" href="logado.php"><strong>Inicio</strong></a>

        <a class="btn btn-dark mt-20" href="envio-de-documentos.php"><strong>Clique aqui para Enviar Documentos</strong></a>

        <a class="btn btn-dark mt-20" href="logoff.php"><strong>Sair com seguran&ccedil;a</strong></a>
      </div>
      <br /><br />


    <? } ?>

</div>

</body>



</html>