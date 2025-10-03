<?php
include 'includes/conexion.php'; 

// Verificar que se haya proporcionado un ID por GET
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = intval($_GET['id']); // Asegurarse de que sea un número entero

// Hacer la consulta para borrar el registro
$sql = "DELETE FROM productos WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    // Redirigir al index después de borrar
    header("Location: index.php");
    exit();
} else {
    echo "Error al borrar el registro: " . $conn->error;
}
?>
