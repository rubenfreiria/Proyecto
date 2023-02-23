<?php
include('../modules/PDO.php');
$pdo = conectarBD("otro");
$orden = "DESC"; // orden por defecto
if (isset($_GET['orden']) && ($_GET['orden'] == "asc" || $_GET['orden'] == "desc")) {
    $orden = $_GET['orden'];
}
$consulta = "SELECT titulo, fecha, cuerpo, foto FROM noticias ORDER BY fecha $orden;";
$resultado = $pdo->query($consulta);
$datosNoticia = $resultado->fetchAll(PDO::FETCH_ASSOC);
$html = "";
foreach ($datosNoticia as $noticia) {
    $html .= "<div class='noticia'>";
    $html .= "<div class='noticiaImagen'>";
    $html .= "<img src=" . $noticia['foto'] . " alt='foto_noticia' />";
    $html .= "</div>";
    $html .= "<div class='noticiaInfo'>";
    $html .= "<p id='noticiaTitulo'>" . $noticia['titulo'] . "</p>";
    $html .= "<p id='noticiaFecha'>Fecha: " . $noticia['fecha'] . "</p>";
    $html .= "<p>" . $noticia['cuerpo'] . "</p>";
    $html .= "</div>";
    $html .= "</div>";
}
echo $html;
?>
