<?php

// Conexión a la base de datos
include "./conexion.php";

// Obtener el ID del usuario desde la URL
$ID_Inventario = isset($_GET['id']) ? intval($_GET['id']) : 0;
// Verificar si el ID es válido
if ($ID_Inventario > 0) {
    // Consultar los datos del usuario
    $sql = $conexion->query("SELECT * FROM Inventario WHERE ID_Inventario = $ID_Inventario");
    if ($sql->num_rows > 0) {
        $datos = $sql->fetch_object();
    } else {
        die("Producto no encontrado.");
    }
} else {
    die("ID inválido.");
}

// Verificar si se ha enviado el formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $Nom_Producto = $conexion->real_escape_string($_POST['nombre']);
    $Cantidad = $conexion->real_escape_string($_POST['Cantidad']);
    $Precio = $conexion->real_escape_string($_POST['Precio']);
    $Descripccion = $conexion->real_escape_string($_POST['Descripccion']);
    $Marca = $conexion->real_escape_string($_POST['Marca']);

    // Actualizar los datos en la tabla usuarios sin modificar la contraseña
    $update_sql = "UPDATE Inventario SET Nom_Producto='$Nom_Producto', Cantidad='$Cantidad', Precio='$Precio', Descripccion='$Descripccion', Marca='$Marca' WHERE ID_Inventario='$ID_Inventario'";

    if ($conexion->query($update_sql) === TRUE) {
        echo "Datos actualizados exitosamente";
        header("Location: ../php/Registros_Inventario.php"); // Redirigir a la lista de usuarios
        exit();
    } else {
        $error_msg = "Error al actualizar los datos: " . $conexion->error;
    }
}

// Cerrar la conexión
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Inventario</title>
    <link rel="stylesheet" href="../css/Modificaciones.css">
</head>
<body>

<div class="container">
    <div class="image-container">
        <img src="../img/Inventario.png" alt="Imagen descriptiva">
    </div>

    <div class="register-container">
        <h2>Modificar Inventario</h2>
        <form method="POST">
            <input type="hidden" name="ID_Inventario" value="<?= $datos->ID_Ventas ?>">
            <input type="text" name="nombre" placeholder="Nombre del Producto" value="<?= htmlspecialchars($datos->Nom_Producto) ?>" required>
            <input type="text" name="Cantidad" placeholder="Cantidad" value="<?= htmlspecialchars($datos->Cantidad) ?>" required>
            <input type="text" name="Precio" placeholder="Precio" value="<?= htmlspecialchars($datos->Precio) ?>" required>
            <input type="text" name="Descripccion" placeholder="Descripcion" value="<?= htmlspecialchars($datos->Descripccion) ?>" required>
            <input type="text" name="Marca" placeholder="Marca" value="<?= htmlspecialchars($datos->Marca) ?>" required>
            <input type="submit" name="Actualizar" value="Modificar Datos">
        </form>
        <p><a href="../php/Registros_Inventario.php">Cancelar</a></p>
    </div>
</div>

</body>
</html>