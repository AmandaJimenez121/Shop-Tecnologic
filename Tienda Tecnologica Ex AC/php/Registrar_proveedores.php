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
        <img src="../img/Proveedores.jpg" alt="Imagen descriptiva">
    </div>

    <div class="register-container">
        <h2>Regístrar Proveedores</h2>
        <form action="../MYSQL/Alta_Proveedores.php" method="POST">
            <input type="text" name="nombre" placeholder="Nombre Completo" required>

            <input type="text" name="Telefono" placeholder="Telefono" required>

            <input type="text" name="Cantidad" placeholder="Cantidad" required>

            <input type="text" name="Precio" placeholder="Precio" required>

            <input type="submit" name="Registrar" value="OK">
        </form>
        <p><a href="../php/Registros_Proveedores.php">Cancelar</a></p>
    </div>
</div>
</body>
</html>