<?php
// Conexión a la base de datos
$db = new PDO('mysql:host=localhost;dbname=el_tornillo_feliz', 'root', '');

// Validación de campos
if (empty($_POST['correo_electronico']) || empty($_POST['contraseña'])) {
    echo "Error: Todos los campos son obligatorios.";
    exit;
}

// Sanitización de campos
$correo_electronico = filter_var($_POST['correo_electronico'], FILTER_SANITIZE_EMAIL);
$contraseña = $_POST['contraseña'];

// Consulta SQL para obtener el usuario
$sql = "SELECT * FROM usuarios WHERE correo_electronico = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$correo_electronico]);
$usuario = $stmt->fetch();

// Validación de usuario y contraseña
if (!$usuario || !password_verify($contraseña, $usuario['contraseña']) || !$usuario['activo']) {
    echo "Error: Usuario o contraseña incorrectos. El usuario no está activo.";
    exit;
}

// Inicio de sesión
session_start();
$_SESSION['usuario'] = $usuario;

// Redireccionamiento a la página principal
header("Location: productos.html");
?>
