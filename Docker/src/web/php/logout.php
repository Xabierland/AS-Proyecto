<?php
    if (isset($_SESSION['id'])) {
        // Si ha iniciado sesión, destruye la sesión y redirige al inicio o a donde desees.
        session_destroy();
        echo '<script>window.location.href = "../index.php?page=home";</script>';
        exit();
    } else {
        // Si no ha iniciado sesión, redirige al inicio o a donde desees.
        echo '<script>window.location.href = "../index.php?page=home";</script>';
        exit();
    }
?>