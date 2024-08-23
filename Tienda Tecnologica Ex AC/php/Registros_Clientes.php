<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP TECNOLOGIC</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js"
    crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Registros_Clientes.css">
</head>
<body>
  
    <header>
        <div class="header__superior">
            <div class="logo">
                <h2>Shop Tecnologic</h2>
            </div>
            <div class="search">
                <input type="search" placeholder="Que deseas buscar">
            </div>
        </div>

        <div class="container__menu">

            <div class="menu">
                <input type="checkbox" id="check__menu">
                <label id="#label__check" for="check__menu">
                    <i class="fas fa-bars icon__menu"></i>
                </label>
                <nav>
                    <ul>
                        <li><a href="../html/inicio.html" id="selected">INICIO</a></li>
                        <li><a href="../index.html">LOGIN</a>
                            <ul>
                                <li><a href="../html/Registrate.html">Registrar</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            
        </div>
    </header>
    <main>
    <article>
    <h2>Registros de Clientes
        <a href="./Registrar_Clientes.php"><img src="../img/Mas.png" alt="" class="boton-imagen"></a>
    </h2>
    <br>
    <div class="tablaR">
        <table class="table">
            <thead class="disCo">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombre del Cliente</th>
                    <th scope="col">Apellidos del Cliente</th>
                    <th scope="col">Dirrecion</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">Fecha de Registro</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../MYSQL/conexion.php";
                $sql = $conexion->query("select * from Clientes");
                while ($datos = $sql->fetch_object()) { ?>
                <tr>
                    <td><?= $datos->ID_Cliente ?></td>
                    <td><?= $datos->Nom_Cliente ?></td>
                    <td><?= $datos->Ap_Cliente ?></td>
                    <td><?= $datos->Direccion ?></td>
                    <td><?= $datos->Telefono ?></td>
                    <td><?= $datos->correo ?></td>
                    <td><?= $datos->Contraseñas ?></td>
                    <td><?= $datos->Fecha_Registro ?></td>
                    <td>
                        <a href="../MYSQL/Modificacion_Clientes.php?id=<?= $datos->ID_Cliente ?>"><img src="../img/Actualizar.png" alt="Modificacion"></a>
                        <a href="../MYSQL/Eliminar_Clientes.php?id=<?= $datos->ID_Cliente ?>" onclick="return confirmar('¿Estás seguro de que deseas eliminar este Cliente?');"><img src="../img/Basura.png" alt="Baja"></a>
                    </td>
                </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</article>           
    </main>
</body>
</html>