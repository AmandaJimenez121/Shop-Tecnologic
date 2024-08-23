<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../css/Registros.css">
</head>
<body>

<div class="container">
    <div class="image-container">
        <img src="../img/Inventario.png" alt="Imagen descriptiva">
    </div>

    <div class="register-container">
        <h2>Regístrar Inventario</h2>
        <form action="../MYSQL/Alta_Inventario.php" method="POST">
            <input type="text" name="nombre" placeholder="Nombre del Producto" required>

            <input type="text" name="Cantidad" placeholder="Cantidad" required>

            <input type="text" name="Precio" placeholder="Precio" required>

            <input type="text" name="Descripccion" placeholder="Descripccion del Producto" required>

            <input type="text" name="Marca" placeholder="Marca" required>

            <input type="submit" name="Registrar" value="OK">
        </form>
        <p><a href="./Registros_Inventario.php">Cancelar</a></p>
    </div>
</div>
</body>
</html>