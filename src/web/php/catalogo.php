<div class="container">
    <h1>Lista de Anuncios</h1>
    <div class="input-group mb-3">
        <input type="text" class="form-control" id="buscador" placeholder="Buscar...">
    </div>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Imagen</th>
                <th>Titulo</th>
                <th>Modelo</th>
                <th>Contacto</th>
                <th>Publicación</th>
                <th>Anunciante</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Consulta SQL para obtener todos los registros de la tabla 'anuncios'
            $sql = 'select titulo, modelo, fecha, imagen, numero, "user" from anuncios inner join users on anuncios.vendedor = users.id';
            $stmt = $pdo->query($sql);

            if ($stmt) {
                // Mostrar los datos en la tabla HTML
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    // Mostrar la imagen en la primera columna
                    echo "<td><img src='" . $row["imagen"] . "' alt='Imagen' width='256'></td>";
                    echo "<td>" . $row["titulo"] . "</td>";
                    echo "<td>" . $row["modelo"] . "</td>";
                    echo "<td>+" . $row["numero"] . "</td>";
                    echo "<td>" . $row["fecha"] . "</td>";
                    echo "<td>" . $row["user"] . "</td>";
                    echo "</tr>";
                }
            } 
            ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Manejar el evento de cambio en el campo de búsqueda
        $("#buscador").on("keyup", function () {
            var valorBusqueda = $(this).val().toLowerCase();
            var filas = $("table tr:not(:first)"); // Obtener todas las filas de datos excluyendo la primera fila de encabezados

            // Recorrer todas las filas de datos
            filas.each(function () {
                var fila = $(this);
                var celdas = fila.find("td"); // Obtener todas las celdas de la fila

                // Bandera para determinar si la fila coincide con la búsqueda
                var coincidencia = false;

                // Recorrer todas las celdas de la fila
                celdas.each(function () {
                    var celda = $(this);
                    var texto = celda.text().toLowerCase();

                    // Verificar si el texto de la celda contiene el valor de búsqueda
                    if (texto.indexOf(valorBusqueda) !== -1) {
                        coincidencia = true;
                        return false; // Salir del bucle cuando se encuentra una coincidencia
                    }
                });

                // Mostrar u ocultar la fila según la coincidencia
                if (coincidencia) {
                    fila.show();
                } else {
                    fila.hide();
                }
            });
        });
    });
</script>