Protectora Teis

URL: protectora.ruben.social
Credenciales de administrador: email: "pepe@pepe.com" contraseña: "Abcd1234."

Esta página trata de mostrar una web de ejemplo de una protectora de animales.

Existen 3 tipos de usuarios posibles que pueden logearse en la web, que a su vez tienen unos permisos asociados en la base de datos:

-Usuario Estandar: Esta identificado por un icono de usuario normal, solo puede acceder a las páginas principales. Index, adopciones, noticias, donaciones y contacto.
                   Un usuario estandar puede registrarse y recibir un email de confirmacion, adoptar y donar.
                   Su usuario de base de datos es "otro" y solo se le permite hacer consultas de tipo select.

-veterinario: Esta identificado por un icono de una cruz, puede acceder a las páginas principales, y al panel de veterinario.
              La función del veterinario es poder dar de alta a los animales desde el panel, donde tendrá un formulario para rellenar los datos e imagen del animal.
              Su usuario de base de datos es "veterinario" y solo se le permite hacer consultas de tipo select e insert.

-administrador: Esta identificado por un icono de un usuario con un engranaje, puede acceder a las páginas principales, y al panel de administrador.
                La función del administrador es dar de alta usuarios con permisos especiales. Tambien puede darlos de baja. 
                Su usuario de base de datos es ¨a19rubenfi¨ y tiene todos los permisos.
                Existe un usuario administrador predeterminado para pruebas el cual no se puede borrar. 
                Sus credenciales de acceso son email: "pepe@pepe.com" contraseña: "Abcd1234."

Para la ejecución del código en local y que funcione, se debe ejecutar el script de creacion de la base de datos, situado en la carpeta BD.
También se deben modificar los archivos xml dentro de /modules/config/ para poner las credenciales de la base de datos.            