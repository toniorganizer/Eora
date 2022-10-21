-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jan 2021 pada 15.06
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eora`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `distribusis`
--

CREATE TABLE `distribusis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email_mahasiswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_donasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_distribusi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `distribusis`
--

INSERT INTO `distribusis` (`id`, `email_mahasiswa`, `jumlah_donasi`, `jumlah_distribusi`, `waktu`, `created_at`, `updated_at`) VALUES
(25, 'pajar@gmail.com', '3900000', '1300000', '02-Jan-2020 / 14:59:53 pm', '2020-10-02 00:59:59', '2020-10-02 00:59:59'),
(26, 'vebri@gmailcom', '3900000', '1300000', '02-Oct-2020 / 14:59:53 pm', '2020-10-02 00:59:59', '2020-10-02 00:59:59'),
(27, 'feri@gmailcom', '3900000', '1300000', '02-Oct-2020 / 14:59:53 pm', '2020-10-02 00:59:59', '2020-10-02 00:59:59'),
(28, 'pajar@gmail.com', '900000', '225000', '14-Oct-2020 / 21:54:26 pm', '2020-10-14 07:54:33', '2020-10-14 07:54:33'),
(29, 'vebri@gmailcom', '900000', '225000', '14-Oct-2020 / 21:54:26 pm', '2020-10-14 07:54:33', '2020-10-14 07:54:33'),
(30, 'feri@gmailcom', '900000', '225000', '14-Oct-2020 / 21:54:26 pm', '2020-10-14 07:54:33', '2020-10-14 07:54:33'),
(31, 'hudri@gmail.com', '900000', '225000', '14-Oct-2020 / 21:54:26 pm', '2020-10-14 07:54:33', '2020-10-14 07:54:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasis`
--

CREATE TABLE `donasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email_mhs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_donatur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_donasi` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `rolee` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `donasis`
--

INSERT INTO `donasis` (`id`, `email_mhs`, `email_donatur`, `jumlah_donasi`, `total`, `rolee`, `created_at`, `updated_at`) VALUES
(45, '0', 'fadli@gmail.com', 0, 0, 1, '2020-10-02 00:55:48', '2020-10-14 07:54:34'),
(46, '0', 'fadli@gmail.com', 0, 0, 1, '2020-10-02 00:56:40', '2020-10-14 07:54:34'),
(47, '0', 'fadli@gmail.com', 0, 0, 1, '2020-10-02 00:57:40', '2020-10-14 07:54:34'),
(48, '0', 'bayu@gmail.com', 0, 0, 1, '2020-10-14 06:40:22', '2020-10-14 07:54:34'),
(49, '0', 'fadli@gmail.com', 0, 0, 1, '2020-10-14 07:50:56', '2020-10-14 07:54:34'),
(50, '0', 'doni@gmail.com', 3000000, 3000000, 1, '2020-11-07 02:35:38', '2020-11-07 02:35:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donaturs`
--

CREATE TABLE `donaturs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email_mhs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_don` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_don` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp_don` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `donaturs`
--

INSERT INTO `donaturs` (`id`, `email_mhs`, `email`, `nama_don`, `pekerjaan`, `alamat_don`, `nohp_don`, `image`, `role`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'hudri@gmail.com', 'fadli@gmail.com', 'Fadli,M.Pd', 'Dosen', 'Padang', '081277288827', 'default.jpg', 'Donatur', NULL, NULL, '2020-06-29 06:31:21', '2020-12-06 20:48:29'),
(11, '0', 'bayu@gmail.com', 'Bayu noer', 'Dosen', 'Padang', '08125266624', 'default.jpg', 'Donatur', NULL, NULL, '2020-10-13 09:07:00', '2020-10-13 09:07:00'),
(12, 'pajar@gmail.com', 'doni@gmail.com', 'Doni, M.Pd', 'Dosen', 'Padang', '081277265526', 'default.jpg', 'Donatur', NULL, NULL, '2020-10-15 20:58:22', '2020-11-07 02:34:45'),
(13, '0', 'husri@gmail.com', 'Husri Manab, M.Pd', 'Dosen', 'Padang', '081277266625', '1604814775_default.jpg', 'Donatur', NULL, NULL, '2020-11-07 22:51:29', '2020-11-07 22:52:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasils`
--

CREATE TABLE `hasils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email_mhs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_adm` int(11) NOT NULL,
  `role` int(255) NOT NULL,
  `hasil` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hasils`
--

INSERT INTO `hasils` (`id`, `email_mhs`, `id_adm`, `role`, `hasil`, `created_at`, `updated_at`) VALUES
(21, 'doni@gmail.com', 17, 1, 0.5104, '2020-07-25 20:15:27', '2020-07-25 20:15:27'),
(22, 'pajar@gmail.com', 17, 1, 0.6587, '2020-07-25 20:30:43', '2020-07-25 20:30:43'),
(23, 'sandra@gmail.com', 17, 1, 0.495, '2020-07-25 21:15:39', '2020-07-25 21:15:39'),
(24, 'gilang@gmail.com', 17, 1, 0.4655, '2020-07-27 23:21:45', '2020-07-27 23:21:45'),
(25, 'gogon@gmail.com', 17, 1, 0.5168, '2020-07-30 07:36:19', '2020-07-30 07:36:19'),
(26, 'vita@gmail.com', 17, 1, 0.6146, '2020-07-30 07:36:24', '2020-07-30 07:36:24'),
(27, 'hendri@gmail.com', 17, 1, 0.6463, '2020-07-30 07:36:33', '2020-07-30 07:36:33'),
(28, 'vebri@gmailcom', 17, 1, 0.716, '2020-09-23 05:25:24', '2020-09-23 05:25:24'),
(29, 'feri@gmailcom', 17, 1, 0.4294, '2020-10-13 01:20:35', '2020-10-13 01:20:35'),
(30, 'hudri@gmail.com', 17, 1, 0.5104, '2020-10-13 02:02:15', '2020-10-13 02:02:15'),
(31, 'fauzi01@gmail.com', 17, 1, 0.6405, '2020-11-07 22:43:19', '2020-11-07 22:43:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `infaks`
--

CREATE TABLE `infaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email_donatur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `besaran` int(11) NOT NULL,
  `jumlah_infak` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriterias`
--

CREATE TABLE `kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email_mhs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_adm` int(11) NOT NULL,
  `tanggungan` double NOT NULL,
  `file_tanggungan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` double NOT NULL,
  `file_nilai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penghasilan` double NOT NULL,
  `file_penghasilan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prestasi_akd` double NOT NULL,
  `file_pekad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prestasi_nonakd` double NOT NULL,
  `file_penon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukt` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_ukt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_kriteria` int(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kriterias`
--

INSERT INTO `kriterias` (`id`, `email_mhs`, `id_adm`, `tanggungan`, `file_tanggungan`, `nilai`, `file_nilai`, `penghasilan`, `file_penghasilan`, `prestasi_akd`, `file_pekad`, `prestasi_nonakd`, `file_penon`, `ukt`, `file_ukt`, `role_kriteria`, `created_at`, `updated_at`) VALUES
(14, 'pajar@gmail.com', 1, 1, '1594607840_Cetak Kartu Rencana Studi.pdf', 0.34, '1594607840_WhatsApp Image 2019-08-16 at 13.21.52.jpeg', 0.61, '1594607840_tanya_mas_rooby.jpg', 0.6, '1594607840_WhatsApp Image 2019-05-05 at 09.47.40.jpeg', 0.5, '1594629152_Cetak Kartu Rencana Studi.pdf', '0', '', 1, '2020-07-12 19:37:20', '2020-07-25 20:30:44'),
(20, 'doni@gmail.com', 1, 0.38, '1595732594_2018-02-23.jpg', 0.34, '1595732594_2018-02-23.jpg', 0.61, '1595732594_2018-02-23.jpg', 0.41, '1595732594_2018-02-23.jpg', 1, '1595732594_2018-02-23.jpg', '0', '', 1, '2020-07-25 20:03:14', '2020-07-25 20:15:27'),
(21, 'sandra@gmail.com', 1, 0.54, '1595736862_2018-02-23.jpg', 0.34, '1595736862_2018-02-23.jpg', 0.61, '1595736862_2018-02-23.jpg', 0.11, 'Tidak ada', 0.5, '1595736862_2018-02-23.jpg', '0', '', 1, '2020-07-25 21:14:22', '2020-07-25 21:15:39'),
(22, 'gilang@gmail.com', 1, 0.54, '1595917165_2018-02-23.jpg', 0.64, '1595917165_2018-02-23.jpg', 0.35, '1595917165_2018-02-23.jpg', 0.6, '1595917165_2018-02-23.jpg', 0.1, 'Tidak ada', '0', '', 1, '2020-07-27 23:19:25', '2020-07-27 23:21:45'),
(23, 'gogon@gmail.com', 1, 0.54, '1596119359_2018-02-23.jpg', 1, '1596119359_2018-02-23.jpg', 0.35, '1596119359_2018-02-23.jpg', 0.41, '1596119359_2018-02-23.jpg', 0.1, 'Tidak ada', '0', '', 1, '2020-07-30 07:29:19', '2020-07-30 07:36:19'),
(24, 'vita@gmail.com', 1, 1, '1596119679_2018-02-23.jpg', 0.34, '1596119679_2018-02-23.jpg', 0.61, '1596119679_2018-02-23.jpg', 0.11, 'Tidak ada', 0.5, '1596119679_2018-02-23.jpg', '0', '', 1, '2020-07-30 07:34:39', '2020-07-30 07:36:24'),
(25, 'hendri@gmail.com', 1, 0.38, '1596119725_2018-02-23.jpg', 0.64, '1596119725_2018-02-23.jpg', 1, '1596119725_2018-02-23.jpg', 0.11, 'Tidak ada', 0.1, 'Tidak ada', '0', '', 1, '2020-07-30 07:35:25', '2020-07-30 07:36:33'),
(26, 'vebri@gmailcom', 1, 1, '1600863887_4029-7090-2-PB.pdf', 1, '1600863887_PS.PDF', 1, '1600863887_UdacityLink.pdf', 0.11, 'Tidak ada', 0.1, 'Tidak ada', '0', '', 1, '2020-09-23 05:24:47', '2020-09-23 05:25:24'),
(29, 'feri@gmailcom', 1, 0.38, '1601572356_Pas Foto 3X4.jpg', 0.34, '1601572356_Pas Foto 3X4.jpg', 0.61, '1601572356_Pas Foto 3X4.jpg', 0.11, 'Tidak ada', 0.1, 'Tidak ada', 'Rp. 4.000.000,-', '1601572356_Pas Foto 3X4.jpg', 1, '2020-10-01 10:12:36', '2020-10-13 01:20:35'),
(30, 'hudri@gmail.com', 1, 0.38, '1602579700_Pas Foto 3X4.jpg', 0.64, '1602579700_WhatsApp Image 2019-07-12 at 17.11.01.jpeg', 0.61, '1602579700_Pas-Foto-3x4.jpg', 0.11, 'Tidak ada', 0.5, '1602579700_Pas Foto 3X4.jpg', 'Rp.4.000.000,-', '1602579700_Pas-Foto-3x4.jpg', 1, '2020-10-13 02:01:40', '2020-10-13 02:02:15'),
(31, 'sandi@gmail.com', 1, 0.38, '1604067283_2018-02-23.jpg', 0.34, '1604067283_2018-02-23.jpg', 0.35, '1604067283_2018-02-23.jpg', 0.41, '1604067283_2018-02-23.jpg', 0.1, 'Tidak ada', 'Rp.4.000.000,-', '1604067283_2018-02-23.jpg', 0, '2020-10-30 07:14:43', '2020-10-30 07:14:43'),
(32, 'fauzi01@gmail.com', 1, 0.54, '1604814152_1594607840_tanya_mas_rooby.jpg', 1, '1604814152_1594692983_PS.PDF', 0.61, '1604814152_1594692983_Cetak Kartu Rencana Studi.pdf', 0.6, '1604814152_1594607840_tanya_mas_rooby.jpg', 0.1, 'Tidak ada', 'Rp.4.000.000,-', '1604814152_1594692983_Cetak Kartu Rencana Studi.pdf', 1, '2020-11-07 22:42:32', '2020-11-07 22:43:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `langsungs`
--

CREATE TABLE `langsungs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email_donatur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_mahasiswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_donasi` double NOT NULL,
  `total` double NOT NULL,
  `aturan` int(11) NOT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `langsungs`
--

INSERT INTO `langsungs` (`id`, `email_donatur`, `email_mahasiswa`, `jumlah_donasi`, `total`, `aturan`, `bukti`, `created_at`, `updated_at`) VALUES
(1, 'fadli@gmail.com', 'hudri@gmail.com', 3000000, 3000000, 1, '1607312963_Penilaian video.PNG', '2020-12-06 20:49:23', '2020-12-06 20:50:37');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_20_154932_create_student_table', 1),
(5, '2020_03_20_155433_create_donatur_table', 1),
(6, '2020_03_20_155551_create_donasi_table', 1),
(7, '2020_03_20_155814_create_kriteria_table', 1),
(8, '2020_03_28_122253_create_hasils_table', 2),
(9, '2020_07_26_032110_create_distribusis_table', 3),
(10, '2020_07_27_150454_create_infaks_table', 4),
(11, '2020_12_06_055145_create_langsungs_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('fahtony@gmail.com', '$2y$10$947wqVt5f.eCklNFHIjIguhzlKIdXab30jcgCer02CO8x0ZDbvtr2', '2020-10-02 01:01:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email_donatur` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_mhs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_mhs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp_mhs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `norek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_tambahan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_mhs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `students`
--

INSERT INTO `students` (`id`, `email_donatur`, `nim`, `email_mhs`, `nama`, `jurusan`, `alamat_mhs`, `nohp_mhs`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `norek`, `ket_tambahan`, `image_mhs`, `role`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'doni@gmail.com', '16076277', 'pajar@gmail.com', 'Pajar Afifi', 'Teknik Elka', 'Padang', '081266255527', '', '', '', '', '', '', '1601623810_kecil.jpg', 'Mahasiswa', NULL, NULL, '2020-06-21 06:44:48', '2020-11-07 02:31:44'),
(22, '0', '17099098', 'vebri@gmailcom', 'Vebri Siswanto', 'Teknik Elektronika', 'Padang', '081282778299', '', '', '', '', '', '', '1602575104_Pas Foto 3X4.jpg', 'Mahasiswa', NULL, NULL, '2020-09-19 09:33:23', '2020-10-13 00:45:05'),
(23, '0', '17098909', 'feri@gmailcom', 'Feri Irawan', 'Teknik Mesin', 'Padang', '081267825562', 'Suhardi', 'Husni', 'Pegawai Negeri Sipil', 'Tidak Bekerja', '192876772821', 'Bantu lahhh', '1602575936_Pas Foto 3X4.jpg', 'Mahasiswa', NULL, NULL, '2020-09-24 08:10:46', '2020-10-13 00:58:56'),
(28, 'fadli@gmail.com', '19098827', 'hudri@gmail.com', 'Hudri', 'Teknik Mesin', 'Padang', '08127726625', 'Suhardi', 'Suji', 'Pegawai BUMN', 'Wiraswasta', '192876772821', 'Bantu lahh', '1602575697_Pas-Foto-3x4.jpg', 'Mahasiswa', NULL, NULL, '2020-10-13 00:54:57', '2020-12-06 20:48:29'),
(29, '0', '170892878', 'sandi@gmail.com', 'Sandi', 'Teknik Mesin', 'Padang', '08128277625', 'Suhardi', 'Husni', 'Pegawai BUMN', 'Tidak Bekerja', '192876772821', 'Tolong berikan bantuan', '1604067140_Untitled-1.jpg', 'Mahasiswa', NULL, NULL, '2020-10-30 07:12:20', '2020-10-30 07:14:43'),
(30, '0', '180998277', 'fauzi01@gmail.com', 'Fauzi', 'Teknik Sipil', 'Padang', '081266277725', 'Suhardi', 'Suji', 'Petani', 'Tidak Bekerja', '192876772821', 'Tolong lahh', '1604813926_Untitled-1.jpg', 'Mahasiswa', NULL, NULL, '2020-11-07 03:03:49', '2020-11-07 22:42:32'),
(31, '0', '16000987', 'fahtony77@gmail.com', 'Toni saja', 'Teknik Mesin', 'Bungo', '081234566543', '0', '0', '0', '0', '0', '0', '1607524873_mosque-design-white-background_1344-67.jpg', 'Mahasiswa', NULL, NULL, '2020-12-09 07:41:13', '2020-12-09 07:41:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sudah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_bantu` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_donasi` int(11) NOT NULL,
  `role_infak` int(11) NOT NULL,
  `role_langsung` int(11) NOT NULL,
  `bantu_umum` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role1`, `sudah`, `role_bantu`, `image`, `role_donasi`, `role_infak`, `role_langsung`, `bantu_umum`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(17, 'Tri Yuli Pahtoni', 'fahtony@gmail.com', 'Administrator', '0', 0, '1601623810_kecil.jpg', 0, 0, 1, 0, NULL, '$2y$10$/zp21mJF2lT7MA2jJq3z7uH863EDRffYS5YCuvJFf1zZTmWjfpZzS', NULL, '2020-04-25 20:50:03', '2020-12-06 20:50:37'),
(25, 'Pajar Afifi', 'pajar@gmail.com', 'Mahasiswa', '2', 0, 'default.jpg', 2, 0, 0, 0, NULL, '$2y$10$yQcYtEFTBme9wfytfw8KiOJumoPixd2sY.lZ3BQv8RAvDMYVeqpbu', NULL, '2020-06-21 06:44:48', '2020-11-07 02:31:44'),
(28, 'Fadli,M.Pd', 'fadli@gmail.com', 'Donatur', '4', 1, 'default.jpg', 0, 0, 2, 0, NULL, '$2y$10$9wp9Rgw8RGd85zokfPxIpuO2aBWwXe6HUAvpI.buomJyDL.kfhSRi', NULL, '2020-06-29 06:31:21', '2020-12-06 20:50:37'),
(49, 'Vebri Siswanto', 'vebri@gmailcom', 'Mahasiswa', '3', 0, 'default.jpg', 1, 0, 0, 0, NULL, '$2y$10$Ywm5jVVbvOkH2Emqxyy0tOraqLp4yTjvIwVEXz6RlVJa6Td/M0i1O', NULL, '2020-09-19 09:33:23', '2020-10-14 07:54:34'),
(52, 'Feri Irawan', 'feri@gmailcom', 'Mahasiswa', '3', 0, 'default.jpg', 1, 0, 0, 0, NULL, '$2y$10$vp/jfnHXle21/Dq5nl3VqOdtMXpV67wRneiaHHDesJGXkmliB5aiC', NULL, '2020-09-24 08:10:46', '2020-10-14 07:54:34'),
(57, 'Hudri', 'hudri@gmail.com', 'Mahasiswa', '2', 0, 'default.jpg', 2, 0, 2, 0, NULL, '$2y$10$wBDUAjISoiGMsWmyiXVtmukIt47StmCF9xddPny2vkpsobZOW2fkK', NULL, '2020-10-13 00:54:57', '2020-12-06 20:50:37'),
(58, 'Bayu noer', 'bayu@gmail.com', 'Donatur', '0', 0, 'default.jpg', 0, 0, 0, 0, NULL, '$2y$10$yEwD8RKhsgTqwZYgBcxBR.qNxKbcPGN8tyu4MkrzivO9fnCVFtFAO', NULL, '2020-10-13 09:07:00', '2020-10-14 06:40:38'),
(59, 'Doni, M.Pd', 'doni@gmail.com', 'Donatur', '4', 1, '1604741685_Untitled-1.jpg', 0, 0, 0, 0, NULL, '$2y$10$mbB4ZnM5vW/VH9SHweU9DuQ4zc9qmLgaI1W46VXubNR6jQrX4FNE6', NULL, '2020-10-15 20:58:21', '2020-11-07 02:35:58'),
(60, 'Sandi', 'sandi@gmail.com', 'Mahasiswa', '1', 0, '1604067140_Untitled-1.jpg', 0, 0, 0, 0, NULL, '$2y$10$Kg1fKvEXPZtcerHXUHf2Q.eCxNbpPwP18S8th4ZYeqm6bRnjDFs8K', NULL, '2020-10-30 07:12:20', '2020-10-30 07:14:43'),
(61, 'Fauzi', 'fauzi01@gmail.com', 'Mahasiswa', '3', 0, 'default.jpg', 0, 0, 0, 0, NULL, '$2y$10$B0aVm2wmoL.wSXdoBUvlg.6DIzyLZ.6n8OXGrRWqGESo7ZdPEBjUm', NULL, '2020-11-07 03:03:48', '2020-11-07 22:43:19'),
(62, 'Husri Manab, M.Pd', 'husri@gmail.com', 'Donatur', '0', 0, '1604814775_default.jpg', 0, 0, 0, 0, NULL, '$2y$10$63lXiJHMbJRoDPOSZgtgVe5zxOU2dDnUVQAZP3IGfccQxMa5g.qOW', NULL, '2020-11-07 22:51:29', '2020-11-07 22:52:55'),
(63, 'Toni saja', 'fahtony77@gmail.com', 'Mahasiswa', '0', 0, '1607524873_mosque-design-white-background_1344-67.jpg', 0, 0, 0, 0, NULL, '$2y$10$/42qIVpmlJVQTKG6BZiOOuRittB28s0Oq9yFX2EIicccdbQKeL/zm', NULL, '2020-12-09 07:41:13', '2020-12-09 07:41:13');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `distribusis`
--
ALTER TABLE `distribusis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `donasis`
--
ALTER TABLE `donasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `donaturs`
--
ALTER TABLE `donaturs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `donaturs_email_unique` (`email`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hasils`
--
ALTER TABLE `hasils`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `infaks`
--
ALTER TABLE `infaks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `langsungs`
--
ALTER TABLE `langsungs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email_mhs`);

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
-- AUTO_INCREMENT untuk tabel `distribusis`
--
ALTER TABLE `distribusis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `donasis`
--
ALTER TABLE `donasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `donaturs`
--
ALTER TABLE `donaturs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasils`
--
ALTER TABLE `hasils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `infaks`
--
ALTER TABLE `infaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `langsungs`
--
ALTER TABLE `langsungs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
