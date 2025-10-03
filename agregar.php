<?php 
include 'includes/header.php';
include 'includes/conexion.php';  // Conexión a la BD

// Inicializamos una variable para mensajes de error
$errores = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $descripcion = $_POST['descripcion'];

    // Validaciones básicas
    if (empty($nombre)) {
        $errores[] = "El nombre del producto es obligatorio.";
    }

    if (!is_numeric($precio) || $precio <= 0) {
        $errores[] = "El precio debe ser un número positivo.";
    }

    if (!is_numeric($cantidad) || $cantidad < 0) {
        $errores[] = "La cantidad debe ser un número no negativo.";
    }

    if (!empty($descripcion) && strlen($descripcion) > 255) {
        $errores[] = "La descripción no debe exceder los 255 caracteres.";
    }

    // Si no hay errores, insertamos en la BD
    if (empty($errores)) {
        $sql = "INSERT INTO productos (nombre, precio, cantidad, descripcion) 
                VALUES ('$nombre', $precio, $cantidad, '$descripcion')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>El producto se añadió correctamente.</p>";
            header("refresh:2; url=index.php");
            exit();
        } else {
            echo "<p>Error: " . $conn->error . "</p>";
        }
    }
}
?>

<main>
    <h2>Añadir Producto</h2>

    <?php 
    // Mostrar errores si existen
    if (!empty($errores)) {
        echo "<div style='color:red;'><ul>";
        foreach ($errores as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul></div>";
    }
    ?>

    

    <form action="agregar.php" method="POST">
        <label for="nombre">Nombre del producto:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="precio">Precio:</label><br>
        <input type="number" id="precio" name="precio" step="0.01" required><br><br>

        <label for="cantidad">Cantidad:</label><br>
        <input type="number" id="cantidad" name="cantidad" required><br><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion"></textarea><br><br>

        <input type="submit" value="Guardar Producto">
    </form>
</main>

<?php include 'includes/footer.php'; ?>