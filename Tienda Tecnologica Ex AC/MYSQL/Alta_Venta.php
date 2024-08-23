<?php
// Conexión a la base de datos
include "./conexion.php";

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $Cantidad = $conexion->real_escape_string($_POST['Cantidad']);
    $Precio = $conexion->real_escape_string($_POST['Precio']);
    $Total = $conexion->real_escape_string($_POST['Total']);
    $Nom_Vendedor = $conexion->real_escape_string($_POST['Nom_Vendedor']);

    // Obtener el ID disponible de la tabla ids_disponibles
    $result = $conexion->query("SELECT ID_Ventas FROM ids_disponibles_Ventas LIMIT 1");
    if ($result->num_rows > 0) {
        $id_disponible = $result->fetch_object()->ID_Ventas;
        // Eliminar el ID de la tabla ids_disponibles
        $conexion->query("DELETE FROM ids_disponibles_Ventas WHERE ID_Ventas = $id_disponible");
    } else {
        // Obtener el ID más bajo disponible de la tabla usuarios
        $result = $conexion->query("SELECT IFNULL(MAX(ID_Ventas) + 1, 1) AS id_disponible FROM Ventas");
        $id_disponible = $result->fetch_object()->id_disponible;
    }

    // Insertar los datos en la tabla usuarios con el ID disponible
    $sql = "INSERT INTO Ventas (ID_Ventas, Cantidad, Precio_Unitario, Total, Nom_Vendedor) 
            VALUES ('$id_disponible', '$Cantidad', '$Precio', '$Total', '$Nom_Vendedor')";

    if ($conexion->query($sql) === TRUE) {
        // Redirigir al usuario a la página de inicio de sesión
        header("Location: ../php/Registros_Ventas.php");
        exit(); // Asegura que no se siga ejecutando el script después de la redirección
    } else {
        echo "Error al registrar la Venta: " . $conexion->error;
    }
}

// Cerrar la conexión
$conexion->close();