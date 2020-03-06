-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Mar 2020 pada 09.51
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vlm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id`, `deskripsi`, `gambar`) VALUES
(1, 'sipp', 'KEGIATAN_RUTIN.png'),
(2, 'dari\r\ndiriku\r\naku mengaliur\r\ndsm\r\nakhirnya\r\naku\r\nmenemukan\r\njati \r\ndiriku', 'images_(2)4.jpg'),
(3, 'kegiatan bulan ini sangat seruu lhoo soo jangan ketinggalan dan lihatlah apa yang akan kamu dapat', 'VLM.png'),
(7, 'Test pengiriman notifikasi', '16114.jpg'),
(9, 'test', '6541.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemberitahuan`
--

CREATE TABLE `pemberitahuan` (
  `id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemberitahuan`
--

INSERT INTO `pemberitahuan` (`id`, `isi`, `tanggal`) VALUES
(1, 'Test pemberitahuan saja', '2020-02-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `password` varchar(32) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `umur` int(2) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `jenis_kelamin` varchar(6) NOT NULL,
  `gambar` varchar(40) NOT NULL DEFAULT 'default.png',
  `kondisi` int(1) NOT NULL DEFAULT 1,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `password`, `tgl_lahir`, `tempat_lahir`, `email`, `umur`, `no_hp`, `jenis_kelamin`, `gambar`, `kondisi`, `status`) VALUES
(1, 'andre', 'e10adc3949ba59abbe56e057f20f883e', '1998-03-03', 'makassar', 'billytanyawan6@gmail.com', 20, '082131646946', 'Pria', 'default.png', 1, 2),
(2, 'Admin', '21232f297a57a5a743894a0e4a801fc3', '1997-02-04', 'makassar', 'admin@gmail.com', 23, '08231646464', 'Pria', 'default.png', 1, 1),
(3, 'Ivan Darmawan', 'e10adc3949ba59abbe56e057f20f883e', '1997-05-24', 'Makassar', 'theivanjackdark@gmail.com', 22, '082131646946', 'Pria', 'images_(2).jpg', 1, 2),
(4, 'Ferdi', 'e10adc3949ba59abbe56e057f20f883e', '1997-04-25', 'Makassar', 'thevanjackdark3@gmail.com', 22, '082131646946', 'Pria', 'default.png', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
