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
$promUnitario = ($sumPuntajes*100)/40;
// Calcular porcentaje de calidad general
$puntajesGenerañes = "SELECT FUNCIONALIDAD,CONFIABILIDAD,USABILIDAD,RENDIMIENTO,MANTENIMIENTO,PORTABILIDAD,SEGURIDAD,COMPATIBILIDAD FROM RESPUESTAS";
$resultPuntajesGenerales = $conn->query($puntajesGenerañes);

if ($resultPuntajesGenerales->num_rows > 0) {
    $sumPuntajesGenerales = 0;
    while ($rowPuntajesGenerales = $resultPuntajesGenerales->fetch_assoc()) {
        $sumPuntajesGenerales += $rowPuntajesGenerales['FUNCIONALIDAD'] + $rowPuntajesGenerales['CONFIABILIDAD'] + $rowPuntajesGenerales['USABILIDAD'] + $rowPuntajesGenerales['RENDIMIENTO'] + $rowPuntajesGenerales['MANTENIMIENTO'] + $rowPuntajesGenerales['PORTABILIDAD'] + $rowPuntajesGenerales['SEGURIDAD'] + $rowPuntajesGenerales['COMPATIBILIDAD'];
    }
}
$promGeneral = ($sumPuntajesGenerales*100)/($row["RESULT"]*40);