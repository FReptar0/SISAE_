<?php
session_start();
error_reporting(0);
include 'action/database.php';
$sql = "SELECT ID_ENCUESTAS, NOMBRE_ENCUESTA FROM ENCUESTAS";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'assets/head.php'; ?>
  <title>Encuesta</title>
</head>

<body>
  <?php include 'assets/alerts.php'; ?>
  <h1 id="mainTitle">
    Sistema Automatizado de Encuestas de Calidad de Software.
  </h1>
  <h2 id="secondaryTitle">Evaluación Mensual</h2>

  <div class="contenedor">
    <form action="action/collectData.php" method="post">
      <div class="mb-3 element">
        <label for="tituloEncuesta" class="form-label">Encuesta</label>
        <select name="nombreEncuesta" class="form-select" style="background-color: #e9ecef;" id="tituloEncuesta">
          <?php
          if ($result->num_rows > 0) {
            $validate = 0;
            while ($row = $result->fetch_assoc()) {
              if ($validate > 0) {
                echo "<option value='" . $row['ID_ENCUESTAS'] . "' disabled>" . $row['NOMBRE_ENCUESTA'] . "</option>";
              } else {
                echo "<option value='" . $row['ID_ENCUESTAS'] . "'>" . $row['NOMBRE_ENCUESTA'] . "</option>";
                $validate += 1;
              }
            }
          }
          ?>
        </select>
        <!-- <input type="text" class="form-control" name="nombreEncuesta" id="tituloEncuesta" value="Encuesta de calidad 10-2022" readonly> -->
      </div>
      <div class="element-2">
        <div class="row">
          <div class="col">
            <div class="mb-3">
              <label for="usuario" class="form-label">Usuario</label>
              <input type="text" name="nombreUsuario" class="form-control" id="usuario" placeholder="Luis Hern&aacute;ndez" aria-describedby="Nombre de usuario" autocomplete="off" />
            </div>
          </div>
          <div class="col">
            <div class="mb-3">
              <label for="empresa" class="form-label">Empresa</label>
              <input type="text" name="nombreEmpresa" class="form-control" id="empresa" placeholder="Los Cochilocos S.A. de C.V." aria-describedby="Nombre de la empresa" autocomplete="off" />
            </div>
          </div>
        </div>
      </div>

      <div class="table-area">
        <table class="table table-bordered"">
          <tr>
            <th style=" padding-top: 30px">CARACTERÍSTICAS</th>
          <th style="color: #ff2825;width: 250px;">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-sad" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <circle cx="12" cy="12" r="9" />
              <line x1="9" y1="10" x2="9.01" y2="10" />
              <line x1="15" y1="10" x2="15.01" y2="10" />
              <path d="M9.5 15.25a3.5 3.5 0 0 1 5 0" />
            </svg>
            <br />
            Mala
          </th>
          <th style="color: #ff9300;width: 250px;">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-confuzed" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff9300" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <circle cx="12" cy="12" r="9" />
              <line x1="9" y1="10" x2="9.01" y2="10" />
              <line x1="15" y1="10" x2="15.01" y2="10" />
              <path d="M9.5 16a10 10 0 0 1 6 -1.5" />
            </svg>
            <br />
            Regular
          </th>
          <th style="color: #ffec00;width: 250px;">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-empty" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffec00" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <circle cx="12" cy="12" r="9" />
              <line x1="9" y1="10" x2="9.01" y2="10" />
              <line x1="15" y1="10" x2="15.01" y2="10" />
              <line x1="9" y1="15" x2="15" y2="15" />
            </svg>
            <br />
            Buena
          </th>
          <th style="color: #7bc62d;width: 250px;">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-smile" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#7bc62d" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <circle cx="12" cy="12" r="9" />
              <line x1="9" y1="10" x2="9.01" y2="10" />
              <line x1="15" y1="10" x2="15.01" y2="10" />
              <path d="M9.5 15a3.5 3.5 0 0 0 5 0" />
            </svg>
            <br />
            Muy Buena
          </th>
          <th style="color: #00abfb;width: 250px;">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-happy" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00abfb" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <circle cx="12" cy="12" r="9" />
              <line x1="9" y1="9" x2="9.01" y2="9" />
              <line x1="15" y1="9" x2="15.01" y2="9" />
              <path d="M8 13a4 4 0 1 0 8 0m0 0h-8" />
            </svg>
            <br />
            Excelente
          </th>
          </tr>
          <tr>
            <td>Funcionalidad</td>
            <td>
              <input type="radio" id="fmala" class="mala" value="1" name="funcionalidad" />
            </td>
            <td>
              <input type="radio" id="fregular" class="regular" value="2" name="funcionalidad" />
            </td>
            <td>
              <input type="radio" id="fbuena" class="buena" value="3" name="funcionalidad" />
            </td>
            <td>
              <input type="radio" id="fmuybuena" class="muy-buena" value="4" name="funcionalidad" />
            </td>
            <td>
              <input type="radio" id="fexcelente" class="excelente" value="5" name="funcionalidad" />
            </td>
          </tr>
          <tr>
            <td>Confiabilidad</td>
            <td>
              <input type="radio" id="cmala" class="mala" value="1" name="confiabilidad" />
            </td>
            <td>
              <input type="radio" id="cregular" class="regular" value="2" name="confiabilidad" />
            </td>
            <td>
              <input type="radio" id="cbuena" class="buena" value="3" name="confiabilidad" />
            </td>
            <td>
              <input type="radio" id="cmuybuena" class="muy-buena" value="4" name="confiabilidad" />
            </td>
            <td>
              <input type="radio" id="cexcelente" class="excelente" value="5" name="confiabilidad" />
            </td>
          </tr>
          <tr>
            <td>Usabilidad</td>
            <td>
              <input type="radio" id="umala" class="mala" value="1" name="usabilidad" />
            </td>
            <td>
              <input type="radio" id="uregular" class="regular" value="2" name="usabilidad" />
            </td>
            <td>
              <input type="radio" id="ubuena" class="buena" value="3" name="usabilidad" />
            </td>
            <td>
              <input type="radio" id="umuybuena" class="muy-buena" value="4" name="usabilidad" />
            </td>
            <td>
              <input type="radio" id="uexcelente" class="excelente" value="5" name="usabilidad" />
            </td>
          </tr>
          <tr>
            <td>Rendimiento</td>
            <td>
              <input type="radio" id="rmala" class="mala" value="1" name="rendimiento" />
            </td>
            <td>
              <input type="radio" id="rregular" class="regular" value="2" name="rendimiento" />
            </td>
            <td>
              <input type="radio" id="rbuena" class="buena" value="3" name="rendimiento" />
            </td>
            <td>
              <input type="radio" id="rmuybuena" class="muy-buena" value="4" name="rendimiento" />
            </td>
            <td>
              <input type="radio" id="rexcelente" class="excelente" value="5" name="rendimiento" />
            </td>
          </tr>
          <tr>
            <td>Mantenimiento</td>
            <td>
              <input type="radio" id="mmala" class="mala" value="1" name="mantenimiento" />
            </td>
            <td>
              <input type="radio" id="mregular" class="regular" value="2" name="mantenimiento" />
            </td>
            <td>
              <input type="radio" id="mbuena" class="buena" value="3" name="mantenimiento" />
            </td>
            <td>
              <input type="radio" id="mmuybuena" class="muy-buena" value="4" name="mantenimiento" />
            </td>
            <td>
              <input type="radio" id="mexcelente" class="excelente" value="5" name="mantenimiento" />
            </td>
          </tr>
          <tr>
            <td>Portabilidad</td>
            <td>
              <input type="radio" id="pmala" class="mala" value="1" name="portabilidad" />
            </td>
            <td>
              <input type="radio" id="pregular" class="regular" value="2" name="portabilidad" />
            </td>
            <td>
              <input type="radio" id="pbuena" class="buena" value="3" name="portabilidad" />
            </td>
            <td>
              <input type="radio" id="pmuybuena" class="muy-buena" value="4" name="portabilidad" />
            </td>
            <td>
              <input type="radio" id="pexcelente" class="excelente" value="5" name="portabilidad" />
            </td>
          </tr>
          <tr>
            <td>Seguridad</td>
            <td>
              <input type="radio" id="smala" class="mala" value="1" name="seguridad" />
            </td>
            <td>
              <input type="radio" id="sregular" class="regular" value="2" name="seguridad" />
            </td>
            <td>
              <input type="radio" id="sbuena" class="buena" value="3" name="seguridad" />
            </td>
            <td>
              <input type="radio" id="smuybuena" class="muy-buena" value="4" name="seguridad" />
            </td>
            <td>
              <input type="radio" id="sexcelente" class="excelente" value="5" name="seguridad" />
            </td>
          </tr>
          <tr>
            <td>Compatibilidad</td>
            <td>
              <input type="radio" id="comala" class="mala" value="1" name="compatibilidad" />
            </td>
            <td>
              <input type="radio" id="coregular" class="regular" value="2" name="compatibilidad" />
            </td>
            <td>
              <input type="radio" id="cobuena" class="buena" value="3" name="compatibilidad" />
            </td>
            <td>
              <input type="radio" id="comuybuena" class="muy-buena" value="4" name="compatibilidad" />
            </td>
            <td>
              <input type="radio" id="coexcelente" class="excelente" value="5" name="compatibilidad" />
            </td>
          </tr>
        </table>
      </div>

      <div class="botones">
        <input style="margin-right: 30px" class="btn btn-danger" type="reset" value="Eliminar" />
        <input style="margin-left: 30px" class="btn btn-success" type="submit" value="Guardar" />
      </div>
    </form>
  </div>
  <?php include 'assets/invalidateSVariables.php'; ?>
</body>

</html>