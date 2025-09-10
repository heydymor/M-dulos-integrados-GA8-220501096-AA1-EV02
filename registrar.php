<?php 

// No es necesario incluir con_db.php aquí si ya está en el archivo principal,
// pero por si acaso lo movemos a una sola vez para asegurar la conexión.
// NOTA: Asegúrate de que con_db.php esté en la misma carpeta que este archivo
// o ajusta la ruta. Por ahora, asumimos que está en el directorio raíz.
include('registrar.php');

if (isset($_POST['register'])) {
    // 1. Validamos que los campos no estén vacíos
    if (!empty($_POST['name']) && !empty($_POST['email'])) {
        
        // 2. Limpiamos y obtenemos las variables
	    $name = trim($_POST['name']);
	    $email = trim($_POST['email']);
        $fechareg = date("d/m/y");

        // 3. PREPARAMOS la consulta para evitar inyección SQL
        $consulta = "INSERT INTO datos(nombre, email, fecha_reg) VALUES (?, ?, ?)";
        
        // mysqli_prepare necesita la conexión y la consulta
        $stmt = mysqli_prepare($conex, $consulta);

        // 4. ASOCIAMOS los parámetros a la consulta
        // "sss" significa que estamos enviando tres strings (cadena de texto)
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $fechareg);

        // 5. EJECUTAMOS la consulta preparada
	    if (mysqli_stmt_execute($stmt)) {
	    	?> 
	    	<h3 class="ok">¡Te has inscrito correctamente!</h3>
           <?php
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups! Ha ocurrido un error al registrar.</h3>
           <?php
	    }
        // Cerramos el statement
        mysqli_stmt_close($stmt);

    } else {
	    	?> 
	    	<h3 class="bad">¡Por favor, completa todos los campos!</h3>
           <?php
    }
}
// No cerramos la conexión aquí para que la página principal pueda seguir usándola si es necesario.
// mysqli_close($conex);
?>