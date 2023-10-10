<?php
include("db.php");

// Verificar si los datos 'usuario' y 'password' se han enviado correctamente desde el formulario
if (isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['usuario']) && isset($_POST['password'])) {
    // Obtener los valores del formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Consulta SQL para insertar los datos en la base de datos
    $consulta = "INSERT INTO registro (nombre, apellidos, usuario, password) VALUES ('$nombre', '$apellidos', '$usuario', '$password')";

    // Ejecutar la consulta SQL
    if (mysqli_query($conexion, $consulta)) {
        // Redireccionar al usuario a la página de inicio de sesión si el registro es exitoso
        header("location:inicio-secion.html");
        exit(); //  terminar la ejecución del script después de la redirección
    } else {
        // Mostrar un mensaje de error si hubo un problema con la consulta
        echo "Error al registrar: " .mysqli_error($conexion);
    }
} else {
    // Si falta algún campo en el formulario, muestra un mensaje de error
    echo "Faltan campos por llenar";
}
?>


