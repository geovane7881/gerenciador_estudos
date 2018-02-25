-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.26-MariaDB-0+deb9u1 - Debian 9.1
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table meu_gerenciador.materias
CREATE TABLE IF NOT EXISTS `materias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordem` int(11) NOT NULL,
  `qtd_pomodoros` int(1) NOT NULL DEFAULT '4',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `pomodoros_estudados` int(1) unsigned zerofill NOT NULL DEFAULT '0',
  `nome` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table meu_gerenciador.materias: ~5 rows (approximately)
/*!40000 ALTER TABLE `materias` DISABLE KEYS */;
INSERT INTO `materias` (`id`, `ordem`, `qtd_pomodoros`, `status`, `pomodoros_estudados`, `nome`) VALUES
	(1, 0, 4, 0, 0, 'Front End'),
	(2, 1, 4, 0, 0, 'materia 1'),
	(3, 2, 4, 0, 0, 'extra'),
	(4, 3, 4, 1, 2, 'back end'),
	(5, 4, 4, 0, 0, 'materia 2');
/*!40000 ALTER TABLE `materias` ENABLE KEYS */;

-- Dumping structure for table meu_gerenciador.topicos
CREATE TABLE IF NOT EXISTS `topicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_materia` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `links` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table meu_gerenciador.topicos: ~2 rows (approximately)
/*!40000 ALTER TABLE `topicos` DISABLE KEYS */;
INSERT INTO `topicos` (`id`, `id_materia`, `nome`, `links`) VALUES
	(19, 1, 'Topico', '{"link" : "http://sitequalquer.com"}'),
	(20, 2, 'Topico', '{"link" : "http://sitequalquer.com"}'),
	(23, 5, 'Topico', '{"link" : "http://sitequalquer.com"}'),
	(25, 3, 'Livro de Matematica', '{"link do livro" : "http://mtm.ufsc.br/~will/disciplinas/20161/mtm5103/mtmbasica.pdf"}'),
	(26, 3, 'Outro site', '{"link do site" : "http://www.gabaritoapostila.com/p/index.html"}'),
	(27, 4, 'Links da apostila', '{"link" : "http://mtm.ufsc.br/~will/disciplinas/20161/mtm5103/mtmbasica.pdf"}');
/*!40000 ALTER TABLE `topicos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
