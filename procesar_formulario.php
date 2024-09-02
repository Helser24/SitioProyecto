<?php
// Configuración de la base de datos
$servername = "localhost"; // Cambia esto si es necesario
$username = "root"; // Cambia esto si es necesario
$password = ""; // Cambia esto si es necesario
$dbname = "formulario_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$proyecto = $_POST['proyecto'];
$mensaje = $_POST['mensaje'];

// Preparar y ejecutar la consulta SQL
$sql = "INSERT INTO mensajes (nombre, correo, proyecto, mensaje) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $nombre, $correo, $proyecto, $mensaje);

if ($stmt->execute()) {
    echo "Mensaje enviado exitosamente.";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
