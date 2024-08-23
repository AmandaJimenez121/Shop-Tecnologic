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
    <link rel="stylesheet" href="../css/Registros_Proveedores.css">
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
    <h2>Registros de Proveedores
        <a href="./Registrar_Proveedores.php"><img src="../img/Mas.png" alt="" class="boton-imagen"></a>
    </h2>
    <br>
    <div class="tablaR">
        <table class="table">
            <thead class="disCo">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombre del Proveedor</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Fecha de Registro</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../MYSQL/conexion.php";
                $sql = $conexion->query("select * from Proveedores");
                while ($datos = $sql->fetch_object()) { ?>
                <tr>
                    <td><?= $datos->ID_Proveedor ?></td>
                    <td><?= $datos->Nom_Proveedor ?></td>
                    <td><?= $datos->Telefono ?></td>
                    <td><?= $datos->Cantidad ?></td>
                    <td><?= $datos->Precio ?></td>
                    <td><?= $datos->Fecha_Registro ?></td>
                    <td>
                        <a href="../MYSQL/Modificacion_Proveedor.php?id=<?= $datos->ID_Proveedor ?>"><img src="../img/Actualizar.png" alt="Modificacion"></a>
                        <a href="../MYSQL/Eliminar_Proveedor.php?id=<?= $datos->ID_Proveedor ?>" onclick="return confirmar('¿Estás seguro de que deseas eliminar este Proveedor?');"><img src="../img/Basura.png" alt="Baja"></a>
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