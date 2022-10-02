<?php
include 'database.php';
// Contador de respuestas
$sql = "SELECT COUNT(ID_RESPUESTAS) AS RESULT FROM RESPUESTAS";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Calcular porcentaje de calidad unitaria

// Calcular porcentaje de calidad general
