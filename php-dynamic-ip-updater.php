<?php
// Define un array con las dos cadenas de texto
$urls = array("https://api.ipify.org", "https://api.my-ip.io/ip.txt");

// Configuracion para el endPoint del sistema de actualizacion
	$UserName = "";
    $ApiKey = "";
    $UrlEndPoint = "";


//Almacenar los mensajes de exito y error_get_last$success_msgs = array();
$success_msgs = array();
$error_msgs = array();


// Obtiene la cantidad de posiciones en el array
$count = count($urls);

// Genera un número aleatorio entre 0 y la cantidad de posiciones en el array
$random = rand(0, $count - 1);

// Obtiene la dirección IP de la posición aleatoria
$ipaddress = file_get_contents($urls[$random]);

// Obtiene la hora actual en formato ISO 8601
$time = date("c");

// Lee el archivo JSON existente y decodifica su contenido en un array
$file = "datos.json";
$current = file_get_contents($file);
$existing_data = json_decode($current, true);

// Obtiene la última dirección IP publicada y la fecha de actualización
$last_ip = end($existing_data)["ip"];
$last_update = end($existing_data)["hora"];

// Compara la última dirección IP publicada con la dirección IP actual
if ($ipaddress == $last_ip) {
   
} else {
   

    // Actualiza la dirección IP dinámica utilizando la página web de cdmon
    
    $response = file_get_contents($UrlEndPoint);
  

    // Actualiza la fecha de actualización
    $last_update = date("c");
}

// Agrega los nuevos datos al array existente
$data = array(
    "url" => $urls[$random],
    "hora" => $time,
    "ip" => $ipaddress,
    "ultima_actualizacion" => $last_update
);
$existing_data[] = $data;

// Convierte el array completo en formato JSON
$json = json_encode($existing_data);

// Escribe el archivo JSON con los nuevos datos agregados
file_put_contents($file, $json);

// Calcula la cantidad de días desde la última actualización
$last_update_date = new DateTime($last_update);
$current_date = new DateTime();
$days_diff = $current_date->diff($last_update_date)->days;





?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Información</title>

  <!-- Carga los estilos de Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <style>
    /* Estilos para los mensajes de éxito */
    .alert-success {
		text-align: center;
      color: #155724;
      background-color: #d4edda;
      border-color: #c3e6cb;
    }

    /* Estilos para los mensajes de error */
    .alert-danger {
		text-align: center;
      color: #721c24;
      background-color: #f8d7da;
      border-color: #f5c6cb;
    }

    /* Estilos para el encabezado */
    header {
      background-color: #343a40;
      color: #fff;
      padding: 1rem;
    }

    /* Estilos para el pie de página */
    footer {
      background-color: #343a40;
      color: #fff;
      padding: 1rem;
    }
  </style>
</head>
<body>

  <!-- Encabezado -->
  <header>
    <div class="container">
      <h1>Información</h1>
    </div>
  </header>

  <!-- Contenido principal -->
  <main class="container my-3">

    <!-- Sección de mensajes de éxito -->
    <?php foreach ($success_msgs as $msg) { ?>
      <div class="alert alert-success"><?php echo $msg; ?></div>
    <?php } ?>

    <!-- Sección de mensajes de error -->
    <?php foreach ($error_msgs as $msg) { ?>
      <div class="alert alert-danger"><?php echo $msg; ?></div>
    <?php } ?>

    <!-- Sección de información -->
    <section>
      <h2>Última actualización</h2>
      <p>La última actualización fue el <?php echo $last_update; ?> y han pasado <?php echo $days_diff; ?> días desde entonces.</p>
      <h2>Dirección IP</h2>
      <p>La dirección IP actual es: <?php echo $ipaddress; ?></p>
    </section>

  </main>

  <!-- Pie de página -->
  <footer>
    <div class="container">
      <p>© 2023, Todos los derechos reservados.</p>
    </div>
  </footer>

  <!-- Carga los scripts de Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
    integrity="sha384-+N0EN0zKpNl1I7H27pM96cvED7sYgKPWuTp7VjsmTtT2rVrA3tq3AxJpCtHk1sYs"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"
    integrity="sha384-f/KhoQLpvScnHDnCbzIa95y1Cr+H6pyEwl0zmY
