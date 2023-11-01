<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Web</title>
</head>
<body>
    <header>
        <h1 class="page-title">Coches.xyz</h1>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
            <a class="navbar-brand" href="?page=home">Home</a>
            <a class="navbar-brand" href="?page=catalogo">Catalogo</a>
            <?php
            if (!isset($_SESSION['id'])) 
            {
                echo '<a class="navbar-brand" href="?page=login">Login</a>';
                echo '<a class="navbar-brand" href="?page=register">Register</a>';
            }
            else
            {
                echo '<a class="navbar-brand" href="?page=publicar">Publicar</a>';
                echo '<a class="navbar-brand" href="?page=logout">Logout</a>';
            }
            ?>
            </div>
        </nav>
    </header>
    <main>
        <?php
            include 'tools/conexion.php';
            
            if (isset($_GET['page'])) {
                switch ($_GET['page']) {
                    case 'login':
                        include 'php/login.php';
                        break;
                    case 'logout':
                        include 'php/logout.php';
                        break;
                    case 'register':
                        include 'php/register.php';
                        break;
                    case 'home':
                        include 'php/home.php';
                        break;
                    case 'catalogo':
                        include 'php/catalogo.php';
                        break;
                    case 'publicar':
                        include 'php/publicar.php';
                        break;
                    default:
                        include 'php/home.php';
                        break;
                }
            } else {
                include 'php/home.php';
            }
        ?>
    </main>
</body>
</html>