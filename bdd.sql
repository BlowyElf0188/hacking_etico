-- 1. Crear la base de datos para la evaluación
CREATE DATABASE evaluacion_web;

-- 2. Seleccionar la base de datos recién creada
USE evaluacion_web;

-- 3. Crear la tabla para almacenar las credenciales e información de origen
CREATE TABLE credenciales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    user_agent TEXT,
    ip_origen VARCHAR(45),
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
);
