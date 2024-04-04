<?php require_once('Connections/banco1.php'); ?>

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



$colname_Recordset1 = "-1";

if (isset($_GET['codigo'])) {

  $colname_Recordset1 = $_GET['codigo'];

}

mysql_select_db($database_banco1, $banco1);

$query_Recordset1 = sprintf("SELECT * FROM noticia WHERE codigo = %s", GetSQLValueString($colname_Recordset1, "int"));

$Recordset1 = mysql_query($query_Recordset1, $banco1) or die(mysql_error());

$row_Recordset1 = mysql_fetch_assoc($Recordset1);

$totalRows_Recordset1 = mysql_num_rows($Recordset1);

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
        </div><br /><br />
        <!-- End breadcumb Area -->
        <!-- about-area start -->
        <div class="about-area">
            <div class="container">
                <div class="row">
                    <!-- column end -->
                    <div>
                        <div class="about-content">
                            <h3 align="center"><?php echo $row_Recordset1['titulo']; ?></h3><br />
                            <h6 align="center"><i><?php echo $row_Recordset1['chamada']; ?></i></h6><br /><br />
                            <p><?php echo $row_Recordset1['descricao']; ?></p><br /><br />
                            <p><strong>Fonte:</strong> <?php echo $row_Recordset1['autor']; ?></p>
                            <p><strong>Data:</strong> <?php echo date('d/m/Y', strtotime($row_Recordset1['data_publicacao'])); ?></p>                                        
                        </div>
                    </div>
                    <!-- column end -->
                </div>
            </div>
        </div><br /><br />
        <!-- about-area end -->

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
<?php
mysql_free_result($rsQuem1);
?>