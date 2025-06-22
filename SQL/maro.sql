-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2025 at 09:21 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maro`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_produk`
--

CREATE TABLE `foto_produk` (
  `id` bigint UNSIGNED NOT NULL,
  `produk_id` bigint UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `katagori`
--

CREATE TABLE `katagori` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_katagori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `katagori`
--

INSERT INTO `katagori` (`id`, `nama_katagori`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Cemilan');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_user_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_12_15_103255_create_katagori_table', 1),
(6, '2024_12_15_193950_create_produk_table', 1),
(7, '2024_12_17_015510_create_foto_produk_table', 1),
(8, '2025_05_05_104956_remove_biaya_jasa_from_produk_table', 1),
(9, '2025_05_11_221622_create_pesanans_table', 1),
(10, '2025_05_11_221623_create_pesanan_details_table', 1),
(11, '2025_05_13_204859_create_transaksi_table', 2),
(12, '2025_06_03_182215_create_carts_table', 3),
(13, '2025_06_04_121220_create_orders_table', 4),
(14, '2025_06_04_121221_create_order_items_table', 5),
(15, '2025_06_04_144935_create_order_items_table', 6),
(16, '2025_06_04_145415_create_orders_table', 7),
(17, '2025_06_04_145415_create_order_items_table', 8),
(18, '2025_06_08_195418_alter_payment_verified_column_in_orders_table', 9),
(19, '2025_06_08_195921_fix_payment_verified_data_before_alter', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_number` int NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `total_amount` decimal(10,2) NOT NULL,
  `status` enum('pending','processing','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'qris',
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `qris_reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_verified` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `table_number`, `customer_name`, `customer_phone`, `notes`, `total_amount`, `status`, `payment_method`, `payment_status`, `qris_reference`, `payment_proof`, `payment_verified`, `created_at`, `updated_at`) VALUES
(1, 'ORD-I2RWXRUXWN', 1, 'fadhil', '0812', NULL, 30000.00, 'pending', 'qris', 'rejected', 'QRIS-M9JJZTIJPD', 'payment_proofs/q5DXIjxDmEWfgNfyLaO1vTU0yDkd83t2BhFeO7cd.jpg', NULL, '2025-06-05 05:59:52', '2025-06-09 11:44:29'),
(2, 'ORD-B6SGS4RTJQ', 4, 'anggun', '123', NULL, 45000.00, 'pending', 'qris', 'rejected', 'QRIS-LPP0XEAX7B', 'payment_proofs/UcO9jeXsOoC5phg3tX4g8rJXCA2j6e0Yl1rvr2b4.jpg', NULL, '2025-06-05 06:22:11', '2025-06-09 11:44:24'),
(3, 'ORD-II90CGGTUQ', 10, 'jojo', '12345', NULL, 30000.00, 'pending', 'qris', 'paid', 'QRIS-HAXIPLUSLV', 'payment_proofs/xIgHHyy12dkri7aJJZdSbwPkC5ztqVazfMchBpBL.jpg', '2025-06-08 13:06:26', '2025-06-05 06:30:41', '2025-06-08 13:06:26'),
(4, 'ORD-LINWZSKVL4', 15, 'adnan', '08121212', NULL, 60000.00, 'pending', 'qris', 'paid', 'QRIS-KO6E4Y8DAP', 'payment_proofs/o1urKLwj04fO9Z2l0z9joldH49OizwvB72HA6rmG.jpg', '2025-06-08 13:06:20', '2025-06-05 06:34:32', '2025-06-08 13:06:20'),
(5, 'ORD-9STL1V2ED3', 18, 'faiz', '4444', NULL, 30000.00, 'pending', 'qris', 'paid', 'QRIS-VAKUOIOVIE', 'payment_proofs/XtnZnSeEhZG28Qa1ZJKBOKaKvyZ9UeSDMlMOUUgQ.jpg', '2025-06-08 13:06:13', '2025-06-05 07:41:46', '2025-06-08 13:06:13'),
(6, 'ORD-IETALDJ2NV', 3, 'kefas', '999', NULL, 30000.00, 'pending', 'qris', 'paid', 'QRIS-TR0UPJTLBI', 'payment_proofs/98aAadGjB8YeAvTTxw8kxSeoIeefq2rwLFIdivBC.jpg', '2025-06-08 13:06:08', '2025-06-05 08:59:23', '2025-06-08 13:06:08'),
(7, 'ORD-TOZAUZEZO8', 6, 'keyza', '3456', NULL, 60000.00, 'pending', 'qris', 'paid', 'QRIS-YKHHXVOQM5', 'payment_proofs/wkgwn7aJcGT7KHXa1wSlPkYKWzJ9aMKRgyenri1O.jpg', '2025-06-08 13:03:16', '2025-06-05 10:08:04', '2025-06-08 13:03:16'),
(8, 'ORD-RY8S5ZNKL3', 1, 'dhill', '0819123456', NULL, 30000.00, 'pending', 'qris', 'paid', 'QRIS-8XQYAZAQQG', 'payment_proofs/proof_1749272585_t0TzxF6l.jpg', '2025-06-08 13:01:58', '2025-06-07 05:03:05', '2025-06-08 13:01:58'),
(9, 'ORD-HW4QPFQUKJ', 20, 'dzakir', '0821123456', NULL, 45000.00, 'pending', 'qris', 'paid', 'QRIS-NE9LRCOXLE', 'payment_proofs/TZibxrzNxSr3QJfLXfUtyNRcC0revlZVqMKTcz60.jpg', '2025-06-08 13:38:02', '2025-06-08 13:37:20', '2025-06-08 13:38:02'),
(10, 'ORD-RBMNQMIRSO', 2, 'riyan', '081933', NULL, 60000.00, 'pending', 'qris', 'paid', 'QRIS-BYI8H8BBTQ', 'payment_proofs/qnHOAdt65a3bRwEo9mQqu4R2oQnmQlMZd2mya8oV.png', '2025-06-09 10:39:16', '2025-06-09 10:39:01', '2025-06-09 10:39:16'),
(11, 'ORD-BNSHQCXQEB', 1, 'dalfa', '11111111111', NULL, 15000.00, 'pending', 'qris', 'paid', 'QRIS-7BG20EOYPJ', 'payment_proofs/QQVpdVcNhpTpP781bWnQInEylUN0gOE1Ilf2w5wo.jpg', '2025-06-09 11:37:54', '2025-06-09 11:37:38', '2025-06-09 11:37:54'),
(12, 'ORD-MD8YUTPZYZ', 3, 'gugun', '11111111', NULL, 60000.00, 'pending', 'qris', 'paid', 'QRIS-LERUGQZ9CY', 'payment_proofs/DAmaxHSsf0QZOY2xhJTKi3ANNfjaCBa6UEomkuWI.jpg', '2025-06-09 11:43:25', '2025-06-09 11:42:56', '2025-06-09 11:43:25'),
(13, 'ORD-B1TI1R6G9W', 5, 'padil', '1111111111111111', NULL, 30000.00, 'pending', 'qris', 'paid', 'QRIS-8RHIIMFYUA', 'payment_proofs/9zMChMTLciS0lcM7XQg2aLiWG1mRVwV2Yx7qW9rZ.jpg', '2025-06-09 14:56:33', '2025-06-09 14:56:04', '2025-06-09 14:56:33'),
(14, 'ORD-8DRAJUBCJP', 12, 'rafif', '123', NULL, 15000.00, 'pending', 'qris', 'paid', 'QRIS-FUXWHRWAXT', 'payment_proofs/dyCDcB599QiCFuoUGc0hqlOhcCqRprRRtK0LZQk3.jpg', '2025-06-09 15:01:22', '2025-06-09 15:01:01', '2025-06-09 15:01:22'),
(15, 'ORD-PIAR4H7EUV', 1, 'adit', '081299517035', 'tidak pedas', 30000.00, 'pending', 'qris', 'paid', 'QRIS-LXT91KWS6R', 'payment_proofs/eJ8EJMqT29a7R15PpTLPaEjmXAJjlXk2NV8CbED4.jpg', '2025-06-10 06:53:09', '2025-06-10 06:52:34', '2025-06-10 06:53:09'),
(16, 'ORD-3UQGVGXF83', 1, 'anggun', '0881321123123', 'kopi gulanya dikit\r\nayamnya pedes banget dada montok', 45000.00, 'pending', 'qris', 'paid', 'QRIS-CL3LREFDYD', 'payment_proofs/eGH71XwbdH7AAMebbgzZZcgMgxkIdF6YZ2akMabR.png', '2025-06-12 06:55:54', '2025-06-12 06:41:42', '2025-06-12 06:55:54'),
(17, 'ORD-H4SFFWIV6V', 12, '111111111', '11111111111111111111', '1111', 45000.00, 'pending', 'qris', 'paid', 'QRIS-KK4HTY3W6H', 'payment_proofs/SWKmWkPfFWzHjaAe3H4uVdFe3gmkqV17tV3k0M8P.jpg', '2025-06-12 07:44:44', '2025-06-12 07:24:46', '2025-06-12 07:44:44'),
(18, 'ORD-Z6V9RMWNOZ', 3, 'aziz', '12345678899999', 'asin', 60000.00, 'pending', 'qris', 'paid', 'QRIS-CNG7PBGBM0', 'payment_proofs/B9HBMrJfMHKJiO3hwRNv1bjRiagMgQcPk4OYge5i.png', '2025-06-12 07:44:39', '2025-06-12 07:27:13', '2025-06-12 07:44:39'),
(19, 'ORD-X9SQYJDYCQ', 2, 'dadang', '12345678899999', 'asin', 30000.00, 'pending', 'qris', 'paid', 'QRIS-CYUAAFJETC', 'payment_proofs/uQeJnKn9YIvEejc6OZ0dlrjmk6f8Qx8dnAXhaXcq.jpg', '2025-06-12 07:44:31', '2025-06-12 07:43:30', '2025-06-12 07:44:31'),
(20, 'ORD-KCMEO3ULO7', 6, 'kefas', '08121213212121123123', 'low sugar', 15000.00, 'pending', 'qris', 'paid', 'QRIS-7EQYKKIY1D', 'payment_proofs/kPaitm33BK26mZwyNWASlBCEGH4rq9SEJKB1eluf.png', '2025-06-12 12:02:53', '2025-06-12 12:02:09', '2025-06-12 12:02:53'),
(21, 'ORD-QOV9SI3XME', 7, 'kefas', '08121213212121123123', 'qqqqqqqqq', 45000.00, 'pending', 'qris', 'paid', 'QRIS-NHINGHRMS6', 'payment_proofs/lRqwuphR0cGHppp6BpYAr4p0BPTY2yIjoQXOpTNH.png', '2025-06-12 12:56:41', '2025-06-12 12:55:28', '2025-06-12 12:56:41'),
(22, 'ORD-SI35SHHWQO', 1, 'paiz', '0896666666', NULL, 15000.00, 'pending', 'qris', 'pending_verification', 'QRIS-Q3P8MVCQF8', 'payment_proofs/iDnDAp6DQffgsd0OYCNI4OPMc4El4vmQiy9FCKhm.jpg', NULL, '2025-06-16 06:51:05', '2025-06-16 06:51:05'),
(23, 'ORD-XSLB4KRG7H', 1, 'paiz', '0896666666', NULL, 30000.00, 'pending', 'qris', 'pending_verification', 'QRIS-HTEP0UCSJM', 'payment_proofs/xB03IxtizcsatLIKNByjDxuYLuT6sOKZnX9B6ZN7.jpg', NULL, '2025-06-16 06:52:54', '2025-06-16 06:52:54'),
(24, 'ORD-YDE3LHRJTU', 12, 'paiz', '0896666666', NULL, 15000.00, 'pending', 'qris', 'pending_verification', 'QRIS-TCCOJFBK2B', 'payment_proofs/WSIjJKUb9tyrzp5OjdJpESxkwLBquGfh02oN1EwP.png', NULL, '2025-06-22 07:09:12', '2025-06-22 07:09:12'),
(25, 'ORD-RS3XZE3CTP', 11, 'adit', '12345678', NULL, 15000.00, 'pending', 'qris', 'pending_verification', 'QRIS-B28FNBZW0I', 'payment_proofs/UpskCd9tz4I4gL8fe0zHDOr9veZ5peT8AQXokXiD.jpg', NULL, '2025-06-22 07:10:09', '2025-06-22 07:10:09'),
(26, 'ORD-XDQBCHZVGK', 1, 'fadhil', '0812121212222', NULL, 30000.00, 'pending', 'qris', 'paid', 'QRIS-9CXEIQ0DJT', 'payment_proofs/VaWy5sZQeRjSWeDvfCVUM3xWDKbvgWytOvovLIdp.jpg', '2025-06-22 07:56:08', '2025-06-22 07:54:33', '2025-06-22 07:56:08'),
(27, 'ORD-F8LWWS5CAP', 1, 'fadhil', '081234567890', NULL, 15000.00, 'pending', 'qris', 'paid', 'QRIS-IEYCAUKOL8', 'payment_proofs/yDpr9owd8uUaCLulhSmS2cTwVMURfTnFVUXLzk5X.jpg', '2025-06-22 08:11:29', '2025-06-22 08:10:19', '2025-06-22 08:11:29');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `produk_id` bigint UNSIGNED NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `produk_id`, `nama_produk`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Cipera Ayam Khas Medan', 1, 30000.00, '2025-06-05 05:59:52', '2025-06-05 05:59:52'),
(2, 2, 1, 'Cipera Ayam Khas Medan', 1, 30000.00, '2025-06-05 06:22:11', '2025-06-05 06:22:11'),
(3, 2, 2, 'es kopi susu medan', 1, 15000.00, '2025-06-05 06:22:11', '2025-06-05 06:22:11'),
(4, 3, 3, 'ciampa jambe', 1, 15000.00, '2025-06-05 06:30:41', '2025-06-05 06:30:41'),
(5, 3, 2, 'es kopi susu medan', 1, 15000.00, '2025-06-05 06:30:41', '2025-06-05 06:30:41'),
(6, 4, 1, 'Cipera Ayam Khas Medan', 1, 30000.00, '2025-06-05 06:34:32', '2025-06-05 06:34:32'),
(7, 4, 2, 'es kopi susu medan', 1, 15000.00, '2025-06-05 06:34:32', '2025-06-05 06:34:32'),
(8, 4, 3, 'ciampa jambe', 1, 15000.00, '2025-06-05 06:34:32', '2025-06-05 06:34:32'),
(9, 5, 1, 'Cipera Ayam Khas Medan', 1, 30000.00, '2025-06-05 07:41:46', '2025-06-05 07:41:46'),
(10, 6, 1, 'Cipera Ayam Khas Medan', 1, 30000.00, '2025-06-05 08:59:23', '2025-06-05 08:59:23'),
(11, 7, 1, 'Cipera Ayam Khas Medan', 2, 30000.00, '2025-06-05 10:08:04', '2025-06-05 10:08:04'),
(12, 8, 1, 'Cipera Ayam Khas Medan', 1, 30000.00, '2025-06-07 05:03:05', '2025-06-07 05:03:05'),
(13, 9, 1, 'Cipera Ayam Khas Medan', 1, 30000.00, '2025-06-08 13:37:20', '2025-06-08 13:37:20'),
(14, 9, 2, 'es kopi susu medan', 1, 15000.00, '2025-06-08 13:37:20', '2025-06-08 13:37:20'),
(15, 10, 1, 'Cipera Ayam Khas Medan', 2, 30000.00, '2025-06-09 10:39:01', '2025-06-09 10:39:01'),
(16, 11, 3, 'ciampa jambe', 1, 15000.00, '2025-06-09 11:37:38', '2025-06-09 11:37:38'),
(17, 12, 1, 'Cipera Ayam Khas Medan', 1, 30000.00, '2025-06-09 11:42:56', '2025-06-09 11:42:56'),
(18, 12, 2, 'es kopi susu medan', 1, 15000.00, '2025-06-09 11:42:56', '2025-06-09 11:42:56'),
(19, 12, 3, 'ciampa jambe', 1, 15000.00, '2025-06-09 11:42:56', '2025-06-09 11:42:56'),
(20, 13, 1, 'Cipera Ayam Khas Medan', 1, 30000.00, '2025-06-09 14:56:04', '2025-06-09 14:56:04'),
(21, 14, 2, 'es kopi susu medan', 1, 15000.00, '2025-06-09 15:01:01', '2025-06-09 15:01:01'),
(22, 15, 1, 'Cipera Ayam Khas Medan', 1, 30000.00, '2025-06-10 06:52:34', '2025-06-10 06:52:34'),
(23, 16, 1, 'Cipera Ayam Khas Medan', 1, 30000.00, '2025-06-12 06:41:42', '2025-06-12 06:41:42'),
(24, 16, 2, 'es kopi susu medan', 1, 15000.00, '2025-06-12 06:41:42', '2025-06-12 06:41:42'),
(25, 17, 1, 'Cipera Ayam Khas Medan', 1, 30000.00, '2025-06-12 07:24:46', '2025-06-12 07:24:46'),
(26, 17, 2, 'es kopi susu medan', 1, 15000.00, '2025-06-12 07:24:46', '2025-06-12 07:24:46'),
(27, 18, 3, 'ciampa jambe', 2, 15000.00, '2025-06-12 07:27:13', '2025-06-12 07:27:13'),
(28, 18, 1, 'Cipera Ayam Khas Medan', 1, 30000.00, '2025-06-12 07:27:13', '2025-06-12 07:27:13'),
(29, 19, 2, 'es kopi susu medan', 1, 15000.00, '2025-06-12 07:43:30', '2025-06-12 07:43:30'),
(30, 19, 3, 'ciampa jambe', 1, 15000.00, '2025-06-12 07:43:30', '2025-06-12 07:43:30'),
(31, 20, 2, 'es kopi susu medan', 1, 15000.00, '2025-06-12 12:02:09', '2025-06-12 12:02:09'),
(32, 21, 3, 'ciampa jambe', 3, 15000.00, '2025-06-12 12:55:28', '2025-06-12 12:55:28'),
(33, 22, 3, 'ciampa jambe', 1, 15000.00, '2025-06-16 06:51:05', '2025-06-16 06:51:05'),
(34, 23, 1, 'Cipera Ayam Khas Medan', 1, 30000.00, '2025-06-16 06:52:54', '2025-06-16 06:52:54'),
(35, 24, 2, 'es kopi susu medan', 1, 15000.00, '2025-06-22 07:09:13', '2025-06-22 07:09:13'),
(36, 25, 3, 'ciampa jambe', 1, 15000.00, '2025-06-22 07:10:09', '2025-06-22 07:10:09'),
(37, 26, 1, 'Cipera Ayam Khas Medan', 1, 30000.00, '2025-06-22 07:54:33', '2025-06-22 07:54:33'),
(38, 27, 2, 'es kopi susu medan', 1, 15000.00, '2025-06-22 08:10:19', '2025-06-22 08:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` bigint UNSIGNED NOT NULL,
  `katagori_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` double NOT NULL,
  `stok` int NOT NULL,
  `berat` double(8,2) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `katagori_id`, `user_id`, `status`, `nama_produk`, `detail`, `harga`, `stok`, `berat`, `foto`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Cipera Ayam Khas Medan', 'cipera ayam', 30000, 10, 5.00, '20250608192553_68458151aafac.jpg', '2025-05-13 10:00:03', '2025-06-22 07:56:08'),
(2, 2, 1, 1, 'es kopi susu medan', 'minuman es kopi susu dengan biji kopi medan', 15000, 11, 5.00, '20250608192507_68458123b401f.jpeg', '2025-05-13 10:01:12', '2025-06-22 08:11:29'),
(3, 3, 1, 1, 'ciampa jambe', 'cemilan khas medan', 15000, 12, 5.00, '20250608192529_6845813920623.jpg', '2025-05-13 10:39:03', '2025-06-22 08:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  `total` decimal(12,2) NOT NULL,
  `total_item` int NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `items` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode_transaksi`, `tanggal`, `total`, `total_item`, `user_id`, `items`, `created_at`, `updated_at`) VALUES
(9, 'TRX-20250524-0001', '2025-05-24 15:55:00', 45000.00, 2, 1, '[{\"produk_id\":1,\"nama_produk\":\"Cipera Ayam Khas Medan\",\"harga\":30000,\"quantity\":\"1\",\"subtotal\":30000},{\"produk_id\":2,\"nama_produk\":\"es kopi susu medan\",\"harga\":15000,\"quantity\":\"1\",\"subtotal\":15000}]', '2025-05-24 08:55:00', '2025-05-24 08:55:00'),
(10, 'TRX-20250524-0002', '2025-05-24 16:20:01', 60000.00, 4, 1, '[{\"produk_id\":3,\"nama_produk\":\"ciampa jambe\",\"harga\":15000,\"quantity\":\"4\",\"subtotal\":60000}]', '2025-05-24 09:20:01', '2025-05-24 09:20:01'),
(11, 'TRX-20250604-0001', '2025-06-04 12:08:03', 30000.00, 2, 1, '[{\"produk_id\":2,\"nama_produk\":\"es kopi susu medan\",\"harga\":15000,\"quantity\":\"1\",\"subtotal\":15000},{\"produk_id\":3,\"nama_produk\":\"ciampa jambe\",\"harga\":15000,\"quantity\":\"1\",\"subtotal\":15000}]', '2025-06-04 05:08:03', '2025-06-04 05:08:03'),
(12, 'TRX-1749389882-9', '2025-06-08 20:38:02', 45000.00, 2, 1, '[{\"produk_id\":1,\"nama_produk\":\"Cipera Ayam Khas Medan\",\"quantity\":1,\"price\":\"30000.00\",\"subtotal\":30000},{\"produk_id\":2,\"nama_produk\":\"es kopi susu medan\",\"quantity\":1,\"price\":\"15000.00\",\"subtotal\":15000}]', '2025-06-08 13:38:02', '2025-06-08 13:38:02'),
(13, 'TRX-20250608-0001', '2025-06-08 20:44:42', 45000.00, 3, 1, '[{\"produk_id\":3,\"nama_produk\":\"ciampa jambe\",\"harga\":15000,\"quantity\":\"2\",\"subtotal\":30000},{\"produk_id\":2,\"nama_produk\":\"es kopi susu medan\",\"harga\":15000,\"quantity\":\"1\",\"subtotal\":15000}]', '2025-06-08 13:44:42', '2025-06-08 13:44:42'),
(14, 'TRX-20250608-0002', '2025-06-08 20:44:44', 45000.00, 3, 1, '[{\"produk_id\":3,\"nama_produk\":\"ciampa jambe\",\"harga\":15000,\"quantity\":\"2\",\"subtotal\":30000},{\"produk_id\":2,\"nama_produk\":\"es kopi susu medan\",\"harga\":15000,\"quantity\":\"1\",\"subtotal\":15000}]', '2025-06-08 13:44:44', '2025-06-08 13:44:44'),
(15, 'TRX-20250608-0003', '2025-06-08 20:44:45', 45000.00, 3, 1, '[{\"produk_id\":3,\"nama_produk\":\"ciampa jambe\",\"harga\":15000,\"quantity\":\"2\",\"subtotal\":30000},{\"produk_id\":2,\"nama_produk\":\"es kopi susu medan\",\"harga\":15000,\"quantity\":\"1\",\"subtotal\":15000}]', '2025-06-08 13:44:45', '2025-06-08 13:44:45'),
(16, 'TRX-20250608-0004', '2025-06-08 20:44:48', 45000.00, 3, 1, '[{\"produk_id\":3,\"nama_produk\":\"ciampa jambe\",\"harga\":15000,\"quantity\":\"2\",\"subtotal\":30000},{\"produk_id\":2,\"nama_produk\":\"es kopi susu medan\",\"harga\":15000,\"quantity\":\"1\",\"subtotal\":15000}]', '2025-06-08 13:44:48', '2025-06-08 13:44:48'),
(17, 'TRX-20250608-0005', '2025-06-08 20:44:49', 45000.00, 3, 1, '[{\"produk_id\":3,\"nama_produk\":\"ciampa jambe\",\"harga\":15000,\"quantity\":\"2\",\"subtotal\":30000},{\"produk_id\":2,\"nama_produk\":\"es kopi susu medan\",\"harga\":15000,\"quantity\":\"1\",\"subtotal\":15000}]', '2025-06-08 13:44:49', '2025-06-08 13:44:49'),
(18, 'TRX-20250608-0006', '2025-06-08 20:44:49', 45000.00, 3, 1, '[{\"produk_id\":3,\"nama_produk\":\"ciampa jambe\",\"harga\":15000,\"quantity\":\"2\",\"subtotal\":30000},{\"produk_id\":2,\"nama_produk\":\"es kopi susu medan\",\"harga\":15000,\"quantity\":\"1\",\"subtotal\":15000}]', '2025-06-08 13:44:49', '2025-06-08 13:44:49'),
(55, 'TRX-20250609-0001', '2025-06-09 17:18:26', 15000.00, 1, 1, '[{\"produk_id\":2,\"nama_produk\":\"es kopi susu medan\",\"harga\":15000,\"quantity\":\"1\",\"subtotal\":15000}]', '2025-06-09 10:18:26', '2025-06-09 10:18:26'),
(56, 'TRX-1749465556-10', '2025-06-09 17:39:16', 60000.00, 2, 1, '[{\"produk_id\":1,\"nama_produk\":\"Cipera Ayam Khas Medan\",\"quantity\":2,\"price\":\"30000.00\",\"subtotal\":60000}]', '2025-06-09 10:39:16', '2025-06-09 10:39:16'),
(57, 'TRX-1749469074-11', '2025-06-09 18:37:54', 15000.00, 1, 1, '[{\"produk_id\":3,\"nama_produk\":\"ciampa jambe\",\"quantity\":1,\"price\":\"15000.00\",\"subtotal\":15000}]', '2025-06-09 11:37:54', '2025-06-09 11:37:54'),
(58, 'TRX-1749469405-12', '2025-06-09 18:43:25', 60000.00, 3, 1, '[{\"produk_id\":1,\"nama_produk\":\"Cipera Ayam Khas Medan\",\"quantity\":1,\"price\":\"30000.00\",\"subtotal\":30000},{\"produk_id\":2,\"nama_produk\":\"es kopi susu medan\",\"quantity\":1,\"price\":\"15000.00\",\"subtotal\":15000},{\"produk_id\":3,\"nama_produk\":\"ciampa jambe\",\"quantity\":1,\"price\":\"15000.00\",\"subtotal\":15000}]', '2025-06-09 11:43:25', '2025-06-09 11:43:25'),
(59, 'TRX-1749480993-13', '2025-06-09 21:56:33', 30000.00, 1, 1, '[{\"produk_id\":1,\"nama_produk\":\"Cipera Ayam Khas Medan\",\"quantity\":1,\"price\":\"30000.00\",\"subtotal\":30000}]', '2025-06-09 14:56:33', '2025-06-09 14:56:33'),
(60, 'TRX-1749481282-14', '2025-06-09 22:01:22', 15000.00, 1, 1, '[{\"produk_id\":2,\"nama_produk\":\"es kopi susu medan\",\"quantity\":1,\"price\":\"15000.00\",\"subtotal\":15000}]', '2025-06-09 15:01:22', '2025-06-09 15:01:22'),
(61, 'TRX-1749538389-15', '2025-06-10 13:53:09', 30000.00, 1, 1, '[{\"produk_id\":1,\"nama_produk\":\"Cipera Ayam Khas Medan\",\"quantity\":1,\"price\":\"30000.00\",\"subtotal\":30000}]', '2025-06-10 06:53:09', '2025-06-10 06:53:09'),
(62, 'TRX-20250610-0001', '2025-06-10 13:54:53', 75000.00, 3, 1, '[{\"produk_id\":1,\"nama_produk\":\"Cipera Ayam Khas Medan\",\"harga\":30000,\"quantity\":\"2\",\"subtotal\":60000},{\"produk_id\":2,\"nama_produk\":\"es kopi susu medan\",\"harga\":15000,\"quantity\":\"1\",\"subtotal\":15000}]', '2025-06-10 06:54:53', '2025-06-10 06:54:53'),
(63, 'TRX-1749711355-16', '2025-06-12 13:55:55', 45000.00, 2, 6, '[{\"produk_id\":1,\"nama_produk\":\"Cipera Ayam Khas Medan\",\"quantity\":1,\"price\":\"30000.00\",\"subtotal\":30000},{\"produk_id\":2,\"nama_produk\":\"es kopi susu medan\",\"quantity\":1,\"price\":\"15000.00\",\"subtotal\":15000}]', '2025-06-12 06:55:55', '2025-06-12 06:55:55'),
(64, 'TRX-1749714271-19', '2025-06-12 14:44:31', 30000.00, 2, 6, '[{\"produk_id\":2,\"nama_produk\":\"es kopi susu medan\",\"quantity\":1,\"price\":\"15000.00\",\"subtotal\":15000},{\"produk_id\":3,\"nama_produk\":\"ciampa jambe\",\"quantity\":1,\"price\":\"15000.00\",\"subtotal\":15000}]', '2025-06-12 07:44:31', '2025-06-12 07:44:31'),
(65, 'TRX-1749714279-18', '2025-06-12 14:44:39', 60000.00, 3, 6, '[{\"produk_id\":3,\"nama_produk\":\"ciampa jambe\",\"quantity\":2,\"price\":\"15000.00\",\"subtotal\":30000},{\"produk_id\":1,\"nama_produk\":\"Cipera Ayam Khas Medan\",\"quantity\":1,\"price\":\"30000.00\",\"subtotal\":30000}]', '2025-06-12 07:44:39', '2025-06-12 07:44:39'),
(66, 'TRX-1749714284-17', '2025-06-12 14:44:44', 45000.00, 2, 6, '[{\"produk_id\":1,\"nama_produk\":\"Cipera Ayam Khas Medan\",\"quantity\":1,\"price\":\"30000.00\",\"subtotal\":30000},{\"produk_id\":2,\"nama_produk\":\"es kopi susu medan\",\"quantity\":1,\"price\":\"15000.00\",\"subtotal\":15000}]', '2025-06-12 07:44:44', '2025-06-12 07:44:44'),
(67, 'TRX-20250612-0001', '2025-06-12 15:57:12', 30000.00, 1, 6, '[{\"produk_id\":1,\"nama_produk\":\"Cipera Ayam Khas Medan\",\"harga\":30000,\"quantity\":\"1\",\"subtotal\":30000}]', '2025-06-12 08:57:12', '2025-06-12 08:57:12'),
(68, 'TRX-1749729773-20', '2025-06-12 19:02:53', 15000.00, 1, 6, '[{\"produk_id\":2,\"nama_produk\":\"es kopi susu medan\",\"quantity\":1,\"price\":\"15000.00\",\"subtotal\":15000}]', '2025-06-12 12:02:53', '2025-06-12 12:02:53'),
(69, 'TRX-1749733001-21', '2025-06-12 19:56:41', 45000.00, 3, 6, '[{\"produk_id\":3,\"nama_produk\":\"ciampa jambe\",\"quantity\":3,\"price\":\"15000.00\",\"subtotal\":45000}]', '2025-06-12 12:56:41', '2025-06-12 12:56:41'),
(70, 'TRX-20250618-0001', '2025-06-18 11:25:24', 30000.00, 1, 6, '[{\"produk_id\":1,\"nama_produk\":\"Cipera Ayam Khas Medan\",\"harga\":30000,\"quantity\":\"1\",\"subtotal\":30000}]', '2025-06-18 04:25:24', '2025-06-18 04:25:24'),
(71, 'TRX-1750578968-26', '2025-06-22 14:56:08', 30000.00, 1, 6, '[{\"produk_id\":1,\"nama_produk\":\"Cipera Ayam Khas Medan\",\"quantity\":1,\"price\":\"30000.00\",\"subtotal\":30000}]', '2025-06-22 07:56:08', '2025-06-22 07:56:08'),
(72, 'TRX-20250622-0001', '2025-06-22 14:57:11', 30000.00, 2, 6, '[{\"produk_id\":2,\"nama_produk\":\"es kopi susu medan\",\"harga\":15000,\"quantity\":\"2\",\"subtotal\":30000}]', '2025-06-22 07:57:11', '2025-06-22 07:57:11'),
(73, 'TRX-1750579889-27', '2025-06-22 15:11:29', 15000.00, 1, 6, '[{\"produk_id\":2,\"nama_produk\":\"es kopi susu medan\",\"quantity\":1,\"price\":\"15000.00\",\"subtotal\":15000}]', '2025-06-22 08:11:29', '2025-06-22 08:11:29'),
(74, 'TRX-20250622-0002', '2025-06-22 15:12:52', 30000.00, 2, 6, '[{\"produk_id\":3,\"nama_produk\":\"ciampa jambe\",\"harga\":15000,\"quantity\":\"2\",\"subtotal\":30000}]', '2025-06-22 08:12:52', '2025-06-22 08:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `role`, `status`, `password`, `hp`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Fadhil Rafif', 'admin@gmail.com', '1', 1, '$2y$10$04BRBWc6dAIbRG.muKXy9ePxI1Dj.V5ZvgU6hI6kZ4CcPS.VHBHui', '0812345678901', '20250608192326_684580beee3d3.jpg', '2025-05-11 15:25:30', '2025-06-08 12:23:27'),
(2, 'Jojo', 'jojo@gmail.com', '0', 1, '$2y$10$DJYF0COmh4U83Fj094s6AumMlq./yc4.ImInPFSQKCWM8k5Yiyu5e', '081234567892', '20250611204611_684988a3bb7af.jpg', '2025-05-11 15:25:31', '2025-06-11 13:46:11'),
(3, 'Anggun', 'anggun@gmail.com', '0', 1, '$2y$10$t4HrCL5KyvtysRt.Luly7Oyp7Ww7S2Qo.yRNgbTQnLWfDNBsrGjVu', '081234567892', NULL, '2025-05-11 15:25:31', '2025-05-11 15:25:31'),
(4, 'Faiz', 'faiz@gmail.com', '0', 1, '$2y$10$VwvyHvX.2PcAM7s0bHZvK.NaLc4jV5mXcxmBUWTPiH7k.kwT8Ebsa', '081234567892', NULL, '2025-05-11 15:25:31', '2025-05-11 15:25:31'),
(5, 'adnan', 'adnan@gmail.com', '0', 1, '$2y$10$6w2Dm1fUDV0QTtYPZrd2O.V6mAYfy7FLkSFwAKn5Gof/FYPR6T2zW', '081234567892', NULL, '2025-05-11 15:25:31', '2025-05-11 15:25:31'),
(6, 'jojo palkor', 'jojosan@gmail.com', '2', 1, '$2y$10$pGxY8UoBckIfAqODpkvrqOArOijcuo5GRCxrboPDX69z9lDx6Yfie', '123456789000', '20250611205012_68498994774de.jpg', '2025-06-11 13:50:12', '2025-06-11 13:55:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `foto_produk`
--
ALTER TABLE `foto_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foto_produk_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `katagori`
--
ALTER TABLE `katagori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_katagori_id_foreign` (`katagori_id`),
  ADD KEY `produk_user_id_foreign` (`user_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaksi_kode_transaksi_unique` (`kode_transaksi`),
  ADD KEY `transaksi_user_id_foreign` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_produk`
--
ALTER TABLE `foto_produk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `katagori`
--
ALTER TABLE `katagori`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foto_produk`
--
ALTER TABLE `foto_produk`
  ADD CONSTRAINT `foto_produk_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_katagori_id_foreign` FOREIGN KEY (`katagori_id`) REFERENCES `katagori` (`id`),
  ADD CONSTRAINT `produk_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
