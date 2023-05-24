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

// Verificación de si el usuario ya existe
$sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
  // El usuario ya existe
  header('Location: registro.php?error=1');
} else {
  // El usuario no existe, se puede registrar
  $sql = "INSERT INTO usuarios (usuario, contrasena) VALUES ('$usuario', '$contrasena')";
  if ($conn->query($sql) === TRUE) {
    // Registro exitoso
    header('Location: registro.php?success=1');
  } else {
    // Error en el registro
    header('Location: registro.php?error=2');
  }
}

// Cierre de la conexión
$conn->close();
?>
