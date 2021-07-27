-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 27-Jul-2021 às 20:38
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
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL COMMENT 'Nome do Cargo.',
  `descricao` varchar(100) NOT NULL COMMENT 'Descrição do cargo.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`id`, `nome`, `descricao`) VALUES
(1, 'Administrador', 'administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carros`
--

DROP TABLE IF EXISTS `carros`;
CREATE TABLE IF NOT EXISTS `carros` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `placa` varchar(7) NOT NULL COMMENT 'Informar Placa do Carro.',
  `renavam` bigint DEFAULT NULL COMMENT 'Informar Renavam do Carro.\n',
  `marca` varchar(50) NOT NULL COMMENT 'Será insirida a Marca do Carro.\nEX: Fiat',
  `modelo` varchar(45) NOT NULL COMMENT 'Será inserido o nome do modelo:\nEX: Uno',
  `ano_modelo` int NOT NULL COMMENT 'Será inserido o ano do modelo:\nEX: 2013',
  `ano_fabricado` int NOT NULL COMMENT 'Será inserido o ano fabricado do carro:\nEX: 2012',
  PRIMARY KEY (`id`),
  UNIQUE KEY `placa_UNIQUE` (`placa`),
  UNIQUE KEY `renavam_UNIQUE` (`renavam`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `cpf` bigint UNSIGNED DEFAULT NULL COMMENT 'Informar CPF do cliente.',
  `cnpj` bigint UNSIGNED DEFAULT NULL COMMENT 'Informar CNPJ caso o cliente seja uma empresa.',
  `nome` varchar(250) NOT NULL COMMENT 'Informar o nome do cliente.\n',
  `data_nascimento` date DEFAULT NULL COMMENT 'Informar a data de nascimento do cliente.',
  `telefone` bigint UNSIGNED NOT NULL COMMENT 'Informar telefone de contato do cliente.',
  `email` varchar(250) DEFAULT NULL COMMENT 'Informar e-mail de contato do cliente',
  `data_cadastro` date NOT NULL COMMENT 'Campo deverá ser preenchido automaticamente.',
  `logradouro` varchar(150) NOT NULL COMMENT 'Informar o logradouro.\nEx: Avenida, Rua, etc...\n',
  `bairro` varchar(100) NOT NULL COMMENT 'Informar bairro do cliente',
  `numero_logradouro` int DEFAULT NULL COMMENT 'Informar numero da casa ou apartamento do cliente.',
  `complemento_logradouro` varchar(100) DEFAULT NULL COMMENT 'Informar complemento do endereço do cliente.\nEx:Proximo ao Senai Norte I.',
  `municipio` varchar(100) NOT NULL COMMENT 'Informar o municipio que do Cliente.\nEx: Joinville',
  `estado` char(2) NOT NULL COMMENT 'Será Informado o Estado do cliente.\nEx: SC, PR....',
  `cep` int DEFAULT NULL COMMENT 'Informar o CEP do CLiente.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  UNIQUE KEY `cnpj_UNIQUE` (`cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `matricula` tinyint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL COMMENT 'Informar nome do funcionario.',
  `cpf` bigint UNSIGNED NOT NULL COMMENT 'Informar CPF do funcionario.',
  `telefone_contato` bigint UNSIGNED NOT NULL COMMENT 'Telefone para contato do funcionario.',
  `senha` varchar(45) NOT NULL COMMENT 'Senha do sistema',
  `login` varchar(45) NOT NULL COMMENT 'Login do funcionario no sistema',
  `cargos_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`matricula`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  KEY `fk_funcionarios_cargos1_idx` (`cargos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`matricula`, `nome`, `cpf`, `telefone_contato`, `senha`, `login`, `cargos_id`) VALUES
(1, 'Admin', 50699428084, 47998803221, '202cb962ac59075b964b07152d234b70', 'adm', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamentos`
--

DROP TABLE IF EXISTS `orcamentos`;
CREATE TABLE IF NOT EXISTS `orcamentos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao_produtos` text NOT NULL COMMENT 'Informar a descrição dos produtos que serão vendidos.\nEX: Amortecedor gol G5 - R$70,00 / Coxin Gol G5 - R$ 65,00',
  `valor_total_produtos` decimal(8,2) NOT NULL COMMENT 'Informar o valor total dos produtos que serão vendidos.',
  `descricao_servicos` text NOT NULL COMMENT 'Descrição dos serviços que serão prestados.\nEX: Troca de amortecedor - R$50\n',
  `valor_total_servicos` decimal(8,2) NOT NULL COMMENT 'Informar o valor total dos serviços que serão prestados.',
  `data` date NOT NULL COMMENT 'Data que foi gerado o orçamento.\n',
  `status` tinyint NOT NULL COMMENT '1 - Aprovado\n2- Não Aprovado\n3 - Aguardando aprovação',
  `tipoManutencao` tinyint NOT NULL COMMENT 'Informa o tipo de serviço que está sendo realizado.\n\n1- Manutenção Corretiva;\n2- Manutenção Preventiva;',
  `carros_id` int UNSIGNED NOT NULL,
  `clientes_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orcamentos_carros1_idx` (`carros_id`),
  KEY `fk_orcamentos_clientes1_idx` (`clientes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordens_de_servicos`
--

DROP TABLE IF EXISTS `ordens_de_servicos`;
CREATE TABLE IF NOT EXISTS `ordens_de_servicos` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `km_atual` bigint(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'Informar quantos KM o carro chegou na Oficina.',
  `data_cadastro` date NOT NULL COMMENT 'Data de cadastro da O.S será feita automaticamente pelo sistema.',
  `data_conclusao` date DEFAULT NULL COMMENT 'Informar a data que foi concluido a O.S.',
  `data_previsao` date NOT NULL COMMENT 'Informar a data que está prevista a conclusão do serviço.',
  `status` tinyint NOT NULL COMMENT '1 - Em Aberto\n2 - Concluida\n3 - Atrasada',
  `valor_final` decimal(8,2) NOT NULL COMMENT 'Inserir o valor final.\nEX: Caso tenha que fazer hora extra, ou se for dado algum desconto para o cliente.',
  `funcionarios_matricula` tinyint UNSIGNED NOT NULL,
  `orcamentos_id` int NOT NULL,
  `informacoes_adicionais` tinytext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_ordens_de_servicos_funcionarios1_idx` (`funcionarios_matricula`),
  KEY `fk_ordens_de_servicos_orcamentos1_idx` (`orcamentos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
