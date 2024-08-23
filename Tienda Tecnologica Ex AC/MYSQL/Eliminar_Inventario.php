<?php
// Conexión a la base de datos
include "./conexion.php";

// Obtener el ID del usuario desde la URL
$ID_Inventario = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Verificar si el ID es válido
if ($ID_Inventario > 0) {
    // Insertar el ID eliminado en la tabla ids_disponibles
    $sql_insert = "INSERT INTO ids_disponibles_Inventario (ID_Inventario) VALUES ($ID_Inventario)";
    $conexion->query($sql_insert);

    // Ejecutar la eliminación del usuario
    $sql_delete = "DELETE FROM Inventario WHERE ID_Inventario = $ID_Inventario";
    if ($conexion->query($sql_delete) === TRUE) {
        echo "<script>alert('Producto eliminada exitosamente.'); window.location.href='../php/Registros_Inventario.php';</script>";
    } else {
        echo "Error al eliminar el Producto: " . $conexion->error;
    }
} else {
    echo "ID del Producto no válido.";
}

// Cerrar la conexión
$conexion->close();
?>
