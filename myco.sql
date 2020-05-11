-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Bulan Mei 2020 pada 13.42
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myco`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `manajer`
--

CREATE TABLE `manajer` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `manajer`
--

INSERT INTO `manajer` (`id`, `nama`, `email`, `password`) VALUES
(1, 'Taufiq', 'taufiq1689@gmail.com', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`) VALUES
(1, 'Muh Taufiqulsa`di'),
(2, 'Rifqi Mukti'),
(3, 'Bayu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penugasan`
--

CREATE TABLE `penugasan` (
  `id` int(255) NOT NULL,
  `tugas` int(255) NOT NULL,
  `pegawai` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penugasan`
--

INSERT INTO `penugasan` (`id`, `tugas`, `pegawai`) VALUES
(44, 1, 1),
(45, 1, 2),
(46, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_tugas`
--

CREATE TABLE `status_tugas` (
  `id` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_tugas`
--

INSERT INTO `status_tugas` (`id`, `status`) VALUES
(0, 'Telat'),
(1, 'Sedang Dikerjakan'),
(2, 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id` int(255) NOT NULL,
  `tugas` text NOT NULL,
  `tenggat_waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id`, `tugas`, `tenggat_waktu`, `status`) VALUES
(1, 'Membuat Arsitektur DDD 12', '2020-05-18 10:55:00', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `manajer`
--
ALTER TABLE `manajer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penugasan`
--
ALTER TABLE `penugasan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_tugas`
--
ALTER TABLE `status_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `manajer`
--
ALTER TABLE `manajer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penugasan`
--
ALTER TABLE `penugasan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `status_tugas`
--
ALTER TABLE `status_tugas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
