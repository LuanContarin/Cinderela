-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Nov-2019 às 18:12
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinderela`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `descricao` varchar(60) NOT NULL,
  `preco` double NOT NULL,
  `desconto` double DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `modificado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `imagem`, `nome`, `descricao`, `preco`, `desconto`, `quantidade`, `modificado`) VALUES
(1, '1.jpg', 'Griffe Salto Alto - Off White.', 'Calçado feminino com bico e salto fino desfrutando de latera', 99, 8, 42, '2019-11-26 21:05:16'),
(2, '2.jpg', 'Black Salto Alto - Tachas/Spikes.', 'Calçado feminino com bico largo e salto de espessura média. ', 179, 10, 22, '2019-11-26 21:07:57'),
(3, '3.jpg', 'Black AMII Tamanco Antiderrapante;', 'Calçado feminino com alto revestimento. Plataforma com invól', 20, 0, 10, '2019-11-26 21:09:10'),
(4, '4.jpg', 'Slim Chinelo Havaiana;', 'Chinelo Havaiana feminino com design estilo tropical;', 49, 8, 12, '2019-11-26 21:10:15'),
(5, '5.jpg', 'Black Bota Feminina;', 'Bota feminina com calce facilitado por zíper e cardaço produ', 199, 10, 110, '2019-11-26 21:10:52'),
(8, '6.jpg', 'Brown Dakota Bota Feminina;', 'Bota feminina confeccionada em materiais alternativos de des', 175, 0, 50, '2019-11-26 21:15:42'),
(9, '7.jpg', 'Pink Moleca Alpargata feminina', 'Alpargata feminina confortável e leve de versatilidade areja', 60, 10, 30, '2019-11-26 21:17:11'),
(10, '8.jpg', 'White CR Shoes Sapatênis', 'Sapatênis &quot;CR shoes&quot; de couro ecológico e sola bra', 66, 10, 85, '2019-11-26 21:18:10'),
(11, '9.jpg', 'Torani Tênis Feminino com Glitter', 'Tênis com acabamento de glitter forrado em têxtil;', 99, 10, 100, '2019-11-26 21:18:33'),
(12, '10.jpg', 'Chinelo Havaiana Floral', 'Chinelo feminino com estampa delicada floral revestida de bo', 30, 0, 30, '2019-11-26 21:19:27'),
(17, '11.jpg', 'Nobuck Tresse Sapatilha Feminina', 'Sapatilha feminina emborrachada com detalhes confeccionados ', 30, 8, 70, '2019-11-26 21:25:00'),
(18, '12.jpg', 'Tonelli Tamanco Beige', 'Tonelli Tamanco Beige com visual moderno e acabemento Croco;', 199, 10, 210, '2019-11-26 21:25:33'),
(19, '13.jpg', 'Dhaffy Bolsa Feminina', 'Bolsa feminina contendo 2 bolsos com zíperes. Metais banhado', 99, 10, 97, '2019-11-26 21:26:10'),
(20, '14.jpg', 'Black Cinto Feminino', 'Cinto confeccionado em couro sintético com detalhes em fivel', 15, 0, 20, '2019-11-26 21:26:41'),
(23, '15.jpg', 'Leffa Plush Pantufa Feminina', 'Pantufa feminina confeccionada em têxtil plush. Modelo de bi', 59, 10, 17, '2019-11-26 21:29:01'),
(24, '16.jpg', 'Black Pantufa Feminina em lã sintética', 'Pantufa forrada em lã sintética e detalhes em camurça;', 199, 10, 55, '2019-11-26 21:29:42'),
(25, '17.jpg', 'Ridge Luz da Lua Cinto Feminino', 'Cinto feminino de couro legítimo e fivela totalmente dourada', 399, 10, 76, '2019-11-26 21:30:12'),
(26, '18.jpg', 'Kalete Rasteirinha Beige', 'Rasteirinha Kalete de acabamento personalizado em Beige;', 40, 8, 89, '2019-11-26 21:30:43'),
(27, '19.jpg', 'Gold Colar feminino', 'Colar feminino banhado a ouro 18k;', 150, 10, 90, '2019-11-26 21:31:21'),
(28, '20.jpg', 'Mule Épico Feminina', 'Mule épico com lateral sintetizada em verniz e material inte', 39, 0, 23, '2019-11-26 21:31:52'),
(29, '21.jpg', 'Colar feminino banhado a prata;', 'Colar feminino contendo corações entrelaçados banhados a pra', 120, 10, 200, '2019-11-26 21:32:20'),
(30, '22.jpg', 'Black Bracelete Feminino', 'Bracelete feminino confeccionado em couro contendo tachas e ', 99, 10, 299, '2019-11-26 21:32:49'),
(31, '23.jpg', 'Penalty White Meia Feminina', 'Meia feminina Penalty White com detalhes em rosa;', 9, 0, 118, '2019-11-26 21:33:27'),
(32, '24.jpg', 'Pink Meia Rikam Feminina', 'Meia feminina com revestimento em fibra poliamida de tecido ', 4, 0, 220, '2019-11-26 21:34:18'),
(33, '25.jpg', 'Tênis feminino Converse/Nike', 'Tênis feminino estilo All Star;', 199, 10, 96, '2019-11-26 21:34:46'),
(34, '26.jpg', 'Relógio Feminino 5ATM Champion', 'Relógio analógico com pulseira texturizada com ajuste por fe', 399, 10, 20, '2019-11-26 21:35:50'),
(35, '27.jpg', 'Relógio Feminino Ouro Rosé', 'Relógio Feminino Ouro Rosé com resistência a água;', 167, 8, 15, '2019-11-26 21:36:28'),
(36, '28.jpg', 'Pulseira Coração Dourada', 'Pulseira feminina com metal de revestimento em verniz italia', 35, 0, 100, '2019-11-26 21:36:59'),
(37, '29.jpg', 'Pulseira Feminina de Aço', 'Pulseira feminina de aço ajustável com detalhes dourados;', 14, 0, 32, '2019-11-26 21:37:24'),
(38, '30.jpg', 'Sapatilha Peep Toe Vizzano', 'Sapatilha feminino confeccionado em verniz Lezard com tira p', 120, 10, 19, '2019-11-26 21:38:01'),
(39, '31.jpg', 'Sapatilha PEEP Toe', 'Sapatilha feminino com coloração Nude e material externo rev', 159, 8, 64, '2019-11-26 21:38:48'),
(42, '32.jpg', 'Sapatilha Loubotin Prata', 'Sapato feminino com palmilha dourada e revestimento prata;', 399, 10, 15, '2019-11-26 21:40:41'),
(43, '33.jpg', 'Bolsa Feminina Lorena Média Victoria Lor', 'Bolsa feminina de cor preta e detalhes em dourado. Bolsa bor', 109, 10, 28, '2019-11-26 21:41:22'),
(44, '34.jpg', 'Chinelo Moleca', 'Chinelo Feminino Moleca cor preta;', 50, 8, 110, '2019-11-26 21:41:51'),
(45, '35.jpg', 'White-Black Bot feminina', 'Bota feminina de calce leve e extremamente macio para os pés', 120, 10, 15, '2019-11-26 21:42:26'),
(46, '36.jpg', 'Carteira Feminina Média', 'Carteira feminina média em couro sintético com doze divisóri', 100, 10, 87, '2019-11-26 21:42:55'),
(47, '37.jpg', 'Carteira Feminina de Couro com Ponteira', 'Carteira feminina com cinco porta cartões, porta notas e por', 90, 5, 77, '2019-11-26 21:43:30'),
(48, '38.jpg', 'Chinelo Feminino Modare', 'Chinelo feminino mode UltraConforto NoBuck com alta absorção', 99, 8, 23, '2019-11-26 21:44:08'),
(49, '39.jpg', 'Tamanco Feminino Strass', 'Tamanco feminino confeccionado em couro legítimo solado com ', 250, 10, 99, '2019-11-26 21:44:39'),
(50, '40.jpg', 'Sandália Feminina Mariotta', 'Sandália feminina confeccionada em material sintético com ac', 150, 8, 5, '2019-11-26 21:45:20'),
(52, 'CIND1.jpg', 'Melissa Atena', 'MATERIAL\r\nExterno: Brilhosa\r\nInterno: PVC\r\nSolado: PVC\r\nPESO', 189, 10, 20, '2019-11-27 16:43:45'),
(53, 'CIND2.jpg', 'Melissa Atena', 'MATERIAL\r\nExterno: Brilhosa\r\nInterno: PVC\r\nSolado: PVC\r\nPESO', 189, 10, 20, '2019-11-27 17:00:58'),
(54, 'CIND3.jpg', 'Melissa Atena', 'MATERIAL\r\nExterno: Brilhosa\r\nInterno: PVC\r\nSolado: PVC\r\nPESO', 189, 10, 20, '2019-11-27 17:01:19'),
(55, 'CIND4.jpg', 'Melissa Atena', 'MATERIAL\r\nExterno: Brilhosa\r\nInterno: PVC\r\nSolado: PVC\r\nPESO', 189, 10, 20, '2019-11-27 17:01:44'),
(56, 'CIND5.jpg', 'Melissa Atena', 'MATERIAL\r\nExterno: Brilhosa\r\nInterno: PVC\r\nSolado: PVC\r\nPESO', 189, 10, 20, '2019-11-27 17:02:06'),
(57, 'CIND6.jpg', 'Melissa Lip Platform', 'MATERIAL\r\nExterno: Brilhosa\r\nInterno: PVC\r\nSolado: PVC\r\nPESO', 139, 10, 22, '2019-11-27 17:05:04'),
(60, 'CIND7.jpg', 'Melissa Lip Platform', 'MATERIAL\r\nExterno: Brilhosa\r\nInterno: PVC\r\nSolado: PVC\r\nPESO', 139, 10, 10, '2019-11-27 17:07:16'),
(63, 'CIND8.jpg', 'Melissa Lip Platform', 'MATERIAL\r\nExterno: Brilhosa\r\nInterno: PVC\r\nSolado: PVC\r\nPESO', 139, 15, 8, '2019-11-27 17:11:12'),
(64, 'CIND9.jpg', 'Melissa Lip Platform', 'MATERIAL\r\nExterno: Brilhosa\r\nInterno: PVC\r\nSolado: PVC\r\nPESO', 139, 20, 30, '2019-11-27 17:11:48'),
(65, 'CIND10.jpg', 'Melissa Mellow', 'MATERIAL\r\nExterno:\r\nInterno: PVC\r\nSolado: PVC\r\nPESO\r\nAprox. ', 179, 15, 22, '2019-11-27 17:13:35'),
(66, 'CIND11.jpg', 'Beach Slide', 'MATERIAL\r\nExterno: Brilhosa ou Fosca\r\nInterno: PVC\r\nSolado: ', 99, 10, 30, '2019-11-27 17:15:04'),
(67, 'CIND12.jpg', 'Beach Slide', 'MATERIAL\r\nExterno: Brilhosa ou Fosca\r\nInterno: PVC\r\nSolado: ', 99, 10, 20, '2019-11-27 17:16:27'),
(68, 'CIND13.jpg', 'Beach Slide', 'MATERIAL\r\nExterno: Brilhosa ou Fosca\r\nInterno: PVC\r\nSolado: ', 99, 10, 10, '2019-11-27 17:21:49'),
(69, 'CIND14.jpg', 'Beach Slide', 'MATERIAL\r\nExterno: Brilhosa ou Fosca\r\nInterno: PVC\r\nSolado: ', 99, 10, 7, '2019-11-27 17:23:27'),
(71, 'CIND15.jpg', 'Ulitsa Sneaker', 'MATERIAL\r\nExterno: Brilhosa ou Glitter\r\nInterno: PVC\r\nSolado', 159, 20, 11, '2019-11-27 17:26:54'),
(72, 'CIND16.jpg', 'Ulitsa Sneaker', 'MATERIAL\r\nExterno: Brilhosa ou Glitter\r\nInterno: PVC\r\nSolado', 159, 10, 30, '2019-11-27 17:27:52'),
(73, 'CIND17.jpg', 'Ulitsa Sneaker', 'MATERIAL\r\nExterno: Brilhosa ou Glitter\r\nInterno: PVC\r\nSolado', 159, 10, 10, '2019-11-27 17:28:45'),
(74, 'CIND18.jpg', 'Ulitsa Sneaker', 'MATERIAL\r\nExterno: Brilhosa ou Glitter\r\nInterno: PVC\r\nSolado', 159, 10, 8, '2019-11-27 17:32:50'),
(75, 'CIND19.jpg', 'Ulitsa Sneaker', 'MATERIAL\r\nExterno: Brilhosa ou Glitter\r\nInterno: PVC\r\nSolado', 159, 10, 10, '2019-11-27 17:34:05'),
(76, 'CIND20.jpg', 'Ulitsa Sneaker', 'MATERIAL\r\nExterno: Brilhosa ou Glitter\r\nInterno: PVC\r\nSolado', 159, 10, 20, '2019-11-27 17:34:52'),
(77, 'CIND21.jpg', 'Possession', 'MATERIAL\r\nInterno: PVC\r\nSolado: PVC\r\nExterno: Brilhosa ou Fo', 109, 10, 4, '2019-11-27 17:35:54'),
(78, 'CIND22.jpg', 'Possession', 'MATERIAL\r\nInterno: PVC\r\nSolado: PVC\r\nExterno: Brilhosa ou Fo', 109, 20, 7, '2019-11-27 17:38:40'),
(79, 'CIND23.jpg', 'Possession', 'MATERIAL\r\nInterno: PVC\r\nSolado: PVC\r\nExterno: Brilhosa ou Fo', 109, 10, 20, '2019-11-28 00:20:43'),
(80, 'CIND24.jpg', 'Possession', 'MATERIAL\r\nInterno: PVC\r\nSolado: PVC\r\nExterno: Brilhosa ou Fo', 109, 10, 7, '2019-11-28 00:22:33'),
(81, 'CIND25.jpg', 'Possession', 'MATERIAL\r\nInterno: PVC\r\nSolado: PVC\r\nExterno: Brilhosa ou Fo', 109, 10, 8, '2019-11-28 00:23:50'),
(82, 'CIND27.jpg', 'Possession', 'MATERIAL\r\nInterno: PVC\r\nSolado: PVC\r\nExterno: Brilhosa ou Fo', 109, 10, 7, '2019-11-28 00:24:27'),
(83, 'CIND28.jpg', 'Mellow', 'MATERIAL\r\nInterno: PVC\r\nSolado: PVC\r\nExterno: Brilhosa ou Fo', 179, 20, 22, '2019-11-28 00:26:00'),
(84, 'CIND29.jpg', 'Mellow', 'MATERIAL\r\nExterno: Brilhosa\r\nInterno: PVC\r\nSolado: PVC\r\nPESO', 179, 10, 10, '2019-11-28 00:27:13'),
(85, 'CIND30.jpg', 'Mellow', 'MATERIAL\r\nExterno: Brilhosa\r\nInterno: PVC\r\nSolado: PVC\r\nPESO', 179, 10, 20, '2019-11-28 00:27:53'),
(86, 'CIND31.jpg', 'Mellow', 'MATERIAL\r\nExterno: Brilhosa\r\nInterno: PVC\r\nSolado: PVC\r\nPESO', 179, 10, 10, '2019-11-28 00:28:30'),
(87, 'CIND32.jpg', 'Ulitsa Sneaker ', 'MATERIAL\r\nExterno: Fosca\r\nInterno: PVC\r\nSolado: PVC\r\nPESO\r\nA', 189, 10, 10, '2019-11-28 00:30:08'),
(88, 'CIND33.jpg', 'Peace Heel', 'MATERIAL\r\nExterno: Brilhosa ou Fosca\r\nInterno: PVC\r\nSolado: ', 189, 20, 30, '2019-11-28 00:31:21'),
(89, 'CIND37.jpg', 'Mini Melissa Bag Bear', 'Bolsa de medio porte\r\nMATERIAL\r\nExterno: Brilhosa\r\nInterno: ', 199, 35, 10, '2019-11-28 00:37:31'),
(90, 'CIND38.jpg', 'Mini Melissa Bag Bear', 'Bolsa de medio porte\r\nMATERIAL\r\nExterno: Brilhosa\r\nInterno: ', 199, 10, 10, '2019-11-28 00:39:24'),
(91, 'CIND39.jpg', 'Melissa Meias', 'Meia\r\nMATERIAL\r\nInterno: PVC\r\nSolado: PVC\r\nPESO\r\nAprox. 0.03', 31, 20, 8, '2019-11-28 00:41:34'),
(92, 'CIND40.jpg', 'Melissa Meias', 'Meia\r\nMATERIAL\r\nInterno: PVC\r\nSolado: PVC\r\nPESO\r\nAprox. 0.03', 31, 20, 8, '2019-11-28 00:42:17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'andre', 'admin@admin.com', '25d55ad283aa400af464c76d713c07ad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
