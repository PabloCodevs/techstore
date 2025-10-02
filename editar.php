<?php
include 'includes/header.php';
include 'includes/conexion.php';

// Recibir el ID del producto por GET
if (!isset($_GET['id'])) {
    // Si no hay id en la URL, volvemos al index
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];

// Obtener los datos actuales del producto
$sql = "SELECT * FROM productos WHERE id = $id";
$resultado = $conn->query($sql);


if ($resultado->num_rows == 0) {
    echo "Producto no encontrado.";
    include 'includes/footer.php';
    exit;
}


// Procesar el formulario al enviarlo
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    // Validar los datos
    if (!empty($nombre) && !empty($descripcion) && $precio > 0 && $cantidad >= 0) {
        $sql_update = "UPDATE productos SET
            nombre = '$nombre',
            descripcion = '$descripcion',
            precio = $precio,
            cantidad = $cantidad
            WHERE id = $id";

            if ($conn->query($sql_update) == TRUE) {
                // Redirigir al index después de la actualización
                header('Location: index.php');
                exit;
            } else {
                echo "<p></p>Error al actualizar el producto: " . $conn->error . "</p>";
            }
    } else {
        echo "<p>Por favor, completa todos los campos correctamente.</p>";
    }
}
?>

<main>
    <h2>Editar Producto</h2>
    <form method="POST">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>" required><br><br>

        <label>Descripción:</label><br>
        <textarea name="descripcion" required><?php echo $fila['descripcion']; ?></textarea><br><br>

        <label>Precio (€):</label><br>
        <input type="number" step="0.01" name="precio" value="<?php echo $fila['precio']; ?>" required><br><br>

        <label>Cantidad:</label><br>
        <input type="number" name="cantidad" value="<?php echo $fila['cantidad']; ?>" required><br><br>

        <input type="submit" value="Actualizar">
    </form>
</main>

<?php include 'includes/footer.php'; ?>