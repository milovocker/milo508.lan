DROP TABLE ciclos_modulos;
CREATE TABLE ciclos_modulos(
    id_ciclo_modulo INT NOT NULL AUTO_INCREMENT PRIMARY KEY
    ,id_ciclo INT NOT NULL
    ,id_modulo INT NOT NULL

    ,ip_alta            VARCHAR(15)
    ,fecha_alta         TIMESTAMP DEFAULT CURRENT_TIMESTAMP

    ,ip_ult_mod         VARCHAR(15)
    ,fecha_ult_mod      TIMESTAMP DEFAULT CURRENT_TIMESTAMP

    ,FOREIGN KEY (id_ciclo) REFERENCES ciclos(id_ciclo)
    ,FOREIGN KEY (id_modulo) REFERENCES modulos(id_modulo)
);

INSERT into ciclos_modulos(id_ciclo, id_modulo)VALUES(1, 1);