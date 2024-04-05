<?php require_once('Connections/banco1.php'); ?>

<?php require_once('./getSQLValueString.php'); ?>

<!doctype html>
<html class="no-js" lang="pt-BR">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>MPB Administra&ccedil;&atilde;o Judicial</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="arquivos/img/favicon.ico">

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
  <div class="page-area">
    <br /><br /><br /><br /><br />
    <div class="breadcumb-overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="breadcrumb text-center">
            <div class="section-headline white-headline">
              <h3>Cadastro</h3><br /><br /><br />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- about-area start -->
  <div class="about-area page-padding">
    <div class="container">
      <div class="row">
        <form name="formbusca" action="<?php echo $editFormAction; ?>" method="POST">
          <!-- Section: Registration Form -->
          <section class="divider parallax layer-overlay overlay-light" data-stellar-background-ratio="0.5" data-bg-img="images/bg/bg1.jpg">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 col-md-offset-3 bg-lightest-transparent p-30 pt-10">
                  <h3 class="text-center text-theme-colored mb-20">Cadastro</h3>
                  <? require_once('getSQLValueString.php'); ?>
                  <?php
                  $editFormAction = $_SERVER['PHP_SELF'];
                  if (isset($_SERVER['QUERY_STRING'])) {
                    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
                  }
                  if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formbusca")) {
                    // verificar se ja foi cadastrado
                    $ee = $_POST['email'];

                    $query_rsCadastro = "SELECT * FROM cadastro WHERE email = '$ee'";
                    $rsCadastro = $conn->query($query_rsCadastro) or die($conn->getError());
                    $row_rsCadastro = $rsCadastro->fetch_assoc();
                    $totalRows_rsCadastro = $rsCadastro->num_rows;

                    if ($row_rsCadastro['email'] == '') {
                      $insertSQL = sprintf(
                        "INSERT INTO cadastro (nome, email, senha, celular) VALUES (%s, %s, %s, %s)",
                        GetSQLValueString($_POST['nome'], "text"),
                        GetSQLValueString($_POST['email'], "text"),
                        GetSQLValueString($_POST['senha'], "text"),
                        GetSQLValueString($_POST['celular'], "text")
                      );

                      $Result1 = $conn->query($insertSQL) or die($conn->getError());

                      //SMTP needs accurate times, and the PHP time zone MUST be set
                      //This should be done in your php.ini, but this is how to do it if you don't have access to that
                      date_default_timezone_set('Etc/UTC');
                      ini_set('MAX_EXECUTION_TIME', 3600);

                      require './PHPMailer_5_2_14/class.phpmailer.php';
                      require './PHPMailer_5_2_14/PHPMailerAutoload.php';

                      $mail2 = new PHPMailer;
                      $mail2->isSMTP();
                      $mail2->SMTPDebug = 0;
                      $mail2->Debugoutput = 'html';
                      $mail2->Host = "mail.mpbadmjudicial.com.br";
                      $mail2->Port = 587;
                      $mail2->SMTPAuth = true;
                      $mail2->Username = "envio@mpbadmjudicial.com.br";
                      $mail2->Password = "7y%Uf(-0!UKc";
                      $mail2->setFrom($_POST['email'], 'CADASTRO APROVADO MPB');
                      $mail2->Subject = 'CADASTRO APROVADO MPB';
                      $mail2->Body = "Seu cadastro foi aprovado por nossos administradores, acesse o link http://mpbadmjudicial.com.br/logar.php";
                      //send the message, check for errors
                      if (!$mail2->send()) {
                      } else {
                      }
                      $mail = new PHPMailer;
                      $mail->isSMTP();
                      $mail->SMTPDebug = 0;
                      $mail->Debugoutput = 'html';
                      $mail->Host = "mail.mpbadmjudicial.com.br";
                      $mail->Port = 587;
                      $mail->SMTPAuth = true;
                      $mail->Username = "envio@mpbadmjudicial.com.br";
                      $mail->Password = "7y%Uf(-0!UKc";
                      $mail->setFrom('envio@mpbadmjudicial.com.br', 'NOVO CADASTRO MPB');
                      $mail->addAddress('marcelo@inventweb.com.br', 'NOVO CADASTRO MPB');
                      $mail->addAddress('evandroortega@gmail.com', 'NOVO CADASTRO MPB');
                      $mail->addAddress('jbjus@terra.com.br', 'NOVO CADASTRO MPB');
                      $mail->Subject = 'NOVO CADASTRO MPB';
                      $mail->Body = "Nome:" . $_POST['nome'] . " - E-mail:" . $_POST['email'] . "";
                      //send the message, check for errors
                      if (!$mail->send()) {
                        //echo "Mailer Error: " . $mail->ErrorInfo;
                        echo ' <div class="alert alert-success">';
                        echo ' Cadastro efetuado com sucesso!<br />';
                        echo '</div>';
                        header('Location: cadastro.php?op=sim');
                      } else {
                        echo ' <div class="alert alert-success">';
                        echo ' Cadastro efetuado com sucesso!<br />';
                        echo '</div>';
                        header('Location: cadastro.php?op=sim');
                      }
                    } else {
                      echo ' <div class="alert alert-danger">';
                      echo ' E-mail já cadastrado ';
                      echo ' </div>';
                    }
                  }
                  ?>
                  <? if ($_GET['op'] == 'sim') { ?>
                    <div class="alert alert-success">
                      Cadastro efetuado com sucesso!<br />
                    </div>
                  <? } ?>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="form_name">Nome <small>*</small></label>
                        <input id="nome" name="nome" type="text" required="" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="form_email">E-Mail <small>*</small></label>
                        <input id="email" name="email" class="form-control required" type="text">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="form_email">Senha <small>*</small></label>
                        <input id="senha" name="senha" class="form-control required" type="password">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="form_email">Telefone Celular <small>*</small></label>
                        <input id="celular" name="celular" class="form-control required" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <input name="cad" type="submit" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10" value="Cadastrar">
                  </div> <!-- Job Form Validation-->
                  <script type="text/javascript">
                    $("#job_apply_form").validate({
                      submitHandler: function(form) {
                        var form_btn = $(form).find('button[type="submit"]');
                        var form_result_div = '#form-result';
                        $(form_result_div).remove();
                        form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                        var form_btn_old_msg = form_btn.html();
                        form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                        $(form).ajaxSubmit({
                          dataType: 'json',
                          success: function(data) {
                            if (data.status == 'true') {
                              $(form).find('.form-control').val('');
                            }
                            form_btn.prop('disabled', false).html(form_btn_old_msg);
                            $(form_result_div).html(data.message).fadeIn('slow');
                            setTimeout(function() {
                              $(form_result_div).fadeOut('slow')
                            }, 6000);
                          }
                        });
                      }
                    });
                  </script>
                </div>
              </div>
            </div>
          </section>
          <input type="hidden" name="MM_insert" value="formbusca">
        </form>
      </div>
      <!-- end main-content -->

    </div>
  </div>
  </div>
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