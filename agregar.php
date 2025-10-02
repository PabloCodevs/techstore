<?php include 'includes/header.php'; ?>

<main>
    <h2>Añadir Prodcuto</h2>
    <form action="agregar.php" method="POST">
        <label for="nombre">Nombre del producto:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="precio">Precio:</label><br>
        <input type="number" id="precio" name="precio" step="0.01" required><br><br>

        <label for="cantidad">Cantidad:</label><br>
        <input type="number" id="cantidad" name="cantidad" required><br><br>

        <input type="submit" value="Guardar Producto">
    </form>
</main>

<?php include 'includes/footer.php'; ?>