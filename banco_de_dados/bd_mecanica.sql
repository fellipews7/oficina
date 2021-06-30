-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 15-Jun-2021 às 22:47
-- Versão do servidor: 8.0.21
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
  `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL COMMENT 'Nome do Cargo.',
  `descricao` varchar(100) NOT NULL COMMENT 'Descrição do cargo.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`id`, `nome`, `descricao`) VALUES
(0000000001, 'Administrador', 'Controle geral do sistema');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carros`
--

DROP TABLE IF EXISTS `carros`;
CREATE TABLE IF NOT EXISTS `carros` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `placa` varchar(7) NOT NULL COMMENT 'Informar Placa do Carro.',
  `renavam` bigint DEFAULT NULL COMMENT 'Informar Renavam do Carro.\n',
  `marca` varchar(50) NOT NULL COMMENT 'Será insirida a Marca do Carro.\nEX: Fiat',
  `modelo` varchar(45) NOT NULL COMMENT 'Será inserido o nome do modelo:\nEX: Uno',
  `ano_modelo` smallint UNSIGNED NOT NULL COMMENT 'Será inserido o ano do modelo:\nEX: 2013',
  `ano_fabricado` smallint UNSIGNED NOT NULL COMMENT 'Será inserido o ano fabricado do carro:\nEX: 2012',
  PRIMARY KEY (`id`),
  UNIQUE KEY `placa_UNIQUE` (`placa`),
  UNIQUE KEY `renavam_UNIQUE` (`renavam`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carros`
--

INSERT INTO `carros` (`id`, `placa`, `renavam`, `marca`, `modelo`, `ano_modelo`, `ano_fabricado`) VALUES
(0000000001, 'LXS0050', 68387647537, 'VW - VolksWagen', 'Gol GT/GTS 1.8', 2004, 2003),
(0000000002, 'MIG0380', 48735847813, 'GM - Chevrolet', 'Celta Life/ LS 1.0 MPFI 8V FlexPower 5p', 0, 2006),
(0000000003, '', 0, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `cpf` bigint UNSIGNED DEFAULT NULL COMMENT 'Informar CPF do cliente.',
  `cnpj` bigint UNSIGNED DEFAULT NULL COMMENT 'Informar CNPJ caso o cliente seja uma empresa.',
  `nome` varchar(250) NOT NULL COMMENT 'Informar o nome do cliente.\n',
  `data_nascimento` date DEFAULT NULL COMMENT 'Informar a data de nascimento do cliente.',
  `telefone` bigint UNSIGNED NOT NULL COMMENT 'Informar telefone de contato do cliente.',
  `email` varchar(250) DEFAULT NULL COMMENT 'Informar e-mail de contato do cliente',
  `data_cadastro` date NOT NULL COMMENT 'Campo deverá ser preenchido automaticamente.',
  `logradouro` varchar(45) NOT NULL COMMENT 'Informar o logradouro.\nEx: Avenida, Rua, etc...\n',
  `bairro` varchar(50) NOT NULL COMMENT 'Informar bairro do cliente',
  `numero_logradouro` int DEFAULT NULL COMMENT 'Informar numero da casa ou apartamento do cliente.',
  `complemento_logradouro` varchar(100) DEFAULT NULL COMMENT 'Informar complemento do endereço do cliente.\nEx:Proximo ao Senai Norte I.',
  `municipio` varchar(100) NOT NULL COMMENT 'Informar o municipio que do Cliente.\nEx: Joinville',
  `estado` char(2) NOT NULL COMMENT 'Será Informado o Estado do cliente.\nEx: SC, PR....',
  `cep` int UNSIGNED DEFAULT NULL COMMENT 'Informar o CEP do CLiente.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  UNIQUE KEY `cnpj_UNIQUE` (`cnpj`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `cpf`, `cnpj`, `nome`, `data_nascimento`, `telefone`, `email`, `data_cadastro`, `logradouro`, `bairro`, `numero_logradouro`, `complemento_logradouro`, `municipio`, `estado`, `cep`) VALUES
(0000000001, 83100479912, NULL, 'Vitor Severino Marcos Aragão', '1995-07-27', 47994175861, 'vitorseverinomarcosaragao@gasparalmeida.com', '2021-05-09', 'Rua Dom Pedro II', 'América', 730, NULL, 'Joinville', 'SC', 89204160),
(0000000002, 90758895933, NULL, 'Isabel Allana Yasmin Barros', '1962-04-01', 47996353256, 'isabelallanayasminbarros@escritorioindaia.com.br', '2021-05-14', 'Rua Francisco Alves', 'Nova Brasília', 938, NULL, 'Joinville', 'SC', 89214727),
(0000000003, 63999225939, NULL, 'Mateus Matheus Nogueira', '1948-01-22', 47991862954, 'mateusmatheusnogueira@maccropropaganda.com.br', '2021-05-14', 'Rua Alfredo Hibener', 'Pirabeiraba', NULL, NULL, '89239286', 'Jo', 0),
(0000000004, NULL, 12801830983, 'Nathan Teste', '2001-08-28', 47997102489, 'nathanteste@gmail.com', '2021-05-16', 'Rod. SC 418 ', 'bairro', 12, NULL, 'Joinville', 'SC', 89239390),
(0000000005, 46779491152, NULL, 'Kevin Rafael Sales', '1977-06-27', 4328233506, 'kevinrafaelsales__kevinrafaelsales@cernizza.com.br', '2021-05-30', ' Rua Basílio Zani', ' Conjunto Habitacional José Giordano', 509, NULL, 'Londrina', 'PR', 86082440),
(0000000006, NULL, 474444444444, '', '2000-01-01', 474, '', '2021-06-03', '', 'bairro', 0, NULL, '', '', 0),
(0000000007, NULL, 79897, 'Lipe ', '2000-01-05', 0, 'felipe@gmail.com', '2021-06-07', 'R. Campo Largos', 'bairro', 867, NULL, 'Joinville', 'SC', 89239390),
(0000000012, NULL, 70897, 'Lipee', '2000-01-03', 0, 'felipe@gmail.com', '2021-06-07', 'R. Campo Largos', 'bairro', 867, NULL, 'Joinville', 'SC', 89239390),
(0000000013, NULL, 0, 'MAtheus', '2000-01-01', 0, 'nathanteste@gmail.com', '2021-06-07', 'Rod. SC 418', 'bairro', 867, NULL, 'Joinville', 'SC', 89239390),
(0000000014, NULL, 47444, 'MAtheus', '2000-01-01', 0, 'nathanteste@gmail.com', '2021-06-07', 'Rod. SC 418', 'bairro', 867, NULL, 'Joinville', 'SC', 89239390),
(0000000015, NULL, 29960, 'igor ', '2000-01-01', 0, 'nathanteste@gmail.com', '2021-06-07', 'Rod. SC 418', 'bairro', 0, NULL, 'Joinville', 'SC', 89239390),
(0000000048, NULL, 79897849000160, 'Douglas', '2000-01-01', 0, 'felipe@gmail.com', '2021-06-08', 'R. Campo Largos', 'bairro', 867, NULL, 'Joinville', 'SC', 89239390),
(0000000049, NULL, 11230058000148, 'Fellipe Schewelzth', '2000-01-01', 47991375936, 'felipereidelas@gmail.com', '2021-06-08', 'R. Campo Largos', 'bairro', 867, NULL, 'Joinville', 'SC', 89439400),
(0000000050, NULL, 69318717000182, 'Hellena Gameplays', '2000-01-01', 47991375936, 'helenagameplays@gmail.com', '2021-06-08', 'Rod. SC 418', 'bairro', 111, NULL, 'Joinville', 'SC', 89239400),
(0000000051, NULL, 30361516053, 'Rogerinho', '1999-12-27', 47400933355, 'rogerio@senai.com.br', '2021-06-09', 'R. Dona Franscisca', 'bairro', 404, NULL, 'Joinville', 'SC', 89235000),
(0000000052, NULL, 55221280973, ' Adriana Antônia Nogueira', '1998-05-08', 4437983634, 'adrianaantonianogueira@maorifilmes.com.br', '2021-06-09', ' Avenida Principal', 'bairro', 0, NULL, ' Alto São João', ' P', 87323970);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `matricula` tinyint(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL COMMENT 'Informar nome do funcionario.',
  `cpf` bigint UNSIGNED NOT NULL COMMENT 'Informar CPF do funcionario.',
  `telefone_contato` bigint UNSIGNED NOT NULL COMMENT 'Telefone para contato do funcionario.',
  `cargos_id` int UNSIGNED NOT NULL COMMENT 'Informar o cargo que o funcionario possui\n',
  `senha` varchar(45) NOT NULL COMMENT 'Senha do sistema',
  `login` varchar(45) NOT NULL COMMENT 'Login do funcionario no sistema',
  PRIMARY KEY (`matricula`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  KEY `fk_funcionarios_cargos1_idx` (`cargos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`matricula`, `nome`, `cpf`, `telefone_contato`, `cargos_id`, `senha`, `login`) VALUES
(001, 'Bruno Schulz', 11033669989, 4728301825, 1, 'abc', 'bruno.schulz'),
(002, 'Nathan Bergmann', 123, 47998803221, 1, 'teste', 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamentos`
--

DROP TABLE IF EXISTS `orcamentos`;
CREATE TABLE IF NOT EXISTS `orcamentos` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `descricao_produtos` text NOT NULL COMMENT 'Informar a descrição dos produtos que serão vendidos.\nEX: Amortecedor gol G5 - R$70,00 / Coxin Gol G5 - R$ 65,00',
  `valor_total_produtos` decimal(6,2) NOT NULL COMMENT 'Informar o valor total dos produtos que serão vendidos.',
  `descricao_servicos` text NOT NULL COMMENT 'Descrição dos serviços que serão prestados.\nEX: Troca de amortecedor - R$50\n',
  `valor_total_servicos` decimal(6,2) NOT NULL COMMENT 'Informar o valor total dos serviços que serão prestados.',
  `data` date NOT NULL COMMENT 'Data que foi gerado o orçamento.\n',
  `status` tinyint NOT NULL COMMENT '1 - Aprovado\n2- Não Aprovado\n3 - Aguardando aprovação',
  `clientes_id` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'ID do cliente que está sendo passado o orçamento',
  `carros_id` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'ID do carro que está sendo passado o orçamento.',
  PRIMARY KEY (`id`),
  KEY `fk_orcamentos_clientes1_idx` (`clientes_id`),
  KEY `fk_orcamentos_carros1_idx` (`carros_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `orcamentos`
--

INSERT INTO `orcamentos` (`id`, `descricao_produtos`, `valor_total_produtos`, `descricao_servicos`, `valor_total_servicos`, `data`, `status`, `clientes_id`, `carros_id`) VALUES
(0000000001, 'Amortecedor Gol G5 - R$70,00 / Kit coxin e batente Gol G5 - R$ 154,74', '224.74', 'Troca de Amortecedor, Coxin e Batente - R$100,00', '100.00', '2021-05-09', 1, 0000000001, 0000000001),
(0000000003, 'descrição prdutos teste - R$ 200,00', '200.00', 'serviço teste - R$50', '50.00', '2021-05-30', 0, 0000000005, 0000000002);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordens_de_servicos`
--

DROP TABLE IF EXISTS `ordens_de_servicos`;
CREATE TABLE IF NOT EXISTS `ordens_de_servicos` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `tipo_de_manutencao` tinyint NOT NULL COMMENT 'Informa o tipo de serviço que está sendo realizado.\n\n1- Manutenção Corretiva;\n2- Manutenção Preventiva;',
  `km_atual` bigint(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'Informar quantos KM o carro chegou na Oficina.',
  `data_cadastro` date NOT NULL COMMENT 'Data de cadastro da O.S será feita automaticamente pelo sistema.',
  `data_conclusao` date NOT NULL COMMENT 'Informar a data que foi concluido a O.S.',
  `data_previsao` date NOT NULL COMMENT 'Informar a data que está prevista a conclusão do serviço.',
  `status` tinyint NOT NULL COMMENT '1 - Aberto\n2 - Aguardando Aprovação\n3 - Finalizada',
  `orcamentos_id` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'Informar o ID do ORçamento',
  `funcionarios_matricula` tinyint(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'Informar o ID do funcionario que fará o serviço.',
  `desconto` decimal(6,2) DEFAULT NULL COMMENT 'Informar quando disponibilizar um desconto.',
  `valor_final` decimal(6,2) UNSIGNED ZEROFILL NOT NULL COMMENT 'Inserir o valor final.\nEX: Caso tenha que fazer hora extra, ou se for dado algum desconto para o cliente.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_ordem_de_servico_orcamentos1_idx` (`orcamentos_id`),
  KEY `fk_ordem_de_servico_funcionarios1_idx` (`funcionarios_matricula`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ordens_de_servicos`
--

INSERT INTO `ordens_de_servicos` (`id`, `tipo_de_manutencao`, `km_atual`, `data_cadastro`, `data_conclusao`, `data_previsao`, `status`, `orcamentos_id`, `funcionarios_matricula`, `desconto`, `valor_final`) VALUES
(0000000002, 1, 110520, '2021-05-09', '2021-05-09', '2021-05-09', 1, 0000000001, 001, '0.00', '0224.74'),
(0000000003, 1, 100000, '2021-05-30', '0000-00-00', '2021-06-15', 0, 0000000003, 002, '0.00', '0000.00');

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
  ADD CONSTRAINT `fk_ordem_de_servico_funcionarios1` FOREIGN KEY (`funcionarios_matricula`) REFERENCES `funcionarios` (`matricula`),
  ADD CONSTRAINT `fk_ordem_de_servico_orcamentos1` FOREIGN KEY (`orcamentos_id`) REFERENCES `orcamentos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
