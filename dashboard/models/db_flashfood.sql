/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `db_flashfood` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_flashfood`;

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `special_price` float(7,2) NOT NULL,
  `price` float(7,2) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`product_id`) USING BTREE,
  KEY `FK_product_product_category` (`category_id`),
  CONSTRAINT `FK_product_product_category` FOREIGN KEY (`category_id`) REFERENCES `product_category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `product` (`product_id`, `category_id`, `name`, `banner`, `description`, `special_price`, `price`, `slug`, `status`, `updated_at`, `created_at`) VALUES
	(4, 1, 'Sorvete Ovomaltine', '4.jpg', 'O melhor Sorvete do Mundo', 23.00, 32.00, 'sorvete-ovomaltine', 1, '2022-09-17 18:42:27', '2022-09-17 18:42:27'),
	(6, 3, 'Batata Frita', '6.jpg', 'Melhor Batata Frita do Mundo', 32.32, 23.00, 'batata-frita', 1, '2022-09-17 21:56:29', '2022-09-17 21:56:29'),
	(12, 4, 'Coca-Cola', '12.jpg', 'Melhor Coca-Cola da Cidade', 4.99, 5.99, 'coca-cola', 0, '2022-09-17 23:22:23', '2022-09-17 23:22:23'),
	(13, 2, 'Hamburguer Maneiro', '13.jpg', 'Melhor Hamburguer da Cidade', 18.99, 23.99, 'hamburguer-maneiro', 1, '2022-09-17 23:30:10', '2022-09-17 23:30:10');

CREATE TABLE IF NOT EXISTS `product_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `product_category` (`category_id`, `name`, `slug`, `status`, `updated_at`, `created_at`) VALUES
	(1, 'Sorvete', 'sorvete', 1, '2022-09-17 17:02:47', '2022-09-17 17:02:47'),
	(2, 'Hamburguer', 'hamburguer', 1, '2022-09-17 17:07:24', '2022-09-17 17:07:24'),
	(3, 'Salgado', 'salgado', 1, '2022-09-17 21:42:04', '2022-09-17 21:42:04'),
	(4, 'Bebidas', 'bebidas', 1, '2022-09-17 23:17:37', '2022-09-17 23:17:37');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;