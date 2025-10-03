<?php 
include 'includes/header.php';
include 'includes/conexion.php';
?>

<main>
    <h2>Gestor de Productos</h2>           
    <a class='btn-agregar' href="agregar.php">Agregar Producto</a>

    <div class="div-table">
        <table class="hola" cellpadding="10">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
    </div>

        <?php
        $sql = "SELECT * FROM productos";
        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
            while($fila = $resultado->fetch_assoc()) {
                echo "<tr>
                    <td>{$fila['id']}</td>
                    <td>{$fila['nombre']}</td>
                    <td>{$fila['descripcion']}</td>
                    <td>{$fila['precio']} €</td>
                    <td>{$fila['cantidad']}</td>
                    <td>
                        <a class='btn-editar' href='editar.php?id={$fila['id']}'>Editar</a>  
                        <a class='btn-borrar' href='borrar.php?id={$fila['id']}' onclick='return confirm(\"¿Seguro que quieres eliminar este producto?\");'>Borrar</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No hay productos</td></tr>";
        }
        ?>
    </table>
</main>

<?php include 'includes/footer.php'; ?>
