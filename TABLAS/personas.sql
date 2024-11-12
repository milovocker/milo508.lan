DROP TABLE personas;
CREATE TABLE alumnos(

     id INT(11) AUTO_INCREMENT PRIMARY KEY
    ,nombre VARCHAR(50) NOT NULL
    ,email VARCHAR(100) NOT NULL UNIQUE
    ,edad INT(3)
);

INSERT INTO usuarios(nombre, email, edad) VALUES('Milo', 'milovocker.clase@gmail.com', '20');