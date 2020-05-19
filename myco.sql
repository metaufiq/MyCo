-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Bulan Mei 2020 pada 09.35
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

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
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` int(255) NOT NULL,
  `pegawai_id` int(255) NOT NULL,
  `tanggal` date NOT NULL,
  `mulai_kerja` datetime,
  `selesai_kerja` datetime
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id`, `pegawai_id`, `tanggal`, `mulai_kerja`, `selesai_kerja`) VALUES
(1, 2, '2020-05-18', '2020-05-18 07:30:45', '2020-05-18 17:40:42');

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
(1, 'Taufiq', 'taufiq1689@gmail.com', '123'),
(2, 'Cak Wi', 'cakwi@cak.com', 'cakcak'),
(3, 'Leafy', 'leaf@y.com', 'leaf'),
(4, 'Cak Sa', 'a@a.com', 'a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `alamat`, `no_hp`) VALUES
(1, 'Muh Taufiqulsa`di', 'Palu', '081234567890'),
(2, 'Rifqi Mukti', 'Jember', '081234567891'),
(3, 'Bayu', 'Sidoarjo', '081234567892');

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
-- Struktur dari tabel `tingkat_pegawai`
--

CREATE TABLE `tingkat_pegawai` (
  `id` int(255) NOT NULL,
  `tingkat_nama` text NOT NULL,
  `tingkat_jenis` text NOT NULL,
  `tingkat_golongan` text NOT NULL,
  `tingkat_pendidikan` text NOT NULL,
  `tingkat_lamakerja` text NOT NULL,
  `tingkat_gaji` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tingkat_pegawai`
--

INSERT INTO `tingkat_pegawai` (`id`, `tingkat_nama`, `tingkat_jenis`, `tingkat_golongan`, `tingkat_pendidikan`, `tingkat_lamakerja`, `tingkat_gaji`) VALUES
(1, 'Staff Muda', 'Tetap', '', 'S1', '-', 5000000),
(5, 'Staff Madya', 'Tetap', 'III B', 'S1', '4 tahun', 6500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id` int(255) NOT NULL,
  `tugas` text NOT NULL,
  `tenggat_waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id`, `tugas`, `tenggat_waktu`, `status`) VALUES
(1, 'Membuat Arsitektur DDD 12', '2020-05-18 10:55:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(255) NOT NULL,
  `pegawai_id` int(255) NOT NULL,
  `upah_laukpauk` int(255) NOT NULL,
  `upah_renumerasi` int(255) NOT NULL,
  `upah_kehadiran` int(255) NOT NULL,
  `bulan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `manajer`
--
ALTER TABLE `manajer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Indeks untuk tabel `tingkat_pegawai`
--
ALTER TABLE `tingkat_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `pegawai_id` (`pegawai_id`),
  ADD CONSTRAINT `pegawai_id` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `manajer`
--
ALTER TABLE `manajer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `penugasan`
--
ALTER TABLE `penugasan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `status_tugas`
--
ALTER TABLE `status_tugas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tingkat_pegawai`
--
ALTER TABLE `tingkat_pegawai`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `manajer`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
