<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libraries/hamburguers/hamburguers.css">
    <link rel="icon" type="image/png" href="../media/logos/logoWhite.png" />
    <link rel="stylesheet" href="../styles/styles.css" />
    <title>Historial medico</title>
</head>

<body>
    <header>
        <nav id="menu">
            <div id="menuIzquierda">
                <img class="elementoMenu" id="logoHeader" src="../media/logos/logoWhite.png" />
                <h3>
                    <a class="elementoMenu" id="h3Menu" href="../index.php">Protectora</a>
                </h3>
            </div>
            <div id="menuDerecha">
                <?php
                session_start();
                include("../modules/comprobarNivelAcceso.php");
                //Comprobamos si hay una sesion iniciada y si el usuario es un administrador o un veterinario
                // Si hay una sesion iniciada mostramos el nombre del usuario y el boton de cerrar sesion, si no mostramos el boton de login y el de registrarse
                if (isset($_SESSION["userID"])) {
                    if (comprobarNivelAcceso() == "admin") {
                        echo "<p id='nombreUserArriba'><img id='imgUserArriba' src='../media/logos/userAdmin.png' alt='Icono usuario'>" . $_SESSION['userNombre'] . "</p>";
                        echo "<button id='btnPanelAdministracion' value='btnPanelAdministracion' class='elementoMenu'><a href='./administracionPanel.php'>Administracion</a></button>";
                    } elseif (comprobarNivelAcceso() == "veterinario") {
                        echo "<p id='nombreUserArriba'><img id='imgUserArriba' src='../media/logos/userVeterinario.png' alt='Icono usuario'>" . $_SESSION['userNombre'] . "</p>";
                        echo "<button id='btnPanelAdministracion' value='btnPanelAdministracion' class='elementoMenu'><a href='./veterinarioPanel.php'>Administracion</a></button>";
                    } else {
                        echo "<p id='nombreUserArriba'><img id='imgUserArriba' src='../media/logos/user.png' alt='Icono usuario'>" . $_SESSION['userNombre'] . "</p>";
                    }
                    echo "<form id='formCerrarSesion' action='../modules/cerrarSesion.php' method='post'>
                    <button type='submit' id='btnCerrarSesion' value='btnCerrarSesion' class='elementoMenu'>Cerrar sesión</button>
                    </form>";

                } else {
                    echo '<a class="elementoMenu" id="inicioSesionA" href="./register.php">Registrarse</a>
                    <a class="elementoMenu" id="registerA" href="./login.php">Login</a>';
                }
                ?>
            </div>
        </nav>
    </header>

    <section>
        <button class="panelr-btn hamburger--spring" type="button">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
        <aside class="panelr is-active">
            <nav class="menuReducido">
                <a href="../index.php">Inicio</a>
                <a href="./adopciones.php">Adopciones</a>
                <a href="./donaciones.php">Donaciones</a>
                <a href="./noticias.php">Noticias</a>
                <a href="./contacto.php">Contacto</a>
            </nav>
        </aside>
        <div id="menuContainer">
            <a class="menuLink" href="./adopciones.php">Adopciones</a>
            <a class="menuLink" href="./donaciones.php">Donaciones</a>
            <a class="menuLink" href="./noticias.php">Noticias</a>
            <a class="menuLink" href="./contacto.php">Contacto</a>
        </div>
    </section>
    <div id="centrarTablaHistorial">
        <h1>Historial médico</h1>
        <input type="text" id="buscador" class="elementoForm" placeholder="Buscar animal por nombre">
        <div id="tablaHistorial">
            <?php
            // El código PHP para mostrar la tabla de animales permanece igual
            $conexion = conectarBD("admin");
            $consulta = "SELECT * FROM animales";
            $resultado = $conexion->query($consulta);

            if ($resultado->rowCount() > 0) {
                echo "<table id='tablaHistorial'>
                <tr id='trRed'>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Género</th>
                    <th>Especie</th>
                    <th>Raza</th>
                    <th>Fecha de nacimiento</th>
                    <th>Estado</th>
                    <th>Modificar</th>
                    <th>Historial medico</th>
                </tr>";
                while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td id='tdID'>" . $fila['id'] . "</td>";
                    echo "<td>" . $fila['nombre'] . "</td>";
                    echo "<td>" . $fila['genero'] . "</td>";
                    echo "<td>" . $fila['especie'] . "</td>";
                    echo "<td>" . $fila['raza'] . "</td>";
                    echo "<td>" . $fila['fecha_nacimiento'] . "</td>";
                    echo "<td>" . $fila['estado'] . "</td>";
                    echo "<td><a href='../public/modificarAnimal.php?id=" . $fila['id'] . "'>Modificar</a></td>";
                    echo "<td><a href='../public/consultarHistorialMedico.php?id=" . $fila['id'] . "'>Historial medico</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No hay animales</p>";
            }
            ?>
        </div>
    </div>
    <script src="../js/buscador.js"></script>
    <script src="../js/menuResponsive.js" type="module"></script>
</body>

</html>