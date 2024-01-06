-- Active: 1704499812829@@127.0.0.1@3306@proyecto
DROP DATABASE IF EXISTS proyecto;
CREATE DATABASE IF NOT EXISTS proyecto;
USE proyecto;
DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios(  
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    contraseña VARCHAR(50) NOT NULL,
    nombre VARCHAR(40),
    prApellido VARCHAR(40),
    segApellido VARCHAR(40),
    email VARCHAR(80),
    fechaNac DATE
);
DROP TABLE IF EXISTS perfil;
CREATE TABLE perfil(
    user_id INT PRIMARY KEY,
    fotoPerfil VARCHAR(255),
    colorPerfil VARCHAR(7),
    bannerPerfil VARCHAR(255),
    descripcion TEXT,
    FOREIGN KEY (user_id) REFERENCES usuarios(user_id)
);
DROP TABLE IF EXISTS posts;
CREATE TABLE posts(
    post_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    contenido VARCHAR(400),
    foto VARCHAR(255),
    fechaPublic TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    likes INT DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES usuarios(user_id)
);