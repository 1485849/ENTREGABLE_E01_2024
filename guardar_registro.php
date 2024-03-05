<?php

// Conexión a la base de datos
$db = new PDO('mysql:host=localhost;dbname=el_tornillo_feliz', 'root', '');

// Validación de campos
if (empty($_POST['nombres']) || empty($_POST['apellidos']) || empty($_POST['direccion']) || empty($_POST['correo_electronico']) || empty($_POST['telefono']) || empty($_POST['contraseña'])) {
    echo "Error: Todos los campos son obligatorios.";
    exit;
}

// Sanitización de campos
$nombres = filter_var($_POST['nombres'], FILTER_SANITIZE_STRING);
$apellidos = filter_var($_POST['apellidos'], FILTER_SANITIZE_STRING);
$direccion = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
$correo_electronico = filter_var($_POST['correo_electronico'], FILTER_SANITIZE_EMAIL);
$telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_NUMBER_INT);
$hashed_password = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

// Consulta SQL para insertar el usuario
$sql = "INSERT INTO usuarios (nombres, apellidos, direccion, correo_electronico, telefono, contraseña) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $db->prepare($sql);
$stmt->execute([$nombres, $apellidos, $direccion, $correo_electronico, $telefono, $hashed_password]);

// Obtención del ID del usuario
$usuario_id = $db->lastInsertId();

// Mensaje de éxito
echo "Usuario registrado correctamente. Su ID es: " . $usuario_id;

// Redireccionamiento a la página de inicio
header("Location: productos.html");

?>
