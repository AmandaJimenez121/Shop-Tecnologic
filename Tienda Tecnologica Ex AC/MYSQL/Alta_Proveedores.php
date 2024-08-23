<?php
// Conexión a la base de datos
include "./conexion.php";

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $Nom_Proveedor = $conexion->real_escape_string($_POST['nombre']);
    $Telefono = $conexion->real_escape_string($_POST['Telefono']);
    $Cantidad = $conexion->real_escape_string($_POST['Cantidad']);
    $Precio = $conexion->real_escape_string($_POST['Precio']);

    // Obtener el ID disponible de la tabla ids_disponibles
    $result = $conexion->query("SELECT ID_Proveedor FROM ids_disponibles_Proveedores LIMIT 1");
    if ($result->num_rows > 0) {
        $id_disponible = $result->fetch_object()->ID_Proveedor;
        // Eliminar el ID de la tabla ids_disponibles
        $conexion->query("DELETE FROM ids_disponibles_Proveedores WHERE ID_Proveedor = $id_disponible");
    } else {
        // Obtener el ID más bajo disponible de la tabla usuarios
        $result = $conexion->query("SELECT IFNULL(MAX(ID_Proveedor) + 1, 1) AS id_disponible FROM Proveedores");
        $id_disponible = $result->fetch_object()->id_disponible;
    }

    // Insertar los datos en la tabla usuarios con el ID disponible
    $sql = "INSERT INTO Proveedores (ID_Proveedor, Nom_Proveedor, Telefono, Cantidad, Precio) 
            VALUES ('$id_disponible', '$Nom_Proveedor', '$Telefono', '$Cantidad', '$Precio')";

    if ($conexion->query($sql) === TRUE) {
        // Redirigir al usuario a la página de inicio de sesión
        header("Location: ../php/Registros_Proveedores.php");
        exit(); // Asegura que no se siga ejecutando el script después de la redirección
    } else {
        echo "Error al registrar el Proveedor: " . $conexion->error;
    }
}

// Cerrar la conexión
$conexion->close();