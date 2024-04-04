<?php require_once('Connections/banco1.php'); ?>

<h1>é ....</h1>

<?php

if (!function_exists("GetSQLValueString")) {
  function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
  {

    // $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
    $theValue = function_exists("mysql_real_escape_string") ? mb_strtolower($theValue) : strtolower($theValue);

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

$databaseConnection = $conn;

$query_rsEquipe = "SELECT * FROM equipe";
$rsEquipe = $databaseConnection->query($query_rsEquipe) or die($databaseConnection->getError());
$row_rsEquipe = $rsEquipe->fetch_assoc();
$totalRows_rsEquipe = $rsEquipe->num_rows;

$query_rsBanner = "SELECT * FROM banner WHERE local = 'Slide'";
$rsBanner = $databaseConnection->query($query_rsBanner) or die($databaseConnection->getError());
$row_rsBanner = $rsBanner->fetch_assoc();
$totalRows_rsBanner = $rsBanner->num_rows;

$query_rsEstrutura = "SELECT * FROM banner WHERE `local` = 'Estrutura'";
$rsEstrutura = $databaseConnection->query($query_rsEstrutura) or die($databaseConnection->getError());
$row_rsEstrutura = $rsEstrutura->fetch_assoc();
$totalRows_rsEstrutura = $rsEstrutura->num_rows;

$query_rsNoticias = "SELECT * FROM noticia ORDER BY codigo DESC LIMIT 3";
$rsNoticias = $databaseConnection->query($query_rsNoticias) or die($databaseConnection->getError());
$row_rsNoticias = $rsNoticias->fetch_assoc();
$totalRows_rsNoticias = $rsNoticias->num_rows;

$query_rsDepoimento = "SELECT * FROM depoimento";
$rsDepoimento = $databaseConnection->query($query_rsDepoimento) or die($databaseConnection->getError());
$row_rsDepoimento = $rsDepoimento->fetch_assoc();
$totalRows_rsDepoimento = $rsDepoimento->num_rows;

$query_rsQuem1 = "SELECT * FROM institucional WHERE codigo = 1";
$rsQuem1 = $databaseConnection->query($query_rsQuem1) or die($databaseConnection->getError());
$row_rsQuem1 = $rsQuem1->fetch_assoc();
$totalRows_rsQuem1 = $rsQuem1->num_rows;

$query_rsQuem2 = "SELECT * FROM institucional WHERE codigo > 1";
$rsQuem2 = $databaseConnection->query($query_rsQuem2) or die($databaseConnection->getError());
$row_rsQuem2 = $rsQuem2->fetch_assoc();
$totalRows_rsQuem2 = $rsQuem2->num_rows;

$query_rsComarca = "SELECT falencia.comerca FROM falencia WHERE tipo = 'Falencia' GROUP BY falencia.comerca";
$rsComarca = $databaseConnection->query($query_rsComarca) or die($databaseConnection->getError());
$row_rsComarca = $rsComarca->fetch_assoc();
$totalRows_rsComarca = $rsComarca->num_rows;

$query_rsMassa = "SELECT falencia.empresa FROM falencia WHERE tipo = 'Falencia' GROUP BY falencia.empresa";
$rsMassa = $databaseConnection->query($query_rsMassa) or die($databaseConnection->getError());
$row_rsMassa = $rsMassa->fetch_assoc();
$totalRows_rsMassa = $rsMassa->num_rows;

$query_rsComarca2 = "SELECT falencia.comerca FROM falencia WHERE tipo = 'RJ' GROUP BY falencia.comerca";
$rsComarca2 = $databaseConnection->query($query_rsComarca2) or die($databaseConnection->getError());
$row_rsComarca2 = $rsComarca2->fetch_assoc();
$totalRows_rsComarca2 = $rsComarca2->num_rows;

$query_rsMassa2 = "SELECT falencia.empresa FROM falencia WHERE tipo = 'RJ' GROUP BY falencia.empresa";
$rsMassa2 = $databaseConnection->query($query_rsMassa2) or die($databaseConnection->getError());
$row_rsMassa2 = $rsMassa2->fetch_assoc();
$totalRows_rsMassa2 = $rsMassa2->num_rows;

$databaseConnection->close();
?>


<h1>kapa</h1>