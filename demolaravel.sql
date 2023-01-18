-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 18, 2023 lúc 03:43 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demolaravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qty` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `total_price` double(8,2) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `desc`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Technology', 'Here is a short description of Technology', 'ACTIVE', '2023-01-06 01:31:00', '2023-01-06 01:31:00'),
(2, 'Electronice', 'Here is a short description of Electronice', 'ACTIVE', '2023-01-06 01:31:00', '2023-01-06 01:31:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `credentials`
--

CREATE TABLE `credentials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `accessToken` varchar(255) NOT NULL,
  `refreshToken` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '2010_10_11_104939_create_roles_table', 1),
(22, '2014_10_12_000000_create_users_table', 1),
(23, '2014_10_12_100000_create_password_resets_table', 1),
(24, '2019_08_19_000000_create_failed_jobs_table', 1),
(25, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(26, '2022_12_24_104358_create_categories_table', 1),
(27, '2022_12_24_104418_create_products_table', 1),
(28, '2022_12_24_111812_create_permissions_table', 1),
(29, '2022_12_26_043647_create_credentials_table', 1),
(30, '2023_01_05_043600_create_carts_table', 1),
(31, '2023_01_07_021224_alter_change_img_to_image_product_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `images` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `qty`, `price`, `images`, `desc`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'iPhone 14 Pro Max', 10, 99.99, 'https://cdn.tgdd.vn/Products/Images/42/251192/iphone-14-pro-max-purple-1.jpg', 'Apple', 'ACTIVE', 1, '2023-01-06 01:31:00', '2023-01-17 19:16:33'),
(2, 'Macbook Pro M2', 20, 599.99, 'https://cdn.tgdd.vn/Products/Images/44/282828/apple-macbook-pro-13-inch-m2-2022-1.jpg', 'Apple', 'ACTIVE', 1, '2023-01-06 01:31:00', '2023-01-06 01:31:00'),
(3, 'iPad Pro M2', 50, 199.99, 'https://cdn.tgdd.vn/Products/Images/522/269331/ipad-pro-m1-129-inch-wifi-2021-1.jpeg', 'Apple', 'ACTIVE', 1, '2023-01-06 01:31:00', '2023-01-06 01:31:00'),
(4, 'Rolls Royce Cullinan', 1, 19999.99, 'https://tinbanxe.vn/uploads/news/gia-xe/rolls-royce-cullinan-3.jpg', 'Rolls Royce Cullinan là chiếc xe gầm cao đầu tiên của thương hiệu xe Rolls Royce nổi tiếng trên toàn thế giới.            Chiếc tên xe được đặt tên theo viên kim cương thô lớn nhất thế giới.', 'ACTIVE', 2, '2023-01-06 01:31:00', '2023-01-17 19:12:35'),
(5, 'Mercedes Maybach S680 4Matic 2022', 2, 100000.00, 'https://img.tinbanxe.vn/images/Mercedes/S680/2022-mercedes-maybach-s680-removebg-preview.jpg', 'Mercedes Maybach S680 4Matic là phiên bản sedan cao cấp thuộc dòng Maybach S-Class, So với S-class tiêu chuẩn,\r\n             phần đầu xe có mặt lưới tản nhiệt đặc trưng của Maybach, bao quanh bởi viền crôm, tích hợp camera để lộ.', 'ACTIVE', 2, '2023-01-06 01:31:00', '2023-01-06 01:31:00'),
(6, 'Range Rover SVautobiography Lwb 3.0 2023', 5, 50000.00, 'https://autopro8.mediacdn.vn/2020/3/13/range-rover-svautobiography-joshua-5-1584083406930122854946.jpg', 'Land Rover Range Rover SVautoBiography LWB là phiên bản cao cấp nhất với trục cơ sở kéo dài của dòng xe SUV\r\n            hạng sang cỡ lớn Land Rover Range Rover, sản phẩm của nhà sản xuất Jaguar Land Rover, Anh Quốc.', 'ACTIVE', 2, '2023-01-06 01:31:00', '2023-01-06 01:31:00'),
(7, 'Mercedes G800 Brabus', 2, 80000.00, 'https://photo-cms-kienthuc.epicdn.me/zoom/800/uploaded/ctvlanbanh/2021_04_08/mmm/mercedes-amg-g63-brabus-dat-gap-3-lan-chinh-hang-sap-ve-viet-nam.png', 'MERCEDES G800 Brabus công suất của xe đã đạt 800 mã lực và mô men xoắn lên tới 1.000 Nm.            Sức mạnh kể trên giúp Mercedes-AMG G63 Brabus 800 Widestar 2021 chỉ mất 4,1 giây để tăng tốc từ 0-100 km/giờ.', 'ACTIVE', 2, '2023-01-06 01:31:00', '2023-01-17 19:12:04'),
(8, 'TV Samsung 63\"', 8, 178.88, 'http://cdn.tgdd.vn/Files/2014/04/03/540338/Hinh-anh-vuot-troi-cong-nghe-Clean-View-1.jpg', 'TV Samsung 63\"', 'DEACTIVE', 1, '2023-01-06 01:31:00', '2023-01-17 19:27:05'),
(9, 'Apple Watch S7 GPS 41 mm', 10, 99.99, 'https://cdn.tgdd.vn/Products/Images/7077/249906/Kit/apple-watch-s7-41mm-note.jpg', 'Chiếc smartwatch thế hệ thứ 7 được nhà Táo trang bị màn hình OLED 1.61 inch với viền màn hình mỏng hơn 40%, nâng diện tích màn hình lên 20% và nội dung hiển thị trên màn hình cũng nhiều hơn 50% so với thế hệ cũ.', 'ACTIVE', 1, '2023-01-17 19:18:48', '2023-01-17 19:21:27'),
(10, 'iMac Pro 2022', 79, 799.99, 'https://www.macworld.com/wp-content/uploads/2023/01/2019-imacs-4.jpg?quality=50&strip=all', 'iMac Pro 2022 là một sự kết hợp hoàn hảo từ thiết kế cho đến sức mạnh. Với vẻ đẹp sang trọng cùng với “nội lực” mạnh mẽ, iMac Pro 2022 chính là một sản phẩm được nhiều người khao khát sở hữu.', 'ACTIVE', 1, '2023-01-17 19:26:43', '2023-01-17 19:26:43'),
(11, 'Tai nghe Bluetooth AirPods Pro Wireless Charge Apple MWP22', 68, 59.99, 'https://cdn.tgdd.vn/Products/Images/54/236026/airpods-pro-wireless-charge-apple-mwp22-ava-1-org.jpg', 'Tai nghe Bluetooth AirPods Pro Wireless Charge Apple MWP22 nổi bật với kiểu dáng gọn gàng, sang trọng và được thiết kế theo dạng In-ear thay vì Earbuds như AirPods 2.', 'ACTIVE', 1, '2023-01-17 19:29:03', '2023-01-17 19:29:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `desc`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 'Here is a short description of role Admin', 'ACTIVE', '2023-01-06 01:31:00', '2023-01-06 01:31:00'),
(2, 'MODERATOR', 'Here is a short description of role Moderator', 'ACTIVE', '2023-01-06 01:31:00', '2023-01-06 01:31:00'),
(3, 'MEMBER', 'Here is a short description of role Member', 'ACTIVE', '2023-01-06 01:31:00', '2023-01-06 01:31:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `avt` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `avt`, `address`, `phonenumber`, `email`, `status`, `email_verified_at`, `password`, `remember_token`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'https://via.placeholder.com/640x480.png/00dd99?text=odit', 'Ha Noi', '0998689866', 'admin@gmail.com', 'ACTIVE', NULL, '$2y$10$pZtP7H9o5TiYa8E3R.levOvuHOUKDFJalhI32RRki37VkEBDqZi3K', NULL, 1, '2023-01-06 01:31:00', '2023-01-06 01:31:00'),
(2, 'Moderator', 'https://via.placeholder.com/640x480.png/00ccee?text=voluptatum', 'Hai Phong', '0989056896', 'mod@gmail.com', 'ACTIVE', NULL, '$2y$10$fhkvX6KYzkv0UdDaxf1tAO7QyvpuBRad6aKcU0HfshlNcfwje1P5e', NULL, 2, '2023-01-06 01:31:00', '2023-01-06 01:31:00'),
(3, 'User', 'https://via.placeholder.com/640x480.png/002222?text=est', 'TP Ho Chi Minh', '0986966906', 'user@gmail.com', 'ACTIVE', NULL, '$2y$10$4c8qaiu1HbiT7zYydrrrYOoskMO0nFYATK230Q9QfY45E61Dd4u/2', NULL, 3, '2023-01-06 01:31:00', '2023-01-06 01:31:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Chỉ mục cho bảng `credentials`
--
ALTER TABLE `credentials`
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
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `credentials`
--
ALTER TABLE `credentials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
