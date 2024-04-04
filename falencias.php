<?php require_once('Connections/banco1.php'); ?>

<?php
if (!function_exists("GetSQLValueString")) {
  function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
  {
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


$query_rsComarca = "SELECT falencia.comerca FROM falencia WHERE tipo = 'Falencia' GROUP BY falencia.comerca";
$rsComarca = $conn->query($query_rsComarca) or die($conn->getError());
$row_rsComarca = $rsComarca->fetch_assoc();
$totalRows_rsComarca = $rsComarca->num_rows;

$query_rsMassa = "SELECT falencia.empresa FROM falencia WHERE tipo = 'Falencia' GROUP BY falencia.empresa";
$rsMassa = $conn->query($query_rsMassa) or die($conn->getError());
$row_rsMassa = $rsMassa->fetch_assoc();
$totalRows_rsMassa = $rsMassa->num_rows;

$cc = $_GET['comarca'];
$mm = $_GET['massa'];

$query_rsBusca = "SELECT * FROM falencia WHERE ( comerca LIKE '%$cc%' AND empresa LIKE '%$mm%' ) AND tipo = 'Falencia'";
$rsBusca = $conn->query($query_rsBusca) or die($conn->getError());
$row_rsBusca = $rsBusca->fetch_assoc();
$totalRows_rsBusca = $rsBusca->num_rows;
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
  <script src="js/vendor/modernizr-2.8.3.min.js"></script>

</head>

<body>

  <!--
    [if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]
  -->

  <?php include("topo.php") ?>
  <!-- Start breadcumb Area -->
  <div class="page-area"><br /><br /><br /><br /><br />
    <div class="breadcumb-overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="breadcrumb text-center">
            <div class="section-headline white-headline">
              <h3>FAL&Ecirc;NCIAS</h3><br /><br /><br />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><br /><br />

  <!-- Section: Attorneys -->
  <form action="falencias.php" method="get" name="busca1">
    <div class="section-title text-center icon-bg">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-sm-6">
              <div>
                <select id="comarca" name="comarca" class="form-control required">
                  <option value="" selected>Comarca</option>
                  <?php do { ?>
                    <option value="<?php echo $row_rsComarca['comerca']; ?>"><?php echo $row_rsComarca['comerca']; ?></option> <?php } while ($row_rsComarca = $rsComarca->fetch_assoc()); ?>
                </select>
              </div>
            </div>

            <div class="col-sm-6">
              <select id="massa" name="massa" class="form-control required">
                <option value="" selected>Massa Falida</option>
                <?php do { ?>
                  <option value="<?php echo $row_rsMassa['empresa']; ?>"><?php echo $row_rsMassa['empresa']; ?></option> <?php } while ($row_rsMassa = $rsMassa->fetch_assoc()); ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
            <button type="submit" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10" data-loading-text="aguarde...">buscar</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <br /><br />

  <div class="row">
    <div class="col-md-6">
      <?php do { ?>
        <div class="sm-display-block mt-sm-10 mb-sm-10">

          <a class="p-5 text-black font-17 pl-10 pr-10" href="falencias-detalhes.php?codigo=<?php echo $row_rsBusca['Id']; ?>"><strong><?php echo $row_rsBusca['empresa']; ?></strong></a>
        </div>
        <br />
      <?php } while ($row_rsBusca = $rsBusca->fetch_assoc()); ?>
    </div>
  </div>
  <br /><br /><br /><br /><br />
  </div>
  <br /><br /><br /><br /><br />

  <!-- end main-content -->

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