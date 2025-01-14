<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../css/Registros.css">
</head>
<body>

<div class="container">
    <div class="image-container">
        <img src="../img/Clientes.jpg" alt="Imagen descriptiva">
    </div>

    <div class="register-container">
        <h2>Regístrate</h2>
        <form action="../MYSQL/Alta_Clientes.php" method="POST">
            <input type="text" name="nombre" placeholder="Nombre Completo" required>

            <input type="text" name="Apellidos" placeholder="Apellidos del Cliente" required>

            <input type="text" name="Direccion" placeholder="Dirreccion" required>

            <input type="text" name="Telefono" placeholder="Telefono" required>

            <input type="email" name="Correo" placeholder="Correo Electronico" required>

            <input type="password" id="Contraseña" name="Contraseña" placeholder="Crear Contraseña" required>

            <div class="show-password">
                <input type="checkbox" id="show-password-checkbox">
                <label for="show-password-checkbox">Mostrar contraseña</label>
            </div>

            <input type="submit" name="Registrar" value="OK">
        </form>
        <p>¿Ya tienes una cuenta? <a href="../HOME/LOGIN.php">Inicia sesión aquí</a></p>
        <p><a href="../html/inicio.html">Cancelar</a></p>
    </div>
</div>

<script>
    const passwordField = document.getElementById('Contraseña');
    const showPasswordCheckbox = document.getElementById('show-password-checkbox');

    showPasswordCheckbox.addEventListener('change', function() {
        if (this.checked) {
            passwordField.type = 'text';
        } else {
            passwordField.type = 'password';
        }
    });
</script>
</body>
</html>