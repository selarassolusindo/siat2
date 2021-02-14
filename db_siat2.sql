-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 14, 2021 at 10:33 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siat2`
--

-- --------------------------------------------------------

--
-- Table structure for table `t01_company`
--

CREATE TABLE `t01_company` (
  `idcompany` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Kota` varchar(50) NOT NULL,
  `Group_Kode` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t01_company`
--

INSERT INTO `t01_company` (`idcompany`, `Nama`, `Alamat`, `Kota`, `Group_Kode`, `created_at`, `updated_at`) VALUES
(1, 'PT LTS', 'Andhika Plaza', 'Surabaya', 'LTS', '2021-01-02 11:39:38', '2021-02-14 14:33:33');

-- --------------------------------------------------------

--
-- Table structure for table `t02_akun`
--

CREATE TABLE `t02_akun` (
  `idakun` int(11) NOT NULL,
  `Kode` varchar(10) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Induk` int(11) NOT NULL,
  `Urut` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t02_akun`
--

INSERT INTO `t02_akun` (`idakun`, `Kode`, `Nama`, `Induk`, `Urut`, `created_at`, `updated_at`) VALUES
(1, '1', 'AKTIVA', 0, '1000000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '11', 'AKTIVA LANCAR', 1, '1100000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '1101', 'KAS', 2, '1101000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '1101001', 'Kas Kecil', 3, '1101001000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '1101001001', 'Kas Kecil Surabaya', 4, '1101001001', '0000-00-00 00:00:00', '2020-09-22 07:55:28'),
(6, '1101001002', 'Kas Kecil Karetan', 4, '1101001002', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '1101001003', 'Kas Kecil Bali', 4, '1101001003', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '1101001004', 'Kas Transfer (Post Silang)', 4, '1101001004', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '1101002', 'Kas Tamu', 3, '1101002000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '1101002001', 'Kas Tamu Rupiah', 9, '1101002001', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '1101002002', 'Kas Tamu Rupiah / BCA CC Banyuwangi ', 9, '1101002002', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '1101002003', 'Kas Tamu Bank Note US$', 9, '1101002003', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '1101002004', 'Kas Tamu Bank Note AUD$', 9, '1101002004', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '1101002005', 'Kas Tamu Bank Note Euro', 9, '1101002005', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '1101002006', 'Kas Tamu Bank Note Yen', 9, '1101002006', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, '1101002007', 'Kas Tamu Bank Note NZD $', 9, '1101002007', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, '1101002999', 'Kas Tamu Bank Note Lainnya', 9, '1101002999', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, '1102', 'BANK', 2, '1102000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, '1102001', 'Bank Giro BCA an Marshelle', 18, '1102001000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, '1102002', 'Bank BCA Rek Credit Card', 18, '1102002000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, '1102003', 'Bank BCA Rupiah Tamu', 18, '1102003000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, '1102004', 'Bank BNI Rek Credit Card', 18, '1102004000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, '1102005', 'Bank Giro BCA PT. SSW', 18, '1102005000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, '1102006', 'Bank Transfer (Post Silang)', 18, '1102006000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, '1102007', 'Bank BCA Dollar an PT. PIW', 18, '1102007000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, '1102008', 'Bank BCA Dollar an Yanty', 18, '1102008000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, '1102009', 'Paypal Rek Booking@g-land.com', 18, '1102009000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, '1102010', 'Paypal Rek glandcom@gmail.com', 18, '1102010000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, '1102011', 'Titipan di Bu Fani - Bank USA', 18, '1102011000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, '1103', 'PIUTANG', 2, '1103000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, '1103001', 'Piutang Usaha', 30, '1103001000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, '1103001001', 'Piutang Agent Luar Negeri', 31, '1103001001', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, '1103001002', 'Piutang Agent Dalam Negeri', 31, '1103001002', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, '1103001003', 'Piutang Agent Lainnya/Dlm Proses', 31, '1103001003', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, '1103002', 'Piutang Intern Hub Istimewa', 30, '1103002000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, '1103002001', 'Piutang Bpk Djojo', 35, '1103002001', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, '1103002002', 'Piutang Bpk Marshelle', 35, '1103002002', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, '1103002003', 'Piutang Bpk Laurenz', 35, '1103002003', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, '1103002004', 'Piutang Plengkung', 35, '1103002004', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, '1103002005', 'Piutang Pihak III - Hub Istimewa', 35, '1103002005', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, '1103002006', 'Piutang Bu Fany', 35, '1103002006', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, '1103003', 'Piutang Karyawan', 30, '1103003000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, '1103003001', 'Piutang Karyawan Surabaya', 42, '1103003001', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, '1103003002', 'Piutang Karyawan Bali', 42, '1103003002', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, '1103003003', 'Piutang Karyawan Banyuwangi', 42, '1103003003', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, '1103003004', 'Piutang Trip / Bon Sementara', 42, '1103003004', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, '1103004', 'Uang Muka', 30, '1103004000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, '1103004001', 'Uang Muka Sewa', 47, '1103004001', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, '1103004002', 'Uang Muka Pembelian', 47, '1103004002', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, '1103004003', 'Uang muka lain2x', 47, '1103004003', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, '1103004004', 'Asuransi dibayar dimuka', 47, '1103004004', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, '12', 'AKTIVA TETAP', 1, '1200000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, '1201', 'TANAH DAN BANGUNAN', 52, '1201000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, '1201001', 'Kantor Karetan Banyuwangi', 53, '1201001000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, '1201002', 'Kantor Bali', 53, '1201002000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, '1201003', 'Kantor Surabaya', 53, '1201003000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, '1202', 'KAPAL', 52, '1202000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, '1202001', 'Kapal Almunium D.E', 57, '1202001000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, '1202002', 'Kapal Fiber Ex Mancing - Gudang Gresik (2 unit)', 57, '1202002000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, '1202003', 'Kapal Zodiac Fiber di Plengkung (2 unit)', 57, '1202003000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, '1202004', 'Kapal Fiber Ex Jakarta - di Grajagan dipindah ke Bali Jan\'19', 57, '1202004000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, '1202005', 'Jukung Aluminium di Plengkung', 57, '1202005000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, '1202006', 'Kapal Fiber Gland Explorer - Bali', 57, '1202006000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, '1202007', 'Sekoci untuk Kapal G.Force', 57, '1202007000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, '1202008', 'Kapal Fiber utk Fotografer (2 unit) Plengkung', 57, '1202008000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, '1202009', 'Kapal Fiber G Force - Bali', 57, '1202009000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, '1203', 'MESIN KAPAL', 52, '1203000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, '1203001', 'Mesin Yamaha 40 PK Turbo - utk Kpl Zodiak Plengkung', 67, '1203001000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, '1203002', 'Mesin Yamaha 200 PK Extra Long ', 67, '1203002000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, '1203003', 'Mesin Suzuki 200 PK 4 TAK - 3 Unit', 67, '1203003000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, '1203004', 'Mesin Yamaha 15 PK', 67, '1203004000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, '1203005', 'Mesin Yamaha 40 PK - 22/8/14', 67, '1203005000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, '1203006', 'Mesin Yamaha 150 PK (2 unit) - 2015', 67, '1203006000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, '1203007', 'Mesin Yamaha 200 PK - 2015', 67, '1203007000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, '1203008', 'Mesin Suzuki 200 PK (2) - 10/2015', 67, '1203008000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, '1204', 'MOBIL', 52, '1204000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, '1204001', 'Mitsubishi FE-71/Truk thn 2010 di Banyuwangi (Driver Gundik)', 76, '1204001000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, '1204002', 'Elf Putih - 2014 di Bali (Driver Putu)', 76, '1204002000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, '1204003', 'Kijang Inova Ex Jakarta', 76, '1204003000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, '1204004', 'Isuzu Pick-up Traga', 76, '1204004000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, '1205', 'SEPEDA MOTOR', 52, '1205000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, '1205001', 'Honda Kharisma - Bali', 81, '1205001000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, '1205002', 'Yamaha Vega-R Biru - Banyuwangi', 81, '1205002000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, '1205003', 'Yamaha Byson - Bali', 81, '1205003000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, '1205004', 'Honda Revo - Bali', 81, '1205004000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, '1205005', 'Honda Vario - Bali', 81, '1205005000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, '1206', 'INVENTARIS KANTOR', 52, '1206000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, '1206001', 'Komputer, Printer, Monitor', 87, '1206001000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, '1206002', 'Perlengkapan Komunikasi (Modem, PABX, Peswt Telp, dll)', 87, '1206002000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, '1206003', 'Furniture Perlengkapan Kantor ', 87, '1206003000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, '1206004', 'Perlengkapan Kantor Elektronik (AC, Kulkas, TV, dll)', 87, '1206004000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, '1206005', 'Peralatan Kantor (Kalkulator, Mesin Ketik, dll)', 87, '1206005000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, '1206006', 'Perlengkapan Kantor Lain2x ', 87, '1206006000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, '1206999', 'Inventaris Lain-Lain', 87, '1206999000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, '13', 'AKTIVA TIDAK BERWUJUD', 1, '1300000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, '1301', 'Trade Merk', 95, '1301000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, '1302', 'Perijinan', 95, '1302000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, '1399', 'Lain-Lain', 95, '1399000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, '18', 'AKUMULASI PENYUSUTAN AKTIVA TETAP', 1, '1800000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, '1801', 'Akumulasi Penyusutan Tanah & Bangunan', 99, '1801000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, '1802', 'Akumulasi Penyusutan Kapal', 99, '1802000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, '1803', 'Akumulasi Penyusutan Mesin Kapal', 99, '1803000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, '1804', 'Akumulasi Penyusutan Mobil', 99, '1804000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, '1805', 'Akumulasi Penyusutan Sepeda Motor', 99, '1805000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, '1806', 'Akumulasi Penyusutan Inventaris Kantor', 99, '1806000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, '19', 'AKUMULASI AMORTISASI AKTIVA TDK BERWUJUD', 1, '1900000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, '1901', 'Akumulasi Amortisasi Trade Merk', 106, '1901000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, '1902', 'Akumulasi Amortisasi Perijinan', 106, '1902000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, '1999', 'Akumulasi Amortisasi Lain-Lain', 106, '1999000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, '2', 'HUTANG', 0, '2000000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, '21', 'HUTANG LANCAR', 110, '2100000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, '2101', 'HUTANG USAHA', 111, '2101000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, '2101001', 'Hutang Pendapatan Paket Tamu (Pendptan Diterima Dimuka)', 112, '2101001000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, '2101002', 'Hutang PT. Plengkung - Paket Akomodasi Tamu', 112, '2101002000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, '2101003', 'Hutang PT. Plengkung - Minishop', 112, '2101003000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, '2101004', 'Hutang PT. Plengkung - Foto', 112, '2101004000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, '2101005', 'Hutang PT. Plengkung - Massage, Loundry', 112, '2101005000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, '2101006', 'Hutang PT. Plengkung - Fishing', 112, '2101006000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, '2101007', 'Hutang PT. Plengkung - Tiket Tanas (Tamu Free)', 112, '2101007000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, '2101999', 'Hutang PT. Plengkung - Lain-Lain', 112, '2101999000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, '2102', 'HUTANG PEMBELIAN & BIAYA', 111, '2102000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, '2102001', 'Hutang Bengkel Hadi', 121, '2102001000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, '2102002', 'Hutang Jumani', 121, '2102002000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, '2102003', 'Hutang Kifli', 121, '2102003000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, '2102004', 'Hutang Pajak', 121, '2102004000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, '2102005', 'Hutang Gaji', 121, '2102005000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, '2102999', 'Hutang Lain-Lain', 121, '2102999000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, '2103', 'HUTANG PIHAK HUB ISTIMEWA', 111, '2103000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, '2103001', 'Hutang Bpk Djojo', 128, '2103001000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, '2103002', 'Hutang Bpk Marshelle', 128, '2103002000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, '2103003', 'Hutang Bpk Laurenz', 128, '2103003000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, '2103004', 'Hutang Ibu Stephanie', 128, '2103004000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, '2103005', 'Hutang ke Pihak III - Hub Istimewa', 128, '2103005000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, '22', 'HUTANG JANGKA PANJANG', 110, '2200000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, '2201', 'HUTANG LEASING', 134, '2201000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, '2201001', 'Hutang Pembelian Kendaraan', 135, '2201001000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, '2201002', 'Hutang Pembelian Mobil', 135, '2201002000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, '2201003', 'Hutang Pembelian Kapal', 135, '2201003000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, '2201004', 'Hutang Pembelian Mesin Kapal', 135, '2201004000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, '2202', 'HUTANG BANK', 134, '2202000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, '2203', 'HUTANG PIHAK KE III', 134, '2203000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, '3', 'MODAL', 0, '3000000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, '31', 'MODAL DISETOR', 142, '3100000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, '3101', 'Retained Earning (Laba Ditahan)', 143, '3101000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, '3102', 'Deviden', 143, '3102000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, '4', 'PENDAPATAN', 0, '4000000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, '41', 'PENDAPATAN USAHA', 146, '4100000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, '4101', 'Pendapatan Fastboat Gland - Rupiah', 147, '4101000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, '4102', 'Pendapatan Fastboat Gland - Valas', 147, '4102000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, '4103', 'Pendapatan Transport Darat - Rupiah', 147, '4103000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, '4104', 'Pendapatan Transport Darat - Valas', 147, '4104000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, '4105', 'Pendapatan Fastboat Lain-Lain - Rupiah', 147, '4105000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, '4106', 'Pendapatan Fastboat Lain-Lain - Valas', 147, '4106000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, '4107', 'Pendapatan Transport via Pesawat', 147, '4107000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, '4108', 'Pendapatan Foto - Rupiah', 147, '4108000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, '4109', 'Pendapatan Foto - Valas', 147, '4109000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, '4110', 'Pendapatan Titipan Paket Tamu Plengkung - Rupiah', 147, '4110000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, '4111', 'Pendapatan Titipan Paket Tamu Plengkung - Valas', 147, '4111000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, '4112', 'Pendapatan Cancel Tamu ', 147, '4112000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, '4113', 'Pendapatan Selisih Charge & Kurs', 147, '4113000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, '42', 'POTONGAN PENJUALAN', 146, '4200000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, '4201', 'Diskon / Potongan Harga Paket', 161, '4201000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, '4202', 'Komisi Agent Luar & Dalam Negeri', 161, '4202000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, '4203', 'Biaya Bank (Potongan Transfer, Provisi CC)', 161, '4203000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, '4204', 'Retur ke Tamu (Leaving Early, dll)', 161, '4204000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, '4205', 'Handling Fee Komisi Penjualan', 161, '4205000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, '4299', 'Potongan Penjualan Lainnya', 161, '4299000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, '5', 'HARGA POKOK PENJUALAN', 0, '5000000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, '51', 'BIAYA OPERASIONAL TRANSPORT LAUT', 168, '5100000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, '5101', 'Bensin & Olie Kapal Fastboat', 169, '5101000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, '5102', 'Bensin & Olie Zodiak', 169, '5102000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, '5103', 'Uang Makan Handle Trip Fastboat', 169, '5103000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, '5104', 'Biaya Parkir Kapal di Pantai', 169, '5104000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, '5105', 'Biaya Retribusi Laik Layar Syahbandar & Pol Air', 169, '5105000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, '5106', 'Biaya Angkut dan Cuk BBM Kapal', 169, '5106000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, '5107', 'Biaya Sekoci Tambahan', 169, '5107000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, '5108', 'BBM & Kendaraan Tambahan Jemput Tamu', 169, '5108000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, '5109', 'Makanan & Minuman Fasilitas Tamu di Fast Boat', 169, '5109000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, '5110', 'Biaya Transort Fastboat di Bobby / Raymond - Valas', 169, '5110000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, '5199', 'Biaya Langsung Lain2x', 169, '5199000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, '52', 'REPARASI & PERBAIKAN KAPAL & MESIN KAPAL', 168, '5200000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, '5201', 'Perbaikan Kapal G Force 1 Spare Part', 181, '5201000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, '5202', 'Perbaikan Kapal G Force 2 Ongkos', 181, '5202000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, '5203', 'Perbaikan Kapal DE- Ghab Spare Part', 181, '5203000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, '5204', 'Perbaikan Kapal DE- Ghab Ongkos', 181, '5204000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, '5205', 'Perbaikan Kapal Zodiak Spare Part', 181, '5205000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, '5206', 'Perbaikan Kapal Zodiak Ongkos', 181, '5206000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, '5207', 'Perbaikan Kapal Fiber G.E Spare Part', 181, '5207000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, '5208', 'Perbaikan Kapal Fiber G.E Ongkos', 181, '5208000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, '5209', 'Perbaikan Kapal Lain-Lain Spare Part', 181, '5209000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, '5210', 'Perbaikan Kapal Lain-Lain Ongkos', 181, '5210000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, '5211', 'Rep. & Perb. Mesin Yamaha 200PK Spare Part', 181, '5211000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, '5212', 'Rep. & Perb. Mesin Yamaha 200PK Ongkos', 181, '5212000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, '5213', 'Rep. & Perb. Mesin Yamaha 40PK Turbo Spare Part', 181, '5213000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, '5214', 'Rep. & Perb. Mesin Yamaha 40PK Turbo Ongkos', 181, '5214000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, '5215', 'Rep. & Perb. Mesin Yamaha 15PK Spare Part', 181, '5215000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, '5216', 'Rep. & Perb. Mesin Yamaha 15PK Ongkos', 181, '5216000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, '5217', 'Rep. & Perb. Mesin Suzuki 4 TAK 200PK Spare Part', 181, '5217000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, '5218', 'Rep. & Perb. Mesin Suzuki 4 TAK 200PK Ongkos', 181, '5218000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, '5219', 'Rep. & Perb. Mesin Suzuki 4 TAK 150PK / Ghab Fishing Spare Part', 181, '5219000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, '5220', 'Rep. & Perb. Mesin Suzuki 4 TAK 150PK / Ghab Fishing Ongkos', 181, '5220000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, '5221', 'Rep. & Perb. Mesin Suzuki 250PK  Spare Part', 181, '5221000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, '5222', 'Rep. & Perb. Mesin Suzuki 250PK  Ongkos', 181, '5222000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, '53', 'BIAYA OPERASIONAL TRANSPORT DARAT', 168, '5300000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, '5301', 'Bahan Bakar & Olie', 204, '5301000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, '5302', 'Tiket Kapal & Parkir Feri', 204, '5302000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, '5303', 'Uang Makan & Stay, Pulsa Sopir', 204, '5303000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, '5304', 'Retribusi di Pelabuhan , timbangan', 204, '5304000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, '5305', 'Biaya keamanan trip', 204, '5305000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, '5306', 'Tambahan Kendaraan antar tamu', 204, '5306000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, '5307', 'Biaya Kernet & angkat barang', 204, '5307000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, '5308', 'Biaya kendaraan penjemputan di airport', 204, '5308000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, '5399', 'Biaya Lain-Lain', 204, '5399000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, '54', 'REPARASI & PERBAIKAN KENDARAAN DARAT', 168, '5400000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, '5401', 'Perbaikan Kendaraan Operasional Bali Spare Part', 214, '5401000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, '5402', 'Perbaikan Kendaraan Operasional Bali Ongkos', 214, '5402000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, '5403', 'Perbaikan Truk di Banyuwangi Spare Part', 214, '5403000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, '5404', 'Perbaikan Truk di Banyuwangi Ongkos', 214, '5404000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, '5405', 'Perbaikan Kendaraan Operasional Direktur Spare Part', 214, '5405000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, '5406', 'Perbaikan Kendaraan Operasional Direktur Ongkos', 214, '5406000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, '5499', 'Biaya Perbaikan Kendaraan Lain-Lain', 214, '5499000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, '6', 'BIAYA', 0, '6000000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, '61', 'BIAYA UMUM & ADMINISTRASI', 222, '6100000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, '6101', 'Biaya Pemasaran', 223, '6101000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, '6101001', 'Biaya Iklan', 224, '6101001000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, '6101002', 'Biaya Kaos Set Sovenir', 224, '6101002000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, '6101003', 'Biaya Entertainment', 224, '6101003000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, '6101004', 'Biaya Cetak Brosur/Flayer, dll', 224, '6101004000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, '6101005', 'Biaya Pembelian Tissu ', 224, '6101005000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, '6101006', 'Biaya Pembelian Stuby', 224, '6101006000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, '6102', 'Gaji & Tunjangan Karyawan', 223, '6102000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, '6102001', 'Biaya Gaji, Lembur ', 231, '6102001000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, '6102002', 'Biaya Bonus Pesangon & Kompensasi', 231, '6102002000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, '6102003', 'Biaya Catering & Makan Karyawan', 231, '6102003000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, '6102004', 'Biaya Tunjangan Kesehatan', 231, '6102004000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, '6102005', 'Biaya Asuransi Karyawan', 231, '6102005000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, '6102006', 'Biaya THR', 231, '6102006000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, '6103', 'Beban Utiliti, Adm, Sewa & Lainnya', 223, '6103000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, '6103001', 'Biaya Listrik', 238, '6103001000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, '6103002', 'Biaya PDAM', 238, '6103002000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, '6103003', 'Biaya Telekomunikasi', 238, '6103003000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, '6103004', 'Biaya Ekspedisi, Pos & Materai', 238, '6103004000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, '6103005', 'Biaya Keperluan/ATK Kantor', 238, '6103005000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, '6103006', 'STNK, KIR & Pajak Kendaraan + Transport', 238, '6103006000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, '6103007', 'Biaya Pajak Final / Tahunan', 238, '6103007000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, '6103008', 'Biaya Retribusi & Sumbangan/Kebersihan/Keamanan', 238, '6103008000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, '6103009', 'Biaya Sewa Gedung', 238, '6103009000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, '6103010', 'Biaya Umum & Adm Lainnya', 238, '6103010000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, '6103011', 'Biaya Pajak PPh Pasal 21', 238, '6103011000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(250, '6103012', 'Biaya PBB', 238, '6103012000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(251, '6103013', 'Biaya Audit', 238, '6103013000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(252, '6103999', 'Biaya Lain-Lain', 238, '6103999000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, '6104', 'Repair & Maintenance Expense', 223, '6104000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(254, '6104001', 'Biaya Pemeliharaan Kantor', 253, '6104001000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(255, '6104002', 'Biaya Pemeliharaan Peralatan Kantor', 253, '6104002000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(256, '6104003', 'Biaya Pemeliharaan Kendaraan Kantor', 253, '6104003000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(257, '6105', 'Biaya Pribadi Direksi / Pemegang Saham', 223, '6105000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(258, '6105001', 'Perbaikan & Keperluan Kendaraan', 257, '6105001000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(259, '6105002', 'Perbaikan Rumah Manyar/Keperluan Pak Djojo', 257, '6105002000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(260, '6105003', 'Biaya Lain2x untuk Direksi', 257, '6105003000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(261, '6106', 'Biaya Rep. & Perb. Sepeda Motor', 223, '6106000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(262, '6106001', 'Rep. & Perb. Honda Kharisma Spare Part', 261, '6106001000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(263, '6106002', 'Rep. & Perb. Honda Kharisma Ongkos', 261, '6106002000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(264, '6106003', 'Rep. & Perb. Yamaha Vega-R Biru Spare Part', 261, '6106003000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(265, '6106004', 'Rep. & Perb. Yamaha Vega-R Biru Ongkos', 261, '6106004000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(266, '6106005', 'Rep. & Perb. Yamaha Byson Spare Part', 261, '6106005000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(267, '6106006', 'Rep. & Perb. Yamaha Byson Ongkos', 261, '6106006000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(268, '6106007', 'Rep. & Perb. Honda Revo Spare Part', 261, '6106007000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(269, '6106008', 'Rep. & Perb. Honda Revo Ongkos', 261, '6106008000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(270, '6106009', 'Rep. & Perb. Xeon (Elsa) Spare Part', 261, '6106009000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(271, '6106010', 'Rep. & Perb. Xeon (Elsa) Ongkos', 261, '6106010000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(272, '6106011', 'Rep. & Perb. Vario (Hendra) Spare Part', 261, '6106011000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(273, '6106012', 'Rep. & Perb. Vario (Hendra) Ongkos', 261, '6106012000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(274, '6106013', 'Rep. & Perb. Mio Soul Dodit Spare Part', 261, '6106013000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(275, '6106014', 'Rep. & Perb. Mio Soul Dodit Ongkos', 261, '6106014000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(276, '6107', 'Biaya Penyusutan & Amortisasi', 223, '6107000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(277, '6107001', 'Biaya Penyusutan Tanah dan Bangunan', 276, '6107001000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(278, '6107002', 'Biaya Penyusutan Kapal', 276, '6107002000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(279, '6107003', 'Biaya Penyusutan Mesin kapal', 276, '6107003000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(280, '6107004', 'Biaya Penyusutan Mobil', 276, '6107004000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(281, '6107005', 'Biaya Penyusutan Sepeda Motor', 276, '6107005000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(282, '6107006', 'Biaya Penyusutan Inventaris Kantor', 276, '6107006000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(283, '6107007', 'Biaya Amortisasi Aktiva Tidak Berwujud', 276, '6107007000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(284, '7', 'PENDAPATAN & BIAYA LAIN', 0, '7000000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(285, '71', 'PENDAPATAN DILUAR USAHA', 284, '7100000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(286, '7101', 'Pendapatan Jasa Giro', 285, '7101000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(287, '7102', 'Pendapatan Bunga Deposito', 285, '7102000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(288, '7103', 'Penjualan Inventory / Perlengkapan', 285, '7103000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(289, '7104', 'Pendapatan Lain-Lain', 285, '7104000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(290, '7105', 'Gain/Loss Revaluation FA', 285, '7105000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(291, '72', 'BIAYA DILUAR USAHA', 284, '7200000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(292, '7201', 'Biaya Bunga Pinjaman ', 291, '7201000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(293, '7202', 'Biaya Adm Bank & Buku Cek/Giro', 291, '7202000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(294, '7203', 'Pajak Jasa Giro', 291, '7203000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(295, '7204', 'Beban Lain-Lain', 291, '7204000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(296, '7205', 'Kerugian Selisih Kurs', 291, '7205000000', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t46_users`
--

CREATE TABLE `t46_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t46_users`
--

INSERT INTO `t46_users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$10$/yCLRTZ3xd7y/XisRgzJjOWI5rFiMeGbkIaLwfOkvR3d6odU6wkoe', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1613307895, 1, 'Administrator', 'istrator', 'ADMIN', '0'),
(2, '::1', 'adi', '$2y$10$vPbQth0idvyMbrURrM.YDOuncIuLAzjrawwCiiz031bz0WRxLMfcu', 'e181429@f181429.g181429', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1613301269, 1613305305, 1, 'Adi', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t47_groups`
--

CREATE TABLE `t47_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t47_groups`
--

INSERT INTO `t47_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'Accounting', '');

-- --------------------------------------------------------

--
-- Table structure for table `t48_users_groups`
--

CREATE TABLE `t48_users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t48_users_groups`
--

INSERT INTO `t48_users_groups` (`id`, `user_id`, `group_id`) VALUES
(3, 1, 1),
(4, 1, 2),
(10, 2, 2),
(11, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `t49_login_attempts`
--

CREATE TABLE `t49_login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t01_company`
--
ALTER TABLE `t01_company`
  ADD PRIMARY KEY (`idcompany`);

--
-- Indexes for table `t02_akun`
--
ALTER TABLE `t02_akun`
  ADD PRIMARY KEY (`idakun`),
  ADD UNIQUE KEY `Kode` (`Kode`);

--
-- Indexes for table `t46_users`
--
ALTER TABLE `t46_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `t47_groups`
--
ALTER TABLE `t47_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t48_users_groups`
--
ALTER TABLE `t48_users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `t49_login_attempts`
--
ALTER TABLE `t49_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t01_company`
--
ALTER TABLE `t01_company`
  MODIFY `idcompany` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t02_akun`
--
ALTER TABLE `t02_akun`
  MODIFY `idakun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT for table `t46_users`
--
ALTER TABLE `t46_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t47_groups`
--
ALTER TABLE `t47_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t48_users_groups`
--
ALTER TABLE `t48_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t49_login_attempts`
--
ALTER TABLE `t49_login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t48_users_groups`
--
ALTER TABLE `t48_users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `t47_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `t46_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
