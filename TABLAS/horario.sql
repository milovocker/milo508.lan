DROP TABLE horario;
CREATE TABLE horario(
    id_horario INT NOT NULL AUTO_INCREMENT PRIMARY KEY
    ,id_modulo INT NOT NULL
    ,dia VARCHAR(1)
    ,hora_desde VARCHAR(50)
    ,hora_hasta VARCHAR(50)

    ,ip_alta            VARCHAR(15)
    ,fecha_alta         TIMESTAMP DEFAULT CURRENT_TIMESTAMP

    ,ip_ult_mod         VARCHAR(15)
    ,fecha_ult_mod      TIMESTAMP DEFAULT CURRENT_TIMESTAMP

    ,FOREIGN KEY (id_modulo) REFERENCES modulos(id_modulo)
);