<?php

if ($_SESSION['error'] == 1) {
  echo "<script>Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Por favor, ingrese todos los campos'
      })</script>";
}

if ($_SESSION['error'] == 2) {
  echo "<script>Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Error al guardar los datos'
    })</script>";
}
