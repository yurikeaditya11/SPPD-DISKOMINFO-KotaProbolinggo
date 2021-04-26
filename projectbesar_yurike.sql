-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 10:13 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectbesar_yurike`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `username_admin` varchar(255) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `password_admin` varchar(255) NOT NULL,
  `foto_admin` varchar(255) NOT NULL,
  `level_admin` enum('admin','master') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username_admin`, `email_admin`, `password_admin`, `foto_admin`, `level_admin`) VALUES
(4, 'master', 'master', 'master@gmail.com', 'eb0a191797624dd3a48fa681d3061212', '', 'master'),
(5, 'admin', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nip_karyawan` varchar(255) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `pangkat_karyawan` varchar(255) NOT NULL,
  `gol_karyawan` varchar(255) NOT NULL,
  `jabatan_karyawan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nip_karyawan`, `nama_karyawan`, `pangkat_karyawan`, `gol_karyawan`, `jabatan_karyawan`) VALUES
(41, '1841160034 024', 'Yurike Aditya Eka Putri', 'Kepala Dinas', 'IV-C', 'Kepala Dinas Komunikasi Dan Informasi'),
(42, '1841160055 004', 'Annisa Alma Sofianti', 'Penata Tk.I ', 'III-A', 'Kasubag Keuangan'),
(43, '1841160054 006', 'Defandi Dwi Darmawan', 'Pengatur', 'II-C', 'Verifikatur Keuangan');

-- --------------------------------------------------------

--
-- Table structure for table `kekurangan`
--

CREATE TABLE `kekurangan` (
  `id_kekurangan` int(11) NOT NULL,
  `no_surat` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kekurangan`
--

INSERT INTO `kekurangan` (`id_kekurangan`, `no_surat`, `keterangan`) VALUES
(4, 'R/01/KP.01/VI/2020', '<p>Biaya Transport</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(5) NOT NULL,
  `nama_kota` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`) VALUES
(1, 'CILEGON'),
(2, 'LEBAK'),
(3, 'PANDEGLANG'),
(4, 'SERANG'),
(5, 'TANGERANG'),
(6, 'TANGERANG SELATAN'),
(7, 'JAKARTA BARAT'),
(8, 'JAKARTA PUSAT'),
(9, 'JAKARTA SELATAN'),
(10, 'JAKARTA TIMUR'),
(11, 'JAKARTA UTARA'),
(12, 'KEPULAUAN SERIBU'),
(13, 'BANDUNG'),
(14, 'BANDUNG BARAT'),
(15, 'BANJAR'),
(16, 'BEKASI'),
(17, 'BOGOR'),
(18, 'CIAMIS'),
(19, 'CIANJUR'),
(20, 'CIMAHI'),
(21, 'CIREBON'),
(22, 'DEPOK'),
(23, 'GARUT'),
(24, 'INDRAMAYU'),
(25, 'KARAWANG'),
(26, 'KUNINGAN'),
(27, 'MAJALENGKA'),
(28, 'PANGANDARAN'),
(29, 'PURWAKARTA'),
(30, 'SUBANG'),
(31, 'SUKABUMI'),
(32, 'SUMEDANG'),
(33, 'TASIKMALAYA'),
(34, 'BANJARNEGARA'),
(35, 'BANYUMAS'),
(36, 'BATANG'),
(37, 'BLORA'),
(38, 'BOYOLALI'),
(39, 'BREBES'),
(40, 'CILACAP'),
(41, 'DEMAK'),
(42, 'GROBOGAN'),
(43, 'JEPARA'),
(44, 'KARANGANYAR'),
(45, 'KEBUMEN'),
(46, 'KENDAL'),
(47, 'KLATEN'),
(48, 'KUDUS'),
(49, 'MAGELANG'),
(50, 'PATI'),
(51, 'PEKALONGAN'),
(52, 'PEMALANG'),
(53, 'PURBALINGGA'),
(54, 'PURWOREJO'),
(55, 'REMBANG'),
(56, 'SALATIGA'),
(57, 'SEMARANG'),
(58, 'SRAGEN'),
(59, 'SUKOHARJO'),
(60, 'SURAKARTA (SOLO)'),
(61, 'TEGAL'),
(62, 'TEMANGGUNG'),
(63, 'WONOGIRI'),
(64, 'WONOSOBO'),
(65, 'BANTUL'),
(66, 'GUNUNG KIDUL'),
(67, 'KULON PROGO'),
(68, 'SLEMAN'),
(69, 'YOGYAKARTA'),
(70, 'BANGKALAN'),
(71, 'BANYUWANGI'),
(72, 'BATU'),
(73, 'BLITAR'),
(74, 'BOJONEGORO'),
(75, 'BONDOWOSO'),
(76, 'GRESIK'),
(77, 'JEMBER'),
(78, 'JOMBANG'),
(79, 'KEDIRI'),
(80, 'LAMONGAN'),
(81, 'LUMAJANG'),
(82, 'MADIUN'),
(83, 'MAGETAN'),
(84, 'MALANG'),
(85, 'MOJOKERTO'),
(86, 'NGANJUK'),
(87, 'NGAWI'),
(88, 'PACITAN'),
(89, 'PAMEKASAN'),
(90, 'PASURUAN'),
(91, 'PONOROGO'),
(92, 'PROBOLINGGO'),
(93, 'SAMPANG'),
(94, 'SIDOARJO'),
(95, 'SITUBONDO'),
(96, 'SUMENEP'),
(97, 'SURABAYA'),
(98, 'TRENGGALEK'),
(99, 'TUBAN'),
(100, 'TULUNGAGUNG'),
(101, 'BADUNG'),
(102, 'BANGLI'),
(103, 'BULELENG'),
(104, 'DENPASAR'),
(105, 'GIANYAR'),
(106, 'JEMBRANA'),
(107, 'KARANGASEM'),
(108, 'KLUNGKUNG'),
(109, 'TABANAN'),
(110, 'ACEH BARAT'),
(111, 'ACEH BARAT DAYA'),
(112, 'ACEH BESAR'),
(113, 'ACEH JAYA'),
(114, 'ACEH SELATAN'),
(115, 'ACEH SINGKIL'),
(116, 'ACEH TAMIANG'),
(117, 'ACEH TENGAH'),
(118, 'ACEH TENGGARA'),
(119, 'ACEH TIMUR'),
(120, 'ACEH UTARA'),
(121, 'BANDA ACEH'),
(122, 'BENER MERIAH'),
(123, 'BIREUEN'),
(124, 'GAYO LUES'),
(125, 'LANGSA'),
(126, 'LHOKSEUMAWE'),
(127, 'NAGAN RAYA'),
(128, 'PIDIE'),
(129, 'PIDIE JAYA'),
(130, 'SABANG'),
(131, 'SIMEULUE'),
(132, 'SUBULUSSALAM'),
(133, 'ASAHAN'),
(134, 'BATU BARA'),
(135, 'BINJAI'),
(136, 'DAIRI'),
(137, 'DELI SERDANG'),
(138, 'GUNUNGSITOLI'),
(139, 'HUMBANG HASUNDUTAN'),
(140, 'KARO'),
(141, 'LABUHAN BATU'),
(142, 'LABUHAN BATU SELATAN'),
(143, 'LABUHAN BATU UTARA'),
(144, 'LANGKAT'),
(145, 'MANDAILING NATAL'),
(146, 'MEDAN'),
(147, 'NIAS'),
(148, 'NIAS BARAT'),
(149, 'NIAS SELATAN'),
(150, 'NIAS UTARA'),
(151, 'PADANG LAWAS'),
(152, 'PADANG LAWAS UTARA'),
(153, 'PADANG SIDEMPUAN'),
(154, 'PAKPAK BHARAT'),
(155, 'PEMATANG SIANTAR'),
(156, 'SAMOSIR'),
(157, 'SERDANG BEDAGAI'),
(158, 'SIBOLGA'),
(159, 'SIMALUNGUN'),
(160, 'TANJUNG BALAI'),
(161, 'TAPANULI SELATAN'),
(162, 'TAPANULI TENGAH'),
(163, 'TAPANULI UTARA'),
(164, 'TEBING TINGGI'),
(165, 'TOBA SAMOSIR'),
(166, 'AGAM'),
(167, 'BUKITTINGGI'),
(168, 'DHARMASRAYA'),
(169, 'KEPULAUAN MENTAWAI'),
(170, 'LIMA PULUH KOTO/KOTA'),
(171, 'PADANG'),
(172, 'PADANG PANJANG'),
(173, 'PADANG PARIAMAN'),
(174, 'PARIAMAN'),
(175, 'PASAMAN'),
(176, 'PASAMAN BARAT'),
(177, 'PAYAKUMBUH'),
(178, 'PESISIR SELATAN'),
(179, 'SAWAH LUNTO'),
(180, 'SIJUNJUNG (SAWAH LUNTO SIJUNJUNG)'),
(181, 'SOLOK'),
(182, 'SOLOK SELATAN'),
(183, 'TANAH DATAR'),
(184, 'BENGKALIS'),
(185, 'DUMAI'),
(186, 'INDRAGIRI HILIR'),
(187, 'INDRAGIRI HULU'),
(188, 'KAMPAR'),
(189, 'KEPULAUAN MERANTI'),
(190, 'KUANTAN SINGINGI'),
(191, 'PEKANBARU'),
(192, 'PELALAWAN'),
(193, 'ROKAN HILIR'),
(194, 'ROKAN HULU'),
(195, 'SIAK'),
(196, 'BATAM'),
(197, 'BINTAN'),
(198, 'KARIMUN'),
(199, 'KEPULAUAN ANAMBAS'),
(200, 'LINGGA'),
(201, 'NATUNA'),
(202, 'TANJUNG PINANG'),
(203, 'BATANG HARI'),
(204, 'BUNGO'),
(205, 'JAMBI'),
(206, 'KERINCI'),
(207, 'MERANGIN'),
(208, 'MUARO JAMBI'),
(209, 'SAROLANGUN'),
(210, 'SUNGAIPENUH'),
(211, 'TANJUNG JABUNG BARAT'),
(212, 'TANJUNG JABUNG TIMUR'),
(213, 'TEBO'),
(214, 'BENGKULU'),
(215, 'BENGKULU SELATAN'),
(216, 'BENGKULU TENGAH'),
(217, 'BENGKULU UTARA'),
(218, 'KAUR'),
(219, 'KEPAHIANG'),
(220, 'LEBONG'),
(221, 'MUKO MUKO'),
(222, 'REJANG LEBONG'),
(223, 'SELUMA'),
(224, 'BANYUASIN'),
(225, 'EMPAT LAWANG'),
(226, 'LAHAT'),
(227, 'LUBUK LINGGAU'),
(228, 'MUARA ENIM'),
(229, 'MUSI BANYUASIN'),
(230, 'MUSI RAWAS'),
(231, 'OGAN ILIR'),
(232, 'OGAN KOMERING ILIR'),
(233, 'OGAN KOMERING ULU'),
(234, 'OGAN KOMERING ULU SELATAN'),
(235, 'OGAN KOMERING ULU TIMUR'),
(236, 'PAGAR ALAM'),
(237, 'PALEMBANG'),
(238, 'PRABUMULIH'),
(239, 'BANGKA'),
(240, 'BANGKA BARAT'),
(241, 'BANGKA SELATAN'),
(242, 'BANGKA TENGAH'),
(243, 'BELITUNG'),
(244, 'BELITUNG TIMUR'),
(245, 'PANGKAL PINANG'),
(246, 'BANDAR LAMPUNG'),
(247, 'LAMPUNG BARAT'),
(248, 'LAMPUNG SELATAN'),
(249, 'LAMPUNG TENGAH'),
(250, 'LAMPUNG TIMUR'),
(251, 'LAMPUNG UTARA'),
(252, 'MESUJI'),
(253, 'METRO'),
(254, 'PESAWARAN'),
(255, 'PESISIR BARAT'),
(256, 'PRINGSEWU'),
(257, 'TANGGAMUS'),
(258, 'TULANG BAWANG'),
(259, 'TULANG BAWANG BARAT'),
(260, 'WAY KANAN'),
(261, 'BENGKAYANG'),
(262, 'KAPUAS HULU'),
(263, 'KAYONG UTARA'),
(264, 'KETAPANG'),
(265, 'KUBU RAYA'),
(266, 'LANDAK'),
(267, 'MELAWI'),
(268, 'PONTIANAK'),
(269, 'SAMBAS'),
(270, 'SANGGAU'),
(271, 'SEKADAU'),
(272, 'SINGKAWANG'),
(273, 'SINTANG'),
(274, 'BARITO SELATAN'),
(275, 'BARITO TIMUR'),
(276, 'BARITO UTARA'),
(277, 'GUNUNG MAS'),
(278, 'KAPUAS'),
(279, 'KATINGAN'),
(280, 'KOTAWARINGIN BARAT'),
(281, 'KOTAWARINGIN TIMUR'),
(282, 'LAMANDAU'),
(283, 'MURUNG RAYA'),
(284, 'PALANGKA RAYA'),
(285, 'PULANG PISAU'),
(286, 'SERUYAN'),
(287, 'SUKAMARA'),
(288, 'BALANGAN'),
(289, 'BANJAR'),
(290, 'BANJARBARU'),
(291, 'BANJARMASIN'),
(292, 'BARITO KUALA'),
(293, 'HULU SUNGAI SELATAN'),
(294, 'HULU SUNGAI TENGAH'),
(295, 'HULU SUNGAI UTARA'),
(296, 'KOTABARU'),
(297, 'TABALONG'),
(298, 'TANAH BUMBU'),
(299, 'TANAH LAUT'),
(300, 'TAPIN'),
(301, 'BALIKPAPAN'),
(302, 'BERAU'),
(303, 'BONTANG'),
(304, 'KUTAI BARAT'),
(305, 'KUTAI KARTANEGARA'),
(306, 'KUTAI TIMUR'),
(307, 'PASER'),
(308, 'PENAJAM PASER UTARA'),
(309, 'SAMARINDA'),
(310, 'BULUNGAN (BULONGAN)'),
(311, 'MALINAU'),
(312, 'NUNUKAN'),
(313, 'TANA TIDUNG'),
(314, 'TARAKAN'),
(315, 'MAJENE'),
(316, 'MAMASA'),
(317, 'MAMUJU'),
(318, 'MAMUJU UTARA'),
(319, 'POLEWALI MANDAR'),
(320, 'BANTAENG'),
(321, 'BARRU'),
(322, 'BONE'),
(323, 'BULUKUMBA'),
(324, 'ENREKANG'),
(325, 'GOWA'),
(326, 'JENEPONTO'),
(327, 'LUWU'),
(328, 'LUWU TIMUR'),
(329, 'LUWU UTARA'),
(330, 'MAKASSAR'),
(331, 'MAROS'),
(332, 'PALOPO'),
(333, 'PANGKAJENE KEPULAUAN'),
(334, 'PAREPARE'),
(335, 'PINRANG'),
(336, 'SELAYAR (KEPULAUAN SELAYAR)'),
(337, 'SIDENRENG RAPPANG/RAPANG'),
(338, 'SINJAI'),
(339, 'SOPPENG'),
(340, 'TAKALAR'),
(341, 'TANA TORAJA'),
(342, 'TORAJA UTARA'),
(343, 'WAJO'),
(344, 'BAU-BAU'),
(345, 'BOMBANA'),
(346, 'BUTON'),
(347, 'BUTON UTARA'),
(348, 'KENDARI'),
(349, 'KOLAKA'),
(350, 'KOLAKA UTARA'),
(351, 'KONAWE'),
(352, 'KONAWE SELATAN'),
(353, 'KONAWE UTARA'),
(354, 'MUNA'),
(355, 'WAKATOBI'),
(356, 'BANGGAI'),
(357, 'BANGGAI KEPULAUAN'),
(358, 'BUOL'),
(359, 'DONGGALA'),
(360, 'MOROWALI'),
(361, 'PALU'),
(362, 'PARIGI MOUTONG'),
(363, 'POSO'),
(364, 'SIGI'),
(365, 'TOJO UNA-UNA'),
(366, 'TOLI-TOLI'),
(367, 'BOALEMO'),
(368, 'BONE BOLANGO'),
(369, 'GORONTALO'),
(370, 'GORONTALO UTARA'),
(371, 'POHUWATO'),
(372, 'BITUNG'),
(373, 'BOLAANG MONGONDOW (BOLMONG)'),
(374, 'BOLAANG MONGONDOW SELATAN'),
(375, 'BOLAANG MONGONDOW TIMUR'),
(376, 'BOLAANG MONGONDOW UTARA'),
(377, 'KEPULAUAN SANGIHE'),
(378, 'KEPULAUAN SIAU TAGULANDANG BIARO (SITARO)'),
(379, 'KEPULAUAN TALAUD'),
(380, 'KOTAMOBAGU'),
(381, 'MANADO'),
(382, 'MINAHASA'),
(383, 'MINAHASA SELATAN'),
(384, 'MINAHASA TENGGARA'),
(385, 'MINAHASA UTARA'),
(386, 'TOMOHON'),
(387, 'AMBON'),
(388, 'BURU'),
(389, 'BURU SELATAN'),
(390, 'KEPULAUAN ARU'),
(391, 'MALUKU BARAT DAYA'),
(392, 'MALUKU TENGAH'),
(393, 'MALUKU TENGGARA'),
(394, 'MALUKU TENGGARA BARAT'),
(395, 'SERAM BAGIAN BARAT'),
(396, 'SERAM BAGIAN TIMUR'),
(397, 'TUAL'),
(398, 'HALMAHERA BARAT'),
(399, 'HALMAHERA SELATAN'),
(400, 'HALMAHERA TENGAH'),
(401, 'HALMAHERA TIMUR'),
(402, 'HALMAHERA UTARA'),
(403, 'KEPULAUAN SULA'),
(404, 'PULAU MOROTAI'),
(405, 'TERNATE'),
(406, 'TIDORE KEPULAUAN'),
(407, 'BIMA'),
(408, 'DOMPU'),
(409, 'LOMBOK BARAT'),
(410, 'LOMBOK TENGAH'),
(411, 'LOMBOK TIMUR'),
(412, 'LOMBOK UTARA'),
(413, 'MATARAM'),
(414, 'SUMBAWA'),
(415, 'SUMBAWA BARAT'),
(416, 'ALOR'),
(417, 'BELU'),
(418, 'ENDE'),
(419, 'FLORES TIMUR'),
(420, 'KUPANG'),
(421, 'LEMBATA'),
(422, 'MANGGARAI'),
(423, 'MANGGARAI BARAT'),
(424, 'MANGGARAI TIMUR'),
(425, 'NAGEKEO'),
(426, 'NGADA'),
(427, 'ROTE NDAO'),
(428, 'SABU RAIJUA'),
(429, 'SIKKA'),
(430, 'SUMBA BARAT'),
(431, 'SUMBA BARAT DAYA'),
(432, 'SUMBA TENGAH'),
(433, 'SUMBA TIMUR'),
(434, 'TIMOR TENGAH SELATAN'),
(435, 'TIMOR TENGAH UTARA'),
(436, 'FAKFAK'),
(437, 'KAIMANA'),
(438, 'MANOKWARI'),
(439, 'MANOKWARI SELATAN'),
(440, 'MAYBRAT'),
(441, 'PEGUNUNGAN ARFAK'),
(442, 'RAJA AMPAT'),
(443, 'SORONG'),
(444, 'SORONG SELATAN'),
(445, 'TAMBRAUW'),
(446, 'TELUK BINTUNI'),
(447, 'TELUK WONDAMA'),
(448, 'ASMAT'),
(449, 'BIAK NUMFOR'),
(450, 'BOVEN DIGOEL'),
(451, 'DEIYAI (DELIYAI)'),
(452, 'DOGIYAI'),
(453, 'INTAN JAYA'),
(454, 'JAYAPURA'),
(455, 'JAYAWIJAYA'),
(456, 'KEEROM'),
(457, 'KEPULAUAN YAPEN (YAPEN WAROPEN)'),
(458, 'LANNY JAYA'),
(459, 'MAMBERAMO RAYA'),
(460, 'MAMBERAMO TENGAH'),
(461, 'MAPPI'),
(462, 'MERAUKE'),
(463, 'MIMIKA'),
(464, 'NABIRE'),
(465, 'NDUGA'),
(466, 'PANIAI'),
(467, 'PEGUNUNGAN BINTANG'),
(468, 'PUNCAK'),
(469, 'PUNCAK JAYA'),
(470, 'SARMI'),
(471, 'SUPIORI'),
(472, 'TOLIKARA'),
(473, 'WAROPEN'),
(474, 'YAHUKIMO'),
(475, 'YALIMO');

-- --------------------------------------------------------

--
-- Table structure for table `surat_jalan`
--

CREATE TABLE `surat_jalan` (
  `id_surat` int(11) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `tanggal_pulang` date NOT NULL,
  `jenis_ticket` enum('Kereta','Motor','Mobil','Pesawat') NOT NULL,
  `nomor_ticket` varchar(255) NOT NULL,
  `biaya_akomodasi` varchar(255) NOT NULL,
  `nama_hotel` varchar(255) NOT NULL,
  `nomor_kamar` varchar(255) NOT NULL,
  `harga_permalam` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `admin_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_jalan`
--

INSERT INTO `surat_jalan` (`id_surat`, `nomor_surat`, `nip`, `tujuan`, `tanggal_berangkat`, `tanggal_pulang`, `jenis_ticket`, `nomor_ticket`, `biaya_akomodasi`, `nama_hotel`, `nomor_kamar`, `harga_permalam`, `total`, `admin_id`) VALUES
(1, 'R/01/KP.01/VI/2020', '1841160034 024', '4', '2021-04-14', '2021-04-16', 'Pesawat', '110799', 'Rp. 520.000', 'LavaHotel', '11', 'Rp. 350.000', 'Rp. 1.820.000', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tujuan`
--

CREATE TABLE `tujuan` (
  `id_tujuan` int(11) NOT NULL,
  `nama_tujuan` varchar(255) NOT NULL,
  `tingkat_tujuan` varchar(255) NOT NULL,
  `budget_tujuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tujuan`
--

INSERT INTO `tujuan` (`id_tujuan`, `nama_tujuan`, `tingkat_tujuan`, `budget_tujuan`) VALUES
(1, 'Dalam Propinsi Jawa Timur <= 50 KM', 'IV-C', '352.500'),
(2, 'Dalam Propinsi Jawa Timur < 50', 'IV-C', '705.000'),
(3, 'Luar Propinsi Jawa Timur Dalam Pulau Jawa Banten', 'IV-C', '935.000'),
(4, 'Luar Propinsi Jawa Timur Dalam Pulau Jawa : Jawa Barat', 'IV-C', '950.000'),
(5, 'Luar Propinsi Jawa Timur Dalam Pulau Jawa : DKI Jakarta', 'IV-C', '970.000'),
(6, 'Luar Propinsi Jawa Timur Dalam Pulau Jawa : Jawa Tengah', 'IV-C', '905.000'),
(7, 'Luar Propinsi Jawa Timur Dalam Pulau Jawa : DI Yogyakarta', 'IV-C', '920.000'),
(8, 'Luar Pulau Jawa : Sumatera', 'IV-C', '1.037.000'),
(9, 'Luar Pulau Jawa : Bali dan Nusa Tenggara', 'IV-C', '962.000'),
(10, 'Luar Pulau Jawa : Kalimantan', 'IV-C', '947.000'),
(11, 'Luar Pulau Jawa : Sulawesi', 'IV-C', '973.000'),
(12, 'Luar Pulau Jawa : Indonesia Bagian Timur', 'IV-C', '1.161.000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kekurangan`
--
ALTER TABLE `kekurangan`
  ADD PRIMARY KEY (`id_kekurangan`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tujuan`
--
ALTER TABLE `tujuan`
  ADD PRIMARY KEY (`id_tujuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `kekurangan`
--
ALTER TABLE `kekurangan`
  MODIFY `id_kekurangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=476;

--
-- AUTO_INCREMENT for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `id_tujuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
