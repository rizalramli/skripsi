-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Agu 2021 pada 08.16
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
  `id_jenis_kain` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_jenis_kain`, `nama_barang`, `harga`) VALUES
(28, 3, 'Merah Putih', 90000),
(29, 4, 'Merah Putih', 100000),
(30, 5, 'Merah Putih', 70000),
(31, 8, 'Busana / Batik', 117000),
(32, 6, 'Olahraga', 40000),
(33, 7, 'Olahraga', 50000),
(34, 3, 'Pramuka', 90000),
(35, 4, 'Pramuka', 100000),
(36, 5, 'Pramuka', 70000);

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
(1, 'T0000001', 28, 5, 'Purworejo 01,99999,Merah Putih (Dril) 0000000001,56', '5', 'Belum Selesai'),
(2, 'T0000001', 31, 5, 'Purworejo 01,99999,Busana / Batik (Cemara) 0000000001,56', '5', 'Belum Selesai'),
(3, 'T0000001', 32, 5, 'Purworejo 01,99999,Olahraga (TC) 0000000001,56', '1', 'Belum Selesai'),
(4, 'T0000001', 34, 5, 'Purworejo 01,99999,Pramuka (Dril) 0000000001,56', '7', 'Belum Selesai'),
(5, 'T0000001', 28, 6, 'Purworejo 01,99999,Merah Putih (Dril) 0000000001,56', '2000000', 'Belum Selesai'),
(6, 'T0000001', 31, 6, 'Purworejo 01,99999,Busana / Batik (Cemara) 0000000001,56', '2000000', 'Belum Selesai'),
(7, 'T0000001', 32, 6, 'Purworejo 01,99999,Olahraga (TC) 0000000001,56', '2000000', 'Belum Selesai'),
(8, 'T0000001', 34, 6, 'Purworejo 01,99999,Pramuka (Dril) 0000000001,56', '2000000', 'Belum Selesai'),
(9, 'T0000001', 28, 7, 'Purworejo 01,99999,Merah Putih (Dril) 0000000001,56', '56', 'Belum Selesai'),
(10, 'T0000001', 31, 7, 'Purworejo 01,99999,Busana / Batik (Cemara) 0000000001,56', '56', 'Belum Selesai'),
(11, 'T0000001', 32, 7, 'Purworejo 01,99999,Olahraga (TC) 0000000001,56', '56', 'Belum Selesai'),
(12, 'T0000001', 34, 7, 'Purworejo 01,99999,Pramuka (Dril) 0000000001,56', '56', 'Belum Selesai'),
(13, 'T0000001', 28, 16, 'Purworejo 01,99999,Merah Putih (Dril) 0000000001,56', '3', 'Belum Selesai'),
(14, 'T0000001', 31, 16, 'Purworejo 01,99999,Busana / Batik (Cemara) 0000000001,56', '3', 'Belum Selesai'),
(15, 'T0000001', 32, 16, 'Purworejo 01,99999,Olahraga (TC) 0000000001,56', '3', 'Belum Selesai'),
(16, 'T0000001', 34, 16, 'Purworejo 01,99999,Pramuka (Dril) 0000000001,56', '3', 'Belum Selesai'),
(17, 'T0000001', 28, 17, 'Purworejo 01,99999,Merah Putih (Dril) 0000000001,56', '1', 'Belum Selesai'),
(18, 'T0000001', 31, 17, 'Purworejo 01,99999,Busana / Batik (Cemara) 0000000001,56', '5', 'Belum Selesai'),
(19, 'T0000001', 32, 17, 'Purworejo 01,99999,Olahraga (TC) 0000000001,56', '3', 'Belum Selesai'),
(20, 'T0000001', 34, 17, 'Purworejo 01,99999,Pramuka (Dril) 0000000001,56', '9', 'Belum Selesai'),
(21, 'T0000002', 28, 5, 'Karanganom 01,09999,Merah Putih (Dril) 0000000002,56', '3', 'Belum Selesai'),
(22, 'T0000002', 31, 5, 'Karanganom 01,09999,Busana / Batik (Cemara) 0000000002,56', '5', 'Belum Selesai'),
(23, 'T0000002', 32, 5, 'Karanganom 01,09999,Olahraga (TC) 0000000002,56', '3', 'Belum Selesai'),
(24, 'T0000002', 34, 5, 'Karanganom 01,09999,Pramuka (Dril) 0000000002,56', '7', 'Belum Selesai'),
(25, 'T0000002', 28, 6, 'Karanganom 01,09999,Merah Putih (Dril) 0000000002,56', '1500000', 'Belum Selesai'),
(26, 'T0000002', 31, 6, 'Karanganom 01,09999,Busana / Batik (Cemara) 0000000002,56', '1500000', 'Belum Selesai'),
(27, 'T0000002', 32, 6, 'Karanganom 01,09999,Olahraga (TC) 0000000002,56', '1500000', 'Belum Selesai'),
(28, 'T0000002', 34, 6, 'Karanganom 01,09999,Pramuka (Dril) 0000000002,56', '1500000', 'Belum Selesai'),
(29, 'T0000002', 28, 7, 'Karanganom 01,09999,Merah Putih (Dril) 0000000002,56', '56', 'Belum Selesai'),
(30, 'T0000002', 31, 7, 'Karanganom 01,09999,Busana / Batik (Cemara) 0000000002,56', '56', 'Belum Selesai'),
(31, 'T0000002', 32, 7, 'Karanganom 01,09999,Olahraga (TC) 0000000002,56', '56', 'Belum Selesai'),
(32, 'T0000002', 34, 7, 'Karanganom 01,09999,Pramuka (Dril) 0000000002,56', '56', 'Belum Selesai'),
(33, 'T0000002', 28, 16, 'Karanganom 01,09999,Merah Putih (Dril) 0000000002,56', '3', 'Belum Selesai'),
(34, 'T0000002', 31, 16, 'Karanganom 01,09999,Busana / Batik (Cemara) 0000000002,56', '3', 'Belum Selesai'),
(35, 'T0000002', 32, 16, 'Karanganom 01,09999,Olahraga (TC) 0000000002,56', '3', 'Belum Selesai'),
(36, 'T0000002', 34, 16, 'Karanganom 01,09999,Pramuka (Dril) 0000000002,56', '3', 'Belum Selesai'),
(37, 'T0000002', 28, 17, 'Karanganom 01,09999,Merah Putih (Dril) 0000000002,56', '5', 'Belum Selesai'),
(38, 'T0000002', 31, 17, 'Karanganom 01,09999,Busana / Batik (Cemara) 0000000002,56', '9', 'Belum Selesai'),
(39, 'T0000002', 32, 17, 'Karanganom 01,09999,Olahraga (TC) 0000000002,56', '5', 'Belum Selesai'),
(40, 'T0000002', 34, 17, 'Karanganom 01,09999,Pramuka (Dril) 0000000002,56', '7', 'Belum Selesai'),
(41, 'T0000003', 30, 5, 'Karanganom 02,09999,Merah Putih (Osfot) 0000000003,28', '3', 'Belum Selesai'),
(42, 'T0000003', 31, 5, 'Karanganom 02,09999,Busana / Batik (Cemara) 0000000003,28', '7', 'Belum Selesai'),
(43, 'T0000003', 33, 5, 'Karanganom 02,09999,Olahraga (Katun) 0000000003,28', '3', 'Belum Selesai'),
(44, 'T0000003', 36, 5, 'Karanganom 02,09999,Pramuka (Osfot) 0000000003,28', '9', 'Belum Selesai'),
(45, 'T0000003', 30, 6, 'Karanganom 02,09999,Merah Putih (Osfot) 0000000003,28', '500000', 'Belum Selesai'),
(46, 'T0000003', 31, 6, 'Karanganom 02,09999,Busana / Batik (Cemara) 0000000003,28', '500000', 'Belum Selesai'),
(47, 'T0000003', 33, 6, 'Karanganom 02,09999,Olahraga (Katun) 0000000003,28', '500000', 'Belum Selesai'),
(48, 'T0000003', 36, 6, 'Karanganom 02,09999,Pramuka (Osfot) 0000000003,28', '500000', 'Belum Selesai'),
(49, 'T0000003', 30, 7, 'Karanganom 02,09999,Merah Putih (Osfot) 0000000003,28', '28', 'Belum Selesai'),
(50, 'T0000003', 31, 7, 'Karanganom 02,09999,Busana / Batik (Cemara) 0000000003,28', '28', 'Belum Selesai'),
(51, 'T0000003', 33, 7, 'Karanganom 02,09999,Olahraga (Katun) 0000000003,28', '28', 'Belum Selesai'),
(52, 'T0000003', 36, 7, 'Karanganom 02,09999,Pramuka (Osfot) 0000000003,28', '28', 'Belum Selesai'),
(53, 'T0000003', 30, 16, 'Karanganom 02,09999,Merah Putih (Osfot) 0000000003,28', '1', 'Belum Selesai'),
(54, 'T0000003', 31, 16, 'Karanganom 02,09999,Busana / Batik (Cemara) 0000000003,28', '1', 'Belum Selesai'),
(55, 'T0000003', 33, 16, 'Karanganom 02,09999,Olahraga (Katun) 0000000003,28', '1', 'Belum Selesai'),
(56, 'T0000003', 36, 16, 'Karanganom 02,09999,Pramuka (Osfot) 0000000003,28', '1', 'Belum Selesai'),
(57, 'T0000003', 30, 17, 'Karanganom 02,09999,Merah Putih (Osfot) 0000000003,28', '5', 'Belum Selesai'),
(58, 'T0000003', 31, 17, 'Karanganom 02,09999,Busana / Batik (Cemara) 0000000003,28', '5', 'Belum Selesai'),
(59, 'T0000003', 33, 17, 'Karanganom 02,09999,Olahraga (Katun) 0000000003,28', '1', 'Belum Selesai'),
(60, 'T0000003', 36, 17, 'Karanganom 02,09999,Pramuka (Osfot) 0000000003,28', '9', 'Belum Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kain`
--

CREATE TABLE `jenis_kain` (
  `id_jenis_kain` int(11) NOT NULL,
  `nama_jenis_kain` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_kain`
--

INSERT INTO `jenis_kain` (`id_jenis_kain`, `nama_jenis_kain`) VALUES
(3, 'Dril'),
(4, 'Famatex'),
(5, 'Osfot'),
(6, 'TC'),
(7, 'Katun'),
(8, 'Cemara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(3) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `atribut` enum('Benefit','Cost') NOT NULL,
  `bobot` double(3,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `atribut`, `bobot`) VALUES
(5, 'Bahan', 'Cost', 0.187),
(6, 'DP', 'Benefit', 0.151),
(7, 'Jumlah', 'Cost', 0.172),
(16, 'Kepercayaan', 'Benefit', 0.184),
(17, 'Kesulitan', 'Cost', 0.306);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(8) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `down_payment` int(11) NOT NULL,
  `total_harga` int(9) NOT NULL,
  `status_transaksi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_transaksi`, `nama_customer`, `no_hp`, `down_payment`, `total_harga`, `status_transaksi`) VALUES
('T0000001', '2021-08-09', 'Purworejo', '99999', 8000000, 18872000, 'Belum'),
('T0000002', '2021-08-09', 'Karanganom 01', '09999', 6000000, 18872000, 'Belum'),
('T0000003', '2021-08-09', 'Karanganom 02', '09999', 2000000, 8596000, 'Belum');

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
(4, 'admin', 'admin@mail.com', '$2y$10$tsWT/ayAoPFlPl0MGUZB7OwFkjNJ98etC1QyS4x3Spob0NP3namgq', 'Admin'),
(27, 'kasir', 'kasir@mail.com', '$2y$10$NfkgZ0NdeRKf3IPZKitvEOrLAvdNPkgDR0F6r5BVmqYr9UU3io8w2', 'Kasir'),
(29, 'pemilik', 'pemilik@mail.com', '$2y$10$J6UTfOV3VAFkZsw5pxKQHOITeyzNe7y02mXKRWBCZFOIKLlFQWNLi', 'Pemilik');

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
-- Indeks untuk tabel `jenis_kain`
--
ALTER TABLE `jenis_kain`
  ADD PRIMARY KEY (`id_jenis_kain`);

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
  MODIFY `id_barang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `jenis_kain`
--
ALTER TABLE `jenis_kain`
  MODIFY `id_jenis_kain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
