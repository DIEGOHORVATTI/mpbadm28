<?php require_once('Connections/banco1.php'); ?>

<?php require_once('./getSQLValueString.php'); ?>

<?php
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