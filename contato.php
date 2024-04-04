<?php require_once('Connections/banco1.php'); ?>

<?php require_once('./getSQLValueString.php'); ?>

<?php
$query_rsQuem1 = "SELECT * FROM institucional WHERE codigo = 1";
$rsQuem1 = $conn->query($query_rsQuem1) or die($conn->getError());
$row_rsQuem1 = $rsQuem1->fetch_assoc();
$totalRows_rsQuem1 = $rsQuem1->num_rows;

$query_rsQuem2 = "SELECT * FROM institucional WHERE codigo > 1";
$rsQuem2 = $conn->query($query_rsQuem2) or die($conn->getError());
$row_rsQuem2 = $rsQuem2->fetch_assoc();
$totalRows_rsQuem2 = $rsQuem2->num_rows;

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
  <![endif]
  -->

  <?php include("topo.php") ?>

  <!-- Start breadcumb Area -->
  <div class="page-area">
    <br /><br /><br /><br /><br />
    <div class="breadcumb-overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="breadcrumb text-center">
            <div class="section-headline white-headline">
              <h3>CONTATO</h3><br /><br /><br />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Start contact Area -->
  <div class="contact-page area-padding">
    <div class="container">
      <div class="row">
        <div>
          <div class="contact-form">
            <div class="row">
              <form id="contactForm" method="POST" action="#" class="contact-form">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="name" class="form-control" placeholder="Seu Nome" required data-error="Digite seu nome">
                  <div class="help-block with-errors"></div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="email" class="email form-control" id="email" placeholder="Seu E-Mail" required data-error="Digite seu E-Mail">
                  <div class="help-block with-errors"></div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <input type="text" id="msg_subject" class="form-control" placeholder="Assunto" required data-error="Digite o Assunto">
                  <div class="help-block with-errors"></div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <textarea id="message" rows="7" placeholder="Mensagem" class="form-control" required data-error="Digite sua Mensagem"></textarea>
                  <div class="help-block with-errors"></div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                  <button type="submit" id="submit" class="contact-btn">Enviar</button>
                  <div id="msgSubmit" class="h3 text-center hidden"></div>
                  <div class="clearfix"></div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <br />
        <br />

        <!-- End contact Form -->
        <div>
          <div>
            <h3 align="center">Fale Conosco</h3>
            <div class="contact-icon">
              <div class="single-contact">
                <h5>Cuiab&aacute;/MT</h5>
                <a href="#"><i class="fa fa-map"></i><span>Rua Mistral, N&ordm; 09, ED. The Point, Sala 407</span></a>
                <a href="#"><i class="fa fa-map"></i><span>Bairro: Despraiado - Cuiab&aacute;/MT - CEP: 78048-222</span></a>
                <a href="#"><i class="fa fa-phone"></i><span>(65) 3365-4103</span></a>
                <a href="#"><i class="fa fa-envelope"></i><span>contato@mpbadmjudicial.com.br</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- End Contact Area -->
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3843.4992545715354!2d-56.088848585726375!3d-15.564952121498498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x939db113d822ca23%3A0xec778a58b9e9aba8!2sEdif%C3%ADcio%20The%20Point%20Smart%20Business!5e0!3m2!1spt-BR!2sbr!4v1576252293045!5m2!1spt-BR!2sbr" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

  <!--End of Blog Area-->
  <?php include("rodape.php") ?>

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