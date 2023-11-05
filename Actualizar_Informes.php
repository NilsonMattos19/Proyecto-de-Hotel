<?php
// Establecer la conexión con la base de datos
$conexion = mysqli_connect("localhost", "root", "", "hotel");

// Recuperar el registro del informe correspondiente
$id = $_GET["id"];
$consulta = "SELECT * FROM informes WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);

// Si se envió el formulario, actualizar el informe en la base de datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fecha_generacion = $_POST["fecha_generacion"];
  $tipo = $_POST["tipo"];
  $contenido = $_POST["contenido"];
  
  $actualizar = "UPDATE informes SET fecha_generacion = '$fecha_generacion', tipo = '$tipo', contenido = '$contenido' WHERE id = $id";
  $resultado = mysqli_query($conexion, $actualizar);
  
  // Mostrar una notificación en la página
  echo "<script>alert('El informe ha sido actualizado correctamente.'); window.location = 'Ver_Informes.php';</script>";
}

// Recuperar el registro del informe actualizado
$consulta = "SELECT * FROM informes WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$fila = mysqli_fetch_assoc($resultado);

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Actualizar Informe</title>
  <style>
		.container {
			text-align: center;
		}
		body {
  		background-color: cornflowerblue;
		}
		.button {
		  background-color: #4CAF50; /* Color de fondo */
		  border: none; /* Sin borde */
		  color: white; /* Color de letra */
		  padding: 15px 32px; /* Espacio interno */
		  text-align: center; /* Alineación del texto */
		  text-decoration: none; /* Sin subrayado */
		  display: inline-block; /* Mostrar como bloque */
		  font-size: 16px; /* Tamaño de letra */
		  margin: 4px 2px; /* Margen */
		  cursor: pointer; /* Cambiar el cursor al pasar el mouse */
		}
	</style>
  </style>
</head>
<body>
  <div class="container">
    <h1>Actualizar Informe</h1>
    <form method="POST">
      <label for="fecha_generacion">Fecha de generación:</label>
      <input type="date" id="fecha_generacion" name="fecha_generacion" value="<?php echo $fila['fecha_generacion']; ?>"><br><br>
      
      <label for="tipo">Tipo:</label>
      <input type="text" id="tipo" name="tipo" value="<?php echo $fila['tipo']; ?>"><br><br>
      
      <label for="contenido">Contenido:</label><br>
      <textarea id="contenido" name="contenido" rows="10" cols="50"><?php echo $fila['contenido']; ?></textarea><br><br>
      
      <input type="submit" value="Actualizar"><br><br>
    </form>
    
    <a href="Ver_Informes.php" class="button">Cancelar</a>
  </div>
  
  <?php
  // Si el formulario no se ha enviado todavía, no hay nada que mostrar
  if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit();
  }
  ?>
  
  <script>
    // Mostrar el mensaje de alerta
    alert("<?php echo 'El informe ha sido actualizado correctamente.'; ?>");
  </script>
</body>
</html>



