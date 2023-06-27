-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 15, 2022 lúc 07:57 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `eshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`, `updated_at`) VALUES
(38, '4', '9', '1', '2022-09-12 23:48:42', '2022-09-12 23:48:42'),
(45, '2', '6', '4', '2022-09-13 09:30:47', '2022-09-13 09:47:10'),
(47, '3', '6', '3', '2022-09-14 05:25:31', '2022-09-14 07:24:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_descrip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_descrip`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(3, 'Danh mục 1', 'Danh-muc-1', 'Danh mục 1', 1, 1, '1662369171.jpg', 'Test', 'đâsda', 'adasdasd', '2022-09-05 02:12:51', '2022-09-07 20:08:17'),
(4, 'Danh mục 2', 'Danh-muc-2', 'Danh mục 2', 1, 1, '1662369393.jpg', 'Test', 'TEST', 'TEST', '2022-09-05 02:16:33', '2022-09-07 20:08:25'),
(5, 'Danh mục 3', 'Danh-muc-3', 'Danh mục 3', 1, 0, '1662385885.jpg', 'TETS', 'TEST', 'TEst', '2022-09-05 06:51:25', '2022-09-05 10:32:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_03_142552_create_categories_table', 2),
(6, '2022_09_05_143617_create_products_table', 3),
(7, '2022_09_08_105213_create_carts_table', 4),
(8, '2022_09_09_173335_create_orders_table', 5),
(9, '2022_09_10_071506_create_order_items_table', 5),
(10, '2022_09_12_080734_create_ratings_table', 6),
(12, '2022_09_12_141127_create_reviews_table', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracking_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fname`, `lname`, `email`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `pincode`, `status`, `message`, `tracking_no`, `created_at`, `updated_at`) VALUES
(5, '2', 'Nguyễn Thị Oanh', 'Oanh', 'oanh12312@gmail.com', '0923377129', '159/23', 'Phùng Khoang', 'Quận Hà Đông', 'Hà Nội', 'Việt Nam', '123456', 1, NULL, 'order175251', '2022-09-10 20:35:31', '2022-09-11 07:40:18'),
(6, '2', 'Nguyễn Thị Oanh', 'Oanh', 'oanh12312@gmail.com', '0923377129', '159/23', 'Phùng Khoang', 'Quận Hà Đông', 'Hà Nội', 'Việt Nam', '123456', 0, NULL, 'order899011', '2022-09-10 20:37:56', '2022-09-10 20:37:56'),
(7, '1', 'Nguyễn', 'Tú', 'tu72589@gmail.com', '0923377129', '159/23 Phùng Khoang', 'Tân triều', 'Quận Hà Đông', 'Hà Nội', 'US', '2209', 0, NULL, 'order339899', '2022-09-11 07:11:21', '2022-09-11 10:45:12'),
(8, '1', 'Nguyễn Văn Tú', 'Tú', 'tu72589@gmail.com', '0923377129', '159/23 Phùng Khoang', 'Tân triều', 'Quận Hà Đông', 'Hà Nội', 'US', '2209', 0, NULL, 'order453273', '2022-09-11 10:50:01', '2022-09-11 10:50:01'),
(9, '3', 'Nguyễn', 'Tú', 'tan123123@gmail.com', '0923377129', '159/23 Phùng Khoang', 'Tân Triều', 'Quận Hà Đông', 'Hà Nội', 'KR', '4869', 0, NULL, 'order697194', '2022-09-12 00:08:11', '2022-09-12 00:08:11'),
(10, '3', 'Nguyễn Minh Tân', 'Tú', 'tan123123@gmail.com', '0923377129', '159/23 Phùng Khoang', 'Tân Triều', 'Quận Hà Đông', 'Hà Nội', 'KR', '4869', 0, NULL, 'order347288', '2022-09-12 03:20:21', '2022-09-12 03:20:21'),
(11, '4', 'Nguyễn', 'Tú', 'hainam123@gmail.com', '0919118181', '159/23 Phùng Khoang', 'HVCNBCVT', 'Quận Hà Đông', 'Hà Nội', 'Việt Nam', '2209222', 0, NULL, 'order641870', '2022-09-12 23:39:52', '2022-09-12 23:39:52'),
(12, '4', 'Trần Văn Nam', 'Tú', 'hainam123@gmail.com', '0919118181', '159/23 Phùng Khoang', 'HVCNBCVT', 'Quận Hà Đông', 'Hà Nội', 'Việt Nam', '2209222', 0, NULL, 'order562620', '2022-09-12 23:48:26', '2022-09-12 23:48:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `price`, `qty`, `created_at`, `updated_at`) VALUES
(9, '5', '6', '120000', '1', '2022-09-10 20:35:31', '2022-09-10 20:35:31'),
(10, '6', '8', '100000', '1', '2022-09-10 20:37:56', '2022-09-10 20:37:56'),
(11, '6', '7', '400000', '1', '2022-09-10 20:37:56', '2022-09-10 20:37:56'),
(12, '6', '1', '120000', '2', '2022-09-10 20:37:56', '2022-09-10 20:37:56'),
(13, '6', '2', '140000', '1', '2022-09-10 20:37:56', '2022-09-10 20:37:56'),
(14, '7', '6', '120000', '2', '2022-09-11 07:11:21', '2022-09-11 07:11:21'),
(15, '7', '7', '400000', '1', '2022-09-11 07:11:21', '2022-09-11 07:11:21'),
(16, '8', '6', '120000', '2', '2022-09-11 10:50:01', '2022-09-11 10:50:01'),
(17, '8', '9', '350000', '1', '2022-09-11 10:50:01', '2022-09-11 10:50:01'),
(18, '9', '9', '350000', '1', '2022-09-12 00:08:11', '2022-09-12 00:08:11'),
(19, '9', '8', '100000', '2', '2022-09-12 00:08:11', '2022-09-12 00:08:11'),
(20, '10', '6', '120000', '2', '2022-09-12 03:20:21', '2022-09-12 03:20:21'),
(21, '11', '6', '120000', '2', '2022-09-12 23:39:52', '2022-09-12 23:39:52'),
(22, '11', '2', '140000', '2', '2022-09-12 23:39:52', '2022-09-12 23:39:52'),
(23, '12', '8', '100000', '1', '2022-09-12 23:48:26', '2022-09-12 23:48:26'),
(24, '12', '7', '400000', '1', '2022-09-12 23:48:26', '2022-09-12 23:48:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('tu72589@gmail.com', '$2y$10$Rs7IfENdHHyM00CDaipvbeMwvqRLRZf6ajSEPW/bxebZ.MF1m.MxC', '2022-09-13 00:23:23'),
('tu72589tu@gmail.com', '$2y$10$D3TG/mrfamfjmzTsqY7XDOsV7FphAyZA8PvWPeUlGviglsHJJl.gK', '2022-09-14 21:10:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_id` bigint(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `small_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `cate_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `tax`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 3, 'Sản phẩm 1', 'san-pham-1', 'đâsd', 'adsdasd', '15', '12', '1662425552.jpg', '0', '3123', 1, 1, 'ádasdasdada', 'đâsdasdas', 'đâsdadad', '2022-09-05 10:03:05', '2022-09-10 20:37:56'),
(2, 4, 'Sản phẩm 2', 'san-pham-2', 'Test small DESC', 'Test DESC', '15', '14', '1662426218.jpg', '42', '5', 1, 1, 'Test', 'keywords Test', 'meta Test', '2022-09-05 10:04:47', '2022-09-12 23:39:52'),
(6, 4, 'Sản phẩm 3', 'san-pham-3', 'Small Description San phẩm 3', 'DESC Sản phẩm 3', '12', '12', '1662541694.jpg', '41', '0', 1, 1, 'MT', 'MK', 'MD', '2022-09-07 02:08:14', '2022-09-12 23:39:52'),
(7, 5, 'Sản phẩm 4', 'san-pham-4', 'SM DESC TEST Sản phẩm 4', 'D Sản phẩm 4', '40', '40', '1662541837.jpg', '97', '0', 1, 1, 'MT', 'MK', 'MD', '2022-09-07 02:10:37', '2022-09-12 23:48:26'),
(8, 3, 'Sản phẩm 5', 'san-pham-5', 'SM DESC 5', 'DESC 5', '10', '10', '1662541896.jpg', '46', '0', 1, 1, 'MT', 'MK', 'MD', '2022-09-07 02:11:36', '2022-09-12 23:48:26'),
(9, 5, 'Sản phẩm 6', 'san-pham-6', 'SM 6', 'DESC 6', '40', '35', '1662603367.jpg', '48', '0', 1, 0, 'MT', 'MK', 'MD', '2022-09-07 19:16:07', '2022-09-12 00:08:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars_rated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `prod_id`, `stars_rated`, `created_at`, `updated_at`) VALUES
(5, '3', '6', '5', '2022-09-12 02:19:08', '2022-09-12 02:49:09'),
(6, '2', '6', '3', '2022-09-12 03:12:06', '2022-09-12 03:38:52'),
(7, '3', '8', '4', '2022-09-12 03:21:07', '2022-09-12 03:21:07'),
(8, '2', '7', '3', '2022-09-12 09:44:04', '2022-09-12 18:28:51'),
(9, '4', '6', '5', '2022-09-12 23:40:08', '2022-09-12 23:40:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_review` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `prod_id`, `user_review`, `created_at`, `updated_at`) VALUES
(1, '2', '6', 'Sản phẩm tốt nên mua', '2022-09-12 08:00:14', '2022-09-12 08:00:14'),
(2, '3', '6', 'Chất vải tốt\r\nSản phẩm ổn', '2022-09-12 09:12:39', '2022-09-12 09:18:52'),
(3, '2', '7', 'Da tốt', '2022-09-12 09:48:02', '2022-09-12 09:48:02'),
(4, '4', '6', 'Áo đẹp vừa form', '2022-09-12 23:40:19', '2022-09-12 23:40:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_as`, `remember_token`, `created_at`, `updated_at`, `lname`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `pincode`) VALUES
(1, 'Nguyễn Văn Tú', 'tu72589@gmail.com', NULL, '$2y$10$oPq4TmNhrckY4t0ELU0mLuxlNvehhjHg0Bf5w8IEiP2syuXcF1uoa', 1, NULL, '2022-09-01 22:58:36', '2022-09-11 07:11:21', '', '', '', '', '', '', '', ''),
(2, 'Nguyễn Thị Oanh', 'oanh12312@gmail.com', NULL, '$2y$10$5ZVBGq1prUq92QutCogAl.aMKIecaTsrxEomO2s.tFr3/vXUqO5KW', 1, NULL, '2022-09-08 21:19:44', '2022-09-15 01:08:51', '', '', '', '', '', '', '', ''),
(3, 'Nguyễn Minh Tân', 'tan123123@gmail.com', NULL, '$2y$10$33RLyHvDfpLhuT4YV86Nm.MJRCppekpnwd9eKJB.ptgG5b.p8iv8u', 0, NULL, '2022-09-12 00:07:15', '2022-09-12 00:08:11', 'Tú', '0923377129', '159/23 Phùng Khoang', 'Tân Triều', 'Quận Hà Đông', 'Hà Nội', 'KR', '4869'),
(4, 'Trần Văn Nam', 'hainam123@gmail.com', NULL, '$2y$10$1FRdApVmJQEABxzLlsAQs.oBiT/jrQqG92.EO0iExlbwQLq95A/7C', 0, NULL, '2022-09-12 00:08:48', '2022-09-12 23:39:52', 'Tú', '0919118181', '159/23 Phùng Khoang', 'HVCNBCVT', 'Quận Hà Đông', 'Hà Nội', 'Việt Nam', '2209222'),
(5, 'Nguyen Van Tu', 'tu72589tu@gmail.com', NULL, '$2y$10$mw/L9ypxwfb2XmhhBH2CNOZpuK.RaIzV7PLT2elOx5HH8GOieyzYy', 0, NULL, '2022-09-14 18:10:49', '2022-09-14 18:10:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
