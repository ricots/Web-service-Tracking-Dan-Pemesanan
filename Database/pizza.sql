
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 11 Sep 2016 pada 03.34
-- Versi Server: 10.0.22-MariaDB
-- Versi PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `u838276818_pizza`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE IF NOT EXISTS `detail_transaksi` (
  `id_transaksi` int(10) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `harga` int(15) NOT NULL,
  `jumlah` int(30) NOT NULL,
  `keterangan` text COLLATE utf8_unicode_ci NOT NULL,
  `total_harga` int(15) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=47 ;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_transaksi`, `nama_produk`, `harga`, `jumlah`, `keterangan`, `total_harga`) VALUES
(1, 'Pizza Porsi Kecil', 1, 0, '70000', 70000),
(2, 'Pizza Porsi Kecil', 4, 0, '70000', 280000),
(34, 'Pizza Porsi Kecil', 1, 0, '70000', 70000),
(32, 'Pizza Porsi Besar', 1, 0, '100000', 100000),
(33, 'Pizza Porsi Besar', 1, 0, '100000', 100000),
(46, 'Pizza Porsi Kecil', 1, 0, '70000', 70000),
(45, 'Pizza Porsi Kecil', 1, 0, '70000', 70000),
(44, 'Pizza Porsi Kecil', 1, 0, '70000', 70000),
(43, 'Pizza Porsi Kecil', 1, 0, '70000', 70000),
(42, 'Pizza Porsi Kecil', 1, 0, '70000', 70000),
(41, 'Pizza Porsi Kecil', 1, 0, '70000', 70000),
(40, 'Pizza Porsi Kecil', 1, 0, '70000', 70000),
(39, 'Pizza Porsi Kecil', 2, 0, '70000', 140000),
(38, 'Pizza Porsi Kecil', 2, 0, '70000', 140000),
(37, 'Pizza Porsi Besar', 2, 0, '100000', 200000),
(36, 'Pizza Porsi Kecil', 1, 0, '70000', 70000),
(35, 'Pizza Porsi Besar', 1, 0, '100000', 100000),
(31, 'Pizza Porsi Besar', 1, 0, '100000', 100000),
(30, 'Pizza Porsi Kecil', 1, 0, '70000', 70000),
(29, 'Pizza Porsi Kecil', 1, 0, '70000', 70000),
(25, 'Pizza Porsi Kecil', 1, 0, '70000', 70000),
(24, 'Pizza Porsi Kecil', 1, 0, '70000', 70000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE IF NOT EXISTS `kurir` (
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_kurir` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  PRIMARY KEY (`nama`,`id_kurir`,`latitude`,`longitude`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`nama`, `id_kurir`, `latitude`, `longitude`) VALUES
('zainal', 1, -7.789931666666666, 110.39851333333333);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_kurir`
--

CREATE TABLE IF NOT EXISTS `login_kurir` (
  `id_kurir` int(15) NOT NULL AUTO_INCREMENT,
  `username_kurir` text COLLATE utf8_unicode_ci NOT NULL,
  `password_kurir` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_kurir`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `login_kurir`
--

INSERT INTO `login_kurir` (`id_kurir`, `username_kurir`, `password_kurir`) VALUES
(1, 'zainal', 'kurir'),
(2, 'salamun', 'salamun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_pemesan`
--

CREATE TABLE IF NOT EXISTS `login_pemesan` (
  `id_pemesan` int(15) NOT NULL,
  `username_pemesan` text COLLATE utf8_unicode_ci NOT NULL,
  `password_pemesan` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_pemesan`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `login_pemesan`
--

INSERT INTO `login_pemesan` (`id_pemesan`, `username_pemesan`, `password_pemesan`) VALUES
(1, 'zainal', 'zainal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesan`
--

CREATE TABLE IF NOT EXISTS `pemesan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `no_telp` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=82 ;

--
-- Dumping data untuk tabel `pemesan`
--

INSERT INTO `pemesan` (`id`, `nama`, `alamat`, `no_telp`, `latitude`, `longitude`) VALUES
(1, 'Adi', 'Jl. Jomblangan', '086741739666', -7.808341979980469, 110.41277313232422),
(79, 'Beni', 'Gedong Kuning', '085677876543', -7.806953, 110.401881),
(81, '', '', '', -7.789943333333333, 110.39847333333334),
(80, 'Sigit', 'Janti', '089876674726', -7.7941596, 110.4050149);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(15) NOT NULL AUTO_INCREMENT,
  `nama_produk` text NOT NULL,
  `harga` int(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` int(5) NOT NULL,
  PRIMARY KEY (`id_produk`),
  UNIQUE KEY `id_produk` (`id_produk`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `deskripsi`, `stok`) VALUES
(1, 'Pizza Porsi Kecil', 70000, 'Pizza dengan porsi kecil ', 10),
(2, 'Pizza Porsi Besar', 100000, 'Pizza denga porsi besar bisa dinikmati bersama teman teman anda', 10);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
