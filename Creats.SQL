create table usuarios (
id  serial primary key ,
nome varchar(255),
email varchar(255),
senha varchar(255)		
);

CREATE TABLE atributos (
    id SERIAL PRIMARY KEY,
    id_usuario INTEGER,
    forca DOUBLE PRECISION,
    velocidade DOUBLE PRECISION,
    inteligencia DOUBLE PRECISION,
    resistencia DOUBLE PRECISION,
    mana DOUBLE PRECISION,
    pontuacao_total DOUBLE PRECISION,
    rank_hunter VARCHAR(2),

    FOREIGN KEY (id_usuario)
    REFERENCES usuarios(id)
);
