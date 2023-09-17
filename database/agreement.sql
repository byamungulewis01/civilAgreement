-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2023 at 01:48 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agreement`
--

-- --------------------------------------------------------

--
-- Table structure for table `agreements`
--

CREATE TABLE `agreements` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partyOne` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partyTwo` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','accepted','rejected','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `acceptedDate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejectedDate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completedDate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whoToPay` enum('me','other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agreements`
--

INSERT INTO `agreements` (`id`, `category`, `description`, `amount`, `partyOne`, `partyTwo`, `status`, `acceptedDate`, `rejectedDate`, `completedDate`, `duration`, `whoToPay`, `created_by`, `created_at`, `updated_at`) VALUES
('9a2036a6-65f4-4187-a0ef-dc51731fd495', 'Kugurisha Machine', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release o', '300000', '9a203228-832f-4536-89b0-5c9511ba8aa5', '9a2031fa-c3e6-4d9c-a0a0-374650a57cd1', 'accepted', '2023-09-13 19:10:46', NULL, NULL, '2023-09-13 to 2023-09-30', 'me', '9a203228-832f-4536-89b0-5c9511ba8aa5', '2023-09-13 16:57:45', '2023-09-13 17:10:46'),
('9a203c19-80fc-445a-ad05-d5e22bddbc05', 'Amasezerano Nzishura', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release', '100000', '9a203228-832f-4536-89b0-5c9511ba8aa5', '9a203261-bfb8-43ef-8f35-152572007a90', 'rejected', '2023-09-13 19:14:52', NULL, NULL, '2023-08-28 to 2023-09-05', 'me', '9a203228-832f-4536-89b0-5c9511ba8aa5', '2023-09-13 17:12:59', '2023-09-13 17:14:52'),
('9a205148-f0e1-4705-a7ab-774932c09061', 'Amasezerano', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release o', '1000', '9a2031fa-c3e6-4d9c-a0a0-374650a57cd1', '9a203228-832f-4536-89b0-5c9511ba8aa5', 'completed', '2023-09-13 20:13:03', NULL, NULL, '2023-08-28 to 2023-08-31', 'other', '9a2031fa-c3e6-4d9c-a0a0-374650a57cd1', '2023-09-13 18:12:13', '2023-09-14 05:24:46'),
('9a20550d-d2a4-44b5-81ff-4199b43a5906', 'sample testing', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release o', '2000', '9a203261-bfb8-43ef-8f35-152572007a90', '9a203228-832f-4536-89b0-5c9511ba8aa5', 'rejected', NULL, '2023-09-13 22:55:20', NULL, '2023-09-01 to 2023-09-05', 'me', '9a203261-bfb8-43ef-8f35-152572007a90', '2023-09-13 18:22:46', '2023-09-13 20:55:20'),
('9a212ef0-34f2-47a9-9c1f-bb37ecb1ca57', 'Amasezerano Azishyurwa', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release o', '300', '9a203228-832f-4536-89b0-5c9511ba8aa5', '9a203342-311e-451a-942d-b1b52d2e6710', 'pending', NULL, NULL, NULL, '2023-09-14 to 2023-09-16', 'other', '9a203228-832f-4536-89b0-5c9511ba8aa5', '2023-09-14 04:32:01', '2023-09-14 04:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `civilians`
--

CREATE TABLE `civilians` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `national_id` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `password_reset` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `civilians`
--

INSERT INTO `civilians` (`id`, `name`, `phone`, `email`, `email_verified_at`, `national_id`, `national_id_image`, `password`, `status`, `password_reset`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
('9a2031fa-c3e6-4d9c-a0a0-374650a57cd1', 'UWINEZA Landrine', '0783663636', 'uwineza@gmail.com', NULL, '1199837773727287', '1694630681.jpg', '$2y$10$0hC/YTfXU5pU8besntUFaOQf4YQasWlCSsY1EE4fFQOYsRpR2pB8C', '1', NULL, '9a202f6d-1261-4c9b-95ed-ad296a1f9d99', NULL, '2023-09-13 16:44:41', '2023-09-13 16:44:41'),
('9a203228-832f-4536-89b0-5c9511ba8aa5', 'BYAMUNGU Lewis', '0783736327', 'byamungu@gmail.com', NULL, '1199882987837827', '1694630711.jpg', '$2y$10$MqIJycGvoHUV5V2b0SYx0.qgO72PY1NMDB3iSpztIQ.CmBrj0DKfG', '1', NULL, '9a202f6d-1261-4c9b-95ed-ad296a1f9d99', NULL, '2023-09-13 16:45:11', '2023-09-13 16:45:11'),
('9a203261-bfb8-43ef-8f35-152572007a90', 'NDIKUMANA Eric', '0783667272', 'ndikumanaeric@gmail.com', NULL, '1192727728822223', '1694630748.PNG', '$2y$10$wwWi5tcTSO/.XCC.AveFJeNgNIDhx2lmxAuh.dN9FfoNUtgEooCCm', '1', NULL, '9a202f6d-1261-4c9b-95ed-ad296a1f9d99', NULL, '2023-09-13 16:45:48', '2023-09-13 16:45:48'),
('9a2032b1-792d-4155-8312-9a3191a415ee', 'NDAGIJIMANA Enock', '0783762767', 'ndagijimana@gmail.com', NULL, '1199838282920929', '1694630801.PNG', '$2y$10$M0gqtPKVkv0VOpua0P7oz.wquag0UU4hKthDG5ODKyK/ht.vyIARS', '2', NULL, '9a202f6d-1261-4c9b-95ed-ad296a1f9d99', NULL, '2023-09-13 16:46:41', '2023-09-13 16:51:56'),
('9a2032f3-0335-49cf-b090-e8d85e7d0374', 'MUKARUGINA Aisha', '0784837373', 'mukarugina@gmail.com', NULL, '1192092983839393', '1694630844.jpg', '$2y$10$uG8V4fYglxRY6x5djjWAWe4rMROJV4u4EHlf/YQCb72TEaio42bPO', '1', NULL, '9a202f6d-1261-4c9b-95ed-ad296a1f9d99', NULL, '2023-09-13 16:47:24', '2023-09-13 16:47:24'),
('9a203342-311e-451a-942d-b1b52d2e6710', 'CYUZUZO Diane', '0733636633', 'cyuzuzodi@gmail.com', NULL, '1189928282983883', '1694630895.jpg', '$2y$10$dt7u0m1zid3JgCyeqsvhnebSSXUu6MmVnAQ5BHwQh0To71l6Lo8Bi', '2', NULL, '9a202f6d-1261-4c9b-95ed-ad296a1f9d99', NULL, '2023-09-13 16:48:16', '2023-09-13 16:51:00'),
('9a20339a-de7e-425d-a5c2-1cdb28e722f8', 'MURINGI Angel', '0886756454', 'murungi@yahoo.fr', NULL, '1129939939388883', '1694630954.PNG', '$2y$10$GCY5dONtKzenD6nuxBe9eOPSgo0cQos7o9N8BnMnhf3.9t3XRWEVi', '3', NULL, '9a202f6d-1261-4c9b-95ed-ad296a1f9d99', '2023-09-13 16:50:06', '2023-09-13 16:49:14', '2023-09-13 16:50:06'),
('9a203475-db5d-436d-8c1d-448056e8b925', 'ABIMANA Nuru', '0783772727', 'abimana@gmail.com', NULL, '1229393939388833', '1694631097.jpg', '$2y$10$BfW/ifMs27m4iSY/TBxdEOZSJCcGQfinJ4qJBWxSx4BviCTyLuIeu', '1', NULL, '9a202f6d-1261-4c9b-95ed-ad296a1f9d99', NULL, '2023-09-13 16:51:37', '2023-09-13 16:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_06_14_195602_create_civilians_table', 1),
(4, '2023_07_25_105514_create_agreements_table', 1),
(5, '2023_07_28_071635_create_payments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agreement_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('deposit','withdrawal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `transactionReference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `agreement_id`, `type`, `amount`, `status`, `transactionReference`, `created_at`, `updated_at`) VALUES
('9a204783-9f40-45a9-9d44-b0775190121c', '9a2036a6-65f4-4187-a0ef-dc51731fd495', 'deposit', '200000', 'pending', NULL, '2023-09-13 17:44:54', '2023-09-13 17:44:54'),
('9a2047fe-ad31-4555-af8a-f4f32700bf4e', '9a2036a6-65f4-4187-a0ef-dc51731fd495', 'withdrawal', '200000', 'pending', NULL, '2023-09-13 17:46:15', '2023-09-13 17:46:15'),
('9a205571-d2cd-4185-a0d3-5dc9f3e9fe1d', '9a205148-f0e1-4705-a7ab-774932c09061', 'deposit', '100', 'pending', NULL, '2023-09-13 18:23:51', '2023-09-13 18:23:51'),
('9a2085c9-23cf-408a-a845-e58f66bb664e', '9a205148-f0e1-4705-a7ab-774932c09061', 'withdrawal', '100', 'pending', NULL, '2023-09-13 20:39:01', '2023-09-13 20:39:01'),
('9a2141ce-496f-42c0-858f-552fa17ccbcc', '9a205148-f0e1-4705-a7ab-774932c09061', 'deposit', '800', 'pending', NULL, '2023-09-14 05:24:46', '2023-09-14 05:24:46'),
('9a214280-d81f-40cb-ad54-a6b3a579e3bd', '9a205148-f0e1-4705-a7ab-774932c09061', 'deposit', '100', 'pending', NULL, '2023-09-14 05:26:43', '2023-09-14 05:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_reseted` tinyint(1) NOT NULL DEFAULT 0,
  `role` enum('admin','judge') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `password_reseted`, `role`, `status`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
('9a202f6d-1261-4c9b-95ed-ad296a1f9d99', 'BYAMUNGU Lewis', '0785436135', 'bmg@gmail.com', '2023-09-13 16:37:32', '$2y$10$fXJz08iZsklnptV7xMZzfuAQOSkxsTEuYdevKtf6V7g4qAkzqOMgG', 0, 'admin', '1', NULL, '7nPzMkXUtA2ghV5VPLSmsXqKrcTm2LX5WBXtWbVXxV6r9az0GWoQKR6tJml6', '2023-09-13 16:37:33', '2023-09-13 16:38:54'),
('9a202f6d-7102-4656-9b9b-dff6ee369855', 'UWINEZA Landrine', '0780983883', 'landrine@gmail.com', '2023-09-13 16:37:33', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'judge', '1', NULL, 'uheeGMZQk0', '2023-09-13 16:37:33', '2023-09-13 16:37:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agreements`
--
ALTER TABLE `agreements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agreements_partyone_foreign` (`partyOne`),
  ADD KEY `agreements_partytwo_foreign` (`partyTwo`),
  ADD KEY `agreements_created_by_foreign` (`created_by`);

--
-- Indexes for table `civilians`
--
ALTER TABLE `civilians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `civilians_phone_unique` (`phone`),
  ADD UNIQUE KEY `civilians_email_unique` (`email`),
  ADD UNIQUE KEY `civilians_national_id_unique` (`national_id`),
  ADD KEY `civilians_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_agreement_id_foreign` (`agreement_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agreements`
--
ALTER TABLE `agreements`
  ADD CONSTRAINT `agreements_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `civilians` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `agreements_partyone_foreign` FOREIGN KEY (`partyOne`) REFERENCES `civilians` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `agreements_partytwo_foreign` FOREIGN KEY (`partyTwo`) REFERENCES `civilians` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `civilians`
--
ALTER TABLE `civilians`
  ADD CONSTRAINT `civilians_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_agreement_id_foreign` FOREIGN KEY (`agreement_id`) REFERENCES `agreements` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
