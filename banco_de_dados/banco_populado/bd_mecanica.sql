-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 28-Jul-2021 às 02:51
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_mecanica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

DROP TABLE IF EXISTS `cargos`;
CREATE TABLE IF NOT EXISTS `cargos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL COMMENT 'Nome do Cargo.',
  `descricao` varchar(100) NOT NULL COMMENT 'Descrição do cargo.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`id`, `nome`, `descricao`) VALUES
(1, 'Administrador', 'administrador'),
(3, 'Mecânico', 'Trabalha diretamente na manutenção dos veiculos.'),
(4, 'Ajudante', 'Ajuda o mecânico nas tarefas.'),
(5, 'Secretário', 'Cuida dos cadastros e do atendimento dos clientes.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carros`
--

DROP TABLE IF EXISTS `carros`;
CREATE TABLE IF NOT EXISTS `carros` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `placa` varchar(7) NOT NULL COMMENT 'Informar Placa do Carro.',
  `renavam` bigint(20) DEFAULT NULL COMMENT 'Informar Renavam do Carro.\n',
  `marca` varchar(50) NOT NULL COMMENT 'Será insirida a Marca do Carro.\nEX: Fiat',
  `modelo` varchar(45) NOT NULL COMMENT 'Será inserido o nome do modelo:\nEX: Uno',
  `ano_modelo` int(11) NOT NULL COMMENT 'Será inserido o ano do modelo:\nEX: 2013',
  `ano_fabricado` int(11) NOT NULL COMMENT 'Será inserido o ano fabricado do carro:\nEX: 2012',
  PRIMARY KEY (`id`),
  UNIQUE KEY `placa_UNIQUE` (`placa`),
  UNIQUE KEY `renavam_UNIQUE` (`renavam`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carros`
--

INSERT INTO `carros` (`id`, `placa`, `renavam`, `marca`, `modelo`, `ano_modelo`, `ano_fabricado`) VALUES
(1, 'JGG5760', 24260847531, 'BRM', 'Buggy/M-8/M-8 Long 1.6', 1985, 1987),
(2, 'JYC6882', 36151129003, 'Porsche', '911 Carrera GTS Coup', 2015, 2014),
(3, 'HKC7762', 27207869768, 'Fiat', 'Siena HLX Dualogic 1.8 mpi Flex 8V 4p', 2010, 2009),
(4, 'KZO2399', 61609327064, 'GREAT WALL', 'HOVER CUV 2.4 16V 4WD 5p Mec.', 2007, 2006),
(5, 'NAW3237', 46527334306, 'CHANA', 'Cargo CE 1.0 8V 53cv (Pick-Up)', 2006, 2005),
(6, 'NEZ6475', 41782046417, 'FOTON', 'AUMARK 3.5 - 11ST 2.8 4x2 TB Diesel', 2014, 2013),
(7, 'KLG7138', 11465248581, 'AM Gen', 'Hummer Hard-Top 6.5 4x4 Diesel TB', 1998, 1998),
(8, 'MWS6856', 28731332415, 'Chrysler', 'Sebring LX 2.7 V6 24V 204cv', 2001, 2001),
(9, 'JLC4458', 25219639677, 'Troller', 'T-4 DESERT STORM 4x4 3.0 TB Int Diesel', 2012, 2012),
(10, 'GFT3218', 80052139610, 'Audi', 'Q5 3.0 V6 TFSI 272cv Quattro Tiptronic', 2013, 2013);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cpf` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Informar CPF do cliente.',
  `cnpj` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Informar CNPJ caso o cliente seja uma empresa.',
  `nome` varchar(250) NOT NULL COMMENT 'Informar o nome do cliente.\n',
  `data_nascimento` date DEFAULT NULL COMMENT 'Informar a data de nascimento do cliente.',
  `telefone` bigint(20) UNSIGNED NOT NULL COMMENT 'Informar telefone de contato do cliente.',
  `email` varchar(250) DEFAULT NULL COMMENT 'Informar e-mail de contato do cliente',
  `data_cadastro` date NOT NULL COMMENT 'Campo deverá ser preenchido automaticamente.',
  `logradouro` varchar(150) NOT NULL COMMENT 'Informar o logradouro.\nEx: Avenida, Rua, etc...\n',
  `bairro` varchar(100) NOT NULL COMMENT 'Informar bairro do cliente',
  `numero_logradouro` int(11) DEFAULT NULL COMMENT 'Informar numero da casa ou apartamento do cliente.',
  `complemento_logradouro` varchar(100) DEFAULT NULL COMMENT 'Informar complemento do endereço do cliente.\nEx:Proximo ao Senai Norte I.',
  `municipio` varchar(100) NOT NULL COMMENT 'Informar o municipio que do Cliente.\nEx: Joinville',
  `estado` char(2) NOT NULL COMMENT 'Será Informado o Estado do cliente.\nEx: SC, PR....',
  `cep` int(11) DEFAULT NULL COMMENT 'Informar o CEP do CLiente.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  UNIQUE KEY `cnpj_UNIQUE` (`cnpj`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `cpf`, `cnpj`, `nome`, `data_nascimento`, `telefone`, `email`, `data_cadastro`, `logradouro`, `bairro`, `numero_logradouro`, `complemento_logradouro`, `municipio`, `estado`, `cep`) VALUES
(1, 59523140078, NULL, 'Elias Leonardo Nogueira', '1949-08-17', 62998787224, 'eliasleonardonogueira_@mrv.com.br', '2021-07-27', 'Viela 3425', 'Vila Aguiar', 259, NULL, 'Goiânia', 'GO', 74530372),
(2, 81240721404, NULL, 'Osvaldo Luiz Marcos Vinicius Santos', '1986-07-05', 82998130882, 'osvaldoluizmarcosviniciussantos@engeco.com.br', '2021-07-27', 'Rua Oldemburgo da Silva Paranhos', 'Farol', 147, NULL, 'MaceiÃƒÂ³', 'AL', 57055320),
(3, 99223354412, NULL, 'Heitor Sebastião Levi Cavalcanti', '1986-10-08', 91984941529, 'heitorsebastiaolevicavalcanti-88@rgsa.com.br', '2021-07-27', 'Quadra Quatro', 'Parque Verde', 421, NULL, 'Belém', 'PA', 66635067),
(4, 5374875574, NULL, 'Rodrigo Kevin Caldeira', '1998-11-08', 8635502961, 'rodrigokevincaldeira@grupoarteoficio.com.br', '2021-07-27', 'Rua das Palmeiras', 'SÃƒÂ£o Judas Tadeu', 330, NULL, 'ParnaÃƒÂ­ba', 'PI', 64206350),
(5, 55497307582, NULL, 'Emanuel Theo Ramos', '1954-02-01', 6929717466, 'emanueltheoramos_@jovempanfmtaubate.com.br', '2021-07-27', 'Rua Professora Alzira Selleri Barbosa', 'Habitar Brasil', 169, NULL, 'Cacoal', 'RO', 76960304),
(6, 66737584659, NULL, 'Anthony André Edson Nogueira', '1976-08-14', 91987814181, 'anthonyandreedsonnogueira-79@devuono.com.br', '2021-07-27', 'Rua Sexta', 'Distrito Industrial', 580, NULL, 'Ananindeua', 'PA', 67030550),
(7, 41329207637, NULL, 'Mateus Fernando Severino Moreira', '1949-06-15', 9238656230, 'mateusfernandoseverinomoreira-87@escritorioindaia.com.br', '2021-07-27', 'Rua OnÃƒÂ³rio JanuÃƒÂ¡rio', 'Paz', 982, NULL, 'Manaus', 'AM', 69049627),
(8, 44851060718, NULL, 'Heitor Sérgio Porto', '1986-04-11', 53986938318, 'heitorsergioporto__heitorsergioporto@yahoo.com.ar', '2021-07-27', 'Rua Domingos Vanzellotti', 'Rio Bonito', 263, 'casa', 'Rio Grande', 'RS', 96214160),
(9, 38585226196, NULL, 'Elias Diogo Carvalho', '1967-06-26', 95982017278, 'eliasdiogocarvalho@maiamaquinas.com.br', '2021-07-27', 'Rua Rio Ereu', 'Professora Araceli Souto Maior', 716, 'Casa', 'Boa Vista', 'SC', 69315014),
(10, 59274319177, NULL, 'Geraldo André Francisco Martins', '1984-04-11', 2739499924, 'geraldoandrefranciscomartins_@plastic.com.br', '2021-07-27', 'Rua Abiail do Amaral Carneiro', 'Enseada do Suá', 753, 'Apartamento', 'Vitória', 'SC', 29050535);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `matricula` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL COMMENT 'Informar nome do funcionario.',
  `cpf` bigint(20) UNSIGNED NOT NULL COMMENT 'Informar CPF do funcionario.',
  `telefone_contato` bigint(20) UNSIGNED NOT NULL COMMENT 'Telefone para contato do funcionario.',
  `senha` varchar(45) NOT NULL COMMENT 'Senha do sistema',
  `login` varchar(45) NOT NULL COMMENT 'Login do funcionario no sistema',
  `cargos_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`matricula`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  KEY `fk_funcionarios_cargos1_idx` (`cargos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`matricula`, `nome`, `cpf`, `telefone_contato`, `senha`, `login`, `cargos_id`) VALUES
(1, 'Admin', 50699428084, 47998803221, '202cb962ac59075b964b07152d234b70', 'adm', 1),
(2, 'Isadora Juliana Rodrigues', 8082514060, 95998922003, '827ccb0eea8a706c4c34a16891f84e7b', 'Isadora', 5),
(3, 'Isabella Fátima Luiza Aragão', 16349192460, 9829622864, '099ebea48ea9666a7da2177267983138', 'Isabella', 4),
(4, 'Benedito Raimundo Matheus Peixoto', 34992370160, 61991116350, '01cfcd4f6b8770febfb40cb906715822', 'Benedito', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamentos`
--

DROP TABLE IF EXISTS `orcamentos`;
CREATE TABLE IF NOT EXISTS `orcamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_produtos` text NOT NULL COMMENT 'Informar a descrição dos produtos que serão vendidos.\nEX: Amortecedor gol G5 - R$70,00 / Coxin Gol G5 - R$ 65,00',
  `valor_total_produtos` decimal(8,2) NOT NULL COMMENT 'Informar o valor total dos produtos que serão vendidos.',
  `descricao_servicos` text NOT NULL COMMENT 'Descrição dos serviços que serão prestados.\nEX: Troca de amortecedor - R$50\n',
  `valor_total_servicos` decimal(8,2) NOT NULL COMMENT 'Informar o valor total dos serviços que serão prestados.',
  `data` date NOT NULL COMMENT 'Data que foi gerado o orçamento.\n',
  `status` tinyint(4) NOT NULL COMMENT '1 - Aprovado\n2- Não Aprovado\n3 - Aguardando aprovação',
  `tipoManutencao` tinyint(4) NOT NULL COMMENT 'Informa o tipo de serviço que está sendo realizado.\n\n1- Manutenção Corretiva;\n2- Manutenção Preventiva;',
  `carros_id` int(10) UNSIGNED NOT NULL,
  `clientes_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orcamentos_carros1_idx` (`carros_id`),
  KEY `fk_orcamentos_clientes1_idx` (`clientes_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `orcamentos`
--

INSERT INTO `orcamentos` (`id`, `descricao_produtos`, `valor_total_produtos`, `descricao_servicos`, `valor_total_servicos`, `data`, `status`, `tipoManutencao`, `carros_id`, `clientes_id`) VALUES
(1, 'Freios', '200.00', 'Freios', '300.00', '2021-07-31', 1, 1, 1, 1),
(2, 'Espelhos', '50.00', 'Espelhos', '50.00', '2021-07-27', 1, 1, 10, 10),
(3, 'Pedal Acelerador', '200.00', 'Pedal Acelerador', '100.00', '2021-07-27', 1, 1, 9, 9),
(4, 'Bateria nova', '300.00', 'Troca da bateria', '100.00', '2021-07-28', 1, 1, 1, 5),
(5, 'RevisÃ£o', '50.00', 'RevisÃ£o', '50.00', '2021-07-28', 3, 2, 10, 6),
(6, 'RevisÃ£o', '50.00', 'RevisÃ£o', '50.00', '2021-07-28', 3, 2, 9, 7),
(7, 'Jogo de rodas novo', '600.00', 'Troca das rodas', '300.00', '2021-07-28', 3, 1, 7, 8),
(8, 'Troca dos bancos', '1000.00', 'Troca dos bancos', '500.00', '2021-07-28', 1, 1, 1, 1),
(9, 'RevisÃ£o', '50.00', 'RevisÃ£o', '50.00', '2021-07-28', 3, 2, 6, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordens_de_servicos`
--

DROP TABLE IF EXISTS `ordens_de_servicos`;
CREATE TABLE IF NOT EXISTS `ordens_de_servicos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `km_atual` bigint(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'Informar quantos KM o carro chegou na Oficina.',
  `data_cadastro` date NOT NULL COMMENT 'Data de cadastro da O.S será feita automaticamente pelo sistema.',
  `data_conclusao` date DEFAULT NULL COMMENT 'Informar a data que foi concluido a O.S.',
  `data_previsao` date NOT NULL COMMENT 'Informar a data que está prevista a conclusão do serviço.',
  `status` tinyint(4) NOT NULL COMMENT '1 - Em Aberto\n2 - Concluida\n3 - Atrasada',
  `valor_final` decimal(8,2) NOT NULL COMMENT 'Inserir o valor final.\nEX: Caso tenha que fazer hora extra, ou se for dado algum desconto para o cliente.',
  `funcionarios_matricula` tinyint(3) UNSIGNED NOT NULL,
  `orcamentos_id` int(11) NOT NULL,
  `informacoes_adicionais` tinytext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_ordens_de_servicos_funcionarios1_idx` (`funcionarios_matricula`),
  KEY `fk_ordens_de_servicos_orcamentos1_idx` (`orcamentos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ordens_de_servicos`
--

INSERT INTO `ordens_de_servicos` (`id`, `km_atual`, `data_cadastro`, `data_conclusao`, `data_previsao`, `status`, `valor_final`, `funcionarios_matricula`, `orcamentos_id`, `informacoes_adicionais`) VALUES
(1, 009000, '2021-07-27', '2021-07-27', '2021-08-10', 3, '500.00', 4, 1, 'Freios cortados'),
(2, 010000, '2021-07-28', NULL, '2021-08-11', 2, '10000.00', 1, 2, ''),
(3, 005000, '2021-07-28', NULL, '2021-08-11', 2, '30000.00', 4, 3, ''),
(4, 010000, '2021-07-28', '2021-08-12', '2021-08-11', 1, '10000.00', 1, 2, ''),
(5, 006000, '2021-07-28', NULL, '2021-08-11', 1, '40000.00', 4, 4, ''),
(6, 005000, '2021-07-28', NULL, '2021-08-11', 1, '150000.00', 4, 8, '');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `fk_funcionarios_cargos1` FOREIGN KEY (`cargos_id`) REFERENCES `cargos` (`id`);

--
-- Limitadores para a tabela `orcamentos`
--
ALTER TABLE `orcamentos`
  ADD CONSTRAINT `fk_orcamentos_carros1` FOREIGN KEY (`carros_id`) REFERENCES `carros` (`id`),
  ADD CONSTRAINT `fk_orcamentos_clientes1` FOREIGN KEY (`clientes_id`) REFERENCES `clientes` (`id`);

--
-- Limitadores para a tabela `ordens_de_servicos`
--
ALTER TABLE `ordens_de_servicos`
  ADD CONSTRAINT `fk_ordens_de_servicos_funcionarios1` FOREIGN KEY (`funcionarios_matricula`) REFERENCES `funcionarios` (`matricula`),
  ADD CONSTRAINT `fk_ordens_de_servicos_orcamentos1` FOREIGN KEY (`orcamentos_id`) REFERENCES `orcamentos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
