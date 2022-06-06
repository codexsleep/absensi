-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 06 Jun 2022 pada 09.16
-- Versi server: 5.7.24
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_absensijabal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `maintanace_card`
--

CREATE TABLE `maintanace_card` (
  `card_id` int(255) NOT NULL,
  `card_title` varchar(255) NOT NULL,
  `card_number` varchar(8) NOT NULL,
  `created_date` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `maintanace_card`
--

INSERT INTO `maintanace_card` (`card_id`, `card_title`, `card_number`, `created_date`) VALUES
(1, 'Maintanance Jabal', '0001', '28/04/2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `attendance_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `attendance_date` varchar(80) NOT NULL,
  `attendance_in` varchar(80) NOT NULL,
  `attendance_out` varchar(80) DEFAULT NULL,
  `attendance_late` varchar(80) DEFAULT NULL,
  `attendance_overtime` varchar(80) DEFAULT NULL,
  `attendance_status` enum('1','2') NOT NULL COMMENT '1=on time, 2=late'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`attendance_id`, `user_id`, `attendance_date`, `attendance_in`, `attendance_out`, `attendance_late`, `attendance_overtime`, `attendance_status`) VALUES
(1, 45, '2022-06-05', '04:10:51', '04:11:35', '00:00:00', '00:00:00', '1'),
(2, 14, '2022-06-05', '23:47:53', '-', '0:0:0', '-', '2'),
(3, 19, '2022-06-06', '00:16:28', '-', '0:0:0', '-', '2'),
(4, 18, '2022-06-06', '00:16:42', '-', '00:00:00', '-', '1'),
(5, 21, '2022-06-06', '00:18:11', '-', '00:00:00', '-', '1'),
(6, 16, '2022-06-06', '00:18:25', '-', '00:00:00', '-', '1'),
(7, 14, '2022-06-06', '00:27:48', '-', '0:0:0', '-', '2'),
(8, 46, '2022-06-06', '00:39:14', '-', '00:00:00', '-', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_company`
--

CREATE TABLE `tbl_company` (
  `company_id` int(255) NOT NULL,
  `company_title` varchar(255) NOT NULL,
  `company_status` enum('active','archive') NOT NULL,
  `created_date` varchar(80) NOT NULL,
  `update_date` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_company`
--

INSERT INTO `tbl_company` (`company_id`, `company_title`, `company_status`, `created_date`, `update_date`) VALUES
(1, 'PT Jabal Perkasa', 'active', '2022-04-24', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_department`
--

CREATE TABLE `tbl_department` (
  `department_id` int(255) NOT NULL,
  `department_title` varchar(255) NOT NULL,
  `department_status` enum('active','archive') NOT NULL,
  `created_date` varchar(80) NOT NULL,
  `update_date` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_department`
--

INSERT INTO `tbl_department` (`department_id`, `department_title`, `department_status`, `created_date`, `update_date`) VALUES
(1, 'Office', 'active', '2022-04-24', ''),
(2, 'Quality Control', 'active', '2022-04-24', ''),
(3, 'Sortasi', 'active', '2022-04-24', ''),
(4, 'Maintenance', 'active', '2022-04-24', ''),
(5, 'Proses 1', 'active', '2022-04-24', ''),
(6, 'Proses 2', 'active', '2022-04-24', ''),
(7, 'Security', 'active', '2022-04-24', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_job`
--

CREATE TABLE `tbl_job` (
  `job_id` int(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_status` enum('active','archive') NOT NULL,
  `created_date` varchar(80) NOT NULL,
  `update_date` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_job`
--

INSERT INTO `tbl_job` (`job_id`, `job_title`, `job_status`, `created_date`, `update_date`) VALUES
(1, 'Default', 'active', '2022-04-24', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_maintanance`
--

CREATE TABLE `tbl_maintanance` (
  `maintanance_id` int(255) NOT NULL,
  `card_id` varchar(8) NOT NULL,
  `maintanance_date` varchar(120) NOT NULL,
  `maintanance_detail` varchar(255) NOT NULL,
  `mainteanance_estimatetime` varchar(120) NOT NULL,
  `status` enum('under maintenance','done') NOT NULL,
  `created_date` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(255) NOT NULL,
  `user_firstname` varchar(120) DEFAULT NULL,
  `user_lastname` varchar(120) DEFAULT NULL,
  `user_gender` enum('male','female') DEFAULT NULL,
  `user_civilstatus` enum('-','single','married','annulled','widowed','legally separated') DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_mobilenumber` char(13) DEFAULT NULL,
  `user_birth` varchar(80) DEFAULT NULL,
  `user_ktp` int(16) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_company` int(255) DEFAULT NULL,
  `user_department` int(255) DEFAULT NULL,
  `user_jobtitle` int(255) DEFAULT NULL,
  `user_idnumber` char(6) DEFAULT NULL,
  `user_employeetype` enum('regular','trainee','intership') DEFAULT NULL,
  `user_type` enum('manager','employee','admin') DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_status` enum('Active','Archive') DEFAULT NULL,
  `in_time` varchar(20) NOT NULL,
  `out_time` varchar(20) NOT NULL,
  `created_date` varchar(80) DEFAULT NULL,
  `update_date` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_firstname`, `user_lastname`, `user_gender`, `user_civilstatus`, `user_email`, `user_mobilenumber`, `user_birth`, `user_ktp`, `user_address`, `user_company`, `user_department`, `user_jobtitle`, `user_idnumber`, `user_employeetype`, `user_type`, `user_password`, `user_status`, `in_time`, `out_time`, `created_date`, `update_date`) VALUES
(1, 'Firman', 'Raiwan', 'male', 'single', 'firmanraiwan@gmail.com', '08126624420', '2001-05-07', 1234253, 'Jl.Tegal Sari Ujung', 1, 2, 2, '002', 'regular', 'manager', 'e563195894b0f42c245148624e592610e2abf328', 'Active', '14:43:00:00', '20:49:00:00', '2022-05-13', '2022-05-21'),
(3, 'Hari', 'Kurniawan', 'male', 'single', '', '081371157201', '1999-05-08', 2147483647, 'Jl. Kapau Sari Blok H No. 2', 1, 1, 1, '0005', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00', '2022-05-30', '2022-05-30'),
(4, 'Nofira ', 'Al Ahsha', 'female', 'single', '', '081364294706', '2001-03-09', 2147483647, 'Jl. Pembina IV , Rumbai Pesisir', 1, 1, 1, '0006', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00', '2022-05-30', NULL),
(5, 'Miftahuddin', 'Miftahuddin', 'male', 'widowed', '', '', '', 0, 'Jl. Kaswari\r\nPekanbaru', 1, 1, 1, '0007', 'regular', 'employee', NULL, 'Active', '08:00:00:00', '17:00:00:00', '2022-05-30', '2022-05-30'),
(6, 'Maksum', 'Maksum', 'male', 'married', '', '', '1970-12-31', 2147483647, 'Dusun II, Baru, Pulau Rakyat, Asahan', 1, 1, 1, '0020', 'regular', 'manager', NULL, 'Active', '08:00:00', '17:00:00', '2022-05-30', '2022-05-30'),
(7, 'Susiadi', 'Susiadi', 'male', 'married', '', '081268580126', '1977-06-19', 2147483647, 'Perum Graha Bening Permai Blok M No. 5 \r\nPekanbaru', 1, 1, 1, '0021', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00:00', '2022-05-30', '2022-05-30'),
(8, 'Sutejo', 'Sutejo', 'male', 'married', '', '', '1978-05-03', 2147483647, 'Dusun IV, Desa Lestari, Kec. Buntu Pane, Kab Asahan', 1, 1, 1, '0024', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00:00', '2022-05-30', '2022-05-30'),
(9, 'Safarudin', 'Safarudin', 'male', 'married', '', '081397511700', '1973-02-28', 2147483647, 'Dusun Gotong Royong, Desa Pasar Miring, Kec. Pagar Merbau, Kab. Deli Serdang', 1, 1, 1, '0022', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00:00', '2022-05-30', '2022-05-30'),
(10, 'Fajar Syahputra ', 'Simanjuntak', 'male', 'married', '', '', '1985-04-23', 2147483647, 'Dusun Harapan, Desa Alue Rambot, Kec. Darul Makmur, Kab. Nagan Raya', 1, 1, 1, '0023', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00:00', '2022-05-30', '2022-05-30'),
(11, 'Elbegizon', 'Elbegizon', 'male', 'married', '', '', '1967-01-01', 2147483647, 'Dusun Kopar, Desa Dosan, Kec. Parindu, Kab. Sanggau', 1, 1, 1, '0025', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00:00', '2022-05-30', '2022-05-30'),
(12, 'Mhd ', 'Rizal', 'male', 'married', '', '', '1981-10-08', 2147483647, 'Lingkungan IV pipa delapan, Pangkalan Batu, Berandal Barat, Sumatra Utara', 1, 1, 1, '0026', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00:00', '2022-05-30', '2022-05-30'),
(13, 'Sri', 'Wahyuningsih', 'female', 'married', '', '', '1979-05-12', 0, 'Jl. Rawa Indah No 04\r\nPekanbaru', 1, 1, 1, '0004', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00', '2022-05-30', NULL),
(14, 'Jasrin', 'Siregar', 'male', 'married', 'jasrin@gmail.com', '', '1986-11-14', 2147483647, 'Lubuk Soting, Kec. Tambusai, Kab. Rokan Hulu', 1, 7, 1, '0027', 'regular', 'admin', 'e4b5c12593be9a0d6d8bf926026bcbeb86d7ff16', 'Active', '08:00:00:00', '17:00:00:00', '2022-05-30', '2022-06-05'),
(15, 'Fenny Mustika', 'Pertiwi', 'female', 'single', '', '', '1999-04-22', 2147483647, 'Perk. Gunung Melayu, Dusun IV, Rahuning, Asahan ', 1, 1, 1, '0127', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00', '2022-05-30', '2022-06-03'),
(16, 'Liza ', 'Andriani', 'female', 'single', '', '', '1997-10-28', 2147483647, 'Tanjung Baru, Desa Tambusai Barat, Rokan Hulu\r\n', 1, 1, 1, '0029', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00', '2022-05-30', NULL),
(17, 'Nidia', 'Pramesti', 'female', 'single', '', '', '1997-06-15', 2147483647, 'Perumnas Sukajadi Permai Blok Panda No. 2', 1, 1, 1, '0030', 'intership', 'employee', NULL, 'Active', '13:00:00', '20:00:00', '2022-06-01', NULL),
(18, 'Fazrah Octavia', 'Prameswari', 'female', 'single', '', '', '2001-10-18', 0, 'Perumnas Sukajadi Permai Blok Panda No 2', 1, 1, 1, '0031', 'intership', 'employee', NULL, 'Active', '07:00:00', '16:00:00', '2022-06-01', NULL),
(19, 'Despa', 'Despa', 'male', 'married', '', '', '1985-10-28', 2147483647, 'Lingk. Kuba desa tambusai tengah, Rokan Hulu', 1, 1, 1, '0032', 'regular', 'employee', NULL, 'Active', '08:00:00:00', '17:00:00:00', '2022-06-01', '2022-06-01'),
(20, 'Masmin ', 'Pulungan', 'male', 'married', '', '', '1961-09-14', 2147483647, 'Tandihat Tambusai Barat, Rokan Hulu', 1, 1, 1, '0033', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00', '2022-06-01', NULL),
(21, 'Andi', 'Winata', 'male', 'single', '', '', '1985-04-12', 2147483647, 'Dusun V, Desa Urung Pane, Kab Asahan', 1, 1, 1, '0128', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00', '2022-06-01', '2022-06-03'),
(22, 'Surya', 'Prayugo', 'male', 'single', '', '', '1989-02-23', 2147483647, 'Dusun VIIKP Selamat, Desa Padang Maninjau', 1, 2, 1, '0035', 'regular', 'employee', NULL, 'Active', '07:00:00', '16:00:00', '2022-06-01', NULL),
(23, 'Fitratul', 'Fitratul', 'male', 'single', '', '', '1980-09-07', 2147483647, 'Kelok Karang Tangah, Desa Pulau Karam Ampang Pulau', 1, 2, 1, '0036', 'regular', 'employee', NULL, 'Active', '07:00:00', '16:00:00', '2022-06-01', NULL),
(24, 'Rizki Randika ', 'Hidayat', 'male', 'single', '', '', '1999-10-04', 2147483647, 'Perum PT ANJ Agri Desa Langkimat, Padang Lawas Utara', 1, 2, 1, '0037', 'intership', 'employee', NULL, 'Active', '19:00:00', '04:00:00', '2022-06-01', NULL),
(25, 'Roy ', 'Afriandi', 'male', 'single', '', '', '2001-10-12', 2147483647, 'Dusun II Aek Belu, Desa Lestari, Kec. Buntu Pane, Kab. Asahan', 1, 2, 1, '0038', 'intership', 'employee', NULL, 'Active', '07:00:00', '16:00:00', '2022-06-01', NULL),
(26, 'Prendi', 'Walhidayat', 'male', 'single', '', '', '2000-10-27', 2147483647, 'Dusun Muaro PT. CLP, Desa Siabu Kec. Salo, Kab. Kampar', 1, 2, 1, '0039', 'intership', 'employee', NULL, 'Active', '19:00:00', '04:00:00', '2022-06-01', NULL),
(27, 'Wahyu ', 'Santoso', 'male', 'single', '', '', '1997-12-16', 2147483647, 'Dusun I, Desa Sukajadi, Kec. Tanjung Beringin, Kab Serdang Bedagai', 1, 2, 1, '0040', 'intership', 'employee', NULL, 'Active', '07:00:00', '16:00:00', '2022-06-01', NULL),
(28, 'Said Akil', 'Utomo', 'male', 'single', '', '', '2002-02-22', 2147483647, 'Huta Bargot, Desa Batang Kumu, Kab. Rokan Hulu', 1, 2, 1, '0041', 'intership', 'employee', NULL, 'Active', '19:00:00', '04:00:00', '2022-06-01', NULL),
(29, 'Agung ', 'Abdillah', 'male', 'married', '', '085264387468', '1976-08-08', 2147483647, 'Bukit Senyum, Tambusai Timur, Kab. Rokan Hulu', 1, 3, 1, '0042', 'regular', 'employee', NULL, 'Active', '08:00:00:00', '17:00:00:00', '2022-06-01', '2022-06-01'),
(30, 'Adi', 'Saputra', 'male', 'married', '', '081372156193', '1994-07-07', 2147483647, 'Paringgonan, Desa Sungai Kumango, Kec. Tambusai, Rokan Hulu', 1, 3, 1, '0043', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00', '2022-06-01', NULL),
(31, 'Heri ', 'Susandi', 'male', 'married', '', '085358619612', '1996-07-03', 2147483647, 'Tandihat, Tambusai Barat, Kec. Tambusai. Rokan Hulu', 1, 3, 1, '0044', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00', '2022-06-01', NULL),
(32, 'Nirwansyah', 'Nirwansyah', 'male', 'married', '', '082277206144', '1998-08-07', 2147483647, 'tandihat, desa tambusai barat, kec. tambusai, kab. rokan hulu', 1, 3, 1, '0045', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00', '2022-06-03', NULL),
(33, 'Fink ', 'Febrianto', 'male', 'single', '', '082287133818', '1997-02-28', 2147483647, 'suka maju 004/002 desa suka maju. kec. tambusai. kab rokan hulu', 1, 3, 1, '0046', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00', '2022-06-03', NULL),
(34, 'Putra', 'Ritonga', 'male', 'single', NULL, '081270330663', '1996-04-02', 2147483647, 'Dusun I jurong, Desa Bonai, kec bonai darussalam. kab rokan hulu', 1, 3, 1, '0047', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00', '2022-06-03', '2022-06-04'),
(35, 'Rizki', 'Darmawan', 'male', 'single', '', '082268838943', '1998-06-24', 2147483647, 'dusun v nagori i, desa tinokkah kec. sipispis. kab. serdang begadai\r\n', 1, 3, 1, '0048', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00', '2022-06-03', NULL),
(36, 'Abdul', 'Rozak', 'male', 'single', NULL, '085342386188', '2001-07-09', 2147483647, 'gg. mekar tani , desa sungai sialang, kec. batu hampar. kab rokan hilir', 1, 3, 1, '0049', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00', '2022-06-03', '2022-06-03'),
(37, 'Gunawan', 'Gunawan', 'male', 'married', '', '085342386188', '1989-10-30', 2147483647, 'tandihat, desa tambusai barat kab. rokan hulu ', 1, 3, 1, '0050', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00', '2022-06-03', NULL),
(38, 'Iwan', 'Iwan', 'male', 'married', '', '1205032806870', '1987-07-28', 2147483647, 'Dusun III raja tengah hilir, desa raja tengah kab. langkat', 1, 3, 1, '0051', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00', '2022-06-03', NULL),
(39, 'Ade Wahyu', 'Saputra Rambe', 'male', 'single', '', '082284687565', '1998-05-13', 2147483647, 'kepenuhan baru, kec kepenuhan kab. rokan hulu', 1, 3, 1, '0052', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00', '2022-06-03', NULL),
(40, 'Dandi', 'Ansari', 'male', 'single', '', '081266241772', '1999-04-17', 2147483647, 'Dalu dalu kec. tambusai kab rokan hulu', 1, 3, 1, '0053', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00', '2022-06-03', NULL),
(41, 'Feri', 'andayani', 'male', 'married', '', '082383959410', '1993-06-04', 2147483647, 'kota baru, desa lubuk soting kec. tambusai kab. rokan hulu', 1, 3, 1, '0054', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00', '2022-06-03', NULL),
(42, 'M.', 'Iqbal', 'male', 'single', NULL, '081266241772', '2000-07-17', 2147483647, 'Dalu Dalu kec. tambusai kab. rokan hulu', 1, 3, 1, '0055', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00', '2022-06-03', NULL),
(43, 'Khayaluddin ', 'Harahap', 'male', 'single', NULL, '082383959410', '1994-01-20', 2147483647, 'modang kumango, desai singai kumango. kec. tambusai. kab rokan hulu', 1, 3, 1, '0056', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00', '2022-06-03', NULL),
(44, 'Tengku', 'Rijal Rambe', 'male', 'single', '', '082383959410', '1996-03-30', 2147483647, 'JL. dahlia desa kepenuhan raya kec. kepenuhan. kab rokan hulu', 1, 3, 1, '0057', 'regular', 'employee', NULL, 'Active', '08:00:00', '17:00:00', '2022-06-03', NULL),
(45, 'Arpan ', 'Pospos', 'male', 'married', '', '', '1989-06-05', 2147483647, 'Jl. Surapati LK. III, Desa Lipat Kain Selatan, Kec. Kampar Kiri, Kab. Kampar', 1, 4, 1, '0060', 'regular', 'employee', NULL, 'Active', '07:00:00', '16:00:00', '2022-06-04', NULL),
(46, 'Ivan Gilang', 'Pratama', 'male', 'single', '', '', '2001-03-28', 2147483647, 'Jl. Sultan Syarif Kasim, Desa Harapan Makmur', 1, 4, 1, '0059', 'regular', 'employee', NULL, 'Active', '07:00:00', '16:00:00', '2022-06-04', NULL),
(47, 'Sabar', 'Iman', 'male', 'married', '', '082385430343', '1981-06-01', 2147483647, 'Emplasement DKS PT. GBI, Desa Lipat Kain Selatan, Kec. Kampar Kiri. Kab. Kampar', 1, 4, 1, '0061', 'regular', 'employee', NULL, 'Active', '07:00:00', '16:00:00', '2022-06-04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `maintanace_card`
--
ALTER TABLE `maintanace_card`
  ADD PRIMARY KEY (`card_id`);

--
-- Indeks untuk tabel `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indeks untuk tabel `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indeks untuk tabel `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indeks untuk tabel `tbl_job`
--
ALTER TABLE `tbl_job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indeks untuk tabel `tbl_maintanance`
--
ALTER TABLE `tbl_maintanance`
  ADD PRIMARY KEY (`maintanance_id`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `maintanace_card`
--
ALTER TABLE `maintanace_card`
  MODIFY `card_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `attendance_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `company_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `department_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_job`
--
ALTER TABLE `tbl_job`
  MODIFY `job_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_maintanance`
--
ALTER TABLE `tbl_maintanance`
  MODIFY `maintanance_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
