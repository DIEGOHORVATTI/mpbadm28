<?php require_once('Connections/banco1.php'); ?>

<?php require_once('./getSQLValueString.php'); ?>


<?php
$numreg = 12; // Quantos registros por página vai ser mostrado

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
$sql_conta = $conn->query($query_sql_conta);
$row_sql_conta = $sql->fetch_assoc();
$totalRows_sql_conta = $sql->num_rows;
?>


<!DOCTYPE html>

<html dir="ltr" lang="pt-BR">


<head>
  <!-- Meta Tags -->



  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


  <meta name="viewport" content="width=device-width,initial-scale=1.0" />


  <meta name="description" content="" />


  <meta name="keywords" content="" />


  <meta name="author" content="" />
  <!-- Page Title -->


  <title>Case Administração Judicial</title>
  <!-- Favicon and Touch Icons -->


  <link href="images/favicon.png" rel="shortcut icon" type="image/png">
  <!-- Stylesheet -->


  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">


  <link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css">


  <link href="css/animate.css" rel="stylesheet" type="text/css">


  <link href="css/css-plugin-collections.css" rel="stylesheet" />


  <!-- CSS | menuzord megamenu skins -->


  <link id="menuzord-menu-skins" href="css/menuzord-skins/menuzord-boxed.css" rel="stylesheet" />


  <!-- CSS | Main style file -->


  <link href="css/style-main.css" rel="stylesheet" type="text/css">


  <!-- CSS | Theme Color -->


  <link href="css/colors/theme-skin-dark.css" rel="stylesheet" type="text/css">


  <!-- CSS | Preloader Styles -->


  <link href="css/preloader.css" rel="stylesheet" type="text/css">


  <!-- CSS | Custom Margin Padding Collection -->


  <link href="css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">


  <!-- CSS | Responsive media queries -->


  <link href="css/responsive.css" rel="stylesheet" type="text/css">



  <!-- Revolution Slider 5.x CSS settings -->


  <link href="js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css" />
  <!-- external javascripts -->


  <script src="js/jquery-2.2.0.min.js"></script>


  <script src="js/jquery-ui.min.js"></script>


  <script src="js/bootstrap.min.js"></script>


  <!-- JS | jquery plugin collection for this theme -->


  <script src="js/jquery-plugin-collection.js"></script>
  <!-- Revolution Slider 5.x SCRIPTS -->


  <script src="js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>


  <script src="js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
</head>


<body>

  <?php include("topo.php"); ?>


  <!-- Start main-content -->


  <div class="main-content">


    <!-- Section: inner-header -->


    <section class="inner-header divider layer-overlay overlay-dark" data-bg-img="images/bg/bg14.jpg">


      <div class="container pt-30 pb-30">


        <!-- Section Content -->


        <div class="section-content text-center">


          <div class="row">


            <div class="col-md-6 col-md-offset-3 text-center">


              <h2 class="text-theme-colored font-36">Notícias</h2>


              <ol class="breadcrumb text-center mt-10 white">


                <br /><br />


              </ol>


            </div>


          </div>


        </div>


      </div>


    </section>
    <!-- Section: Practice Area -->


    <section>


      <div class="container">


        <div class="section-content">


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

          <div class="col-xs-12 col-sm-6 col-md-4 mb-30">


            <div class="box-hover-effect effect2 bg-lightest-gray p-10 maxwidth400">


              <div class="thumb">


                <div class="overlay white">


                  <div class="display-table">


                    <div class="display-table-cell">


                      <div class="overlay-details text-center">


                        <a class="btn btn-flat btn-dark btn-theme-colored btn-xs" href="noticia.php?codigo=<?php echo $row_sql['codigo']; ?>">Ler Notícia</a>


                      </div>


                    </div>


                  </div>


                </div>


                <div class="details">


                  <h4 align="center"><?php echo $row_sql['titulo']; ?></h4>



                  <div align="left"><span class="text-theme-colored"><?php echo date('d/m/Y', strtotime($row_sql['data_publicacao'])); ?></span></div>


                </div>


              </div>


            </div>


          </div>

          <? $row_sql = $sql->fetch_assoc(); ?>



        <? } ?> <? } ?>



    <? } while ($row_sql = $sql->fetch_assoc()); ?>



    ?>


          </div>


          <div class="container">


            <div class="row">


              <?php include("paginacao.php"); ?>
            </div>


          </div>
        </div>


      </div>


  </div>


  </section>


  </div>


  <!-- Footer -->

  <?php include("rodape.php"); ?>


  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>


  </div>


  <!-- end wrapper -->
  <!-- Footer Scripts -->


  <!-- JS | Custom script for all pages -->


  <script src="js/custom.js"></script>
  <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  


      (Load Extensions only on Local File Systems ! 


       The following part can be removed on Server for On Demand Loading) -->


  <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>


  <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>


  <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>


  <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>


  <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>


  <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>


  <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>


  <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>


  <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>



</body>


</html>