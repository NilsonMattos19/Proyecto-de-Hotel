<!DOCTYPE html>
<html>
<head>
  <title>Menú Inicial</title>
  <div style="text-align: center;">
  <img src="Icons-Land-Buildings-Hotel-5-Stars.512.png" alt="Logo del hotel" height="143px">
  </div>
  <style>
    body {
      background-image: url("Vacaciones.jpeg");
      background-size: cover;
      background-repeat: no-repeat;
      background-color: #F5F5F5; /* color de fondo */
      font-family: sans-serif; /* fuente de letra */
    }
    /* Estilos para el navbar */
    nav {
      background-color: #333; /* Color de fondo */
      overflow: hidden;
    }
    nav a {
      float: left;
      display: block;
      color: white; /* Color de letra */
      text-align: center; /* Alineación del texto */
      padding: 14px 16px; /* Espacio interno */
      text-decoration: none; /* Sin subrayado */
      font-size: 17px; /* Tamaño de letra */
    }
    nav a:hover {
      background-color: #f9f9f9; /* Color de fondo al pasar el mouse */
      color: blue; /* Color de letra al pasar el mouse */
    }
    nav a.active {
      background-color: #4CAF50; /* Color de fondo del enlace activo */
      color: white; /* Color de letra del enlace activo */
    }
  </style>
</head>
<body>
  <h1 style="font-family: sans-serif; text-align:center; color:#F5F5F5">Menú Inicial</h1>
  <nav>
    <ul>
      <li class="dropdown">
        <a href="#" class="dropbtn">Registrar</a>
        <div class="dropdown-content">
          <a href="Insertar_Huesped.html">Registrar Huespedes</a>
          <a href="Insertar_Empleado.html">Registrar Empleado</a>
          <a href="Insertar_Financia.php">Registrar Financia</a>
          <a href="Insertar_Informes.php">Registrar Informes</a>
          <a href="Insertar_Reserva.php">Registrar Reservas</a>
        </div>
      </li>
      <li><a href="Buscar_Servicios.php">Buscar Servicios</a></li>
      <li><a href="Actualizar_servicio.php">Actualizar Servicios</a></li>
      <li><a href="Guardar_Servicio.php">Guardar Servicios</a></li>
      <li><a href="Lista_Servicio.php">Ver lista de Servicios</a></li>
      <li><a href="Ver_Huespedes_Empleados.php">Ver lista de Registrados</a></li>
      <li><a href="Ver_Informes.php">Ver Informes</a></li>
      <li><a href="Ver_Financia.php">Ver Financia</a></li>
    </ul>
  </nav>

  <style>
    nav {
      overflow: hidden;
      background-color: #333;
	  display: flex;
  	justify-content: space-around;
  	margin: auto;
  	width: 50%;
    }
    nav ul {
      margin: 0;
      padding: 0;
      list-style: none;
      position: relative;
      display: inline-table;
    }
    nav ul li {
      float: left;
    }
    nav ul li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }
    nav ul li a:hover:not(.dropbtn) {
      background-color: #111;
    }
    .dropdown:hover .dropdown-content {
      display: block;
    }
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      z-index: 1;
    }
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }
    .dropdown-content a:hover {
      background-color: #ddd;
    }
    .dropdown:hover .dropbtn {
      background-color: #111;
    }
    .dropbtn {
      font-size: 16px;
      border: none;
      outline: none;
      color: white;
      padding: 14px 16px;
      background-color: inherit;
      font-family: inherit;
      margin: 0;
    }
  </style>
</body>
</html>