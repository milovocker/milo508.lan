DROP TABLE profesores;
CREATE TABLE profesores(

    id_profesor INT NOT NULL AUTO_INCREMENT PRIMARY KEY
    ,id_persona INT NOT NULL
    ,id_ciclo_tutor VARCHAR(100) NOT NULL

    ,FOREIGN KEY (id_persona) REFERENCES personas(id_persona)
);
