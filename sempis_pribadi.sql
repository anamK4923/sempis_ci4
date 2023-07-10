-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jul 2023 pada 10.47
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sempis_pribadi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'Admin TU', 'Site Administrator'),
(2, 'Guru', 'Site Teacher\'s'),
(3, 'Kepala Sekolah', 'Site Head School');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 23),
(2, 28),
(3, 29);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'aaa', NULL, '2023-04-04 17:47:49', 0),
(2, '::1', 'anamK', 1, '2023-04-04 18:15:19', 0),
(3, '::1', 'harusjadi@gmail.com', 10, '2023-04-04 18:27:59', 1),
(4, '::1', 'admin69@gmail.com', 16, '2023-04-04 19:02:53', 1),
(5, '::1', 'sempis69@gmail.com', 17, '2023-04-05 00:56:02', 1),
(6, '::1', 'admin69@gmail.com', NULL, '2023-04-05 01:20:49', 0),
(7, '::1', 'admin', NULL, '2023-04-05 01:20:59', 0),
(8, '::1', 'admin', NULL, '2023-04-05 01:21:03', 0),
(9, '::1', 'admin', NULL, '2023-04-05 01:21:10', 0),
(10, '::1', 'onepiece4923@gmail.com', 18, '2023-04-05 01:25:21', 1),
(11, '::1', 'onepiece4923@gmail.com', 18, '2023-04-05 01:40:05', 1),
(12, '::1', 'onepiece4923@gmail.com', 18, '2023-04-05 01:41:09', 1),
(13, '::1', 'onepiece4923@gmail.com', 18, '2023-04-05 01:43:30', 1),
(14, '::1', 'onepiece4923@gmail.com', 18, '2023-04-05 01:49:27', 1),
(15, '::1', 'onepiece4923@gmail.com', 18, '2023-04-05 01:50:29', 1),
(16, '::1', 'admin@gmail.com', 19, '2023-04-10 07:34:23', 1),
(17, '::1', 'admin@gmail.com', 19, '2023-04-10 07:36:10', 1),
(18, '::1', 'admin@gmail.com', 19, '2023-04-10 21:31:43', 1),
(19, '::1', 'admin@gmail.com', 19, '2023-04-11 00:53:40', 1),
(20, '::1', 'admin@gmail.com', 19, '2023-04-11 22:06:57', 1),
(21, '::1', 'admin', NULL, '2023-04-12 02:39:13', 0),
(22, '::1', 'admin@gmail.com', 19, '2023-04-12 02:39:22', 1),
(23, '::1', 'admin', NULL, '2023-04-20 04:33:42', 0),
(24, '::1', 'admin', NULL, '2023-04-20 04:36:56', 0),
(25, '::1', 'anam33@gmail.com', 20, '2023-04-20 04:40:12', 1),
(26, '::1', 'admin', NULL, '2023-05-02 14:10:02', 0),
(27, '::1', 'anamk4923@gmail.com', 21, '2023-05-02 14:11:52', 1),
(28, '::1', 'anamk4923@gmail.com', 21, '2023-05-02 15:28:50', 1),
(29, '::1', 'anamk', NULL, '2023-05-02 15:50:49', 0),
(30, '::1', 'anamk4923@gmail.com', 21, '2023-05-02 15:51:00', 1),
(31, '::1', 'anamk4923@gmail.com', 21, '2023-05-03 00:32:27', 1),
(32, '::1', 'admin11@gmail.com', 22, '2023-05-10 00:22:37', 1),
(33, '::1', 'admin11@gmail.com', 22, '2023-05-10 01:03:27', 1),
(34, '::1', 'admin', NULL, '2023-05-14 07:50:42', 0),
(35, '::1', 'sempis@gmail.com', 23, '2023-05-14 07:53:53', 1),
(36, '::1', 'acer@gmail.com', 24, '2023-05-14 08:46:12', 1),
(37, '::1', 'sempis@gmail.com', 23, '2023-05-14 09:40:27', 1),
(38, '::1', 'admin1', NULL, '2023-05-24 10:32:58', 0),
(39, '::1', 'sempis@gmail.com', 23, '2023-05-24 10:33:04', 1),
(40, '::1', 'sempis@gmail.com', 23, '2023-05-24 17:01:54', 1),
(41, '::1', 'admin1', NULL, '2023-05-25 01:42:01', 0),
(42, '::1', 'admin1', NULL, '2023-05-25 01:42:11', 0),
(43, '::1', 'sempis@gmail.com', 23, '2023-05-25 01:42:38', 1),
(44, '::1', 'sempis@gmail.com', 23, '2023-06-06 08:32:20', 1),
(45, '::1', 'irhasul@gmail.com', 28, '2023-06-06 09:13:26', 1),
(46, '::1', 'irhasul@gmail.com', 28, '2023-06-06 09:15:04', 1),
(47, '::1', 'irhasul@gmail.com', 28, '2023-06-06 09:16:45', 1),
(48, '::1', 'sempis@gmail.com', 23, '2023-06-06 09:16:57', 1),
(49, '::1', 'sempis@gmail.com', 23, '2023-06-06 09:19:46', 1),
(50, '::1', 'sempis@gmail.com', 23, '2023-06-06 09:26:33', 1),
(51, '::1', 'irhasul@gmail.com', 28, '2023-06-06 09:26:45', 1),
(52, '::1', 'sempis@gmail.com', 23, '2023-06-06 09:27:32', 1),
(53, '::1', 'irhasul@gmail.com', 28, '2023-06-06 09:27:46', 1),
(54, '::1', 'irhasul@gmail.com', 28, '2023-06-06 09:39:20', 1),
(55, '::1', 'irhasul@gmail.com', 28, '2023-06-08 12:23:11', 1),
(56, '::1', 'idun@gmail.com', 29, '2023-06-08 12:34:46', 1),
(57, '::1', 'irhasul@gmail.com', 28, '2023-06-08 12:34:56', 1),
(58, '::1', 'sempis@gmail.com', 23, '2023-06-08 12:54:56', 1),
(59, '::1', 'irhasul@gmail.com', 28, '2023-06-08 12:55:10', 1),
(60, '::1', 'idun@gmail.com', 29, '2023-06-08 12:55:48', 1),
(61, '::1', 'sempis@gmail.com', 23, '2023-06-08 12:56:12', 1),
(62, '::1', 'sempis@gmail.com', 23, '2023-06-08 13:15:43', 1),
(63, '::1', 'irhasul@gmail.com', 28, '2023-06-08 13:16:33', 1),
(64, '::1', 'idun@gmail.com', 29, '2023-06-08 13:17:23', 1),
(65, '::1', 'idun@gmail.com', 29, '2023-06-08 13:25:21', 1),
(66, '::1', 'irhasul@gmail.com', 28, '2023-06-08 13:25:57', 1),
(67, '::1', 'sempis@gmail.com', 23, '2023-06-08 13:26:07', 1),
(68, '::1', 'sempis@gmail.com', 23, '2023-06-08 13:59:17', 1),
(69, '::1', 'sempis@gmail.com', 23, '2023-06-10 06:20:22', 1),
(70, '::1', 'sempis@gmail.com', 23, '2023-06-10 06:55:22', 1),
(71, '::1', 'irhasul@gmail.com', 28, '2023-06-10 07:01:00', 1),
(72, '::1', 'idun@gmail.com', 29, '2023-06-10 07:01:39', 1),
(73, '::1', 'admin', NULL, '2023-06-10 07:03:54', 0),
(74, '::1', 'sempis@gmail.com', 23, '2023-06-10 07:04:11', 1),
(75, '::1', 'admin', NULL, '2023-06-13 06:03:20', 0),
(76, '::1', 'sempis@gmail.com', 23, '2023-06-13 06:03:23', 1),
(77, '::1', 'sempis@gmail.com', 23, '2023-06-14 10:21:26', 1),
(78, '::1', 'sempis@gmail.com', 23, '2023-06-21 10:18:08', 1),
(79, '::1', 'sempis@gmail.com', 23, '2023-06-26 10:49:29', 1),
(80, '::1', 'sempis@gmail.com', 23, '2023-07-02 06:36:56', 1),
(81, '::1', 'irhasul@gmail.com', 28, '2023-07-02 06:37:55', 1),
(82, '::1', 'admin', NULL, '2023-07-02 06:38:17', 0),
(83, '::1', 'sempis@gmail.com', 23, '2023-07-02 06:38:24', 1),
(84, '::1', 'sempis@gmail.com', 23, '2023-07-02 06:40:03', 1),
(85, '::1', 'sempis@gmail.com', 23, '2023-07-05 02:33:20', 1),
(86, '::1', 'sempis@gmail.com', 23, '2023-07-08 09:51:19', 1),
(87, '::1', 'sempis@gmail.com', 23, '2023-07-09 04:04:07', 1),
(88, '::1', 'sempis@gmail.com', 23, '2023-07-09 05:13:07', 1),
(89, '::1', 'sempis@gmail.com', 23, '2023-07-10 08:07:12', 1),
(90, '::1', 'sempis@gmail.com', 23, '2023-07-10 08:36:51', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-admin', 'manage all data adminsitrator'),
(2, 'manage teacher', 'Bagian yang bisa dimanage guru'),
(3, 'manage-kepsek', 'Bagian untuk kepsek untuk memantau sekolah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_guru`
--

CREATE TABLE `data_guru` (
  `nip` varchar(12) NOT NULL,
  `nama_guru` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `jabatan` enum('Guru Matpel','TU') NOT NULL,
  `lulusan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_guru`
--

INSERT INTO `data_guru` (`nip`, `nama_guru`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `no_hp`, `email`, `jabatan`, `lulusan`) VALUES
('007', 'Wahyu', '2023-05-03', 'Pria', 'pekalongan', '089734386', 'wahyu@gamil.com', 'TU', 'S1'),
('008', 'Idhun', '1983-06-06', 'Pria', 'Jln. Tondano 3 No.14B Poncol baru Pekalo', '', 'orhasnad@gmail.com', 'Guru Matpel', 'Harvard');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_nilai`
--

CREATE TABLE `data_nilai` (
  `id` int(11) NOT NULL,
  `nis` varchar(25) NOT NULL,
  `kode_mapel` varchar(15) NOT NULL,
  `kode_ruang` varchar(4) NOT NULL,
  `tugas_1` float NOT NULL,
  `tugas_2` float NOT NULL,
  `tugas_3` float NOT NULL,
  `uts` float NOT NULL,
  `uas` float NOT NULL,
  `rata_rata` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_presensi`
--

CREATE TABLE `data_presensi` (
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `nis` varchar(25) NOT NULL,
  `keterangan` enum('Hadir','Izin','Alpha','Sakit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE `data_siswa` (
  `nis` varchar(15) NOT NULL,
  `nama_siswa` varchar(25) NOT NULL,
  `tgl_lahir` varchar(10) NOT NULL,
  `jns_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `kode_ruang` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_siswa`
--

INSERT INTO `data_siswa` (`nis`, `nama_siswa`, `tgl_lahir`, `jns_kelamin`, `alamat`, `tahun_masuk`, `kode_ruang`) VALUES
('001', 'Anamudin12', '2003-06-06', 'Laki-Laki', 'Jln. Tondano 3 No.14B Pon', 2020, 'R-01'),
('002', 'Apep Kun', '2001-06-06', 'Perempuan', 'Jln.Semarang', 2017, 'R-01'),
('005', 'Muhammad Irhasul Hafie ', '2003-06-06', 'Laki-Laki', 'Jln. Tondano 3 No.14B Pon', 2020, 'R-01'),
('0068', 'Hapi', '2001-06-06', 'Laki-Laki', 'Alamat', 0000, 'R-01'),
('2211', 'Rapid', '2000-06-01', 'Perempuan', 'Poncol', 2017, 'R-01'),
('770', 'Faid', '2001-08-07', 'Perempuan', 'sdak', 2012, 'R-01'),
('991', 'Ken', '2001-08-08', 'Perempuan', 'Bandengan', 2001, 'R-01');

--
-- Trigger `data_siswa`
--
DELIMITER $$
CREATE TRIGGER `Insert_Poin_100` AFTER INSERT ON `data_siswa` FOR EACH ROW BEGIN
INSERT INTO poin(nis, nama_siswa, jml_poin) VALUES (NEW.nis, NEW.nama_siswa, 100);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_ruang` varchar(4) NOT NULL,
  `kode_mapel` varchar(15) NOT NULL,
  `nip` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `kode_ruang` varchar(4) NOT NULL,
  `nama_ruang` varchar(20) NOT NULL,
  `jenis_ruang` enum('Teori','Lab') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`kode_ruang`, `nama_ruang`, `jenis_ruang`) VALUES
('R-01', '8G', 'Teori');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `kode_mapel` varchar(15) NOT NULL,
  `nama_mapel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`kode_mapel`, `nama_mapel`) VALUES
('M-09', 'B.Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1680630398, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `poin`
--

CREATE TABLE `poin` (
  `nis` varchar(15) NOT NULL,
  `nama_siswa` varchar(25) NOT NULL,
  `jml_poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `poin`
--

INSERT INTO `poin` (`nis`, `nama_siswa`, `jml_poin`) VALUES
('770', 'Faid', 60),
('2211', 'Rapid', 0),
('991', 'Ken', 10);

--
-- Trigger `poin`
--
DELIMITER $$
CREATE TRIGGER `StatusPoin_insert` AFTER INSERT ON `poin` FOR EACH ROW BEGIN
    INSERT INTO status_poin (nis, status)
    VALUES (NEW.nis, IF(NEW.jml_poin < 30, 'TIDAK LULUS', 'LULUS'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_poin`
--

CREATE TABLE `status_poin` (
  `nis` varchar(15) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_poin`
--

INSERT INTO `status_poin` (`nis`, `status`) VALUES
('0068', 'LULUS'),
('770', 'LULUS'),
('2211', 'LULUS'),
('991', 'LULUS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(23, 'sempis@gmail.com', 'sempis', '$2y$10$YDATL.gzR.dEFszwoH4KFeaJdt3ka7Ldh/cv3V3RYk.aCFJ.8qbXC', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-05-14 07:53:00', '2023-05-14 07:53:00', NULL),
(28, 'irhasul@gmail.com', 'hafie', '$2y$10$tXAOl58Yazk3brEKYxOMFOy9f.J7iFcj9.hKOTaq7z0zKiPg8tqvy', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-06 09:03:58', '2023-06-06 09:03:58', NULL),
(29, 'idun@gmail.com', 'idun', '$2y$10$P79ShpgVmOpge0ynfQyHbeE69DQDIF6qlLujpViRviU1PM/AT/qtu', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-08 12:28:44', '2023-06-08 12:28:44', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `data_guru`
--
ALTER TABLE `data_guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `data_nilai`
--
ALTER TABLE `data_nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`);

--
-- Indeks untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `kode_ruang` (`kode_ruang`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_ruang` (`kode_ruang`),
  ADD KEY `nip` (`nip`),
  ADD KEY `kode_mapel` (`kode_mapel`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_ruang`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `poin`
--
ALTER TABLE `poin`
  ADD KEY `nis` (`nis`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_nilai`
--
ALTER TABLE `data_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_nilai`
--
ALTER TABLE `data_nilai`
  ADD CONSTRAINT `data_nilai_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `data_siswa` (`nis`);

--
-- Ketidakleluasaan untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD CONSTRAINT `data_siswa_ibfk_1` FOREIGN KEY (`kode_ruang`) REFERENCES `kelas` (`kode_ruang`);

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`kode_ruang`) REFERENCES `kelas` (`kode_ruang`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `data_guru` (`nip`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`);

--
-- Ketidakleluasaan untuk tabel `poin`
--
ALTER TABLE `poin`
  ADD CONSTRAINT `poin_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `data_siswa` (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
