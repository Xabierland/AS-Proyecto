<div class="login">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Inicio de Sesión</div>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="mail" class="form-label">Correo Electrónico:</label>
                                <input type="text" class="form-control" id="mail" name="mail" required>
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
    $mail = $_POST["mail"];
    $contrasena = $_POST["contrasena"];

    // Consulta SQL para verificar las credenciales de inicio de sesión
    $stmt = $pdo->prepare("SELECT * FROM users WHERE mail = :mail");
    $stmt->bindParam(':mail', $mail);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user && password_verify($contrasena, $user['passwd'])) {
        // Iniciar la sesión para el usuario
        $_SESSION['id'] = $user['id'];
        echo '<script>window.location.href = "../index.php?page=home";</script>';
    } else {
        // Mostrar el motivo del error en caso de credenciales incorrectas
        echo "Credenciales incorrectas. Inténtelo de nuevo.";
    }
}
?>