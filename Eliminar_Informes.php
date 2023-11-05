<?php
// Conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "", "hotel");

// Verificación de la conexión
if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}

// Obtiene el ID de la finanza que se desea eliminar desde la URL
$id = $_GET['id'];

// Elimina la finanza de la tabla de finanzas
$sql = "DELETE FROM informes WHERE id=$id";

if (mysqli_query($conn, $sql)) {
  // Mensaje de éxito
  echo "El Informe ha sido eliminado exitosamente.";

  // Redirige al usuario a Ver_Financia.php después de 3 segundos
  header("refresh:3; url=Ver_Informes.php");
} else {
  // Mensaje de error
  echo "Error al eliminar la financia: " . mysqli_error($conn);
}

// Cierra la conexión a la base de datos
mysqli_close($conn);
?>