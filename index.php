<?php require_once('Connections/banco1.php'); ?>

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

$query_rsEquipe = "SELECT * FROM equipe";
$rsEquipe = $conn->query($query_rsEquipe) or die($conn->getError());
$row_rsEquipe = $rsEquipe->fetch_assoc();
$totalRows_rsEquipe = $rsEquipe->num_rows;

$query_rsBanner = "SELECT * FROM banner WHERE local = 'Slide'";
$rsBanner = $conn->query($query_rsBanner) or die($conn->getError());
$row_rsBanner = $rsBanner->fetch_assoc();
$totalRows_rsBanner = $rsBanner->num_rows;

$query_rsEstrutura = "SELECT * FROM banner WHERE `local` = 'Estrutura'";
$rsEstrutura = $conn->query($query_rsEstrutura) or die($conn->getError());
$row_rsEstrutura = $rsEstrutura->fetch_assoc();
$totalRows_rsEstrutura = $rsEstrutura->num_rows;

$query_rsNoticias = "SELECT * FROM noticia ORDER BY codigo DESC LIMIT 3";
$rsNoticias = $conn->query($query_rsNoticias) or die($conn->getError());
$row_rsNoticias = $rsNoticias->fetch_assoc();
$totalRows_rsNoticias = $rsNoticias->num_rows;

$query_rsDepoimento = "SELECT * FROM depoimento";
$rsDepoimento = $conn->query($query_rsDepoimento) or die($conn->getError());
$row_rsDepoimento = $rsDepoimento->fetch_assoc();
$totalRows_rsDepoimento = $rsDepoimento->num_rows;

$query_rsQuem1 = "SELECT * FROM institucional WHERE codigo = 1";
$rsQuem1 = $conn->query($query_rsQuem1) or die($conn->getError());
$row_rsQuem1 = $rsQuem1->fetch_assoc();
$totalRows_rsQuem1 = $rsQuem1->num_rows;

$query_rsQuem2 = "SELECT * FROM institucional WHERE codigo > 1";
$rsQuem2 = $conn->query($query_rsQuem2) or die($conn->getError());
$row_rsQuem2 = $rsQuem2->fetch_assoc();
$totalRows_rsQuem2 = $rsQuem2->num_rows;

$query_rsComarca = "SELECT falencia.comerca FROM falencia WHERE tipo = 'Falencia' GROUP BY falencia.comerca";
$rsComarca = $conn->query($query_rsComarca) or die($conn->getError());
$row_rsComarca = $rsComarca->fetch_assoc();
$totalRows_rsComarca = $rsComarca->num_rows;

$query_rsMassa = "SELECT falencia.empresa FROM falencia WHERE tipo = 'Falencia' GROUP BY falencia.empresa";
$rsMassa = $conn->query($query_rsMassa) or die($conn->getError());
$row_rsMassa = $rsMassa->fetch_assoc();
$totalRows_rsMassa = $rsMassa->num_rows;

$query_rsComarca2 = "SELECT falencia.comerca FROM falencia WHERE tipo = 'RJ' GROUP BY falencia.comerca";
$rsComarca2 = $conn->query($query_rsComarca2) or die($conn->getError());
$row_rsComarca2 = $rsComarca2->fetch_assoc();
$totalRows_rsComarca2 = $rsComarca2->num_rows;

$query_rsMassa2 = "SELECT falencia.empresa FROM falencia WHERE tipo = 'RJ' GROUP BY falencia.empresa";
$rsMassa2 = $conn->query($query_rsMassa2) or die($conn->getError());
$row_rsMassa2 = $rsMassa2->fetch_assoc();
$totalRows_rsMassa2 = $rsMassa2->num_rows;

$conn->close();
?>


<!doctype html>
<html class="no-js" lang="pt-BR">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>MPB Administra&ccedil;&atilde;o Judicial</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

  <!-- all css here -->

  <!-- bootstrap v3.3.6 css -->
  <link rel="stylesheet" href="arquivos/css/bootstrap.min.css">
  <!-- owl.carousel css -->
  <link rel="stylesheet" href="arquivos/css/owl.carousel.css">
  <link rel="stylesheet" href="arquivos/css/owl.transitions.css">
  <!-- meanmenu css -->
  <link rel="stylesheet" href="arquivos/css/meanmenu.min.css">
  <!-- font-awesome css -->
  <link rel="stylesheet" href="arquivos/css/font-awesome.min.css">
  <link rel="stylesheet" href="arquivos/css/icon.css">
  <link rel="stylesheet" href="arquivos/css/flaticon.css">
  <!-- magnific css -->
  <link rel="stylesheet" href="arquivos/css/magnific.min.css">
  <!-- venobox css -->
  <link rel="stylesheet" href="arquivos/css/venobox.css">
  <!-- style css -->
  <link rel="stylesheet" href="arquivos/style.css">
  <!-- responsive css -->
  <link rel="stylesheet" href="arquivos/css/responsive.css">

  <!-- modernizr css -->
  <script src="arquivos/js/vendor/modernizr-2.8.3.min.js"></script>

</head>

<body>

  <!--[if lt IE 8]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->

  <!-- <div id="preloader"></div> -->

  <?php include("topo.php") ?>

  <?php include("slide.php") ?>

  <p>
  <div class="container">
    <div class="row">
      <div>
        <div>
          <h3 align="center">BUSCA</h3>
        </div>
      </div>
    </div>
  </div>
  </p>
  <table width="98%" border="0" align="center" cellpadding="5" cellspacing="5">
    <tr>
      <td width="50%">
        <h5 align="center">Fal&ecirc;ncias</h5>
      </td>
      <td width="1%">&nbsp;</td>
      <td width="50%">
        <h5 align="center">Recupera&ccedil;&atilde;o Judicial</h5>
      </td>
    </tr>
    <tr>
      <td><?php include("chama_falencias.php"); ?></td>
      <td>&nbsp;</td>
      <td><?php include("chama_rj.php"); ?></td>
    </tr>
  </table>
  <p>&nbsp;</p><br /><br />
  <div class="container">
    <div class="row">
      <div>
        <div>
          <h3 align="center">NOT&Iacute;CIAS</h3>
        </div>
      </div>
    </div>
  </div><br />

  <!--Blog Area Start-->
  <div class="blog-page-area">
    <div class="container">
      <div class="row">
        <div class="blog-grid">
          <?php do { ?>

            <!-- Start single blog -->
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="single-blog">
                <div align="center" class="blog-content">
                  <a href="noticia.php?codigo=<?php echo $row_rsNoticias['codigo']; ?>">
                    <h4><?php echo $row_rsNoticias['titulo']; ?></h4>
                  </a>
                  <span class="date-type">
                    <?php echo date('d/m/Y', strtotime($row_rsNoticias['data_publicacao'])); ?>
                  </span><br /><br />
                  <p><?php echo $row_rsNoticias['chamada']; ?></p>
                  <p align="center"><a class="read-more" href="noticia.php?codigo=<?php echo $row_rsNoticias['codigo']; ?>"> leia mais</a></p>
                </div>
              </div>
            </div>
            <!-- End single blog -->

            <!-- <?php } while ($row_rsNoticias = $rsNoticias->fetch_assoc()); ?> -->

        </div>
      </div>
      <!-- End row -->
    </div>
  </div>
  <!--End of Blog Area-->


  <!--End of Blog Area-->
  <?php include("rodape.php") ?>

  <!-- all js here -->

  <!-- jquery latest version -->
  <script src="arquivos/js/vendor/jquery-1.12.4.min.js"></script>
  <!-- bootstrap js -->
  <script src="arquivos/js/bootstrap.min.js"></script>
  <!-- owl.carousel js -->
  <script src="arquivos/js/owl.carousel.min.js"></script>
  <!-- Counter js -->
  <script src="arquivos/js/jquery.counterup.min.js"></script>
  <!-- waypoint js -->
  <script src="arquivos/js/waypoints.js"></script>
  <!-- isotope js -->
  <script src="arquivos/js/isotope.pkgd.min.js"></script>
  <!-- stellar js -->
  <script src="arquivos/js/jquery.stellar.min.js"></script>
  <!-- magnific js -->
  <script src="arquivos/js/magnific.min.js"></script>
  <!-- venobox js -->
  <script src="arquivos/js/venobox.min.js"></script>
  <!-- meanmenu js -->
  <script src="arquivos/js/jquery.meanmenu.js"></script>
  <!-- Form validator js -->
  <script src="arquivos/js/form-validator.min.js"></script>
  <!-- plugins js -->
  <script src="arquivos/js/plugins.js"></script>
  <!-- main js -->
  <script src="arquivos/js/main.js"></script>
</body>

</html>