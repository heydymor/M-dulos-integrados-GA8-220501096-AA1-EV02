<div class="hero">
    <h1>El sabor artesanal en cada bocado</h1>
    <p>Descubre la pasión por el buen pan en Cocopan.</p>
</div>

<div class="form-container">
    <form method="post">
        <h2>Suscríbete a nuestras novedades</h2>
        <p>Recibe ofertas y noticias de nuestros productos frescos.</p>
        <input type="text" name="name" placeholder="Nombre completo" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="submit" name="register" value="Suscribirme">
    </form>
    <?php
        // Incluimos el script que procesa el formulario
        include('../registrar.php');
    ?>
</div>