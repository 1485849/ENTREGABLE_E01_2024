<?php
// Verificar si se reciben datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $direccion = $_POST["direccion"];
    $correo_electronico = $_POST["correo_electronico"];
    $telefono = $_POST["telefono"];
    $contraseña = $_POST["hashed_password"]; // Utilizamos la contraseña hasheada

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

    // Preparar la consulta SQL para insertar los datos en la tabla de usuarios
    $sql = "INSERT INTO usuarios (nombres, apellidos, direccion, correo_electronico, telefono, contraseña)
    VALUES ('$nombres', '$apellidos', '$direccion', '$correo_electronico', '$telefono', '$contraseña')";

    if ($conn->query($sql) === TRUE) {
        echo "Los datos se han guardado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>
