DROP TABLE ciclos;
CREATE TABLE ciclos(
    id_ciclo INT NOT NULL AUTO_INCREMENT PRIMARY KEY
    ,nombre VARCHAR(50) NOT NULL
    ,siglas VARCHAR(3) NOT NULL

    ,ip_alta            VARCHAR(15)
    ,fecha_alta         TIMESTAMP DEFAULT CURRENT_TIMESTAMP

    ,ip_ult_mod         VARCHAR(15)
    ,fecha_ult_mod      TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);