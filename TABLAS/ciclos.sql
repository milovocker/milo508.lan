DROP TABLE ciclos;
CREATE TABLE ciclos(
    id_ciclo INT NOT NULL AUTO_INCREMENT PRIMARY KEY
    ,nombre VARCHAR(50) NOT NULL
    ,siglas VARCHAR(3) NOT NULL
    ,curso INT(1) NOT NULL
    ,letra VARCHAR(1)

    ,ip_alta            VARCHAR(15)
    ,fecha_alta         TIMESTAMP DEFAULT CURRENT_TIMESTAMP

    ,ip_ult_mod         VARCHAR(15)
    ,fecha_ult_mod      TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

insert into ciclos(nombre, siglas, curso) VALUES ('Desarrollo de aplicaciones web', 'DAW', 2);