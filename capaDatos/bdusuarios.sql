-- Active: 1704499812829@@127.0.0.1@3306@projecto
DROP DATABASE IF EXISTS proyecto;
CREATE DATABASE IF NOT EXISTS proyecto;
GRANT ALL PRIVILEGES ON *.* TO 'superUser'@'localhost' IDENTIFIED BY '1234' WITH GRANT OPTION;
FLUSH PRIVILEGES;


GRANT ALL PRIVILEGES ON proyecto.* TO 'superUser'@'localhost';
FLUSH PRIVILEGES;

USE proyecto;
DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios(  
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(60) NOT NULL,
    contrasena VARCHAR(30) NOT NULL,
    nombre VARCHAR(40),
    prApellido VARCHAR(40),
    segApellido VARCHAR(40),
    email VARCHAR(80),
    fechaNac DATE,
    fechaRegistro DATE
);
DROP TABLE IF EXISTS configPerfil;
CREATE TABLE configPerfil(
    user_id INT PRIMARY KEY,
    fotoPerfil VARCHAR(255),
    colorPerfil VARCHAR(30),
    bannerPerfil VARCHAR(255),
    descripcion TEXT,
    tamañoTexto INT,
    
    FOREIGN KEY (user_id) REFERENCES usuarios(user_id)
);
DROP TABLE IF EXISTS redesSociales;
CREATE TABLE redesSociales(
    red_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    logoRed VARCHAR(255),
    nombreRed VARCHAR(30),
    linkRed VARCHAR(255),
    
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
DROP TABLE IF EXISTS bloqueos;
CREATE TABLE bloqueos (
    bloqueante_id INT,
    bloqueado_id INT,
    PRIMARY KEY (bloqueante_id, bloqueado_id),
    FOREIGN KEY (bloqueante_id) REFERENCES usuarios(user_id),
    FOREIGN KEY (bloqueado_id) REFERENCES usuarios(user_id)
);
/*DELETE FROM bloqueos WHERE bloqueante_id = 1 AND bloqueado_id = 2; 
    orden para desbloquear

  -- Assuming 'currentUserId' is the ID of the user whose profile is being viewed
  SELECT user_id, username FROM usuarios
  WHERE id NOT IN (SELECT bloqueado_id FROM bloqueos WHERE bloqueante_id = currentUserId)
  ORDER BY RANDOM()
  LIMIT 5; -- Adjust the limit as needed
    en matching, para evitar mostrar usuarios que están bloqueados
*/
