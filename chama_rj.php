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

mysql_select_db($database_banco1, $banco1);
$query_rsComarca = "SELECT falencia.comerca FROM falencia WHERE tipo = 'RJ' GROUP BY falencia.comerca";
$rsComarca = mysql_query($query_rsComarca, $banco1) or die(mysql_error());
$row_rsComarca = mysql_fetch_assoc($rsComarca);
$totalRows_rsComarca = mysql_num_rows($rsComarca);

mysql_select_db($database_banco1, $banco1);
$query_rsMassa = "SELECT falencia.empresa FROM falencia WHERE tipo = 'RJ' GROUP BY falencia.empresa";
$rsMassa = mysql_query($query_rsMassa, $banco1) or die(mysql_error());
$row_rsMassa = mysql_fetch_assoc($rsMassa);
$totalRows_rsMassa = mysql_num_rows($rsMassa);

$cc = $_GET['comarca'];
$mm = $_GET['massa'];

mysql_select_db($database_banco1, $banco1);
$query_rsBusca = "SELECT * FROM falencia WHERE ( comerca LIKE '%$cc%' AND empresa LIKE '%$mm%' ) AND tipo = 'RJ'";
$rsBusca = mysql_query($query_rsBusca, $banco1) or die(mysql_error());
$row_rsBusca = mysql_fetch_assoc($rsBusca);
$totalRows_rsBusca = mysql_num_rows($rsBusca);
?>
<form action="recuperacoes-judiciais.php" method="get" name="busca1">
  <div class="section-title text-center icon-bg">

    <div class="row">

      <div class="col-md-12">

        <div class="row">

          <div class="col-sm-6">

            <div>


              <select id="comarca" name="comarca" class="form-control required">
                <option value="" selected>Comarca</option>
                <?php do { ?>
                  <option value="<?php echo $row_rsComarca['comerca']; ?>"><?php echo $row_rsComarca['comerca']; ?></option> <?php } while ($row_rsComarca = mysql_fetch_assoc($rsComarca)); ?>
              </select>


            </div>

          </div>

          <div class="col-sm-6">

            <select id="massa" name="massa" class="form-control required">
              <option value="" selected>Recuperanda</option>
              <?php do { ?>
                <option value="<?php echo $row_rsMassa['empresa']; ?>"><?php echo $row_rsMassa['empresa']; ?></option> <?php } while ($row_rsMassa = mysql_fetch_assoc($rsMassa)); ?>

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
<?php
mysql_free_result($rsComarca);

mysql_free_result($rsMassa);

mysql_free_result($rsBusca);
?>