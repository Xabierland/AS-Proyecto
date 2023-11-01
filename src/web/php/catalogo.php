<h1>Lista de Anuncios</h1>

<div class="container">
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Modelo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Consulta SQL para obtener todos los registros de la tabla 'anuncios'
            $sql = "SELECT * FROM anuncios";
            $stmt = $pdo->query($sql);

            if ($stmt) {
                // Mostrar los datos en la tabla HTML
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row["modelo"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No se encontraron registros</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>