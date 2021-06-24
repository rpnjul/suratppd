-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jun 2021 pada 13.00
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sppd-r`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_direktur`
--

CREATE TABLE `tb_direktur` (
  `direktur_id` int(11) NOT NULL COMMENT 'ID',
  `direktur_no` char(15) NOT NULL,
  `direktur_nm` varchar(55) NOT NULL COMMENT 'Nama',
  `direktur_tlp` char(12) NOT NULL COMMENT 'Telepon',
  `direktur_eml` char(30) NOT NULL COMMENT 'Email',
  `direktur_alm` varchar(255) NOT NULL COMMENT 'Alamat',
  `direktur_snd` varchar(30) NOT NULL COMMENT 'Sandi',
  `direktur_sts` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Status'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_direktur`
--

INSERT INTO `tb_direktur` (`direktur_id`, `direktur_no`, `direktur_nm`, `direktur_tlp`, `direktur_eml`, `direktur_alm`, `direktur_snd`, `direktur_sts`) VALUES
(3, '1', 'Direktur Satria', '089537152960', 'direktur@satria.art', 'Jakarta', '1234', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nds`
--

CREATE TABLE `tb_nds` (
  `nds_id` int(11) NOT NULL COMMENT 'ID',
  `nds_no` varchar(30) NOT NULL COMMENT 'Nota dinas',
  `srtgs_no` char(30) NOT NULL COMMENT 'No Surat Tugas',
  `rcn_no` varchar(191) NOT NULL,
  `pgw_nip` char(25) NOT NULL COMMENT 'Pegawai yang bikin',
  `nds_tgl` date NOT NULL COMMENT 'Tanggal',
  `nds_dsr` text NOT NULL COMMENT 'Dasar nota'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_nds`
--

INSERT INTO `tb_nds` (`nds_id`, `nds_no`, `srtgs_no`, `rcn_no`, `pgw_nip`, `nds_tgl`, `nds_dsr`) VALUES
(1, '001/DPB/SPPD/VII/2021', '001/DJPB/SPT.S2/VII/2021', '22', '123011211111', '2021-06-24', '8123/12308/123/');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pgtgs`
--

CREATE TABLE `tb_pgtgs` (
  `srtgs_no` char(30) NOT NULL COMMENT 'No ST',
  `pgw_nip` char(25) NOT NULL COMMENT 'Pegawai pengikut '
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_pgtgs`
--

INSERT INTO `tb_pgtgs` (`srtgs_no`, `pgw_nip`) VALUES
('ST-001/WKN.08/2021', '10201011213');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pgw`
--

CREATE TABLE `tb_pgw` (
  `pgw_id` int(11) NOT NULL,
  `pgw_nip` varchar(25) NOT NULL COMMENT 'NIP Pegawai',
  `pgw_nm` varchar(45) NOT NULL COMMENT 'Nama Pegawai',
  `pgw_jnk` enum('Laki-laki','Perempuan') NOT NULL,
  `pgw_tlp` char(12) NOT NULL COMMENT 'No telp pegawai',
  `pgw_tlh` varchar(25) NOT NULL COMMENT 'Tempat lahir pegawai',
  `pgw_tll` date NOT NULL COMMENT 'Tanggal Lahir',
  `pgw_gpt` varchar(26) NOT NULL COMMENT 'Golongan dan pangkat Pegawai',
  `pgw_jab` varchar(38) NOT NULL COMMENT 'Jabatan Pegawai',
  `pgw_eml` char(30) NOT NULL,
  `pgw_snd` varchar(30) NOT NULL,
  `pgw_sts` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_pgw`
--

INSERT INTO `tb_pgw` (`pgw_id`, `pgw_nip`, `pgw_nm`, `pgw_jnk`, `pgw_tlp`, `pgw_tlh`, `pgw_tll`, `pgw_gpt`, `pgw_jab`, `pgw_eml`, `pgw_snd`, `pgw_sts`) VALUES
(36, '123011211111', 'Satria Admin', 'Laki-laki', '089253715296', 'Jakarta', '1998-04-18', 'Pembina (IV/a)', 'Admin', 'admin@satria.art', '1234', 1),
(37, '10201011213', 'Satria Pejabat', 'Laki-laki', '089537152196', 'Jakarta', '1998-04-18', 'Pengatur Muda Tk. I (II/b)', 'Pejabat', 'pejabat@satria.art', '1234', 1),
(52, '123456456456', 'Satria bobobobo', 'Laki-laki', '089854651684', 'Jakarta', '1998-04-18', 'Pengatur (II/c)', 'Pegawai', 'satria1@gmail.com', '1234', 0),
(53, '11', 'tes1', 'Laki-laki', '123123123123', 'tes1', '1998-04-18', 'Penatar Muda Tk. I (III/b)', 'Pegawai', 'tes1@tes1.com', '1234', 0),
(44, '3123123541', 'Satria Kasubbag', 'Laki-laki', '089453715219', 'Jakarta', '1998-04-18', 'Pembina Utama (IV/e)', 'Kepala Sub Bagian Umum', 'kasubbag@satria.art', '1234', 1),
(49, '1231181818', 'Satria KepalaK', 'Laki-laki', '512312512312', 'Jakarta', '1998-04-18', 'Pembina Utama Madya (IV/d)', 'Kepala Kantor', 'kepala@satria.art', '1234', 1),
(51, '10101010', 'Satria Aprilian', 'Laki-laki', '089537152960', 'Jakarta', '1998-04-18', 'Pengatur Muda Tk. (II/b)', 'Pegawai', 'pegawai@satria.art', '1234', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pgwnds`
--

CREATE TABLE `tb_pgwnds` (
  `pgwnds_id` int(11) NOT NULL,
  `nds_id` int(11) NOT NULL,
  `pgw_nip` char(25) NOT NULL,
  `pgwnds_tgl` date NOT NULL,
  `pgwnds_tmt` varchar(55) NOT NULL,
  `pgwnds_pkr` varchar(80) NOT NULL,
  `pgwnds_ket` varchar(55) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_psl`
--

CREATE TABLE `tb_psl` (
  `psl_id` int(11) NOT NULL,
  `direktur_no` char(15) NOT NULL COMMENT 'Klien id',
  `psl_no` char(30) NOT NULL COMMENT 'Nomor',
  `psl_tgl` date NOT NULL COMMENT 'Tanggal',
  `psl_prh` varchar(100) NOT NULL COMMENT 'Perihal surat',
  `psl_srt` text NOT NULL COMMENT 'Isi surat',
  `psl_sts` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Status'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_psl`
--

INSERT INTO `tb_psl` (`psl_id`, `direktur_no`, `psl_no`, `psl_tgl`, `psl_prh`, `psl_srt`, `psl_sts`) VALUES
(22, '1', 'P-010/06.2021', '2021-06-16', 'Dinas Keluar Kota', '<p>Dinas Keluar Kota</p>\r\n', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_psllmp`
--

CREATE TABLE `tb_psllmp` (
  `psllmp_id` int(11) NOT NULL,
  `psl_id` int(11) NOT NULL,
  `psllmp_dok1` varchar(55) DEFAULT NULL COMMENT 'Daftar Barang',
  `psllmp_dok2` varchar(55) DEFAULT NULL COMMENT 'Surat No rek',
  `psllmp_dok3` varchar(55) DEFAULT NULL COMMENT 'Foto sertifikat hak tanah',
  `psllmp_dok4` varchar(55) DEFAULT NULL COMMENT 'Foto perjanjian Pengalihan piutang'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_psllmp`
--

INSERT INTO `tb_psllmp` (`psllmp_id`, `psl_id`, `psllmp_dok1`, `psllmp_dok2`, `psllmp_dok3`, `psllmp_dok4`) VALUES
(11, 22, 'Permohonan12_22_1623853497.pdf', 'Permohonan12_22_16238534971.pdf', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rcn`
--

CREATE TABLE `tb_rcn` (
  `rcn_id` int(11) NOT NULL COMMENT 'ID',
  `srtgs_no` char(30) NOT NULL COMMENT 'No ST',
  `rcn_tgl` date NOT NULL,
  `pgw_nip` char(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_rcn`
--

INSERT INTO `tb_rcn` (`rcn_id`, `srtgs_no`, `rcn_tgl`, `pgw_nip`) VALUES
(22, '001/DJPB/SPT.S2/VII/2021', '2021-06-22', '123011211111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rcndtl`
--

CREATE TABLE `tb_rcndtl` (
  `rnd_id` int(11) NOT NULL COMMENT 'ID',
  `rcn_id` int(11) NOT NULL COMMENT 'ID rincian',
  `rnd_binap` int(11) DEFAULT NULL COMMENT 'Biaya Inap',
  `rnd_jmlinap` int(11) DEFAULT NULL COMMENT 'Jumlah Hari Inap',
  `rnd_btrkt` int(11) DEFAULT NULL COMMENT 'Biaya Transportasi Berangkat',
  `rnd_bplg` int(11) DEFAULT NULL COMMENT 'Biaya pulang',
  `rnd_ttype` varchar(255) DEFAULT NULL COMMENT 'Tipe Transportasi',
  `rnd_sku` int(11) DEFAULT NULL COMMENT 'Uang Saku',
  `rnd_jmlsaku` int(11) DEFAULT NULL COMMENT 'Jumlah Hari Uang sAKU',
  `rnd_ketsaku` varchar(255) DEFAULT NULL COMMENT 'Keterangan Saku',
  `rnd_tmbhn` text DEFAULT NULL COMMENT 'Keterangan Lain Lain',
  `rnd_btmbhn` int(11) DEFAULT NULL COMMENT 'Biaya Lain Lain',
  `rnd_kettmbhn` varchar(225) DEFAULT NULL COMMENT 'Keterangan Biaya Lain Lain',
  `rnd_filext` varchar(255) DEFAULT NULL COMMENT 'FILE PENDUKUNG'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_rcndtl`
--

INSERT INTO `tb_rcndtl` (`rnd_id`, `rcn_id`, `rnd_binap`, `rnd_jmlinap`, `rnd_btrkt`, `rnd_bplg`, `rnd_ttype`, `rnd_sku`, `rnd_jmlsaku`, `rnd_ketsaku`, `rnd_tmbhn`, `rnd_btmbhn`, `rnd_kettmbhn`, `rnd_filext`) VALUES
(6, 22, 1000000, 3, 3000000, 200000, 'tonline', 200000, 3, '', '', 0, '', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_srtgs`
--

CREATE TABLE `tb_srtgs` (
  `srtgs_id` int(11) NOT NULL COMMENT 'ID',
  `srtms_no` char(30) NOT NULL COMMENT 'Nomor Surat Masuk',
  `srtgs_no` varchar(30) NOT NULL COMMENT 'No Surat Tugas',
  `pgw_nip` char(25) NOT NULL COMMENT 'Pegawai bertugas',
  `srtgs_tbr` varchar(55) NOT NULL COMMENT 'Tempat Berangkat',
  `srtgs_tmt` varchar(55) NOT NULL COMMENT 'Tempat tujuan',
  `srtgs_tgl` date NOT NULL COMMENT 'Tanggal',
  `srtgs_kmb` date NOT NULL COMMENT 'Tanggal Kembali',
  `srtgs_sts` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Status'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_srtgs`
--

INSERT INTO `tb_srtgs` (`srtgs_id`, `srtms_no`, `srtgs_no`, `pgw_nip`, `srtgs_tbr`, `srtgs_tmt`, `srtgs_tgl`, `srtgs_kmb`, `srtgs_sts`) VALUES
(2, 'S-001/WKN.08/2021', '001/DJPB/SPT.S2/VII/2021', '123011211111', '', 'Bandung', '2021-06-15', '2021-06-17', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_srtms`
--

CREATE TABLE `tb_srtms` (
  `srtms_id` int(11) NOT NULL COMMENT 'ID',
  `srtms_no` char(25) NOT NULL COMMENT 'Nomor',
  `srtms_sft` enum('Biasa','Segera','Sangat Segera') NOT NULL COMMENT 'Sifat surat',
  `srtms_tgl` date NOT NULL COMMENT 'Tanggal',
  `psl_no` char(30) NOT NULL COMMENT 'No Permohonan',
  `pgw_nip` varchar(25) NOT NULL COMMENT 'Asal (Penerima) Surat',
  `srtms_sts` tinyint(4) DEFAULT 0 COMMENT 'Status'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_direktur`
--
ALTER TABLE `tb_direktur`
  ADD PRIMARY KEY (`direktur_id`),
  ADD UNIQUE KEY `kln_eml` (`direktur_eml`),
  ADD UNIQUE KEY `kln_no` (`direktur_no`);

--
-- Indeks untuk tabel `tb_nds`
--
ALTER TABLE `tb_nds`
  ADD PRIMARY KEY (`nds_id`),
  ADD UNIQUE KEY `nds_no` (`nds_no`) USING BTREE,
  ADD KEY `no spd` (`srtgs_no`),
  ADD KEY `pgw nds` (`pgw_nip`);

--
-- Indeks untuk tabel `tb_pgtgs`
--
ALTER TABLE `tb_pgtgs`
  ADD KEY `sppd no` (`srtgs_no`),
  ADD KEY `pgw pengikut` (`pgw_nip`);

--
-- Indeks untuk tabel `tb_pgw`
--
ALTER TABLE `tb_pgw`
  ADD PRIMARY KEY (`pgw_id`),
  ADD UNIQUE KEY `pgw_unq` (`pgw_nip`) USING BTREE,
  ADD UNIQUE KEY `pgw_eml` (`pgw_eml`),
  ADD UNIQUE KEY `pgw_tlp` (`pgw_tlp`);

--
-- Indeks untuk tabel `tb_pgwnds`
--
ALTER TABLE `tb_pgwnds`
  ADD PRIMARY KEY (`pgwnds_id`),
  ADD KEY `id nota` (`nds_id`),
  ADD KEY `Pgw nds` (`pgw_nip`);

--
-- Indeks untuk tabel `tb_psl`
--
ALTER TABLE `tb_psl`
  ADD PRIMARY KEY (`psl_id`),
  ADD UNIQUE KEY `pjs_no` (`psl_no`),
  ADD KEY `kln_id` (`direktur_no`);

--
-- Indeks untuk tabel `tb_psllmp`
--
ALTER TABLE `tb_psllmp`
  ADD PRIMARY KEY (`psllmp_id`),
  ADD UNIQUE KEY `psl id` (`psl_id`) USING BTREE;

--
-- Indeks untuk tabel `tb_rcn`
--
ALTER TABLE `tb_rcn`
  ADD PRIMARY KEY (`rcn_id`),
  ADD UNIQUE KEY `st no` (`srtgs_no`) USING BTREE,
  ADD KEY `pgw_nip` (`pgw_nip`);

--
-- Indeks untuk tabel `tb_rcndtl`
--
ALTER TABLE `tb_rcndtl`
  ADD PRIMARY KEY (`rnd_id`),
  ADD KEY `rcn_id` (`rcn_id`);

--
-- Indeks untuk tabel `tb_srtgs`
--
ALTER TABLE `tb_srtgs`
  ADD PRIMARY KEY (`srtgs_id`),
  ADD UNIQUE KEY `sppd_no` (`srtgs_no`) USING BTREE,
  ADD UNIQUE KEY `srtms_no` (`srtms_no`) USING BTREE,
  ADD KEY `pgw_nip` (`pgw_nip`);

--
-- Indeks untuk tabel `tb_srtms`
--
ALTER TABLE `tb_srtms`
  ADD PRIMARY KEY (`srtms_id`),
  ADD KEY `srtms_no` (`srtms_no`),
  ADD KEY `pgw_nip` (`pgw_nip`),
  ADD KEY `tb_srtms_FK` (`psl_no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_direktur`
--
ALTER TABLE `tb_direktur`
  MODIFY `direktur_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_nds`
--
ALTER TABLE `tb_nds`
  MODIFY `nds_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_pgw`
--
ALTER TABLE `tb_pgw`
  MODIFY `pgw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `tb_pgwnds`
--
ALTER TABLE `tb_pgwnds`
  MODIFY `pgwnds_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_psl`
--
ALTER TABLE `tb_psl`
  MODIFY `psl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_psllmp`
--
ALTER TABLE `tb_psllmp`
  MODIFY `psllmp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_rcn`
--
ALTER TABLE `tb_rcn`
  MODIFY `rcn_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_rcndtl`
--
ALTER TABLE `tb_rcndtl`
  MODIFY `rnd_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_srtgs`
--
ALTER TABLE `tb_srtgs`
  MODIFY `srtgs_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_srtms`
--
ALTER TABLE `tb_srtms`
  MODIFY `srtms_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
