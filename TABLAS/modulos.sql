DROP TABLE modulos;
CREATE TABLE modulos(
    id_modulo INT NOT NULL AUTO_INCREMENT PRIMARY KEY
    ,nombre VARCHAR(50) NOT NULL
    ,id_profesor INT NOT NULL
    ,color VARCHAR(7) NOT NULL
    ,siglas VARCHAR(3) NOT NULL

    ,ip_alta            VARCHAR(15)
    ,fecha_alta         TIMESTAMP DEFAULT CURRENT_TIMESTAMP

    ,ip_ult_mod         VARCHAR(15)
    ,fecha_ult_mod      TIMESTAMP DEFAULT CURRENT_TIMESTAMP

    ,FOREIGN KEY (id_profesor) REFERENCES profesores(id_profesor)
);

INSERT INTO modulos(nombre, id_profesor, color, siglas) VALUES ('Desarrollo de Aplicaciones Web', '')
