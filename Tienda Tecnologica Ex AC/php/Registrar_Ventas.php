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
        <img src="../img/ImgTecnologic.png" alt="Imagen descriptiva">
    </div>

    <div class="register-container">
        <h2>Regístrar Venta</h2>
        <form action="../MYSQL/Alta_Venta.php" method="POST">
            <input type="text" name="Cantidad" placeholder="Cantidad" required>

            <input type="text" name="Precio" placeholder="Precio Unitario" required>

            <input type="text" name="Total" placeholder="Total" required>

            <input type="text" name="Nom_Vendedor" placeholder="Nombre del Vendedor" required>

            <input type="submit" name="Registrar" value="OK">
        </form>
        <p><a href="./Registros_Ventas.php">Cancelar</a></p>
    </div>
</div>
</body>
</html>