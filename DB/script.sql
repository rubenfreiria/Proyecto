DROP DATABASE IF EXISTS protectora_teis;

CREATE DATABASE protectora_teis CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE protectora_teis;

/* Tabla usuarios */
CREATE TABLE usuarios (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    passwd VARCHAR(200) NOT NULL,
    nivel_acceso ENUM('admin', 'veterinario', 'otro') NOT NULL,
    nombre VARCHAR(40) NOT NULL,
    apellidos VARCHAR(60) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE
) DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

/* Tabla noticias*/
CREATE TABLE noticias (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200) NOT NULL,
    cuerpo TEXT NOT NULL,
    fecha DATE NOT NULL,
    foto VARCHAR(200) NOT NULL,
    id_usuario INT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)

) DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

/* Tabla animales */
CREATE TABLE animales (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(40) NOT NULL,
    genero ENUM('macho', 'hembra') NOT NULL,
    especie ENUM('perro', 'gato') NOT NULL,
    raza VARCHAR(40) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    foto VARCHAR(200) NOT NULL,
    estado ENUM('adoptado', 'disponible', 'baja') NOT NULL
) DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

/* Tabla adopciones */
CREATE TABLE adopciones (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fecha_adopcion DATE NOT NULL,
    id_animal INT NOT NULL,
    id_adoptante INT NOT NULL,
    FOREIGN KEY (id_animal) REFERENCES animales(id),
    FOREIGN KEY (id_adoptante) REFERENCES usuarios(id)
) DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

/* Tabla de donaciones */
CREATE TABLE donaciones (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fecha_donacion DATE NOT NULL,
    cantidad DECIMAL(10, 2) NOT NULL,
    mensaje_donacion TEXT NOT NULL,
    donador_id INT,
    FOREIGN KEY (donador_id) REFERENCES usuarios(id)
) DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

/* Tabla de historial médico */
/* Modificar para que se puedan guardar varios veterinario por cada historial medico */
CREATE TABLE historial_medico (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fecha_visita DATE NOT NULL,
    tratamiento VARCHAR(255) NOT NULL,
    observaciones VARCHAR(255) NOT NULL,
    id_animal INT NOT NULL,
    id_veterinario INT NOT NULL,
    FOREIGN KEY (id_animal) REFERENCES animales(id),
    FOREIGN KEY (id_veterinario) REFERENCES usuarios(id)
) DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

/* Insert a tabla usuarios */
INSERT INTO
    usuarios (
        passwd,
        nivel_acceso,
        nombre,
        apellidos,
        telefono,
        email
    )
VALUES
    (
        '$2y$10$1UYunAqyJErWotljCrgkSeE6RrH5q48ZOusvdueNK.PbKQKHpaoPa',
        'admin',
        'Pepe',
        'Perez',
        '678123456',
        'pepe@pepe.com'
    ),
    (
        '$2y$10$YwJZS8GYOiEx9AgsL.xoK.6cjLEBnbIfmlB5I/773tuM7KEnJMswu',
        'otro',
        'Paco',
        'Lopez',
        '694527090',
        'paquito46@example.com'
    ),
    (
        '$2y$10$Xdgf46oCeyhR6RJXiDCBbe0GZALHVkycBDJ2YmSs0mbHpU1voTj26',
        'veterinario',
        'Federico',
        'García',
        '60645342',
        'federico@protectorateis.com'
    );

    /* Insert tabla animales */
    INSERT INTO animales (nombre, genero, especie, raza, fecha_nacimiento, foto, estado) VALUES
    ("Luna", "hembra", "perro", "Pastor Alemán", "2010-06-12", "../media/fotosAdopciones/luna.jpg", "adoptado"),
    ("Max", "macho", "perro", "Golden Retriever", "2011-03-20", "../media/fotosAdopciones/max.jpg", "disponible"),
    ("Buddy", "macho", "perro", "Labrador Retriever", "2008-01-17", "../media/fotosAdopciones/buddy.jpg", "adoptado"),
    ("Rocky", "macho", "perro", "Bulldog Francés", "2009-12-07", "../media/fotosAdopciones/rocky.jpg", "adoptado"),
    ("Daisy", "hembra", "perro", "Beagle", "2010-09-13", "../media/fotosAdopciones/daisy.jpg", "disponible"),
    ("Charlie", "macho", "gato", "Siames", "2009-05-06", "../media/fotosAdopciones/charlie.jpg", "adoptado"),
    ("Simba", "macho", "gato", "Persa", "2011-08-04", "../media/fotosAdopciones/simba.jpg", "baja"),
    ("Sasha", "hembra", "gato", "Sphynx", "2008-12-01", "../media/fotosAdopciones/sasha.jpg", "adoptado"),
    ("Mimi", "hembra", "gato", "Angora", "2011-01-26", "../media/fotosAdopciones/mimi.jpg", "disponible"),
    ("Tigre", "macho", "gato", "Maine Coon", "2009-04-08", "../media/fotosAdopciones/tigre.jpg", "disponible"),
    ("Nala", "hembra", "gato", "Siamés", "2008-02-23", "../media/fotosAdopciones/nala.jpg", "disponible"),
    ("Rufus", "macho", "perro", "Chihuahua", "2010-11-05", "../media/fotosAdopciones/rufus.jpg", "disponible"),
    ("Lola", "hembra", "perro", "Cocker Spaniel", "2011-07-12", "../media/fotosAdopciones/lola.jpg", "disponible"),
    ("Rock", "macho", "perro", "Doberman", "2007-12-31", "../media/fotosAdopciones/rock.jpg", "disponible"),
    ("Lulu", "hembra", "perro", "Poodle", "2008-06-06", "../media/fotosAdopciones/lulu.jpg", "disponible"),
    ("Bear", "macho", "perro", "San Bernardo", "2010-02-08", "../media/fotosAdopciones/bear.jpg", "baja");

    /* Insert tabla adopciones */
    INSERT INTO adopciones (fecha_adopcion, id_animal, id_adoptante) VALUES 
    ("2022-12-01", 1, 1), 
    ("2022-10-12", 3, 2), 
    ("2022-09-30", 4, 2), 
    ("2022-07-15", 6, 3), 
    ("2022-05-01", 8, 3); 

    /*Insert tabla noticias*/
    INSERT INTO noticias (titulo, fecha, foto, cuerpo) VALUES
("Nueva colaboración entre Organizaciones Voluntarias", "2023-01-10", "../media/fotosNoticias/10-01-2023.jpg",
"Protectora Teis nos hemos asociado recientemente con una organización de voluntarios que busca ayudar a perros y gatos de la calle a encontrar un hogar amoroso y seguro. La nueva colaboración, que se centrará en áreas de alto riesgo en la ciudad, busca proporcionar atención médica y refugio a los animales callejeros, y trabajar en estrecha colaboración con las autoridades locales para promover políticas que protejan a los animales de la calle.

El objetivo de la asociación es reducir el número de animales sin hogar y garantizar que aquellos que no tienen hogar reciban la atención y el cuidado que merecen. La organización de voluntarios tiene experiencia en la construcción de refugios temporales, proporcionando alimentos y atención médica a los animales callejeros.

Desde nuestro lado aportaremos nuestra experiencia y conocimientos en la promoción de la adopción de animales abandonados y en la lucha contra el maltrato y el abuso animal. La organización también tiene un fuerte enfoque en la educación y concienciación, y trabajará con la organización de voluntarios para crear programas que fomenten la responsabilidad y el respeto hacia los animales.

La asociación entre Protectora Teis y la organización de voluntarios no solo proporcionará una mejor atención a los animales callejeros, sino que también ayudará a crear conciencia sobre los problemas de abandono y maltrato animal en la ciudad. Juntos, esperan hacer una diferencia significativa en la vida de los animales más vulnerables de la comunidad."),
("Campaña de donaciones para un nuevo refugio", "2022-12-17", "../media/fotosNoticias/17-12-2022.jpg",
"Hemos lanzado una campaña de donaciones para construir un nuevo refugio para animales abandonados en la ciudad. El nuevo refugio permitirá a la organización albergar a más animales y brindarles una atención de calidad mientras esperan ser adoptados por una familia amorosa.

La campaña de donaciones es una respuesta a la creciente necesidad de refugios para animales en la ciudad, donde el número de animales abandonados y sin hogar sigue aumentando. La nueva instalación contará con modernas instalaciones de atención veterinaria, una zona de juegos y recreación para los animales y espacios cómodos y seguros para el personal y los voluntarios.

La construcción del nuevo refugio también nos permitirá ampliar nuestros programas de adopción y educación sobre la tenencia responsable de animales. La organización está comprometida a trabajar con la comunidad para reducir el abandono de animales y mejorar el bienestar de los animales de compañía.

Esperamos recaudar suficientes fondos para construir el nuevo refugio lo antes posible, y poder seguir brindando el apoyo necesario a los animales más vulnerables de la ciudad. La organización anima a la comunidad a contribuir a la campaña de donaciones y hacer una diferencia en la vida de los animales abandonados y sin hogar."),
("Nuevo programa de voluntariado para jóvenes", "2022-10-23", "../media/fotosNoticias/23-10-2022.jpg",
"Anunciamos recientemente el lanzamiento de un programa de voluntariado para jóvenes interesados en trabajar en proyectos de protección y bienestar animal. El programa, que está abierto a jóvenes de entre 14 y 18 años, busca fomentar el amor y el respeto por los animales y desarrollar habilidades y valores valiosos para la vida.

Los jóvenes voluntarios trabajarán en proyectos como la construcción de refugios, la limpieza de parques y calles, y la promoción de la adopción de animales. También participarán en actividades de sensibilización y educación, como visitas a escuelas y comunidades para hablar sobre el bienestar animal y la tenencia responsable de mascotas.

El programa de voluntariado es una oportunidad para que los jóvenes hagan una diferencia en la vida de los animales y se involucren activamente en la comunidad. Esperamos que el programa ayude a crear conciencia sobre los problemas de abandono y maltrato animal, y fomente la responsabilidad y el respeto hacia los animales.

La organización de protección animal ofrece capacitación y supervisión a los jóvenes voluntarios, y trabaja en estrecha colaboración con las familias y las escuelas para asegurar la seguridad y el bienestar de todos los participantes. El programa de voluntariado es una oportunidad única para que los jóvenes desarrollen habilidades valiosas y adquieran experiencia práctica en un campo que les apasiona."),
("Carrera para recaudar fondos", "2022-09-08", "../media/fotosNoticias/08-09-2022.jpg",
"En Protectora Teis hemos organizado recientemente una carrera de 5 kilómetros para recaudar fondos en apoyo a su misión de proteger a los animales abandonados y maltratados en la ciudad. La carrera, que contó con la participación de más de 500 corredores, reunió una cantidad significativa de dinero para la organización.

La carrera comenzó en el parque central de la ciudad y siguió un recorrido por las principales calles de la ciudad, antes de terminar en la sede de la organización. Los corredores y sus mascotas disfrutaron de un día soleado y una atmósfera llena de energía y camaradería.

Además de la carrera, la organización también organizó un mercado de comida y artesanías, donde se vendieron productos y se recaudaron fondos adicionales para la protección de los animales. Los voluntarios de la organización también ofrecieron información sobre la tenencia responsable de mascotas y la importancia de la adopción de animales.

La carrera y el mercado fueron un gran éxito para la organización , y los fondos recaudados ayudarán a cubrir los costos de atención veterinaria, alimentos y refugio para los animales abandonados y maltratados que atienden. La organización agradece a todos los corredores, voluntarios y patrocinadores que hicieron posible el evento y contribuyeron a su importante labor."),
("Apertura nuevo refugio para gatos callejeros", "2022-08-25", "../media/fotosNoticias/25-08-2022.jpg",
"Anunciamos la reciente apertura de un nuevo albergue para gatos callejeros. El albergue, ubicado en el centro de la ciudad, proporcionará un lugar seguro y cómodo para los gatos callejeros, mientras se buscan hogares permanentes para ellos.

El albergue cuenta con amplias instalaciones que incluyen áreas de descanso, zonas de juegos y juguetes para gatos, y un personal altamente capacitado que se encargará de cuidar y atender las necesidades de los gatos. Trabajaremos con voluntarios y organizaciones de rescate de animales para identificar a los gatos callejeros más necesitados y traerlos al albergue para su cuidado.

Además de brindar un refugio seguro para los gatos callejeros, el albergue también se centrará en la socialización y el entrenamiento de los gatos para que sean más adecuados para la adopción. La organización también ofrecerá servicios de esterilización y vacunación para los gatos antes de ser adoptados, para garantizar que sean saludables y no contribuyan al problema de la sobrepoblación de gatos callejeros.

La apertura del nuevo albergue para gatos callejeros es un hito importante para nosotros, ya que nos permitirá ayudar a un grupo vulnerable de animales que a menudo son ignorados y maltratados. La organización espera que el albergue sea un lugar donde los gatos callejeros puedan recibir el amor y la atención que merecen, mientras esperan encontrar un hogar permanente."),
("Subasta de arte benéfica", "2022-08-15", "../media/fotosNoticias/15-08-2022.jpg",
"Nos hemos asociado con un grupo local de artistas para organizar una subasta benéfica de arte para recaudar fondos para los animales en necesidad. La subasta presentará una selección de obras de arte originales, incluyendo pinturas, fotografías, esculturas y grabados.

La subasta se llevará a cabo en línea, y los fondos recaudados serán utilizados para apoyar los programas de la protectora, incluyendo la atención médica y el refugio para los animales en situación de calle, los programas de adopción y la educación sobre la tenencia responsable de mascotas.

La organización ha trabajado con el grupo de artistas local para seleccionar obras de arte que representen la belleza y la diversidad de la naturaleza y los animales, y que inspiren a los amantes del arte a contribuir a una buena causa. La subasta también contará con algunas piezas de artistas famosos que han donado obras a la protectora de animales para su venta.

Estamos emocionados de asociarse con la comunidad de artistas local para recaudar fondos para los animales necesitados. La organización invita a los amantes del arte y los defensores de los animales a participar en la subasta y a contribuir a una causa que ayuda a mejorar la vida de los animales en la comunidad."),
("Programa educativo acerca del cuidado y protección de los animales", "2022-07-17", "../media/fotosNoticias/17-07-2022.jpg",
"Hemos lanzado recientemente un programa educativo para enseñar a los niños sobre el cuidado y la protección de los animales. El programa, que se lleva a cabo en las escuelas locales, tiene como objetivo fomentar la compasión y la empatía hacia los animales, y educar a los niños sobre las necesidades de los animales y su importancia en el mundo.

El programa educativo incluye charlas interactivas, actividades y demostraciones prácticas sobre el cuidado y la protección de los animales, así como la importancia de la adopción de mascotas. Los niños también tendrán la oportunidad de interactuar con algunos de los animales de la protectora, y aprender sobre su comportamiento, necesidades y cuidados.

El programa educativo es gratuito y está disponible para todas las escuelas locales, y esperamos que alcance a un gran número de niños en la comunidad. La organización espera que al educar a los niños sobre la importancia del cuidado y la protección de los animales, se puedan reducir los casos de abandono y maltrato de animales en la comunidad.

Estamos a promover la educación sobre el cuidado y la protección de los animales, y espera que este programa educativo sea el primero de muchos más que ayuden a crear una comunidad más compasiva y consciente sobre la importancia de los animales en el mundo."),
("Campaña para fomentar la adopción de perros mayores", "2022-06-23", "../media/fotosNoticias/23-06-2022.jpg",
"Hemos iniciado una campaña para fomentar la adopción de perros mayores. La organización ha notado que muchos perros mayores tienen dificultades para encontrar un hogar permanente, ya que la mayoría de las personas prefieren adoptar cachorros.

La campaña de adopción de perros mayores está dirigida a personas que buscan un compañero fiel y amoroso para compartir su vida con ellos, y que estén dispuestos a proporcionar el cuidado y la atención necesaria que requieren estos perros. Hemos identificado a varios perros mayores que necesitan un hogar, y los ha preparado para su adopción.

Los perros mayores son una excelente opción para personas que buscan una mascota tranquila y que no requiere demasiada actividad física, ya que muchos de estos perros tienen una personalidad más relajada y disfrutan de los momentos de descanso. Además, muchos de ellos ya están entrenados y son más independientes que los cachorros.

Esperamos que nuestra campaña de adopción de perros mayores tenga éxito y que muchas personas consideren darles una oportunidad a estos perros que necesitan un hogar amoroso. La organización también enfatiza la importancia de adoptar y no comprar mascotas, ya que esto ayuda a reducir el número de animales en situación de calle y a promover la tenencia responsable de mascotas."),
("Programa de esterilización gratuita para gatos callejeros", "2022-06-03", "../media/fotosNoticias/03-06-2022.jpg",
"Hemos iniciado un programa de esterilización gratuita para gatos callejeros en la comunidad local. La organización ha notado que la población de gatos callejeros ha estado aumentando, y ha decidido tomar medidas para controlar su reproducción y reducir su sufrimiento.

El programa de esterilización gratuita de gatos callejeros consiste en llevar a cabo campañas de captura y esterilización en varias áreas de la comunidad local. La organización cuenta con un equipo de veterinarios y voluntarios que se encargan de capturar a los gatos, llevarlos a la clínica para esterilización, y luego devolverlos a su hábitat natural.

La esterilización de gatos callejeros es importante porque ayuda a controlar la población de estos animales y a reducir su sufrimiento. Los gatos callejeros tienen una vida difícil y pueden estar expuestos a enfermedades y peligros, y a menudo son víctimas de la eutanasia debido a la sobrepoblación.

Esperamos que nuestro programa de esterilización gratuita de gatos callejeros tenga un impacto positivo en la comunidad local y ayude a controlar la población de gatos callejeros en el área. La organización también enfatiza la importancia de la tenencia responsable de mascotas y alienta a la comunidad a no abandonar a sus mascotas, ya que esto contribuye al problema de los animales en situación de calle."),
("Campaña de educación en las escuelas acerca de la empatía sobre nuestros animales", "2022-05-30", "../media/fotosNoticias/30-05-2022.jpg",
"Hemos iniciado un programa de educación para niños en edad escolar para fomentar la empatía y el respeto hacia los animales. La organización ha notado que la educación temprana es clave para inculcar valores positivos hacia los animales y reducir el maltrato y abandono de mascotas.

Nuestro programa consiste en visitar escuelas locales y brindar charlas y actividades educativas para niños en edad escolar. Los temas abordados incluyen la tenencia responsable de mascotas, la importancia del cuidado y el respeto hacia los animales, y cómo actuar en caso de encontrar un animal en situación de calle.

Creemos que la educación temprana es fundamental para crear una sociedad más empática y responsable con los animales. Los niños que aprenden a cuidar y respetar a los animales desde temprana edad son más propensos a convertirse en adultos responsables y compasivos hacia los animales.

Hemos recibido una gran acogida por parte de la comunidad local y se espera que tenga un impacto positivo en la forma en que los niños ven y tratan a los animales. La organización también enfatiza la importancia de la adopción y la tenencia responsable de mascotas, y alienta a la comunidad a adoptar en lugar de comprar mascotas."),
("Campaña de adopción de perros", "2022-04-18", "../media/fotosNoticias/18-04-2022.jpg",
"Hemos llevado a cabo una exitosa campaña de adopción de perros durante el fin de semana. La organización ha reportado que más de 50 perros fueron adoptados por familias amorosas, lo que significa que tendrán un hogar seguro y amoroso para siempre.

La campaña de adopción se llevó a cabo en nuestro centro de adopción, y contó con la participación de voluntarios y empleados de la organización. Los perros disponibles para adopción fueron previamente revisados por un veterinario, vacunados y desparasitados para asegurar su salud.

Nos encontramos muy felices por el éxito de la campaña de adopción, ya que significa que muchos perros en situación de calle han encontrado hogares amorosos. La organización también agradece a las familias adoptantes por hacer una diferencia en la vida de estos animales.

Continuaremos trabajando arduamente para encontrar hogares amorosos para más animales en situación de calle. La organización también enfatiza la importancia de la adopción y la tenencia responsable de mascotas, y alienta a la comunidad a adoptar en lugar de comprar mascotas.");
    