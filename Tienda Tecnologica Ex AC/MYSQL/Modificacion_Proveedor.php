<?php

// Conexión a la base de datos
include "./conexion.php";

// Obtener el ID del usuario desde la URL
$ID_Proveedor = isset($_GET['id']) ? intval($_GET['id']) : 0;
// Verificar si el ID es válido
if ($ID_Proveedor > 0) {
    // Consultar los datos del usuario
    $sql = $conexion->query("SELECT * FROM Proveedores WHERE ID_Proveedor = $ID_Proveedor");
    if ($sql->num_rows > 0) {
        $datos = $sql->fetch_object();
    } else {
        die("Proveedor no encontrado.");
    }
} else {
    die("ID inválido.");
}

// Verificar si se ha enviado el formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $Nom_Proveedor = $conexion->real_escape_string($_POST['nombre']);
    $Telefono = $conexion->real_escape_string($_POST['Telefono']);
    $Cantidad = $conexion->real_escape_string($_POST['Cantidad']);
    $Precio = $conexion->real_escape_string($_POST['Precio']);

    // Actualizar los datos en la tabla usuarios sin modificar la contraseña
    $update_sql = "UPDATE Proveedores SET Nom_Proveedor='$Nom_Proveedor', Telefono='$Telefono', Cantidad='$Cantidad', Precio='$Precio' WHERE ID_Proveedor='$ID_Proveedor'";

    if ($conexion->query($update_sql) === TRUE) {
        echo "Datos actualizados exitosamente";
        header("Location: ../php/Registros_Proveedores.php"); // Redirigir a la lista de usuarios
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
    <title>Modificar Proveedor</title>
    <link rel="stylesheet" href="../css/Modificaciones.css">
</head>
<body>

<div class="container">
    <div class="image-container">
        <img src="../img/Proveedores.jpg" alt="Imagen descriptiva">
    </div>

    <div class="register-container">
        <h2>Modificar Proveedores</h2>
        <form method="POST">
            <input type="hidden" name="ID_Proveedor" value="<?= $datos->ID_Proveedor ?>">
            <input type="text" name="nombre" placeholder="Nombre del Proveedor" value="<?= htmlspecialchars($datos->Nom_Proveedor) ?>" required>
            <input type="text" name="Telefono" placeholder="Telefono" value="<?= htmlspecialchars($datos->Telefono) ?>" required>
            <input type="text" name="Cantidad" placeholder="Cantidad" value="<?= htmlspecialchars($datos->Cantidad) ?>" required>
            <input type="text" name="Precio" placeholder="Precio" value="<?= htmlspecialchars($datos->Precio) ?>" required>
            <input type="submit" name="Actualizar" value="Modificar Datos">
        </form>
        <p><a href="../php/Registros_Proveedores.php">Cancelar</a></p>
    </div>
</div>

</body>
</html>