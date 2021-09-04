-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 03, 2021 at 08:54 AM
-- Server version: 10.2.40-MariaDB-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diar2386_mais`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `cabang` int(11) NOT NULL,
  `level` varchar(128) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `cabang`, `level`, `created_at`, `updated_at`) VALUES
('2b8H9ZU7qnrMgEj2T3fQnXGGt53LQsRG', 'Cabang1', 'Cabang1', '03e93dd373a88af75c3c57836dc82fbc0f088de39d981b2f3285825e86dc0ecc', 1, 'Super', '2021-08-22 07:26:53', '2021-08-22 07:26:53'),
('8K3LdOFerVICSkMGbxPWuyJc5OLg3VTF', 'Rico Adityo', 'Cabang3', '0ddf572359c3c4ec4cab08ce656c598697a598ba33dbd9952bac528a67780b89', 3, 'Super', '2021-08-23 07:06:32', '2021-08-23 07:06:32'),
('jMJKw8QCgqProMO77Ivh31i3mrLDEQXR', 'Cabang4', 'Cabang4', 'c693ae72d8fa3f0df36b7c03480f5067a6f21bcf7423ae288599ca027ee1eb6c', 4, 'Super', '2021-08-23 07:08:07', '2021-08-23 07:08:07'),
('yHJipty4PcnAs59amIcmPHB0iUDlW9gW', 'Anisa rochma', 'Cabang2', '7d09bae0a923ac80ecb01f457c9fd20bf62014ea740adec4ef02bb0d0207e909', 2, 'Super', '2021-08-23 07:05:55', '2021-08-23 07:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id_cabang` int(11) NOT NULL,
  `kota` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id_cabang`, `kota`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Surabaya', 'Jl. Tembok Dukuh 60i', '2021-08-19 07:38:44', '2021-08-19 07:38:44'),
(2, 'Surabaya', 'Jl. Simo Kwagean 29', '2021-08-22 15:18:37', '2021-08-22 15:18:37'),
(3, 'Surabaya', 'Jl. Manukan Raya Kulon 36', '2021-08-22 15:19:33', '2021-08-22 15:19:33'),
(4, 'Kediri', 'Jl. Matahari No. 30, Pare', '2021-08-22 15:20:33', '2021-08-22 15:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `detail_kursus`
--

CREATE TABLE `detail_kursus` (
  `id_detail` varchar(128) NOT NULL,
  `kursus` int(11) DEFAULT NULL,
  `program` int(11) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `catatan_kursus` text DEFAULT NULL,
  `hari_kursus` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `jam_kursus` varchar(128) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `uang_pendaftaran` int(11) DEFAULT NULL,
  `uang_kursus` int(11) DEFAULT NULL,
  `uang_ujian_sertifikat` int(11) DEFAULT NULL,
  `uang_buku` int(11) DEFAULT NULL,
  `uang_peralatan` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal_daftar` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_kursus`
--

INSERT INTO `detail_kursus` (`id_detail`, `kursus`, `program`, `level`, `catatan_kursus`, `hari_kursus`, `jam_kursus`, `no_urut`, `uang_pendaftaran`, `uang_kursus`, `uang_ujian_sertifikat`, `uang_buku`, `uang_peralatan`, `jumlah`, `tanggal_daftar`, `created_at`, `updated_at`) VALUES
('0eV7YIjtdAgcgKKLxGosq5h4FNXCcgoO', 6, 41, 26, NULL, 'Senin', '09.00', 4, 0, 1500000, 0, 0, 0, 1500000, '2021-07-30 17:00:00', '2021-08-23 06:21:46', '2021-08-23 11:10:25'),
('0Tx6ZNmFqfo7RDf6RQMDA1r9EQXnidfY', 4, 3, 26, NULL, 'Senin', '09.00', 39, 75000, 100000, 0, 70000, 0, 245000, '2021-07-22 17:00:00', '2021-08-29 11:54:33', '2021-08-29 11:54:33'),
('1yKJhlsSsnMyMo9n4QPOiIxhgLWuFaNl', 6, 41, 26, NULL, 'Senin', '09.00', 2, 0, 1500000, 0, 0, 0, 1500000, '2021-07-30 17:00:00', '2021-08-23 06:16:52', '2021-08-23 11:08:55'),
('2lIj0X4y2nSEHKX9IY74KQ40MS2hKGZl', 4, 4, 26, NULL, 'Senin', '09.00', 31, 75000, 100000, 0, 30000, 0, 205000, '2021-07-08 17:00:00', '2021-08-29 11:15:49', '2021-08-29 12:45:43'),
('3JZyOkawnAD2Rocg0rOjfXqFP4L8Y8zN', 7, 43, 18, NULL, 'Senin', '09.00', 52, 75000, 180000, 0, 0, 0, 255000, '2021-07-15 17:00:00', '2021-08-29 13:00:48', '2021-08-29 13:00:48'),
('3XEajPPgZygcv1IWZO45lVfXwyuqELGU', 6, 41, 26, NULL, 'Senin', '09.00', 11, 0, 1500000, 0, 0, 0, 1500000, '2021-07-29 17:00:00', '2021-08-23 06:34:07', '2021-08-23 11:13:18'),
('4XdHhZQDtBmNmBD6cmLnmoZTD0hVi8s7', 7, 43, 17, NULL, 'Senin', '09.00', 60, 75000, 150000, 0, 0, 0, 225000, '2021-07-27 17:00:00', '2021-08-29 13:38:19', '2021-08-29 13:38:19'),
('7dKrxHJ4DcGVBSUfk3cc4km2S0mVdnWO', 6, 41, 26, NULL, 'Senin', '09.00', 12, 0, 1500000, 0, 0, 0, 1500000, '2021-07-30 17:00:00', '2021-08-23 06:35:33', '2021-08-23 11:13:40'),
('7sp4jRvZ3VyL4hgUOaak9mQp0sFnyo7t', 7, 43, 18, NULL, 'Senin', '09.00', 53, 75000, 225000, 0, 0, 0, 300000, '2021-07-16 17:00:00', '2021-08-29 13:03:43', '2021-08-29 13:03:43'),
('8ekxUUayqrnHnRGmxcswFYMhRjKo1Xsl', 7, 43, 18, NULL, 'Senin', '09.00', 54, 75000, 575000, 0, 0, 0, 650000, '2021-07-17 17:00:00', '2021-08-29 13:10:12', '2021-08-29 13:10:12'),
('8HczIdo0uNbNlgq6pB7cGp9F3ymLI7oS', 4, 3, 26, NULL, 'Senin', '09.00', 42, 75000, 100000, 0, 70000, 0, 245000, '2021-07-27 17:00:00', '2021-08-29 12:02:53', '2021-08-29 12:02:53'),
('9OVEEcwUjOsEvwT91ZSvx0zxOGz5lcSy', 5, 39, 26, NULL, 'Senin', '09.00', 64, 75000, 150000, 75000, 30000, 0, 330000, '2021-07-26 17:00:00', '2021-08-29 14:00:17', '2021-08-29 14:00:17'),
('9UA5bUiRHCbXupQgRKrdJmEwymvR6EtL', 4, 3, 26, NULL, 'Senin', '09.00', 32, 0, 100000, 0, 70000, 0, 170000, '2021-07-09 17:00:00', '2021-08-29 11:31:05', '2021-08-29 11:31:05'),
('bDBVc89xkuqj71uxhQdWqhSKAX1cgVG0', 4, 3, 26, NULL, 'Senin', '09.00', 43, 75000, 0, 0, 80000, 0, 155000, '2021-07-30 17:00:00', '2021-08-29 12:07:09', '2021-08-29 12:07:09'),
('BLBtQUqKrf3ONpcjrCiMS0LU3fAvuK6r', 6, 40, 26, NULL, 'Senin', '09.00', 20, 0, 4000000, 0, 0, 0, 4000000, '2021-07-29 17:00:00', '2021-08-23 07:24:43', '2021-08-23 11:21:05'),
('BqEN0a8e1bDGp5o781f2gxv8Zo5QbAAy', 7, 43, 18, NULL, 'Senin', '09.00', 56, 75000, 180000, 0, 0, 0, 255000, '2021-07-22 17:00:00', '2021-08-29 13:15:23', '2021-08-29 13:15:23'),
('c7ZNTPKlMyaofSlWAmK2CBoM0Wm160sd', 6, 41, 26, NULL, 'Senin', '09.00', 9, 0, 1500000, 0, 0, 0, 1500000, '2021-07-29 17:00:00', '2021-08-23 06:30:58', '2021-08-23 11:12:44'),
('CN84OIsFX9Fun2057BBsZ0wo0Wm1Ia3h', 5, 39, 26, NULL, 'Senin', '09.00', 62, 0, 310000, 0, 0, 0, 310000, '2021-07-09 17:00:00', '2021-08-29 13:51:18', '2021-08-30 03:12:40'),
('CqeS1Mc3bbhukExOv0PnmvchB1UUem0X', 7, 43, 17, NULL, 'Senin', '09.00', 48, 0, 150000, 0, 0, 0, 150000, '2021-07-08 17:00:00', '2021-08-29 12:38:23', '2021-08-29 12:38:23'),
('Cs5G8wOCSRkmZ0E7hL9o8IwI6DINTZEM', 6, 40, 26, NULL, 'Senin', '09.00', 15, 0, 4000000, 0, 0, 0, 4000000, '2021-07-30 17:00:00', '2021-08-23 06:58:20', '2021-08-23 11:19:31'),
('diL14knrjZ7O3vuysMcUhYvhQbsxAbuh', 6, 41, 26, NULL, 'Senin', '09.00', 7, 0, 1500000, 0, 0, 0, 1500000, '2021-07-29 17:00:00', '2021-08-23 06:27:03', '2021-08-23 11:11:54'),
('DKRJwA8v8ls0mu4BAlEBDYrH4KPEZFEX', 6, 40, 26, NULL, 'Senin', '09.00', 16, 0, 4000000, 0, 0, 0, 4000000, '2021-07-29 17:00:00', '2021-08-23 07:15:12', '2021-08-23 11:19:48'),
('dkt4VorbjttrYrlgaHphr2OWRhwKEwK1', 7, 43, 18, NULL, 'Selasa', '09.00', 59, 75000, 0, 0, 0, 0, 75000, '2021-07-26 17:00:00', '2021-08-29 13:32:51', '2021-08-29 13:32:51'),
('e6Tx5qZRKyeqsxBvF7lhpUti4DkONx1C', 6, 41, 26, NULL, 'Senin', '09.00', 3, 0, 1500000, 0, 0, 0, 1500000, '2021-07-29 17:00:00', '2021-08-23 06:19:00', '2021-08-23 11:10:07'),
('FJS9TNJFbWV0XkkZ65nRa58cY3r7DHJQ', 2, 21, 26, NULL, 'Senin', '09.00', 23, 75000, 0, 25000, 0, 0, 100000, '2021-07-09 17:00:00', '2021-08-29 08:00:24', '2021-08-29 08:00:24'),
('fs8XmaHPxMt9RUNFc4Tm63BWmLd4wept', 4, 2, 26, NULL, 'Senin', '09.00', 37, 75000, 100000, 0, 30000, 0, 205000, '2021-07-18 17:00:00', '2021-08-29 11:47:29', '2021-08-29 11:47:29'),
('g4dzeNv2JYzhERP2LiNg46HyOL5osJ1h', 7, 43, 19, NULL, 'Selasa', '09.00', 58, 75000, 225000, 0, 0, 0, 300000, '2021-07-26 17:00:00', '2021-08-29 13:27:34', '2021-08-29 13:27:34'),
('gNRc3oA1A4m2v0twlL0R35rfFcvPOUlj', 4, 5, 26, NULL, 'Senin', '09.00', 35, 0, 750000, 0, 0, 0, 750000, '2021-07-17 17:00:00', '2021-08-29 11:42:03', '2021-08-29 11:42:03'),
('gVWWFGMDN2yADtJzFE91FVOg7cOtZg5a', 4, 4, 26, NULL, 'Senin', '09.00', 45, 75000, 100000, 0, 70000, 0, 245000, '2021-07-28 17:00:00', '2021-08-29 12:19:44', '2021-08-29 12:19:44'),
('hH0EB224B0ojhk3apFNvHg37A0tMltZP', 6, 41, 26, NULL, 'Senin', '09.00', 8, 0, 1500000, 0, 0, 0, 1500000, '2021-07-29 17:00:00', '2021-08-23 06:28:53', '2021-08-23 11:12:17'),
('hvKbqBWNPfKzKZg7MKgMJBvZn8S9jFCJ', 7, 43, 18, NULL, 'Senin', '09.00', 46, 75000, 225000, 0, 0, 0, 300000, '2021-07-01 17:00:00', '2021-08-29 12:29:37', '2021-08-29 12:29:37'),
('hZoKM6EjnJdcdIt5CDSxqG9o9C100ZhJ', 6, 41, 26, NULL, 'Senin', '09.00', 5, 0, 1500000, 0, 0, 0, 1500000, '2021-07-29 17:00:00', '2021-08-23 06:23:41', '2021-08-23 11:10:43'),
('IHqieR1ov9T126jwfuAea1VpaWLTpOJ5', 2, 21, 26, NULL, 'Senin', '09.00', 21, 75000, 450000, 75000, 0, 0, 600000, '2021-07-04 17:00:00', '2021-08-26 02:37:38', '2021-08-26 02:37:38'),
('j4Nz1hhCa3MgRBxmutsPxFLi1Uo6k7p9', 2, 21, 26, NULL, 'Senin', '09.00', 25, 75000, 0, 0, 0, 0, 75000, '2021-07-25 17:00:00', '2021-08-29 08:17:27', '2021-08-29 08:21:11'),
('jQeqdA5VqfdIFOqsA8TGuk9gIMWlEGZh', 7, 43, 18, NULL, 'Senin', '09.00', 50, 75000, 300000, 0, 0, 0, 375000, '2021-07-15 17:00:00', '2021-08-29 12:50:11', '2021-08-29 12:50:11'),
('JQQSo2LiR09LiKTGZ6XJElyFVaff5J2R', 6, 41, 26, NULL, 'Senin', '09.00', 6, 0, 1500000, 0, 0, 0, 1500000, '2021-07-30 17:00:00', '2021-08-23 06:25:26', '2021-08-23 11:11:19'),
('JU0AN1i0K3yiVpJtCV5jObctrPubmOa8', 4, 3, 26, NULL, 'Senin', '09.00', 40, 75000, 100000, 0, 70000, 0, 245000, '2021-07-26 17:00:00', '2021-08-29 11:57:34', '2021-08-29 11:57:34'),
('kEENKxYrhZiZbuXEPiEDDq8woEKjpjme', 7, 43, 18, NULL, 'Senin', '09.00', 49, 75000, 300000, 0, 0, 0, 375000, '2021-07-13 17:00:00', '2021-08-29 12:45:02', '2021-08-29 12:45:02'),
('KGImTOm1vSrl5N1fn4v7hzkZ8MA1TF3p', 2, 24, 26, NULL, 'Senin', '09.00', 24, 75000, 760000, 75000, 0, 0, 910000, '2021-07-23 17:00:00', '2021-08-29 08:15:41', '2021-08-29 08:21:30'),
('kqC6nSiJm0A2qOPb5DhuvqO9ldnFLO0g', 7, 43, 19, NULL, 'Selasa', '09.00', 57, 0, 2500000, 0, 0, 0, 2500000, '2021-07-25 17:00:00', '2021-08-29 13:18:55', '2021-08-29 13:18:55'),
('LSEGZFeH1aVQjW1SGa6tpCELv9iOyPhh', 7, 43, 17, NULL, 'Senin', '09.00', 55, 75000, 0, 0, 0, 0, 75000, '2021-07-22 17:00:00', '2021-08-29 13:12:13', '2021-08-29 13:12:13'),
('lwDuAXQmWd5v9eOfBpgmANttAhsJxDoS', 4, 3, 26, NULL, 'Senin', '09.00', 41, 75000, 100000, 0, 70000, 0, 245000, '2021-07-26 17:00:00', '2021-08-29 11:59:39', '2021-08-29 11:59:39'),
('N0f0SupUs7YwEuBVVm8Lw7Vgg7I4OhUZ', 4, 3, 26, NULL, 'Senin', '09.00', 44, 75000, 0, 0, 45000, 0, 120000, '2021-07-30 17:00:00', '2021-08-29 12:15:51', '2021-08-29 12:15:51'),
('nl7rUAsG0Viq8SQ8VdXNGPvuBzaBleVF', 6, 40, 26, NULL, 'Senin', '09.00', 18, 0, 4000000, 0, 0, 0, 4000000, '2021-07-29 17:00:00', '2021-08-23 07:21:09', '2021-08-23 11:20:23'),
('NQyL0UtZmATpLnpqCYS1l4yiVyutSaQG', 4, 3, 26, NULL, 'Senin', '09.00', 29, 75000, 150000, 0, 20000, 0, 245000, '2021-07-04 17:00:00', '2021-08-29 08:57:49', '2021-08-29 08:57:49'),
('phN4hJr2614nwzwTIbapcvDztylga6Tt', 6, 41, 26, NULL, 'Senin', '09.00', 1, 0, 1500000, 0, 0, 0, 1500000, '2021-07-29 17:00:00', '2021-08-23 06:13:29', '2021-08-23 11:03:08'),
('PlEsStOEqAphlZBdjTzWqb1OC1hDZ7MQ', 7, 43, 19, NULL, 'Senin', '09.00', 51, 75000, 0, 0, 0, 0, 75000, '2021-07-15 17:00:00', '2021-08-29 12:54:15', '2021-08-29 12:54:15'),
('rh08pszYoTHPpZrroMvU9MN1dQBYfzyh', 4, 3, 26, NULL, 'Senin', '09.00', 34, 75000, 130000, 0, 40000, 0, 245000, '2021-07-17 17:00:00', '2021-08-29 11:39:00', '2021-08-29 11:39:00'),
('rohmrtJQhJUJCUclpg8e8GGsmNuE8vb3', 4, 4, 26, NULL, 'Senin', '09.00', 30, 75000, 150000, 0, 20000, 0, 245000, '2021-07-04 17:00:00', '2021-08-29 09:00:02', '2021-08-29 09:00:02'),
('rT77MlxQ491xmuzMZ0ic6OVdPgnAuoqm', 4, 4, 26, NULL, 'Senin', '09.00', 27, 75000, 100000, 75000, 20000, 0, 270000, '2021-07-02 17:00:00', '2021-08-29 08:50:38', '2021-08-29 08:50:38'),
('sj3oHEXQuI7S8oOBfZtGRD7xWG48SwBi', 6, 40, 26, NULL, 'Senin', '09.00', 65, 0, 4000000, 0, 0, 0, 4000000, '2021-07-30 17:00:00', '2021-08-30 04:25:04', '2021-08-30 04:25:04'),
('tkNwZtiP3dDlYWptzfvVNjEtxDc9Mhbc', 2, 21, 26, NULL, 'Senin', '09.00', 22, 75000, 225000, 0, 0, 0, 300000, '2021-07-04 17:00:00', '2021-08-29 07:33:49', '2021-08-29 07:33:49'),
('tqgCfyFw4QJwdJApTVGIN4Wz6bbYfYdh', 4, 3, 26, NULL, 'Senin', '09.00', 36, 75000, 100000, 0, 70000, 0, 245000, '2021-07-17 17:00:00', '2021-08-29 11:44:43', '2021-08-29 11:44:43'),
('TQUrOMmjupEWT8KVpqA4vQrA6EAsHHE6', 6, 40, 26, NULL, 'Senin', '09.00', 17, 0, 4000000, 0, 0, 0, 4000000, '2021-07-30 17:00:00', '2021-08-23 07:18:21', '2021-08-23 11:20:02'),
('w12CTTGzQffqkQOm6QyNNUCrSWoI7qYV', 7, 43, 19, NULL, 'Selasa', '09.00', 61, 75000, 925000, 0, 0, 0, 1000000, '2021-07-27 17:00:00', '2021-08-29 13:45:37', '2021-08-29 13:45:37'),
('WZ1JpAQi6NJ6BJHEaNNCfNXpskmd3Udd', 7, 43, 18, NULL, 'Senin', '09.00', 47, 75000, 300000, 0, 0, 0, 375000, '2021-08-28 17:00:00', '2021-08-29 12:33:56', '2021-08-29 12:33:56'),
('X4lg54orD3DTjQHQrh16MvX3rAYlOewP', 4, 4, 26, NULL, 'Senin', '09.00', 33, 0, 100000, 0, 30000, 0, 130000, '2021-07-15 17:00:00', '2021-08-29 11:34:19', '2021-08-29 11:34:19'),
('xaYVr2nQ2KAch5LpCe9N9hJguKHBFVNi', 4, 3, 26, NULL, 'Senin', '09.00', 28, 75000, 150000, 0, 20000, 0, 245000, '2021-07-02 17:00:00', '2021-08-29 08:54:10', '2021-08-29 08:54:10'),
('XbSv36xVZF1ESTXfhoVUNGEioCjE6S8a', 2, 24, 26, NULL, 'Senin', '09.00', 26, 75000, 760000, 75000, 0, 0, 910000, '2021-07-27 17:00:00', '2021-08-29 08:24:00', '2021-08-29 08:24:00'),
('xUMLf12WiYMEEAifavGfDCKcSHkyruMc', 6, 41, 26, NULL, 'Senin', '09.00', 10, 0, 1500000, 0, 0, 0, 1500000, '2021-07-30 17:00:00', '2021-08-23 06:32:32', '2021-08-23 11:13:02'),
('YH8CT6zUGCSSBq5FaRjaGSJwTS62XJsY', 6, 40, 26, NULL, 'Senin', '09.00', 19, 0, 4000000, 0, 0, 0, 4000000, '2021-07-30 17:00:00', '2021-08-23 07:22:47', '2021-08-23 11:20:49'),
('YqKwGzO6Bf2SpAahCII6y3V39rus3sHB', 5, 39, 26, NULL, 'Senin', '09.00', 63, 75000, 450000, 75000, 0, 0, 600000, '2021-07-11 17:00:00', '2021-08-29 13:55:17', '2021-08-29 13:55:17'),
('Z9YJsH4pnIq6bPVMkS84FbV2LYctdLy6', 4, 6, 26, NULL, 'Senin', '09.00', 38, 75000, 155000, 0, 70000, 0, 300000, '2021-07-19 17:00:00', '2021-08-29 11:51:56', '2021-08-29 11:51:56'),
('ZvRWzQhCMmwwAmFYhKoYcVVfzfJP23o5', 6, 41, 26, NULL, 'Senin', '09.00', 13, 0, 1500000, 0, 0, 0, 1500000, '2021-07-30 17:00:00', '2021-08-23 06:37:43', '2021-08-23 11:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembayaran`
--

CREATE TABLE `detail_pembayaran` (
  `id_detail_pembayaran` int(11) NOT NULL,
  `id_siswa` varchar(32) NOT NULL,
  `id_detail_kursus` varchar(32) NOT NULL,
  `pembayaran_1` int(11) DEFAULT NULL,
  `pembayaran_2` int(11) DEFAULT NULL,
  `pembayaran_3` int(11) DEFAULT NULL,
  `pembayaran_4` int(11) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` varchar(32) NOT NULL,
  `tanggal` timestamp NULL DEFAULT NULL,
  `keterangan` varchar(128) NOT NULL,
  `jenis_transaksi` varchar(32) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `cabang` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `tanggal`, `keterangan`, `jenis_transaksi`, `jumlah`, `cabang`, `created_at`, `updated_at`) VALUES
('DI-II/10/07/2021/01', '2021-07-09 17:00:00', 'pembayaran awal', 'Pemasukan', 99000, 2, '2021-08-26 01:37:41', '2021-08-26 01:37:41'),
('DI-II/10/07/2021/02', '2021-07-09 17:00:00', 'pembayaran awal', 'Pemasukan', 98700, 2, '2021-08-26 01:44:34', '2021-08-26 01:44:34'),
('DI-II/2/09/2021/01', '2021-09-01 17:00:00', 'pembayaran ke 2', 'Pemasukan', 100000, 2, '2021-09-02 13:30:18', '2021-09-02 13:30:18'),
('DI-II/23/08/2021/01', '2021-08-22 17:00:00', 'Angsuran 1', 'Pemasukan', 600000, 2, '2021-08-23 08:33:25', '2021-08-23 08:33:25'),
('DI-II/24/07/2021/01', '2021-07-23 17:00:00', 'lunas', 'Pemasukan', 900000, 2, '2021-08-26 01:52:26', '2021-08-26 01:52:26'),
('DI-II/25/08/2021/01', '2021-08-24 17:00:00', 'pembayaran kedua', 'Pemasukan', 600000, 2, '2021-08-25 16:14:02', '2021-08-25 16:14:02'),
('DI-II/25/08/2021/02', '2021-08-24 17:00:00', 'Sovia Rahmania Warda\r\nLUNAS', 'Pemasukan', 700000, 2, '2021-08-25 16:17:33', '2021-08-25 16:17:33'),
('DI-II/25/08/2021/03', '2021-08-24 17:00:00', 'Lunas', 'Pemasukan', 700000, 2, '2021-08-25 16:21:41', '2021-08-25 16:21:41'),
('DI-II/25/08/2021/04', '2021-08-24 17:00:00', 'Lunas', 'Pemasukan', 700000, 2, '2021-08-25 16:23:12', '2021-08-25 16:23:12'),
('DI-II/25/08/2021/05', '2021-08-24 17:00:00', 'Lunas', 'Pemasukan', 700000, 2, '2021-08-25 16:27:01', '2021-08-25 16:27:01'),
('DI-II/25/08/2021/06', '2021-08-24 17:00:00', 'Lunas', 'Pemasukan', 700000, 2, '2021-08-25 16:28:33', '2021-08-25 16:28:33'),
('DI-II/25/08/2021/07', '2021-08-24 17:00:00', 'Lunas', 'Pemasukan', 700000, 2, '2021-08-25 16:29:42', '2021-08-25 16:29:42'),
('DI-II/25/08/2021/08', '2021-08-24 17:00:00', 'Lunas', 'Pemasukan', 700000, 2, '2021-08-25 16:30:47', '2021-08-25 16:30:47'),
('DI-II/25/08/2021/09', '2021-08-24 17:00:00', 'lunas', 'Pemasukan', 700000, 2, '2021-08-25 16:31:58', '2021-08-25 16:31:58'),
('DI-II/25/08/2021/10', '2021-08-24 17:00:00', 'lunas', 'Pemasukan', 700000, 2, '2021-08-25 16:35:05', '2021-08-25 16:35:05'),
('DI-II/25/08/2021/11', '2021-08-24 17:00:00', 'lunas', 'Pemasukan', 700000, 2, '2021-08-25 16:36:26', '2021-08-25 16:36:26'),
('DI-II/25/08/2021/12', '2021-08-24 17:00:00', 'lunas', 'Pemasukan', 700000, 2, '2021-08-25 16:39:44', '2021-08-25 16:39:44'),
('DI-II/25/08/2021/13', '2021-08-24 17:00:00', 'lunas', 'Pemasukan', 700000, 2, '2021-08-25 16:43:33', '2021-08-25 16:43:33'),
('DI-II/26/08/2021/01', '2021-08-25 17:00:00', 'lunas', 'Pemasukan', 801300, 2, '2021-08-26 01:48:09', '2021-08-26 01:48:09'),
('DI-II/29/07/2021/01', '2021-07-28 17:00:00', 'pembayaran pertama', 'Pemasukan', 600000, 2, '2021-08-25 16:53:22', '2021-08-25 16:53:22'),
('DI-II/29/07/2021/02', '2021-07-28 17:00:00', 'pembayaran pertama', 'Pemasukan', 300000, 2, '2021-08-25 16:58:11', '2021-08-25 16:58:11'),
('DI-II/29/08/2021/01', '2021-08-28 17:00:00', 'pembayaran', 'Pemasukan', 150000, 2, '2021-08-29 12:39:37', '2021-08-29 12:39:37'),
('DI-II/30/07/2021/01', '2021-07-29 17:00:00', 'Pembayaran pertama', 'Pemasukan', 900000, 2, '2021-08-25 16:10:23', '2021-08-25 16:10:23'),
('DI-II/30/07/2021/02', '2021-07-29 17:00:00', 'pembayaran awal', 'Pemasukan', 800000, 2, '2021-08-25 16:21:15', '2021-08-25 16:21:15'),
('DI-II/30/07/2021/03', '2021-07-29 17:00:00', 'pembayaran pertama', 'Pemasukan', 800000, 2, '2021-08-25 16:26:31', '2021-08-25 16:26:31'),
('DI-II/30/07/2021/04', '2021-07-29 17:00:00', 'Pembayaran pertama', 'Pemasukan', 800000, 2, '2021-08-25 16:29:18', '2021-08-25 16:29:18'),
('DI-II/30/07/2021/05', '2021-07-29 17:00:00', 'pembayaran pertama', 'Pemasukan', 800000, 2, '2021-08-25 16:30:26', '2021-08-25 16:30:26'),
('DI-II/30/07/2021/06', '2021-07-29 17:00:00', 'pembayaran pertama', 'Pemasukan', 800000, 2, '2021-08-25 16:31:36', '2021-08-25 16:31:36'),
('DI-II/30/07/2021/07', '2021-07-29 17:00:00', 'pembayaran pertama', 'Pemasukan', 800000, 2, '2021-08-25 16:36:04', '2021-08-25 16:36:04'),
('DI-II/30/08/2021/01', '2021-08-29 17:00:00', 'coba', 'Pemasukan', 100, 2, '2021-08-30 03:13:13', '2021-08-30 03:13:13'),
('DI-II/31/07/2021/01', '2021-07-30 17:00:00', 'Sovia Rahmania Warda', 'Pemasukan', 800000, 2, '2021-08-25 16:16:25', '2021-08-25 16:16:25'),
('DI-II/31/07/2021/02', '2021-07-30 17:00:00', 'pembayaran pertama', 'Pemasukan', 800000, 2, '2021-08-25 16:22:30', '2021-08-25 16:22:30'),
('DI-II/31/07/2021/03', '2021-07-30 17:00:00', 'Pembayaran pertama', 'Pemasukan', 800000, 2, '2021-08-25 16:28:04', '2021-08-25 16:28:04'),
('DI-II/31/07/2021/04', '2021-07-30 17:00:00', 'pembayaran pertama', 'Pemasukan', 800000, 2, '2021-08-25 16:32:53', '2021-08-25 16:32:53'),
('DI-II/31/07/2021/05', '2021-07-30 17:00:00', 'pembayaran perama', 'Pemasukan', 800000, 2, '2021-08-25 16:37:58', '2021-08-25 16:37:58'),
('DI-II/31/07/2021/06', '2021-07-30 17:00:00', 'pembayaran pertama', 'Pemasukan', 800000, 2, '2021-08-25 16:42:58', '2021-08-25 16:42:58'),
('DI-III/30/07/2021/08', '2021-07-29 17:00:00', 'pembayaran awal', 'Pemasukan', 900000, 3, '2021-08-30 04:31:31', '2021-08-30 04:31:31'),
('DI-III/30/07/2021/09', '2021-07-29 17:00:00', 'pembayaran awal', 'Pemasukan', 900000, 3, '2021-08-30 04:52:10', '2021-08-30 04:52:10'),
('DI-III/30/07/2021/10', '2021-07-29 17:00:00', 'pembayaran awal', 'Pemasukan', 900000, 3, '2021-08-30 05:12:43', '2021-08-30 05:12:43'),
('DI-III/31/07/2021/07', '2021-07-30 17:00:00', 'pembayaran awal', 'Pemasukan', 900000, 3, '2021-08-30 04:55:41', '2021-08-30 04:55:41'),
('DI-III/31/07/2021/08', '2021-07-30 17:00:00', 'pembayaran awal', 'Pemasukan', 900000, 3, '2021-08-30 04:57:13', '2021-08-30 04:57:13'),
('DI-III/6/08/2021/01', '2021-08-05 17:00:00', 'pembayaran kedua', 'Pemasukan', 900000, 3, '2021-08-30 04:34:02', '2021-08-30 04:34:02'),
('DI-III/7/08/2021/01', '2021-08-06 17:00:00', 'pembayaran ke dua', 'Pemasukan', 900000, 3, '2021-08-30 05:14:44', '2021-08-30 05:14:44'),
('DI-III/8/07/2021/01', '2021-07-07 17:00:00', 'pembayaran ke dua', 'Pemasukan', 900000, 3, '2021-08-30 04:53:02', '2021-08-30 04:53:02'),
('DI-III/9/08/2021/01', '2021-08-08 17:00:00', 'pembayaran ke 2', 'Pemasukan', 900000, 3, '2021-08-30 04:58:31', '2021-08-30 04:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `fk_detail_siswa`
--

CREATE TABLE `fk_detail_siswa` (
  `id_siswa` varchar(32) NOT NULL,
  `id_detail_kursus` varchar(32) NOT NULL,
  `id_cabang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fk_detail_siswa`
--

INSERT INTO `fk_detail_siswa` (`id_siswa`, `id_detail_kursus`, `id_cabang`, `created_at`, `updated_at`) VALUES
('tAqGbcdpnN3KmLn2Vk3URuIYtRZa8Owe', 'phN4hJr2614nwzwTIbapcvDztylga6Tt', 2, '2021-08-23 06:13:29', '2021-08-23 06:13:29'),
('h5inB6wTEpSe57130IOtwYQQM9Y1gAYz', '1yKJhlsSsnMyMo9n4QPOiIxhgLWuFaNl', 2, '2021-08-23 06:16:52', '2021-08-23 06:16:52'),
('pcAdM9GjMEtNHlKO68rCRPlC54O3Exod', 'e6Tx5qZRKyeqsxBvF7lhpUti4DkONx1C', 2, '2021-08-23 06:19:00', '2021-08-23 06:19:00'),
('i4KaIbJud2CH2Cif572mezTAw2IY3gyC', '0eV7YIjtdAgcgKKLxGosq5h4FNXCcgoO', 2, '2021-08-23 06:21:46', '2021-08-23 06:21:46'),
('PWfIkGrhkLLNeS3nPsn3re5EZA47Dzf4', 'hZoKM6EjnJdcdIt5CDSxqG9o9C100ZhJ', 2, '2021-08-23 06:23:41', '2021-08-23 06:23:41'),
('jwo4vNwG3Tvxs73wGvE3WnMhAGZcvpSg', 'JQQSo2LiR09LiKTGZ6XJElyFVaff5J2R', 2, '2021-08-23 06:25:26', '2021-08-23 06:25:26'),
('RXhtgEw3XOYdYxunbBFBWPQyBSNB4ftD', 'diL14knrjZ7O3vuysMcUhYvhQbsxAbuh', 2, '2021-08-23 06:27:03', '2021-08-23 06:27:03'),
('R9pyyxPi2Db8pDvkT9hT9LoIMPvIBmKk', 'hH0EB224B0ojhk3apFNvHg37A0tMltZP', 2, '2021-08-23 06:28:53', '2021-08-23 06:28:53'),
('GS70E0VoHS7kczpdSnk3hOdYvMEBzRU3', 'c7ZNTPKlMyaofSlWAmK2CBoM0Wm160sd', 2, '2021-08-23 06:30:58', '2021-08-23 06:30:58'),
('LW1IkkDLZDPFrf6kSOojijdzM1j8sWTi', 'xUMLf12WiYMEEAifavGfDCKcSHkyruMc', 2, '2021-08-23 06:32:32', '2021-08-23 06:32:32'),
('16xKenbs8gSzS71LHN6vfdbbafPKzBNv', '3XEajPPgZygcv1IWZO45lVfXwyuqELGU', 2, '2021-08-23 06:34:07', '2021-08-23 06:34:07'),
('62hnoESHBddW4XNLtiFetKU2QjShPBtE', '7dKrxHJ4DcGVBSUfk3cc4km2S0mVdnWO', 2, '2021-08-23 06:35:33', '2021-08-23 06:35:33'),
('PAth99zbSnEBoB6KDhUZYB7MwF0nV2D8', 'ZvRWzQhCMmwwAmFYhKoYcVVfzfJP23o5', 2, '2021-08-23 06:37:43', '2021-08-23 06:37:43'),
('vi7Ks3K00robceDSlYsq2bgxhjgPtjIt', 'Cs5G8wOCSRkmZ0E7hL9o8IwI6DINTZEM', 3, '2021-08-23 06:58:20', '2021-08-23 06:58:20'),
('ozwDgFuI2FdCywea2ptfblnSn2A2Twlt', 'DKRJwA8v8ls0mu4BAlEBDYrH4KPEZFEX', 3, '2021-08-23 07:15:12', '2021-08-23 07:15:12'),
('ofqEEzuAc06INynkfIgr7meGQ8t2W0Tg', 'TQUrOMmjupEWT8KVpqA4vQrA6EAsHHE6', 3, '2021-08-23 07:18:21', '2021-08-23 07:18:21'),
('eCXVMWYUBXyeEoWuH85CLjfQftWhU3nv', 'nl7rUAsG0Viq8SQ8VdXNGPvuBzaBleVF', 3, '2021-08-23 07:21:09', '2021-08-23 07:21:09'),
('jkVGOCOejiEhf38hIgRiQK42twSOclHi', 'YH8CT6zUGCSSBq5FaRjaGSJwTS62XJsY', 3, '2021-08-23 07:22:47', '2021-08-23 07:22:47'),
('2zTWzS4oaOXWRzatkNBhka29Gn9jB26T', 'BLBtQUqKrf3ONpcjrCiMS0LU3fAvuK6r', 3, '2021-08-23 07:24:43', '2021-08-23 07:24:43'),
('E3bO8iUZxSfBa5xqsk93o290pwPdRGTf', 'IHqieR1ov9T126jwfuAea1VpaWLTpOJ5', 2, '2021-08-26 02:37:38', '2021-08-26 02:37:38'),
('b4WvwIMyrkWLceE6vPuXnQHf83GwWniZ', 'tkNwZtiP3dDlYWptzfvVNjEtxDc9Mhbc', 2, '2021-08-29 07:33:49', '2021-08-29 07:33:49'),
('lCLDzGIMEuEBczE6PDc1IrJ6OAXzCLQO', 'FJS9TNJFbWV0XkkZ65nRa58cY3r7DHJQ', 2, '2021-08-29 08:00:24', '2021-08-29 08:00:24'),
('z4XothaTlh5aNV7pjMWoDDXPx6HLoeOx', 'KGImTOm1vSrl5N1fn4v7hzkZ8MA1TF3p', 2, '2021-08-29 08:15:41', '2021-08-29 08:15:41'),
('1IF7QGhEU1BM6ddUTNilE98zjVwLiKiX', 'j4Nz1hhCa3MgRBxmutsPxFLi1Uo6k7p9', 2, '2021-08-29 08:17:27', '2021-08-29 08:17:27'),
('0I4517nm6QeT23SfhOztf3w2AHPo7REe', 'XbSv36xVZF1ESTXfhoVUNGEioCjE6S8a', 2, '2021-08-29 08:24:00', '2021-08-29 08:24:00'),
('HYIhefUFvqHOhVdVumWHN1sl2Va8B3KL', 'rT77MlxQ491xmuzMZ0ic6OVdPgnAuoqm', 2, '2021-08-29 08:50:38', '2021-08-29 08:50:38'),
('zEQns7EVFsZ5FnnHe1YgU1i9oDLUhaGq', 'xaYVr2nQ2KAch5LpCe9N9hJguKHBFVNi', 2, '2021-08-29 08:54:10', '2021-08-29 08:54:10'),
('uZFl3b72CWwsJ0j3h1ynwGUgkKRpRaax', 'NQyL0UtZmATpLnpqCYS1l4yiVyutSaQG', 2, '2021-08-29 08:57:49', '2021-08-29 08:57:49'),
('jAmA2qRELTXffbBMBmlGQTbFtdApY9Sy', 'rohmrtJQhJUJCUclpg8e8GGsmNuE8vb3', 2, '2021-08-29 09:00:02', '2021-08-29 09:00:02'),
('NzUl3hAnzyYnGNenlmTsEu5QYnsH0a6Q', '2lIj0X4y2nSEHKX9IY74KQ40MS2hKGZl', 2, '2021-08-29 11:15:49', '2021-08-29 11:15:49'),
('3fsbAOAaXV2KHyoDfjAIQGFnkq9zTtVF', '9UA5bUiRHCbXupQgRKrdJmEwymvR6EtL', 2, '2021-08-29 11:31:05', '2021-08-29 11:31:05'),
('1MnFTQ8wg7ZwIT3h63qkIYmH5DwPX8iK', 'X4lg54orD3DTjQHQrh16MvX3rAYlOewP', 2, '2021-08-29 11:34:19', '2021-08-29 11:34:19'),
('ll457MggKouyMHEgzQnNYEUozZjplbOR', 'rh08pszYoTHPpZrroMvU9MN1dQBYfzyh', 2, '2021-08-29 11:39:00', '2021-08-29 11:39:00'),
('bmuVxDJkAlVJr6UG8yTSKJacqQfb3kIc', 'gNRc3oA1A4m2v0twlL0R35rfFcvPOUlj', 2, '2021-08-29 11:42:03', '2021-08-29 11:42:03'),
('ZiClIC8OXdDzlS87lnQ5qjPTYmxm1NXA', 'tqgCfyFw4QJwdJApTVGIN4Wz6bbYfYdh', 2, '2021-08-29 11:44:43', '2021-08-29 11:44:43'),
('SjrMJ4BLCHSgqM4MHMD9ug2qdZRXSzJd', 'fs8XmaHPxMt9RUNFc4Tm63BWmLd4wept', 2, '2021-08-29 11:47:29', '2021-08-29 11:47:29'),
('0ppwnXvFATpUVsSLfLBRujDYWyx6Rnw9', 'Z9YJsH4pnIq6bPVMkS84FbV2LYctdLy6', 2, '2021-08-29 11:51:56', '2021-08-29 11:51:56'),
('6GPQJW8uyILo1JKHkMvtLKjBE2j02oIh', '0Tx6ZNmFqfo7RDf6RQMDA1r9EQXnidfY', 2, '2021-08-29 11:54:33', '2021-08-29 11:54:33'),
('UGjvt1LY18ByCwhfV0Ez8cD7RqifqSg7', 'JU0AN1i0K3yiVpJtCV5jObctrPubmOa8', 2, '2021-08-29 11:57:34', '2021-08-29 11:57:34'),
('14NNKmrCOSOpod0hYaiavR1Auon8cZWk', 'lwDuAXQmWd5v9eOfBpgmANttAhsJxDoS', 2, '2021-08-29 11:59:39', '2021-08-29 11:59:39'),
('qm76Hsq3YmuOHxsDDodZhdryntrWyuYy', '8HczIdo0uNbNlgq6pB7cGp9F3ymLI7oS', 2, '2021-08-29 12:02:53', '2021-08-29 12:02:53'),
('OvURPGZmQjTj5qBmEU8NcmdXDBphauEO', 'bDBVc89xkuqj71uxhQdWqhSKAX1cgVG0', 2, '2021-08-29 12:07:09', '2021-08-29 12:07:09'),
('ogVK9hxupIWtfxPYHMHDEhW8t6rdfNhA', 'N0f0SupUs7YwEuBVVm8Lw7Vgg7I4OhUZ', 2, '2021-08-29 12:15:51', '2021-08-29 12:15:51'),
('Z9KRT2XmZSLWUnI3ddjh5pJ8kVLvLBBv', 'gVWWFGMDN2yADtJzFE91FVOg7cOtZg5a', 2, '2021-08-29 12:19:44', '2021-08-29 12:19:44'),
('3JDJR8loX47N4fxdg7nyAsGM9ncTLHhf', 'hvKbqBWNPfKzKZg7MKgMJBvZn8S9jFCJ', 2, '2021-08-29 12:29:37', '2021-08-29 12:29:37'),
('Dq7PPr6ImCp0ykqCUlxx7rH7fBSMaDIM', 'WZ1JpAQi6NJ6BJHEaNNCfNXpskmd3Udd', 2, '2021-08-29 12:33:56', '2021-08-29 12:33:56'),
('ihbBORdQaCxeGI0O9t6iHFMyQ2g24INI', 'CqeS1Mc3bbhukExOv0PnmvchB1UUem0X', 2, '2021-08-29 12:38:23', '2021-08-29 12:38:23'),
('PeGSFvTXhTVhiXiJ339cnlINoWlv5bf2', 'kEENKxYrhZiZbuXEPiEDDq8woEKjpjme', 2, '2021-08-29 12:45:02', '2021-08-29 12:45:02'),
('5SlwhWXUeGGvIyFpkLgkCwHCSbiUJgG4', 'jQeqdA5VqfdIFOqsA8TGuk9gIMWlEGZh', 2, '2021-08-29 12:50:11', '2021-08-29 12:50:11'),
('yAgF6oI44EWH5OaF2GqUUH58pC7s6XN0', 'PlEsStOEqAphlZBdjTzWqb1OC1hDZ7MQ', 2, '2021-08-29 12:54:15', '2021-08-29 12:54:15'),
('AuT7f6Ui3ZEqFGUj6VoczLOXoQWaG2M3', '3JZyOkawnAD2Rocg0rOjfXqFP4L8Y8zN', 2, '2021-08-29 13:00:48', '2021-08-29 13:00:48'),
('lcSNfob2G2GnfOeGW6Whr1ekWIbKaYYZ', '7sp4jRvZ3VyL4hgUOaak9mQp0sFnyo7t', 2, '2021-08-29 13:03:43', '2021-08-29 13:03:43'),
('WCdjl8yDOnqIiPMfr8BCiAIkNCnOvlRd', '8ekxUUayqrnHnRGmxcswFYMhRjKo1Xsl', 2, '2021-08-29 13:10:12', '2021-08-29 13:10:12'),
('qgls98a1OetoigbcrNIBsivT8lcswqw1', 'LSEGZFeH1aVQjW1SGa6tpCELv9iOyPhh', 2, '2021-08-29 13:12:13', '2021-08-29 13:12:13'),
('M9nHuq8uwp0owFcYcsHYOOe8c3DoNXtV', 'BqEN0a8e1bDGp5o781f2gxv8Zo5QbAAy', 2, '2021-08-29 13:15:23', '2021-08-29 13:15:23'),
('WI3ZIbWaW9HboVx8VaIiQD3mDoGNJUI6', 'kqC6nSiJm0A2qOPb5DhuvqO9ldnFLO0g', 2, '2021-08-29 13:18:55', '2021-08-29 13:18:55'),
('YPwmwVy3Tu79aHPesIdbFehTC57vZT9n', 'g4dzeNv2JYzhERP2LiNg46HyOL5osJ1h', 2, '2021-08-29 13:27:34', '2021-08-29 13:27:34'),
('qfBnEPcxde2dQH76ygrMKGWtWTfV4E6i', 'dkt4VorbjttrYrlgaHphr2OWRhwKEwK1', 2, '2021-08-29 13:32:51', '2021-08-29 13:32:51'),
('iNo5Eydz5GxqcrNZqvmWFjHpCIkXlufk', '4XdHhZQDtBmNmBD6cmLnmoZTD0hVi8s7', 2, '2021-08-29 13:38:19', '2021-08-29 13:38:19'),
('NvwfvOD6fHgMOk7ph45WK9BnUKIH6MgY', 'w12CTTGzQffqkQOm6QyNNUCrSWoI7qYV', 2, '2021-08-29 13:45:37', '2021-08-29 13:45:37'),
('g0SakEyUUGaQrwF4DEvJvtgeSjozDabq', 'CN84OIsFX9Fun2057BBsZ0wo0Wm1Ia3h', 2, '2021-08-29 13:51:18', '2021-08-29 13:51:18'),
('wc7MU1HgE0WCO7EkJe69OEb8OUy2hThr', 'YqKwGzO6Bf2SpAahCII6y3V39rus3sHB', 2, '2021-08-29 13:55:17', '2021-08-29 13:55:17'),
('aMEEJB694cJkCBqzDGJsLDuazpuz48Vk', '9OVEEcwUjOsEvwT91ZSvx0zxOGz5lcSy', 2, '2021-08-29 14:00:17', '2021-08-29 14:00:17'),
('UecJUO22QFB22cvhUeYq2sJupYPxZUNt', 'sj3oHEXQuI7S8oOBfZtGRD7xWG48SwBi', 3, '2021-08-30 04:25:04', '2021-08-30 04:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(32) NOT NULL,
  `jenis_jabatan` varchar(128) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jenis_jabatan`, `created_at`, `updated_at`) VALUES
('1sovwS0bppR7xH67exeogvOCAHkkggXC', 'Admin dan Bimbel', '2021-08-05 15:31:49', '2021-08-05 15:31:49'),
('7T8AcK3ckgPv9u7tB0h6mYKTpQlbOAGH', 'Admin dan Guru Bahasa Inggris', '2021-08-05 15:31:19', '2021-08-05 15:31:19'),
('HNGIPDFXuVt0vSs5uOAbNHR2vM0jm0eB', 'Admin dan Akuntansi', '2021-08-05 15:31:28', '2021-08-05 15:31:28'),
('XXWcKZ22e3CmSzxFJz32spX5cFl9tRuk', 'Admin dan Guru Komputer', '2021-08-05 15:31:13', '2021-08-05 15:31:13');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(32) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jabatan` varchar(32) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `cabang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `jabatan`, `no_telepon`, `cabang`, `created_at`, `updated_at`) VALUES
('0M0fSYbT3g5KOOTv9ABYsszrWOm6oaq0', 'Qeristiawati Aisyah', 'XXWcKZ22e3CmSzxFJz32spX5cFl9tRuk', '085733220306', 1, '2021-08-22 06:51:44', '2021-08-22 06:51:44'),
('eigwmyK5fsJzfe4wEExhYcKBBIkQ6nqX', 'Rico Adityo', 'XXWcKZ22e3CmSzxFJz32spX5cFl9tRuk', '085876046196', 4, '2021-08-22 06:49:02', '2021-08-22 06:49:02'),
('M19qbD2mvVB0PFK7detXPWrJcHpkXZnI', 'Heru budiman', 'XXWcKZ22e3CmSzxFJz32spX5cFl9tRuk', '08997473331', 3, '2021-08-22 06:53:30', '2021-08-22 06:53:30'),
('MBU6qcEyKfYIq1DQC6aQ89pcl6uFjcOe', 'Silvi Rachma', '7T8AcK3ckgPv9u7tB0h6mYKTpQlbOAGH', '0895331734731', 4, '2021-08-22 06:49:41', '2021-08-22 06:49:41'),
('MJH1V5815y5wCBveqYrtf1N9fEhnFE9Y', 'Masrialtu Alifah', 'HNGIPDFXuVt0vSs5uOAbNHR2vM0jm0eB', '085850811850', 1, '2021-08-22 06:51:08', '2021-08-22 06:51:08'),
('NPLVTucAmXxoozEH2rMEeo1AFonDZG2s', 'Mimma aprilia', '1sovwS0bppR7xH67exeogvOCAHkkggXC', '085230000147', 3, '2021-08-22 06:53:54', '2021-08-22 06:53:54'),
('p2TvHPhV163lyeA6lczRUMXxonxPfuqi', 'Sukisno', '7T8AcK3ckgPv9u7tB0h6mYKTpQlbOAGH', '08997473331', 2, '2021-08-22 06:53:07', '2021-08-22 06:53:07'),
('yARpRDziejxE7jnHAiEDt0wx5ys4bpLp', 'Rahmat Riyadi', '7T8AcK3ckgPv9u7tB0h6mYKTpQlbOAGH', '081252044369', 1, '2021-08-22 06:50:07', '2021-08-22 06:50:07'),
('z4VdGPRZVH2okWARNm96WHbMJD1YDmCX', 'Anisa rochma', 'XXWcKZ22e3CmSzxFJz32spX5cFl9tRuk', '085785949117', 2, '2021-08-22 06:52:18', '2021-08-22 06:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `id_kursus` int(11) NOT NULL,
  `nama_kursus` varchar(128) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`id_kursus`, `nama_kursus`, `created_at`, `updated_at`) VALUES
(1, 'DIPLOMA', '2021-08-19 08:16:20', '2021-08-22 07:18:39'),
(2, 'COMPUTER', '2021-08-22 07:18:44', '2021-08-22 07:18:44'),
(3, 'PERPAJAKAN', '2021-08-22 07:18:49', '2021-08-22 07:18:49'),
(4, 'ENGLISH', '2021-08-22 07:19:02', '2021-08-22 07:19:02'),
(5, 'ACCOUNTING', '2021-08-22 07:19:08', '2021-08-22 07:19:08'),
(6, 'SPESIAL PROGRAM', '2021-08-22 07:19:28', '2021-08-22 07:19:28'),
(7, 'BIMBINGAN BELAJAR', '2021-08-22 07:19:35', '2021-08-22 07:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(128) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`, `created_at`, `updated_at`) VALUES
(1, 'Operator dan Program Komputer', '2021-08-04 02:40:27', '2021-08-04 02:40:27'),
(2, 'Laporan Keuangan dan Pajak', '2021-08-04 02:40:46', '2021-08-04 02:40:46'),
(3, 'Bisnis Online - Offline', '2021-08-04 02:41:10', '2021-08-04 02:41:10'),
(4, 'Mesin - Sipil - Perkapalan', '2021-08-04 02:43:44', '2021-08-04 02:43:44'),
(5, 'Design and Contraction', '2021-08-04 02:44:02', '2021-08-04 02:44:02'),
(6, 'K3 Umum dan K3 Khusus', '2021-08-04 02:44:19', '2021-08-04 02:44:19'),
(7, 'Instalasi - Kontrol - AC', '2021-08-04 02:44:40', '2021-08-04 02:44:40'),
(8, 'Elementary', '2021-08-04 02:44:57', '2021-08-04 02:44:57'),
(9, 'Intermediate', '2021-08-04 02:45:07', '2021-08-04 02:45:07'),
(10, 'Advance', '2021-08-04 02:45:15', '2021-08-04 02:45:15'),
(12, 'Dasar', '2021-08-04 04:04:56', '2021-08-04 04:04:56'),
(13, 'Jasa', '2021-08-04 04:05:02', '2021-08-04 04:05:02'),
(14, 'Dagang', '2021-08-04 04:05:09', '2021-08-04 04:05:09'),
(15, 'Industri', '2021-08-04 04:05:26', '2021-08-04 04:05:26'),
(17, '6 SD', '2021-08-04 04:05:40', '2021-08-04 04:05:40'),
(18, '9 SMP', '2021-08-04 04:05:55', '2021-08-04 04:05:55'),
(19, '12 SMA', '2021-08-04 04:06:01', '2021-08-04 04:06:01'),
(20, 'Kelas 1 - 5 SD', '2021-08-04 04:06:15', '2021-08-04 04:06:15'),
(21, 'Kelas 1 - 2 SMP', '2021-08-04 04:06:30', '2021-08-04 04:06:30'),
(22, 'Kelas 1- 2 SMA', '2021-08-04 04:06:40', '2021-08-04 04:06:40'),
(26, '-', '2021-08-23 06:01:41', '2021-08-23 06:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(128) NOT NULL,
  `id_detail_kursus` varchar(32) NOT NULL,
  `tanggal_pembayaran` timestamp NULL DEFAULT NULL,
  `bayar` int(11) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `pembayaran_ke` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_detail_kursus`, `tanggal_pembayaran`, `bayar`, `keterangan`, `pembayaran_ke`, `created_at`, `updated_at`) VALUES
('DI-II/10/07/2021/01', 'kQhWXqBfyukEi2nshUFWRXJyAKfYLZK9', '2021-07-09 17:00:00', 99000, 'pembayaran awal', 1, '2021-08-26 01:37:41', '2021-08-26 01:37:41'),
('DI-II/10/07/2021/02', 'sU9xoCeAOeA4XT7ihab20iObQSfrPQqD', '2021-07-09 17:00:00', 98700, 'pembayaran awal', 1, '2021-08-26 01:44:34', '2021-08-26 01:44:34'),
('DI-II/2/09/2021/01', '9OVEEcwUjOsEvwT91ZSvx0zxOGz5lcSy', '2021-09-01 17:00:00', 100000, 'pembayaran ke 2', 2, '2021-09-02 13:30:18', '2021-09-02 13:30:18'),
('DI-II/23/08/2021/01', 'J0C6jl6DT9TjijknfeRVc2UsIC7NOWfQ', '2021-08-22 17:00:00', 600000, 'Angsuran 1', 1, '2021-08-23 08:33:25', '2021-08-23 08:33:25'),
('DI-II/24/07/2021/01', 's7Mn7xjxiMhbgc3jusEJTL2nuuKeILbJ', '2021-07-23 17:00:00', 900000, 'lunas', 1, '2021-08-26 01:52:26', '2021-08-26 01:52:26'),
('DI-II/25/08/2021/01', 'phN4hJr2614nwzwTIbapcvDztylga6Tt', '2021-08-24 17:00:00', 600000, 'pembayaran kedua', 2, '2021-08-25 16:14:02', '2021-08-25 16:14:02'),
('DI-II/25/08/2021/02', '1yKJhlsSsnMyMo9n4QPOiIxhgLWuFaNl', '2021-08-24 17:00:00', 700000, 'Sovia Rahmania Warda\r\nLUNAS', 2, '2021-08-25 16:17:33', '2021-08-25 16:17:33'),
('DI-II/25/08/2021/03', 'e6Tx5qZRKyeqsxBvF7lhpUti4DkONx1C', '2021-08-24 17:00:00', 700000, 'Lunas', 2, '2021-08-25 16:21:41', '2021-08-25 16:21:41'),
('DI-II/25/08/2021/04', '0eV7YIjtdAgcgKKLxGosq5h4FNXCcgoO', '2021-08-24 17:00:00', 700000, 'Lunas', 2, '2021-08-25 16:23:12', '2021-08-25 16:23:12'),
('DI-II/25/08/2021/05', 'hZoKM6EjnJdcdIt5CDSxqG9o9C100ZhJ', '2021-08-24 17:00:00', 700000, 'Lunas', 2, '2021-08-25 16:27:01', '2021-08-25 16:27:01'),
('DI-II/25/08/2021/06', 'JQQSo2LiR09LiKTGZ6XJElyFVaff5J2R', '2021-08-24 17:00:00', 700000, 'Lunas', 2, '2021-08-25 16:28:33', '2021-08-25 16:28:33'),
('DI-II/25/08/2021/07', 'diL14knrjZ7O3vuysMcUhYvhQbsxAbuh', '2021-08-24 17:00:00', 700000, 'Lunas', 2, '2021-08-25 16:29:42', '2021-08-25 16:29:42'),
('DI-II/25/08/2021/08', 'hH0EB224B0ojhk3apFNvHg37A0tMltZP', '2021-08-24 17:00:00', 700000, 'Lunas', 2, '2021-08-25 16:30:47', '2021-08-25 16:30:47'),
('DI-II/25/08/2021/09', 'c7ZNTPKlMyaofSlWAmK2CBoM0Wm160sd', '2021-08-24 17:00:00', 700000, 'lunas', 2, '2021-08-25 16:31:58', '2021-08-25 16:31:58'),
('DI-II/25/08/2021/10', 'xUMLf12WiYMEEAifavGfDCKcSHkyruMc', '2021-08-24 17:00:00', 700000, 'lunas', 2, '2021-08-25 16:35:05', '2021-08-25 16:35:05'),
('DI-II/25/08/2021/11', '3XEajPPgZygcv1IWZO45lVfXwyuqELGU', '2021-08-24 17:00:00', 700000, 'lunas', 2, '2021-08-25 16:36:26', '2021-08-25 16:36:26'),
('DI-II/25/08/2021/12', '7dKrxHJ4DcGVBSUfk3cc4km2S0mVdnWO', '2021-08-24 17:00:00', 700000, 'lunas', 2, '2021-08-25 16:39:44', '2021-08-25 16:39:44'),
('DI-II/25/08/2021/13', 'ZvRWzQhCMmwwAmFYhKoYcVVfzfJP23o5', '2021-08-24 17:00:00', 700000, 'lunas', 2, '2021-08-25 16:43:33', '2021-08-25 16:43:33'),
('DI-II/26/08/2021/01', 'sU9xoCeAOeA4XT7ihab20iObQSfrPQqD', '2021-08-25 17:00:00', 801300, 'lunas', 2, '2021-08-26 01:48:09', '2021-08-26 01:48:09'),
('DI-II/29/07/2021/01', '1yt0pKl6p4SoYpK5ADAdqgmu8eB6Mbz2', '2021-07-28 17:00:00', 600000, 'pembayaran pertama', 1, '2021-08-25 16:53:22', '2021-08-25 16:53:22'),
('DI-II/29/07/2021/02', '76XEM9uLYd5kVojKTuZMVdEJUZ7NlHng', '2021-07-28 17:00:00', 300000, 'pembayaran pertama', 1, '2021-08-25 16:58:11', '2021-08-25 16:58:11'),
('DI-II/29/08/2021/01', 'CqeS1Mc3bbhukExOv0PnmvchB1UUem0X', '2021-08-28 17:00:00', 150000, 'pembayaran', 1, '2021-08-29 12:39:37', '2021-08-29 12:39:37'),
('DI-II/30/07/2021/01', 'phN4hJr2614nwzwTIbapcvDztylga6Tt', '2021-07-29 17:00:00', 900000, 'Pembayaran pertama', 1, '2021-08-25 16:10:23', '2021-08-25 16:10:23'),
('DI-II/30/07/2021/02', 'e6Tx5qZRKyeqsxBvF7lhpUti4DkONx1C', '2021-07-29 17:00:00', 800000, 'pembayaran awal', 1, '2021-08-25 16:21:15', '2021-08-25 16:21:15'),
('DI-II/30/07/2021/03', 'hZoKM6EjnJdcdIt5CDSxqG9o9C100ZhJ', '2021-07-29 17:00:00', 800000, 'pembayaran pertama', 1, '2021-08-25 16:26:31', '2021-08-25 16:26:31'),
('DI-II/30/07/2021/04', 'diL14knrjZ7O3vuysMcUhYvhQbsxAbuh', '2021-07-29 17:00:00', 800000, 'Pembayaran pertama', 1, '2021-08-25 16:29:18', '2021-08-25 16:29:18'),
('DI-II/30/07/2021/05', 'hH0EB224B0ojhk3apFNvHg37A0tMltZP', '2021-07-29 17:00:00', 800000, 'pembayaran pertama', 1, '2021-08-25 16:30:26', '2021-08-25 16:30:26'),
('DI-II/30/07/2021/06', 'c7ZNTPKlMyaofSlWAmK2CBoM0Wm160sd', '2021-07-29 17:00:00', 800000, 'pembayaran pertama', 1, '2021-08-25 16:31:36', '2021-08-25 16:31:36'),
('DI-II/30/07/2021/07', '3XEajPPgZygcv1IWZO45lVfXwyuqELGU', '2021-07-29 17:00:00', 800000, 'pembayaran pertama', 1, '2021-08-25 16:36:04', '2021-08-25 16:36:04'),
('DI-II/30/08/2021/01', '9OVEEcwUjOsEvwT91ZSvx0zxOGz5lcSy', '2021-08-29 17:00:00', 100, 'coba', 1, '2021-08-30 03:13:13', '2021-08-30 03:13:13'),
('DI-II/31/07/2021/01', '1yKJhlsSsnMyMo9n4QPOiIxhgLWuFaNl', '2021-07-30 17:00:00', 800000, 'Sovia Rahmania Warda', 1, '2021-08-25 16:16:25', '2021-08-25 16:16:25'),
('DI-II/31/07/2021/02', '0eV7YIjtdAgcgKKLxGosq5h4FNXCcgoO', '2021-07-30 17:00:00', 800000, 'pembayaran pertama', 1, '2021-08-25 16:22:30', '2021-08-25 16:22:30'),
('DI-II/31/07/2021/03', 'JQQSo2LiR09LiKTGZ6XJElyFVaff5J2R', '2021-07-30 17:00:00', 800000, 'Pembayaran pertama', 1, '2021-08-25 16:28:04', '2021-08-25 16:28:04'),
('DI-II/31/07/2021/04', 'xUMLf12WiYMEEAifavGfDCKcSHkyruMc', '2021-07-30 17:00:00', 800000, 'pembayaran pertama', 1, '2021-08-25 16:32:53', '2021-08-25 16:32:53'),
('DI-II/31/07/2021/05', '7dKrxHJ4DcGVBSUfk3cc4km2S0mVdnWO', '2021-07-30 17:00:00', 800000, 'pembayaran perama', 1, '2021-08-25 16:37:58', '2021-08-25 16:37:58'),
('DI-II/31/07/2021/06', 'ZvRWzQhCMmwwAmFYhKoYcVVfzfJP23o5', '2021-07-30 17:00:00', 800000, 'pembayaran pertama', 1, '2021-08-25 16:42:58', '2021-08-25 16:42:58'),
('DI-III/30/07/2021/08', 'sj3oHEXQuI7S8oOBfZtGRD7xWG48SwBi', '2021-07-29 17:00:00', 900000, 'pembayaran awal', 1, '2021-08-30 04:31:31', '2021-08-30 04:31:31'),
('DI-III/30/07/2021/09', 'BLBtQUqKrf3ONpcjrCiMS0LU3fAvuK6r', '2021-07-29 17:00:00', 900000, 'pembayaran awal', 1, '2021-08-30 04:52:10', '2021-08-30 04:52:10'),
('DI-III/30/07/2021/10', 'DKRJwA8v8ls0mu4BAlEBDYrH4KPEZFEX', '2021-07-29 17:00:00', 900000, 'pembayaran awal', 1, '2021-08-30 05:12:43', '2021-08-30 05:12:43'),
('DI-III/31/07/2021/07', 'Cs5G8wOCSRkmZ0E7hL9o8IwI6DINTZEM', '2021-07-30 17:00:00', 900000, 'pembayaran awal', 1, '2021-08-30 04:55:41', '2021-08-30 04:55:41'),
('DI-III/31/07/2021/08', 'Cs5G8wOCSRkmZ0E7hL9o8IwI6DINTZEM', '2021-07-30 17:00:00', 900000, 'pembayaran awal', 2, '2021-08-30 04:57:13', '2021-08-30 04:57:13'),
('DI-III/6/08/2021/01', 'sj3oHEXQuI7S8oOBfZtGRD7xWG48SwBi', '2021-08-05 17:00:00', 900000, 'pembayaran kedua', 2, '2021-08-30 04:34:02', '2021-08-30 04:34:02'),
('DI-III/7/08/2021/01', 'DKRJwA8v8ls0mu4BAlEBDYrH4KPEZFEX', '2021-08-06 17:00:00', 900000, 'pembayaran ke dua', 2, '2021-08-30 05:14:44', '2021-08-30 05:14:44'),
('DI-III/8/07/2021/01', 'BLBtQUqKrf3ONpcjrCiMS0LU3fAvuK6r', '2021-07-07 17:00:00', 900000, 'pembayaran ke dua', 2, '2021-08-30 04:53:02', '2021-08-30 04:53:02'),
('DI-III/9/08/2021/01', 'Cs5G8wOCSRkmZ0E7hL9o8IwI6DINTZEM', '2021-08-08 17:00:00', 900000, 'pembayaran ke 2', 3, '2021-08-30 04:58:31', '2021-08-30 04:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` varchar(128) NOT NULL,
  `rincian` varchar(128) NOT NULL,
  `biaya` int(11) NOT NULL,
  `cabang` int(11) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id_program` int(11) NOT NULL,
  `nama_program` varchar(128) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id_program`, `nama_program`, `created_at`, `updated_at`) VALUES
(1, 'In House Training', '2021-08-19 08:16:41', '2021-08-22 07:06:11'),
(2, 'English for Children (TK dan SD)', '2021-08-22 07:07:24', '2021-08-22 07:07:24'),
(3, 'General English (Teenagers adn Adult)', '2021-08-22 07:07:29', '2021-08-22 07:07:29'),
(4, 'English for Conversation', '2021-08-22 07:07:52', '2021-08-22 07:07:52'),
(5, 'Program for Special Purpose (Private)', '2021-08-22 07:08:01', '2021-08-22 07:08:01'),
(6, 'TOEF - TOEIC - IELTS (Test of English As Foreign Language)', '2021-08-22 07:08:06', '2021-08-22 07:08:06'),
(7, 'English Camp Program', '2021-08-22 07:08:31', '2021-08-22 07:08:31'),
(8, 'Diploma in Computer', '2021-08-22 07:08:56', '2021-08-22 07:08:56'),
(9, 'Diploma in Accounting', '2021-08-22 07:09:03', '2021-08-22 07:09:03'),
(10, 'Diploma in Shipbuilding', '2021-08-22 07:09:11', '2021-08-22 07:09:34'),
(11, 'Diploma in Business', '2021-08-22 07:09:20', '2021-08-22 07:09:20'),
(12, 'Diploma in Safety', '2021-08-22 07:10:02', '2021-08-22 07:10:37'),
(13, 'Diploma in Electricity', '2021-08-22 07:10:22', '2021-08-22 07:10:22'),
(14, 'Diploma in Drafting', '2021-08-22 07:10:51', '2021-08-22 07:10:51'),
(15, 'Microsoft Acces', '2021-08-22 07:12:26', '2021-08-22 07:12:26'),
(16, 'Microsoft Excel', '2021-08-22 07:12:34', '2021-08-22 07:12:34'),
(17, 'Microsoft Power Point', '2021-08-22 07:12:40', '2021-08-22 07:12:40'),
(18, 'Microsoft Project', '2021-08-22 07:12:46', '2021-08-22 07:12:46'),
(19, 'Microsoft Publisher', '2021-08-22 07:12:53', '2021-08-22 07:12:53'),
(20, 'Microsoft Visio', '2021-08-22 07:12:59', '2021-08-22 07:12:59'),
(21, 'Paket OFW (Windows, Word, Excel, Power Point,  Access)', '2021-08-22 07:13:22', '2021-08-22 07:13:22'),
(22, 'Corel Draw', '2021-08-22 07:13:28', '2021-08-22 07:13:28'),
(23, 'Photoshop', '2021-08-22 07:13:39', '2021-08-22 07:13:39'),
(24, 'DESAIN GRAFIS ( Corel Draw, Photoshop)', '2021-08-22 07:13:50', '2021-08-22 07:13:50'),
(25, 'Autocad 2D & 3D', '2021-08-22 07:14:08', '2021-08-22 07:14:08'),
(26, 'Animasi 3Ds Max', '2021-08-22 07:14:35', '2021-08-22 07:14:35'),
(27, 'Animasi Flash 3D', '2021-08-22 07:14:45', '2021-08-22 07:14:45'),
(28, 'Video Studio Editing', '2021-08-22 07:14:59', '2021-08-22 07:14:59'),
(29, 'SPSS (Statistik)', '2021-08-22 07:15:07', '2021-08-22 07:15:07'),
(30, 'WEB DESIGN', '2021-08-22 07:15:13', '2021-08-22 07:15:13'),
(31, 'LAN (Local Area Network)', '2021-08-22 07:15:47', '2021-08-22 07:15:47'),
(32, 'Database Server', '2021-08-22 07:15:53', '2021-08-22 07:15:53'),
(33, 'Programmer', '2021-08-22 07:16:04', '2021-08-22 07:16:04'),
(34, 'Teknisi Komputer', '2021-08-22 07:16:10', '2021-08-22 07:16:10'),
(35, 'Komputer Akuntansi', '2021-08-22 07:16:18', '2021-08-22 07:16:18'),
(36, 'Perorangan', '2021-08-22 07:16:27', '2021-08-22 07:16:27'),
(37, 'Badan', '2021-08-22 07:16:33', '2021-08-22 07:16:33'),
(38, 'PKP', '2021-08-22 07:16:40', '2021-08-22 07:16:40'),
(39, 'Akuntansi', '2021-08-22 07:17:02', '2021-08-22 07:17:02'),
(40, 'Pengurusan Hak Merek', '2021-08-22 07:17:26', '2021-08-22 07:17:26'),
(41, 'Pengurusan Hak Cipta', '2021-08-22 07:17:46', '2021-08-22 07:17:46'),
(42, 'Persiapan Ujian Masuk SMP, SMA, PIN', '2021-08-22 07:18:02', '2021-08-22 07:18:02'),
(43, 'Persiapan Ujian Semester', '2021-08-22 07:18:10', '2021-08-22 07:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `regencies`
--

CREATE TABLE `regencies` (
  `id` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `regencies`
--

INSERT INTO `regencies` (`id`, `province_id`, `name`) VALUES
('1101', '11', 'KABUPATEN SIMEULUE'),
('1102', '11', 'KABUPATEN ACEH SINGKIL'),
('1103', '11', 'KABUPATEN ACEH SELATAN'),
('1104', '11', 'KABUPATEN ACEH TENGGARA'),
('1105', '11', 'KABUPATEN ACEH TIMUR'),
('1106', '11', 'KABUPATEN ACEH TENGAH'),
('1107', '11', 'KABUPATEN ACEH BARAT'),
('1108', '11', 'KABUPATEN ACEH BESAR'),
('1109', '11', 'KABUPATEN PIDIE'),
('1110', '11', 'KABUPATEN BIREUEN'),
('1111', '11', 'KABUPATEN ACEH UTARA'),
('1112', '11', 'KABUPATEN ACEH BARAT DAYA'),
('1113', '11', 'KABUPATEN GAYO LUES'),
('1114', '11', 'KABUPATEN ACEH TAMIANG'),
('1115', '11', 'KABUPATEN NAGAN RAYA'),
('1116', '11', 'KABUPATEN ACEH JAYA'),
('1117', '11', 'KABUPATEN BENER MERIAH'),
('1118', '11', 'KABUPATEN PIDIE JAYA'),
('1171', '11', 'KOTA BANDA ACEH'),
('1172', '11', 'KOTA SABANG'),
('1173', '11', 'KOTA LANGSA'),
('1174', '11', 'KOTA LHOKSEUMAWE'),
('1175', '11', 'KOTA SUBULUSSALAM'),
('1201', '12', 'KABUPATEN NIAS'),
('1202', '12', 'KABUPATEN MANDAILING NATAL'),
('1203', '12', 'KABUPATEN TAPANULI SELATAN'),
('1204', '12', 'KABUPATEN TAPANULI TENGAH'),
('1205', '12', 'KABUPATEN TAPANULI UTARA'),
('1206', '12', 'KABUPATEN TOBA SAMOSIR'),
('1207', '12', 'KABUPATEN LABUHAN BATU'),
('1208', '12', 'KABUPATEN ASAHAN'),
('1209', '12', 'KABUPATEN SIMALUNGUN'),
('1210', '12', 'KABUPATEN DAIRI'),
('1211', '12', 'KABUPATEN KARO'),
('1212', '12', 'KABUPATEN DELI SERDANG'),
('1213', '12', 'KABUPATEN LANGKAT'),
('1214', '12', 'KABUPATEN NIAS SELATAN'),
('1215', '12', 'KABUPATEN HUMBANG HASUNDUTAN'),
('1216', '12', 'KABUPATEN PAKPAK BHARAT'),
('1217', '12', 'KABUPATEN SAMOSIR'),
('1218', '12', 'KABUPATEN SERDANG BEDAGAI'),
('1219', '12', 'KABUPATEN BATU BARA'),
('1220', '12', 'KABUPATEN PADANG LAWAS UTARA'),
('1221', '12', 'KABUPATEN PADANG LAWAS'),
('1222', '12', 'KABUPATEN LABUHAN BATU SELATAN'),
('1223', '12', 'KABUPATEN LABUHAN BATU UTARA'),
('1224', '12', 'KABUPATEN NIAS UTARA'),
('1225', '12', 'KABUPATEN NIAS BARAT'),
('1271', '12', 'KOTA SIBOLGA'),
('1272', '12', 'KOTA TANJUNG BALAI'),
('1273', '12', 'KOTA PEMATANG SIANTAR'),
('1274', '12', 'KOTA TEBING TINGGI'),
('1275', '12', 'KOTA MEDAN'),
('1276', '12', 'KOTA BINJAI'),
('1277', '12', 'KOTA PADANGSIDIMPUAN'),
('1278', '12', 'KOTA GUNUNGSITOLI'),
('1301', '13', 'KABUPATEN KEPULAUAN MENTAWAI'),
('1302', '13', 'KABUPATEN PESISIR SELATAN'),
('1303', '13', 'KABUPATEN SOLOK'),
('1304', '13', 'KABUPATEN SIJUNJUNG'),
('1305', '13', 'KABUPATEN TANAH DATAR'),
('1306', '13', 'KABUPATEN PADANG PARIAMAN'),
('1307', '13', 'KABUPATEN AGAM'),
('1308', '13', 'KABUPATEN LIMA PULUH KOTA'),
('1309', '13', 'KABUPATEN PASAMAN'),
('1310', '13', 'KABUPATEN SOLOK SELATAN'),
('1311', '13', 'KABUPATEN DHARMASRAYA'),
('1312', '13', 'KABUPATEN PASAMAN BARAT'),
('1371', '13', 'KOTA PADANG'),
('1372', '13', 'KOTA SOLOK'),
('1373', '13', 'KOTA SAWAH LUNTO'),
('1374', '13', 'KOTA PADANG PANJANG'),
('1375', '13', 'KOTA BUKITTINGGI'),
('1376', '13', 'KOTA PAYAKUMBUH'),
('1377', '13', 'KOTA PARIAMAN'),
('1401', '14', 'KABUPATEN KUANTAN SINGINGI'),
('1402', '14', 'KABUPATEN INDRAGIRI HULU'),
('1403', '14', 'KABUPATEN INDRAGIRI HILIR'),
('1404', '14', 'KABUPATEN PELALAWAN'),
('1405', '14', 'KABUPATEN S I A K'),
('1406', '14', 'KABUPATEN KAMPAR'),
('1407', '14', 'KABUPATEN ROKAN HULU'),
('1408', '14', 'KABUPATEN BENGKALIS'),
('1409', '14', 'KABUPATEN ROKAN HILIR'),
('1410', '14', 'KABUPATEN KEPULAUAN MERANTI'),
('1471', '14', 'KOTA PEKANBARU'),
('1473', '14', 'KOTA D U M A I'),
('1501', '15', 'KABUPATEN KERINCI'),
('1502', '15', 'KABUPATEN MERANGIN'),
('1503', '15', 'KABUPATEN SAROLANGUN'),
('1504', '15', 'KABUPATEN BATANG HARI'),
('1505', '15', 'KABUPATEN MUARO JAMBI'),
('1506', '15', 'KABUPATEN TANJUNG JABUNG TIMUR'),
('1507', '15', 'KABUPATEN TANJUNG JABUNG BARAT'),
('1508', '15', 'KABUPATEN TEBO'),
('1509', '15', 'KABUPATEN BUNGO'),
('1571', '15', 'KOTA JAMBI'),
('1572', '15', 'KOTA SUNGAI PENUH'),
('1601', '16', 'KABUPATEN OGAN KOMERING ULU'),
('1602', '16', 'KABUPATEN OGAN KOMERING ILIR'),
('1603', '16', 'KABUPATEN MUARA ENIM'),
('1604', '16', 'KABUPATEN LAHAT'),
('1605', '16', 'KABUPATEN MUSI RAWAS'),
('1606', '16', 'KABUPATEN MUSI BANYUASIN'),
('1607', '16', 'KABUPATEN BANYU ASIN'),
('1608', '16', 'KABUPATEN OGAN KOMERING ULU SELATAN'),
('1609', '16', 'KABUPATEN OGAN KOMERING ULU TIMUR'),
('1610', '16', 'KABUPATEN OGAN ILIR'),
('1611', '16', 'KABUPATEN EMPAT LAWANG'),
('1612', '16', 'KABUPATEN PENUKAL ABAB LEMATANG ILIR'),
('1613', '16', 'KABUPATEN MUSI RAWAS UTARA'),
('1671', '16', 'KOTA PALEMBANG'),
('1672', '16', 'KOTA PRABUMULIH'),
('1673', '16', 'KOTA PAGAR ALAM'),
('1674', '16', 'KOTA LUBUKLINGGAU'),
('1701', '17', 'KABUPATEN BENGKULU SELATAN'),
('1702', '17', 'KABUPATEN REJANG LEBONG'),
('1703', '17', 'KABUPATEN BENGKULU UTARA'),
('1704', '17', 'KABUPATEN KAUR'),
('1705', '17', 'KABUPATEN SELUMA'),
('1706', '17', 'KABUPATEN MUKOMUKO'),
('1707', '17', 'KABUPATEN LEBONG'),
('1708', '17', 'KABUPATEN KEPAHIANG'),
('1709', '17', 'KABUPATEN BENGKULU TENGAH'),
('1771', '17', 'KOTA BENGKULU'),
('1801', '18', 'KABUPATEN LAMPUNG BARAT'),
('1802', '18', 'KABUPATEN TANGGAMUS'),
('1803', '18', 'KABUPATEN LAMPUNG SELATAN'),
('1804', '18', 'KABUPATEN LAMPUNG TIMUR'),
('1805', '18', 'KABUPATEN LAMPUNG TENGAH'),
('1806', '18', 'KABUPATEN LAMPUNG UTARA'),
('1807', '18', 'KABUPATEN WAY KANAN'),
('1808', '18', 'KABUPATEN TULANGBAWANG'),
('1809', '18', 'KABUPATEN PESAWARAN'),
('1810', '18', 'KABUPATEN PRINGSEWU'),
('1811', '18', 'KABUPATEN MESUJI'),
('1812', '18', 'KABUPATEN TULANG BAWANG BARAT'),
('1813', '18', 'KABUPATEN PESISIR BARAT'),
('1871', '18', 'KOTA BANDAR LAMPUNG'),
('1872', '18', 'KOTA METRO'),
('1901', '19', 'KABUPATEN BANGKA'),
('1902', '19', 'KABUPATEN BELITUNG'),
('1903', '19', 'KABUPATEN BANGKA BARAT'),
('1904', '19', 'KABUPATEN BANGKA TENGAH'),
('1905', '19', 'KABUPATEN BANGKA SELATAN'),
('1906', '19', 'KABUPATEN BELITUNG TIMUR'),
('1971', '19', 'KOTA PANGKAL PINANG'),
('2101', '21', 'KABUPATEN KARIMUN'),
('2102', '21', 'KABUPATEN BINTAN'),
('2103', '21', 'KABUPATEN NATUNA'),
('2104', '21', 'KABUPATEN LINGGA'),
('2105', '21', 'KABUPATEN KEPULAUAN ANAMBAS'),
('2171', '21', 'KOTA B A T A M'),
('2172', '21', 'KOTA TANJUNG PINANG'),
('3101', '31', 'KABUPATEN KEPULAUAN SERIBU'),
('3171', '31', 'KOTA JAKARTA SELATAN'),
('3172', '31', 'KOTA JAKARTA TIMUR'),
('3173', '31', 'KOTA JAKARTA PUSAT'),
('3174', '31', 'KOTA JAKARTA BARAT'),
('3175', '31', 'KOTA JAKARTA UTARA'),
('3201', '32', 'KABUPATEN BOGOR'),
('3202', '32', 'KABUPATEN SUKABUMI'),
('3203', '32', 'KABUPATEN CIANJUR'),
('3204', '32', 'KABUPATEN BANDUNG'),
('3205', '32', 'KABUPATEN GARUT'),
('3206', '32', 'KABUPATEN TASIKMALAYA'),
('3207', '32', 'KABUPATEN CIAMIS'),
('3208', '32', 'KABUPATEN KUNINGAN'),
('3209', '32', 'KABUPATEN CIREBON'),
('3210', '32', 'KABUPATEN MAJALENGKA'),
('3211', '32', 'KABUPATEN SUMEDANG'),
('3212', '32', 'KABUPATEN INDRAMAYU'),
('3213', '32', 'KABUPATEN SUBANG'),
('3214', '32', 'KABUPATEN PURWAKARTA'),
('3215', '32', 'KABUPATEN KARAWANG'),
('3216', '32', 'KABUPATEN BEKASI'),
('3217', '32', 'KABUPATEN BANDUNG BARAT'),
('3218', '32', 'KABUPATEN PANGANDARAN'),
('3271', '32', 'KOTA BOGOR'),
('3272', '32', 'KOTA SUKABUMI'),
('3273', '32', 'KOTA BANDUNG'),
('3274', '32', 'KOTA CIREBON'),
('3275', '32', 'KOTA BEKASI'),
('3276', '32', 'KOTA DEPOK'),
('3277', '32', 'KOTA CIMAHI'),
('3278', '32', 'KOTA TASIKMALAYA'),
('3279', '32', 'KOTA BANJAR'),
('3301', '33', 'KABUPATEN CILACAP'),
('3302', '33', 'KABUPATEN BANYUMAS'),
('3303', '33', 'KABUPATEN PURBALINGGA'),
('3304', '33', 'KABUPATEN BANJARNEGARA'),
('3305', '33', 'KABUPATEN KEBUMEN'),
('3306', '33', 'KABUPATEN PURWOREJO'),
('3307', '33', 'KABUPATEN WONOSOBO'),
('3308', '33', 'KABUPATEN MAGELANG'),
('3309', '33', 'KABUPATEN BOYOLALI'),
('3310', '33', 'KABUPATEN KLATEN'),
('3311', '33', 'KABUPATEN SUKOHARJO'),
('3312', '33', 'KABUPATEN WONOGIRI'),
('3313', '33', 'KABUPATEN KARANGANYAR'),
('3314', '33', 'KABUPATEN SRAGEN'),
('3315', '33', 'KABUPATEN GROBOGAN'),
('3316', '33', 'KABUPATEN BLORA'),
('3317', '33', 'KABUPATEN REMBANG'),
('3318', '33', 'KABUPATEN PATI'),
('3319', '33', 'KABUPATEN KUDUS'),
('3320', '33', 'KABUPATEN JEPARA'),
('3321', '33', 'KABUPATEN DEMAK'),
('3322', '33', 'KABUPATEN SEMARANG'),
('3323', '33', 'KABUPATEN TEMANGGUNG'),
('3324', '33', 'KABUPATEN KENDAL'),
('3325', '33', 'KABUPATEN BATANG'),
('3326', '33', 'KABUPATEN PEKALONGAN'),
('3327', '33', 'KABUPATEN PEMALANG'),
('3328', '33', 'KABUPATEN TEGAL'),
('3329', '33', 'KABUPATEN BREBES'),
('3371', '33', 'KOTA MAGELANG'),
('3372', '33', 'KOTA SURAKARTA'),
('3373', '33', 'KOTA SALATIGA'),
('3374', '33', 'KOTA SEMARANG'),
('3375', '33', 'KOTA PEKALONGAN'),
('3376', '33', 'KOTA TEGAL'),
('3401', '34', 'KABUPATEN KULON PROGO'),
('3402', '34', 'KABUPATEN BANTUL'),
('3403', '34', 'KABUPATEN GUNUNG KIDUL'),
('3404', '34', 'KABUPATEN SLEMAN'),
('3471', '34', 'KOTA YOGYAKARTA'),
('3501', '35', 'KABUPATEN PACITAN'),
('3502', '35', 'KABUPATEN PONOROGO'),
('3503', '35', 'KABUPATEN TRENGGALEK'),
('3504', '35', 'KABUPATEN TULUNGAGUNG'),
('3505', '35', 'KABUPATEN BLITAR'),
('3506', '35', 'KABUPATEN KEDIRI'),
('3507', '35', 'KABUPATEN MALANG'),
('3508', '35', 'KABUPATEN LUMAJANG'),
('3509', '35', 'KABUPATEN JEMBER'),
('3510', '35', 'KABUPATEN BANYUWANGI'),
('3511', '35', 'KABUPATEN BONDOWOSO'),
('3512', '35', 'KABUPATEN SITUBONDO'),
('3513', '35', 'KABUPATEN PROBOLINGGO'),
('3514', '35', 'KABUPATEN PASURUAN'),
('3515', '35', 'KABUPATEN SIDOARJO'),
('3516', '35', 'KABUPATEN MOJOKERTO'),
('3517', '35', 'KABUPATEN JOMBANG'),
('3518', '35', 'KABUPATEN NGANJUK'),
('3519', '35', 'KABUPATEN MADIUN'),
('3520', '35', 'KABUPATEN MAGETAN'),
('3521', '35', 'KABUPATEN NGAWI'),
('3522', '35', 'KABUPATEN BOJONEGORO'),
('3523', '35', 'KABUPATEN TUBAN'),
('3524', '35', 'KABUPATEN LAMONGAN'),
('3525', '35', 'KABUPATEN GRESIK'),
('3526', '35', 'KABUPATEN BANGKALAN'),
('3527', '35', 'KABUPATEN SAMPANG'),
('3528', '35', 'KABUPATEN PAMEKASAN'),
('3529', '35', 'KABUPATEN SUMENEP'),
('3571', '35', 'KOTA KEDIRI'),
('3572', '35', 'KOTA BLITAR'),
('3573', '35', 'KOTA MALANG'),
('3574', '35', 'KOTA PROBOLINGGO'),
('3575', '35', 'KOTA PASURUAN'),
('3576', '35', 'KOTA MOJOKERTO'),
('3577', '35', 'KOTA MADIUN'),
('3578', '35', 'KOTA SURABAYA'),
('3579', '35', 'KOTA BATU'),
('3601', '36', 'KABUPATEN PANDEGLANG'),
('3602', '36', 'KABUPATEN LEBAK'),
('3603', '36', 'KABUPATEN TANGERANG'),
('3604', '36', 'KABUPATEN SERANG'),
('3671', '36', 'KOTA TANGERANG'),
('3672', '36', 'KOTA CILEGON'),
('3673', '36', 'KOTA SERANG'),
('3674', '36', 'KOTA TANGERANG SELATAN'),
('5101', '51', 'KABUPATEN JEMBRANA'),
('5102', '51', 'KABUPATEN TABANAN'),
('5103', '51', 'KABUPATEN BADUNG'),
('5104', '51', 'KABUPATEN GIANYAR'),
('5105', '51', 'KABUPATEN KLUNGKUNG'),
('5106', '51', 'KABUPATEN BANGLI'),
('5107', '51', 'KABUPATEN KARANG ASEM'),
('5108', '51', 'KABUPATEN BULELENG'),
('5171', '51', 'KOTA DENPASAR'),
('5201', '52', 'KABUPATEN LOMBOK BARAT'),
('5202', '52', 'KABUPATEN LOMBOK TENGAH'),
('5203', '52', 'KABUPATEN LOMBOK TIMUR'),
('5204', '52', 'KABUPATEN SUMBAWA'),
('5205', '52', 'KABUPATEN DOMPU'),
('5206', '52', 'KABUPATEN BIMA'),
('5207', '52', 'KABUPATEN SUMBAWA BARAT'),
('5208', '52', 'KABUPATEN LOMBOK UTARA'),
('5271', '52', 'KOTA MATARAM'),
('5272', '52', 'KOTA BIMA'),
('5301', '53', 'KABUPATEN SUMBA BARAT'),
('5302', '53', 'KABUPATEN SUMBA TIMUR'),
('5303', '53', 'KABUPATEN KUPANG'),
('5304', '53', 'KABUPATEN TIMOR TENGAH SELATAN'),
('5305', '53', 'KABUPATEN TIMOR TENGAH UTARA'),
('5306', '53', 'KABUPATEN BELU'),
('5307', '53', 'KABUPATEN ALOR'),
('5308', '53', 'KABUPATEN LEMBATA'),
('5309', '53', 'KABUPATEN FLORES TIMUR'),
('5310', '53', 'KABUPATEN SIKKA'),
('5311', '53', 'KABUPATEN ENDE'),
('5312', '53', 'KABUPATEN NGADA'),
('5313', '53', 'KABUPATEN MANGGARAI'),
('5314', '53', 'KABUPATEN ROTE NDAO'),
('5315', '53', 'KABUPATEN MANGGARAI BARAT'),
('5316', '53', 'KABUPATEN SUMBA TENGAH'),
('5317', '53', 'KABUPATEN SUMBA BARAT DAYA'),
('5318', '53', 'KABUPATEN NAGEKEO'),
('5319', '53', 'KABUPATEN MANGGARAI TIMUR'),
('5320', '53', 'KABUPATEN SABU RAIJUA'),
('5321', '53', 'KABUPATEN MALAKA'),
('5371', '53', 'KOTA KUPANG'),
('6101', '61', 'KABUPATEN SAMBAS'),
('6102', '61', 'KABUPATEN BENGKAYANG'),
('6103', '61', 'KABUPATEN LANDAK'),
('6104', '61', 'KABUPATEN MEMPAWAH'),
('6105', '61', 'KABUPATEN SANGGAU'),
('6106', '61', 'KABUPATEN KETAPANG'),
('6107', '61', 'KABUPATEN SINTANG'),
('6108', '61', 'KABUPATEN KAPUAS HULU'),
('6109', '61', 'KABUPATEN SEKADAU'),
('6110', '61', 'KABUPATEN MELAWI'),
('6111', '61', 'KABUPATEN KAYONG UTARA'),
('6112', '61', 'KABUPATEN KUBU RAYA'),
('6171', '61', 'KOTA PONTIANAK'),
('6172', '61', 'KOTA SINGKAWANG'),
('6201', '62', 'KABUPATEN KOTAWARINGIN BARAT'),
('6202', '62', 'KABUPATEN KOTAWARINGIN TIMUR'),
('6203', '62', 'KABUPATEN KAPUAS'),
('6204', '62', 'KABUPATEN BARITO SELATAN'),
('6205', '62', 'KABUPATEN BARITO UTARA'),
('6206', '62', 'KABUPATEN SUKAMARA'),
('6207', '62', 'KABUPATEN LAMANDAU'),
('6208', '62', 'KABUPATEN SERUYAN'),
('6209', '62', 'KABUPATEN KATINGAN'),
('6210', '62', 'KABUPATEN PULANG PISAU'),
('6211', '62', 'KABUPATEN GUNUNG MAS'),
('6212', '62', 'KABUPATEN BARITO TIMUR'),
('6213', '62', 'KABUPATEN MURUNG RAYA'),
('6271', '62', 'KOTA PALANGKA RAYA'),
('6301', '63', 'KABUPATEN TANAH LAUT'),
('6302', '63', 'KABUPATEN KOTA BARU'),
('6303', '63', 'KABUPATEN BANJAR'),
('6304', '63', 'KABUPATEN BARITO KUALA'),
('6305', '63', 'KABUPATEN TAPIN'),
('6306', '63', 'KABUPATEN HULU SUNGAI SELATAN'),
('6307', '63', 'KABUPATEN HULU SUNGAI TENGAH'),
('6308', '63', 'KABUPATEN HULU SUNGAI UTARA'),
('6309', '63', 'KABUPATEN TABALONG'),
('6310', '63', 'KABUPATEN TANAH BUMBU'),
('6311', '63', 'KABUPATEN BALANGAN'),
('6371', '63', 'KOTA BANJARMASIN'),
('6372', '63', 'KOTA BANJAR BARU'),
('6401', '64', 'KABUPATEN PASER'),
('6402', '64', 'KABUPATEN KUTAI BARAT'),
('6403', '64', 'KABUPATEN KUTAI KARTANEGARA'),
('6404', '64', 'KABUPATEN KUTAI TIMUR'),
('6405', '64', 'KABUPATEN BERAU'),
('6409', '64', 'KABUPATEN PENAJAM PASER UTARA'),
('6411', '64', 'KABUPATEN MAHAKAM HULU'),
('6471', '64', 'KOTA BALIKPAPAN'),
('6472', '64', 'KOTA SAMARINDA'),
('6474', '64', 'KOTA BONTANG'),
('6501', '65', 'KABUPATEN MALINAU'),
('6502', '65', 'KABUPATEN BULUNGAN'),
('6503', '65', 'KABUPATEN TANA TIDUNG'),
('6504', '65', 'KABUPATEN NUNUKAN'),
('6571', '65', 'KOTA TARAKAN'),
('7101', '71', 'KABUPATEN BOLAANG MONGONDOW'),
('7102', '71', 'KABUPATEN MINAHASA'),
('7103', '71', 'KABUPATEN KEPULAUAN SANGIHE'),
('7104', '71', 'KABUPATEN KEPULAUAN TALAUD'),
('7105', '71', 'KABUPATEN MINAHASA SELATAN'),
('7106', '71', 'KABUPATEN MINAHASA UTARA'),
('7107', '71', 'KABUPATEN BOLAANG MONGONDOW UTARA'),
('7108', '71', 'KABUPATEN SIAU TAGULANDANG BIARO'),
('7109', '71', 'KABUPATEN MINAHASA TENGGARA'),
('7110', '71', 'KABUPATEN BOLAANG MONGONDOW SELATAN'),
('7111', '71', 'KABUPATEN BOLAANG MONGONDOW TIMUR'),
('7171', '71', 'KOTA MANADO'),
('7172', '71', 'KOTA BITUNG'),
('7173', '71', 'KOTA TOMOHON'),
('7174', '71', 'KOTA KOTAMOBAGU'),
('7201', '72', 'KABUPATEN BANGGAI KEPULAUAN'),
('7202', '72', 'KABUPATEN BANGGAI'),
('7203', '72', 'KABUPATEN MOROWALI'),
('7204', '72', 'KABUPATEN POSO'),
('7205', '72', 'KABUPATEN DONGGALA'),
('7206', '72', 'KABUPATEN TOLI-TOLI'),
('7207', '72', 'KABUPATEN BUOL'),
('7208', '72', 'KABUPATEN PARIGI MOUTONG'),
('7209', '72', 'KABUPATEN TOJO UNA-UNA'),
('7210', '72', 'KABUPATEN SIGI'),
('7211', '72', 'KABUPATEN BANGGAI LAUT'),
('7212', '72', 'KABUPATEN MOROWALI UTARA'),
('7271', '72', 'KOTA PALU'),
('7301', '73', 'KABUPATEN KEPULAUAN SELAYAR'),
('7302', '73', 'KABUPATEN BULUKUMBA'),
('7303', '73', 'KABUPATEN BANTAENG'),
('7304', '73', 'KABUPATEN JENEPONTO'),
('7305', '73', 'KABUPATEN TAKALAR'),
('7306', '73', 'KABUPATEN GOWA'),
('7307', '73', 'KABUPATEN SINJAI'),
('7308', '73', 'KABUPATEN MAROS'),
('7309', '73', 'KABUPATEN PANGKAJENE DAN KEPULAUAN'),
('7310', '73', 'KABUPATEN BARRU'),
('7311', '73', 'KABUPATEN BONE'),
('7312', '73', 'KABUPATEN SOPPENG'),
('7313', '73', 'KABUPATEN WAJO'),
('7314', '73', 'KABUPATEN SIDENRENG RAPPANG'),
('7315', '73', 'KABUPATEN PINRANG'),
('7316', '73', 'KABUPATEN ENREKANG'),
('7317', '73', 'KABUPATEN LUWU'),
('7318', '73', 'KABUPATEN TANA TORAJA'),
('7322', '73', 'KABUPATEN LUWU UTARA'),
('7325', '73', 'KABUPATEN LUWU TIMUR'),
('7326', '73', 'KABUPATEN TORAJA UTARA'),
('7371', '73', 'KOTA MAKASSAR'),
('7372', '73', 'KOTA PAREPARE'),
('7373', '73', 'KOTA PALOPO'),
('7401', '74', 'KABUPATEN BUTON'),
('7402', '74', 'KABUPATEN MUNA'),
('7403', '74', 'KABUPATEN KONAWE'),
('7404', '74', 'KABUPATEN KOLAKA'),
('7405', '74', 'KABUPATEN KONAWE SELATAN'),
('7406', '74', 'KABUPATEN BOMBANA'),
('7407', '74', 'KABUPATEN WAKATOBI'),
('7408', '74', 'KABUPATEN KOLAKA UTARA'),
('7409', '74', 'KABUPATEN BUTON UTARA'),
('7410', '74', 'KABUPATEN KONAWE UTARA'),
('7411', '74', 'KABUPATEN KOLAKA TIMUR'),
('7412', '74', 'KABUPATEN KONAWE KEPULAUAN'),
('7413', '74', 'KABUPATEN MUNA BARAT'),
('7414', '74', 'KABUPATEN BUTON TENGAH'),
('7415', '74', 'KABUPATEN BUTON SELATAN'),
('7471', '74', 'KOTA KENDARI'),
('7472', '74', 'KOTA BAUBAU'),
('7501', '75', 'KABUPATEN BOALEMO'),
('7502', '75', 'KABUPATEN GORONTALO'),
('7503', '75', 'KABUPATEN POHUWATO'),
('7504', '75', 'KABUPATEN BONE BOLANGO'),
('7505', '75', 'KABUPATEN GORONTALO UTARA'),
('7571', '75', 'KOTA GORONTALO'),
('7601', '76', 'KABUPATEN MAJENE'),
('7602', '76', 'KABUPATEN POLEWALI MANDAR'),
('7603', '76', 'KABUPATEN MAMASA'),
('7604', '76', 'KABUPATEN MAMUJU'),
('7605', '76', 'KABUPATEN MAMUJU UTARA'),
('7606', '76', 'KABUPATEN MAMUJU TENGAH'),
('8101', '81', 'KABUPATEN MALUKU TENGGARA BARAT'),
('8102', '81', 'KABUPATEN MALUKU TENGGARA'),
('8103', '81', 'KABUPATEN MALUKU TENGAH'),
('8104', '81', 'KABUPATEN BURU'),
('8105', '81', 'KABUPATEN KEPULAUAN ARU'),
('8106', '81', 'KABUPATEN SERAM BAGIAN BARAT'),
('8107', '81', 'KABUPATEN SERAM BAGIAN TIMUR'),
('8108', '81', 'KABUPATEN MALUKU BARAT DAYA'),
('8109', '81', 'KABUPATEN BURU SELATAN'),
('8171', '81', 'KOTA AMBON'),
('8172', '81', 'KOTA TUAL'),
('8201', '82', 'KABUPATEN HALMAHERA BARAT'),
('8202', '82', 'KABUPATEN HALMAHERA TENGAH'),
('8203', '82', 'KABUPATEN KEPULAUAN SULA'),
('8204', '82', 'KABUPATEN HALMAHERA SELATAN'),
('8205', '82', 'KABUPATEN HALMAHERA UTARA'),
('8206', '82', 'KABUPATEN HALMAHERA TIMUR'),
('8207', '82', 'KABUPATEN PULAU MOROTAI'),
('8208', '82', 'KABUPATEN PULAU TALIABU'),
('8271', '82', 'KOTA TERNATE'),
('8272', '82', 'KOTA TIDORE KEPULAUAN'),
('9101', '91', 'KABUPATEN FAKFAK'),
('9102', '91', 'KABUPATEN KAIMANA'),
('9103', '91', 'KABUPATEN TELUK WONDAMA'),
('9104', '91', 'KABUPATEN TELUK BINTUNI'),
('9105', '91', 'KABUPATEN MANOKWARI'),
('9106', '91', 'KABUPATEN SORONG SELATAN'),
('9107', '91', 'KABUPATEN SORONG'),
('9108', '91', 'KABUPATEN RAJA AMPAT'),
('9109', '91', 'KABUPATEN TAMBRAUW'),
('9110', '91', 'KABUPATEN MAYBRAT'),
('9111', '91', 'KABUPATEN MANOKWARI SELATAN'),
('9112', '91', 'KABUPATEN PEGUNUNGAN ARFAK'),
('9171', '91', 'KOTA SORONG'),
('9401', '94', 'KABUPATEN MERAUKE'),
('9402', '94', 'KABUPATEN JAYAWIJAYA'),
('9403', '94', 'KABUPATEN JAYAPURA'),
('9404', '94', 'KABUPATEN NABIRE'),
('9408', '94', 'KABUPATEN KEPULAUAN YAPEN'),
('9409', '94', 'KABUPATEN BIAK NUMFOR'),
('9410', '94', 'KABUPATEN PANIAI'),
('9411', '94', 'KABUPATEN PUNCAK JAYA'),
('9412', '94', 'KABUPATEN MIMIKA'),
('9413', '94', 'KABUPATEN BOVEN DIGOEL'),
('9414', '94', 'KABUPATEN MAPPI'),
('9415', '94', 'KABUPATEN ASMAT'),
('9416', '94', 'KABUPATEN YAHUKIMO'),
('9417', '94', 'KABUPATEN PEGUNUNGAN BINTANG'),
('9418', '94', 'KABUPATEN TOLIKARA'),
('9419', '94', 'KABUPATEN SARMI'),
('9420', '94', 'KABUPATEN KEEROM'),
('9426', '94', 'KABUPATEN WAROPEN'),
('9427', '94', 'KABUPATEN SUPIORI'),
('9428', '94', 'KABUPATEN MAMBERAMO RAYA'),
('9429', '94', 'KABUPATEN NDUGA'),
('9430', '94', 'KABUPATEN LANNY JAYA'),
('9431', '94', 'KABUPATEN MAMBERAMO TENGAH'),
('9432', '94', 'KABUPATEN YALIMO'),
('9433', '94', 'KABUPATEN PUNCAK'),
('9434', '94', 'KABUPATEN DOGIYAI'),
('9435', '94', 'KABUPATEN INTAN JAYA'),
('9436', '94', 'KABUPATEN DEIYAI'),
('9471', '94', 'KOTA JAYAPURA');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id_siswa` varchar(32) NOT NULL,
  `nis` varchar(32) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kota_lahir` varchar(128) NOT NULL,
  `tanggal_lahir` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `alamat` text NOT NULL,
  `kota_tinggal` varchar(128) NOT NULL,
  `no_telpon` varchar(80) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id_siswa`, `nis`, `nama`, `kota_lahir`, `tanggal_lahir`, `alamat`, `kota_tinggal`, `no_telpon`, `pendidikan`, `created_at`, `updated_at`) VALUES
('0I4517nm6QeT23SfhOztf3w2AHPo7REe', '2102020826', 'Raihan Tsany Virgiawan', '3578', '2000-08-01 17:00:00', 'Kedung Anyar 9 No. 40', '3578', '081946776267', 'S1', '2021-08-29 08:24:00', '2021-08-29 08:24:00'),
('0ppwnXvFATpUVsSLfLBRujDYWyx6Rnw9', '2102040838', 'Novi Hariyanti', '3578', '2021-08-28 17:00:00', 'Simo Kalangan', '3578', '081310186857', 'S1', '2021-08-29 11:51:56', '2021-08-29 11:51:56'),
('14NNKmrCOSOpod0hYaiavR1Auon8cZWk', '2102040841', 'Aprillia W', '3578', '2000-04-28 17:00:00', 'Jl. Karangan II No. 12 A', '3578', '081217500132', 'S1', '2021-08-29 11:59:39', '2021-08-29 11:59:39'),
('16xKenbs8gSzS71LHN6vfdbbafPKzBNv', '2102060811', 'Muhammad Fauzi', '3506', '1999-08-03 17:00:00', 'Jl Tunggul Wulung No 377, Kecamatan Ngasem, Kabupaten Kediri', '3506', '089677015186', 'D4', '2021-08-23 06:34:07', '2021-08-23 11:13:18'),
('1IF7QGhEU1BM6ddUTNilE98zjVwLiKiX', '2102020825', 'Deliyah Ayu S', '3578', '2000-03-28 17:00:00', 'JL. Simorejo Sari A 6 No. 127', '3578', '082221838294', 'S1', '2021-08-29 08:17:27', '2021-08-29 08:21:11'),
('1MnFTQ8wg7ZwIT3h63qkIYmH5DwPX8iK', '2102040833', 'Fasyatoru Priyo ardana', '3578', '2000-08-08 17:00:00', 'Petemon IV No. 139', '3578', '08121666212', 'D4', '2021-08-29 11:34:19', '2021-08-29 11:34:19'),
('2zTWzS4oaOXWRzatkNBhka29Gn9jB26T', '2103060820', 'Akhmad Miftakhul Amri', '3515', '2000-10-02 17:00:00', 'Balongbendo Sidoarjo', '3515', '08973188499', 'D4', '2021-08-23 07:24:43', '2021-08-23 11:21:05'),
('3fsbAOAaXV2KHyoDfjAIQGFnkq9zTtVF', '2102040832', 'Ana Herawati', '3578', '2000-08-28 17:00:00', 'Prada Kali Kendal 4 No. 14', '3578', '083831116524', 'S1', '2021-08-29 11:31:05', '2021-08-29 11:31:05'),
('3JDJR8loX47N4fxdg7nyAsGM9ncTLHhf', '2102070846', 'Merlinda  S.A.P', '3578', '2005-03-28 17:00:00', 'Petemon 2 No. 125 E', '3578', '083857136417', 'SMP', '2021-08-29 12:29:37', '2021-08-29 12:29:37'),
('5SlwhWXUeGGvIyFpkLgkCwHCSbiUJgG4', '2102070850', 'Hayu Abdaha', '3578', '2007-08-01 17:00:00', 'Banyu Urip Lor VI No. 102', '3578', '0', 'SMP', '2021-08-29 12:50:11', '2021-08-29 12:50:11'),
('62hnoESHBddW4XNLtiFetKU2QjShPBtE', '2102060812', 'Melyssa Dwi Kartika', '3514', '2000-08-22 17:00:00', 'Jeruk Kuwik - Ngadimulyo - Kecamatan Sukorejo - Kabupaten Pasuruan - Jawa Timur - Indonesia - 67161', '3514', '089683842871', 'D4', '2021-08-23 06:35:33', '2021-08-23 11:13:40'),
('6GPQJW8uyILo1JKHkMvtLKjBE2j02oIh', '2102040839', 'Azzahra Khanun Nisrina', '3578', '2000-08-01 17:00:00', 'Simo Jawar', '3578', '085608991110', 'S1', '2021-08-29 11:54:33', '2021-08-29 11:54:33'),
('aMEEJB694cJkCBqzDGJsLDuazpuz48Vk', '2102050864', 'Avril Verinda Dwi Tamylia', '3578', '2000-03-01 17:00:00', 'Sukomanunggal V No. 20', '3578', '081231861251', 'S1', '2021-08-29 14:00:17', '2021-08-29 14:00:17'),
('AuT7f6Ui3ZEqFGUj6VoczLOXoQWaG2M3', '2102070852', 'Rachael Dwi S', '3578', '2007-08-08 17:00:00', 'Simo Gunung', '3578', '0', 'SMP', '2021-08-29 13:00:48', '2021-08-29 13:00:48'),
('b4WvwIMyrkWLceE6vPuXnQHf83GwWniZ', '2102020822', 'Dinda M', '3578', '2000-08-01 17:00:00', 'Jl. Kedung Anyar Gang Buntu', '3578', '0', 'D4', '2021-08-29 07:33:49', '2021-08-29 07:33:49'),
('bmuVxDJkAlVJr6UG8yTSKJacqQfb3kIc', '2102040835', 'Abdurrahman G', '3578', '2000-02-28 17:00:00', 'Jl. Lasem No. 7', '3578', '0811348179', 'S1', '2021-08-29 11:42:03', '2021-08-29 11:42:03'),
('Dq7PPr6ImCp0ykqCUlxx7rH7fBSMaDIM', '2102070847', 'Dimas Restu Putra', '3578', '2005-08-01 17:00:00', 'Simo Kwagean 40', '3578', '087855585965', 'SMP', '2021-08-29 12:33:56', '2021-08-29 12:33:56'),
('E3bO8iUZxSfBa5xqsk93o290pwPdRGTf', '2102020821', 'Dimas Iqbal Abimanyu', '3578', '2021-08-25 17:00:00', 'Jl. Jugruk Rejosari III B', '3578', '083831116524', 'D4', '2021-08-26 02:37:38', '2021-08-26 02:37:38'),
('eCXVMWYUBXyeEoWuH85CLjfQftWhU3nv', '2103060818', 'Elok Amaylia Swasthika Candra', '3504', '2000-02-22 17:00:00', 'Ds. Sumberdadi, Kec. Sumbergempol, Kab. Tulungagung', '3504', '085604900059', 'D4', '2021-08-23 07:21:09', '2021-08-23 11:20:23'),
('g0SakEyUUGaQrwF4DEvJvtgeSjozDabq', '2102050862', 'Aldo Christian', '3578', '2000-03-01 17:00:00', 'Margorejo', '3578', '082121318118', 'S1', '2021-08-29 13:51:18', '2021-08-30 03:12:40'),
('GS70E0VoHS7kczpdSnk3hOdYvMEBzRU3', '2102060809', 'IVAN AZWAR SEPTIADI', '3578', '2000-09-22 17:00:00', 'Jl Gebang Kidul No 56 D kelurahan Gebang Kidul kecamatan Sukolilo kota Surabaya', '3578', '082264150848', 'D4', '2021-08-23 06:30:58', '2021-08-23 11:12:44'),
('h5inB6wTEpSe57130IOtwYQQM9Y1gAYz', '2102060802', 'Sovia Rahmania Warda', '3507', '2000-04-15 17:00:00', 'Perum. Pandanwangi Royal Park Blok F No.9,Malang', '3507', '085155430148', 'D4', '2021-08-23 06:16:52', '2021-08-23 11:08:55'),
('HYIhefUFvqHOhVdVumWHN1sl2Va8B3KL', '2102040827', 'Hairul Umam', '3578', '2000-08-07 17:00:00', 'Sawahan DKA 4 No. 38 B', '3578', '085876046196', 'S1', '2021-08-29 08:50:38', '2021-08-29 08:50:38'),
('i4KaIbJud2CH2Cif572mezTAw2IY3gyC', '2102060804', 'M.Dzulfikri Arief Rizaldy', '3578', '2000-02-22 17:00:00', 'Jl.BumisariPraja 87', '3578', '085855112260', 'D4', '2021-08-23 06:21:46', '2021-08-23 11:10:25'),
('ihbBORdQaCxeGI0O9t6iHFMyQ2g24INI', '2102070848', 'Evan Edgar', '3578', '2010-08-08 17:00:00', 'Jl. Wonorejo IV No. 64', '3578', '08991959479', 'SD', '2021-08-29 12:38:23', '2021-08-29 12:38:23'),
('iNo5Eydz5GxqcrNZqvmWFjHpCIkXlufk', '2102070860', 'Aliya Putri Rahmawati', '3578', '2010-03-01 17:00:00', 'Simo Pomahan 5 No. 47', '3578', '081235577341', 'SD', '2021-08-29 13:38:19', '2021-08-29 13:38:19'),
('jAmA2qRELTXffbBMBmlGQTbFtdApY9Sy', '2102040830', 'Aliyyah Atta Z', '3578', '2000-03-28 17:00:00', 'Petemon 3A No. 101', '3578', '08139144443', 'S1', '2021-08-29 09:00:02', '2021-08-29 09:00:02'),
('jkVGOCOejiEhf38hIgRiQK42twSOclHi', '2103060819', 'Nur Lailany Fenny Beauty', '3515', '2000-08-20 17:00:00', 'Perum. TNI-AL Blok C9/30 Candi, Sidoarjo', '3515', '085655484434', 'D4', '2021-08-23 07:22:47', '2021-08-23 11:20:49'),
('jwo4vNwG3Tvxs73wGvE3WnMhAGZcvpSg', '2102060806', 'Arrizqi Wildan Firdani', '3504', '2000-06-22 17:00:00', 'RT 01/ RW 10, Ds. Pulosari, Kec. Ngunut, Kab. Tulungagung', '3504', '83846221877', 'D4', '2021-08-23 06:25:26', '2021-08-23 11:11:19'),
('lCLDzGIMEuEBczE6PDc1IrJ6OAXzCLQO', '2102020823', 'Leli Rosyida Fitriyani', '3578', '2000-04-28 17:00:00', 'Jl. Pakis I No. 48', '3578', '082132369807', 'S1', '2021-08-29 08:00:24', '2021-08-29 08:00:24'),
('lcSNfob2G2GnfOeGW6Whr1ekWIbKaYYZ', '2102070853', 'Lailatul Hasanah', '3578', '2007-03-28 17:00:00', 'Kupang Praupan Pasal Gang I No. 6A', '3578', '087854966675', 'SMP', '2021-08-29 13:03:43', '2021-08-29 13:03:43'),
('ll457MggKouyMHEgzQnNYEUozZjplbOR', '2102040834', 'Bayu Ihsan Tsani J', '3578', '2000-06-28 17:00:00', 'Banyu Urip Kidul 10E No. 6', '3578', '081358950467 085100391775', 'D4', '2021-08-29 11:39:00', '2021-08-29 11:39:00'),
('LW1IkkDLZDPFrf6kSOojijdzM1j8sWTi', '2102060810', 'Nata Hatan Maurisga Putra', '3578', '2000-08-19 17:00:00', 'ITS Sukolilo, Jl. Teknik Kimia, Kec. Sukolilo, Kota Surabaya, Jawa Timur 60111', '3578', '082187684245', 'D4', '2021-08-23 06:32:32', '2021-08-23 11:13:02'),
('M9nHuq8uwp0owFcYcsHYOOe8c3DoNXtV', '2102070856', 'Bahtiar Wijaya', '3578', '2007-01-28 17:00:00', 'Simo gunung Kramat Timur I No. 6A', '3578', '082234439572', 'SMP', '2021-08-29 13:15:23', '2021-08-29 13:15:23'),
('NvwfvOD6fHgMOk7ph45WK9BnUKIH6MgY', '2102070861', 'Febriyani Nur Halimah', '3578', '2004-05-08 17:00:00', 'Jl. Dupak Rukun Gang 4 No. 2', '3578', '081230334270', 'SMA', '2021-08-29 13:45:37', '2021-08-29 13:45:37'),
('NzUl3hAnzyYnGNenlmTsEu5QYnsH0a6Q', '2102040831', 'Evan Edgar', '3578', '2007-08-28 17:00:00', 'Jl. Wonorejo IV No. 64', '3578', '083831116524', 'SMP', '2021-08-29 11:15:49', '2021-08-29 12:45:43'),
('ofqEEzuAc06INynkfIgr7meGQ8t2W0Tg', '2103060817', 'Dwy Septyaningrum', '3578', '2000-09-01 17:00:00', 'Gedung Inovasi inkubator Bisnis PPNS, Jl Teknik Kimia Kampus ITS Sukolilo', '3578', '085704124011', 'D4', '2021-08-23 07:18:21', '2021-08-23 11:20:02'),
('ogVK9hxupIWtfxPYHMHDEhW8t6rdfNhA', '2102040844', 'Oxsha Dhea', '3578', '2000-08-08 17:00:00', 'General English', '3578', '082233754336', 'S1', '2021-08-29 12:15:51', '2021-08-29 12:15:51'),
('OvURPGZmQjTj5qBmEU8NcmdXDBphauEO', '2102040843', 'Sabbihisma Anasya Noer Triyono', '3578', '2000-03-28 17:00:00', 'Simo Magerejo V No. 15', '3578', '082313940008', 'S1', '2021-08-29 12:07:09', '2021-08-29 12:07:09'),
('ozwDgFuI2FdCywea2ptfblnSn2A2Twlt', '2103060816', 'Rina Agustin', '3578', '2000-01-22 17:00:00', 'Gedung Inovasi Lt. 2, Inkubator Bisnis PPNS, Jl. Teknik Kimia, Keputih, Sukolilo, Surabaya, Jawa Timur, 60117', '3578', '081230814510', 'D4', '2021-08-23 07:15:12', '2021-08-23 11:19:48'),
('PAth99zbSnEBoB6KDhUZYB7MwF0nV2D8', '2102060813', 'Ryan Angga Rista', '3578', '2000-07-02 17:00:00', 'Jl.Tambak Wedi Indah Barat II-27 blok C Lantai.2', '3578', '08563069639', 'D4', '2021-08-23 06:37:43', '2021-08-23 11:13:58'),
('pcAdM9GjMEtNHlKO68rCRPlC54O3Exod', '2102060803', 'indah laili suqya rahmad', '3578', '2000-03-16 17:00:00', 'Jalan kejawan putih tambak no 4,mulyorejo, surabaya, indonesia', '3578', '082351486225', 'D4', '2021-08-23 06:19:00', '2021-08-23 11:10:07'),
('PeGSFvTXhTVhiXiJ339cnlINoWlv5bf2', '2102070849', 'Amelia Nasywa Azaria', '3578', '2007-08-28 17:00:00', 'Simo Gunung Kramat Timur I No. 9A', '3578', '085103331229', 'SMP', '2021-08-29 12:45:02', '2021-08-29 12:45:02'),
('PWfIkGrhkLLNeS3nPsn3re5EZA47Dzf4', '2102060805', 'Vikri Rahmad Hidayat', '3578', '2000-08-01 17:00:00', 'Jalan Teknik Kimia, Kampus ITS Sukolilo, Surabaya – Jawa timur 60111', '3578', '085745510608', 'D4', '2021-08-23 06:23:41', '2021-08-23 11:10:43'),
('qfBnEPcxde2dQH76ygrMKGWtWTfV4E6i', '2102070859', 'Noval Bevano A.S', '3578', '2007-04-01 17:00:00', 'Simo Kwagean Gang Buntu Lor 46', '3578', '081333005339', 'SMP', '2021-08-29 13:32:51', '2021-08-29 13:32:51'),
('qgls98a1OetoigbcrNIBsivT8lcswqw1', '2102070855', 'Yoheva Rapha Rinja', '3578', '2010-07-31 17:00:00', 'Simo Kwagean Gang Buntu Lor 36A', '3578', '081216102383', 'SD', '2021-08-29 13:12:13', '2021-08-29 13:12:13'),
('qm76Hsq3YmuOHxsDDodZhdryntrWyuYy', '2102040842', 'Maulan haidar Fatr Aly', '3578', '2000-05-08 17:00:00', 'Kedung Anyar 6 No. 40', '3578', '082229051864', 'S1', '2021-08-29 12:02:53', '2021-08-29 12:02:53'),
('R9pyyxPi2Db8pDvkT9hT9LoIMPvIBmKk', '2102060808', 'Angger Prasojo', '3578', '2000-05-22 17:00:00', 'Gedung Pusat Inovasi dan Pengembangan Bisnis Lantai 2, Jalan  Teknik Kimia, Kampus ITS Sukolilo, Surabaya – Jawa timur 60111', '3578', '081216054099', 'D4', '2021-08-23 06:28:53', '2021-08-23 11:12:17'),
('RXhtgEw3XOYdYxunbBFBWPQyBSNB4ftD', '2102060807', 'Alifa Prasetyani Fadila', '3578', '1999-08-22 17:00:00', 'Gedung Inovasi inkubator Bisnis PPNS, Jl Teknik Kimia Kampus ITS Sukolilo', '3578', '085648564851', 'D4', '2021-08-23 06:27:03', '2021-08-23 11:11:54'),
('SjrMJ4BLCHSgqM4MHMD9ug2qdZRXSzJd', '2102040837', 'Evelyn Fiorenza A. T', '3578', '2012-09-28 17:00:00', 'Tembok Asri Kembang Sepatu 26', '3578', '085732223230', 'S1', '2021-08-29 11:47:29', '2021-08-29 11:47:29'),
('tAqGbcdpnN3KmLn2Vk3URuIYtRZa8Owe', '2102060801', 'Muhammad Haffid Indra Brillyanto', '3515', '2000-08-25 17:00:00', 'Jl. H. Nur RT 11 / RW 03 Desa Sugihwaras - Kecamatan Candi Kabupaten Sidoarjo - Provinsi Jawa Timur Kode Pos : 61271', '3515', '62895323069571', 'D4', '2021-08-23 06:13:29', '2021-08-23 11:03:08'),
('UecJUO22QFB22cvhUeYq2sJupYPxZUNt', '2103060865', 'Aldi Rahma Rianto', '3513', '2000-08-29 17:00:00', 'Jl Wijaya Kusuma Gg 5 No 18 Kota Probolinggo', '3513', '085733038507', 'D4', '2021-08-30 04:25:04', '2021-08-30 04:25:04'),
('UGjvt1LY18ByCwhfV0Ez8cD7RqifqSg7', '2102040840', 'Betrik Nur A. S', '3578', '2000-08-22 17:00:00', 'Putat Jaya Sekolahan 28', '3578', '087703331062', 'D4', '2021-08-29 11:57:34', '2021-08-29 11:57:34'),
('uZFl3b72CWwsJ0j3h1ynwGUgkKRpRaax', '2102040829', 'Ahmad Atta Dafa D', '3578', '2000-08-28 17:00:00', 'Petemon 3A No. 101', '3578', '082132369807', 'S1', '2021-08-29 08:57:49', '2021-08-29 08:57:49'),
('vi7Ks3K00robceDSlYsq2bgxhjgPtjIt', '2103060815', 'Moch Fadhil Ramadhan', '3578', '2000-07-31 17:00:00', 'Surabaya', '3578', '082237112808', 'D4', '2021-08-23 06:58:20', '2021-08-23 11:19:31'),
('wc7MU1HgE0WCO7EkJe69OEb8OUy2hThr', '2102050863', 'Rahadianti Oktivialin', '3578', '2000-02-01 17:00:00', 'Kebraon', '3578', '085232182288', 'S1', '2021-08-29 13:55:17', '2021-08-29 13:55:17'),
('WCdjl8yDOnqIiPMfr8BCiAIkNCnOvlRd', '2102070854', 'jalan Demak Jaya II No. 65', '3578', '2007-08-18 17:00:00', 'jalan Demak Jaya II No. 65', '3578', '085230070715', 'SMP', '2021-08-29 13:10:12', '2021-08-29 13:10:12'),
('WI3ZIbWaW9HboVx8VaIiQD3mDoGNJUI6', '2102070857', 'Andi Tyara N', '3578', '2004-02-28 17:00:00', 'Kupang Krajan Lor I No. 55', '3578', '081335946764', 'SMA', '2021-08-29 13:18:55', '2021-08-29 13:18:55'),
('yAgF6oI44EWH5OaF2GqUUH58pC7s6XN0', '2102070851', 'Jessica Aura', '3578', '2004-08-08 17:00:00', 'Persiapan UNAS SMA', '3578', '085536715101', 'SMA', '2021-08-29 12:54:15', '2021-08-29 12:54:15'),
('YPwmwVy3Tu79aHPesIdbFehTC57vZT9n', '2102070858', 'Ayudia Wahidah', '3578', '2004-01-08 17:00:00', 'Jl. Asem Jaya VI No. 2', '3578', '081336190121', 'SMA', '2021-08-29 13:27:34', '2021-08-29 13:27:34'),
('z4XothaTlh5aNV7pjMWoDDXPx6HLoeOx', '2102020824', 'Greyolis Baptista Irene Laleat', '3578', '2000-08-08 17:00:00', 'Petemon Barat 170 B', '3578', '082234752687', 'D4', '2021-08-29 08:15:41', '2021-08-29 08:21:30'),
('Z9KRT2XmZSLWUnI3ddjh5pJ8kVLvLBBv', '2102040845', 'Agustian', '3578', '2000-05-28 17:00:00', 'Simorejo Timur I No. 47', '3578', '0822438151', 'S1', '2021-08-29 12:19:44', '2021-08-29 12:19:44'),
('zEQns7EVFsZ5FnnHe1YgU1i9oDLUhaGq', '2102040828', 'Amanda Attazahwa D', '3578', '2000-04-01 17:00:00', 'Petemon 3A No. 101', '3578', '08139144443', 'S1', '2021-08-29 08:54:10', '2021-08-29 08:54:10'),
('ZiClIC8OXdDzlS87lnQ5qjPTYmxm1NXA', '2102040836', 'Arif Puji H', '3578', '2000-08-28 17:00:00', 'Petemon 2 No. 79', '3578', '085100391775', 'S1', '2021-08-29 11:44:43', '2021-08-29 11:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `uang`
--

CREATE TABLE `uang` (
  `id_uang` varchar(8) NOT NULL,
  `jenis_uang` varchar(32) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uang`
--

INSERT INTO `uang` (`id_uang`, `jenis_uang`, `jumlah`, `created_at`, `updated_at`) VALUES
('03GLIP7E', 'pendaftaran', 4000000, '2021-08-19 08:17:15', '2021-08-19 08:17:15'),
('1LRZ3JXJ', 'kursus', 800000, '2021-07-22 08:44:31', '2021-07-22 08:44:31'),
('2WKEPLOM', 'kursus', 400000, '2021-07-22 08:44:13', '2021-07-22 08:44:13'),
('3XZRYS98', 'kursus', 245000, '2021-08-23 07:49:50', '2021-08-23 07:49:50'),
('5AAW63RG', 'kursus', 205000, '2021-08-23 07:51:32', '2021-08-23 07:51:32'),
('6K6TBNNT', 'kursus', 200000, '2021-07-22 08:43:41', '2021-07-22 08:43:41'),
('6KS9DVC7', 'ujian_sertifikat', 0, '2021-08-19 04:35:00', '2021-08-19 04:35:00'),
('6NS2QANS', 'kursus', 900000, '2021-07-22 08:44:36', '2021-07-22 08:44:36'),
('6WZHIJDD', 'kursus', 600000, '2021-07-22 08:44:20', '2021-07-22 08:44:20'),
('7ZOLAQLE', 'kursus', 100000, '2021-07-21 16:43:31', '2021-07-21 16:43:31'),
('9PDITVNC', 'kursus', 270000, '2021-08-23 07:49:31', '2021-08-23 07:49:31'),
('AAKD5KQM', 'kursus', 4000000, '2021-08-10 23:40:32', '2021-08-10 23:40:32'),
('AQJAWEV6', 'kursus', 225000, '2021-07-22 08:43:52', '2021-07-22 08:43:52'),
('B1XOUFO3', 'kursus', 150000, '2021-07-22 08:43:31', '2021-07-22 08:43:31'),
('BGJBOYR0', 'kursus', 180000, '2021-07-22 08:43:36', '2021-07-22 08:43:36'),
('BZACMGNR', 'buku', 170000, '2021-08-29 12:10:36', '2021-08-29 12:10:36'),
('C4CQXXCK', 'kursus', 4000000, '2021-08-19 04:29:39', '2021-08-19 04:29:39'),
('CLPP5EVY', 'buku', 30000, '2021-08-29 11:13:25', '2021-08-29 11:13:25'),
('D9GIFDBE', 'kursus', 140000, '2021-08-29 11:36:58', '2021-08-29 11:36:58'),
('DSDJOYMT', 'kursus', 155000, '2021-08-23 07:55:30', '2021-08-23 07:55:30'),
('DSHDPBF5', 'kursus', 2000000, '2021-07-22 08:44:55', '2021-07-22 08:44:55'),
('DZVAM3XQ', 'buku', 575000, '2021-08-29 13:05:23', '2021-08-29 13:05:23'),
('GFKVTYME', 'kursus', 910000, '2021-08-23 07:44:30', '2021-08-23 07:44:30'),
('GGK0XHDC', 'kursus', 760000, '2021-08-29 08:13:48', '2021-08-29 08:13:48'),
('I2BSSLSI', 'kursus', 2500000, '2021-07-22 08:45:05', '2021-07-22 08:45:05'),
('IJE98U6A', 'ujian_sertifikat', 75000, '2021-07-22 18:13:14', '2021-07-22 18:13:14'),
('JM47YSZN', 'buku', 0, '2021-08-19 04:35:13', '2021-08-19 04:35:13'),
('JNC3NTBB', 'kursus', 925000, '2021-08-29 13:42:13', '2021-08-29 13:42:13'),
('JVQ43YCV', 'buku', 40000, '2021-08-29 11:37:10', '2021-08-29 11:37:10'),
('K4UCQ5MB', 'kursus', 575000, '2021-08-29 13:08:42', '2021-08-29 13:08:42'),
('KMVOQ6DW', 'buku', 80000, '2021-07-22 08:57:22', '2021-07-22 08:57:22'),
('LJBNSP8M', 'kursus', 1400000, '2021-07-22 08:44:43', '2021-07-22 08:44:43'),
('M2LKZA0F', 'kursus', 130000, '2021-08-23 07:52:03', '2021-08-23 07:52:03'),
('MH6PSOY0', 'kursus', 120000, '2021-08-23 07:55:40', '2021-08-23 07:55:40'),
('NH2MK0OD', 'ujian_sertifikat', 25000, '2021-08-26 01:58:16', '2021-08-26 01:58:16'),
('OVWWRCQI', 'kursus', 0, '2021-08-19 04:35:19', '2021-08-19 04:35:19'),
('PIWXGZAJ', 'kursus', 1035000, '2021-08-23 07:48:48', '2021-08-23 07:48:48'),
('PQ7NKXOI', 'kursus', 500000, '2021-08-10 23:40:45', '2021-08-10 23:40:45'),
('QNY9XAZI', 'kursus', 1500000, '2021-08-10 23:45:12', '2021-08-10 23:45:12'),
('QVJLVGWY', 'buku', 25000, '2021-08-10 23:45:32', '2021-08-10 23:45:32'),
('SANE7XO0', 'pendaftaran', 250000, '2021-08-05 06:31:43', '2021-08-05 06:31:43'),
('SFO9BNEI', 'buku', 35000, '2021-08-29 12:04:36', '2021-08-29 12:04:36'),
('TP7PIH7V', 'kursus', 300000, '2021-07-22 08:44:07', '2021-07-22 08:44:07'),
('TREKHFXL', 'kursus', 1800000, '2021-07-22 08:44:50', '2021-07-22 08:44:50'),
('TWDMXLHO', 'pendaftaran', 75000, '2021-07-21 16:36:18', '2021-07-21 16:36:18'),
('U6XKQKSJ', 'kursus', 170000, '2021-08-23 07:51:56', '2021-08-23 07:51:56'),
('UMX8FX2U', 'kursus', 310000, '2021-08-29 13:49:00', '2021-08-29 13:49:00'),
('VWBK9LO9', 'buku', 45000, '2021-08-29 12:13:52', '2021-08-29 12:13:52'),
('WGGGD3YF', 'buku', 20000, '2021-08-29 08:45:40', '2021-08-29 08:45:40'),
('WJPBM3RC', 'pendaftaran', 0, '2021-08-19 04:30:15', '2021-08-19 04:30:15'),
('WPGB0XKS', 'kursus', 6000000, '2021-07-22 08:45:12', '2021-07-22 08:45:12'),
('XU9TLOZC', 'kursus', 250000, '2021-07-22 08:43:57', '2021-07-22 08:43:57'),
('YKMLF8IP', 'kursus', 450000, '2021-08-26 02:32:39', '2021-08-26 02:32:39'),
('ZWORZUKO', 'kursus', 750000, '2021-08-10 23:40:54', '2021-08-10 23:40:54'),
('ZYO2DHF7', 'buku', 70000, '2021-08-29 11:17:26', '2021-08-29 11:17:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id_cabang`);

--
-- Indexes for table `detail_kursus`
--
ALTER TABLE `detail_kursus`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  ADD PRIMARY KEY (`id_detail_pembayaran`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`);

--
-- Indexes for table `fk_detail_siswa`
--
ALTER TABLE `fk_detail_siswa`
  ADD KEY `hasSiswa` (`id_siswa`),
  ADD KEY `id_detail_kursus` (`id_detail_kursus`),
  ADD KEY `hasCabang` (`id_cabang`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id_kursus`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `regencies`
--
ALTER TABLE `regencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `uang`
--
ALTER TABLE `uang`
  ADD PRIMARY KEY (`id_uang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id_cabang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  MODIFY `id_detail_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kursus`
--
ALTER TABLE `kursus`
  MODIFY `id_kursus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fk_detail_siswa`
--
ALTER TABLE `fk_detail_siswa`
  ADD CONSTRAINT `hasCabang` FOREIGN KEY (`id_cabang`) REFERENCES `cabang` (`id_cabang`),
  ADD CONSTRAINT `hasDetailKursus` FOREIGN KEY (`id_detail_kursus`) REFERENCES `detail_kursus` (`id_detail`) ON DELETE CASCADE,
  ADD CONSTRAINT `hasSiswa` FOREIGN KEY (`id_siswa`) REFERENCES `student` (`id_siswa`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
