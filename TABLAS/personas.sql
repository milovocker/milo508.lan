DROP TABLE personas;
CREATE TABLE personas(
    id_persona INT NOT NULL AUTO_INCREMENT PRIMARY KEY
    ,dni VARCHAR(11) 
    ,nombre VARCHAR(50) NOT NULL
    ,email VARCHAR(100) NOT NULL UNIQUE
    ,apellido1 VARCHAR(50) NOT NULL
    ,apellido2 VARCHAR(50)

    ,ip_alta            VARCHAR(15)
    ,fecha_alta         TIMESTAMP DEFAULT CURRENT_TIMESTAMP

    ,ip_ult_mod         VARCHAR(15)
    ,fecha_ult_mod      TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

