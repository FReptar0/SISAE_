<?php
include 'database.php';
// Contador de respuestas
$sql = "SELECT COUNT(ID_RESPUESTAS) AS RESULT FROM RESPUESTAS";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Calcular porcentaje de calidad unitaria
$puntajes = "SELECT FUNCIONALIDAD,CONFIABILIDAD,USABILIDAD,RENDIMIENTO,MANTENIMIENTO,PORTABILIDAD,SEGURIDAD,COMPATIBILIDAD FROM RESPUESTAS WHERE ID_RESPUESTAS = $row[RESULT]";
$resultPuntajes = $conn->query($puntajes);
$rowPuntajes = $resultPuntajes->fetch_assoc();
$sumPuntajes = $rowPuntajes['FUNCIONALIDAD'] + $rowPuntajes['CONFIABILIDAD'] + $rowPuntajes['USABILIDAD'] + $rowPuntajes['RENDIMIENTO'] + $rowPuntajes['MANTENIMIENTO'] + $rowPuntajes['PORTABILIDAD'] + $rowPuntajes['SEGURIDAD'] + $rowPuntajes['COMPATIBILIDAD'];
$promUnitario = ($sumPuntajes * 100) / 40;
// Calcular porcentaje de calidad general
$puntajesGenerañes = "SELECT FUNCIONALIDAD,CONFIABILIDAD,USABILIDAD,RENDIMIENTO,MANTENIMIENTO,PORTABILIDAD,SEGURIDAD,COMPATIBILIDAD FROM RESPUESTAS";
$resultPuntajesGenerales = $conn->query($puntajesGenerañes);

if ($resultPuntajesGenerales->num_rows > 0) {
    $sumPuntajesGenerales = 0;
    while ($rowPuntajesGenerales = $resultPuntajesGenerales->fetch_assoc()) {
        $sumPuntajesGenerales += $rowPuntajesGenerales['FUNCIONALIDAD'] + $rowPuntajesGenerales['CONFIABILIDAD'] + $rowPuntajesGenerales['USABILIDAD'] + $rowPuntajesGenerales['RENDIMIENTO'] + $rowPuntajesGenerales['MANTENIMIENTO'] + $rowPuntajesGenerales['PORTABILIDAD'] + $rowPuntajesGenerales['SEGURIDAD'] + $rowPuntajesGenerales['COMPATIBILIDAD'];
    }
}

$promGeneral = ($sumPuntajesGenerales * 100) / ($row["RESULT"] * 40);

// Evaluacion de los resultados unitarios

if ($promUnitario == 100 || $promUnitario >= 80) {
    $descripcionUno = "Excelente";
    $claseUno = "excelente";
} elseif ($promUnitario < 80 && $promUnitario >= 60) {
    $descripcionUno = "Muy buena";
    $claseUno = "muy-buena";
} elseif ($promUnitario < 60 && $promUnitario >= 40) {
    $descripcionUno = "Buena";
    $claseUno = "buena";
} elseif ($promUnitario < 40 && $promUnitario >= 20) {
    $descripcionUno = "Regular";
    $claseUno = "regular";
} elseif ($promUnitario < 20 && $promUnitario >= 0) {
    $descripcionUno = "Mala";
    $claseUno = "mala";
}

// Evaluacion de los resultados generales

if ($promGeneral == 100 || $promGeneral >= 80) {
    $descripcionDos = "Excelente";
    $claseDos = "excelente";
} elseif ($promGeneral < 80 && $promGeneral >= 60) {
    $descripcionDos = "Muy buena";
    $claseDos = "muy-buena";
} elseif ($promGeneral < 60 && $promGeneral >= 40) {
    $descripcionDos = "Buena";
    $claseDos = "buena";
} elseif ($promGeneral < 40 && $promGeneral >= 20) {
    $descripcionDos = "Regular";
    $claseDos = "regular";
} elseif ($promGeneral < 20 && $promGeneral >= 0) {
    $descripcionDos = "Mala";
    $claseDos = "mala";
}