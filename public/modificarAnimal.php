<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libraries/hamburguers/hamburguers.css">
    <link rel="icon" type="image/png" href="../media/logos/logoWhite.png" />
    <link rel="stylesheet" href="../styles/styles.css" />
    <title>Modificar Animal</title>
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
    <div id="centrarContainer">
        <h1>Modificar Animal</h1>
        <?php
        // Obtener el ID del animal a modificar
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            echo "<p>No se ha especificado el ID del animal a modificar.</p>";
            exit;
        }

        // Obtener los datos del animal a partir del ID
        $conexion = conectarBD("admin");
        $consulta = "SELECT * FROM animales WHERE id=:id";
        $resultado = $conexion->prepare($consulta);
        $resultado->bindParam(':id', $id);
        $resultado->execute();

        if ($resultado->rowCount() == 0) {
            echo "<p>No se encontró el animal con el ID especificado.</p>";
            exit;
        }

        // Mostrar el formulario de modificación con los datos del animal
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        echo "<div id='containerModificarAnimal'>
        <form action='../modules/guardarModificacion.php' method='post'>
            <input type='hidden' name='id' value='" . $fila['id'] . "'>
            <label for='nombre'>Nombre:</label>
            <input type='text' name='nombre' id='inputModificacionAnimal' value='" . $fila['nombre'] . "'><br>
            <label for='genero'>Género:</label>
            <select name='genero' id='inputModificacionAnimal'>
                <option value='macho' " . ($fila['genero'] == 'macho' ? 'selected' : '') . ">Macho</option>
                <option value='hembra' " . ($fila['genero'] == 'hembra' ? 'selected' : '') . ">Hembra</option>
            </select><br>
            <label for='especie'>Especie:</label>
            <select name='especie' id='inputModificacionAnimal'>
                <option value='perro' " . ($fila['especie'] == 'perro' ? 'selected' : '') . ">Perro</option>
                <option value='gato' " . ($fila['especie'] == 'gato' ? 'selected' : '') . ">Gato</option>
            </select><br>
            <label for='raza'>Raza:</label>
            <input type='text' name='raza' id='inputModificacionAnimal' value='" . $fila['raza'] . "'><br>
            <label for='fecha_nacimiento'>Fecha de nacimiento:</label>
            <input type='date' name='fecha_nacimiento' id='inputModificacionAnimal' value='" . $fila['fecha_nacimiento'] . "'><br>
            <label for='estado'>Estado:</label>
            <select name='estado' id='inputModificacionAnimal'>
                <option value='adoptado' " . ($fila['estado'] == 'adoptado' ? 'selected' : '') . ">Adoptado</option>
                <option value='disponible' " . ($fila['estado'] == 'disponible' ? 'selected' : '') . ">Disponible</option>
                <option value='baja' " . ($fila['estado'] == 'baja' ? 'selected' : '') . ">Baja</option>
            </select><br>
            <input type='submit' id='inputEnviarModificacionAnimal' value='Guardar cambios'>
        </form>
    </div>";

        ?>
    </div>
    <script src="../js/menuResponsive.js" type="module"></script>
</body>

</html>