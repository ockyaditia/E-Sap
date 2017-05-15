-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Mar 2017 pada 06.08
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e_sap`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE IF NOT EXISTS `absensi` (
  `id_absensi` varchar(50) NOT NULL,
  `kd_mata_kuliah` varchar(50) NOT NULL,
  `npm` text NOT NULL,
  `w1` text NOT NULL,
  `w2` text NOT NULL,
  `w3` text NOT NULL,
  `w4` text NOT NULL,
  `w5` text NOT NULL,
  `w6` text NOT NULL,
  `w7` text NOT NULL,
  `w8` text NOT NULL,
  `w9` text NOT NULL,
  `w10` text NOT NULL,
  `w11` text NOT NULL,
  `w12` text NOT NULL,
  `w13` text NOT NULL,
  `w14` text NOT NULL,
  `w15` text NOT NULL,
  `w16` text NOT NULL,
  `sign` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `kd_mata_kuliah`, `npm`, `w1`, `w2`, `w3`, `w4`, `w5`, `w6`, `w7`, `w8`, `w9`, `w10`, `w11`, `w12`, `w13`, `w14`, `w15`, `w16`, `sign`) VALUES
('TI-2017-CRY-6-TEORI-1', 'TI-2017-CRY', '1402012001, 1402012002, 1402014082, ', '1402012001-1, 1402014082-1, ', '1402014082-1, ', '1402012002-1, ', '1402014082-1, ', '1402012002-1, ', '1402012002-1, ', '1402012001-1, ', '1402012002-1, ', '1402014082-1, ', '1402012002-1, ', '1402012001-1, ', '1402012001-1, 1402014082-1, ', '1402012002-1, ', '1402014082-1, ', '1402012002-1, ', '1402014082-1, ', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE IF NOT EXISTS `krs` (
  `npm` varchar(50) DEFAULT NULL,
  `kd_mata_kuliah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `krs`
--

INSERT INTO `krs` (`npm`, `kd_mata_kuliah`) VALUES
('1402014082', 'TI-2017-CRY'),
('1402012001', 'TI-2017-CRY'),
('1402012002', 'TI-2017-CRY');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laboratorium`
--

CREATE TABLE IF NOT EXISTS `laboratorium` (
  `kd_ruang` varchar(50) NOT NULL,
  `kd_prodi` varchar(50) NOT NULL,
  `nik_dosen_pj` varchar(50) DEFAULT NULL,
  `nama_lab` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laboratorium`
--

INSERT INTO `laboratorium` (`kd_ruang`, `kd_prodi`, `nik_dosen_pj`, `nama_lab`) VALUES
('LAB-TI-FTI-UY-05-01', 'TI-FTI-UY-05', '1402012089', 'Komputasional Cerdas (KC)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliah`
--

CREATE TABLE IF NOT EXISTS `mata_kuliah` (
  `kd_mata_kuliah` varchar(50) NOT NULL,
  `kd_prodi` varchar(50) NOT NULL,
  `nama_mata_kuliah` varchar(100) NOT NULL,
  `semester` int(5) NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL,
  `sks_teori` int(5) DEFAULT NULL,
  `sks_praktikum` int(5) DEFAULT NULL,
  `total_sks` int(5) NOT NULL,
  `sifat` enum('Wajib','Pilihan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`kd_mata_kuliah`, `kd_prodi`, `nama_mata_kuliah`, `semester`, `tahun_ajaran`, `sks_teori`, `sks_praktikum`, `total_sks`, `sifat`) VALUES
('TI-2017-CRY', 'TI-FTI-UY-05', 'Cryptografi', 6, '2016/2017', 3, 1, 4, 'Pilihan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_dosen`
--

CREATE TABLE IF NOT EXISTS `mst_dosen` (
  `nik` varchar(50) NOT NULL,
  `kd_prodi` varchar(50) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_dosen`
--

INSERT INTO `mst_dosen` (`nik`, `kd_prodi`, `nama_dosen`, `jabatan`) VALUES
('1102012089', 'KU-FK-UY-01', 'Adara Zahra Callysta', ''),
('1402005001', 'TI-FTI-UY-05', 'Azzahra Calldystra', 'KPS'),
('1402012089', 'TI-FTI-UY-05', 'Ocky Aditia Saputra', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_fakultas`
--

CREATE TABLE IF NOT EXISTS `mst_fakultas` (
  `kd_fakultas` varchar(50) NOT NULL,
  `nama_fakultas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_fakultas`
--

INSERT INTO `mst_fakultas` (`kd_fakultas`, `nama_fakultas`) VALUES
('FK-UY-01', 'Kedokteran'),
('FTI-UY-05', 'Teknologi Informasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mst_mahasiswa` (
  `npm` varchar(50) NOT NULL,
  `kd_prodi` varchar(50) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_mahasiswa`
--

INSERT INTO `mst_mahasiswa` (`npm`, `kd_prodi`, `nama_mahasiswa`) VALUES
('1102012094', 'KU-FK-UY-01', 'Milatianingrum'),
('1402012001', 'TI-FTI-UY-05', 'Adara'),
('1402012002', 'TI-FTI-UY-05', 'Zahra'),
('1402014082', 'TI-FTI-UY-05', 'Rahmadhina Ajeng');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_program_studi`
--

CREATE TABLE IF NOT EXISTS `mst_program_studi` (
  `kd_prodi` varchar(50) NOT NULL,
  `kd_fakultas` varchar(50) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_program_studi`
--

INSERT INTO `mst_program_studi` (`kd_prodi`, `kd_fakultas`, `nama_prodi`) VALUES
('KU-FK-UY-01', 'FK-UY-01', 'Kedokteran Umum'),
('TI-FTI-UY-05', 'FTI-UY-05', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_tata_usaha`
--

CREATE TABLE IF NOT EXISTS `mst_tata_usaha` (
  `nik` varchar(50) NOT NULL,
  `kd_prodi` varchar(50) NOT NULL,
  `nama_tata_usaha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_tata_usaha`
--

INSERT INTO `mst_tata_usaha` (`nik`, `kd_prodi`, `nama_tata_usaha`) VALUES
('0023022017', '', 'TU Universitas'),
('0123022017', 'KU-FK-UY-01', 'TU FK'),
('0523022017', 'TI-FTI-UY-05', 'TU FTI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelaksanaan_perkuliahan`
--

CREATE TABLE IF NOT EXISTS `pelaksanaan_perkuliahan` (
  `id_pelaksanaan_perkuliahan` varchar(50) NOT NULL,
  `kd_mata_kuliah` varchar(50) NOT NULL,
  `kd_ruang` varchar(50) NOT NULL,
  `nik_tata_usaha` varchar(50) DEFAULT NULL,
  `hari_perkuliahan` varchar(15) NOT NULL,
  `jam_perkuliahan` varchar(20) NOT NULL,
  `hari_dan_tgl_rencana1` varchar(50) NOT NULL,
  `hari_dan_tgl_rencana2` varchar(50) NOT NULL,
  `hari_dan_tgl_rencana3` varchar(50) NOT NULL,
  `hari_dan_tgl_rencana4` varchar(50) NOT NULL,
  `hari_dan_tgl_rencana5` varchar(50) NOT NULL,
  `hari_dan_tgl_rencana6` varchar(50) NOT NULL,
  `hari_dan_tgl_rencana7` varchar(50) NOT NULL,
  `hari_dan_tgl_rencana8` varchar(50) NOT NULL,
  `hari_dan_tgl_realisasi1` varchar(50) NOT NULL,
  `hari_dan_tgl_realisasi2` varchar(50) NOT NULL,
  `hari_dan_tgl_realisasi3` varchar(50) NOT NULL,
  `hari_dan_tgl_realisasi4` varchar(50) NOT NULL,
  `hari_dan_tgl_realisasi5` varchar(50) NOT NULL,
  `hari_dan_tgl_realisasi6` varchar(50) NOT NULL,
  `hari_dan_tgl_realisasi7` varchar(50) NOT NULL,
  `hari_dan_tgl_realisasi8` varchar(50) NOT NULL,
  `jam_mulai1` varchar(15) NOT NULL,
  `jam_mulai2` varchar(15) NOT NULL,
  `jam_mulai3` varchar(15) NOT NULL,
  `jam_mulai4` varchar(15) NOT NULL,
  `jam_mulai5` varchar(15) NOT NULL,
  `jam_mulai6` varchar(15) NOT NULL,
  `jam_mulai7` varchar(15) NOT NULL,
  `jam_mulai8` varchar(15) NOT NULL,
  `jam_selesai1` varchar(15) NOT NULL,
  `jam_selesai2` varchar(15) NOT NULL,
  `jam_selesai3` varchar(15) NOT NULL,
  `jam_selesai4` varchar(15) NOT NULL,
  `jam_selesai5` varchar(15) NOT NULL,
  `jam_selesai6` varchar(15) NOT NULL,
  `jam_selesai7` varchar(15) NOT NULL,
  `jam_selesai8` varchar(15) NOT NULL,
  `materi_kuliah1` text NOT NULL,
  `materi_kuliah2` text NOT NULL,
  `materi_kuliah3` text NOT NULL,
  `materi_kuliah4` text NOT NULL,
  `materi_kuliah5` text NOT NULL,
  `materi_kuliah6` text NOT NULL,
  `materi_kuliah7` text NOT NULL,
  `materi_kuliah8` text NOT NULL,
  `sign_dosen1` int(5) NOT NULL DEFAULT '0',
  `sign_dosen2` int(5) NOT NULL DEFAULT '0',
  `sign_dosen3` int(5) NOT NULL DEFAULT '0',
  `sign_dosen4` int(5) NOT NULL DEFAULT '0',
  `sign_dosen5` int(5) NOT NULL DEFAULT '0',
  `sign_dosen6` int(5) NOT NULL DEFAULT '0',
  `sign_dosen7` int(5) NOT NULL DEFAULT '0',
  `sign_dosen8` int(5) NOT NULL DEFAULT '0',
  `sign_mahasiswa1` int(5) NOT NULL DEFAULT '0',
  `sign_mahasiswa2` int(5) NOT NULL DEFAULT '0',
  `sign_mahasiswa3` int(5) NOT NULL DEFAULT '0',
  `sign_mahasiswa4` int(5) NOT NULL DEFAULT '0',
  `sign_mahasiswa5` int(5) NOT NULL DEFAULT '0',
  `sign_mahasiswa6` int(5) NOT NULL DEFAULT '0',
  `sign_mahasiswa7` int(5) NOT NULL DEFAULT '0',
  `sign_mahasiswa8` int(5) NOT NULL DEFAULT '0',
  `sign_tu1` int(5) NOT NULL DEFAULT '0',
  `sign_tu2` int(5) NOT NULL DEFAULT '0',
  `sign_tu3` int(5) NOT NULL DEFAULT '0',
  `sign_tu4` int(5) NOT NULL DEFAULT '0',
  `sign_tu5` int(5) NOT NULL DEFAULT '0',
  `sign_tu6` int(5) NOT NULL DEFAULT '0',
  `sign_tu7` int(5) NOT NULL DEFAULT '0',
  `sign_tu8` int(5) NOT NULL DEFAULT '0',
  `keterangan1` text NOT NULL,
  `keterangan2` text NOT NULL,
  `keterangan3` text NOT NULL,
  `keterangan4` text NOT NULL,
  `keterangan5` text NOT NULL,
  `keterangan6` text NOT NULL,
  `keterangan7` text NOT NULL,
  `keterangan8` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelaksanaan_perkuliahan`
--

INSERT INTO `pelaksanaan_perkuliahan` (`id_pelaksanaan_perkuliahan`, `kd_mata_kuliah`, `kd_ruang`, `nik_tata_usaha`, `hari_perkuliahan`, `jam_perkuliahan`, `hari_dan_tgl_rencana1`, `hari_dan_tgl_rencana2`, `hari_dan_tgl_rencana3`, `hari_dan_tgl_rencana4`, `hari_dan_tgl_rencana5`, `hari_dan_tgl_rencana6`, `hari_dan_tgl_rencana7`, `hari_dan_tgl_rencana8`, `hari_dan_tgl_realisasi1`, `hari_dan_tgl_realisasi2`, `hari_dan_tgl_realisasi3`, `hari_dan_tgl_realisasi4`, `hari_dan_tgl_realisasi5`, `hari_dan_tgl_realisasi6`, `hari_dan_tgl_realisasi7`, `hari_dan_tgl_realisasi8`, `jam_mulai1`, `jam_mulai2`, `jam_mulai3`, `jam_mulai4`, `jam_mulai5`, `jam_mulai6`, `jam_mulai7`, `jam_mulai8`, `jam_selesai1`, `jam_selesai2`, `jam_selesai3`, `jam_selesai4`, `jam_selesai5`, `jam_selesai6`, `jam_selesai7`, `jam_selesai8`, `materi_kuliah1`, `materi_kuliah2`, `materi_kuliah3`, `materi_kuliah4`, `materi_kuliah5`, `materi_kuliah6`, `materi_kuliah7`, `materi_kuliah8`, `sign_dosen1`, `sign_dosen2`, `sign_dosen3`, `sign_dosen4`, `sign_dosen5`, `sign_dosen6`, `sign_dosen7`, `sign_dosen8`, `sign_mahasiswa1`, `sign_mahasiswa2`, `sign_mahasiswa3`, `sign_mahasiswa4`, `sign_mahasiswa5`, `sign_mahasiswa6`, `sign_mahasiswa7`, `sign_mahasiswa8`, `sign_tu1`, `sign_tu2`, `sign_tu3`, `sign_tu4`, `sign_tu5`, `sign_tu6`, `sign_tu7`, `sign_tu8`, `keterangan1`, `keterangan2`, `keterangan3`, `keterangan4`, `keterangan5`, `keterangan6`, `keterangan7`, `keterangan8`) VALUES
('TI-2017-CRY-6-TEORI-1', 'TI-2017-CRY', 'RUANG-TI-FTI-UY-05-01', '0523022017', 'Selasa', '09.00-11.30', '03/01/2017', '03/01/2017', '03/01/2017', '03/01/2017', '03/01/2017', '03/01/2017', '03/01/2017', '03/01/2017', '03/10/2017', '', '', '', '', '', '', '', '09.00', '', '', '', '', '', '', '', '11.30', '', '', '', '', '', '', '', 'Pengantar 1, , , , , , , , , ', ', , , , , , , , , ', ', , , , , , , , , ', ', , , , , , , , , ', ', , , , , , , , , ', ', , , , , , , , , ', ', , , , , , , , , ', ', , , , , , , , , ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Keterangan', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian_materi_kuliah`
--

CREATE TABLE IF NOT EXISTS `rincian_materi_kuliah` (
  `kd_mata_kuliah` varchar(50) NOT NULL,
  `topik1` text NOT NULL,
  `topik2` text NOT NULL,
  `topik3` text NOT NULL,
  `topik4` text NOT NULL,
  `topik5` text NOT NULL,
  `topik6` text NOT NULL,
  `topik7` text NOT NULL,
  `topik8` text NOT NULL,
  `topik9` text NOT NULL,
  `topik10` text NOT NULL,
  `topik11` text NOT NULL,
  `topik12` text NOT NULL,
  `topik13` text NOT NULL,
  `topik14` text NOT NULL,
  `topik15` text NOT NULL,
  `topik16` text NOT NULL,
  `sub_topik1` text NOT NULL,
  `sub_topik2` text NOT NULL,
  `sub_topik3` text NOT NULL,
  `sub_topik4` text NOT NULL,
  `sub_topik5` text NOT NULL,
  `sub_topik6` text NOT NULL,
  `sub_topik7` text NOT NULL,
  `sub_topik8` text NOT NULL,
  `sub_topik9` text NOT NULL,
  `sub_topik10` text NOT NULL,
  `sub_topik11` text NOT NULL,
  `sub_topik12` text NOT NULL,
  `sub_topik13` text NOT NULL,
  `sub_topik14` text NOT NULL,
  `sub_topik15` text NOT NULL,
  `sub_topik16` text NOT NULL,
  `tik1` text NOT NULL,
  `tik2` text NOT NULL,
  `tik3` text NOT NULL,
  `tik4` text NOT NULL,
  `tik5` text NOT NULL,
  `tik6` text NOT NULL,
  `tik7` text NOT NULL,
  `tik8` text NOT NULL,
  `tik9` text NOT NULL,
  `tik10` text NOT NULL,
  `tik11` text NOT NULL,
  `tik12` text NOT NULL,
  `tik13` text NOT NULL,
  `tik14` text NOT NULL,
  `tik15` text NOT NULL,
  `tik16` text NOT NULL,
  `kegiatan_belajar1` varchar(15) NOT NULL,
  `kegiatan_belajar2` varchar(15) NOT NULL,
  `kegiatan_belajar3` varchar(15) NOT NULL,
  `kegiatan_belajar4` varchar(15) NOT NULL,
  `kegiatan_belajar5` varchar(15) NOT NULL,
  `kegiatan_belajar6` varchar(15) NOT NULL,
  `kegiatan_belajar7` varchar(15) NOT NULL,
  `kegiatan_belajar8` varchar(15) NOT NULL,
  `kegiatan_belajar9` varchar(15) NOT NULL,
  `kegiatan_belajar10` varchar(15) NOT NULL,
  `kegiatan_belajar11` varchar(15) NOT NULL,
  `kegiatan_belajar12` varchar(15) NOT NULL,
  `kegiatan_belajar13` varchar(15) NOT NULL,
  `kegiatan_belajar14` varchar(15) NOT NULL,
  `kegiatan_belajar15` varchar(15) NOT NULL,
  `kegiatan_belajar16` varchar(15) NOT NULL,
  `sign_koordinator_mata_kuliah` int(5) NOT NULL,
  `sign_koordinator_program_studi` int(5) NOT NULL,
  `tanggal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rincian_materi_kuliah`
--

INSERT INTO `rincian_materi_kuliah` (`kd_mata_kuliah`, `topik1`, `topik2`, `topik3`, `topik4`, `topik5`, `topik6`, `topik7`, `topik8`, `topik9`, `topik10`, `topik11`, `topik12`, `topik13`, `topik14`, `topik15`, `topik16`, `sub_topik1`, `sub_topik2`, `sub_topik3`, `sub_topik4`, `sub_topik5`, `sub_topik6`, `sub_topik7`, `sub_topik8`, `sub_topik9`, `sub_topik10`, `sub_topik11`, `sub_topik12`, `sub_topik13`, `sub_topik14`, `sub_topik15`, `sub_topik16`, `tik1`, `tik2`, `tik3`, `tik4`, `tik5`, `tik6`, `tik7`, `tik8`, `tik9`, `tik10`, `tik11`, `tik12`, `tik13`, `tik14`, `tik15`, `tik16`, `kegiatan_belajar1`, `kegiatan_belajar2`, `kegiatan_belajar3`, `kegiatan_belajar4`, `kegiatan_belajar5`, `kegiatan_belajar6`, `kegiatan_belajar7`, `kegiatan_belajar8`, `kegiatan_belajar9`, `kegiatan_belajar10`, `kegiatan_belajar11`, `kegiatan_belajar12`, `kegiatan_belajar13`, `kegiatan_belajar14`, `kegiatan_belajar15`, `kegiatan_belajar16`, `sign_koordinator_mata_kuliah`, `sign_koordinator_program_studi`, `tanggal`) VALUES
('TI-2017-CRY', 'Introduction', 'Tata Kelola', 'Nilai dan Resiko TI bagi organisasi', 'Tata kelola TI', 'Tata kelola Informasi', 'Tata kelola organisasi', 'Review materi', 'Ujian Tengah Semester (UTS)', 'Kebijakan, Akuntabilitas Pengelolaan sumberdaya', 'Organisasi pengelola sumber daya TI', 'Indikator kinerja', 'Implementasi tata kelola', 'Studi kasus', 'Studi kasus', 'Review Materi', 'Ujian Akhir Semester (UAS)', 'Pengantar 1, , , , , , , , , ', 'Definisi, , , , , , , , , ', 'Nilai dan peran TI terhadap kinerja organisasi, , , , , , , , , ', 'Elemen-elemen tata kelola TI dalam organisasi, , , , , , , , , ', 'Elemen-elemen tata kelola informasi, , , , , , , , , ', 'Elemen-elemen tatakelola organisasi,, , , , , , , , , ', 'Review materi, , , , , , , , , ', 'Ujian tertulis, , , , , , , , , ', 'Kebijakan pengelolaan sumberdaya, , , , , , , , , ', 'Organisasi TI, , , , , , , , , ', 'Ukuran kinerja, , , , , , , , , ', 'Area fokus tata kelola TI, , , , , , , , , ', 'Studi kasus, , , , , , , , , ', 'Penilaian tingkat kematangan, , , , , , , , , ', 'Review, , , , , , , , , ', 'Ujian Tertulis, , , , , , , , , ', 'Mahasiswa memahami tujuan perkuliahan, isi perkuliahan, dan aturan main perkuliahan. Mahasiswa memahami gambaran secara global mengenai tata kelola TI', 'Mahasiswa dapat mengidentifikasi, menjelaskan  definiai tata kelola TI, manajemen teknologi TI dan tata kelola korporat.', 'Mahasiswa dapat mengidentifikasi, menjelaskan, dan mengukur nilai- nilai TI bagi pencapaian kinerja organisasi. Mahasiswa dapat mengidentifikasi, mengukur, risiko-risiko sumber daya TI bagi organisasi', 'Mahasiswa dapat menjelaskan secara lisan dan tertulis elemen-elemen tatakelola TI organisasi. Mahasiswa dapat mengetahui dan memahami  proses tatakelola TI organisasi.', 'Mahasiswa dapat menjelaskan secara lisan dan tertulis elemen-elemen tatakelola informasi organisasi.\r\nMahasiswa dapat mengetahui dan memahami  proses  tatakelola informasi. Mahasiswa dapat menjelaskan proses-proses penyusunan tatakelola informasi organisasi.\r\n', 'Mahasiswa dapat melakukan asesmen kecukupan tatakelola organisasi, asesmen kesesuaian tatakelola informasi dan TI terhadap tatakelola organisasi', 'Mahasiswa mengingat kembali materi perkuliahan 1-6.', '', 'Mahasiswa dapat menjelaskan hal yang penting dan harus ada dalam kebijakan dan akuntabilitas pengelolaan sumberdaya TI. ', 'Mahasiswa dapat mengidentifikasi organisasi pengelola TI, prosedur organisasi TI, dan kebutuhan SDM untuk organisasi pengelolaan sumberdaya TI. Mahasiswa dapat mengidentifikasi kebutuhan prosedur organisasi pengelolaan sumberdaya TI dan dapat mengenali kebutuhan kompetensi SDM pengelola sumberdaya TI', 'Mahasiswa dapat mengidentifikasi ukuran kinerja dan indikator keberhasilan pengelolaan sumberdaya TI. Mahasiswa dapat mengidentifikasi faktor-faktor yang berpengaruh terhadap kinerja pengelolaan sumberdaya TI', 'Mahasiswa dapat menjelaskan area tata kelola TI dan memahami langkah-langkah dalam implementasi tata kelola TI', 'Mahasiswa memahami kerangka kerja COBIT dan proses tata kelola TI', 'Mahasiswa memahami kerangka kerja COBIT dan proses tata kelola TI', 'Mahasiswa mengingat kembali materi pertemuan 8 - 13', '', 'K, D, R, S', 'K, D, R, S', 'K, D, R, S', 'K, D, R, S', 'K, D, R, S', 'K, D, R, S', 'K, D, R, S', ', , , ', 'K, D, R, S', 'K, D, R, S', 'K, D, R, S', 'K, D, R, S', 'K, D, R, S', 'K, D, R, S', 'K, D, R, S', 'K, D, R, S', 0, 0, '12 Mar 2017');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE IF NOT EXISTS `ruang` (
  `kd_ruang` varchar(50) NOT NULL,
  `kd_prodi` varchar(50) NOT NULL,
  `nama_ruang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`kd_ruang`, `kd_prodi`, `nama_ruang`) VALUES
('RUANG-TI-FTI-UY-05-01', 'TI-FTI-UY-05', 'Ruang 0501');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sap`
--

CREATE TABLE IF NOT EXISTS `sap` (
  `kd_mata_kuliah` varchar(50) NOT NULL,
  `nik_koordinator_mata_kuliah` varchar(50) DEFAULT NULL,
  `silabus_ringkas` text NOT NULL,
  `tiu` text NOT NULL,
  `mk_prasyarat` varchar(100) NOT NULL,
  `media` varchar(150) NOT NULL,
  `waktu_kuliah` int(10) NOT NULL,
  `waktu_pr` int(10) NOT NULL,
  `waktu_diskusi_kelompok` int(10) NOT NULL,
  `bobot_UTS` int(10) NOT NULL,
  `bobot_UAS` int(10) NOT NULL,
  `bobot_quiz` int(10) NOT NULL,
  `bobot_tugas` int(10) NOT NULL,
  `bobot_praktikum_dan_keaktifan` int(10) NOT NULL,
  `rujukan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sap`
--

INSERT INTO `sap` (`kd_mata_kuliah`, `nik_koordinator_mata_kuliah`, `silabus_ringkas`, `tiu`, `mk_prasyarat`, `media`, `waktu_kuliah`, `waktu_pr`, `waktu_diskusi_kelompok`, `bobot_UTS`, `bobot_UAS`, `bobot_quiz`, `bobot_tugas`, `bobot_praktikum_dan_keaktifan`, `rujukan`) VALUES
('TI-2017-CRY', '1402005001', 'Kuliah ini berisi tentang tatakelola organisasi, tatakelola TI dan tatakelola informasi yang dibutuhkan untuk panduan pengelolaan sumberdaya TI di dalam organisasi. Kuliah ini juga memberikan pengetahuan siklus manajemen sumberdaya TI, organisasi pengelola sumberdaya TI, prosedur pengelolaan sumberdaya TI, kebutuhan SDM untuk pengelolaan sumberdaya TI dan ukuran kinerja pengelolaan sumberdaya TI, serta risiko pengelolaan sumberdaya TI. Kuliah ini juga memberikan pengetahuan langkah-langkah dalam implementasi tatakelola TI  dengan menggunakan model kerangka COBIT', 'Mahasiswa dapat menjelaskan secara lisan dan tertulis, dapat mengidentifikasi kecukupan dan dapat memberikan masukan perbaikan terhadap tatakelola organisasi, tatakelola TI, tatakelola informasi, siklus manajemen pengelolaan sumberdaya TI, ukuran kinerja pengelolaan sumberdaya TI dan manajemen risiko sumberdaya TI. Mahasiswa dapat menjelaskan langkah-langkah dalam proses pelaksanaan tatakelola Tidengan menggunakan kerangka kerja COBIT', '', 'Whiteboard, E-Learning, LCD', 100, 20, 15, 25, 30, 10, 20, 15, 'Wim van Grembergen, Enterprise Governance of Information Technology, Springer, 2010\r\n\r\nJerry N. Luftmann, Managing the Information Technology Resource: Leadership in the Information Age, Prentice-Hall, 2010\r\n\r\nBoard Brieving on IT Governance (IT Governance Institute)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_akses`
--

CREATE TABLE IF NOT EXISTS `user_akses` (
  `kd_user` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `status` enum('Dosen','Tata Usaha') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_akses`
--

INSERT INTO `user_akses` (`kd_user`, `username`, `password`, `status`) VALUES
('0023022017', 'tu_univ', 'dXDgIR/+R3NR+IzAV+c1cJCWQ02on9WCnbNGfp/jYS9wgFfFeVQpW/EfekTHap9insZhgk85mTMGEFN0sJ265pFdccBFep9UnYPgEabBL6OF/ZJfCA1YPEvMFXIZGXPMTCqr/6kAovgIvtbffm0kD1f81VNy92kGuWc4SCklgz4=', 'Tata Usaha'),
('0123022017', 'tu_fk', 'p7zex+RpnD3eigJNt8va5bCqv6c06WtmtunI/ur2Qa5TpfURBSPYNiMi72t3hmkWqG2eVqrliGAXgsxiFXPGSKrAq5m4aidPUP4VcidWBZRXk8ekYq2b2/TfhWQbbiiLGF6Y+eo7It/fVdP2vw6zMYmH4d7ES6MMsd3V0mMgs34=', 'Tata Usaha'),
('0523022017', 'tu_fti', 'Fr073awDLR1A3iMBwgv3+D8zgSpQTXsdR6cZTvpmOzCla7X98oKYxsdGCbAjVIw49ZXA7GN6KKk8lzYWoFR8jI5l1sXtOgOmJtQqEiiHokuu7Zw1gP1D5KS14FUsWFTfEfTrDL+ZaiEcU4wgHr+yIiJM6obA3GtuQu+krta9qJ4=', 'Tata Usaha'),
('1102012089', 'zahra.callysta', 'BEnOYk/zxemnHCz36dacY1MR3gEN3uP+6WmhrRvEDQ62DThRQfXhtCWJvh85r++VfGIVuDzTEQb1BZLjXq0EMhfY9AlP6BHtyG77/C0OQGDQyo7g9UKKyTzai4N7WNoDXtDf/LbCLPqNWtn9DaPFEGWFgnSGyBAIVkV33L9O4Rg=', 'Dosen'),
('1402005001', 'azzahra', 'TMmyPPpz5uzrzszHmm9o4LYgnacRmVj6CwVLr7mCbWgFQHDbTYgO5hv7I7YI6drd/A52x4UsY4XDH6O7S4z2SK4m3DEAT3qQUR/3lHHpjXwyChjxrONCHszKOm1kGKC0AKYczXjRfkVirgEIn1aA4/qgDbu7WY7d0fejUnRYBSE=', 'Dosen'),
('1402012089', 'ockyaditia', 'gvFG+HFN01sn2lvPk/TSQEDsZOzwNJwsDfyfR7d8GquFm57Ow0BTCQCj2iloc0deHn0UKr/2CDlLsqrSp/x3W2LsHrE3JRav57Llbduf+MGH5/oiR4FeaN6xViDPHLLDSZ1QkbXfCZeWJvCJNg5X9R/zkVTQihM0IlzmpQGIDQU=', 'Dosen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
 ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `laboratorium`
--
ALTER TABLE `laboratorium`
 ADD PRIMARY KEY (`kd_ruang`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
 ADD PRIMARY KEY (`kd_mata_kuliah`);

--
-- Indexes for table `mst_dosen`
--
ALTER TABLE `mst_dosen`
 ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `mst_fakultas`
--
ALTER TABLE `mst_fakultas`
 ADD PRIMARY KEY (`kd_fakultas`);

--
-- Indexes for table `mst_mahasiswa`
--
ALTER TABLE `mst_mahasiswa`
 ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `mst_program_studi`
--
ALTER TABLE `mst_program_studi`
 ADD PRIMARY KEY (`kd_prodi`);

--
-- Indexes for table `mst_tata_usaha`
--
ALTER TABLE `mst_tata_usaha`
 ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pelaksanaan_perkuliahan`
--
ALTER TABLE `pelaksanaan_perkuliahan`
 ADD PRIMARY KEY (`id_pelaksanaan_perkuliahan`);

--
-- Indexes for table `rincian_materi_kuliah`
--
ALTER TABLE `rincian_materi_kuliah`
 ADD PRIMARY KEY (`kd_mata_kuliah`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
 ADD PRIMARY KEY (`kd_ruang`);

--
-- Indexes for table `sap`
--
ALTER TABLE `sap`
 ADD PRIMARY KEY (`kd_mata_kuliah`);

--
-- Indexes for table `user_akses`
--
ALTER TABLE `user_akses`
 ADD PRIMARY KEY (`kd_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
