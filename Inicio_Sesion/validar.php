<?php
// Conexión a la base de datos
$conn = new mysqli('localhost', 'usuario', 'contraseña', 'basededatos');

// Verificación de la conexión
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

// Obtención de los datos del formulario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Consulta a la base de datos para verificar el usuario y contraseña
$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena='$contrasena'";
$resultado = $conn->query($sql);

// Verificación de la consulta
if ($resultado->num_rows > 0) {
  // Inicio de sesión exitoso
  session_start();
  $_SESSION['usuario'] = $usuario;
  header('Location: pagina-principal.php');
} else {
  // Inicio de sesión fallido
  header('Location: inicio-sesion.php?error=1');
}

// Cierre de la conexión
$conn->close();
?>
