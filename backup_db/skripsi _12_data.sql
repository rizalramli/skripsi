-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jun 2021 pada 11.06
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
(184, 'T0000001', 28, 5, 'Purworejo 01,082234641698,Merah Putih (Dril) 0000000001,56', '5', 'Belum Selesai'),
(185, 'T0000001', 31, 5, 'Purworejo 01,082234641698,Busana / Batik (Cemara) 0000000001,56', '5', 'Belum Selesai'),
(186, 'T0000001', 32, 5, 'Purworejo 01,082234641698,Olahraga (TC) 0000000001,56', '1', 'Belum Selesai'),
(187, 'T0000001', 34, 5, 'Purworejo 01,082234641698,Pramuka (Dril) 0000000001,56', '7', 'Belum Selesai'),
(188, 'T0000001', 28, 6, 'Purworejo 01,082234641698,Merah Putih (Dril) 0000000001,56', '2000000', 'Belum Selesai'),
(189, 'T0000001', 31, 6, 'Purworejo 01,082234641698,Busana / Batik (Cemara) 0000000001,56', '2000000', 'Belum Selesai'),
(190, 'T0000001', 32, 6, 'Purworejo 01,082234641698,Olahraga (TC) 0000000001,56', '2000000', 'Belum Selesai'),
(191, 'T0000001', 34, 6, 'Purworejo 01,082234641698,Pramuka (Dril) 0000000001,56', '2000000', 'Belum Selesai'),
(192, 'T0000001', 28, 7, 'Purworejo 01,082234641698,Merah Putih (Dril) 0000000001,56', '56', 'Belum Selesai'),
(193, 'T0000001', 31, 7, 'Purworejo 01,082234641698,Busana / Batik (Cemara) 0000000001,56', '56', 'Belum Selesai'),
(194, 'T0000001', 32, 7, 'Purworejo 01,082234641698,Olahraga (TC) 0000000001,56', '56', 'Belum Selesai'),
(195, 'T0000001', 34, 7, 'Purworejo 01,082234641698,Pramuka (Dril) 0000000001,56', '56', 'Belum Selesai'),
(196, 'T0000002', 28, 5, 'Karanganom 01,082247141420,Merah Putih (Dril) 0000000002,56', '3', 'Belum Selesai'),
(197, 'T0000002', 31, 5, 'Karanganom 01,082247141420,Busana / Batik (Cemara) 0000000002,56', '5', 'Belum Selesai'),
(198, 'T0000002', 32, 5, 'Karanganom 01,082247141420,Olahraga (TC) 0000000002,56', '3', 'Belum Selesai'),
(199, 'T0000002', 34, 5, 'Karanganom 01,082247141420,Pramuka (Dril) 0000000002,56', '7', 'Belum Selesai'),
(200, 'T0000002', 28, 6, 'Karanganom 01,082247141420,Merah Putih (Dril) 0000000002,56', '1500000', 'Belum Selesai'),
(201, 'T0000002', 31, 6, 'Karanganom 01,082247141420,Busana / Batik (Cemara) 0000000002,56', '1500000', 'Belum Selesai'),
(202, 'T0000002', 32, 6, 'Karanganom 01,082247141420,Olahraga (TC) 0000000002,56', '1500000', 'Belum Selesai'),
(203, 'T0000002', 34, 6, 'Karanganom 01,082247141420,Pramuka (Dril) 0000000002,56', '1500000', 'Belum Selesai'),
(204, 'T0000002', 28, 7, 'Karanganom 01,082247141420,Merah Putih (Dril) 0000000002,56', '56', 'Belum Selesai'),
(205, 'T0000002', 31, 7, 'Karanganom 01,082247141420,Busana / Batik (Cemara) 0000000002,56', '56', 'Belum Selesai'),
(206, 'T0000002', 32, 7, 'Karanganom 01,082247141420,Olahraga (TC) 0000000002,56', '56', 'Belum Selesai'),
(207, 'T0000002', 34, 7, 'Karanganom 01,082247141420,Pramuka (Dril) 0000000002,56', '56', 'Belum Selesai'),
(208, 'T0000003', 30, 5, 'Karanganom 02,082359374313,Merah Putih (Osfot) 0000000003,28', '3', 'Belum Selesai'),
(209, 'T0000003', 31, 5, 'Karanganom 02,082359374313,Busana / Batik (Cemara) 0000000003,28', '7', 'Belum Selesai'),
(210, 'T0000003', 33, 5, 'Karanganom 02,082359374313,Olahraga (Katun) 0000000003,28', '3', 'Belum Selesai'),
(211, 'T0000003', 36, 5, 'Karanganom 02,082359374313,Pramuka (Osfot) 0000000003,28', '9', 'Belum Selesai'),
(212, 'T0000003', 30, 6, 'Karanganom 02,082359374313,Merah Putih (Osfot) 0000000003,28', '500000', 'Belum Selesai'),
(213, 'T0000003', 31, 6, 'Karanganom 02,082359374313,Busana / Batik (Cemara) 0000000003,28', '500000', 'Belum Selesai'),
(214, 'T0000003', 33, 6, 'Karanganom 02,082359374313,Olahraga (Katun) 0000000003,28', '500000', 'Belum Selesai'),
(215, 'T0000003', 36, 6, 'Karanganom 02,082359374313,Pramuka (Osfot) 0000000003,28', '500000', 'Belum Selesai'),
(216, 'T0000003', 30, 7, 'Karanganom 02,082359374313,Merah Putih (Osfot) 0000000003,28', '28', 'Belum Selesai'),
(217, 'T0000003', 31, 7, 'Karanganom 02,082359374313,Busana / Batik (Cemara) 0000000003,28', '28', 'Belum Selesai'),
(218, 'T0000003', 33, 7, 'Karanganom 02,082359374313,Olahraga (Katun) 0000000003,28', '28', 'Belum Selesai'),
(219, 'T0000003', 36, 7, 'Karanganom 02,082359374313,Pramuka (Osfot) 0000000003,28', '28', 'Belum Selesai');

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
(5, 'Bahan', 'Cost', 0.724),
(6, 'DP', 'Benefit', 0.083),
(7, 'Jumlah', 'Cost', 0.193);

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
('T0000001', '2021-06-20', 'Purworejo 01', '082234641698', 8000000, 18872000, 'Belum'),
('T0000002', '2021-06-20', 'Karanganom 01', '082247141420', 6000000, 18872000, 'Belum'),
('T0000003', '2021-06-20', 'Karanganom 02', '082359374313', 2000000, 8596000, 'Belum');

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
(4, 'admin', 'admin@gmail.com', '$2y$10$tsWT/ayAoPFlPl0MGUZB7OwFkjNJ98etC1QyS4x3Spob0NP3namgq', 'Admin'),
(27, 'kasir', 'kasir@gmail.com', '$2y$10$NfkgZ0NdeRKf3IPZKitvEOrLAvdNPkgDR0F6r5BVmqYr9UU3io8w2', 'Kasir'),
(29, 'pemilik', 'pemilik@gmail.com', '$2y$10$J6UTfOV3VAFkZsw5pxKQHOITeyzNe7y02mXKRWBCZFOIKLlFQWNLi', 'Pemilik');

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
  MODIFY `id_detail_transaksi` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT untuk tabel `jenis_kain`
--
ALTER TABLE `jenis_kain`
  MODIFY `id_jenis_kain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
