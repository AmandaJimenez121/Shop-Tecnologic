<?php
// Conexión a la base de datos
include "./conexion.php";

// Obtener el ID del usuario desde la URL
$ID_Ventas = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Verificar si el ID es válido
if ($ID_Ventas > 0) {
    // Insertar el ID eliminado en la tabla ids_disponibles
    $sql_insert = "INSERT INTO ids_disponibles_Ventas (ID_Ventas) VALUES ($ID_Ventas)";
    $conexion->query($sql_insert);

    // Ejecutar la eliminación del usuario
    $sql_delete = "DELETE FROM Ventas WHERE ID_Ventas = $ID_Ventas";
    if ($conexion->query($sql_delete) === TRUE) {
        echo "<script>alert('Venta eliminada exitosamente.'); window.location.href='../php/Registros_Ventas.php';</script>";
    } else {
        echo "Error al eliminar la Venta: " . $conexion->error;
    }
} else {
    echo "ID de la Venta no válido.";
}

// Cerrar la conexión
$conexion->close();
?>
