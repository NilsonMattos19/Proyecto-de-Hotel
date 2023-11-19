<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Informe</title>
    <style>
        .container {
            text-align: center;
        }
        body {
            background-color: cornflowerblue;
        }
    </style>
    <script>
        function mostrarCuadroSeleccion() {
            var tipoSeleccionado = document.getElementById("tipo").value;
            var huespedDiv = document.getElementById("huespedDiv");
            var servicioDiv = document.getElementById("servicioDiv");
            var empleadoDiv = document.getElementById("empleadoDiv");

            // Ocultar todos los cuadros de selección
            huespedDiv.style.display = "none";
            servicioDiv.style.display = "none";
            empleadoDiv.style.display = "none";

            // Mostrar el cuadro de selección correspondiente al tipo seleccionado
            if (tipoSeleccionado === "Huespedes") {
                huespedDiv.style.display = "block";
            } else if (tipoSeleccionado === "Servicios") {
                servicioDiv.style.display = "block";
            } else if (tipoSeleccionado === "Empleados") {
                empleadoDiv.style.display = "block";
            }
        }
    </script>
</head>
<body>
    <a href="Menu_Inicial.php">
        <img id="logo" src="Icons-Land-Buildings-Hotel-5-Stars.512.png" alt="Logo del hotel" height="143px">
    </a>
    <div class="container">
        <img src="Registrar.jpg" alt="Imagen de Registrar"><br>
        <h1>Registro de Informe</h1>
        <form action="Insertar_Informes.php" method="post">
            <label for="fecha_generacion">Fecha de generación:</label>
            <input type="date" id="fecha_generacion" name="fecha_generacion" required><br><br>
            
            <!-- Lista desplegable para el tipo de informe -->
            <label for="tipo">Tipo:</label>
            <select id="tipo" name="tipo" onchange="mostrarCuadroSeleccion()" required>
                <option value="" disabled selected>-- Seleccione una opción --</option>
                <option value="Huespedes">Huespedes</option>
                <option value="Servicios">Servicios</option>
                <option value="Empleados">Empleados</option>
            </select><br><br>

            <!-- Cuadro de selección para Huespedes -->
            <div id="huespedDiv" style="display: none;">
                <label for="id_huesped">Seleccionar Huesped:</label>
                <select id="id_huesped" name="id_huesped" required>
                    <?php
                        // Conexión a la base de datos
                        $host = "localhost";
                        $user = "root";
                        $password = "";
                        $dbname = "hotel";
                        $conn = mysqli_connect($host, $user, $password, $dbname);

                        // Consulta para obtener los huéspedes desde la base de datos
                        $query = "SELECT id, nombre FROM huespedes";
                        $result = mysqli_query($conn, $query);

                        // Verificar si la consulta fue exitosa
                        if ($result) {
                            // Mostrar opciones en la lista desplegable
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                        } else {
                            // Manejar el error si la consulta falla
                            echo "<option value=''>Error al obtener los huéspedes</option>";
                        }

                        // Cerrar la conexión ya que la consulta ya fue realizada
                        mysqli_close($conn);
                    ?>
                </select><br><br>
            </div>

            <!-- Cuadro de selección para Servicios -->
            <div id="servicioDiv" style="display: none;">
                <label for="id_servicio">Seleccionar Servicio:</label>
                <select id="id_servicio" name="id_servicio" required>
                    <?php
                        // Conexión a la base de datos
                        $host = "localhost";
                        $user = "root";
                        $password = "";
                        $dbname = "hotel";
                        $conn = mysqli_connect($host, $user, $password, $dbname);

                        // Consulta para obtener los servicios desde la base de datos
                        $query = "SELECT id, nombre FROM servicios";
                        $result = mysqli_query($conn, $query);

                        // Verificar si la consulta fue exitosa
                        if ($result) {
                            // Mostrar opciones en la lista desplegable
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                        } else {
                            // Manejar el error si la consulta falla
                            echo "<option value=''>Error al obtener los servicios</option>";
                        }

                        // Cerrar la conexión ya que la consulta ya fue realizada
                        mysqli_close($conn);
                    ?>
                </select><br><br>
            </div>

            <!-- Cuadro de selección para Empleados -->
            <div id="empleadoDiv" style="display: none;">
                <label for="id_empleado">Seleccionar Empleado:</label>
                <select id="id_empleado" name="id_empleado" required>
                    <?php
                        // Conexión a la base de datos
                        $host = "localhost";
                        $user = "root";
                        $password = "";
                        $dbname = "hotel";
                        $conn = mysqli_connect($host, $user, $password, $dbname);

                        // Consulta para obtener los empleados desde la base de datos
                        $query = "SELECT id, nombre FROM empleados";
                        $result = mysqli_query($conn, $query);

                        // Verificar si la consulta fue exitosa
                        if ($result) {
                            // Mostrar opciones en la lista desplegable
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                        } else {
                            // Manejar el error si la consulta falla
                            echo "<option value=''>Error al obtener los empleados</option>";
                        }

                        // Cerrar la conexión ya que la consulta ya fue realizada
                        mysqli_close($conn);
                    ?>
                </select><br><br>
            </div>

            <!-- Campo oculto para almacenar el id del huesped/servicio/empleado seleccionado -->
            <input type="hidden" id="id_hidden" name="id_hidden">
            
            <label for="contenido"><h3>Descripción:</h3></label>
            <textarea id="contenido" name="contenido" rows="7" cols="50" required></textarea><br><br>
            <input type="submit" value="Guardar">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $fecha_generacion = $_POST['fecha_generacion'];
            $tipo = $_POST['tipo'];
            $id_huesped = $_POST['id_huesped'];
            $id_servicio = $_POST['id_servicio'];
            $id_empleado = $_POST['id_empleado'];
            $contenido = $_POST['contenido'];

            // Conexión a la base de datos
            $host = "localhost";
            $user = "root";
            $password = "";
            $dbname = "hotel";
            $conn = mysqli_connect($host, $user, $password, $dbname);

            // Verificar la conexión
            if (!$conn) {
                die("La conexión a la base de datos falló: " . mysqli_connect_error());
            }

            // Insertar los datos en la tabla de informes
            switch ($tipo) {
                case "Huespedes":
                    $sql = "INSERT INTO informes (fecha_generacion, tipo, id_huesped, contenido) VALUES ('$fecha_generacion', '$tipo', '$id_huesped', '$contenido')";
                    break;
                case "Servicios":
                    $sql = "INSERT INTO informes (fecha_generacion, tipo, id_servicio, contenido) VALUES ('$fecha_generacion', '$tipo', '$id_servicio', '$contenido')";
                    break;
                case "Empleados":
                    $sql = "INSERT INTO informes (fecha_generacion, tipo, id_empleado, contenido) VALUES ('$fecha_generacion', '$tipo', '$id_empleado', '$contenido')";
                    break;
            }

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Informe registrado exitosamente.'); setTimeout(function(){ window.location.href='Ver_Informes.php'; }, 3000);</script>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            // Cerrar la conexión a la base de datos
            mysqli_close($conn);
        }
        ?>
    </div>
</body>
</html>