<?php
// Conexión a la base de datos
include "./conexion.php";

// Obtener el ID del usuario desde la URL
$ID_Cliente = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Verificar si el ID es válido
if ($ID_Cliente > 0) {
    // Insertar el ID eliminado en la tabla ids_disponibles
    $sql_insert = "INSERT INTO ids_disponibles_Clientes (ID_Cliente) VALUES ($ID_Cliente)";
    $conexion->query($sql_insert);

    // Ejecutar la eliminación del usuario
    $sql_delete = "DELETE FROM Clientes WHERE ID_Cliente = $ID_Cliente";
    if ($conexion->query($sql_delete) === TRUE) {
        echo "<script>alert('Cliente eliminado exitosamente.'); window.location.href='../php/Registros_Clientes.php';</script>";
    } else {
        echo "Error al eliminar el Cliente: " . $conexion->error;
    }
} else {
    echo "ID del Cliente no válido.";
}

// Cerrar la conexión
$conexion->close();
?>
