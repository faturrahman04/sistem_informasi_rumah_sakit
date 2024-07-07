-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2024 pada 13.15
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_rs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `no_dokter` varchar(100) NOT NULL,
  `jenkel_dokter` varchar(255) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `spesialisasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `no_dokter`, `jenkel_dokter`, `no_telepon`, `alamat`, `spesialisasi`) VALUES
(1, 'Faturrahman Alfarisi', '09827893921 ', 'Laki - Laki', '0895360020446', 'Kepulauan Riau', 'Bedah Umum'),
(3, 'Nelson', '93020383838', 'Laki - Laki', '08223648239', 'Sumatera Barat', 'Psikiatri'),
(4, 'Firaz Firza Najwa Syauqillah', '38492928329', 'Laki - Laki', '082138908745', 'Kepulauan Riau', 'Nefrologi'),
(5, 'M Ziyan Amhari', '9272921937', 'Laki - Laki', '082927392927', 'Sumatera Selatan', 'Imunologi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `no_kamar` varchar(10) NOT NULL,
  `jenis_kamar` varchar(255) NOT NULL,
  `lokasi_kamar` varchar(100) NOT NULL,
  `tarif` float NOT NULL,
  `fasilitas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `no_kamar`, `jenis_kamar`, `lokasi_kamar`, `tarif`, `fasilitas`) VALUES
(1, '102', 'VIP', 'Lantai 1', 1200000, 'Televisi, Wi-Fi, AC'),
(3, '201', 'Kelas 1', 'Lantai 2', 350000, 'Televisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_suster` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `tanggal_masuk` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_pasien`, `id_dokter`, `id_suster`, `id_kamar`, `id_obat`, `tanggal_masuk`, `keterangan`) VALUES
(3, 3, 4, 1, 3, 2, '2024-07-04 15:39:00', 'Depresi Bera'),
(4, 4, 3, 1, 3, 2, '2024-07-05 10:33:00', 'Operasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `jenis_obat` varchar(100) NOT NULL,
  `kategori_obat` varchar(100) NOT NULL,
  `komposisi` varchar(100) NOT NULL,
  `dosis` varchar(50) NOT NULL,
  `indikasi` text NOT NULL,
  `tgl_kadaluarsa` date NOT NULL,
  `harga` float NOT NULL,
  `catatan_tambahan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `jenis_obat`, `kategori_obat`, `komposisi`, `dosis`, `indikasi`, `tgl_kadaluarsa`, `harga`, `catatan_tambahan`) VALUES
(2, 'Paracetamol', 'Tablet', 'Analgesik', 'Paracetamol', '500gram', 'Demam', '2025-07-04', 4000, 'Aman untuk Anak - anak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `no_pasien` varchar(100) NOT NULL,
  `lahir_pasien` date NOT NULL,
  `jenkel_pasien` varchar(255) NOT NULL,
  `alamat_pasien` varchar(255) NOT NULL,
  `telpon_pasien` varchar(15) NOT NULL,
  `goldar_pasien` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `no_pasien`, `lahir_pasien`, `jenkel_pasien`, `alamat_pasien`, `telpon_pasien`, `goldar_pasien`) VALUES
(2, 'Indra Effendi', '650087', '2002-08-21', 'Laki - Laki', 'Sumatera Utara', '089578640909', 'B'),
(3, 'Rizko Imsar', '743802', '2003-12-15', 'Laki - Laki', 'Sumatera Barat', '089563728929', 'AB'),
(4, 'Defra Anugerah Amar', '93282902', '2002-07-06', 'Laki - Laki', 'Sumatera Barat', '082938392998', 'O');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suster`
--

CREATE TABLE `suster` (
  `id_suster` int(11) NOT NULL,
  `nama_suster` varchar(255) NOT NULL,
  `no_suster` varchar(100) NOT NULL,
  `telepon_suster` varchar(14) NOT NULL,
  `email_suster` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `suster`
--

INSERT INTO `suster` (`id_suster`, `nama_suster`, `no_suster`, `telepon_suster`, `email_suster`, `provinsi`) VALUES
(1, 'Farisha Azra Salima', '758303', '082156729079', 'farishaazra4@gmail.com', 'Kepulauan Riau'),
(3, 'Annisa Awra Syafitri', '492809', '08123456789', 'annisaawra1@gmail.com', 'Jawa Barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`) VALUES
(1, 'faturrahman', 'faturrahmanalfarisi07@gmail.com', '$2y$10$JGEq0HcSKm1Guk773TrlEeEBOpcuRFvBV2KIn8H4FgImo7Rij2Eeq'),
(2, 'fatur', 'faturrahman@gmail.com', '$2y$10$7Ym6EjJbTR0v6mVA/O/tvuwkwcKt3VQ98L5h2TLpxxIEVnJ2jqa0a');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_suster` (`id_suster`),
  ADD KEY `id_kamar` (`id_kamar`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `suster`
--
ALTER TABLE `suster`
  ADD PRIMARY KEY (`id_suster`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `suster`
--
ALTER TABLE `suster`
  MODIFY `id_suster` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `laporan_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `laporan_ibfk_3` FOREIGN KEY (`id_suster`) REFERENCES `suster` (`id_suster`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `laporan_ibfk_4` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `laporan_ibfk_5` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
