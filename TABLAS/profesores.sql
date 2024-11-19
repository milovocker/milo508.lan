DROP TABLE profesores;
CREATE TABLE profesores(

    id_profesor INT NOT NULL AUTO_INCREMENT PRIMARY KEY
    ,id_persona INT NOT NULL
    ,id_ciclo_tutor int(100) NOT NULL

    ,FOREIGN KEY (id_persona) REFERENCES personas(id_persona)
);

insert into profesores(id_persona, id_ciclo_tutor)VALUES(24, 1)