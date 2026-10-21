-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Okt 2025 pada 14.29
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbgamal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `public_key` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `private_key` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `public_key`, `private_key`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, '{\"p\":467,\"g\":2,\"y\":\"245\"}', '337', '2025-10-05 02:43:22', '2025-10-05 02:43:22', '2025-10-05 02:43:22'),
(2, '{\"p\":467,\"g\":2,\"y\":\"146\"}', '462', '2025-10-05 02:44:08', '2025-10-05 02:44:08', '2025-10-05 02:44:08'),
(3, '{\"p\":467,\"g\":2,\"y\":\"422\"}', '242', '2025-10-05 02:44:13', '2025-10-05 02:44:13', '2025-10-05 02:44:13'),
(4, '{\"p\":467,\"g\":2,\"y\":\"466\"}', '233', '2025-10-05 02:44:15', '2025-10-05 02:44:16', '2025-10-05 02:44:16'),
(5, '{\"p\":467,\"g\":2,\"y\":\"93\"}', '193', '2025-10-05 02:44:17', '2025-10-05 02:44:18', '2025-10-05 02:44:18'),
(6, '{\"p\":467,\"g\":2,\"y\":\"157\"}', '18', '2025-10-05 02:44:20', '2025-10-05 02:44:20', '2025-10-05 02:44:20'),
(7, '{\"p\":467,\"g\":2,\"y\":\"287\"}', '244', '2025-10-05 02:44:22', '2025-10-05 02:44:22', '2025-10-05 02:44:22'),
(8, '{\"p\":467,\"g\":2,\"y\":\"454\"}', '263', '2025-10-05 02:44:24', '2025-10-05 02:44:24', '2025-10-05 02:44:24'),
(9, '{\"p\":467,\"g\":2,\"y\":\"447\"}', '276', '2025-10-05 02:44:26', '2025-10-05 02:44:26', '2025-10-05 02:44:26'),
(10, '{\"p\":467,\"g\":2,\"y\":\"403\"}', '239', '2025-10-05 02:44:29', '2025-10-05 02:44:29', '2025-10-05 02:44:29'),
(11, '{\"p\":467,\"g\":2,\"y\":\"87\"}', '197', '2025-10-05 02:44:31', '2025-10-05 02:44:31', '2025-10-05 02:44:31'),
(12, '{\"p\":467,\"g\":2,\"y\":\"415\"}', '265', '2025-10-05 02:44:45', '2025-10-05 02:44:39', '2025-10-05 02:44:45'),
(13, '{\"p\":467,\"g\":2,\"y\":\"3\"}', '450', '2025-10-05 02:53:43', '2025-10-05 02:51:14', '2025-10-05 02:53:43'),
(14, '{\"p\":3089,\"g\":3,\"y\":\"2638\"}', '1835', '2025-10-05 02:58:36', '2025-10-05 02:58:36', '2025-10-05 02:58:36'),
(15, '{\"p\":2939,\"g\":2,\"y\":\"647\"}', '1489', '2025-10-05 02:58:47', '2025-10-05 02:58:47', '2025-10-05 02:58:47'),
(16, '{\"p\":3701,\"g\":2,\"y\":\"2380\"}', '60', '2025-10-05 03:53:55', '2025-10-05 03:01:13', '2025-10-05 03:53:55'),
(17, '{\"p\":2141,\"g\":2,\"y\":\"906\"}', '865', '2025-10-05 19:27:12', '2025-10-05 19:25:56', '2025-10-05 19:27:12'),
(18, '{\"p\":2693,\"g\":2,\"y\":\"1484\"}', '771', '2025-10-05 19:55:47', '2025-10-05 19:55:47', '2025-10-05 19:55:47'),
(19, '{\"p\":443,\"g\":2,\"y\":\"186\"}', '56', '2025-10-05 20:05:07', '2025-10-05 19:57:18', '2025-10-05 20:05:07'),
(20, '{\"p\":4079,\"g\":11,\"y\":\"988\"}', '1322', '2025-10-05 20:20:20', '2025-10-05 20:18:39', '2025-10-05 20:20:20'),
(21, '{\"p\":3433,\"g\":5,\"y\":\"1627\"}', '3109', '2025-10-15 02:39:29', '2025-10-15 02:38:54', '2025-10-15 02:39:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_10_05_085313_create_keys__table', 2),
(6, '2025_10_05_094221_create_keys_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
