<?php require_once('Connections/banco1.php'); ?>

<?php require_once('getSQLValueString.php'); ?>

<?php
$numreg = 12; // Quantos registros por p�gina vai ser mostrado

if (!isset($_GET['pg'])) {

  $_GET['pg'] = '0';
}

$inicial = $_GET['pg'] * $numreg;

$tt = $_GET['categoria'];


$query_sql = "SELECT * FROM noticia ORDER BY codigo DESC LIMIT $inicial, $numreg";
$sql = $conn->query($query_sql) or die($conn->getError());
$row_sql = $sql->fetch_assoc();
$totalRows_sql = $sql->num_rows;

$query_sql_conta = "SELECT * FROM noticia ORDER BY codigo DESC";
$sql_conta = $conn->query($query_sql_conta) or die($conn->getError());
$row_sql_conta = $sql_conta->fetch_assoc();
$totalRows_sql_conta = $sql_conta->num_rows;

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

  <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

  <?php include("topo.php") ?>
  <!-- Start breadcumb Area -->
  <div class="page-area"><br /><br /><br /><br /><br />
    <div class="breadcumb-overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="breadcrumb text-center">
            <div class="section-headline white-headline">
              <h3>NOT&Iacute;CIAS</h3><br /><br /><br />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End breadcumb Area -->


  <!--Blog Area Start-->
  <div class="blog-page-area">
    <div class="container">
      <div class="row">
        <?php do {

          // Agora vamos montar o c&oacute;digo. Pegue o valor total de resultados: 

          $total = $totalRows_sql;

          // Defina o n&uacute;mero de colunas que voc&ecirc; deseja exibir: 

          $colunas = "3";

          // Agora vamos ao "truque": 

          if ($total > 0) {

            for ($i = 0; $i < $total; $i++) {

              if (($i % $colunas) == 0) {

        ?>

      </div>
      <div class="row">

      <? } ?>
      <div class="blog-grid">

        <!-- Start single blog -->
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="single-blog">
            <div align="center" class="blog-content">
              <a href="noticia.php?codigo=<?php echo $row_sql['codigo']; ?>">
                <h6><?php echo substr($row_sql['titulo'], 0, 75); ?>...</h6>
              </a>
              <span class="date-type">
                <?php echo date('d/m/Y', strtotime($row_sql['data_publicacao'])); ?>
              </span><br /><br />
              <p><?php echo substr($row_sql['chamada'], 0, 75); ?>...</p>
              <p align="center"><a class="read-more" href="noticia.php?codigo=<?php echo $row_sql['codigo']; ?>"> leia mais</a></p>
            </div>
          </div>
        </div>
        <!-- End single blog -->


      </div>
      <? $row_sql = $sql->fetch_assoc(); ?>

    <? } ?> <? } ?>

<? } while ($row_sql = $sql->fetch_assoc()); ?>

?>
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