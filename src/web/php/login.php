<div class="login">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Inicio de Sesión</div>
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
                            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
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

    // Consulta SQL para verificar las credenciales de inicio de sesión
    $stmt = $pdo->prepare("SELECT * FROM users WHERE user = :nombre_usuario");
    $stmt->bindParam(':nombre_usuario', $nombre_usuario);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user && password_verify($contrasena, $user['passwd'])) {
        // Iniciar la sesión para el usuario
        $_SESSION['user'] = $user['user'];
        header("Location: home.php"); // Redirigir a la página de inicio después de iniciar sesión
    } else {
        // Mostrar el motivo del error en caso de credenciales incorrectas
        echo "Credenciales incorrectas. Inténtelo de nuevo.";
    }
}
?>