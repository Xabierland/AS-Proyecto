<?php
$host = "bbdd";      // Host de la base de datos
$port = 5432;        // Puerto de la base de datos
$dbname = "db";      // Nombre de la base de datos
$user = "root";      // Usuario de la base de datos
$password = "root";  // Contraseña del usuario

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
    // Realiza las consultas y operaciones de base de datos usando $pdo
} catch (PDOException $e) {
    echo "Error de conexión a la base de datos: " . $e->getMessage();
}
