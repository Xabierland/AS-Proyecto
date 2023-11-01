<?php
$host = "localhost"; // Host de la base de datos
$port = 5432;        // Puerto de la base de datos
$dbname = "db";      // Nombre de la base de datos
$user = "root";      // Usuario de la base de datos
$password = "root";  // Contraseña del usuario

// Intentar conectar a la base de datos
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    echo "Error de conexión a la base de datos.";
}
?>
