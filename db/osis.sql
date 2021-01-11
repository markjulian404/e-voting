-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09 Okt 2020 pada 11.19
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `nama`, `password`) VALUES
(2, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kandidat`
--

CREATE TABLE `kandidat` (
  `id` int(11) NOT NULL,
  `no_kandidat` int(11) NOT NULL,
  `ketua` varchar(128) NOT NULL,
  `wketua` varchar(128) NOT NULL,
  `gketua` varchar(128) NOT NULL,
  `gwketua` varchar(128) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `periode` varchar(128) NOT NULL,
  `suara` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kandidat`
--

INSERT INTO `kandidat` (`id`, `no_kandidat`, `ketua`, `wketua`, `gketua`, `gwketua`, `visi`, `misi`, `periode`, `suara`) VALUES
(6, 1, 'Ujang', 'Ubed', 'blackpetugas.png', 'blacksiswa.png', '1.Wajib pacaran', 'sdasdasd', '2020/2021', 0),
(7, 2, 'sad', 'sad', 'blackpetugas.png', 'blacksiswa.png', 'asdasdasdasd', 'asdasdasd', '2020/2021', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilih`
--

CREATE TABLE `pemilih` (
  `nisn` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `pilihan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(128) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nisn` int(15) NOT NULL,
  `nama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nisn`, `nama`) VALUES
(4, 123456, 'Tatang'),
(15, 12345, 'Tatang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu`
--

CREATE TABLE `waktu` (
  `id` int(11) NOT NULL,
  `wmulai` varchar(128) NOT NULL,
  `wakhir` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `waktu`
--

INSERT INTO `waktu` (`id`, `wmulai`, `wakhir`) VALUES
(11, '2020-10-09 06:29', '2020-10-09 11:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemilih`
--
ALTER TABLE `pemilih`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nisn` (`nisn`);

--
-- Indexes for table `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `waktu`
--
ALTER TABLE `waktu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
