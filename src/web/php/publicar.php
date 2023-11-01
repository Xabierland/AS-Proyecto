<div class="container">
    <h1>Añadir Publicación</h1>

    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="modelo" required>
        </div>
        <div class="mb-3">
            <label for="num" class="form-label">Número de contacto</label>
            <input type="text" class="form-control" id="num" name="num">
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Subir Imagen</label>
            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Publicación</button>
    </form>
</div>

<?php
// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha seleccionado un archivo de imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        // Directorio donde se almacenarán las imágenes
        $directorio_destino = "image/";  // Reemplaza con la ruta real en tu servidor

        // Generar un nombre de archivo único para la imagen
        $nombre_archivo = uniqid() . '_' . $_FILES['imagen']['name'];

        // Ruta completa del archivo en el servidor
        $ruta_archivo = $directorio_destino . $nombre_archivo;

        // Mover el archivo subido al directorio de destino
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_archivo)) {
            // Archivo subido con éxito, ahora puedes guardar la información en la base de datos
            $titulo = $_POST['titulo'];
            $modelo = $_POST['modelo'];
            $num = $_POST['num'];
            // Agregar más campos del formulario según sea necesario

            // Sentencia SQL para insertar en la tabla anuncios
            $sql = "INSERT INTO anuncios (titulo, modelo, imagen, numero, vendedor) VALUES (:titulo, :modelo, :imagen, :num, :vendedor)";

            // Preparar la consulta
            $stmt = $pdo->prepare($sql);

            // Vincular los valores con los marcadores de posición
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':modelo', $modelo);
            $stmt->bindParam(':imagen', $ruta_archivo);
            $stmt->bindParam(':num', $num);
            $stmt->bindParam(':vendedor', $_SESSION['id']);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                // La publicación se ha guardado con éxito en la base de datos
                echo "Publicación guardada con éxito.";
            } else {
                // Ocurrió un error al guardar en la base de datos
                echo "Error al guardar la publicación.";
            }
        } else {
            echo "Error al subir la imagen.";
        }
    } else {
        echo "No se ha seleccionado una imagen válida.";
    }
}
?>
