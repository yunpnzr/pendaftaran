-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Agu 2022 pada 15.41
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran_siswa_baru`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_baru`
--

CREATE TABLE `siswa_baru` (
  `no` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `sekolahasal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa_baru`
--

INSERT INTO `siswa_baru` (`no`, `nama`, `alamat`, `jeniskelamin`, `agama`, `sekolahasal`) VALUES
(16, 'Shinta Rian', 'Merauke', 'Perempuan', 'Islam', 'SMPN 12 Bandung'),
(17, 'Iwan', 'Citayam', 'Laki-Laki', 'Islam', 'SMAN 12 Jakarta'),
(20, 'Gina', 'Depok', 'Perempuan', 'islam', 'SMP Dharma Pertiwi'),
(21, 'Frisca', 'Kabupaten Bogor', 'Perempuan', 'islam', 'SMKN 1 Bojonggede'),
(22, 'Test!', 'Test!', 'Laki-Laki', 'Yahudi', 'Test!'),
(23, 'Rionaldo', 'Gataua', 'Laki-Laki', 'Islam', 'aaaa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `siswa_baru`
--
ALTER TABLE `siswa_baru`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `siswa_baru`
--
ALTER TABLE `siswa_baru`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
