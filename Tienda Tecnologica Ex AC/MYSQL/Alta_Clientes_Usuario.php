<?php
// Conexión a la base de datos
include "./conexion.php";

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $Nom_Cliente = $conexion->real_escape_string($_POST['nombre']);
    $Ap_Cliente = $conexion->real_escape_string($_POST['Apellidos']);
    $Direccion = $conexion->real_escape_string($_POST['Direccion']);
    $Telefono = $conexion->real_escape_string($_POST['Telefono']);
    $Correo = $conexion->real_escape_string($_POST['Correo']);
    $Contraseña = password_hash($_POST['Contraseña'], PASSWORD_BCRYPT); // Encriptar la contraseña

    // Obtener el ID disponible de la tabla ids_disponibles
    $result = $conexion->query("SELECT ID_Cliente FROM ids_disponibles_Clientes LIMIT 1");
    if ($result->num_rows > 0) {
        $id_disponible = $result->fetch_object()->ID_Cliente;
        // Eliminar el ID de la tabla ids_disponibles
        $conexion->query("DELETE FROM ids_disponibles_Clientes WHERE ID_Cliente = $id_disponible");
    } else {
        // Obtener el ID más bajo disponible de la tabla usuarios
        $result = $conexion->query("SELECT IFNULL(MAX(ID_Cliente) + 1, 1) AS id_disponible FROM Clientes");
        $id_disponible = $result->fetch_object()->id_disponible;
    }

    // Insertar los datos en la tabla usuarios con el ID disponible
    $sql = "INSERT INTO Clientes (ID_Cliente, Nom_Cliente, Ap_Cliente, Direccion, Telefono, Correo, Contraseñas) 
            VALUES ('$id_disponible', '$Nom_Cliente', '$Ap_Cliente', '$Direccion', '$Telefono', '$Correo', '$Contraseña')";

    if ($conexion->query($sql) === TRUE) {
        // Redirigir al usuario a la página de inicio de sesión
        header("Location: ../html/inicio.html");
        exit(); // Asegura que no se siga ejecutando el script después de la redirección
    } else {
        echo "Error al registrar el Cliente: " . $conexion->error;
    }
}

// Cerrar la conexión
$conexion->close();
