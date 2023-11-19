<?php
// Incluir archivo de conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "hotel");

// Verificar si se ha enviado el formulario de actualización
if (isset($_POST["actualizar"])) {
    // Obtener los datos del formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $apartamento = $_POST["apartamento"]; // Nuevo campo

    // Actualizar los datos del huésped en la base de datos
    $query = "UPDATE huespedes SET nombre='$nombre', telefono='$telefono', email='$email', apartamento='$apartamento' WHERE id=$id";
    $resultado = mysqli_query($conexion, $query);

    // Verificar si la actualización se realizó correctamente
    if ($resultado) {
        // Redirigir a la página Ver_Huespedes_Empleados
        header("Location: Ver_Huespedes_Empleados.php");
        exit;
    } else {
        echo "<p>Error al actualizar el huésped.</p>";
    }
}

// Verificar si se ha enviado el ID del huésped a actualizar
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Obtener los datos del huésped de la base de datos
    $query = "SELECT * FROM huespedes WHERE id=$id";
    $resultado = mysqli_query($conexion, $query);

    // Verificar si se encontró un huésped con ese ID
    if (mysqli_num_rows($resultado) > 0) {
        $huesped = mysqli_fetch_assoc($resultado);
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Actualizar Huésped</title>
            <style>
                .container {
                    text-align: center;
                }

                body {
                    background-color: cornflowerblue;
                }
            </style>
            <meta charset="utf-8">
        </head>
        <body>
        <a href="Menu_Inicial.php">
            <img id="logo" src="Icons-Land-Buildings-Hotel-5-Stars.512.png" alt="Logo del hotel" height="143px">
        </a>
        <div class="container">
            <img src="actualizar.jpg" alt="Imagen de Actualizar"><br>
            <h1>Actualizar Huésped</h1>
            <!-- Mostrar el formulario para actualizar el huésped -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $huesped['id']; ?>"><br>
                <label>Nombre:</label>
                <input type="text" name="nombre" value="<?php echo $huesped['nombre']; ?>"><br><br>
                <label>Teléfono:</label>
                <input type="text" name="telefono" value="<?php echo $huesped['telefono']; ?>"><br><br>
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo $huesped['email']; ?>"><br><br>
                <!-- Nuevo campo para Apartamento -->
                <label>Apartamento:</label>
                <input type="text" name="apartamento" value="<?php echo $huesped['apartamento']; ?>"><br><br>
                <input type="submit" name="actualizar" value="Actualizar">
            </form>
            <?php
        } else {
            echo "<p>No se encontró ningún huésped con ese ID.</p>";
        }
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
    ?>
    </body>
    </html>