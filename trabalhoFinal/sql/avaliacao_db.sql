---Não se esqueça de alterar os dados de senha e nome do banco no arquivo "conexao.php" do PostgreSQL conforme necessário.---

CREATE DATABASE feedback_sistema;
\c feedback_sistema;

CREATE TABLE dispositivo (
    dispositivo_id SERIAL PRIMARY KEY,
    nome_dispositivo VARCHAR(100) NOT NULL,
    status VARCHAR(10)
);

CREATE TABLE setor (
    setor_id SERIAL PRIMARY KEY,
    nome_setor VARCHAR(100) NOT NULL,
    status VARCHAR(10),
    dispositivo_id INTEGER,
    CONSTRAINT fk_setor_dispositivo
        FOREIGN KEY (dispositivo_id)
        REFERENCES dispositivo(dispositivo_id)
        ON UPDATE CASCADE
        ON DELETE SET NULL
);

CREATE TABLE pergunta (
    pergunta_id SERIAL PRIMARY KEY,
    texto_pergunta TEXT NOT NULL,
    status VARCHAR(10),
    setor_id INTEGER NOT NULL,
    CONSTRAINT fk_pergunta_setor
        FOREIGN KEY (setor_id)
        REFERENCES setor(setor_id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

CREATE TABLE avaliacao (
    avaliacao_id SERIAL PRIMARY KEY,
    setor_id INTEGER NOT NULL,
    pergunta_id INTEGER NOT NULL,
    dispositivo_id INTEGER NOT NULL,
    resposta INTEGER,
    feedback_textual TEXT,
    datahora TIMESTAMP WITHOUT TIME ZONE DEFAULT NOW(),
    envio_id serial,

    CONSTRAINT fk_avaliacao_setor
        FOREIGN KEY (setor_id)
        REFERENCES setor(setor_id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,

    CONSTRAINT fk_avaliacao_pergunta
        FOREIGN KEY (pergunta_id)
        REFERENCES pergunta(pergunta_id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,

    CONSTRAINT fk_avaliacao_dispositivo
        FOREIGN KEY (dispositivo_id)
        REFERENCES dispositivo(dispositivo_id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

