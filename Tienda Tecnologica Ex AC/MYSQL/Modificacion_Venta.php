<?php

// Conexión a la base de datos
include "./conexion.php";

// Obtener el ID del usuario desde la URL
$ID_Ventas = isset($_GET['id']) ? intval($_GET['id']) : 0;
// Verificar si el ID es válido
if ($ID_Ventas > 0) {
    // Consultar los datos del usuario
    $sql = $conexion->query("SELECT * FROM Ventas WHERE ID_Ventas = $ID_Ventas");
    if ($sql->num_rows > 0) {
        $datos = $sql->fetch_object();
    } else {
        die("Venta no encontrado.");
    }
} else {
    die("ID inválido.");
}

// Verificar si se ha enviado el formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $Cantidad = $conexion->real_escape_string($_POST['Cantidad']);
    $Precio_Unitario = $conexion->real_escape_string($_POST['Precio_Unitario']);
    $Total = $conexion->real_escape_string($_POST['Total']);
    $Nom_Vendedor = $conexion->real_escape_string($_POST['Nom_Vendedor']);

    // Actualizar los datos en la tabla usuarios sin modificar la contraseña
    $update_sql = "UPDATE Ventas SET Cantidad='$Cantidad', Precio_Unitario='$Precio_Unitario', Total='$Total', Nom_Vendedor='$Nom_Vendedor' WHERE ID_Ventas='$ID_Ventas'";

    if ($conexion->query($update_sql) === TRUE) {
        echo "Datos actualizados exitosamente";
        header("Location: ../php/Registros_Ventas.php"); // Redirigir a la lista de usuarios
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
    <title>Modificar Venta</title>
    <link rel="stylesheet" href="../css/Modificaciones.css">
</head>
<body>

<div class="container">
    <div class="image-container">
        <img src="../img/ImgTecnologic.png" alt="Imagen descriptiva">
    </div>

    <div class="register-container">
        <h2>Modificar Venta</h2>
        <form method="POST">
            <input type="hidden" name="ID_Ventas" value="<?= $datos->ID_Ventas ?>">
            <input type="text" name="Cantidad" placeholder="Cantidad" value="<?= htmlspecialchars($datos->Cantidad) ?>" required>
            <input type="text" name="Precio_Unitario" placeholder="Precio Unitario" value="<?= htmlspecialchars($datos->Precio_Unitario) ?>" required>
            <input type="text" name="Total" placeholder="Total" value="<?= htmlspecialchars($datos->Total) ?>" required>
            <input type="text" name="Nom_Vendedor" placeholder="Nombre del Vendedor" value="<?= htmlspecialchars($datos->Nom_Vendedor) ?>" required>
            <input type="submit" name="Actualizar" value="Modificar Datos">
        </form>
        <p><a href="../php/Registros_Ventas.php">Cancelar</a></p>
    </div>
</div>

</body>
</html>