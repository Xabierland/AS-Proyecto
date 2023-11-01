<div class="register">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Registro</div>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="nombre_usuario" class="form-label">Nombre de Usuario:</label>
                                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
                            </div>
                            <div class="mb-3">
                                <label for="contrasena" class="form-label">Contraseña:</label>
                                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Registrarse</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener datos del formulario
    $nombre_usuario = $_POST["nombre_usuario"];
    $contrasena = $_POST["contrasena"];

    // Hash de la contraseña (se recomienda usar una función de hash segura)
    $hash_contrasena = password_hash($contrasena, PASSWORD_BCRYPT);

    // Consulta SQL preparada para insertar los datos en la base de datos
    $stmt = $pdo->prepare('INSERT INTO users ("user", passwd) VALUES (:user, :passwd)');

    // Asociar los parámetros
    $stmt->bindParam(':user', $nombre_usuario);
    $stmt->bindParam(':passwd', $hash_contrasena);    

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Registro exitoso. Los datos se han guardado en la base de datos.";
    } else {
        // En caso de error, muestra el mensaje de error
        $errorInfo = $stmt->errorInfo();
        echo "Error al registrar en la base de datos: " . $errorInfo[2];
    }
}
?>