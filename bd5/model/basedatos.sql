-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS citas1;

-- Seleccionar la base de datos
USE citas1;

-- Tabla de provincias
CREATE TABLE provincia (
    provincia_id INT AUTO_INCREMENT PRIMARY KEY,
    provincia_nombre VARCHAR(255) NOT NULL
);

-- Tabla de niveles
CREATE TABLE nivel (
    nivel_id INT AUTO_INCREMENT PRIMARY KEY,
    nivel_nombre VARCHAR(255) NOT NULL
);


-- Tabla de usuarios
CREATE TABLE usuario (
    usuario_id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_nombre VARCHAR(255) NOT NULL,
    usuario_clave VARCHAR(255) NOT NULL,
    usuario_correo VARCHAR(255) NOT NULL,
    usuario_nivel INT,
    usuario_imagen VARCHAR(255),
    usuario_nacimiento DATE,
    usuario_provincia INT,
    usuario_telefono VARCHAR(20),
    FOREIGN KEY (usuario_provincia) REFERENCES provincia(provincia_id),
    FOREIGN KEY (usuario_nivel) REFERENCES nivel(nivel_id)
);

