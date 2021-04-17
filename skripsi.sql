-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Apr 2021 pada 04.18
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(3) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(9) NOT NULL,
  `tingkat_kesulitan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `tingkat_kesulitan`) VALUES
(13, 'AL QUR\'AN KECIL', 155000, 4),
(14, 'AL QUR\'AN BESAR', 185000, 5),
(15, 'GARSKIN COVER', 70000, 3),
(16, 'GARSKIN FULL ', 115000, 4),
(17, 'MUG', 20000, 3),
(18, 'TOTEBAG', 15000, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(9) NOT NULL,
  `id_transaksi` varchar(8) NOT NULL,
  `id_barang` int(3) NOT NULL,
  `id_kriteria` int(3) NOT NULL,
  `nama_barang_detail` text NOT NULL,
  `value_kriteria` varchar(50) NOT NULL,
  `status_pengerjaan` enum('Belum Selesai','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `id_barang`, `id_kriteria`, `nama_barang_detail`, `value_kriteria`, `status_pengerjaan`) VALUES
(56, 'T0000001', 14, 5, 'Sadi,089777,AL QUR\'AN BESAR 0000000001', '2021-02-15', 'Belum Selesai'),
(57, 'T0000001', 13, 5, 'Sadi,089777,AL QUR\'AN KECIL 0000000001', '2021-02-15', 'Belum Selesai'),
(58, 'T0000001', 14, 6, 'Sadi,089777,AL QUR\'AN BESAR 0000000001', '5', 'Belum Selesai'),
(59, 'T0000001', 13, 6, 'Sadi,089777,AL QUR\'AN KECIL 0000000001', '5', 'Belum Selesai'),
(60, 'T0000001', 14, 7, 'Sadi,089777,AL QUR\'AN BESAR 0000000001', '185000', 'Belum Selesai'),
(61, 'T0000001', 13, 7, 'Sadi,089777,AL QUR\'AN KECIL 0000000001', '155000', 'Belum Selesai'),
(62, 'T0000001', 14, 8, 'Sadi,089777,AL QUR\'AN BESAR 0000000001', '2', 'Belum Selesai'),
(63, 'T0000001', 13, 8, 'Sadi,089777,AL QUR\'AN KECIL 0000000001', '5', 'Belum Selesai'),
(64, 'T0000001', 14, 9, 'Sadi,089777,AL QUR\'AN BESAR 0000000001', '5', 'Belum Selesai'),
(65, 'T0000001', 13, 9, 'Sadi,089777,AL QUR\'AN KECIL 0000000001', '4', 'Belum Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(3) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `atribut` enum('Benefit','Cost') NOT NULL,
  `bobot` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `atribut`, `bobot`) VALUES
(5, 'Sisa Hari', 'Cost', 5),
(6, 'Waktu Pengerjaan', 'Cost', 4),
(7, 'Harga', 'Benefit', 3),
(8, 'Jumlah Pesanan', 'Benefit', 4),
(9, 'Tingkat Kesulitan', 'Cost', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(8) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `tgl_deadline` date NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `total_harga` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_transaksi`, `tgl_deadline`, `nama_customer`, `no_hp`, `total_harga`) VALUES
('T0000001', '2021-02-10', '2021-02-15', 'Sadi', '089777', 1145000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `password`, `role`) VALUES
(4, 'admin', 'admin@gmail.com', '$2y$10$yaWKvuE9jGsOxTFUcSpVRO0hiYfw5lOR1akh2x2ZXIZ.FPRk4w/y6', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
