<?php
$conexion = mysqli_connect("localhost","root","","pentland") or die(mysql_error($mysqli));

if(!$conexion){
    die("no pudo conectars a la base de datos". msqli_error());
}
echo "conexion exitosa";

echo "# petland" >> README.md 
    
?>