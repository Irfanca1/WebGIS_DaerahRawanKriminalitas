-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 22 Jan 2023 pada 11.43
-- Versi server: 5.7.36
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `connections`
--

DROP TABLE IF EXISTS `connections`;
CREATE TABLE IF NOT EXISTS `connections` (
  `c_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `c_resource_id` int(11) NOT NULL,
  `c_user_id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten_kota`
--

DROP TABLE IF EXISTS `kabupaten_kota`;
CREATE TABLE IF NOT EXISTS `kabupaten_kota` (
  `kabupaten_kota_id` int(11) NOT NULL AUTO_INCREMENT,
  `provinsi_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`kabupaten_kota_id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kabupaten_kota`
--

INSERT INTO `kabupaten_kota` (`kabupaten_kota_id`, `provinsi_id`, `nama`) VALUES
(104, 10, 'Kota Bandung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

DROP TABLE IF EXISTS `kecamatan`;
CREATE TABLE IF NOT EXISTS `kecamatan` (
  `kecamatan_id` int(11) NOT NULL,
  `kabupaten_kota_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`kecamatan_id`),
  KEY `kabupaten_kota_id` (`kabupaten_kota_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`kecamatan_id`, `kabupaten_kota_id`, `nama`) VALUES
(1550, 104, 'Andir'),
(1551, 104, 'Antapani(Cicadas)'),
(1552, 104, 'Arcamanik'),
(1553, 104, 'Astana Anyar'),
(1554, 104, 'Babakan Ciparay'),
(1555, 104, 'Bandung Kidul'),
(1556, 104, 'Bandung Kulon'),
(1557, 104, 'Bandung Wetan'),
(1558, 104, 'Batununggal'),
(1559, 104, 'Bojongloa Kaler'),
(1560, 104, 'Bojongloa Kidul'),
(1561, 104, 'Buahbatu (Margacinta)'),
(1562, 104, 'Cibeunying Kaler'),
(1563, 104, 'Cibeunying Kidul'),
(1564, 104, 'Cibiru'),
(1565, 104, 'Cicendo'),
(1566, 104, 'Cidadap'),
(1567, 104, 'Cinambo'),
(1568, 104, 'Coblong'),
(1569, 104, 'Gedebage'),
(1570, 104, 'Kiaracondong'),
(1571, 104, 'Lengkong'),
(1572, 104, 'Mandalajati'),
(1573, 104, 'Panyileukan'),
(1574, 104, 'Rancasari'),
(1575, 104, 'Regol'),
(1576, 104, 'Sukajadi'),
(1577, 104, 'Sukasari'),
(1578, 104, 'Sumur Bandung'),
(1579, 104, 'Ujung Berung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

DROP TABLE IF EXISTS `kelurahan`;
CREATE TABLE IF NOT EXISTS `kelurahan` (
  `kelurahan_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  PRIMARY KEY (`kelurahan_id`),
  KEY `kecamatan_id` (`kecamatan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelurahan`
--

INSERT INTO `kelurahan` (`kelurahan_id`, `kecamatan_id`, `nama`, `kode_pos`) VALUES
(19095, 1550, 'Campaka', '40184'),
(19096, 1550, 'Ciroyom', '40182'),
(19097, 1550, 'Dungus Cariang', '40183'),
(19098, 1550, 'Garuda', '40184'),
(19099, 1550, 'Kebon Jeruk', '40181'),
(19100, 1550, 'Maleber (Maleer)', '40184'),
(19101, 1551, 'Antapani Kidul', '40291'),
(19102, 1551, 'Antapani Kulon', '40291'),
(19103, 1551, 'Antapani Tengah', '40291'),
(19104, 1551, 'Antapani Wetan', '40291'),
(19105, 1552, 'Cisaranten Kulon', '40293'),
(19106, 1552, 'Cisarenten Bina Harapan', '40294'),
(19107, 1552, 'Sindang Jaya', '40293'),
(19108, 1552, 'Sukamiskin', '40293'),
(19109, 1553, 'Cibadak', '40241'),
(19110, 1553, 'Karanganyar', '40241'),
(19111, 1553, 'Karasak', '40243'),
(19112, 1553, 'Nyengseret', '40242'),
(19113, 1553, 'Panjunan', '40242'),
(19114, 1553, 'Pelindung Hewan', '40243'),
(19115, 1554, 'Babakan', '40222'),
(19116, 1554, 'Babakan Ciparay', '40223'),
(19117, 1554, 'Cirangrang', '40227'),
(19118, 1554, 'Margahayu Utara', '40224'),
(19119, 1554, 'Margasuka', '40225'),
(19120, 1554, 'Sukahaji', '40221'),
(19121, 1555, 'Batununggal', '40266'),
(19122, 1555, 'Kujangsari', '40287'),
(19123, 1555, 'Mengger', '40267'),
(19124, 1555, 'Wates', '40256'),
(19125, 1556, 'Caringin', '40212'),
(19126, 1556, 'Cibuntu', '40212'),
(19127, 1556, 'Cigondewah Kaler', '40214'),
(19128, 1556, 'Cigondewah Kidul', '40214'),
(19129, 1556, 'Cigondewah Rahayu', '40215'),
(19130, 1556, 'Cijerah', '40213'),
(19131, 1556, 'Gempolsari', '40215'),
(19132, 1556, 'Warung Muncang', '40211'),
(19133, 1557, 'Cihapit', '40114'),
(19134, 1557, 'Citarum', '40115'),
(19135, 1557, 'Tamansari', '40116'),
(19136, 1558, 'Binong', '40275'),
(19137, 1558, 'Cibangkong', '40273'),
(19138, 1558, 'Gumuruh', '40275'),
(19139, 1558, 'Kacapiring', '40271'),
(19140, 1558, 'Kebon Gedang', '40274'),
(19141, 1558, 'Kebonwaru', '40272'),
(19142, 1558, 'Maleer', '40274'),
(19143, 1558, 'Samoja', '40273'),
(19144, 1559, 'Babakan Asih', '40232'),
(19145, 1559, 'Babakan Tarogong', '40232'),
(19146, 1559, 'Jamika', '40231'),
(19147, 1559, 'Kopo', '40233'),
(19148, 1559, 'Suka Asih', '40231'),
(19149, 1560, 'Cibaduyut', '40236'),
(19150, 1560, 'Cibaduyut Kidul', '40239'),
(19151, 1560, 'Cibaduyut Wetan', '40238'),
(19152, 1560, 'Kebon Lega', '40235'),
(19153, 1560, 'Mekarwangi', '40237'),
(19154, 1560, 'Situsaeur', '40234'),
(19155, 1561, 'Cijaura (Margasenang)', '40287'),
(19156, 1561, 'Jatisari', '40286'),
(19157, 1561, 'Margasari', '40286'),
(19158, 1561, 'Sekejati', '40286'),
(19159, 1562, 'Cigadung', '40191'),
(19160, 1562, 'Cihaur Geulis', '40122'),
(19161, 1562, 'Neglasari', '40124'),
(19162, 1562, 'Sukaluyu', '40123'),
(19163, 1563, 'Cicadas', '40121'),
(19164, 1563, 'Cikutra', '40124'),
(19165, 1563, 'Padasuka', '40125'),
(19166, 1563, 'Pasirlayung', '40192'),
(19167, 1563, 'Sukamaju', '40121'),
(19168, 1563, 'Sukapada', '40125'),
(19169, 1564, 'Cipadung', '40614'),
(19170, 1564, 'Cisurupan', '40614'),
(19171, 1564, 'Palasari', '40615'),
(19172, 1564, 'Pasirbiru', '40615'),
(19173, 1565, 'Arjuna', '40172'),
(19174, 1565, 'Husen Sastranegara', '40174'),
(19175, 1565, 'Pajajaran', '40173'),
(19176, 1565, 'Pamoyanan', '40173'),
(19177, 1565, 'Pasir Kaliki', '40171'),
(19178, 1565, 'Sukaraja', '40175'),
(19179, 1566, 'Ciumbuleuit', '40142'),
(19180, 1566, 'Hegarmanah', '40141'),
(19181, 1566, 'Ledeng', '40143'),
(19182, 1567, 'Babakan Penghulu', '40294'),
(19183, 1567, 'Cisaranten Wetan', '40294'),
(19184, 1567, 'Pakemitan', '40294'),
(19185, 1567, 'Sukamulya', '40294'),
(19186, 1568, 'Cipaganti', '40131'),
(19187, 1568, 'Dago', '40135'),
(19188, 1568, 'Lebak Gede', '40132'),
(19189, 1568, 'Lebak Siliwangi', '40132'),
(19190, 1568, 'Sadang Serang', '40133'),
(19191, 1568, 'Sekeloa', '40134'),
(19192, 1569, 'Cimenerang (Cimincrang)', '40294'),
(19193, 1569, 'Cisaranten Kidul', '40294'),
(19194, 1569, 'Rancabalong', '40294'),
(19195, 1569, 'Rancanumpang', '40294'),
(19196, 1570, 'Babakan Sari', '40283'),
(19197, 1570, 'Babakan Surabaya', '40281'),
(19198, 1570, 'Cicaheum', '40282'),
(19199, 1570, 'Kebon Kangkung', '40284'),
(19200, 1570, 'Kebun Jayanti', '40281'),
(19201, 1570, 'Sukapura', '40285'),
(19202, 1571, 'Burangrang', '40262'),
(19203, 1571, 'Cijagra', '40265'),
(19204, 1571, 'Cikawao', '40261'),
(19205, 1571, 'Lingkar Selatan', '40263'),
(19206, 1571, 'Malabar', '40262'),
(19207, 1571, 'Paledang', '40261'),
(19208, 1571, 'Turangga', '40264'),
(19209, 1572, 'Jatihandap', '40195'),
(19210, 1572, 'Karang Pamulang', '40195'),
(19211, 1572, 'Pasir Impun', '40195'),
(19212, 1572, 'Sindang Jaya', '40195'),
(19213, 1573, 'Cipadung Kidul', '40614'),
(19214, 1573, 'Cipadung Kulon', '40614'),
(19215, 1573, 'Cipadung Wetan', '40614'),
(19216, 1573, 'Mekarmulya', '40614'),
(19217, 1574, 'Cipamokolan', '40292'),
(19218, 1574, 'Darwati', '40292'),
(19219, 1574, 'Manjahlega (Cisarantenkidul)', '40295'),
(19220, 1574, 'Mekar Mulya (Mekarjaya)', '40292'),
(19221, 1575, 'Ancol', '40254'),
(19222, 1575, 'Balong Gede', '40251'),
(19223, 1575, 'Ciateul', '40252'),
(19224, 1575, 'Cigereleng', '40253'),
(19225, 1575, 'Ciseureuh', '40255'),
(19226, 1575, 'Pasirluyu', '40254'),
(19227, 1575, 'Pungkur', '40252'),
(19228, 1576, 'Cipedes', '40162'),
(19229, 1576, 'Pasteur', '40161'),
(19230, 1576, 'Sukabungah', '40162'),
(19231, 1576, 'Sukagalih', '40163'),
(19232, 1576, 'Sukawarna', '40164'),
(19233, 1577, 'Geger Kalong', '40153'),
(19234, 1577, 'Isola', '40154'),
(19235, 1577, 'Sarijadi', '40151'),
(19236, 1577, 'Sukarasa', '40152'),
(19237, 1578, 'Babakan Ciamis', '40117'),
(19238, 1578, 'Braga', '40111'),
(19239, 1578, 'Kebon Pisang', '40112'),
(19240, 1578, 'Merdeka', '40113'),
(19241, 1579, 'Cigending', '40611'),
(19242, 1579, 'Pasanggrahan', '40617'),
(19243, 1579, 'Pasir Endah', '40619'),
(19244, 1579, 'Pasirjati', '40616'),
(19245, 1579, 'Pasirwangi', '40618');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-10-29-055545', 'App\\Database\\Migrations\\AddConnections', 'default', 'App', 1667394695, 1),
(2, '2022-10-29-060250', 'App\\Database\\Migrations\\AddUsers', 'default', 'App', 1667394695, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

DROP TABLE IF EXISTS `provinsi`;
CREATE TABLE IF NOT EXISTS `provinsi` (
  `provinsi_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`provinsi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`provinsi_id`, `nama`) VALUES
(10, 'Jawa Barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provinsi_id` int(11) NOT NULL,
  `kabupaten_kota_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `kelurahan_id` int(11) NOT NULL,
  `users_id` int(10) DEFAULT NULL,
  `nama_daerah` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `provinsi_id` (`provinsi_id`),
  KEY `kecamatan_id` (`kecamatan_id`),
  KEY `kabupaten_kota_id` (`kabupaten_kota_id`),
  KEY `kelurahan_id` (`kelurahan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `region`
--

INSERT INTO `region` (`id`, `provinsi_id`, `kabupaten_kota_id`, `kecamatan_id`, `kelurahan_id`, `users_id`, `nama_daerah`, `latitude`, `longitude`, `deskripsi`, `gambar`) VALUES
(1, 10, 104, 1550, 19095, NULL, 'Jl. Raya Cimindi', '-6.898703\r\n\r\n', '107.562119', 'Rawan Begal', 'default.jpg'),
(2, 10, 104, 1550, 19095, NULL, 'SMAN 13 Bandung', '-6.90268787768052', '107.56529361252683', 'Pencurian', 'default.jpg'),
(3, 10, 104, 1553, 19103, NULL, 'Istana BEC Bandng', '-6.907901126950146', '107.60889381199418', 'Pembunuhan', '1673020485_166ea7c4ed37c3891411.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user',
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Irfan ', 'Choiruddin', 'asd@gmail.com', 'admin', '$2y$10$jAoswCSmfJbNMlTQMFyfkukS8YNt8.fKnBbESV9qpe/7UvSGMMnz.', '2022-11-10 02:14:26', '0000-00-00 00:00:00'),
(2, 'coba', 'coba', 'coba@gmail.com', 'user', '$2y$10$QNb8sWAm/NNLcjaM7mVapuZiXta6cXuWZtt/we8Rt18P23VMSfUku', '2022-11-18 08:17:32', '0000-00-00 00:00:00'),
(3, 'coba', 'coba2', 'coba2@gmail.com', 'user', '$2y$10$MfzT/J8x.pBrZwvIOLG67u7SD7r9bgoTHk9kvz0VmWDpJ6fa1pnGy', '2023-01-22 04:47:02', '0000-00-00 00:00:00');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `kelurahan_ibfk_1` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`kecamatan_id`);

--
-- Ketidakleluasaan untuk tabel `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `region_ibfk_1` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`provinsi_id`),
  ADD CONSTRAINT `region_ibfk_5` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`kecamatan_id`),
  ADD CONSTRAINT `region_ibfk_6` FOREIGN KEY (`kabupaten_kota_id`) REFERENCES `kabupaten_kota` (`kabupaten_kota_id`),
  ADD CONSTRAINT `region_ibfk_7` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahan` (`kelurahan_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
