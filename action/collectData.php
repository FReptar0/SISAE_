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


if (!empty($_POST['nombreEncuesta']) && !empty($_POST['nombreUsuario']) && !empty($_POST['nombreEmpresa']) && !empty($_POST['funcionalidad']) && !empty($_POST['confiabilidad']) && !empty($_POST['usabilidad']) && !empty($_POST['rendimiento']) && !empty($_POST['mantenimiento']) && !empty($_POST['portabilidad']) && !empty($_POST['seguridad']) && !empty($_POST['compatibilidad'])) {

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
