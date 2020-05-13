-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2020 at 12:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_library_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(10) UNSIGNED NOT NULL,
  `at_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `at_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `at_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `at_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `at_gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `at_birthday` date DEFAULT NULL,
  `at_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `at_name`, `at_email`, `at_phone`, `at_address`, `at_gender`, `at_birthday`, `at_status`, `created_at`, `updated_at`) VALUES
(3, 'Test', 'duocnvoit@gmail.com', '1659020898', 'thái bình', '1', '2019-10-01', 1, '2020-04-25 16:53:52', '2020-04-25 16:53:52'),
(4, 'Apricot Hotel', 'support@gmail.com', '0359020888', 'Từ Liêm', '1', '2003-01-07', 1, '2020-04-30 18:09:44', '2020-04-30 18:09:44');

-- --------------------------------------------------------

--
-- Table structure for table `author_book`
--

CREATE TABLE `author_book` (
  `author_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `author_book`
--

INSERT INTO `author_book` (`author_id`, `book_id`) VALUES
(3, 2),
(4, 1),
(4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `b_categories_id` int(10) UNSIGNED NOT NULL,
  `b_publishing_company_id` int(10) UNSIGNED NOT NULL,
  `b_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_code_book` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_amount_liquidated` int(11) DEFAULT 0,
  `b_price` double DEFAULT NULL,
  `b_status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `b_categories_id`, `b_publishing_company_id`, `b_name`, `b_image`, `b_description`, `b_code_book`, `b_amount_liquidated`, `b_price`, `b_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'test', NULL, NULL, 'UIKrrjwobE', NULL, NULL, 1, '2020-05-01 15:38:17', '2020-05-01 15:38:17'),
(2, 1, 1, 'sdadasdsad', NULL, NULL, '69U2TWMCdx', NULL, 50, 1, '2020-05-01 15:39:45', '2020-05-02 16:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `id` int(10) UNSIGNED NOT NULL,
  `b_code_borrow` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_reader_id` int(10) UNSIGNED NOT NULL,
  `b_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`id`, `b_code_borrow`, `b_reader_id`, `b_note`, `b_status`, `created_at`, `updated_at`) VALUES
(2, 'ZDV5A284GI', 3, 'test test test test', 1, '2020-05-06 18:11:22', '2020-05-06 18:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `c_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `c_name`, `created_at`, `updated_at`) VALUES
(1, 'category 1', '2020-04-25 17:18:28', '2020-04-25 17:19:38'),
(2, 'category 2', '2020-04-25 17:18:31', '2020-04-25 17:19:49'),
(3, 'category 3', '2020-04-25 17:18:34', '2020-04-25 17:19:58');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(10) UNSIGNED NOT NULL,
  `c_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `c_name`, `created_at`, `updated_at`) VALUES
(1, 'Class 1', '2020-04-22 16:50:10', '2020-04-23 09:13:14'),
(2, 'Class 2', '2020-04-22 16:51:22', '2020-04-23 09:13:32'),
(3, 'Class 3', '2020-04-23 09:13:39', '2020-04-23 09:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(10) UNSIGNED NOT NULL,
  `d_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `d_name`, `created_at`, `updated_at`) VALUES
(9, 'Department 1', '2020-04-23 09:12:44', '2020-04-23 09:12:44'),
(10, 'Department 2', '2020-04-23 09:12:51', '2020-04-23 09:12:51'),
(11, 'Department 3', '2020-04-23 09:12:55', '2020-04-23 09:12:55'),
(12, 'Department 4', '2020-05-06 18:07:16', '2020-05-06 18:07:41');

-- --------------------------------------------------------

--
-- Table structure for table `group_permission`
--

CREATE TABLE `group_permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_permission`
--

INSERT INTO `group_permission` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Full Permission', 'Full Permission', '2020-05-07 08:45:08', '2020-05-07 08:45:08'),
(2, 'Department', 'Department', '2020-05-07 08:45:40', '2020-05-07 08:45:40'),
(3, 'Class', 'Class', '2020-05-07 08:45:48', '2020-05-07 08:45:48'),
(4, 'Reader', 'Reader', '2020-05-07 08:46:00', '2020-05-07 08:46:00'),
(5, 'Author', 'Author', '2020-05-07 08:46:09', '2020-05-07 08:46:09'),
(6, 'Category', 'Category', '2020-05-07 08:46:20', '2020-05-07 08:47:43'),
(7, 'Publishing Company', 'Publishing Company', '2020-05-07 08:46:35', '2020-05-07 08:46:35'),
(8, 'Book', 'Book', '2020-05-07 08:46:48', '2020-05-07 08:46:48'),
(9, 'Borrow', 'Borrow', '2020-05-07 08:47:01', '2020-05-07 08:47:01'),
(10, 'List Borrow Book', 'List Borrow Book', '2020-05-07 08:47:16', '2020-05-07 08:47:16'),
(11, 'User', 'User', '2020-05-07 08:47:25', '2020-05-07 08:47:25'),
(12, 'Roles', 'Roles', '2020-05-07 08:47:34', '2020-05-07 08:47:34');

-- --------------------------------------------------------

--
-- Table structure for table `import_books`
--

CREATE TABLE `import_books` (
  `id` int(10) UNSIGNED NOT NULL,
  `ib_books_id` int(10) UNSIGNED DEFAULT NULL,
  `ib_amount` int(11) NOT NULL DEFAULT 0,
  `ib_issue_number` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `import_books`
--

INSERT INTO `import_books` (`id`, `ib_books_id`, `ib_amount`, `ib_issue_number`, `created_at`) VALUES
(1, 1, 50, 10, '2020-05-01 17:07:25'),
(3, 2, 100, 50, '2020-05-02 03:16:52'),
(4, 2, 20, NULL, '2020-05-02 04:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_04_04_100000_create_password_resets_table', 1),
(2, '2020_04_04_164509_create_users_table', 1),
(3, '2020_04_04_191839_entrust_setup_tables', 1),
(4, '2020_04_22_164601_create_department_table', 1),
(5, '2020_04_22_164713_create_class_table', 1),
(6, '2020_04_22_164926_create_reader_table', 1),
(7, '2020_04_25_142339_create_authors_table', 2),
(8, '2020_04_25_143936_create_categories_table', 2),
(9, '2020_04_25_144038_create_publishing_company_table', 2),
(10, '2020_04_25_154350_create_books_table', 2),
(11, '2020_04_25_154817_create_authors_books_table', 2),
(12, '2020_04_25_160141_create_import_books_table', 3),
(21, '2020_05_03_003724_create_borrow_table', 4),
(22, '2020_05_03_003812_create_orders_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `d_borrow_id` int(10) UNSIGNED NOT NULL,
  `d_book_id` int(10) UNSIGNED NOT NULL,
  `d_reader_id` int(10) UNSIGNED NOT NULL,
  `d_number` int(11) NOT NULL DEFAULT 1,
  `d_expiry_date` date DEFAULT NULL,
  `d_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_forfeit` double DEFAULT NULL,
  `d_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `d_borrow_id`, `d_book_id`, `d_reader_id`, `d_number`, `d_expiry_date`, `d_note`, `d_forfeit`, `d_status`, `created_at`, `updated_at`) VALUES
(31, 2, 2, 3, 2, '2020-05-19', NULL, NULL, 1, '2020-05-06 18:19:06', '2020-05-06 18:19:06'),
(32, 2, 2, 3, 1, '2020-05-31', NULL, 10, 3, '2020-05-06 18:19:06', '2020-05-06 18:19:06');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(4, 'duocnvoit@gmail.com', 'faMe0A3tRhUkQDJtogTuuL0OOsCkc0VneFZEqjcsVbeLVxCgLbLy4rXff5HQRY12', '2020-05-02 17:24:07', '2020-05-02 17:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_permission_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `group_permission_id`, `created_at`, `updated_at`) VALUES
(1, 'full-permission', 'Full Permission', 'Full Permission', 1, '2020-05-07 08:48:15', '2020-05-07 08:48:15'),
(2, 'list-department', 'List Department', 'List Department', 2, '2020-05-07 08:48:57', '2020-05-07 08:48:57'),
(3, 'create-department', 'Create Department', 'Create Department', 2, '2020-05-07 08:49:08', '2020-05-07 08:49:08'),
(4, 'update-department', 'Update Department', 'Update Department', 2, '2020-05-07 08:49:24', '2020-05-07 08:49:24'),
(5, 'delete-department', 'Delete Department', 'Delete Department', 2, '2020-05-07 08:49:35', '2020-05-07 08:49:35'),
(6, 'list-class', 'List Class', 'List Class', 3, '2020-05-07 08:50:19', '2020-05-07 08:50:19'),
(7, 'create-class', 'Create Class', 'Create Class', 3, '2020-05-07 08:50:32', '2020-05-07 08:50:32'),
(8, 'update-class', 'Update Class', 'Update Class', 3, '2020-05-07 08:50:42', '2020-05-07 08:50:42'),
(9, 'delete-class', 'Delete Class', 'Delete Class', 3, '2020-05-07 08:50:53', '2020-05-07 08:50:53'),
(10, 'list-reader', 'List Reader', 'List Reader', 4, '2020-05-07 08:52:52', '2020-05-07 08:52:52'),
(11, 'create-reader', 'Create Reader', 'Create Reader', 4, '2020-05-07 08:53:11', '2020-05-07 08:53:11'),
(12, 'update-reader', 'Update Reader', 'Update Reader', 4, '2020-05-07 08:53:26', '2020-05-07 08:53:26'),
(13, 'delete-reader', 'Delete Reader', 'Delete Reader', 4, '2020-05-07 08:53:48', '2020-05-07 08:53:48'),
(14, 'list-reader-book', 'List Reader Book', 'List Reader Book', 4, '2020-05-07 08:54:19', '2020-05-07 08:54:19'),
(15, 'list-author', 'List Author', 'List Author', 5, '2020-05-07 08:54:32', '2020-05-07 08:54:32'),
(16, 'create-author', 'Create Author', 'Create Author', 5, '2020-05-07 08:54:44', '2020-05-07 08:54:44'),
(17, 'update-author', 'Update Author', 'Update Author', 5, '2020-05-07 08:54:58', '2020-05-07 08:54:58'),
(18, 'delete-author', 'Delete Author', 'Delete Author', 5, '2020-05-07 08:55:20', '2020-05-07 08:55:20'),
(19, 'list-category', 'List Category', 'List Category', 6, '2020-05-07 08:55:39', '2020-05-07 08:55:39'),
(20, 'create-category', 'Create Category', 'Create Category', 6, '2020-05-07 08:55:55', '2020-05-07 08:55:55'),
(21, 'update-category', 'Update Category', 'Update Category', 6, '2020-05-07 08:56:09', '2020-05-07 08:56:09'),
(22, 'delete-category', 'Delete Category', 'Delete Category', 6, '2020-05-07 08:56:22', '2020-05-07 08:56:22'),
(23, 'list-publishing-company', 'List Publishing Company', 'List Publishing Company', 7, '2020-05-07 08:56:58', '2020-05-07 08:56:58'),
(24, 'create-publishing-company', 'Create Publishing Company', 'Create Publishing Company', 7, '2020-05-07 08:57:14', '2020-05-07 08:57:14'),
(25, 'update-publishing-company', 'Update Publishing Company', 'Update Publishing Company', 7, '2020-05-07 08:57:29', '2020-05-07 08:57:29'),
(26, 'delete-publishing-company', 'Delete Publishing Company', 'Delete Publishing Company', 7, '2020-05-07 08:57:45', '2020-05-07 08:57:45'),
(27, 'list-book', 'List Book', 'List Book', 8, '2020-05-07 08:58:15', '2020-05-07 08:58:15'),
(28, 'create-book', 'Create Book', 'Create Book', 8, '2020-05-07 08:58:34', '2020-05-07 08:58:34'),
(29, 'update-book', 'Update Book', 'Update Book', 8, '2020-05-07 08:58:46', '2020-05-07 08:58:46'),
(30, 'delete-book', 'Delete Book', 'Delete Book', 8, '2020-05-07 08:58:58', '2020-05-07 08:58:58'),
(31, 'import-books', 'Import Books', 'Import Books', 8, '2020-05-07 08:59:22', '2020-05-07 08:59:22'),
(32, 'list-borrow', 'List Borrow', 'List Borrow', 9, '2020-05-07 09:00:41', '2020-05-07 09:00:41'),
(33, 'create-borrow', 'Create Borrow', 'Create Borrow', 9, '2020-05-07 09:00:53', '2020-05-07 09:00:53'),
(34, 'update-borrow', 'Update Borrow', 'Update Borrow', 9, '2020-05-07 09:01:25', '2020-05-07 09:01:25'),
(35, 'detele-borrow', 'Detele Borrow', 'Detele Borrow', 9, '2020-05-07 09:01:55', '2020-05-07 09:01:55'),
(36, 'list-book-borrow', 'List Book Borrow', 'List Book Borrow', 10, '2020-05-07 09:02:35', '2020-05-07 09:02:35'),
(37, 'delete-book-borrow', 'Delete Book Borrow', 'Delete Book Borrow', 10, '2020-05-07 09:02:50', '2020-05-07 09:02:50'),
(38, 'list-user', 'List User', 'List User', 11, '2020-05-07 09:03:27', '2020-05-07 09:03:27'),
(39, 'create-user', 'Create User', 'Create User', 11, '2020-05-07 09:03:58', '2020-05-07 09:03:58'),
(40, 'update-user', 'Update User', 'Update User', 11, '2020-05-07 09:04:20', '2020-05-07 09:04:20'),
(41, 'deate-user', 'Deate User', 'Deate User', 11, '2020-05-07 09:04:32', '2020-05-07 09:04:32'),
(42, 'list-role', 'List Role', 'List Role', 12, '2020-05-07 09:05:10', '2020-05-07 09:05:10'),
(43, 'create-role', 'Create Role', 'Create Role', 12, '2020-05-07 09:05:26', '2020-05-07 09:05:26'),
(44, 'update-role', 'Update Role', 'Update Role', 12, '2020-05-07 09:05:37', '2020-05-07 09:05:37'),
(45, 'delete-role', 'Delete Role', 'Delete Role', 12, '2020-05-07 09:06:23', '2020-05-07 09:06:23'),
(46, 'delete-import-books', 'Delete Import Books', 'Delete Import Books', 8, '2020-05-07 09:26:25', '2020-05-07 09:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `publishing_company`
--

CREATE TABLE `publishing_company` (
  `id` int(10) UNSIGNED NOT NULL,
  `pc_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pc_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pc_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pc_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pc_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publishing_company`
--

INSERT INTO `publishing_company` (`id`, `pc_name`, `pc_email`, `pc_phone`, `pc_address`, `pc_status`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'duocnvoit@gmail.com', '1659020898', 'thái bình', 1, '2020-04-25 18:19:08', '2020-04-25 18:19:08'),
(2, 'Nguyên Văn Dược', 'duocnvoitrrrr@gmail.com', '0359020888', 'Từ Liêm', 1, '2020-05-01 18:16:59', '2020-05-01 18:16:59');

-- --------------------------------------------------------

--
-- Table structure for table `reader`
--

CREATE TABLE `reader` (
  `id` int(10) UNSIGNED NOT NULL,
  `r_department_id` int(10) UNSIGNED DEFAULT NULL,
  `r_class_id` int(10) UNSIGNED DEFAULT NULL,
  `r_code_card` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_gender` tinyint(4) NOT NULL DEFAULT 0,
  `r_birthday` date DEFAULT NULL,
  `r_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_number_violations` int(11) NOT NULL DEFAULT 0,
  `r_card_created_date` date DEFAULT NULL,
  `r_card_expiry_date` date DEFAULT NULL,
  `r_status` tinyint(4) NOT NULL DEFAULT 1,
  `r_card_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reader`
--

INSERT INTO `reader` (`id`, `r_department_id`, `r_class_id`, `r_code_card`, `r_name`, `r_gender`, `r_birthday`, `r_address`, `r_phone`, `r_avatar`, `r_number_violations`, `r_card_created_date`, `r_card_expiry_date`, `r_status`, `r_card_status`, `created_at`, `updated_at`) VALUES
(1, 9, 1, 'pXGG7yYvbK', 'Adelia', 1, '2006-07-14', 'Tòa nhà Sông Đà, Đường Phạm Hùng, Phường Mễ Trì, Quận Nam Từ Liêm, Hà Nội', '0359020898', '609a09649b5e6dd76d242d81fd0f6eb7.jpg', 0, '2020-04-01', '2020-04-30', 1, 1, '2020-04-23 15:18:33', '2020-05-06 18:06:57'),
(3, 9, 1, NULL, 'Tom', 2, '1998-07-23', 'Tòa nhà Sông Đà, Đường Phạm Hùng, Phường Mễ Trì, Quận Nam Từ Liêm, Hà Nội', '0359020898', NULL, 0, NULL, NULL, 1, 2, '2020-04-25 19:16:57', '2020-05-06 18:00:34'),
(4, 10, 2, 'NAKF2plct5', 'Piter', 1, '2020-05-05', 'thái bình', '1659020898', '87cbdcc735858d2bd74f87a07c5d8142.jpg', 0, '2020-05-04', '2020-06-30', 1, 1, '2020-05-04 08:45:31', '2020-05-06 18:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', NULL, '2020-04-23 07:09:47', '2020-05-07 09:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `phone`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$wkjMG/vGGEJ21wIARDJDiOZnBxO8p5eyDrc3gw.0E9.oKNKqp0QD.', 'Admin', '0928817228565', 1, 'lm3Ft8DFhm0Pdu1bs3QKxeOGf7Lked7cG8pmFbv0ZhcGWSuJAlSdHEVTHgm3', '2020-04-22 15:40:22', '2020-05-02 16:12:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authors_at_birthday_index` (`at_birthday`);

--
-- Indexes for table `author_book`
--
ALTER TABLE `author_book`
  ADD PRIMARY KEY (`author_id`,`book_id`),
  ADD KEY `author_book_book_id_foreign` (`book_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_b_code_book_unique` (`b_code_book`),
  ADD KEY `books_b_categories_id_foreign` (`b_categories_id`),
  ADD KEY `books_b_publishing_company_id_foreign` (`b_publishing_company_id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `borrow_b_code_borrow_unique` (`b_code_borrow`),
  ADD KEY `borrow_b_reader_id_foreign` (`b_reader_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_permission`
--
ALTER TABLE `group_permission`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_permission_name_unique` (`name`);

--
-- Indexes for table `import_books`
--
ALTER TABLE `import_books`
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
  ADD KEY `orders_d_borrow_id_foreign` (`d_borrow_id`),
  ADD KEY `orders_d_book_id_foreign` (`d_book_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`),
  ADD KEY `permissions_group_permission_id_foreign` (`group_permission_id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `publishing_company`
--
ALTER TABLE `publishing_company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `publishing_company_pc_email_unique` (`pc_email`);

--
-- Indexes for table `reader`
--
ALTER TABLE `reader`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reader_r_department_id_foreign` (`r_department_id`),
  ADD KEY `reader_r_class_id_foreign` (`r_class_id`),
  ADD KEY `reader_r_code_card_index` (`r_code_card`),
  ADD KEY `reader_r_name_index` (`r_name`),
  ADD KEY `reader_r_birthday_index` (`r_birthday`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `group_permission`
--
ALTER TABLE `group_permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `import_books`
--
ALTER TABLE `import_books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `publishing_company`
--
ALTER TABLE `publishing_company`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reader`
--
ALTER TABLE `reader`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `author_book`
--
ALTER TABLE `author_book`
  ADD CONSTRAINT `author_book_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `author_book_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_b_categories_id_foreign` FOREIGN KEY (`b_categories_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `books_b_publishing_company_id_foreign` FOREIGN KEY (`b_publishing_company_id`) REFERENCES `publishing_company` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_b_reader_id_foreign` FOREIGN KEY (`b_reader_id`) REFERENCES `reader` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_d_book_id_foreign` FOREIGN KEY (`d_book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_d_borrow_id_foreign` FOREIGN KEY (`d_borrow_id`) REFERENCES `borrow` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_group_permission_id_foreign` FOREIGN KEY (`group_permission_id`) REFERENCES `group_permission` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reader`
--
ALTER TABLE `reader`
  ADD CONSTRAINT `reader_r_class_id_foreign` FOREIGN KEY (`r_class_id`) REFERENCES `class` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reader_r_department_id_foreign` FOREIGN KEY (`r_department_id`) REFERENCES `department` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
