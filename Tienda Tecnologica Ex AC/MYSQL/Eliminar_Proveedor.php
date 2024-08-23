<?php
// Conexión a la base de datos
include "./conexion.php";

// Obtener el ID del usuario desde la URL
$ID_Proveedor = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Verificar si el ID es válido
if ($ID_Proveedor > 0) {
    // Insertar el ID eliminado en la tabla ids_disponibles
    $sql_insert = "INSERT INTO ids_disponibles_Proveedores (ID_Proveedor) VALUES ($ID_Proveedor)";
    $conexion->query($sql_insert);

    // Ejecutar la eliminación del usuario
    $sql_delete = "DELETE FROM Proveedores WHERE ID_Proveedor = $ID_Proveedor";
    if ($conexion->query($sql_delete) === TRUE) {
        echo "<script>alert('Proveedor eliminado exitosamente.'); window.location.href='../php/Registros_Proveedores.php';</script>";
    } else {
        echo "Error al eliminar el Proveedor: " . $conexion->error;
    }
} else {
    echo "ID del Proveedor no válido.";
}

// Cerrar la conexión
$conexion->close();
?>
