-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Jun-2020 às 00:40
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `testing`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_user_comments`
--

CREATE TABLE `tbl_user_comments` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `create_at_timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_user_comments`
--

INSERT INTO `tbl_user_comments` (`id`, `username`, `message`, `create_at_timestamp`) VALUES
(10, 'lara', 'dddd', '0000-00-00 00:00:00'),
(11, 'ddd', 'ddd', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `testing`
--

CREATE TABLE `testing` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_sender_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `testing`
--

INSERT INTO `testing` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`) VALUES
(12, 0, 'ola COnsegui', 'Lara Ribeiro', '2020-06-17 21:46:27'),
(14, 0, 'rrr', 't5', '2020-06-17 22:38:49'),
(15, 14, 'rrr', 'rrr', '2020-06-17 22:38:54');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbl_user_comments`
--
ALTER TABLE `tbl_user_comments`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `testing`
--
ALTER TABLE `testing`
  ADD PRIMARY KEY (`comment_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_user_comments`
--
ALTER TABLE `tbl_user_comments`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `testing`
--
ALTER TABLE `testing`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
