<?php 
include 'includes/header.php';
include 'includes/conexion.php';
?>

<main>
    <h2>Lista de Productos</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Cantidad</th>
        </tr>
        <?php
        $sql = "SELECT * FROM productos";
        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
            while($fila = $resultado->fetch_assoc()) {
                echo "<tr>
                        <td>{$fila['id']}</td>
                        <td>{$fila['nombre']}</td>
                        <td>{$fila['descripcion']}</td>
                        <td>{$fila['precio']}</td>
                        <td>{$fila['cantidad']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay productos</td></tr>";
        }
        ?>
    </table>
</main>

<?php include 'includes/footer.php'; ?>
