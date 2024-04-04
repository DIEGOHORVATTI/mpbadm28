<?php require_once('Connections/banco1.php'); ?>
<?
session_start();


$glogin = $_SESSION["rrlogin"]; 
$gsenha = $_SESSION["rrsenha"];
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_banco1, $banco1);
$query_rsLlogin = "SELECT * FROM cadastro WHERE email = '$glogin' AND senha = '$gsenha'";
$rsLlogin = mysql_query($query_rsLlogin, $banco1) or die(mysql_error());
$row_rsLlogin = mysql_fetch_assoc($rsLlogin);
$totalRows_rsLlogin = mysql_num_rows($rsLlogin);

$idd = $row_rsLlogin['Id'];

?>

<div style="color:#000000">

<? if ( $row_rsLlogin['Id'] <> '' ) { ?>
<!DOCTYPE html>



<html dir="ltr" lang="pt-BR">



<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>
<body>
 <h3 align="center">Bem vindo ao sistema MPB Administra&ccedil;&atilde;o Judicial, <strong><?php echo $row_rsLlogin['nome']; ?></strong></h3>

                  <p align="center">Neste espa&ccedil;o estar&aacute; contida toda a documenta&ccedil;&atilde;o que voc&ecirc; enviar para nossos sistemas. Ap&oacute;s pr&eacute;via  an&aacute;lise, o acesso ser&aacute; liberado.</p>

    			  <div align="center">
                  
                  <a class="btn btn-dark mt-20" href="logado.php"><strong>Inicio</strong></a>
                  
                  <a class="btn btn-dark mt-20" href="envio-de-documentos.php"><strong>Clique aqui para Enviar Documentos</strong></a>
                  
                  <a class="btn btn-dark mt-20" href="logoff.php"><strong>Sair com seguran&ccedil;a</strong></a></div>
    			  <br /><br />
                  
                  
                  <? } ?>

</div>


<?php
mysql_free_result($rsLlogin);
?>

</body>



</html>