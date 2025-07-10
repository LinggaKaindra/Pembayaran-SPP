/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `academic_years` (
  `id` int NOT NULL AUTO_INCREMENT,
  `year` varchar(10) NOT NULL,
  `semester` enum('1','2') NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `payment_methods` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ukt_id` int NOT NULL,
  `method_id` int NOT NULL,
  `paid_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `amount_paid` decimal(15,2) NOT NULL,
  `status` enum('pending','confirmed','failed') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ukt_id` (`ukt_id`),
  KEY `method_id` (`method_id`),
  CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`ukt_id`) REFERENCES `ukt` (`id`),
  CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`method_id`) REFERENCES `payment_methods` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `programs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nim` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `program_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nim` (`nim`),
  KEY `program_id` (`program_id`),
  CONSTRAINT `students_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `ukt` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `academic_year_id` int NOT NULL,
  `amount` int NOT NULL,
  `status` enum('unpaid','paid') DEFAULT 'unpaid',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `academic_year_id` (`academic_year_id`),
  CONSTRAINT `ukt_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  CONSTRAINT `ukt_ibfk_2` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_years` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('petugas','admin') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `academic_years` (`id`, `year`, `semester`, `status`, `created_at`, `updated_at`) VALUES
(1, '2023', '1', 'active', '2024-12-27 02:03:53', '2024-12-27 02:03:53');
INSERT INTO `academic_years` (`id`, `year`, `semester`, `status`, `created_at`, `updated_at`) VALUES
(2, '2023', '2', 'active', '2024-12-27 02:04:00', '2024-12-27 02:04:00');
INSERT INTO `academic_years` (`id`, `year`, `semester`, `status`, `created_at`, `updated_at`) VALUES
(3, '2024', '1', 'active', '2024-12-27 02:04:06', '2024-12-27 02:04:06');
INSERT INTO `academic_years` (`id`, `year`, `semester`, `status`, `created_at`, `updated_at`) VALUES
(4, '2024', '2', 'active', '2024-12-27 02:04:12', '2024-12-27 02:04:12'),
(5, '2025', '1', 'active', '2024-12-27 02:04:23', '2024-12-27 02:04:23'),
(6, '2025', '2', 'active', '2024-12-27 02:04:31', '2024-12-27 02:04:31'),
(7, '2026', '1', 'active', '2024-12-27 02:04:42', '2024-12-27 02:04:42'),
(9, '2026', '2', 'active', '2024-12-27 02:05:57', '2024-12-27 02:05:57'),
(10, '2027', '1', 'active', '2024-12-27 03:58:13', '2024-12-27 03:58:13');

INSERT INTO `payment_methods` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'M-Banking BRI', '2024-12-27 02:26:06', '2024-12-27 02:26:06');
INSERT INTO `payment_methods` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'M-Banking BCA', '2024-12-27 02:26:14', '2024-12-27 02:26:14');
INSERT INTO `payment_methods` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'BANK BPD BALI', '2024-12-27 02:26:20', '2024-12-27 02:27:47');

INSERT INTO `payments` (`id`, `ukt_id`, `method_id`, `paid_date`, `amount_paid`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(19, 5, 2, '2024-12-26 19:49:41', '1500000.00', 'failed', '2024-12-27 03:49:41', '2024-12-27 03:50:42', NULL);
INSERT INTO `payments` (`id`, `ukt_id`, `method_id`, `paid_date`, `amount_paid`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(20, 1, 2, '2024-12-26 19:50:24', '1500000.00', 'failed', '2024-12-27 03:50:24', '2024-12-27 03:50:58', NULL);
INSERT INTO `payments` (`id`, `ukt_id`, `method_id`, `paid_date`, `amount_paid`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(21, 6, 3, '2024-12-26 20:05:11', '1000000.00', 'confirmed', '2024-12-27 04:05:11', '2024-12-27 04:05:11', NULL);
INSERT INTO `payments` (`id`, `ukt_id`, `method_id`, `paid_date`, `amount_paid`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(22, 7, 1, '2024-12-26 20:09:44', '1500000.00', 'failed', '2024-12-27 04:09:44', '2024-12-27 04:14:23', 3),
(25, 11, 1, '2025-01-10 18:05:43', '123.00', 'confirmed', '2025-01-11 02:05:43', '2025-01-11 02:05:43', 3),
(26, 12, 3, '2025-01-11 01:11:11', '12000000.00', 'confirmed', '2025-01-11 09:11:11', '2025-01-11 09:11:11', 1);

INSERT INTO `programs` (`id`, `name`, `faculty`, `created_at`, `updated_at`) VALUES
(1, 'SI', 'Sistem Informasi', '2024-12-27 01:51:35', '2024-12-27 02:22:46');
INSERT INTO `programs` (`id`, `name`, `faculty`, `created_at`, `updated_at`) VALUES
(2, 'TI', 'Teknologi Informasi', '2024-12-27 01:51:53', '2024-12-27 02:22:46');
INSERT INTO `programs` (`id`, `name`, `faculty`, `created_at`, `updated_at`) VALUES
(3, 'MB', 'Manajemen Bisnis', '2024-12-27 01:52:03', '2024-12-27 02:22:46');
INSERT INTO `programs` (`id`, `name`, `faculty`, `created_at`, `updated_at`) VALUES
(4, 'SK', 'Sistem Komputer', '2024-12-27 01:52:21', '2024-12-27 02:22:46'),
(5, 'BD', 'Bisnis Digital', '2024-12-27 01:52:34', '2024-12-27 02:22:46');

INSERT INTO `students` (`id`, `nim`, `name`, `phone`, `program_id`, `created_at`, `updated_at`, `email`, `password`) VALUES
(1, '230030001', 'I Putu John Doe Jr', '081276125712', 1, '2024-12-27 01:54:26', '2024-12-27 04:17:16', '230030001@gmail.com', '$2y$10$40WEbiTvN2S3w2l49JDrPe/bICCm9VAdLjYDU9qi3UFJ4vuYc1h66');
INSERT INTO `students` (`id`, `nim`, `name`, `phone`, `program_id`, `created_at`, `updated_at`, `email`, `password`) VALUES
(2, '230030002', 'I Made Lorem', '0812541287', 1, '2024-12-27 01:59:30', '2024-12-27 04:17:20', '230030002@gmail.com', '$2y$10$ksRO35/nyrE67O9FltShseuLC1EIvRFuP3Uigoy/CAnkZEa8jEH/W');
INSERT INTO `students` (`id`, `nim`, `name`, `phone`, `program_id`, `created_at`, `updated_at`, `email`, `password`) VALUES
(3, '230030003', 'Komang Ipsum', '081287182', 1, '2024-12-27 04:01:37', '2024-12-27 04:17:23', '230030003@gmail.com', '$2y$10$i7/zMMsK1geZdtMsMnfmr.7FX.nQS3TxZfZQiJMQmj0A8Szjce4w2');

INSERT INTO `ukt` (`id`, `student_id`, `academic_year_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 15000000, 'unpaid', '2024-12-27 02:08:15', '2025-01-11 01:29:30');
INSERT INTO `ukt` (`id`, `student_id`, `academic_year_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(3, 3, 9, 3000000, 'unpaid', '2024-12-27 02:22:02', '2025-01-11 02:05:14');
INSERT INTO `ukt` (`id`, `student_id`, `academic_year_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(4, 2, 2, 1500000, 'unpaid', '2024-12-27 02:23:26', '2024-12-27 03:36:43');
INSERT INTO `ukt` (`id`, `student_id`, `academic_year_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(5, 1, 2, 1500000, 'unpaid', '2024-12-27 02:24:29', '2024-12-27 03:50:42'),
(6, 3, 1, 1000000, 'unpaid', '2024-12-27 04:03:33', '2025-01-11 02:05:14'),
(7, 1, 2, 1000000, 'unpaid', '2024-12-27 04:03:43', '2024-12-27 04:13:44'),
(8, 1, 1, 15000000, 'unpaid', '2025-01-11 01:29:05', '2025-01-11 01:29:05'),
(11, 1, 1, 123, 'paid', '2025-01-11 01:55:52', '2025-01-11 02:05:43'),
(12, 3, 3, 12000000, 'paid', '2025-01-11 09:10:20', '2025-01-11 09:11:11');

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$CtXKMy.Z5yk0YI8wyLMuy.Nb9.e3HURja5z/L8xZSqnDeEI9km6Te', 'admin', '2024-12-27 01:05:15', '2024-12-27 01:05:40');
INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(3, 'petugas1', 'petugas1@gmail.com', '$2y$10$WPAWCFd8krABSn6beQGhz.IFFBfFgYYrcysfjBxv/BHUoP1zeG612', 'petugas', '2024-12-27 01:27:43', '2025-01-11 09:13:12');
INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(4, 'petugas 2', 'petugas2@gmail.com', '$2y$10$gTi4wMouaBVazKY1nvlcF.BaG/sPtYDohqM9KiLi2Wb5r7oA/qn8.', 'petugas', '2024-12-27 01:29:40', '2024-12-27 03:55:26');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;