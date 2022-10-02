<?php
session_start();
# database connection
include 'database.php';

$nombreEncuesta = $_POST['nombreEncuesta'];
$nombreUsuario = $_POST['nombreUsuario'];
$nombreEmpresa = $_POST['nombreEmpresa'];

$puntajeFuncionalidad = $_POST['funcionalidad'];
$puntajeConfiabilidad = $_POST['confiabilidad'];
$puntajeUsabilidad = $_POST['usabilidad'];
$puntajeRendimiento = $_POST['rendimiento'];
$puntajeMantenimineto = $_POST['mantenimiento'];
$puntajePortabilidad = $_POST['portabilidad'];
$puntajeSeguridad = $_POST['seguridad'];
$puntajeCompatibilidad = $_POST['compatibilidad'];

if (isset($_POST['nombreEncuesta']) && isset($_POST['nombreUsuario']) && isset($_POST['nombreEmpresa']) && isset($_POST['funcionalidad']) && isset($_POST['confiabilidad']) && isset($_POST['usabilidad']) && isset($_POST['rendimiento']) && isset($_POST['mantenimiento']) && isset($_POST['portabilidad']) && isset($_POST['seguridad']) && isset($_POST['compatibilidad'])) {

    try {

        $sql = "INSERT INTO RESPUESTAS (FK_ID_ENCUESTA,EMPRESA,USUARIO,FUNCIONALIDAD,CONFIABILIDAD,USABILIDAD,RENDIMIENTO,MANTENIMIENTO,PORTABILIDAD,SEGURIDAD,COMPATIBILIDAD) VALUES ('$nombreEncuesta', '$nombreUsuario', '$nombreEmpresa', '$puntajeFuncionalidad', '$puntajeConfiabilidad', '$puntajeUsabilidad', '$puntajeRendimiento', '$puntajeMantenimineto', '$puntajePortabilidad', '$puntajeSeguridad', '$puntajeCompatibilidad')";
        $rs = $conn->query($sql);

        if ($rs) {
            echo "Datos guardados correctamente";

            $fields = [
                'puntajeFuncionalidad' => $puntajeFuncionalidad,
                'puntajeConfiabilidad' => $puntajeConfiabilidad,
                'puntajeUsabilidad' => $puntajeUsabilidad,
                'puntajeRendimiento' => $puntajeRendimiento,
                'puntajeMantenimineto' => $puntajeMantenimineto,
                'puntajePortabilidad' => $puntajePortabilidad,
                'puntajeSeguridad' => $puntajeSeguridad,
                'puntajeCompatibilidad' => $puntajeCompatibilidad
            ];

            $_SESSION['fields'] = $fields;

            header("Location: ../results.php");
        } else {
            echo "Error al guardar los datos";
            header("Location: ../index.php");
            $_SESSION['error'] = 2;
        }
    } catch (\Throwable $th) {
        echo $th;
    }
} else {
    header("Location: ../index.php");
    $_SESSION['error'] = 1;
}
