<?php
session_start(); // Iniciar sesión si no está iniciada

// Verificar si se reciben datos del formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario de inicio de sesión
    $correo_electronico = $_POST["correo_electronico"];
    $contraseña = $_POST["contraseña"]; // No es necesario el hash en este paso

    // Conexión a la base de datos (debes completar con tus propias credenciales)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "el_tornillo_feliz";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    // Consulta SQL para verificar si el usuario y la contraseña coinciden
    $sql = "SELECT * FROM usuarios WHERE correo_electronico='$correo_electronico' AND contraseña='$contraseña'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Inicio de sesión exitoso
        $_SESSION['loggedin'] = true;
        $_SESSION['correo_electronico'] = $correo_electronico;
        echo "Inicio de sesión exitoso. Bienvenido " . $correo_electronico;
        // Aquí redirecciona o muestra la página de inicio de sesión exitoso
    } else {
        echo "Correo electrónico o contraseña incorrectos";
        // Aquí puedes redireccionar al formulario de inicio de sesión nuevamente
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>
