<?php

// Conexión a la base de datos
include "./conexion.php";

// Obtener el ID del usuario desde la URL
$ID_Cliente = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Verificar si el ID es válido
if ($ID_Cliente > 0) {
    // Consultar los datos del usuario
    $sql = $conexion->query("SELECT * FROM Clientes WHERE ID_Cliente = $ID_Cliente");
    if ($sql->num_rows > 0) {
        $datos = $sql->fetch_object();
    } else {
        die("Cliente no encontrado.");
    }
} else {
    die("ID inválido.");
}

// Verificar si se ha enviado el formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $Nom_Cliente = $conexion->real_escape_string($_POST['nombre']);
    $Ap_Cliente = $conexion->real_escape_string($_POST['Apellidos']);
    $Direccion = $conexion->real_escape_string($_POST['Direccion']);
    $Telefono = $conexion->real_escape_string($_POST['Telefono']);
    $correo = $conexion->real_escape_string($_POST['Correo']);

    // Actualizar los datos en la tabla usuarios sin modificar la contraseña
    $update_sql = "UPDATE Clientes SET Nom_Cliente='$Nom_Cliente', Ap_Cliente='$Ap_Cliente', Direccion='$Direccion', Telefono='$Telefono', correo='$Correo_Electro' WHERE ID_Cliente='$ID_Cliente'";

    if ($conexion->query($update_sql) === TRUE) {
        echo "Datos actualizados exitosamente";
        header("Location: ../php/Registros_Clientes.php"); // Redirigir a la lista de usuarios
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
    <title>Modificar Usuario</title>
    <link rel="stylesheet" href="../css/Modificaciones.css">
</head>
<body>

<div class="container">
    <div class="image-container">
        <img src="../img/Clientes.jpg" alt="Imagen descriptiva">
    </div>

    <div class="register-container">
        <h2>Modificar Cliente</h2>
        <form method="POST">
            <input type="hidden" name="id_usuario" value="<?= $datos->ID_usuario ?>">
            <input type="text" name="nombre" placeholder="Nombre Completo" value="<?= htmlspecialchars($datos->Nom_Cliente) ?>" required>
            <input type="text" name="Apellidos" placeholder="Apellidos del Cliente" value="<?= htmlspecialchars($datos->Ap_Cliente) ?>" required>
            <input type="text" name="Direccion" placeholder="Direccion" value="<?= htmlspecialchars($datos->Direccion) ?>" required>
            <input type="text" name="Telefono" placeholder="Telefono" value="<?= htmlspecialchars($datos->Telefono) ?>" required>
            <input type="email" name="correo" placeholder="Correo Electrónico" value="<?= htmlspecialchars($datos->correo) ?>" required>
            <input type="submit" name="Actualizar" value="Modificar Datos">
        </form>
        <p><a href="../php/Registros_Clientes.php">Cancelar</a></p>
    </div>
</div>

</body>
</html>