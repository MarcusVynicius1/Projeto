CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `adm` tinyint NOT NULL,
  `cadastrado` tinyint NOT NULL,
  `DataHoraCadastro` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
)AUTO_INCREMENT=1;


CREATE TABLE `documento` (
  `nome` varchar(500) NOT NULL,
  `titulo` varchar(500) NOT NULL,
  `descricao` text NOT NULL,
  `TipoLR` tinyint NOT NULL,
  `TipoAR` tinyint NOT NULL,
  `TipoI` tinyint NOT NULL,
  `TipoT` tinyint NOT NULL,
  `TipoM` tinyint NOT NULL,
  PRIMARY KEY (`nome`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
);


CREATE TABLE `ferramenta` (
  `nome` varchar(500) NOT NULL,
  `descricao` text NOT NULL,
  `link` text NOT NULL,
  `TipoLR` tinyint NOT NULL,
  `TipoAR` tinyint NOT NULL,
  `TipoI` tinyint NOT NULL,
  `TipoT` tinyint NOT NULL,
  `TipoM` tinyint NOT NULL,
  PRIMARY KEY (`nome`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
);


CREATE TABLE `projeto` (
  `idprojeto` int NOT NULL AUTO_INCREMENT,
  `introducao` longtext NOT NULL,
  `descricao_geral` longtext NOT NULL,
  `requisitos` longtext NOT NULL,
  `descricao_metodos_LR` longtext NOT NULL,
  `idusuario` int NOT NULL,
  PRIMARY KEY (`idprojeto`),
  KEY `idusuario_idx` (`idusuario`),
  CONSTRAINT `idusuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`)
)AUTO_INCREMENT=1;
