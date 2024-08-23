<?php
// Conexión a la base de datos
include "./conexion.php";

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $Nom_Producto = $conexion->real_escape_string($_POST['nombre']);
    $Cantidad = $conexion->real_escape_string($_POST['Cantidad']);
    $Precio = $conexion->real_escape_string($_POST['Precio']);
    $Descripccion = $conexion->real_escape_string($_POST['Descripccion']);
    $Marca = $conexion->real_escape_string($_POST['Marca']);

    // Obtener el ID disponible de la tabla ids_disponibles
    $result = $conexion->query("SELECT ID_Inventario FROM ids_disponibles_Inventario LIMIT 1");
    if ($result->num_rows > 0) {
        $id_disponible = $result->fetch_object()->ID_Inventario;
        // Eliminar el ID de la tabla ids_disponibles
        $conexion->query("DELETE FROM ids_disponibles_Inventario WHERE ID_Inventario = $id_disponible");
    } else {
        // Obtener el ID más bajo disponible de la tabla usuarios
        $result = $conexion->query("SELECT IFNULL(MAX(ID_inventario) + 1, 1) AS id_disponible FROM Inventario");
        $id_disponible = $result->fetch_object()->id_disponible;
    }

    // Insertar los datos en la tabla usuarios con el ID disponible
    $sql = "INSERT INTO Inventario (ID_Inventario, Nom_Producto, Cantidad, Precio, Descripccion, Marca) 
            VALUES ('$id_disponible', '$Nom_Producto', '$Cantidad', '$Precio', '$Descripccion', '$Marca')";

    if ($conexion->query($sql) === TRUE) {
        // Redirigir al usuario a la página de inicio de sesión
        header("Location: ../php/Registros_Inventario.php");
        exit(); // Asegura que no se siga ejecutando el script después de la redirección
    } else {
        echo "Error al registrar el Inventario: " . $conexion->error;
    }
}

// Cerrar la conexión
$conexion->close();