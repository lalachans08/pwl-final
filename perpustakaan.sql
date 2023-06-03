-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 11 Des 2020 pada 09.39
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id14847421_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_buku`
--

CREATE TABLE `data_buku` (
  `ID_Buku` varchar(15) NOT NULL,
  `Judul_Buku` varchar(50) NOT NULL,
  `Pengarang` varchar(50) NOT NULL,
  `Tempat_Terbit` varchar(50) NOT NULL,
  `Penerbit` varchar(50) NOT NULL,
  `Sumber` varchar(50) NOT NULL,
  `Tahun_Terbit` varchar(50) NOT NULL,
  `Kode_ISBN` varchar(50) NOT NULL,
  `Kode_DDC` varchar(50) NOT NULL,
  `Kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_buku`
--

INSERT INTO `data_buku` (`ID_Buku`, `Judul_Buku`, `Pengarang`, `Tempat_Terbit`, `Penerbit`, `Sumber`, `Tahun_Terbit`, `Kode_ISBN`, `Kode_DDC`, `Kategori`) VALUES
('B0001', 'Bahasa Inggris kelas X', 'Pengarang 01', 'Tempat 01', 'Penerbit 01', 'Sumber 01', '2020', '777555', '777445', 'Buku Pelajaran'),
('B0002', 'Buku-002', 'Gunawan Prasetyo', 'Bogor', 'Balai Pustaka', 'Buku TI', '2020', '002020', '020200', 'Buku Praktek'),
('B0003', 'Grimoire daun 4', 'Ksatria Sihir', 'Kerajaan Clover', 'Kaisar Sihir', 'Black Clover', '2020', '777260181', '0081711618', 'Buku SIhirs'),
('B0004', 'Buku Bootstrap', 'Boot', 'Indonesia', 'Boosrtap 5', 'Bootsrtap.sample.co.id', '2021', '2020001', '0081182', 'Buku Informatika'),
('B0005', 'Bahasa Indonesia Kelas X', 'bahasa', 'Indonesia', 'sastra', 'Perpustakaan sekolah', '2020', '088817', '0002200', 'Buku Pelajaran'),
('B0006', 'Buku PHP', 'P', 'P', 'P', 'P', '2020', '1233', '444', 'Buku Praktek');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_exemplar`
--

CREATE TABLE `data_exemplar` (
  `ID_Exemplar` varchar(15) NOT NULL,
  `ID_Buku` varchar(15) NOT NULL,
  `Keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_exemplar`
--

INSERT INTO `data_exemplar` (`ID_Exemplar`, `ID_Buku`, `Keterangan`) VALUES
('EXB00010001', 'B0001', 'Active'),
('EXB00010002', 'B0001', 'Booked'),
('EXB00010003', 'B0001', 'Booked'),
('EXB00010004', 'B0001', 'Booked'),
('EXB00010005', 'B0001', 'Tersedia'),
('EXB00010006', 'B0001', 'Active'),
('EXB00020001', 'B0002', 'Booked'),
('EXB00030001', 'B0003', 'Booked'),
('EXB00040001', 'B0004', 'Tersedia'),
('EXB00040002', 'B0004', 'Active'),
('EXB00050001', 'B0005', 'Tersedia'),
('EXB00050002', 'B0005', 'Booked'),
('EXB00060001', 'B0006', 'Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi_denda`
--

CREATE TABLE `konfigurasi_denda` (
  `ID_Konfigurasi` varchar(15) NOT NULL,
  `Tahun` varchar(50) NOT NULL,
  `Nominal` varchar(50) NOT NULL,
  `Terakhir_Ubah` varchar(50) NOT NULL,
  `Waktu_Ubah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konfigurasi_denda`
--

INSERT INTO `konfigurasi_denda` (`ID_Konfigurasi`, `Tahun`, `Nominal`, `Terakhir_Ubah`, `Waktu_Ubah`) VALUES
('D001', '2020', '999', '2020-09-14', '19:37:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_peminjaman`
--

CREATE TABLE `laporan_peminjaman` (
  `ID_Laporan` varchar(15) NOT NULL,
  `ID_Pinjam` varchar(15) NOT NULL,
  `ID_Exemplar` varchar(15) NOT NULL,
  `ID_User` varchar(15) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Judul_Buku` varchar(50) NOT NULL,
  `Tanggal_Pinjam` varchar(50) NOT NULL,
  `Tanggal_Selesai` varchar(50) NOT NULL,
  `Tanggal_Konfirmasi` varchar(50) NOT NULL,
  `Denda` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan_peminjaman`
--

INSERT INTO `laporan_peminjaman` (`ID_Laporan`, `ID_Pinjam`, `ID_Exemplar`, `ID_User`, `Username`, `Nama`, `Judul_Buku`, `Tanggal_Pinjam`, `Tanggal_Selesai`, `Tanggal_Konfirmasi`, `Denda`) VALUES
('LP0001', 'P0001', 'EXB00020001', 'AG0003', 'Bagasc', 'Bagas Widiyanto', 'Buku-002', '2021-07-07', '2020-07-10', '2020-07-11', '500'),
('LP0002', 'P0002', 'EXB00019999', 'AG0003', 'Bagasc', 'Bagas Widiyanto', 'Buku-001', '2020-01-07', '2020-07-10', '2020-09-10', '62000'),
('LP0003', 'P0004', 'EXB00019999', 'AG0002', 'Gunawan', 'Gunawan Prasetyo', 'Buku-001', '2020-03-07', '2020-07-20', '2020-07-20', '0'),
('LP0004', 'P0009', 'EXB00020001', 'AG0002', 'Gunawan', 'Gunawan Prasetyo', 'Buku-002', '2020-02-09', '2020-07-29', '2020-07-13', '0'),
('LP0005', 'P0006', 'EXB00019999', 'AG0005', 'Alif', 'Alif Widiyanto', 'Buku-001', '2020-07-09', '2020-12-20', '2020-07-21', '1000'),
('LP0006', 'P0007', 'EXB00010002', 'AG0004', 'Bagas', 'Widiyanto Bagas', 'Buku-001', '2020-07-09', '2020-07-25', '2020-07-09', '0'),
('LP0007', 'P0008', 'EXB00020001', 'AG0002', 'Gunawan', 'Gunawan Prasetyo', 'Buku-002', '2020-07-09', '2020-07-25', '2020-07-09', '0'),
('LP0008', 'P0010', 'EXB00020001', 'AG0002', 'Gunawan', 'Gunawan Prasetyo', 'Buku-002', '2020-12-11', '2020-07-18', '2020-07-20', '2000'),
('LP0009', 'P0011', 'EXB00020001', 'AG0006', 'Candra', 'Candra ariadi', 'Buku-002', '2020-07-11', '2020-07-25', '2020-07-13', '0'),
('LP0010', 'P0012', 'EXB00010001', 'AG0004', 'Bagas', 'Bagas Widiyanto', 'Buku-001', '2020-07-16', '2020-07-18', '2020-07-16', '0'),
('LP0011', 'P0001', 'EXB00010001', 'AG0002', 'Gunawan', 'Gunawan Prasetyo', 'Buku-001', '2020-07-23', '2020-07-25', '2020-07-26', '1000'),
('LP0012', 'P0002', 'EXB00010001', 'AG0002', 'Gunawan', 'Gunawan Prasetyo', 'Buku-001', '2020-07-25', '2020-08-08', '2020-08-09', '1000'),
('LP0013', 'P0003', 'EXB00010001', 'AG0002', 'Gunawan', 'Gunawan Prasetyo', 'Buku-001', '2020-07-25', '2020-08-01', '2020-07-25', '0'),
('LP0014', 'P0004', 'EXB00010002', 'AG0002', 'Gunawan', 'Gunawan Prasetyo', 'Bahasa Inggris kelas X', '2020-03-25', '2020-08-01', '2020-09-13', '537500'),
('LP0015', 'P0006', 'EXB00040001', 'AG0003', 'Bagasc', 'Bagas Widiyanto', 'Buku Bootstrap', '2020-07-27', '2020-07-30', '2020-12-10', '132867');

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_peminjaman`
--

CREATE TABLE `list_peminjaman` (
  `ID_Pinjam` varchar(15) NOT NULL,
  `ID_Exemplar` varchar(15) NOT NULL,
  `ID_Buku` varchar(15) NOT NULL,
  `ID_User` varchar(15) NOT NULL,
  `Waktu_Pinjam` varchar(50) NOT NULL,
  `Tanggal_Pinjam` varchar(50) NOT NULL,
  `Tanggal_Selesai` varchar(50) NOT NULL,
  `Tanggal_Konfirmasi` varchar(50) NOT NULL,
  `Alasan` longtext NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Status_Konfirmasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `list_peminjaman`
--

INSERT INTO `list_peminjaman` (`ID_Pinjam`, `ID_Exemplar`, `ID_Buku`, `ID_User`, `Waktu_Pinjam`, `Tanggal_Pinjam`, `Tanggal_Selesai`, `Tanggal_Konfirmasi`, `Alasan`, `Status`, `Status_Konfirmasi`) VALUES
('P0001', 'EXB00010001', 'B0001', 'AG0002', '19:44:09', '2020-01-23', '2020-07-25', '2020-07-26', '', 'Selesai', 'Sudah Konfirmasi'),
('P0002', 'EXB00010001', 'B0001', 'AG0002', '10:30:23', '2020-07-25', '2020-08-08', '2020-08-09', '', 'Selesai', 'Sudah Konfirmasi'),
('P0003', 'EXB00010001', 'B0001', 'AG0002', '12:58:54', '2020-06-25', '2020-08-01', '2020-07-25', '', 'Selesai', 'Sudah Konfirmasi'),
('P0004', 'EXB00010002', 'B0001', 'AG0002', '15:25:02', '2020-03-25', '2020-08-01', '2020-09-13', '', 'Selesai', 'Sudah Konfirmasi'),
('P0005', 'EXB00010001', 'B0001', 'AG0002', '11:00:14', '2020-09-27', '2020-07-30', '', 'Buku Habis', 'Reject', ''),
('P0006', 'EXB00040001', 'B0004', 'AG0003', '16:42:47', '2020-07-27', '2020-07-30', '2020-12-10', '', 'Selesai', 'Sudah Konfirmasi'),
('P0007', 'EXB00030001', 'B0003', 'AG0005', '19:23:23', '2020-05-27', '2020-07-30', '', 'gadaaa', 'Reject', ''),
('P0008', 'EXB00050001', 'B0005', 'AG0002', '15:40:11', '2020-07-28', '2020-07-30', '2020-12-10', '', 'Selesai', 'Belum Konfirmasi'),
('P0009', 'EXB00040002', 'B0004', 'AG0002', '13:06:51', '2020-08-05', '2020-08-08', '', '', 'Active', ''),
('P0010', 'EXB00010001', 'B0001', 'AG0002', '09:49:52', '2020-09-13', '2020-09-01', '', '', 'Active', ''),
('P0011', 'EXB00010003', 'B0001', 'AG0002', '13:41:54', '2020-09-13', '2020-09-20', '', '', 'Menunggu', ''),
('P0012', 'EXB00030001', 'B0003', 'AG0002', '15:14:53', '2020-09-13', '2020-09-20', '2020-09-13', '', 'Selesai', 'Belum Konfirmasi'),
('P0013', 'EXB00010002', 'B0001', 'AG0002', '15:46:17', '2020-09-13', '2020-09-30', '', '', 'Menunggu', ''),
('P0014', 'EXB00050002', 'B0005', 'AG0007', '16:26:10', '2020-09-13', '2020-09-20', '', '', 'Menunggu', ''),
('P0015', 'EXB00030001', 'B0003', 'AG0006', '16:30:57', '2020-09-13', '2020-09-20', '', '', 'Menunggu', ''),
('P0016', 'EXB00010004', 'B0001', 'AG0002', '20:08:53', '2020-09-13', '2020-09-30', '', '', 'Menunggu', ''),
('P0017', 'EXB00010005', 'B0001', 'KP001', '17:08:16', '2020-12-10', '2020-12-10', '2020-12-10', '', 'Selesai', 'Belum Konfirmasi'),
('P0018', 'EXB00010006', 'B0001', 'KP001', '17:09:47', '2020-12-10', '2020-12-10', '', '', 'Active', ''),
('P0019', 'EXB00020001', 'B0002', 'KP001', '17:09:58', '2020-12-10', '2020-12-10', '', '', 'Menunggu', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `ID_User` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `No_Telp` varchar(50) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `Level` varchar(50) NOT NULL,
  `Last_Login` varchar(50) NOT NULL,
  `Status_Anggota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID_User`, `Username`, `Nama`, `Password`, `No_Telp`, `Alamat`, `Level`, `Last_Login`, `Status_Anggota`) VALUES
('AG0002', 'Gunawan', 'Gunawan Prasetyo', 'a77d5516bebad4fef7dfcb34b180f44e', '082249495157', 'Jl. Albaliyah rt05/012, Pabuaran, Cibinzong, Bogor, Jawa Barat, Indonesia.', 'Anggota', 'Senin, 14 September 2020 - 19:36:48', 'Aktif'),
('AG0003', 'Bagasc', 'Bagas Widiyanto', '202cb962ac59075b964b07152d234b70', '082726373261', 'Jl. Bedahan, Cilodong, Bogor, Jawa Barat', 'Anggota', 'Senin, 27 Juli 2020 - 16:42:56', 'Aktif'),
('AG0004', 'Bagas', 'Bagas W', '202cb962ac59075b964b07152d234b70', '081272728622', 'Dimana bae \r\n', 'Anggota', 'Senin, 27 Juli 2020 - 15:04:07', 'Aktif'),
('AG0005', 'Alif', 'Alif Widiyanto', '202cb962ac59075b964b07152d234b70', '08228', 'jaja', 'Anggota', 'Minggu, 13 September 2020 - 08:53:17', 'Aktif'),
('AG0006', 'Candra', 'Candra ariadi', '202cb962ac59075b964b07152d234b70', '082374828384', 'Bogors', 'Anggota', 'Kamis, 05 November 2020 - 21:20:27', 'Aktif'),
('AG0007', 'hendrik', 'Hendrikz', '202cb962ac59075b964b07152d234b70', '099', 'Citeureup', 'Anggota', 'Minggu, 13 September 2020 - 16:26:38', 'Aktif'),
('AG0008', 'User123', 'User-Test', '202cb962ac59075b964b07152d234b70', '0887', 'Jalan.Jalan', 'Anggota', 'Senin, 14 September 2020 - 13:37:49', 'Aktif'),
('APM001', 'Peminjaman', 'Admin Peminjaman', '202cb962ac59075b964b07152d234b70', '018378232837', 'Jl. Albaliyah rt05/012, Pabuaran, Cibinong, Bogor, Jawa Barat', 'Admin Peminjaman', 'Kamis, 10 Desember 2020 - 17:06:09', ''),
('APR001', 'Penerimaan', 'Admin penerimaan', '202cb962ac59075b964b07152d234b70', '08272626262', 'Bogor, Jawa barat', 'Admin Penerimaan', 'Kamis, 19 November 2020 - 18:00:26', ''),
('KP001', 'Kepala Sekolah', 'Ali Ghazali', '202cb962ac59075b964b07152d234b70', '008223939283', 'Cibinong,Bogord', 'Kepala Sekolah', 'Kamis, 10 Desember 2020 - 17:03:53', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_buku`
--
ALTER TABLE `data_buku`
  ADD PRIMARY KEY (`ID_Buku`);

--
-- Indeks untuk tabel `data_exemplar`
--
ALTER TABLE `data_exemplar`
  ADD PRIMARY KEY (`ID_Exemplar`),
  ADD KEY `ID_Buku` (`ID_Buku`);

--
-- Indeks untuk tabel `konfigurasi_denda`
--
ALTER TABLE `konfigurasi_denda`
  ADD PRIMARY KEY (`ID_Konfigurasi`);

--
-- Indeks untuk tabel `laporan_peminjaman`
--
ALTER TABLE `laporan_peminjaman`
  ADD PRIMARY KEY (`ID_Laporan`);

--
-- Indeks untuk tabel `list_peminjaman`
--
ALTER TABLE `list_peminjaman`
  ADD PRIMARY KEY (`ID_Pinjam`),
  ADD KEY `ID_Exemplar` (`ID_Exemplar`),
  ADD KEY `list_peminjaman_ibfk_2` (`ID_Buku`),
  ADD KEY `ID_User` (`ID_User`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_User`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD KEY `Username_2` (`Username`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_exemplar`
--
ALTER TABLE `data_exemplar`
  ADD CONSTRAINT `data_exemplar_ibfk_1` FOREIGN KEY (`ID_Buku`) REFERENCES `data_buku` (`ID_Buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `list_peminjaman`
--
ALTER TABLE `list_peminjaman`
  ADD CONSTRAINT `list_peminjaman_ibfk_1` FOREIGN KEY (`ID_Exemplar`) REFERENCES `data_exemplar` (`ID_Exemplar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `list_peminjaman_ibfk_2` FOREIGN KEY (`ID_Buku`) REFERENCES `data_buku` (`ID_Buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `list_peminjaman_ibfk_3` FOREIGN KEY (`ID_User`) REFERENCES `user` (`ID_User`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
