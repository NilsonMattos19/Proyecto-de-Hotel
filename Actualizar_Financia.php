<?php
// Establecer la conexión con la base de datos
$conexion = mysqli_connect("localhost", "root", "", "hotel");

// Recuperar el registro del informe correspondiente
$id = $_GET["id"];
$consulta = "SELECT * FROM informacion_financiera WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$fila = mysqli_fetch_assoc($resultado);

// Si se envió el formulario, actualizar el informe en la base de datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fecha_generacion = $_POST["fecha_generacion"];
  $total_ingresos = $_POST["total_ingresos"];
  $total_gastos = $_POST["total_gastos"];
  
  $actualizar = "UPDATE informacion_financiera SET fecha_generacion = '$fecha_generacion', total_ingresos = '$total_ingresos', total_gastos = '$total_gastos' WHERE id = $id";
  mysqli_query($conexion, $actualizar);
  
  // Redirigir al usuario a la página de informe actualizado
  header("Location: Ver_Financia.php?id=$id");
  exit();
}
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
</head>
<body>
<a href="Menu_Inicial.php">
    <img id="logo" src="Icons-Land-Buildings-Hotel-5-Stars.512.png" alt="Logo del hotel" height="143px">
  </a>
  <div class="container">
    <img src="actualizar.jpg" alt="Imagen de Registrar"><br>
  <h1>Actualizar Informe</h1>
  <form method="POST">
    <label for="fecha_generacion">Fecha de generación:</label>
    <input type="date" id="fecha_generacion" name="fecha_generacion" value="<?php echo $fila['fecha_generacion']; ?>"><br><br>
    
    <label for="total_ingresos">Total de Ingresos:</label>
    <input type="text" id="total_ingresos" name="total_ingresos" value="<?php echo $fila['total_ingresos']; ?>"><br><br>
    
    <label for="total_gastos">Total de Gastos:</label>
    <textarea id="total_gastos" name="total_gastos"><?php echo $fila['total_gastos']; ?></textarea><br><br>
    
    <input type="submit" value="Actualizar"><br><br>
  </form>
  
  <a href="Ver_Informes.php?id=<?php echo $id; ?>" class= "button">Cancelar</a>
</body>
</html>