<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libraries/hamburguers/hamburguers.css">
    <link rel="icon" type="image/png" href="../media/logos/logoWhite.png" />
    <link rel="stylesheet" href="../styles/styles.css" />
    <title>Consultar Historial Medico</title>
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
    <?php
    if (comprobarNivelAcceso() == "admin" || comprobarNivelAcceso() == "veterinario") {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            echo "<p>No existe este id de animal</p>";
            exit;
        }

        /* Obtengo los datos de la tabla relacion_usuario_animal */
        $conexion = conectarBD("admin");
        $consulta = "SELECT * FROM relacion_usuario_animal WHERE id_animal=:id ORDER BY fecha DESC";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        /* Obtengo los datos de la tabla animal */
        $consulta = "SELECT nombre FROM animales WHERE id=:id";
        $nombreAnimal = $conexion->prepare($consulta);
        $nombreAnimal->bindParam(':id', $id, PDO::PARAM_INT);
        $nombreAnimal->execute();
        $nombreAnimal = $nombreAnimal->fetch(PDO::FETCH_ASSOC);
        echo "<div id='centrarContainer'>";
        echo "<h1>Historial médico de " . $nombreAnimal['nombre'] . "</h1>";

        ?>

        <div id="formInsertarHistorial">
            <form action="../modules/insertarHistorialMedico.php" id="formInsertarHistorialMedico" method="POST">
                <input type="hidden" name="id_animal" value="<?php echo $_GET["id"] ?>">
                <label for="id_usuario" id="subeUsuario">Usuario</label>
                <select name="id_usuario" id="id_usuario" required>
                    <?php
                    $consulta = "SELECT * FROM usuarios where nivel_acceso='veterinario'";
                    $resultado = $conexion->query($consulta);
                    if ($resultado->rowCount() > 0) {
                        while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='" . $fila['id'] . "'>" . $fila['nombre'] . "</option>";
                        }
                    }
                    ?>
                </select>
                <label for="fecha" id="bajarLabelHistorialMedico">Fecha</label>
                <input type="date" name="fecha" id="fecha" required class="inputFormHistorialMedico"
                    value="<?php echo date('Y-m-d'); ?>">
                <label for="tratamiento" id="bajarLabelHistorialMedico">Tratamiento</label>
                <textarea type="text" name="tratamiento" id="tratamiento" required
                    class="inputFormHistorialMedico"></textarea>
                <input type="submit" value="Añadir" id="botonInsertarHistorialMedico">
            </form>
        </div>

        <?php
        foreach ($resultados as $resultado) {
            echo "<div id='visita'>";
            $consulta_usuario = "SELECT nombre FROM usuarios WHERE id=:id_usuario";
            $stmt_usuario = $conexion->prepare($consulta_usuario);
            $stmt_usuario->bindParam(':id_usuario', $resultado['id_usuario'], PDO::PARAM_INT);
            $stmt_usuario->execute();
            $nombre_usuario = $stmt_usuario->fetch(PDO::FETCH_ASSOC);
            echo "<p>Usuario: " . $nombre_usuario['nombre'] . "</p>";
            echo "<p>Fecha visita: " . $resultado['fecha'] . "</p>";
            echo "<p>Tratamiento: " . $resultado['tratamiento'] . "</p>";
            echo "</div>";
            echo "<br>";
        }
        echo "</div>";
        // Cerrar la conexión a la base de datos
        $conexion = null;
    } else {
        echo "  <div id='containerFaltanPermisos'>
                        <div id='faltanPermisos'>
                            <h2 id='h2FaltanPermisos'>No tienes permisos para acceder a esta pagina</h2>
                            <a id='aAzul' href='../index.php'>Volver a la pagina principal</a>
                        </div>
                    </div>";
    }
    ?>
    <script src="../js/menuResponsive.js" type="module"></script>
</body>

</html>