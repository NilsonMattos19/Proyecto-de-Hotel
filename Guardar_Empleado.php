<?php
if (isset($_POST["nombre"], $_POST["apellido"], $_POST["cargo"])) {
  // Conexión a la base de datos
  $conexion = mysqli_connect("localhost", "root", "", "hotel");

  // Verificación de la conexión
  if (mysqli_connect_errno()) {
    echo "Error de conexión a la base de datos: " . mysqli_connect_error();
    exit();
  }

  // Obtención de los datos del formulario
  $nombre = $_POST["nombre"];
  $apellido = $_POST["apellido"];
  $cargo = $_POST["cargo"];

  // Inserción de los datos en la tabla empleados
  $insertar = "INSERT INTO empleados (nombre, apellido, cargo) VALUES ('$nombre', '$apellido', '$cargo')";
  if (mysqli_query($conexion, $insertar)) {
    // Redirección a la página de lista de empleados
    header("Location: Ver_Huespedes_Empleados.php");
  } else {
    echo "Error al guardar el empleado: " . mysqli_error($conexion);
  }

  // Cierre de la conexión
  mysqli_close($conexion);
} else {
  echo "No se enviaron los datos del formulario.";
}
?>