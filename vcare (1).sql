-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 04:10 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id_ads` int(11) NOT NULL,
  `menu_ads` varchar(50) NOT NULL,
  `harga_ads` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id_ads`, `menu_ads`, `harga_ads`) VALUES
(1, 'Deluxe', '45000'),
(2, 'Standard', '0'),
(3, 'Promo', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `id_alamat` int(11) NOT NULL,
  `id_users` varchar(10) NOT NULL,
  `namajalan` varchar(500) NOT NULL,
  `provinsi` varchar(40) NOT NULL,
  `kodepos` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`id_alamat`, `id_users`, `namajalan`, `provinsi`, `kodepos`) VALUES
(19, '43', 'jl. Asem rowo 14, Surabaya', 'Jawa timur', '61151'),
(18, '43', 'jl. Asem rowo 14, Surabaya', 'Jawa timur', '61151'),
(17, '43', 'jl. kahayan 14, Gresik', 'Jawa timur', '61151'),
(16, '45', 'jl. kahayan gresik', 'Jawa timur', '61151'),
(15, '45', 'jl. kahayan gresik', 'Jawa timur', '61151'),
(14, '45', 'jl. kahayan gresik', 'Jawa timur', '61151'),
(92, '45', 'jl. kahayan gresik', 'Jawa timur', '61151'),
(48, '45', 'jl. kahayan gresik', 'Jawa timur', '61151'),
(64, '45', 'jl. kahayan gresik', 'Jawa timur', '61151'),
(95, '71', 'jl. raya sukomulyo, Gresik no 14 telkom', 'Jawa Timur', '6121212'),
(70, '43', 'jl. Asem rowo 14, Surabaya', 'Jawa timur', '61151'),
(50, '43', 'jl. Asem rowo 14, Surabaya', 'Jawa timur', '61151'),
(43, '45', 'Gunung Sahari', 'DKI Jakarta', '12140'),
(26, '45', 'jl. kahayan gresik', 'Jawa timur', '61151'),
(91, '45', 'Kucica JF 17 no 16 Bintaro', 'Tangerang Selatan', '15229'),
(53, '45', 'jl. kahayan gresik', 'Jawa timur', '61151'),
(12, '45', 'jl. kahayan gresik', 'Jawa timur', '61151'),
(57, '45', 'Kucica', 'Banten', '15229'),
(41, '74', 'jl. raya sukomulyo gresik', 'jawa timur', '61151'),
(29, '75', 'Dynasty water world gresik', 'jawa timur', '61151'),
(72, '75', 'Dynasty water world gresik', 'jawa timur', '61151'),
(35, '75', 'Dynasty water world gresik', 'jawa timur', '61151'),
(76, '75', 'Dynasty water world gresik', 'jawa timur', '61151'),
(56, '75', 'Dynasty water world gresik', 'jawa timur', '61151'),
(33, '75', 'Dynasty water world gresik', 'jawa timur', '61151'),
(37, '45', 'jl. Raya Sukomulyo no 13 gresik', 'Jawa timur', '61151'),
(99, '76', 'Jl. raya roomo no 44', 'Jawa timur', '61151'),
(81, '75', 'Dynasty water world gresik', 'jawa timur', '61151'),
(46, '45', 'Jalan ruby 7 no 32', 'Banteng', '61151'),
(38, '77', 'Jl. R.A Kartini no 25 Gresik', 'Jawa timur', '61152'),
(69, '45', 'jl. kahayan gresik', 'Jawa timur', '61151'),
(82, '45', 'jl. kahayan gresik', 'Jawa timur', '61151'),
(77, '79', 'jl. Kahayan no 1 gresik', 'jawa timur', '61151'),
(24, '45', 'jl. kahayan gresik', 'Jawa timur', '61151'),
(97, '45', 'jl. kahayan gresik', 'Jawa timur', '61151'),
(30, '45', 'jl. kahayan gresik', 'Jawa timur', '61151'),
(49, '45', 'jl. kahayan gresik', 'Jawa timur', '61151'),
(67, '45', 'jl. kahayan gresik', 'Jawa timur', '61151'),
(62, '45', 'jl. kahayan gresik', 'Jawa timur', '61151'),
(74, '77', 'Jl. R.A Kartini no 25 Gresik', 'Jawa timur', '61152'),
(52, '10', 'jl. pendidikan no 45 lamongan', 'jawa timur', '32223'),
(25, '10', '', '', ''),
(83, '85', '', '', ''),
(42, '85', '', '', ''),
(87, '10', '', '', ''),
(13, '86', 'jl. sumatera no 44 gresik', 'jawa timur', '61151');

-- --------------------------------------------------------

--
-- Table structure for table `bebanbiaya`
--

CREATE TABLE `bebanbiaya` (
  `idbeban` int(11) NOT NULL,
  `feeadmin` varchar(100) NOT NULL,
  `komisiafiliasi` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bebanbiaya`
--

INSERT INTO `bebanbiaya` (`idbeban`, `feeadmin`, `komisiafiliasi`) VALUES
(1, '5', '20');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` enum('bill','quotation') NOT NULL,
  `path` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `user_id`, `date`, `type`, `path`) VALUES
(7, 211, '2021-09-14 14:05:49', 'quotation', '1. INSTALLATION.pdf'),
(8, 211, '2021-09-21 07:54:40', 'quotation', 'Balaji_resume-converted.pdf'),
(11, 207, '2021-09-27 07:32:10', 'quotation', '2. manual-guide.pdf'),
(33, 207, '2021-09-27 07:36:57', 'bill', '2. manual-guide.pdf'),
(34, 207, '2021-09-27 07:37:08', 'bill', '2. manual-guide.pdf'),
(35, 207, '2021-09-27 07:37:39', 'bill', '2. manual-guide.pdf'),
(36, 207, '2021-09-27 07:37:45', 'bill', '2. manual-guide.pdf'),
(37, 207, '2021-09-27 07:37:54', 'bill', '2. manual-guide.pdf'),
(38, 207, '2021-09-27 07:38:17', 'bill', '2. manual-guide.pdf'),
(39, 207, '2021-09-27 07:38:20', 'bill', '2. manual-guide.pdf'),
(40, 221, '2021-09-30 08:53:42', 'quotation', 'Kalaivani_appointment.pdf'),
(41, 227, '2021-10-05 08:34:44', 'quotation', 'vcaresysytem (1).pdf'),
(42, 225, '2021-10-05 08:35:12', 'quotation', 'Untitled-38-converted.pdf'),
(43, 225, '2021-10-05 12:25:27', 'quotation', 'Untitled-38-converted.pdf'),
(44, 276, '2021-10-25 11:36:41', 'quotation', 'Page1.pdf'),
(45, 290, '2021-10-27 10:13:09', 'quotation', 'vcaresysytem (1).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `namalapangan` varchar(100) NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id_mobil` int(11) NOT NULL,
  `nama_mobil` varchar(100) NOT NULL,
  `merkmobil` varchar(30) NOT NULL,
  `deskripsimobil` varchar(200) NOT NULL,
  `harga_12jam` varchar(50) NOT NULL,
  `harga_24jam` varchar(30) NOT NULL,
  `pemilikmobil` varchar(10) NOT NULL,
  `gambarmobil` varchar(100) NOT NULL,
  `jenisbahanbakar` varchar(20) NOT NULL,
  `alamat_barang` varchar(350) NOT NULL,
  `ada` int(11) NOT NULL,
  `kursi` varchar(12) NOT NULL,
  `pintu` varchar(12) NOT NULL,
  `hargasopir` varchar(20) NOT NULL,
  `fitur` varchar(500) NOT NULL,
  `tipetransmisi` varchar(50) NOT NULL,
  `plat` varchar(30) NOT NULL,
  `kecamatan` varchar(40) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `warna` varchar(10) NOT NULL,
  `bagasi` varchar(10) NOT NULL,
  `singleac` varchar(50) NOT NULL,
  `doubleac` varchar(50) NOT NULL,
  `chargerhp` varchar(50) NOT NULL,
  `audio` varchar(50) NOT NULL,
  `entertainment` varchar(50) NOT NULL,
  `airbag` varchar(50) NOT NULL,
  `terpal` varchar(50) NOT NULL,
  `bancadangan` varchar(50) NOT NULL,
  `jenismobil` varchar(500) NOT NULL,
  `kodeafiliasi` varchar(40) NOT NULL,
  `tipeads` varchar(5) NOT NULL,
  `harga1jam` varchar(20) NOT NULL,
  `harga6jam` varchar(20) NOT NULL,
  `harga1bulan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id_mobil`, `nama_mobil`, `merkmobil`, `deskripsimobil`, `harga_12jam`, `harga_24jam`, `pemilikmobil`, `gambarmobil`, `jenisbahanbakar`, `alamat_barang`, `ada`, `kursi`, `pintu`, `hargasopir`, `fitur`, `tipetransmisi`, `plat`, `kecamatan`, `tahun`, `warna`, `bagasi`, `singleac`, `doubleac`, `chargerhp`, `audio`, `entertainment`, `airbag`, `terpal`, `bancadangan`, `jenismobil`, `kodeafiliasi`, `tipeads`, `harga1jam`, `harga6jam`, `harga1bulan`) VALUES
(53, 'Honda Brio', 'Honda', 'Mobil dilengkapi airbag. Siap melayani kapanpun dimanapun, respon cepat. Harga layanan Sudah termasuk sopir dan BBM', '400000', '600000', '23', 'brio.jpg', 'Premium', '', 1, '5', '4', '400000', '', 'Automatic', 'B 1134 BB', '', '2015', 'merah', '1', 'yes', 'no', 'yes', 'yes', 'yes', 'no', 'yes', 'yes', 'City Car', '', '', '70000', '120000', '240000'),
(61, 'Jazz', 'Honda', 'Bagus', '300000', '500000', '23', 'jazz.jpg', 'Solar', 'Cikirang', 1, '2', '', '100000', '', 'Manual', '1234', '', '2014', 'Putih', '1', 'yes', 'no', 'yes', 'yes', 'yes', 'no', 'no', 'no', 'City Car', '', '', '70000', '120000', '240000'),
(62, 'Avanza Veloz', 'Toyota', 'Bersih,  mobil masih baru dan tarikan kenceng', '350000', '500000', '23', 'veloz.jpg', 'Premum', 'Manonjaya, Tasikmalaya, West Java, Indonesia', 1, '7', '', '100000', '', 'Automatic', '8769', 'Manonjaya', '2015', 'Silver', '1', 'no', 'yes', 'yes', 'yes', 'yes', 'no', 'yes', 'yes', 'MVP', '', '', '70000', '120000', '240000'),
(63, 'Xenia', 'Daihatsu', 'Nyaman dan mulus', '250000', '400000', '23', 'IMG_20171204_085124.jpg', 'Premum', 'Indihiang, Tasikmalaya, West Java, Indonesia', 1, '8', '', '100000', '', 'Automatic', '5678', 'Indihiang ', '2016', 'Merah', '1', 'no', 'yes', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'MVP', '', '', '70000', '120000', '240000'),
(64, 'boat1', 'Boate', 'Tes tes tes', '200000', '3000000', '24', '../fotobarang/smallbot3.jpg', 'Premum', 'Hotel Indonesia, Jl. M.H. Thamrin No.1, RT.1/RW.5, Menteng, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10310, Indonesia', 1, '8', '', '150000', '', 'Manual', 'L 3893 LK', 'jakarta pusat', '2014', 'Silver', '2', 'yes', 'yes', 'yes', 'yes', 'yes', '', '', 'yes', 'MVP', 'KGBjhT73Hy6', '', '70000', '120000', '240000'),
(65, 'Truck Mitsubishi Colt Diesel FE FHDX 70', 'Mitsubishi', 'Tes tes tes', '200000', '3000000', '25', '../fotobarang/truck.jpg', 'Premum', 'Hotel Indonesia, Jl. M.H. Thamrin No.1, RT.1/RW.5, Menteng, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10310, Indonesia', 1, '8', '', '150000', '', 'Manual', 'L 3893 LK', 'jakarta pusat', '2014', 'Silver', '2', 'yes', 'yes', 'yes', 'yes', 'yes', '', '', 'yes', 'MVP', 'KGBjhT73Hy6', '', '70000', '120000', '240000');

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE `departement` (
  `keterangandepartement` varchar(500) NOT NULL,
  `kapasitasdepartement` varchar(40) NOT NULL,
  `departement` varchar(100) NOT NULL,
  `notifikasi` varchar(10) NOT NULL,
  `topup` varchar(10) NOT NULL,
  `payment` varchar(10) NOT NULL,
  `user` varchar(10) NOT NULL,
  `narasumber` varchar(10) NOT NULL,
  `admin` varchar(10) NOT NULL,
  `voucher` varchar(10) NOT NULL,
  `bank` varchar(10) NOT NULL,
  `client` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`keterangandepartement`, `kapasitasdepartement`, `departement`, `notifikasi`, `topup`, `payment`, `user`, `narasumber`, `admin`, `voucher`, `bank`, `client`) VALUES
('Board management adalah akses untuk manajemen tertinggi pada perusahaan kamupintar, board management dapat melakukan pengaturan langsung seluruh akses menu', '9', 'Board management', 'ya', 'ya', 'ya', 'ya', 'ya', 'ya', 'ya', 'ya', 'ya'),
('Departement investor untuk melihat demo aplikasi admin tetapi tidak dapat melakukan pengaturan langsung dan mengubah data. investor bisa menambahkan voucher bonus untuk user', '1000', 'investor', 'tidak', 'tidak', 'tidak', 'tidak', 'tidak', 'tidak', 'ya', 'tidak', 'tidak'),
('Departement finance bisa melayani pembayaran proplan dari user, melayani topup dan withraw, dan mengelola data user serta notifikasi', '3', 'Finance', 'ya', 'ya', 'ya', 'ya', 'tidak', 'tidak', 'ya', 'ya', 'ya'),
('Human resource memanagement data user, narasumber, mitra dan klien, dapat mengirim notifikasi', '6', 'Human Resource', 'ya', 'tidak', 'tidak', 'ya', 'ya', 'ya', 'tidak', 'tidak', 'ya'),
('dipartement pemasaran dapat mengakses data user dan narasumber, serta dapat memberikan info melalui akses notifikasi', '10', 'marketing', 'ya', 'tidak', 'tidak', 'ya', 'ya', 'tidak', 'tidak', 'tidak', 'tidak'),
('Customer service melayani seputar layanan user dan narasumber saja', '10', 'Customer Service', 'tidak', 'tidak', 'tidak', 'ya', 'ya', 'ya', 'tidak', 'tidak', 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `driverfb`
--

CREATE TABLE `driverfb` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `datecr` date NOT NULL,
  `service` varchar(20) NOT NULL,
  `intime` time NOT NULL,
  `outime` time NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `driverfb`
--

INSERT INTO `driverfb` (`id`, `name`, `datecr`, `service`, `intime`, `outime`, `status`) VALUES
(7, ' muhisha ', '2021-10-30', 'desktop', '02:30:00', '04:30:00', 'Yes'),
(8, ' muhisha ', '2021-10-30', 'desktop', '02:30:00', '04:30:00', 'Yes'),
(9, '', '2021-10-30', '', '00:00:00', '00:00:00', ''),
(10, '', '2021-10-30', '', '00:00:00', '00:00:00', ''),
(11, '', '2021-10-30', '', '00:00:00', '00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `idevent` int(11) NOT NULL,
  `idpengirim` text NOT NULL,
  `idtujuan` varchar(225) NOT NULL,
  `pesan` varchar(700) NOT NULL,
  `eventer` varchar(40) NOT NULL,
  `tanggalevent` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`idevent`, `idpengirim`, `idtujuan`, `pesan`, `eventer`, `tanggalevent`) VALUES
(3, '0', '0', '\r\nhello all users, get discounts and free services for certain repeat orders', '0', '21-02-2019'),
(4, '0', '0', 'You are our new customer when this application is launched', '0', '24-03-2019'),
(8, '0', 'mitra', ' sdf', '0', '29-10-2019'),
(9, '0', 'mitra', 'alert', '0', '16-11-2019'),
(10, '0', 'mitra', ' ', '0', '08-12-2019'),
(11, '0', 'user', ' testing promo', '0', '12-12-2019'),
(12, '0', 'user', ' testinggdhadfjhsdasjfhsdjfjksdfjdkshjlshfljhfljhfljfhsljhfjksajkfjksdhjkdfsjlfhslfhskldfhlfhslfhdslfhljfhsdlfhdjfeueoncsdaf;ielish;isaniusdahosdhosidcs', '0', '12-12-2019'),
(13, '0', 'user', ' Hiii too All', '0', '26-08-2021'),
(14, '0', 'mitra', ' Your Job has been Allocated\r\n', '0', '05-10-2021'),
(15, '0', 'user', ' Your Job has been Allocated', '0', '05-10-2021'),
(16, '0', 'user', ' asssdadsas', '0', '25-10-2021');

-- --------------------------------------------------------

--
-- Table structure for table `galery`
--

CREATE TABLE `galery` (
  `idgalery` int(11) NOT NULL,
  `idproduct` varchar(10) NOT NULL,
  `gbr` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galery`
--

INSERT INTO `galery` (`idgalery`, `idproduct`, `gbr`) VALUES
(30, '2', 'aircon51.png'),
(29, '2', 'aircon50.png');

-- --------------------------------------------------------

--
-- Table structure for table `imagestore`
--

CREATE TABLE `imagestore` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imagestore`
--

INSERT INTO `imagestore` (`id`, `name`, `image`) VALUES
(8, 'vtsolution', 'WhatsApp Image 2021-10-25 at 11.16.48 AM (1).jpeg'),
(9, 'zadmin3', 'WhatsApp Image 2021-10-25 at 11.16.47 AM.jpeg'),
(10, 'vtsolution', 'WhatsApp Image 2021-10-25 at 11.16.47 AM (1).jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `infobank`
--

CREATE TABLE `infobank` (
  `idinfo` int(11) NOT NULL,
  `namabank` varchar(30) NOT NULL,
  `namaorang` varchar(100) NOT NULL,
  `norek` varchar(100) NOT NULL,
  `jambuka` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `infobank`
--

INSERT INTO `infobank` (`idinfo`, `namabank`, `namaorang`, `norek`, `jambuka`) VALUES
(9, 'CommonWealth Bank', 'zoe hendicott', '3637288199', 'New Souh Wales Australia'),
(10, 'ANZ', 'hendry Scott', '4422444444', 'South melbourne'),
(11, 'NAB', 'Hendry Scott', '33883992999', 'Sydney'),
(12, 'Centenary', 'Laurence August', '30278887444', 'Mapeera'),
(13, 'Centenary', 'Laurence August', '30278887444', 'Mapeera');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_ads`
--

CREATE TABLE `jadwal_ads` (
  `idjadwal` int(11) NOT NULL,
  `product_id` varchar(30) NOT NULL,
  `statusads` varchar(40) NOT NULL,
  `time_end` varchar(100) NOT NULL,
  `id_sopir` varchar(10) NOT NULL,
  `id_ads` varchar(10) NOT NULL,
  `time_start` varchar(100) NOT NULL,
  `kodejadwal` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jw_menu`
--

CREATE TABLE `jw_menu` (
  `menu_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT 0,
  `menu_type` int(11) DEFAULT 0,
  `menu_banner` varchar(255) DEFAULT NULL,
  `menu_page_type` int(11) DEFAULT NULL,
  `menu_page_link` varchar(255) DEFAULT NULL,
  `menu_page_target` varchar(255) DEFAULT NULL,
  `menu_top_status` int(11) DEFAULT 1,
  `menu_top_sort` int(11) DEFAULT NULL,
  `menu_bottom_status` int(11) DEFAULT 1,
  `menu_bottom_sort` int(11) DEFAULT NULL,
  `inc_module` varchar(255) DEFAULT NULL,
  `menu_default_sort` int(11) DEFAULT 0,
  `menu_icon` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jw_menu_detail`
--

CREATE TABLE `jw_menu_detail` (
  `id` int(11) NOT NULL,
  `namalapangan` varchar(255) DEFAULT NULL,
  `image` varchar(500) NOT NULL,
  `status` tinytext NOT NULL COMMENT '0 -> inactive, 1->active, 2->deleted',
  `createdAt` datetime NOT NULL,
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jw_menu_detail`
--

INSERT INTO `jw_menu_detail` (`id`, `namalapangan`, `image`, `status`, `createdAt`, `updatedAt`) VALUES
(89, 'Desktop', 'desktop.jpg', '1', '0000-00-00 00:00:00', '2021-09-02 06:44:35'),
(87, 'Laptop', 'laptop.png', '1', '0000-00-00 00:00:00', '2021-09-02 06:44:35'),
(88, 'Cctv ', 'cctv-camera-setup-500x500.jpg', '1', '0000-00-00 00:00:00', '2021-09-02 06:44:35'),
(83, 'Printer', 'printer.jpeg', '1', '0000-00-00 00:00:00', '2021-09-02 06:44:35'),
(81, 'Audio System', 'Audio system.jpg', '1', '0000-00-00 00:00:00', '2021-09-02 06:44:35'),
(94, 'Projector', 'projector.jpg', '1', '0000-00-00 00:00:00', '2021-09-02 06:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `jw_menu_kordinat`
--

CREATE TABLE `jw_menu_kordinat` (
  `idjw` int(11) NOT NULL,
  `deskripsi` varchar(300) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `lng` varchar(100) NOT NULL,
  `id_detail` varchar(10) NOT NULL,
  `alamat` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jw_product`
--

CREATE TABLE `jw_product` (
  `product_id` int(11) NOT NULL,
  `menu_id` varchar(11) NOT NULL,
  `brand_id` varchar(11) NOT NULL,
  `product_image_ori` varchar(255) DEFAULT NULL,
  `product_tag` varchar(255) DEFAULT NULL,
  `product_date` varchar(100) NOT NULL,
  `id_mitra` varchar(10) NOT NULL,
  `hargaeceran` varchar(100) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `warna` varchar(500) NOT NULL,
  `spesifikasi` varchar(500) NOT NULL,
  `stock` varchar(20) NOT NULL,
  `sales` varchar(20) NOT NULL,
  `kodeproduk` varchar(20) NOT NULL,
  `vpanjang` varchar(20) NOT NULL,
  `vlebar` varchar(20) NOT NULL,
  `vtinggi` varchar(20) NOT NULL,
  `fullwaranty` varchar(19) NOT NULL,
  `motorwaranty` varchar(19) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 -> inactive, 1->active, 2->deleted',
  `createdAt` datetime NOT NULL,
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jw_product`
--

INSERT INTO `jw_product` (`product_id`, `menu_id`, `brand_id`, `product_image_ori`, `product_tag`, `product_date`, `id_mitra`, `hargaeceran`, `deskripsi`, `warna`, `spesifikasi`, `stock`, `sales`, `kodeproduk`, `vpanjang`, `vlebar`, `vtinggi`, `fullwaranty`, `motorwaranty`, `status`, `createdAt`, `updatedAt`) VALUES
(85, '87', '', 'commercial laptops.jpg', 'Lenovo Ideapad Slim 3i', '2021-10-05 05:24:03', '1', '49990', 'Stylish & Portable Thin and Light Laptop\r\n15.6 inch Full HD LED Backlit, Anti-Glare Display (250 nits Brightness)\r\nLight Laptop without Optical Disk Drive\r\n8 GB RAM\r\n256 GB SSD\r\nWindows 10 Home', '', 'Lenovo Ideapad Slim 3i ', '10', '0', 'TD1MEJM5SF', '', '', '', '', '', 1, '0000-00-00 00:00:00', '2021-10-05 05:27:59'),
(86, '89', '', 'modular pc2.png', 'Lenovo ideacentre', '2021-10-05 10:44:48', '1', '47990', 'Windows 10 HomeIntel Core i3 (10th Gen),RAM 8 GB DDR4,23.8 inch Display,Microsoft Office Home and Student 2019', '', 'Lenovo ideacentre ', '', '0', '1XYTJZTPUZ', '', '', '', '', '', 1, '0000-00-00 00:00:00', '2021-10-05 08:25:54'),
(87, '88', '', 'tapo-c200-indoor-outdoor-security-camera-tp-link-original-imafsw8kbwvfrrrp.jpeg', 'TP-Link Tapo C200', '2021-10-05 08:26:04', '1', '2299', 'For Indoor & Outdoor Security Camera Use\r\n0 HDD\r\nNight Vision Feature\r\nNo of Channels: 0\r\nHigh Definition Video - 1080p|Motion Detection, Sound and Light Alarm\r\nAdvanced Night View|Two-Way Audio\r\nSafe Storage: Support MicroSD Card (up to 128 GB) (Please note SD Card not included)', '', 'TP-Link Tapo C200', '05', '0', 'E5ZOZ730', '', '', '', '', '', 1, '0000-00-00 00:00:00', '2021-10-05 08:27:56'),
(88, '94', '', 'zeb-lp2800hd-lp2800hd-zebronics-original-imagywe4hfukrwrh.jpeg', 'ZEBRONICS ZEB-LP2800HD', '2021-10-05 08:28:54', '1', '7490', 'Projector Type: HD | Chipset: LCD\r\nMaximum Projection Distance: 13.4 ft\r\nLamp Life: 30000 hrs\r\nResolution: 1080 pixel\r\nAspect Ratio: 16:09\r\nMaximum Brightness: 2800 lm', '', 'ZEBRONICS ZEB-LP2800HD', '20', '0', 'U5FM6I7GL0', '', '', '', '', '', 1, '0000-00-00 00:00:00', '2021-10-05 08:29:37'),
(89, '83', '', 'ink tank printer.jpg', 'Epson Ink Tank 310', '2021-10-05 08:29:50', '1', '10999', 'Output: Color\r\nUSB | USB\r\nCost per Page (Black): 10 Paise | Cost per Page (Color): 20 Paise\r\nPrint Speed Mono A4: 19 ppm | Print Speed Color A4: 15 ppm\r\nDuty cycle (monthly, A4): 1000 pages', '', 'Epson Ink Tank 310', '25', '0', '7EPVS3MB2X', '', '', '', '', '', 1, '0000-00-00 00:00:00', '2021-10-05 08:31:47'),
(90, '', '', '5.1.jpg', 'Intex IT-2616', '2021-10-05 08:32:04', '1', '1699', 'Power Output(RMS): 55 W\r\nPower Source: AC Adapter\r\nBluetooth Version: 4.2\r\nWireless range: 8 m\r\nWireless music streaming via Bluetooth\r\nMemory Card Slot\r\nFully Functioned Remote Control', '', 'Intex IT-2616', '30', '0', 'JUW9D91JT', '', '', '', '', '', 1, '0000-00-00 00:00:00', '2021-10-05 08:33:47'),
(91, '', '', 'sdf.jfif', 'HP Laptop', '2021-10-23 10:35:51', '1', '6000', 'aptop at afortable price', '', 'laptop at afortable price', '2', '0', 'FT52671BHE', '', '', '', '', '', 1, '0000-00-00 00:00:00', '2021-10-23 10:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `jw_product1`
--

CREATE TABLE `jw_product1` (
  `product_id` int(11) NOT NULL,
  `menu_id` varchar(11) NOT NULL,
  `brand_id` varchar(11) NOT NULL,
  `product_image_ori` varchar(255) DEFAULT NULL,
  `product_tag` varchar(255) DEFAULT NULL,
  `product_date` varchar(100) NOT NULL,
  `id_mitra` varchar(10) NOT NULL,
  `hargaeceran` varchar(100) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `warna` varchar(500) NOT NULL,
  `spesifikasi` varchar(500) NOT NULL,
  `stock` varchar(20) NOT NULL,
  `sales` varchar(20) NOT NULL,
  `kodeproduk` varchar(20) NOT NULL,
  `vpanjang` varchar(20) NOT NULL,
  `vlebar` varchar(20) NOT NULL,
  `vtinggi` varchar(20) NOT NULL,
  `fullwaranty` varchar(19) NOT NULL,
  `motorwaranty` varchar(19) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 -> inactive, 1->active, 2->deleted',
  `createdAt` datetime NOT NULL,
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jw_product_detail`
--

CREATE TABLE `jw_product_detail` (
  `product_detail_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_desc` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategoripustaka`
--

CREATE TABLE `kategoripustaka` (
  `id` int(11) NOT NULL,
  `namalapangan` varchar(100) NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategoripustaka`
--

INSERT INTO `kategoripustaka` (`id`, `namalapangan`, `image`) VALUES
(29, 'Perhotelan', 'noimage.jpg'),
(28, 'International Relation', 'noimage.jpg'),
(27, 'Matematika', 'noimage.jpg'),
(26, 'Accounting', 'noimage.jpg'),
(25, 'Hukum', 'noimage.jpg'),
(24, 'Ekonomi/Manajemen', 'noimage.jpg'),
(30, 'Manajemen Travel', 'noimage.jpg'),
(31, 'Komunikasi', 'noimage.jpg'),
(32, 'Psikologi', 'noimage.jpg'),
(33, 'Bahasa Inggris', 'noimage.jpg'),
(34, 'Biologi', 'noimage.jpg'),
(35, 'Arsitektur', 'noimage.jpg'),
(36, 'Bioteknologi', 'noimage.jpg'),
(37, 'Teknologi Pangan', 'noimage.jpg'),
(38, 'Teknik Industri', 'noimage.jpg'),
(39, 'Teknik Elektro', 'noimage.jpg'),
(40, 'Teknik Informatika', 'noimage.jpg'),
(41, 'Teknik Mekatronika', 'noimage.jpg'),
(42, 'Desain Kominikasi Visual', 'noimage.jpg'),
(43, 'Seni Musik', 'noimage.jpg'),
(44, 'Seni Pertunjukkan', '');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `idcatalog` int(11) NOT NULL,
  `tgl` varchar(30) NOT NULL,
  `idbarang` varchar(30) NOT NULL,
  `id_users` varchar(20) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `aktif` varchar(20) NOT NULL,
  `hrg` varchar(40) NOT NULL,
  `tot` varchar(50) NOT NULL,
  `idtrans` varchar(50) NOT NULL,
  `id_sopir` varchar(10) NOT NULL,
  `checkout` varchar(15) NOT NULL,
  `kodebayar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kodearea`
--

CREATE TABLE `kodearea` (
  `idkodearea` int(11) NOT NULL,
  `area1profinsi` varchar(40) NOT NULL,
  `area2kabupaten` varchar(600) NOT NULL,
  `kodearea` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kodearea`
--

INSERT INTO `kodearea` (`idkodearea`, `area1profinsi`, `area2kabupaten`, `kodearea`) VALUES
(1, 'JABODETABEK', 'Jakarta, Bogor, Depok, Tangerang, Bekasi', 'JKT'),
(2, 'JBR', 'Bandung, Sukabumi, Cimahi, Tasikmalaya, Cirebon, Cianjur', 'JBR');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama_layanan` varchar(30) NOT NULL,
  `keterangan_layanan` varchar(200) NOT NULL,
  `harga_layanan` varchar(30) NOT NULL,
  `picture` varchar(400) NOT NULL,
  `per` varchar(10) NOT NULL,
  `khusus` varchar(30) NOT NULL,
  `satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `keterangan_layanan`, `harga_layanan`, `picture`, `per`, `khusus`, `satuan`) VALUES
(1, 'Smart Pustaka', 'Layanan pencarian materi berdasarkan sumber valid dari buku atau Ebook online', '1', '0', '1', '1', 'x layanan'),
(11, 'Survei', 'Layanan Survei data valid oleh tenaga surveyor professional. Menghasilkan output data yang akurat dan dapat dipertanggung jawabkan', '1', '0', '1', '1', 'x layanan'),
(12, 'Wawancara', 'Jasa konsultasi dengan wawancara dari narasumber langsung', '1', '0', '1', '1', 'x Layanan');

-- --------------------------------------------------------

--
-- Table structure for table `liburnasional`
--

CREATE TABLE `liburnasional` (
  `id_liburan` int(11) NOT NULL,
  `tanggal_liburan` varchar(100) NOT NULL,
  `keterangan_liburan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liburnasional`
--

INSERT INTO `liburnasional` (`id_liburan`, `tanggal_liburan`, `keterangan_liburan`) VALUES
(15, '2018-01-01', 'Tahun Baru Kalender Masehi 2018'),
(16, '2018-02-16', 'Tahun Baru imlek'),
(17, '2018-03-17', 'Hari Raya Nyepi'),
(18, '2018-03-30', 'Wafat isa Almasih'),
(19, '2018-04-14', 'Isra Mikraj Nabi Muhammad SAW'),
(20, '2018-05-01', 'Hari Buruh Internasional'),
(21, '2018-05-10', 'Kenaikan Isa Al Masih'),
(26, '2018-05-29', 'Hari Raya Waisak 2562'),
(27, '2018-06-01', 'Hari Lahir Pancasila'),
(28, '2018-06-15', 'Hari Raya Idul Fitri 1439 Hijriyah'),
(29, '2018-06-16', 'Hari Raya Idul Fitri 1439 Hijriyah'),
(30, '2018-08-17', 'Hari Kemerdekaan Republik Indonesia'),
(31, '2018-08-22', 'Hari Raya Idul Adha 1439 Hijriyah'),
(32, '2018-09-11', 'Tahun Baru Islam 1440 Hijriyah'),
(33, '2018-11-20', 'Maulid Nabi Muhammad SAW'),
(34, '2018-12-25', 'Hari Raya Natal'),
(35, '2018-12-24', 'Hari Raya Natal');

-- --------------------------------------------------------

--
-- Table structure for table `limithutang`
--

CREATE TABLE `limithutang` (
  `idlimit` int(11) NOT NULL,
  `jumlahlimit` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `limithutang`
--

INSERT INTO `limithutang` (`idlimit`, `jumlahlimit`, `keterangan`) VALUES
(1, 60000000, 'enam puluh juta');

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `idmeja` int(11) NOT NULL,
  `namameja` varchar(20) NOT NULL,
  `room` varchar(29) NOT NULL,
  `statusbooking` varchar(29) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`idmeja`, `namameja`, `room`, `statusbooking`) VALUES
(1, '1', 'merkurius', '0'),
(2, '2', 'merkurius', '1'),
(3, '3', 'merkurius', '0'),
(4, '4', 'venus', '1'),
(5, '5', 'venus', '1'),
(6, '6', 'bumi', '0'),
(7, '7', 'bumi', '0'),
(8, '8', 'bumi', '0'),
(9, '9', 'bumi', '0'),
(10, '10', 'bumi', '0'),
(11, '11', 'mars', '0'),
(12, '12', 'mars', '0'),
(13, '13', 'mars', '0'),
(14, '14', 'mars', '0'),
(15, '15', 'jupiter', '0'),
(16, '16', 'jupiter', '0'),
(17, '17', 'jupiter', '0'),
(18, '18', 'saturnus', '0'),
(19, '19', 'saturnus', '0'),
(20, '20', 'uranus', '0'),
(21, '21', 'uranus', '0'),
(22, '22', 'neptunus', '0'),
(23, '23', 'pluto', '0');

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  `bankmitra` varchar(40) NOT NULL,
  `rekmitra` varchar(50) NOT NULL,
  `namarekmitra` varchar(50) NOT NULL,
  `jambuka` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `propinsi` varchar(20) NOT NULL,
  `nama_mitra` varchar(400) NOT NULL,
  `foto_mitra` varchar(400) NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `latmitra` varchar(400) NOT NULL,
  `lngmitra` varchar(400) NOT NULL,
  `nomorhp` varchar(40) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `mitra_email` varchar(300) NOT NULL,
  `mitra_pass` varchar(100) NOT NULL,
  `dokumen` varchar(400) NOT NULL,
  `sebagai` varchar(100) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `suspen` int(11) NOT NULL,
  `idunik` varchar(200) NOT NULL,
  `kodearea` varchar(80) NOT NULL,
  `nourut` varchar(50) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `departement` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `saldo`, `bankmitra`, `rekmitra`, `namarekmitra`, `jambuka`, `alamat`, `kecamatan`, `kota`, `propinsi`, `nama_mitra`, `foto_mitra`, `kelamin`, `latmitra`, `lngmitra`, `nomorhp`, `no_ktp`, `mitra_email`, `mitra_pass`, `dokumen`, `sebagai`, `tanggal`, `suspen`, `idunik`, `kodearea`, `nourut`, `jabatan`, `departement`, `title`) VALUES
(1, 0, '', '', '', '', 'Ruko Dwijaya Plaza Blok H, Jl. Dwijaya Raya No.1', 'Kebayoran Baru', 'Jakarta Selatan', 'Jakarta Selatan', 'Admin', 'WhatsApp Image 2021-08-19 at 11.48.06 AM.jpeg', 'man', '', '', '', '35101900129889004', 'admin@barisandata.com', '0192023a7bbd73250516f069df18b500', '', 'Admin', '19-08-2021 06:51:05', 0, '', '', '', 'Admin', 'Board management', ''),
(68, 0, '', '', '', '', 'Jl. Ajudan Jendrals', 'Sukasari', 'Bandung', 'Bandung', 'Bayu saputro', 'logo.png', '', '', '', '0822223232323', '35101900129889004', 'tesadmin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', 'Admin', '14-09-2019 10:19:02', 1, '', '', '', '', 'Board management', 'H'),
(69, 0, 'BNI', '4100299290', '', '09:00 sd 19:00', 'Jl. jendral sudirman 54', 'Sukasari', 'Bandung', 'Jawa Barat', 'testing', 'logo.png', 'man', '-7.136914300000001', '112.6178205', '087761340982', '35101900129889004', 'tes@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0', 'Admin', '07-11-2018 01:58:17', 0, 'JKT-09', '', '', 'Dirut Pemasaran', 'Board management', ''),
(74, 900000, 'BCA', '093239239', '', '', 'Jl. Kapten patimura', 'Jagir', 'Surabaya', 'Jawa timur', 'Panji saputro', 'logo.png', 'man', '-1.943318', '113.287041', '08339299999', '21023939399', 'panji@gmail.com', '0192023a7bbd73250516f069df18b500', '0', 'superadmin', '10-11-2018 02:13:14', 0, '443KJ', 'JKT', '02', '', 'Investment', 'H.'),
(75, 0, '', '', '', '', 'Mamuju', 'Mamuju', 'Mamuju', 'Sulawesi utara', 'Kepala Cabang Mamuju', 'logo.png', 'man', '-1.943318', '113.287041', '089898', '65656456', 'mamuju@trolsulawesi.com', '81dc9bdb52d04dc20036dbd8313ed055', 'mitra5.PNG', 'Admin', '10-09-2019 11:21:24', 0, '', '', '', 'Kepala Cabang', 'Board management', ''),
(76, 0, '', '', '', '', 'Kendari', 'Kendari', 'Kendari', 'Suawesi tenggara', 'Kepala Cabang Kendari', 'logo.png', 'man', '-1.943318', '113.287041', '0853454', '9999', 'kendari@trolsulawesi.com', '81dc9bdb52d04dc20036dbd8313ed055', 'mitra8.PNG', 'Admin', '10-09-2019 11:28:11', 0, '445fdsgfg ', '', '', 'Kepala Cabang Kendari', 'Board management', ''),
(77, 0, '', '', '', '', 'Makassar', 'makassar', 'makassar', 'makassar', 'Kepala Cabang Makassar', 'logo.png', 'man', '-1.943318', '113.287041', '093409', '8993844', 'makassar@trolsulawesi.com', '81dc9bdb52d04dc20036dbd8313ed055', 'mitra5.PNG', 'Admin', '10-09-2019 11:30:05', 0, '2434 ', '', '', 'Kepala Cabang Makassar', 'Board management', '');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `idnews` int(11) NOT NULL,
  `namanews` varchar(200) NOT NULL,
  `gbrnews` varchar(500) NOT NULL,
  `deskripsinews` varchar(500) NOT NULL,
  `url` varchar(250) NOT NULL,
  `idpilihan` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`idnews`, `namanews`, `gbrnews`, `deskripsinews`, `url`, `idpilihan`) VALUES
(11, 'Menu paling laris UKM Minuman', 'stand.jpg', 'Bisnis UKM minuman menjadi trend pada tahun 2014 hingga 2017. Tetapi tahukah apa saja menu favorit yang sering dibeli customer? berikut ini artikel selengkapnya', 'https://kompas.com', ''),
(12, 'Aplikasi terpopuler jasa ekspedisi', 'kargo.jpg', 'Ada berbagai brand jasa ekspedisi yang menawarkan harga pengiriman termurah. Apa saja berikut informasi selengkapnya', 'http://viva.co.id', ''),
(13, 'Universitas Online terbuka negeri', 'mahasiswa.jpg', 'tahun 2019 terdapat 10 universitas online terbuka. metode belajarnya seperti ini', 'http://viva.co.id', '');

-- --------------------------------------------------------

--
-- Table structure for table `panic`
--

CREATE TABLE `panic` (
  `idpanic` int(11) NOT NULL,
  `id_trans` varchar(10) NOT NULL,
  `id_mitra` varchar(10) NOT NULL,
  `id_users` varchar(10) NOT NULL,
  `statuspanic` varchar(20) NOT NULL,
  `tglpanic` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pm`
--

CREATE TABLE `pm` (
  `id` bigint(20) NOT NULL,
  `id2` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `user1` bigint(20) NOT NULL,
  `user2` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `timestamp` int(11) NOT NULL,
  `user1read` varchar(3) NOT NULL,
  `user2read` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pm`
--

INSERT INTO `pm` (`id`, `id2`, `title`, `user1`, `user2`, `message`, `timestamp`, `user1read`, `user2read`) VALUES
(1, 1, 'Diskusi Law', 10, 17, 'selamat siang pak kuncoro,<br />\r\nbagaimana pendapat anda mengenai diskusi hukum pada acara tv one dengan topik wajah hukum diindonesia tadi malam', 1550456626, 'yes', 'yes'),
(2, 1, 'Diskusi IT', 10, 15, 'Selamat siang pak, saya ingin menanyakan paket server terbaik diindonesia dengan harga terjangkau kira kira di perusahaan apa', 1550456770, 'yes', 'yes'),
(3, 1, 'Tanya project IT', 10, 12, 'pakjim, saya ingin mengkonsultasikan budget untuk salah satu project IT saya, berkaitan dengan infrastruktur perusahaan', 1550457069, 'yes', 'no'),
(1, 2, '', 17, 10, 'iya betul pakjim', 1550806816, 'yes', 'yes'),
(2, 3, 'voice', 10, 10, '220219084654.wav', 1550825214, '', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `idpromo` int(11) NOT NULL,
  `kodepromo` varchar(30) NOT NULL,
  `diskonpersen` varchar(10) NOT NULL,
  `namapromo` varchar(100) NOT NULL,
  `deskripsipromo` varchar(400) NOT NULL,
  `picture` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`idpromo`, `kodepromo`, `diskonpersen`, `namapromo`, `deskripsipromo`, `picture`) VALUES
(13, '<br /><b>Notice</b>:  Undefine', '1', '<br /><b>Notice</b>:  Undefined variable: namapromo in <b>/home/viswatechnologys/vcare_viswatechnolo', 'Dasdsd', 'post.png');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `art_id` int(11) NOT NULL,
  `total_votes` int(11) NOT NULL,
  `total_points` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `art_id`, `total_votes`, `total_points`) VALUES
(5, 10, 0, 0),
(6, 17, 12, 49),
(7, 21, 5, 17),
(8, 26, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `requestdata`
--

CREATE TABLE `requestdata` (
  `idrequest` int(11) NOT NULL,
  `id_users` varchar(20) NOT NULL,
  `materipendidikan` varchar(600) NOT NULL,
  `deskripsikan` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `retur`
--

CREATE TABLE `retur` (
  `idretur` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `totalharga` int(11) NOT NULL,
  `idtrans` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

CREATE TABLE `sensor` (
  `id_sensor` int(11) NOT NULL,
  `nama_sensor` varchar(200) NOT NULL,
  `latsensor` varchar(50) NOT NULL,
  `lngsensor` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`id_sensor`, `nama_sensor`, `latsensor`, `lngsensor`) VALUES
(63, 'Melbourne Brimbank', '-37.748970', '144.803058'),
(64, 'Melbourne Victoria', '-37.720733', '145.072224'),
(59, 'Potrero de los Funes', '-33.2227183', '-66.2482423'),
(65, 'Melbourne Dandenong', '-38.015610', '145.154621'),
(62, 'Nairobi', '-1.28352,36.82379', '-1.28352,36.82379'),
(57, 'Lima', '-12.0431805', '-77.0282364'),
(66, 'Melbourne Merricknorth', '-38.352396', '145.061237'),
(67, 'Sydney Praja', '-33.907215', '151.077505'),
(68, 'Sydney Castle hill', '-33.744074', '151.014333'),
(69, 'Jakarta Ps.Senen', '-6.196280', '106.851478'),
(70, 'Surabaya -  Gubeng', '-7.274933', '112.751133'),
(71, 'Hongkong', '22.422321', '114.138639'),
(72, 'Russia Federal', '56.598301', '60.647300'),
(73, 'India Gate', '28.613807', '77.230014'),
(74, 'Uni emirat Arab', '25.199745', '55.273175'),
(75, 'California US', '34.838477', '-118.261990'),
(76, 'UK', '53.255958', '-1.826562'),
(77, 'Amsterdam', '52.339311', '5.775977');

-- --------------------------------------------------------

--
-- Table structure for table `smartpustaka`
--

CREATE TABLE `smartpustaka` (
  `idsmartpustaka` int(11) NOT NULL,
  `judulsmartpustaka` varchar(100) NOT NULL,
  `tahunsmartpustaka` varchar(15) NOT NULL,
  `penulissmartpustaka` varchar(60) NOT NULL,
  `penerbitsmartpustaka` varchar(60) NOT NULL,
  `shortsmartpustaka` varchar(2000) NOT NULL,
  `urlsmartpustaka` varchar(100) NOT NULL,
  `point` varchar(50) NOT NULL,
  `idkategori` varchar(30) NOT NULL,
  `edisibuku` varchar(300) NOT NULL,
  `halamanbuku` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smartpustaka`
--

INSERT INTO `smartpustaka` (`idsmartpustaka`, `judulsmartpustaka`, `tahunsmartpustaka`, `penulissmartpustaka`, `penerbitsmartpustaka`, `shortsmartpustaka`, `urlsmartpustaka`, `point`, `idkategori`, `edisibuku`, `halamanbuku`) VALUES
(1, 'Pengantar Manajemen', '2019', 'Amirullah', 'Gramedia Pustaka', 'Konsep-konsep manajemen terbaru dengan segala konsekuensinya menjadikan ilmu manajemen dipandang masih relevan untuk mengatasi persoalan organisasi. Dalam edisi ini.', 'https://gramedia.com', '1', '24', '1', '133'),
(2, 'Trik Kilat Kuasai Bahasa Inggris untuk Pariwisata dan Perhotelan', '2019', 'Setiawan Agung Pamungkas', 'Gramedia Pustaka', 'Dewasa ini perkembangan bisnis pariwisata mengalami peningkatan yang sangat signifikan, gencarnya promosi yang dilakukan oleh dinas pariwisata memang berdampak positif', 'https://gramedia.com', '1', '29', '1', '120'),
(3, 'Kamus Istilah Pariwisata Dan Perhotelan', '2019', 'Adi Soenarno', 'Gramedia Pustaka', 'Kamus dan kosa kata yang sering digunakan oleh wisatawan ketika liburan di spot wisata', 'https://gramedia.com', '1', '29', '1', '110'),
(4, 'Accounting Principles Prinsip-Prinsip Akuntansi Berbasis Sak Etap E', '2019', 'Rizal Effendi', 'Gramedia Pustaka', 'ACCOUNTING PRINCIPLES Prinsip-prinsip Akuntansi Berbasis SAK ETAP EDISI REVISI Buku yang sederhana ini menyajikan tentang cara pengidentifikasian transaksi, proses pencatatan transaksi (penjurnalan), pengklasifikasian, pengikhtisaran dan penyusunan Laporan Keuangan, baik untuk perusahaan JASA, DAGANG maupun INDUSTRI. ', 'https://gramedia.com', '1', '26', '1', '110'),
(5, 'The Value Investors (2019)', '2019', 'Ronald W. Chan', 'Gramedia Pustaka', 'APRESIASI UNTUK THE VALUE INVESTORS: “Buku Ronald Chan memuat dua subjek favorit saya –investasi dan biografi. Melihat kedua hal ini dikombinasikan dalam format yang sedemikian mengalir sungguh sangat nikmat.', 'https://gramedia.com', '1', '26', '1', '250'),
(6, 'Pengantar Manajemen 2', '2019', 'Amirullah', 'Gramedia Pustaka', 'tes tes tes', 'https://gramedia.com', '1', '24', '1', '430');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `idsurvey` int(11) NOT NULL,
  `judulsurvey` varchar(100) NOT NULL,
  `tahunsurvey` varchar(15) NOT NULL,
  `targetkoresponden` varchar(60) NOT NULL,
  `jumlahkoresponden` varchar(60) NOT NULL,
  `tujuansurvey` varchar(2000) NOT NULL,
  `urlsurvey` varchar(1600) NOT NULL,
  `point` varchar(50) NOT NULL,
  `idkategori` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`idsurvey`, `judulsurvey`, `tahunsurvey`, `targetkoresponden`, `jumlahkoresponden`, `tujuansurvey`, `urlsurvey`, `point`, `idkategori`) VALUES
(1, 'Hotel favorit milenial', '2019', 'Milenial', '100', 'Survey ini ditunjukan untuk user usia yang masuk kategori generasi milenial. Dalam rangka membangun infrastruktur yang nyaman untuk milenial serta bermanfaat dari segi fungsi dan digemari oleh wisatawan milenial', 'https://docs.google.com/forms/d/e/1FAIpQLSeTnjwpKVijOyOenrL0gZI9211C_lk2yI3Xdiyhrwy0fgb_kg/viewform?usp=sf_link', '1', '74'),
(3, 'Spot wisata terbaik untuk milenial', '2019', 'Milenial', '100', 'Survey ini bertujuan untuk mengenal destinasi wisata yang paling diminati oleh generasi milenial. Output yang diharapkan adalah pemerintah dapat mempertimbangkan untuk mendukung spot wisata yang paling diminati', 'https://docs.google.com/forms/d/e/1FAIpQLScu3L3anb_-PyFpH5MzdyKdDvVPWtFezqF3G3awJpxOBRV64A/viewform?usp=sf_link', '1', '74');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id_tarif` int(11) NOT NULL,
  `transportasi` int(11) NOT NULL,
  `makanan` int(11) NOT NULL,
  `paket` int(11) NOT NULL,
  `transportasimobil` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id_tarif`, `transportasi`, `makanan`, `paket`, `transportasimobil`) VALUES
(1, 3, 2, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `idtracking` int(11) NOT NULL,
  `kodetrans` varchar(100) NOT NULL,
  `ip` varchar(200) NOT NULL,
  `hostname` varchar(300) NOT NULL,
  `city` varchar(200) NOT NULL,
  `region` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `loc` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`idtracking`, `kodetrans`, `ip`, `hostname`, `city`, `region`, `country`, `loc`) VALUES
(1, '56', '139.194.187.164', 'fm-dyn-139-194-187-164.fast.net.id', 'Surabaya', 'East Java', 'ID', '-7.2492,112.7510'),
(2, '47', '139.194.187.164', 'the host', 'Makassar', 'Sulawesi selatan', 'Indonesia', ''),
(3, '51', '139.194.187.164', 'localhost', 'Makassar', '', '', ''),
(4, '52', '139.194.187.164', 'localhost', 'Palu', '', '', ''),
(5, '53', '139.194.187.164', 'localhost', 'Makassar', '', '', ''),
(6, '54', '139.194.187.164', 'localhost', 'Palu', '', '', ''),
(7, '55', '139.194.187.164', 'localhost', 'Ujung pandang', '', '', ''),
(8, '57', '182.1.188.52', '', '', '', 'ID', '-6.1750,106.8290'),
(9, '57', '182.1.188.52', '', '', '', 'ID', '-6.1750,106.8290'),
(10, '62', '36.79.158.135', '', 'Karanganyar', 'Central Java', 'ID', '-7.2939,109.5770'),
(11, '63', '114.125.214.120', '', 'Samarinda', 'East Kalimantan', 'ID', '-0.4917,117.1460'),
(12, '65', '114.125.214.120', '', 'Samarinda', 'East Kalimantan', 'ID', '-0.4917,117.1460'),
(13, '65', '114.125.214.120', '', 'Samarinda', 'East Kalimantan', 'ID', '-0.4917,117.1460'),
(14, '66', '114.125.214.120', '', 'Samarinda', 'East Kalimantan', 'ID', '-0.4917,117.1460'),
(15, '66', '114.125.214.120', '', 'Samarinda', 'East Kalimantan', 'ID', '-0.4917,117.1460'),
(16, '67', '139.194.187.164', 'fm-dyn-139-194-187-164.fast.net.id', 'Surabaya', 'East Java', 'ID', '-7.2492,112.7510'),
(17, '87', '36.79.158.135', '', 'Karanganyar', 'Central Java', 'ID', '-7.2939,109.5770'),
(18, '88', '36.79.158.135', '', 'Karanganyar', 'Central Java', 'ID', '-7.2939,109.5770'),
(19, '88', '36.79.158.135', '', 'Karanganyar', 'Central Java', 'ID', '-7.2939,109.5770'),
(20, '90', '36.79.158.135', '', 'Karanganyar', 'Central Java', 'ID', '-7.2939,109.5770'),
(21, '90', '36.79.158.135', '', 'Karanganyar', 'Central Java', 'ID', '-7.2939,109.5770'),
(22, '91', '36.79.158.135', '', 'Karanganyar', 'Central Java', 'ID', '-7.2939,109.5770'),
(23, '91', '36.79.158.135', '', 'Karanganyar', 'Central Java', 'ID', '-7.2939,109.5770'),
(24, '', '36.79.158.135', '', 'Karanganyar', 'Central Java', 'ID', '-7.2939,109.5770'),
(25, '', '36.79.158.135', '', 'Karanganyar', 'Central Java', 'ID', '-7.2939,109.5770'),
(26, '', '36.79.158.135', '', 'Karanganyar', 'Central Java', 'ID', '-7.2939,109.5770'),
(27, '91', '36.79.158.135', '', 'Karanganyar', 'Central Java', 'ID', '-7.2939,109.5770'),
(28, '91', '36.79.158.135', '', 'Karanganyar', 'Central Java', 'ID', '-7.2939,109.5770'),
(29, '93', '114.125.184.212', '', 'Makassar', 'South Sulawesi', 'ID', '-5.1486,119.4320'),
(30, '93', '114.125.184.212', '', 'Makassar', 'South Sulawesi', 'ID', '-5.1486,119.4320'),
(31, '93', '114.125.184.212', '', 'Makassar', 'South Sulawesi', 'ID', '-5.1486,119.4320'),
(32, '113', '36.75.143.195', '', 'Gorontalo', 'Gorontalo', 'ID', '0.5375,123.0620'),
(33, '115', '36.75.143.195', '', 'Gorontalo', 'Gorontalo', 'ID', '0.5375,123.0620'),
(34, '117', '36.75.143.243', '', 'Gorontalo', 'Gorontalo', 'ID', '0.5375,123.0620'),
(35, '117', '36.75.143.243', '', 'Gorontalo', 'Gorontalo', 'ID', '0.5375,123.0620'),
(36, '120', '180.246.248.241', '', 'Surabaya', 'East Java', 'ID', '-7.2492,112.7510'),
(37, '121', '36.82.100.210', '', 'Surabaya', 'East Java', 'ID', '-7.2492,112.7510');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_trans` int(11) NOT NULL,
  `tanggal` varchar(50) DEFAULT NULL,
  `id_users` varchar(20) DEFAULT NULL,
  `id_mitra` varchar(10) DEFAULT NULL,
  `nama_voucher` varchar(300) DEFAULT NULL,
  `kode_trans` varchar(150) DEFAULT NULL,
  `lat` varchar(40) DEFAULT NULL,
  `lng` varchar(40) DEFAULT NULL,
  `timepicker1` varchar(20) DEFAULT NULL,
  `harga` varchar(40) DEFAULT NULL,
  `status_trans` varchar(10) DEFAULT NULL,
  `aktif` varchar(5) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `status_bayar` varchar(200) DEFAULT NULL,
  `online` varchar(15) DEFAULT NULL,
  `layanan` varchar(50) DEFAULT NULL,
  `tipebayar` varchar(50) DEFAULT NULL,
  `timestart` varchar(100) DEFAULT NULL,
  `timeend` varchar(100) DEFAULT NULL,
  `latfrom` varchar(300) DEFAULT NULL,
  `lngfrom` varchar(300) DEFAULT NULL,
  `tipe` varchar(60) DEFAULT NULL,
  `jarak` varchar(100) DEFAULT NULL,
  `tarifdasar` varchar(100) DEFAULT NULL,
  `beritaacara` varchar(100) DEFAULT NULL,
  `alamat` varchar(400) DEFAULT NULL,
  `tujuan` varchar(400) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_trans`, `tanggal`, `id_users`, `id_mitra`, `nama_voucher`, `kode_trans`, `lat`, `lng`, `timepicker1`, `harga`, `status_trans`, `aktif`, `phone`, `status_bayar`, `online`, `layanan`, `tipebayar`, `timestart`, `timeend`, `latfrom`, `lngfrom`, `tipe`, `jarak`, `tarifdasar`, `beritaacara`, `alamat`, `tujuan`) VALUES
(43, '2020-02-24 02:35:07', '184', '0', '', 'IU3F6S4R', '-6.4085961', '106.7647475', '', '171', 'minta', 'yes', '6285712921945', 'belum', 'unread', 'passengers', '', '', '', '-6.223894', '107.077768', 'motorcycle', '57', '3', '', 'Lestari Computer, Sumberjaya, Bekasi, Jawa Barat, Indonesia', 'Kec. Sawangan, Kota Depok, Jawa Barat, Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `trans_sopir`
--

CREATE TABLE `trans_sopir` (
  `idsaldo` int(11) NOT NULL,
  `idsopir` varchar(20) NOT NULL,
  `tipesaldo` varchar(20) NOT NULL,
  `jumlahsaldo` varchar(50) NOT NULL,
  `statussaldo` varchar(10) NOT NULL,
  `tgl_request` varchar(30) NOT NULL,
  `banksaldo` varchar(20) NOT NULL,
  `namauser` varchar(100) NOT NULL,
  `nomorrek` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_sopir`
--

INSERT INTO `trans_sopir` (`idsaldo`, `idsopir`, `tipesaldo`, `jumlahsaldo`, `statussaldo`, `tgl_request`, `banksaldo`, `namauser`, `nomorrek`) VALUES
(40, '17', 'topup', '25000', 'finish', '26-03-2019', 'BNI', 'IRFAN BAEIR M Si', '90012949466'),
(39, '22', 'topup', '100000', 'finish', '24-03-2019', 'BRI', 'pakim', '101902929'),
(51, '157', 'topup', '1', 'finish', '31-01-2020', 'CommonWealth Bank', 'hjhj hjhj', '787878787'),
(48, '17', 'topup', '500', 'finish', '19-09-2019', 'ANZ', 'kuncoro', '77876876876'),
(49, '93', 'topup', '1000', 'finish', '29-09-2019', 'ANZ', '111', '111');

-- --------------------------------------------------------

--
-- Table structure for table `trans_user`
--

CREATE TABLE `trans_user` (
  `idsaldo` int(11) NOT NULL,
  `id_users` varchar(20) NOT NULL,
  `tipesaldo` varchar(20) NOT NULL,
  `jumlahsaldo` varchar(50) NOT NULL,
  `statussaldo` varchar(10) NOT NULL,
  `tgl_request` varchar(30) NOT NULL,
  `banksaldo` varchar(20) NOT NULL,
  `namauser` varchar(100) NOT NULL,
  `nomorrek` varchar(25) NOT NULL,
  `id_trans` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_user`
--

INSERT INTO `trans_user` (`idsaldo`, `id_users`, `tipesaldo`, `jumlahsaldo`, `statussaldo`, `tgl_request`, `banksaldo`, `namauser`, `nomorrek`, `id_trans`) VALUES
(82, '156', 'deposit', '10', 'finish', '25-02-2020', 'ANZ', 'nb', '776', 'saldo'),
(71, '10', 'deposit', '200', 'finish', '19-09-2019', 'ANZ', 'pakjim', '6666889009999', 'saldo'),
(72, '10', 'withdraw', '2000', 'finish', '19-09-2019', 'ANZ', 'pakjim', '9904494949409', 'withdraw'),
(74, '84', 'deposit', '1000000', 'finish', '12-12-2019', 'CommonWealth Bank', 'Asli', '123456', 'saldo'),
(75, '84', 'withdraw', '1000', 'finish', '12-12-2019', 'CommonWealth Bank', 'Asli', '123456', 'withdraw'),
(76, '84', 'withdraw', '1000', 'finish', '12-12-2019', 'CommonWealth Bank', 'Asli', '123456', 'withdraw'),
(77, '84', 'withdraw', '1000', 'finish', '12-12-2019', 'CommonWealth Bank', 'Asli', '123456', 'withdraw'),
(81, '157', 'deposit', '100', 'minta', '14-02-2020', '0', '0', '0', 'saldo'),
(80, '156', 'deposit', '1', 'finish', '31-01-2020', 'CommonWealth Bank', 'fgfgh hhhgh', '6766666666666', 'saldo');

-- --------------------------------------------------------

--
-- Table structure for table `userfb`
--

CREATE TABLE `userfb` (
  `name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `ok` text NOT NULL,
  `feedback` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userfb`
--

INSERT INTO `userfb` (`name`, `email`, `ok`, `feedback`) VALUES
('', '', '', ''),
('Karthikeyan P', 'premaadhvik1998@gmail.com', 'excelent', 'asfdasfasf');

-- --------------------------------------------------------

--
-- Table structure for table `userregistration`
--

CREATE TABLE `userregistration` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `activationcode` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `postingdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userregistration`
--

INSERT INTO `userregistration` (`id`, `name`, `email`, `password`, `activationcode`, `status`, `postingdate`) VALUES
(0, '', 'mmuhisha@gmail.com', '', '', 0, '2021-10-27 05:47:09'),
(0, '', 'mmuhisha@gmail.com', '', '', 0, '2021-10-27 05:47:57'),
(0, '', 'mmuhisha@gmail.com', '', '', 0, '2021-10-27 05:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `modified` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `forgot_pass_identity` varchar(664) COLLATE utf8_unicode_ci DEFAULT NULL,
  `saldo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pembelian` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `noktp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tempatlahir` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tgllahir` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kelamin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `agama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alamat1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kota` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `provinsi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pendidikan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `profesi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jabatan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pendapatan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `statusnikah` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `kunci` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pengalaman` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `almamater` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ahlibidang` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `sebagai` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `online` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lng` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `jenistransportasi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pincode` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `service` int(11) NOT NULL DEFAULT 0,
  `pdf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isOpen` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `Service_name` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `Service_location` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `tech_id` int(11) NOT NULL DEFAULT -1,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `picture`, `link`, `created`, `modified`, `email`, `password`, `forgot_pass_identity`, `saldo`, `pembelian`, `noktp`, `tempatlahir`, `tgllahir`, `kelamin`, `agama`, `alamat1`, `kota`, `provinsi`, `pendidikan`, `profesi`, `jabatan`, `pendapatan`, `statusnikah`, `phone`, `kunci`, `pengalaman`, `almamater`, `ahlibidang`, `sebagai`, `online`, `lat`, `lng`, `jenistransportasi`, `address`, `city`, `state`, `pincode`, `service`, `pdf`, `isOpen`, `Service_name`, `Service_location`, `tech_id`, `status`) VALUES
(339, '', '', 'fghfgh', 'gfhfgh', '637960.jpg', '', '2019-02-01 00:00:00', '2019-02-08 00:00:00', 'fgf@dgf.gh', '25d55ad283aa400af464c76d713c07ad', '', '0', '0', '4545456', 'gfhfgh', '4454-05-26', 'male', 'Islam', 'gfhfgh', 'ghgfh', '454545', 'dfffdf', '', 'gfhfgh', '', '', '4545454545', '0', 'dfdf', 'dfdf', 'gfhfgh', 'driver', 'online', '', '', '', '', '', '', '', 0, '', 'no', '', '', -1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `verifikasijob`
--

CREATE TABLE `verifikasijob` (
  `idverifikasi` int(11) NOT NULL,
  `id_mitra` varchar(10) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `file_sertifikasi` varchar(500) NOT NULL,
  `opsional` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verifikasijob`
--

INSERT INTO `verifikasijob` (`idverifikasi`, `id_mitra`, `id_layanan`, `file_sertifikasi`, `opsional`) VALUES
(10, '17', 45, 'unrated.jpg', '1'),
(79, '55', 63, '', '1'),
(24, '65', 67, 'IMG20190524143951.jpg', '1'),
(76, '72', 45, '', '1'),
(27, '66', 46, '', '1'),
(43, '71', 46, 'cv revisi-2.docx', '1'),
(78, '74', 61, '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `idvoucher` int(11) NOT NULL,
  `namavoucher` varchar(300) NOT NULL,
  `hargavoucher` varchar(20) NOT NULL,
  `pointvoucher` varchar(20) NOT NULL,
  `durasivoucher` varchar(100) NOT NULL,
  `counter` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`idvoucher`, `namavoucher`, `hargavoucher`, `pointvoucher`, `durasivoucher`, `counter`) VALUES
(1, 'Trol dekat', '20000', 'transportasi', '30', ''),
(2, 'Trol siap', '50000', 'transportasi', '90', ''),
(3, 'Trol aman', '110000', 'transportasi', '180', ''),
(4, 'Makan snack', '100000', 'food', '1', '1'),
(5, 'Makan puas', '250000', 'food', '1', '3'),
(6, 'Makan kenyang', '250000', 'food', '1', '3'),
(7, 'Makan super', '450000', 'food', '1', '6'),
(8, 'Express dekat', '65000', 'ekspedisi', '1', '50'),
(9, 'Express siap', '100000', 'ekspedisi', '1', '100'),
(10, 'Ekspress pro', '150000', 'ekspedisi', '1', '100'),
(11, 'Ekspress cepat', '250000', 'ekspedisi', '1', '200');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indexes for table `bebanbiaya`
--
ALTER TABLE `bebanbiaya`
  ADD PRIMARY KEY (`idbeban`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `driverfb`
--
ALTER TABLE `driverfb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`idevent`);

--
-- Indexes for table `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`idgalery`);

--
-- Indexes for table `imagestore`
--
ALTER TABLE `imagestore`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infobank`
--
ALTER TABLE `infobank`
  ADD PRIMARY KEY (`idinfo`);

--
-- Indexes for table `jadwal_ads`
--
ALTER TABLE `jadwal_ads`
  ADD PRIMARY KEY (`idjadwal`);

--
-- Indexes for table `jw_menu`
--
ALTER TABLE `jw_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `jw_menu_detail`
--
ALTER TABLE `jw_menu_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jw_menu_kordinat`
--
ALTER TABLE `jw_menu_kordinat`
  ADD PRIMARY KEY (`idjw`);

--
-- Indexes for table `jw_product`
--
ALTER TABLE `jw_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `jw_product1`
--
ALTER TABLE `jw_product1`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `jw_product_detail`
--
ALTER TABLE `jw_product_detail`
  ADD PRIMARY KEY (`product_detail_id`);

--
-- Indexes for table `kategoripustaka`
--
ALTER TABLE `kategoripustaka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`idcatalog`);

--
-- Indexes for table `kodearea`
--
ALTER TABLE `kodearea`
  ADD PRIMARY KEY (`idkodearea`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `liburnasional`
--
ALTER TABLE `liburnasional`
  ADD PRIMARY KEY (`id_liburan`);

--
-- Indexes for table `limithutang`
--
ALTER TABLE `limithutang`
  ADD PRIMARY KEY (`idlimit`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`idmeja`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`idnews`);

--
-- Indexes for table `panic`
--
ALTER TABLE `panic`
  ADD PRIMARY KEY (`idpanic`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`idpromo`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestdata`
--
ALTER TABLE `requestdata`
  ADD PRIMARY KEY (`idrequest`);

--
-- Indexes for table `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`idretur`);

--
-- Indexes for table `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`id_sensor`);

--
-- Indexes for table `smartpustaka`
--
ALTER TABLE `smartpustaka`
  ADD PRIMARY KEY (`idsmartpustaka`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`idsurvey`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`idtracking`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_trans`);

--
-- Indexes for table `trans_sopir`
--
ALTER TABLE `trans_sopir`
  ADD PRIMARY KEY (`idsaldo`);

--
-- Indexes for table `trans_user`
--
ALTER TABLE `trans_user`
  ADD PRIMARY KEY (`idsaldo`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verifikasijob`
--
ALTER TABLE `verifikasijob`
  ADD PRIMARY KEY (`idverifikasi`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`idvoucher`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id_alamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `bebanbiaya`
--
ALTER TABLE `bebanbiaya`
  MODIFY `idbeban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `driverfb`
--
ALTER TABLE `driverfb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `idevent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `galery`
--
ALTER TABLE `galery`
  MODIFY `idgalery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `imagestore`
--
ALTER TABLE `imagestore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `infobank`
--
ALTER TABLE `infobank`
  MODIFY `idinfo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jadwal_ads`
--
ALTER TABLE `jadwal_ads`
  MODIFY `idjadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jw_menu`
--
ALTER TABLE `jw_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jw_menu_detail`
--
ALTER TABLE `jw_menu_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `jw_menu_kordinat`
--
ALTER TABLE `jw_menu_kordinat`
  MODIFY `idjw` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jw_product`
--
ALTER TABLE `jw_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `jw_product1`
--
ALTER TABLE `jw_product1`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `kategoripustaka`
--
ALTER TABLE `kategoripustaka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `kodearea`
--
ALTER TABLE `kodearea`
  MODIFY `idkodearea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `liburnasional`
--
ALTER TABLE `liburnasional`
  MODIFY `id_liburan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id_mitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `idnews` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `panic`
--
ALTER TABLE `panic`
  MODIFY `idpanic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `idpromo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `requestdata`
--
ALTER TABLE `requestdata`
  MODIFY `idrequest` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sensor`
--
ALTER TABLE `sensor`
  MODIFY `id_sensor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `smartpustaka`
--
ALTER TABLE `smartpustaka`
  MODIFY `idsmartpustaka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `idsurvey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `idtracking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `trans_sopir`
--
ALTER TABLE `trans_sopir`
  MODIFY `idsaldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `trans_user`
--
ALTER TABLE `trans_user`
  MODIFY `idsaldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=340;

--
-- AUTO_INCREMENT for table `verifikasijob`
--
ALTER TABLE `verifikasijob`
  MODIFY `idverifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `idvoucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
