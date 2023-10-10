<?php
include("db.php");

// Verificar si los datos 'usuario' y 'password' se han enviado correctamente desde el formulario
if (isset($_POST['usuario']) && isset($_POST['password'])) {
    $USUARIO = $_POST['usuario'];
    $PASSWORD = $_POST['password'];
    session_start();
    $_SESSION['usuario'] = $USUARIO;
    $consulta = "SELECT usuario FROM registro WHERE usuario = '$USUARIO' AND password = '$PASSWORD'";
    $resultado = mysqli_query($conexion, $consulta);

    $filas = mysqli_num_rows($resultado);

    if ($filas) {
        header("location:menu-p.html");
    } else {
        include("inicio-secion.html");
        ?>
        <h1>Error de registro</h1>
        <?php
    }

    mysqli_free_result($resultado);
} else {
    // Si 'usuario' o 'password' no se enviaron desde el formulario, muestra un mensaje de error.
    echo "Usuario y/o contraseña no definidos";
}
?>

