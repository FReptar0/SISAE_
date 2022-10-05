<?php
include 'action/process.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'assets/head.php'; ?>
  <title>Resultados</title>
</head>

<body>
  <h1 id="mainTitle">
    Sistema Automatizado de Encuestas de Calidad de Software.
  </h1>
  <h2 id="secondaryTitle">Reporte de Resultados</h2>

  <div class="contenedor-resultados p-3">
    <h1>Resultado:</h1>
    <div class="mb-5" id="resultado">
      <h2 id="h2Uno" class="<?echo $claseUno; ?>"><span id="porIndividual"><?php echo $promUnitario; ?></span>%</h2>
      <h3 id="descripcionUno" class="<?echo $claseUno; ?>"><?php echo $descripcionUno; ?></h3>
    </div>
    <div id="resultadoGeneral">
      <h3 class="text-dark">Resultado general:</h3>
      <div class="element-2">
        <div class="row">
          <div class="col" style="position: relative">
            <h5 id="respuestas">
              <span id="numRespuestas"> <?php echo $row["RESULT"]; ?></span> respuestas
            </h5>
          </div>
          <div class="col m-0 p-0">
            <h2 class="<?echo $claseDos; ?>" id="h2Dos"><span id="porGeneral"><?php echo $promGeneral; ?></span>%</h2>
            <h3 class="<?echo $claseDos; ?>" id="descripcionDos" style="margin-top: -8%;"><?php echo $descripcionDos; ?></h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="boton">
    <a href="assets/invalidateSession.php">
      <button type="button" class="btn btn-secondary">Regresar</button>
    </a>
  </div>
</body>

</html>