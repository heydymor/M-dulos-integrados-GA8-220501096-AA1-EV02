<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panadería Cocopan</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    // Esta línea busca el archivo "inicio.php" DENTRO de la carpeta "pages"
include('pages/' . $page . '.php');

    <?php include('header.php'); ?>

    <main>
        <?php
            // Definimos la página por defecto como 'inicio'
            $page = $_GET['page'] ?? 'inicio';

            // Creamos una lista de páginas permitidas para seguridad
            $paginas_permitidas = ['inicio', 'menu', 'pedidos', 'contacto'];

            if (in_array($page, $paginas_permitidas)) {
                // Si la página está en la lista, la incluimos desde la carpeta /pages/
                include('pages/' . $page . '.php');
            } else {
                // Si no, mostramos un error 404
                echo '<div class="contenido"><h2>Error 404: Página no encontrada</h2></div>';
            }
        ?>
    </main>

    <?php include('footer.php'); ?>

</body>
</html>