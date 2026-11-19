-- Banco de dados do projeto Imobiliária (conforme o diagrama dos slides)
CREATE DATABASE IF NOT EXISTS imobiliaria DEFAULT CHARACTER SET utf8mb4;
USE imobiliaria;

CREATE TABLE IF NOT EXISTS usuario (
    id        INT(4)       NOT NULL AUTO_INCREMENT,
    login     VARCHAR(10)  NOT NULL,
    senha     VARCHAR(100) NOT NULL,
    permissao CHAR(1)      NOT NULL,   -- A = Administrador, C = Comum
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS imovel (
    id        INT(4)        NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(200)  NOT NULL,
    foto      VARCHAR(30),
    valor     DECIMAL(9,2)  NOT NULL,
    tipo      CHAR(1)       NOT NULL,
    PRIMARY KEY (id)
);

-- Registra toda vez que um usuário comum acessa o link de um imóvel
CREATE TABLE IF NOT EXISTS visualizacao (
    id        INT(4) NOT NULL AUTO_INCREMENT,
    idUsuario INT(4) NOT NULL,
    idImovel  INT(4) NOT NULL,
    data      DATE   NOT NULL,
    hora      TIME   NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (idUsuario) REFERENCES usuario (id),
    FOREIGN KEY (idImovel)  REFERENCES imovel (id)
);

-- Usuário administrador de exemplo (opcional)
INSERT INTO usuario (login, senha, permissao) VALUES ('admin', '123456', 'A');
