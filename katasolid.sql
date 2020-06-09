-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Feb 2020 pada 12.08
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `katasolid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pertandingan`
--

CREATE TABLE `jenis_pertandingan` (
  `id_jenis` int(11) NOT NULL,
  `jenis_pertandingan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_pertandingan`
--

INSERT INTO `jenis_pertandingan` (`id_jenis`, `jenis_pertandingan`) VALUES
(1, 'Grup'),
(2, 'Head To Head');

-- --------------------------------------------------------

--
-- Struktur dari tabel `point`
--

CREATE TABLE `point` (
  `id_point` int(11) NOT NULL,
  `nama_atlet` varchar(255) NOT NULL,
  `nilai_athletic` double NOT NULL,
  `nilai_technic` double NOT NULL,
  `penilai` varchar(20) NOT NULL,
  `kata_dimainkan` varchar(255) NOT NULL,
  `kontingen` varchar(255) NOT NULL,
  `atribut` varchar(10) NOT NULL,
  `id_atlet` int(11) NOT NULL,
  `dinilai` int(1) NOT NULL,
  `pertandingan_ke` double NOT NULL,
  `grup` varchar(2) NOT NULL,
  `id_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `point`
--

INSERT INTO `point` (`id_point`, `nama_atlet`, `nilai_athletic`, `nilai_technic`, `penilai`, `kata_dimainkan`, `kontingen`, `atribut`, `id_atlet`, `dinilai`, `pertandingan_ke`, `grup`, `id_jenis`) VALUES
(1, '0', 0, 0, 'juri1', '', '', '', 0, 0, 1, 'A', 1),
(2, '0', 0, 0, 'juri2', '', '', '', 0, 0, 1, 'A', 1),
(3, '0', 0, 0, 'juri3', '', '', '', 0, 0, 1, 'A', 1),
(4, '0', 0, 0, 'juri4', '', '', '', 0, 0, 1, 'A', 1),
(5, '0', 0, 0, 'juri5', '', '', '', 0, 0, 1, 'A', 1),
(6, '0', 0, 0, 'juri6', '', '', '', 0, 0, 1, 'A', 1),
(7, '0', 0, 0, 'juri7', '', '', '', 0, 0, 1, 'A', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_atlet`
--

CREATE TABLE `tabel_atlet` (
  `id_atlet` int(11) NOT NULL,
  `nama_atlet` varchar(255) DEFAULT NULL,
  `kontingen` varchar(255) DEFAULT NULL,
  `atribut` varchar(255) DEFAULT NULL,
  `pertandingan_ke` int(11) DEFAULT NULL,
  `poin_rekap` float NOT NULL DEFAULT '0',
  `kata_dimainkan` varchar(75) NOT NULL,
  `bermain` varchar(10) NOT NULL,
  `grup` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_config`
--

CREATE TABLE `tabel_config` (
  `id_config` int(11) NOT NULL,
  `arena` varchar(50) NOT NULL,
  `kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_detail`
--

CREATE TABLE `tabel_detail` (
  `id` int(11) NOT NULL,
  `nama_atlet` varchar(255) NOT NULL,
  `juri1_ath` double NOT NULL,
  `juri1_tech` double NOT NULL,
  `juri2_ath` double NOT NULL,
  `juri2_tech` double NOT NULL,
  `juri3_ath` double NOT NULL,
  `juri3_tech` double NOT NULL,
  `juri4_ath` double NOT NULL,
  `juri4_tech` double NOT NULL,
  `juri5_ath` double NOT NULL,
  `juri5_tech` double NOT NULL,
  `juri6_ath` double NOT NULL,
  `juri6_tech` double NOT NULL,
  `juri7_ath` double NOT NULL,
  `juri7_tech` double NOT NULL,
  `id_jenis` int(30) NOT NULL,
  `pertandingan_ke` double NOT NULL,
  `grup` varchar(30) NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_keseluruhan`
--

CREATE TABLE `tabel_keseluruhan` (
  `id_keseluruhan` int(11) NOT NULL,
  `nilai_keseluruhan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_keseluruhan`
--

INSERT INTO `tabel_keseluruhan` (`id_keseluruhan`, `nilai_keseluruhan`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin'),
(3, 'juri1', '8ec59cb5a587a2016263427d17b94790', 'juri1', 'wasit'),
(4, 'juri2', 'f807fe8fa76f83bb7c1770229a0475e9', 'juri2', 'wasit'),
(5, 'juri3', 'fe2db04b38c700a8af8f401177b0ebbb', 'juri3', 'wasit'),
(6, 'juri4', 'ca5e3e3cbf8ed4f750dbe177269fcf91', 'juri4', 'wasit'),
(7, 'juri5', '39a2836699793207add548712320e126', 'juri5', 'wasit'),
(8, 'juri6', '9f91e4c6a7d0499ddf65ea505624750f', 'juri6', 'wasit'),
(9, 'juri7', '6cc7cf78dcdb41d73433ef9a08ada5ff', 'juri7', 'wasit');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_pertandingan`
--
ALTER TABLE `jenis_pertandingan`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `point`
--
ALTER TABLE `point`
  ADD PRIMARY KEY (`id_point`);

--
-- Indeks untuk tabel `tabel_atlet`
--
ALTER TABLE `tabel_atlet`
  ADD PRIMARY KEY (`id_atlet`);

--
-- Indeks untuk tabel `tabel_config`
--
ALTER TABLE `tabel_config`
  ADD PRIMARY KEY (`id_config`);

--
-- Indeks untuk tabel `tabel_detail`
--
ALTER TABLE `tabel_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_keseluruhan`
--
ALTER TABLE `tabel_keseluruhan`
  ADD PRIMARY KEY (`id_keseluruhan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_pertandingan`
--
ALTER TABLE `jenis_pertandingan`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `point`
--
ALTER TABLE `point`
  MODIFY `id_point` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tabel_atlet`
--
ALTER TABLE `tabel_atlet`
  MODIFY `id_atlet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tabel_config`
--
ALTER TABLE `tabel_config`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tabel_keseluruhan`
--
ALTER TABLE `tabel_keseluruhan`
  MODIFY `id_keseluruhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
