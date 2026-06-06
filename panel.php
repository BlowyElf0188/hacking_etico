<?php
// 1. CONECTAR A LA BASE DE DATOS
$conn = new mysqli("localhost", "root", "root", "evaluacion_web");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// 2. CONSULTAR LOS DATOS
$sql = "SELECT id, usuario, password, user_agent, ip_origen, fecha_registro FROM credenciales ORDER BY id DESC";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Evaluación Hacking_Ético Unidad 1 - IRIYC91 Roberto Rodríguez</title>
</head>
<body>

    <h2>Registros de Auditoría</h2>

    <?php
    if ($resultado->num_rows > 0) {
        // Imprimir cada dato de manera individual y plana
        while($fila = $resultado->fetch_assoc()) {
            echo "<p>";
            echo "<b>ID:</b> " . $fila['id'] . "<br>";
            echo "<b>Usuario:</b> " . $fila['usuario'] . "<br>";
            echo "<b>Contraseña:</b> " . $fila['password'] . "<br>";
            echo "<b>Navegador (User-Agent):</b> " . $fila['user_agent'] . "<br>";
            echo "<b>IP:</b> " . $fila['ip_origen'] . "<br>";
            echo "<b>Fecha:</b> " . $fila['fecha_registro'] . "<br>";
            echo "</p>";
            echo "<hr>"; // Una línea para separar un intento de otro
        }
    } else {
        echo "<p>No hay datos registrados todavía.</p>";
    }
    ?>

    <br>
    <a href="login.php">Volver al Login</a>

</body>
</html>
<?php $conn->close(); ?>