-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2018 at 08:46 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matric`
--

-- --------------------------------------------------------

--
-- Table structure for table `feed`
--

CREATE TABLE `feed` (
  `id_feed` int(20) NOT NULL,
  `id_user` int(20) DEFAULT NULL,
  `isi` mediumtext,
  `tanggal_feed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feed`
--

INSERT INTO `feed` (`id_feed`, `id_user`, `isi`, `tanggal_feed`) VALUES
(85, 3, 'smdjcjsydcsvdc sjdcsdcvsjdc sd cjsdcjsdcs ', '2017-08-21 12:01:49'),
(86, 8, 'Gaajajjsjsjss sjsjsbwjwwnwjw', '2017-08-21 12:11:43'),
(87, 14, 'qwertyuio', '2017-08-22 11:49:26'),
(88, 4, '1234567890-', '2017-08-24 08:16:23'),
(89, 19, 'hahah', '2017-09-07 15:31:48'),
(90, 20, '444', '2017-09-07 16:34:47'),
(91, 20, 'uyuyuyuy', '2017-09-07 16:37:58'),
(92, 20, '123', '2017-09-07 16:39:14'),
(93, 20, 'tes', '2017-09-07 16:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(10) NOT NULL,
  `id_kelas` int(10) DEFAULT NULL,
  `nama_jurusan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `id_kelas`, `nama_jurusan`) VALUES
(1, 1, 'X-MIPA-1'),
(2, 1, 'X-MIPA-2'),
(3, 1, 'X-MIPA-3'),
(4, 1, 'X-MIPA-4'),
(5, 1, 'X-MIPA-5'),
(6, 1, 'X-IPS-1'),
(7, 1, 'X-IPS-2'),
(8, 1, 'X-IPS-3'),
(9, 1, 'X-IPS-4'),
(10, 1, 'X-BAHASA'),
(11, 1, 'X-AGAMA-1'),
(12, 1, 'X-AGAMA-2'),
(13, 2, 'XI-MIPA-1'),
(14, 2, 'XI-MIPA-2'),
(15, 2, 'XI-MIPA-3'),
(16, 2, 'XI-MIPA-4'),
(17, 2, 'XI-MIPA-5'),
(18, 2, 'XI-IPS-1'),
(19, 2, 'XI-IPS-2'),
(20, 2, 'XI-IPS-3'),
(21, 2, 'XI-IPS-4'),
(22, 2, 'XI-BAHASA'),
(23, 2, 'XI-AGAMA-1'),
(24, 2, 'XI-AGAMA-2'),
(25, 3, 'XII-MIPA-1'),
(26, 3, 'XII-MIPA-2'),
(27, 3, 'XII-MIPA-3'),
(28, 3, 'XII-MIPA-4'),
(29, 3, 'XII-MIPA-5'),
(30, 3, 'XII-IPS-1'),
(31, 3, 'XII-IPS-2'),
(32, 3, 'XII-IPS-3'),
(33, 3, 'XII-IPS-4'),
(34, 3, 'XII-BAHASA'),
(35, 3, 'XII-AGAMA-1'),
(36, 3, 'XII-AGAMA-2');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(20) NOT NULL,
  `kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Berita'),
(2, 'Pengumuman'),
(3, 'Artikel'),
(4, 'Man Babat');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(10) NOT NULL,
  `nama_kelas` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'X'),
(2, 'XI'),
(3, 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(20) NOT NULL,
  `id_post` int(20) DEFAULT NULL,
  `id_user` int(20) DEFAULT NULL,
  `isi` mediumtext,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(20) NOT NULL,
  `id_user` int(20) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `materi` varchar(100) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `id_user`, `judul`, `materi`, `tanggal`) VALUES
(16, 57, 'DatePicker', 'DatePicker(1).rar', '2017-11-24 22:46:37');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` int(50) NOT NULL,
  `id_user` int(50) DEFAULT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `isi` mediumtext,
  `gambar` varchar(200) DEFAULT NULL,
  `file` varchar(200) NOT NULL,
  `status` varchar(2) DEFAULT NULL,
  `id_kategori` int(20) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `id_user`, `judul`, `isi`, `gambar`, `file`, `status`, `id_kategori`, `tanggal`) VALUES
(79, 45, 'Studi Matematika: Bumi Akan Alami Kepunahan Massal Tahun 2100', '<p><strong>Liputan6.com, Boston -</strong> Menurut sebuah studi, Bumi akan kembali mengalami kepunahan massal pada tahun 2100. Prediksi kepunahan massal keenam itu, didasarkan pada studi perhitungan matematika dari lima kejadian kepunahan massal dalam waktu 540 juta tahun.</p>\r\n\r\n<p>Co-director Lorenz Centre Massachusetts Institute of Technology (MIT), Profesor Daniel Rothman, berteori bahwa adanya gangguan siklus alami karbon melalui atmosfer, lautan, tumbuhan, dan hewan, berperan besar dalam kepunahan massal.</p>\r\n\r\n<p>Lalu ia mempelajari bahwa empat dari lima kepunahan massal sebelumnya terjadi saat gangguan karbon itu melewati ambang perubahan bencana.</p>\r\n\r\n<p>Dikutip dari <em>Independent</em>, Sabtu (22/9/2017), <em>Great Dying</em> yang menjadi kepunahan massal terburuk dari semua, melanggar salah satu ambang batas tersebut dengan selisih terbesar. Peristiwa yang memusnahkan 96 persen spesies di Bumi itu terjadi sekitar 248 juta tahun lalu.</p>\r\n\r\n<p>Berdasarkan analisisnya terhadap kepunahan massal tersebut, Rothman menembangkan formula matematika untuk memprediksi berapa banyak karbon yang harus diserap lautan sebelum memicu kepunahan massal keenam.</p>\r\n\r\n<p>Jawabannya sangat mencengangkan.</p>\r\n\r\n<p>Berdasarkan prediksi terbaik Intergovernmental Panel on Climate Change, dari 310 gigaton karbon, hanya 10 gigaton yang dipancarkan pada tahun 2100. Bahkan skenario terburuk akan menghasilkan lebih dari 500 gigaton.</p>\r\n\r\n<p>Beberapa ilmuwan berpendapat bahwa kepunahan massal keenam sebenarnya telah dimulai. Jumlah spesies yang saat ini hilang dari Bumi, tak jauh berbeda dengan jumlah kepunahan terjadi pada lima peristiwa sebelumnya.</p>\r\n\r\n<p>Namun Rotham menekankan bahwa kepunahan massal tidak selalu melibatkan perubahan dramatis pada siklus karbon -- seperti yang ditunjukkan dengan tidak adanya perubahan drastis siklus karbon selama kepunahan Devon Akhir pada 360 juta tahun lalu.</p>\r\n\r\n<h2>Penyebab Kepunahan Massal</h2>\r\n\r\n<p>Dalam jurnal <em>Science Advances</em>, ia mencatat bahwa kejadian seperti letusan gunung berapi, perubahan iklim, dan faktor lingkungan lainnya juga bisa berperan dalam kepunahan massal.</p>\r\n\r\n<p>Namun ia mengatakan bahwa perubahan besar pada siklus karbon, seperti pembakaran karbon dan jumlah besar dalam bentuk minyak, batu bara, dan gas juga harus dipertimbangkan.</p>\r\n\r\n<p>&quot;Sejarah sistem Bumi adalah kisah soal perubahan. Beberapa perubahan bersifat bertahap dan tidak berbahaya, tapi yang lainnya, terutama yang terkait dengan kepunahan massal, relatif mendadak dan merusak,&quot; tulis Rothman.</p>\r\n\r\n<p>Ide bahwa kepunahan massal disebabkan oleh perubahan lingkungan dalam skala besar pertama kali diusulkan sekitar 200 tahun lalu oleh naturalis Prancis, Georges Cuvier.</p>\r\n\r\n<p>Jika perubahan lingkungan terlalu cepat bagi spesies untuk berevolusi, mereka akan punah karena kalah dengan spesies yang mampu beradaptasi lebih baik.</p>\r\n\r\n<p>Beberapa spesies pohon saat ini keberadaanya telah terancam karena peningkatan suhu global sehingga mereka tak dapat bermigrasi. Namun baru-baru ini, para ilmuwan menggambarkan bagaimana iklan pembunuh Atlantik dapat bertahan dari polusi di lepas pantai timur AS.</p>\r\n\r\n<p>Rothman mengatakan, diperlukan waktu ribuan tahun agar bencana ekologis dapat terjadi. Namun tahun 2100 menjadi titik kritis di mana dunia memasuki &#39;wilayah tak dikenal&#39;.</p>\r\n\r\n<p>&quot;Ini bukan berarti bahwa bencana akan terjadi pada esok hari. Namun dikatakan, jika dibiarkan, siklus karbon akan beralih ke alam yang lebih tidak stabil lagi dan berperilaku dengan cara yang sulit diprediksi,&quot; jelad Rothman.</p>\r\n\r\n<p>&quot;Di masa lalu geologis, jenis perilaku ini dikaitkan dengan kepunahan massal,&quot; imbuh dia.</p>\r\n', '889849_941229.jpg', '495859_1541-3160-1-SM.pdf', 'V', 1, '2017-11-24 01:19:05'),
(80, 45, 'Pelajaran Matematika Sulit? Baca Dulu Artikel Ini!', '<p>Banyak yang beranggapan kalau pelajaran matematika itu pelajaran yang sangat sulit. Bahkan mungkin Anda juga merasa sulit hingga akhirnya Anda melihat judul postingan ini dan membacanya.</p>\r\n\r\n<p>Sebenarnya pelajaran matematika bukanlah pelajaran yang paling sulit didalam sekolah jika Anda ingin mempelajarinya dengan sungguh-sungguh. Asalkan Anda sudah tahu rumusnya, pelajaran matematika akan menjadi hanya sekedar hitung menghitung saja bagi Anda karena sudah terlalu mudah. Intinya pelajaran matematika itu tidaklah sulit. Namun jika Anda masih tetap kekeuh ingin mengatakan kalau matematika itu sulit, Coba deh Anda baca dulu dibawah ini beberapa hal untuk mempermudah memahami pelajaran matematika.</p>\r\n\r\n<p><strong>Mengenali dan memahami</strong></p>\r\n\r\n<p>Anda baca dahulu soal yang ada lalu Anda kenali dan pahami dari soal tersebut. Jika Anda merasa soal tersebut sulit Anda mengerti dan pahami, jangan malu untuk bertanya kepada guru tentang soal tersebut. Bertanya bukan berarti membuat sang guru menganggap Anda bodoh, melainkan guru menganggap Anda memiliki tekat dalam belajar matematika.</p>\r\n\r\n<p><strong>Membuat catatan kecil</strong></p>\r\n\r\n<p>Jika Anda memang orang yang sulit untuk menghafal, coba untuk luangkan sedikit waktu Anda untuk membuat catatan kecil menggunakan buku catatan kecil. Anda bisa meminjam buku teman Anda yang pintar untuk Anda salin ke buku catatan kecil Anda. Tentunya sebelum menulis Anda harus membaca catatan tersebut terlebih dahulu dan memahaminya, jangan asal menyalin saja.</p>\r\n\r\n<p><img alt="note book" src="http://www.acadcampus.com/campuzdata/2016/09/note-book.jpg" style="width:100%" /></p>\r\n\r\n<p><strong>Menghafalkan rumus</strong></p>\r\n\r\n<p>Segala hal pasti ada cara untuk memecahkannya, termasuk matematika yang membutuhkan rumus. Jika Anda tidak mengeri rumus dari soal yang akan Anda kerjakan, bagaimana Anda bisa mengerjakan soal tersebut? Inilah kenapa sangat penting untuk Anda menghafal rumus dalam belajar matematika.</p>\r\n\r\n<p>Oh iya, untuk mempermudahkan Anda untuk memisahkan antara rumus yang satu dan yang lainnya, usahakan saat mencatat catatan dari guru Anda harus memberi judul kecil di atas rumus agar Anda tidak bingung gunanya rumus tersebut untuk apa.</p>\r\n\r\n<p><strong>Jangan takut salah</strong></p>\r\n\r\n<p>Banyak murid yang menyontek saat mendapatkan tugas dalam pelajaran matematika dengan alasan takut jawaban yang ia tulis salah. Hal seperti ini hanya akan membuat diri Anda semakin bodoh dan tertinggal dengan yang lainnya.</p>\r\n\r\n<p>Usahakan untuk mengerjakan sesuai dengan kemampuan Anda. Menurut pengalaman pribadi, jika bersungguh-sungguh dalam mengerjakan soal matematika dari guru akan membuat penasaran dan terus mencoba untuk mencari jawaban yang tepat, bahkan akan terasa sebagai tantangan untuk Anda selesaikan.</p>\r\n\r\n<p><strong>Mengulang kembali dari soal yang ada</strong></p>\r\n\r\n<p>Cara ini bisa Anda lakukan setelah Anda mendapatkan soal latihan dari guru. Biasanya guru akan membiarkan murid untuk menyimpan lembar soal tersebut untuk kembali dipelajari di rumah.</p>\r\n\r\n<p><img alt="soal matematika" src="http://www.acadcampus.com/campuzdata/2016/09/soal-matematika.jpg" style="width:100%" /></p>\r\n\r\n<p>Nah, dari soal ini Anda bisa melakukan latihan. Jangan sampai Anda merasa kalau soal tersebut tidak perlu dipelajari karna sudah dikerjakan dan tidak mempelajarinya kembali karena merasa soalnya itu-itu saja. Padahal, soal matematika memang seperti itu saja karena semua dapat diselesaikan dengan rumus.</p>\r\n\r\n<p>Melatih diri itu penting, orang yang sudah pintar saja masih belajar, Anda yang masih pas-pasan dalam matematika malah justru akan semakin tertinggal jika tidak ingin berlatih.</p>\r\n', '551268_438007.jpg', '', 'V', 3, '2017-11-24 02:24:37'),
(82, 45, 'Aksi Menawan Bocah Jenius Matematika Asal Tegal', '<p><strong>Liputan6.com, Tegal -</strong> Dengan otak jeniusnya di bidang <a href="http://citizen6.liputan6.com/read/3038410/siswa-juara-matematika-se-nkri-ini-curhat-ke-jokowi">matematika</a>, Parnell Louis Philander mengharumkan nama Indonesia setelah menyisihkan ratusan peserta dari berbagai negara. Padahal, bocah asal Tegal, Jawa Tengah itu baru genap berusia 7 tahun.<br />\r\n<br />\r\nParnel menyabet medali emas pada kompetisi World Mathematics Invitational 2017 di Ton Dug Thang, University Ho Chi Minh City, Vietnam, pada 15 Juli 2017 lalu. Dengan bakat yang dimilikinya itu, putra tunggal dari pasangan Peter Lidian Praputra dan Ibu Anna Hindargo itu disebut-sebut sebagai calon intelijen andal di masa depan.<br />\r\n<br />\r\nParnell mengaku senang dengan penghargaan tertinggi di bidang <a href="http://health.liputan6.com/read/3043751/kurang-zat-besi-pengaruhi-kemampuan-matematika-anak">matematika</a> yang diraihnya. Ia menyatakan, penghargaan itu menambah semangatnya untuk terus memperbaiki diri.</p>\r\n\r\n<p>&quot;Mau terus belajar agar bisa jadi <em>progamer</em> hebat,&quot; katanya, Jumat (4/8/2017).<br />\r\n<br />\r\nPenghargaan tertinggi yang diraih siswa Global Inbyra School (GIS) itu tak pelak membuat kedua orangtuanya dan warga Tegal bangga. Tak terkecuali Wali Kota Tegal Siti Masitha Soeparno.<br />\r\n<br />\r\n&quot;Kamu memang hebat nak, terus belajar dan mengembangkan diri hingga menggapai cita-citamu menjadi seorang <em>programer</em>,&quot; ucap Masitha.<br />\r\n<br />\r\nSelain menyampaikan selamat, Masitha juga menitipkan pesan penting. Ia meminta agar orang di sekeliling bocah <a href="http://global.liputan6.com/read/3029293/elon-musk-ini-salah-pengajaran-yang-bikin-matematika-jadi-momok">jenius</a> tidak menekannya untuk terus berprestasi. Hal itu agar si anak tidak jenuh dan lebih produktif.</p>\r\n', '302392_555405.jpg', '', 'V', 1, '2017-11-24 02:34:25'),
(84, 45, 'Balqies Savina dan Diah Yuni Puji Tulis Namanya di Daftar Siswa Berprestasi Untuk MAN Babat', '<p><strong>Senyuman kedua Siswi ini</strong> nampak terlihat setelah kerja kerasnya dibayar tuntas dengan sebuah tropi dan sertifikat yang ada dalam genggaman mereka.</p>\r\n\r\n<p><em><strong>Balqies dan Diah</strong></em> di tetapkan sebagai Juara 2 dan 3 dalam Olimpiade Matematika Tingkat SMA/Sederajat se-Karesidenan Bojonegoro.Olimpiade yang digelar oleh Himpunan Mahasiswa Pendidikan Matematika (HMM) Universitas PGRI Ronggolawe Tuban ini diikuti oleh 100 lebih Peserta dilingkup karesidenan Bojonegoro, hanya 10 besar Peserta yang diambil untuk menuju Babak Semi Final dan di Final Hanya Tersisa 5 Terbaik yang di adu dalam Babak Akhir ini sehingga ditetapkan Juara Balqies Savina sebagai Juara 2 dan Diah Yuni Puji Sebagai Juara 3 untuk kedua Siswi ini.</p>\r\n\r\n<p><img alt="" src="http://manbabat.sch.id/wp-content/uploads/2017/05/IMG-20170507-WA0021.jpg" style="width:100%" /></p>\r\n\r\n<p>Olimpide ini dilaksanakan pada Hari Ahad tanggal 7 Mei 2017 di Kampus Universitas Ronggolawe (UNIRO) Tuban.</p>\r\n\r\n<p><img alt="" src="http://manbabat.sch.id/wp-content/uploads/2017/05/IMG-20170507-WA0019.jpg" style="width:100%" /></p>\r\n\r\n<p>Semoga capain ini menjadi proses Kesuksesan kedua siswi ini dan siswi MAN Babat yang lain. Amin</p>\r\n\r\n<p><strong>source : </strong>http://manbabat.sch.id/2017/05/09/balqies-savina-dan-diah-yuni-puji-tulis-namanya-di-daftar-siswa-berprestasi-untuk-man-babat/</p>\r\n', '842427_647234.jpg', '', 'V', 1, '2017-11-24 03:53:15'),
(89, 57, 'Kamu Nggak Perlu Jago Matematika. Cukup Ingat Rumus Sederhana Ini untuk Survive di Kehidupan Sehari-hari', '<p>Matematika memang menajdi horor tersendiri saat kamu masih sekolah. Kalau mengingat-ingat pengalaman mencari nilai x dengan rumus aljabar sampai menggunakan sin cos tan di trigonometri, matematika memang super menyeramkan. Dan mungkin kamu juga bertanya-tanya, apa sih gunanya trigonometri dalam kehidupan sehari-hari?</p>\r\n\r\n<p>Ah, tapi mari kita lupakan trigonometri, matriks, parabola, dan aljabar. Ada hitungan-hitungan matematika yang harus kamu ketahui kerena gunanya jelas untuk kehidupan sehari-hari. Tenang tenang, kamu nggak harus jadi ahli matematika kok untuk menghafal hitungan-hitungan sederhana ini.</p>\r\n\r\n<h3>1. Di akun Path ada informasi suhu udara 920 Kalau diubah menjadi celcius, jadi berapa hayoo?</h3>\r\n\r\n<p><img alt="skala termometer" src="https://www.hipwee.com/wp-content/uploads/2016/06/hipwee-mtk-suhu-640x427.jpg" style="width:100%" /></p>\r\n\r\n<p>Masih bingung nggak kalau ngitung suhu?</p>\r\n\r\n<p>Derajat untuk mengukur suhu terbagi menjadi 4 skala, yaitu Celcius, Fahrenheit, Reamur, dan Kelvin. Masing-masing skala memiliki tititk didih dan titik beku yang berbeda. Yang paling umum digunakan di Indonesia tentunya Celcius. Sementara&nbsp;negara-negara yang berbahasa Inggris biasanya menggunakan skala Fahrenheit. Tapi suhu yang tertera di masing-masing termometer bisa dikonversi ke termometer lainnya dengan rumus yang sudah ditetapkan. Nah, untuk mengubah Fahrenheit ke Celsius, ini rumusnya:</p>\r\n\r\n<blockquote>\r\n<p>C = (5/9) x F-32</p>\r\n\r\n<p>*F adalah suhu dalam skala Fahrenheit.</p>\r\n</blockquote>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Misalnya di akun Pathmu tertulis suhunya 920 Fahrenheit, jadinya berapa Celcius tuh?</p>\r\n\r\n<blockquote>\r\n<p>C= (5/9) x 92-32 = (5/9) x 60 = 33,30 Celcius</p>\r\n</blockquote>\r\n\r\n<h3>2. Mari&nbsp;menghitung nilai persen. Agar kalau ada tulisan diskon di mall, kamu jadi tahu berapa keuntungan yang kamu dapatkan</h3>\r\n\r\n<p><img alt="Diskon!" src="https://www.hipwee.com/wp-content/uploads/2016/06/hipwee-mtk-diskon-640x403.jpg" style="width:100%" /></p>\r\n\r\n<p>Biar bisa ngitung diskon</p>\r\n\r\n<p>Secara ringkas, presentase atau persen adalah cara menyebut sebagian terhadap keseluruhan. Kalau kamu belanja di mall, kamu pasti sering melihat banner-banner diskon sekian persen. Kamu bisa menghitung sendiri jadi berapa diskon yang yang dapatkan dengan rumus ini:</p>\r\n\r\n<blockquote>\r\n<p>Nilai diskon = (nilai persen/100) x (nilai keseluruhan)</p>\r\n</blockquote>\r\n\r\n<p>Misalkan sebuah baju harganya 500.000 dan didiskon 30%, harganya jadi berapa?</p>\r\n\r\n<blockquote>\r\n<p>Diskon = (30/100) x 500.000 = 150.000</p>\r\n\r\n<p>Jadi harga bajunya jadi 500.000 &ndash; 150.000 = Rp. 350.000,-</p>\r\n</blockquote>\r\n\r\n<p>Menghitung persen ini juga bisa kamu gunakan untuk menghitung pajak dan biaya servis saat kamu makan di restoran. Siapa tahu kan penghitungan pajak dan biaya servis yang tertera di <em>bill</em>-mu salah?</p>\r\n\r\n<h3>3. Kalau kamu berencana membangun rumah, jangan sampai lupa menghitung luas dan keliling tanah yang kamu punya</h3>\r\n\r\n<p><img alt="Bangun rumah" src="https://www.hipwee.com/wp-content/uploads/2016/06/hipwee-mtk-luas-640x320.jpg" style="width:100%" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Materi tentang luas dan keliling bangunan pastinya sudah kamu dapatkan sejak masih SD. Tapi karena dulu nggak bisa, dan kamu pun benci matematika, sekarang pun kamu sudah lupa. Padahal rumus menghitung luas bangunan ini penting lho saat nanti kamu sedang berencana membangun rumah. Kan kamu harus memperhitungkan luas bangunan secara keseluruhan dan setiap ruangan biar komposisi rumahmu jadi menawan. Nah, untuk menghijaukan lagi ingatanmu, ini nih rumus sederhana untuk menghitung luas dan keliling bangun datar.</p>\r\n\r\n<blockquote>\r\n<p>Luas persegi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = sisi (s) x sisi (s)</p>\r\n\r\n<p>Keliling persegi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = 4 x sisi (s)</p>\r\n\r\n<p>Luas persegi panjang &nbsp;&nbsp;&nbsp;&nbsp; = panjang (p) x lebar (l)</p>\r\n\r\n<p>Keliling persegi panjang = (2 x p) + (2 x l)</p>\r\n</blockquote>\r\n\r\n<blockquote>\r\n<p>Luas segitiga &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = &frac12; x alas (a) x tinggi (t)</p>\r\n\r\n<p>Keliling segitiga&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = panjang sisi 1 + panjang sisi 2 + panjang sisi 3</p>\r\n\r\n<p>Luas jajar genjang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = alas (a) x tinggi (t)</p>\r\n\r\n<p>Keliling jajar genjang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = (2 x a) + (2 x sisi miring)</p>\r\n</blockquote>\r\n\r\n<h3>4. Sebagai orang Melayu, kita terbiasa menggunakan satuan jengkal, hasta, dan depa. Sebenarnya, itu seberapa sih?</h3>\r\n\r\n<p><img alt="depa" src="https://www.hipwee.com/wp-content/uploads/2016/06/hipwee-mtk-jengkal.jpg" style="width:100%" /></p>\r\n\r\n<blockquote>\r\n<p>Woi, tolong parkirin dong! Masih jauh nggak?</p>\r\n\r\n<p>Nggaaaak! Jaraknya tinggal satu depa!</p>\r\n\r\n<p>Et, satu depa itu seberapa?!</p>\r\n</blockquote>\r\n\r\n<p>Jengkal, hasta, dan depa adalah cara mengukur jarak atau panjang dengan menggunakan bagian-bagian tubuh manusia. Karena ukuran bagian tubuh manusia beda-beda, nggak ada padanan angka yang pas untuk menggambarkan 1 jengkal itu sebenarnya seberapa sih. Tapi karena masih sering dipakai, nggak ada salahnya kamu mengingat hal ini:</p>\r\n\r\n<blockquote>\r\n<p>1 jengkal adalah jarak rentangan antara ujung jari kelingking sampai ujung jempol tangan</p>\r\n\r\n<p>1 hasta adalah jarak antara siku sampai dengan ujung jari tengah</p>\r\n\r\n<p>1 depa adalah jarak antara ujung jari ke ujung jari lainnya pada kedua tangan yang direntangkan</p>\r\n</blockquote>\r\n\r\n<h3>5. Buat yang baru belajar masak jangan bingung ya membedakan ml dan cc ya~</h3>\r\n\r\n<p><img alt="Airnya 1 cc apa 1 ml nih?" src="https://www.hipwee.com/wp-content/uploads/2016/06/hipwee-mtk-masak-640x427.jpg" style="width:100%" /></p>\r\n\r\n<p>Bukan hanya saat membeli bensin, kamu juga akan menemui satuan ml dan cc saat sedang belajar memasak sesuai dengan panduan resep di majalah-majalah. Kadang kamu bingung karena di resep tertulis 150 ml tapi di tempat lain tertulis 150 cc. Ini nih informasi penting yang perlu kamu tahu:</p>\r\n\r\n<blockquote>\r\n<p>Satuan ml dan cc itu sama saja, saudara-saudara!</p>\r\n</blockquote>\r\n\r\n<p>Pastinya kamu ingat tangga satuan jarak yang pernah diajarkan oleh guru SD-mu dulu kan? &nbsp;ml atau mili liter dan cc atau centimeter kubik adalah satuan volume untuk menghitung volume benda cair. Di atas ml ada liter atau L, dan diatas CC ada desimeter kubik atau dm3, yang nilainya juga sama.</p>\r\n\r\n<h3>6. Hobi belanja juga harus tahu ilmunya. Jangan salah menggunakan satuan lusin dan kodi yaa~</h3>\r\n\r\n<p><img alt="Beli bajunya 1 lusin!" src="https://www.hipwee.com/wp-content/uploads/2016/06/hipwee-mtk-lusin-640x427.jpg" style="width:100%" /></p>\r\n\r\n<p>Saat kamu beli baju di pasar besar yang barang-barangnya grosir, kamu pasti akan menjumpai satuan-satuan seperti lusin dan kodi. Beda dengan saat kamu beli baju satuan di mall. Nah, biasanya kalau kamu beli baju langsung 1 lusin atau 1 kodi, harganya juga lebih murah. Supaya nggak keliru menyebutkan keperluanmu, jangan sampai lupa ya kalau 1 lusin itu sama dengan 12 buah, sedangkan 1 kodi sama dengan 20 buah.</p>\r\n\r\n<p>Itu dia beberapa rumus hitungan matematika sederhana yang jelas kamu gunakan untuk kehidupan sehari-hari. Sebenci apapun kamu pada matematika, tanpa kamu sadari hidup sehari-harimu memang dipenuhi matematika. Mulai dari diskon di mall sampai saat kamu berencana membangun rumah dengan pasangan. Gimana? Nggak pusing kan?</p>\r\n', '191588_669827.jpg', '', 'V', 3, '2017-11-24 23:31:30'),
(90, 57, 'Habis Buat Kagum Dunia, Sistem Pendidikan Finlandia Bakal Dirombak Total. Nggak Ada Mata Pelajaran!', '<p>Pendidikan bisa jadi sebuah komponen yang sangat penting untuk mengembangkan sumber daya manusia di suatu negara, apalagi di negara berkembang seperti Indonesia. Hampir di semua sekolah di negara kita, mengedepankan pelajaran-pelajaran seperti matematika dan fisika sebagai mapel yang diunggulkan. Jam pelajarannya pun tergolong punya porsi lebih banyak. Tapi sayangnya menurut <em>Trends in International Mathematics and Science Study</em> <a href="http://edukasi.kompas.com/read/2017/09/19/13445611/pada-2020-tak-ada-lagi-pelajaran-matematika-di-negara-ini">(TIMSS)</a>,&nbsp; anak-anak Indonesia, secara rata-rata, hanya bisa menempati peringkat 45 dari 50 negara yang disurvei.</p>\r\n\r\n<p>Beda lagi dengan Finlandia, negara dengan sistem pendidikan terbaik yang sering dibicarakan orang ini justru akan menghapuskan sistem mata pelajaran. Nantinya nggaka akan ada lagi matematika, fisika, bahkan pelajaran sejarah yang diajarkan terpisah. Memang sih, sistem ini bisa dibilang cukup radikal dalam dunia pendidikan. Dilansir dari <a href="http://nasional.kompas.com/read/2017/06/15/22170631/.full.day.school.disebut.resahkan.guru">Quartz</a>, Finlandia tentunya punya tujuan atas hal ini. Yuk kita bahas bareng Hipwee News and Feature!</p>\r\n\r\n<h3>Pada 2020, seluruh sekolah di Finlandia akan meniadakan pelajaran matematika, fisika, sejarah, dan mata pelajaran yang berdiri sendiri-sendiri</h3>\r\n\r\n<p><img alt="" src="https://www.hipwee.com/wp-content/uploads/2017/09/hipwee-finland-smiles-wr-640x480.jpg" style="width:100%" /></p>\r\n\r\n<p>Hore nggak ada hafalan rumus lagi!! via <a href="http://www.smithsonianmag.com" target="new">www.smithsonianmag.com</a></p>\r\n\r\n<p>Sebenarnya pelajaran fisika dan bahasa sudah dihilangkan di kurikulum pendidikan Finlandia bagi mereka yang sudah berusia 16 tahun. Guru pun mengajar siswa lebih ke arah ilmu praktikal. Pelajaran seperti matematika dan sejarah akan dihapus. Di Helsinki, sekolah-sekolah bahkan sudah mulai menerapkan ini. Tetapi bukannya sama sekali siswa nggak akan mengerti soal angka dan sejarah, mereka akan memperlajarinya secara kontekstual.</p>\r\n\r\n<p>Matematika yang sering dianggap jadi mimpi buruk para siswa pun sudah nggak ada lagi. Padahal di seluruh negara para siswa banyak yang berlomba-lomba untuk dapat nilai 100 di pelajaran matematika. Namun sekolah-sekolah di Finlandia nampaknya benar-benar terfokus ke bagaimana siswa memperoleh pengetahuan yang bsia diterapkan dalam kehidupannya kelak.</p>\r\n\r\n<h3>Pelajaran akan lebih kontekstual, memahami sesuatu secara keseluruhan dan utuh dan tidak terbagi berdasarkan mata pelajaran</h3>\r\n\r\n<p>Advertisement</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="" src="https://www.hipwee.com/wp-content/uploads/2017/09/hipwee-scmpost_02mar05_ep_edu2_3049727-640x422.jpg" style="width:100%" /></p>\r\n\r\n<p>Ayo semangat belajar fenomena! via <a href="https://www.scmp.com" target="new">www.scmp.com</a></p>\r\n\r\n<p>Siswa akan dibekali pelajaran untuk memahami sesuatu secara keseluruhan. Misalnya&nbsp;ketika mempelajari bagaimana negara Eropa terbentuk, maka siswa akan belajar soal sejarahnya, bagaimana perekonomiannya kala itu, dan budaya apa yang dulu berlaku. Nah kalau begini pelajarannya nggak akan terputus hanya di sejarah atau matematika saja. Jadi sudah nggak ada subjek mata pelajaran, saat ini mereka menyebutnya dengan belajar &lsquo;fenomena&rsquo;.</p>\r\n\r\n<p>Dengan keputusan besar ini, otomatis mengubah sistem pengajaran guru-guru di Finlandia. Tadinya, guru-guru dikelompokkan dalam berbagai mata pelajaran, seperti guru matematika, guru fisika, dan lain sebagainya. Jika sistem mata pelajaran akan dihapuskan, maka semua guru dituntut untuk menguasai fenomena yang diajarkan. Guru diharapkan tidak hanya bisa mengajari siswa tentang angka dan hafalan, tapi juga pengetahuan lebih dalam seperti nilai serta moral terkait sebuah fenomena. Langkah ini memang bakal menjadi reformasi besar dalam sistem pendidikan Finlandia yang sebenarnya sudah dianggap ideal oleh banyak kalangan.</p>\r\n\r\n<h3>Penghapusan mata pelajaran tradisional dan reformasi besar-besaran ini jelas bukan langkah sembarangan. Pemerintah Finlandia menilai ini perlu karena dunia makin dinamis</h3>\r\n\r\n<p><img alt="" src="https://www.hipwee.com/wp-content/uploads/2017/09/hipwee-DSC8946_1314VelhotRikuIsohellaB-700x467-640x427.jpg" style="width:100%" /></p>\r\n\r\n<p>Tenaga pengajar di Finlandia via <a href="https://finland.fi" target="new">finland.fi</a></p>\r\n\r\n<p>Pada masa lampau, orang dengan kemampuan mengoperasikan komputer&nbsp;jadi buruan banyak perusahaan. Tetapi sekarang, dengan kondisi hampir semua orang menguasai komputer, perusahaan pun membutuhkan lebih daripada sekedar kemampuan itu. Ketika ditanya soal alasan Finlandia memutuskan menghapuskan mata pelajaran,&nbsp;Pasi Silander, Manajer Develompmen Helsinki mengatakan bahwa banyak aspek di dunia ini yang sudah berubah, dengan banyaknya perkembangan teknologi, tata cara lama pengajaran saat ini sudah tidak bernilai praktis.</p>\r\n\r\n<p>Memang sih, pada hakikatnya pelajaran kalkulus, integral, dan logaritma yang diajarkan pada mata pelajaran matematika tidak terlalu dipraktikan bagi mereka yang bekerja di luar bidang sains. Jika pada akhirnya seorang siswa akan jadi astronot, ilmu matematika dan fisika mungkin sangat penting, tapi bagi seorang pengusaha, mereka tidak akan terlalu membutuhkan perhitungan rumit ini.</p>\r\n\r\n<h3>Siswa SD-SMP di Finlandia hanya belajar 4-5 jam sehari, tanpa PR dan tidak ada ujian nasional. Dengan sistem ini saja pendidikan di Finlandia jadi yang terbaik di dunia</h3>\r\n\r\n<p><img alt="" src="https://www.hipwee.com/wp-content/uploads/2017/09/hipwee-lead_960-640x427.jpg" style="width:100%" /></p>\r\n\r\n<p>Bermain sambil belajar dong! via <a href="http://theatlantic.com" target="new">theatlantic.com</a></p>\r\n\r\n<p>Bukan hal baru lagi kalau Finlandia jadi kiblat sistem pendidikan di seluruh dunia karena dengan sistemnya yang benar-benar &lsquo;berani&rsquo;. Dengan durasi jam sekolah yang pendek dan tanpa dibebani PR serta ujian nasional, Finlandia masih bisa jadi negara teratas yang memiliki penguasaan literasi dan numerasi terbaik. Lalu dengan akan dihapuskannya sistem mata pelajaran, apakah Finlandia akan tetap jadi yang terbaik? Kita akan lihat setelah 2020 mendatang. Jika sistem ini berhasil dijamin banyak negara-negara di dunia yang akan mengikuti sistem pendidikan ini. Nah bagaimana dengan Indonesia?</p>\r\n\r\n<p>Kalau melihat langkah Finlandia yang berencana menghapuskan mata pelajaran matematika, nampaknya ini hanya bisa jadi sebatas &lsquo;mimpi&rsquo; bagi siswa-siswa di Indonesia. Masih banyak hal yang perlu diperbaiki supaya sistem pendidikan Indonesia sekarang bisa berjalan secara optimal. Bukannya mendapat faedah yang direncanakan pemerintah Finlandia di atas, penghapusan pelajaran-pelajaran seperti matematika di Indonesia saat ini justru malah berisiko membuat anak-anak malas.&nbsp;Nah menurut kalian gimana nih&nbsp;<em>guys?</em></p>\r\n', '443185_216480.jpg', '', 'V', 3, '2017-11-25 00:02:31'),
(97, 68, 'Man Babat Peringati Hari Guru 25 November 2017', '<blockquote>Orang hebat bisa melahirkan beberapa karya bermutu, tapi guru yang bermutu dapat melahirkan ribuan orang-orang hebat</blockquote>\r\n\r\n<p><span dir="rtl"><var><code>&nbsp;</code></var></span></p>\r\n\r\n<p>Guru adalah pahlawan, dan tanda-tanda kepahlawanannya terukir pada keberhasilan semua orang-orang hebat yang Anda kenal.</p>\r\n\r\n<p>Sabtu, tanggal 25 Nopember 2017 seluruh Guru dan Siswa MAN 2 Lamongan berkumpul dan berbaris guna upacara memperingati Hari Guru.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '586808_327593.jpg', '', 'V', 4, '2017-11-26 23:22:17'),
(104, 57, 'Peringatan Hari Guru, Gus Ipul Baca Puisi ''Guru Zaman Now''', '<p><strong>Surabaya</strong> - Guru diharapkan terus meningkatkan kualitasnya sebagai tenaga pendidik, tapi guru juga perlu diperhatikan kesejahteraannya. Pemerintah akan berupaya merumuskan soal upah guru yang layak.<br />\r\n<br />\r\n&quot;Kita terus berupaya agar para guru ini memiliki kualitas dan kesejahteraannya,&quot; kata Wakil Gubernur Jawa Timur Saifullah Yusuf usai kuliah umum &#39;Peringatan Hari Guru&#39; di kampus Sekolah Tinggi Keguruan dan Ilmu Pendidikan (STKIP) Al-Hikmah, Surabaya, Sabtu (25/11/2017).<br />\r\n<br />\r\nPria yang biasa disapa Gus Ipul ini mengapresiasi para guru yang tetap memiliki semangat meningkatkan kemampuan pengetahuannya serta membuka pengetahuan yang terus berkembang di era kemajuan teknologi.</p>\r\n\r\n<p>&quot;Saya melihat semangat guru luar biasa untuk terus berusaha meningkatkan kualitasnya. Dari hasil survei menunjukkan bahwa semua guru pada dasarnya ingin melengkapi dirinya dengan mengikuti perkembangan yang ada,&quot; jelasnya.<br />\r\n<br />\r\nDalam kuliah umum itu, Gus Ipul sempat membacakan puisi. Puisi tersebut dihadiahkan untuk para guru. Puisi tersebut judulnya &#39;Guru Zaman Now&#39;.<br />\r\n<br />\r\n<em>Guru Zaman Now</em><br />\r\n<br />\r\n<em>Kenapa waktu masih kecil guru mengajarkan </em><br />\r\n<em>&quot;Ini Budi,&quot; bukan &quot;Ini Ipul?&quot;</em><br />\r\n<em>Karena guru menyadari pentingnya landasan budi pekerti</em><br />\r\n<em>sebelum semua ilmu terkumpul.</em><br />\r\n<br />\r\n<em>Guru, </em><br />\r\n<em>bukanlah singkatan gugling dan meniru</em><br />\r\n<em>ada yang bilang digugu lan ditiru,</em><br />\r\n<em>padahal guru bukan singkatan apa-apa</em><br />\r\n<em>karena kerja seorang guru itu tak bisa disingkat-singkat</em><br />\r\n<em>Karena mendidik tak bisa mendadak</em><br />\r\n<em>Apalagi murid zaman now, gurunya pun harus guru zaman now</em><br />\r\n<em>Tidak keras, tapi tegas. Tidak kaku, tapi seru.</em><br />\r\n<br />\r\n<em>Manuk menclok nang pohon waru</em><br />\r\n<em>bernyanyi riang lagunya Cita Citata</em><br />\r\n<em>tak semua orang bercita-cita jadi guru</em><br />\r\n<em>tapi guru adalah jembatan semua cita-cita </em><br />\r\n<br />\r\n<em>Ayo Kabeh sedulur, beri hormat kagem Bapak lan Ibu Guru</em><br />\r\n<br />\r\nUsai membacakan puisi, peserta kuliah umum dari civitas akademik STKIP AL Hikmah, memberikan aplaus ke Gus Ipul.<br />\r\n<br />\r\nTak lupa Gus Ipul menerangkan di era kemajuan seperti ini, tantangan guru semakin berat dan kompleks. Sehingga perlu dukungan dari pemerintah, terutama kesejahteraan para guru.<br />\r\n<br />\r\n&quot;Ke depan kita akan rumuskan soal upah guru. Selama ini, sudah ada aturan upah bagi buruh. Tapi tidak ada aturan standar upah bagi guru,&quot; tuturnya.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '731664_881794.jpg', '', 'V', 3, '2017-11-27 00:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `struktur`
--

CREATE TABLE `struktur` (
  `id_struktur` int(50) NOT NULL,
  `nama_struktur` varchar(50) DEFAULT NULL,
  `id_user` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `struktur`
--

INSERT INTO `struktur` (`id_struktur`, `nama_struktur`, `id_user`) VALUES
(1, 'Ketua', 84),
(2, 'Wakil Ketua', 82),
(3, 'Sekertaris 1', 82),
(4, 'Sekertaris 2', 84),
(5, 'Bendahara 1', 72),
(6, 'Bendahara 2', 72);

-- --------------------------------------------------------

--
-- Table structure for table `tentang`
--

CREATE TABLE `tentang` (
  `id` int(2) NOT NULL,
  `isi` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tentang`
--

INSERT INTO `tentang` (`id`, `isi`) VALUES
(1, '<p>Ini adalah Isi Tentang Kami yang terupdate</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(20) NOT NULL,
  `id_user` int(20) DEFAULT NULL,
  `isi` varchar(10000) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `id_user`, `isi`, `tanggal`) VALUES
(15, 45, 'Matric', '2017-12-03 14:02:32'),
(16, 57, 'mantap', '2017-12-19 20:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(50) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(5000) DEFAULT NULL,
  `nama_depan` varchar(50) DEFAULT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `nama` varchar(500) DEFAULT NULL,
  `jk` varchar(50) DEFAULT NULL,
  `alamat` varchar(10000) DEFAULT NULL,
  `no_hp` varchar(14) DEFAULT NULL,
  `kuliah` varchar(500) DEFAULT NULL,
  `bekerja` varchar(500) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `id_kelas` int(20) DEFAULT NULL,
  `id_jurusan` int(20) DEFAULT NULL,
  `alumni` varchar(20) DEFAULT NULL,
  `tahun_lulus` int(20) DEFAULT NULL,
  `gambar` varchar(500) DEFAULT NULL,
  `tanggal_daftar` datetime DEFAULT NULL,
  `status` varchar(3) DEFAULT NULL,
  `level` int(3) NOT NULL,
  `online` varchar(3) DEFAULT NULL,
  `fb` varchar(100) DEFAULT NULL,
  `ig` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `nama_depan`, `nama_belakang`, `nama`, `jk`, `alamat`, `no_hp`, `kuliah`, `bekerja`, `tempat_lahir`, `tanggal_lahir`, `id_kelas`, `id_jurusan`, `alumni`, `tahun_lulus`, `gambar`, `tanggal_daftar`, `status`, `level`, `online`, `fb`, `ig`) VALUES
(45, 'james@gmail.com', 'SmFRYnZ6NUJtYWNNQWgxYU10RE56dz09', 'Admin', 'Matric', 'Admin Matric', 'Perempuan', 'HACKED', '0000-0000-0000', 'HACKED', 'HACKED', 'HACKED', '1945-08-18', 3, 31, 'Y', 404, '20171124133723.png', '2017-11-22 19:47:14', 'V', 2, 'Y', 'PATCH YOUR SYSTEM', 'PATCH YOUR SYSTEM'),
(49, 'p@gmail.com', 'SmFRYnZ6NUJtYWNNQWgxYU10RE56dz09', 'Tes', 'Sial', 'Tes Sial', 'Laki-Laki', 'Lamongan', '0982382388', NULL, NULL, NULL, NULL, 1, 1, 'T', NULL, '20171123103745.png', '2017-11-23 17:37:22', 'TL', 1, 'T', NULL, NULL),
(54, 'shodiqulad98@gmail.com', 'SmFRYnZ6NUJtYWNNQWgxYU10RE56dz09', 'Tes Email 2', 'Tes Email 2', 'Tes Email 2 Tes Email 2', 'Laki-Laki', 'Lamonan', '0982382388', NULL, NULL, NULL, NULL, 2, 19, 'T', NULL, '20171124031318.png', '2017-11-24 10:12:43', 'TL', 1, 'T', NULL, NULL),
(55, 'o@gmail.com', 'SmFRYnZ6NUJtYWNNQWgxYU10RE56dz09', 'kjsd', 'dvd', 'kjsd dvd', 'Laki-Laki', 'Lamongan', '0982382388', NULL, NULL, NULL, NULL, 3, 31, 'Y', 2017, '20171124125153.png', '2017-11-24 19:51:37', 'TL', 1, NULL, NULL, NULL),
(56, 'k@gmail.com', 'SmFRYnZ6NUJtYWNNQWgxYU10RE56dz09', 'Tes ', 'Lamongan', 'Tes  Lamongan', 'Laki-Laki', 'RT.01 RW.04 Pucuk LAmongan', '0982382388', NULL, NULL, 'Lamongan', '1998-03-05', 2, 13, 'T', NULL, '20171124125823.png', '2017-11-24 19:58:10', 'TL', 1, 'T', NULL, NULL),
(57, 'jamescronous@gmail.com', 'SmFRYnZ6NUJtYWNNQWgxYU10RE56dz09', 'A. Shodiqul', 'Amiin Rosyid', 'A. Shodiqul Amiin Rosyid', 'Laki-Laki', 'Lamongan', '0888-0543-0513', 'UIN Sunan Ampel Surabaya', 'Web Developer Sistem Informasi Uinsa', 'Bojonegoro', '1998-03-05', 3, 25, 'Y', 2015, '20171202151234.png', '2017-11-24 22:20:54', 'V', 1, 'Y', 'Amiin Rosyid', 'amiin_rosyid'),
(58, 'sitinurkhayati287@gmail.com', 'MTdrSTZ0Mkp4MHhNcDVPMzc0TUhtUT09', 'Siti Nur ', 'Khayati', 'Siti Nur  Khayati', 'Perempuan', 'Brangsi, Laren, Lamongan', '0821-4096-1997', 'STIE Mahardhika Surabaya', 'CV. Bima Inti Perkasa', 'Lamongan', '1997-07-28', 3, 25, 'Y', 2015, '20171124152907.png', '2017-11-24 22:23:51', 'V', 1, 'T', 'Siti nur khayati', 'Siti_nurkhayati287'),
(60, 'cicikfaiqoh@gmail.com', 'N2dpbXYySjBOMDJuaUZDZEpZV1lOZz09', 'Cicik', 'Nur Faiqoh', 'Cicik Nur Faiqoh', 'Perempuan', 'Jalan rajawali 43 patihan widang tuban', '0858-5976-3676', 'UIN SUNAN AMPEL SURABAYA', '', 'Tuban', '2017-03-30', 3, 25, 'Y', 2015, '20171125020407.png', '2017-11-25 08:52:27', 'V', 1, 'Y', 'Cicik cicik', '@Ciciknf__'),
(61, 'L@gmail.com', 'SmFRYnZ6NUJtYWNNQWgxYU10RE56dz09', 'Tes', 'Set', 'Tes Set', 'Laki-Laki', 'Lamongan', '085706176104', NULL, NULL, 'Lamongan', '1998-03-05', 2, 14, 'T', NULL, '20171125073705.png', '2017-11-25 14:36:52', 'TL', 1, NULL, NULL, NULL),
(67, 'alfiatinnadhiroh05@gmail.com', 'czBWU0VRaU4xMjQ1VkhlUUtkdlJXZz09', 'Alfiatin', 'Nadhiroh', 'Alfiatin Nadhiroh', 'Perempuan', 'RT. 02 RW. 01 Dsn. Jaten Ds. Sumuragung Kec. Baureno Kab. Bojonegoro', '0857-4759-7720', 'UIN Sunan Ampel Surabaya', '', 'Bojonegoro', '1999-11-22', 3, 25, 'Y', 2016, '20171126102232.png', '2017-11-26 17:21:20', 'V', 1, 'T', 'Alfiatin Nadhiroh', '@Alfiatins99'),
(68, 'official@matric.club', 'RXFZNG5maGZVdGdmWDhPdUovWDZvUT09', 'Admin', 'Pitut Saifudin Yunus ', 'Admin Pitut Saifudin Yunus ', 'Laki-Laki', 'jln Kartini Babat', '0857-3364-8384', '', '', 'Lamongan', '1988-09-05', 3, 25, 'Y', 2015, '20171126205849.png', '2017-11-26 18:14:47', 'V', 2, 'T', 'Pitut saifudin yunus', '@psy_nak'),
(71, 'awilsuryanullah@gmail.com', 'Z1dlNTRjeXRtMUxnOXp6YlNuQ0V6Zz09', 'Awil', 'Suryanullah', 'Awil Suryanullah', 'Perempuan', 'Jepuro rt 04 rw 03 ngadipuro widang tuban', '0858-5158-5654', 'UIN Maulana Malik Ibrahim Malang', '', 'Tuban', '1999-09-09', 3, 28, 'Y', 2017, '20171126211507.png', '2017-11-27 04:13:57', 'V', 1, 'Y', 'Awil Suryanullah', '@aul_fianula'),
(72, 'ummah13@gmail.com', 'STVndGdyayt3SVBnaVR4OXBjNUxUdz09', 'Nur ', 'Itsna', 'Nur  Itsna', 'Perempuan', 'Jalan Gotong Royong no.124 Babat Lamongan', '082140999936', NULL, NULL, 'Lamongan', '2001-04-13', 2, 13, 'T', NULL, '20171126212515.png', '2017-11-27 04:23:30', 'V', 1, NULL, NULL, NULL),
(73, 'wati08913@gmail.com', 'Y0IrSmJyR2VYcC9KOWpwdmNYV0dhZz09', 'Ambar', 'Wati', 'Ambar Wati', 'Perempuan', 'Ds.gendongkulon babat lamongan', '0857-7404-5626', NULL, NULL, 'lamongan', '1999-06-22', 3, 28, 'T', NULL, NULL, '2017-11-27 04:26:55', 'V', 1, NULL, '', ''),
(74, 'ellafitrianuzuli@gmail.com', 'Qlp1QS9MbEVSeTBiRGwvQ21iMmJkUT09', 'Ella', 'Fitria', 'Ella Fitria', 'Perempuan', 'Jl.Madrasah no.36\r\nBabat', '085732166048', NULL, NULL, 'Lamongan', '2000-12-26', 3, 25, 'T', NULL, '20171126214735.png', '2017-11-27 04:44:36', 'V', 1, NULL, NULL, NULL),
(75, 'lailatissyarifah25@gmail.com', 'Qm5BZmpORnNKeTVvTVhTaWhaVnF6dz09', 'Lailatis', 'Syarifah', 'Lailatis Syarifah', 'Perempuan', 'RT 02 RW 03 Desa Kebalanpelang - Babat - Lamongan', '0857-3081-2420', 'Universitas Diponegoro', '', 'Lamongan', '1999-07-16', 3, 25, 'Y', 2017, '20171126220844.png', '2017-11-27 05:07:00', 'V', 1, 'Y', 'Lailatis Syarifah', 'lailatissy'),
(76, 'bivina0611@gmail.com', 'c2diRVpVOGV0N0dwWVpSUjhDWDZlQT09', 'Balqies', 'Savina', 'Balqies Savina', 'Perempuan', 'Kedungharjo, Widang, Tuban', '082233900306', NULL, NULL, 'Tangerang', '2000-11-06', 3, 25, 'T', NULL, NULL, '2017-11-27 05:14:16', 'V', 1, 'Y', NULL, NULL),
(77, 'elsaviranurizzah@gmail.com', 'a2ZzR05ZSkRYSkxUNSttbk9QSDlmQT09', 'Elsavira', 'Nurizzah', 'Elsavira Nurizzah', 'Perempuan', 'Jalan Brawijaya 02/01 Desa Gembong Kecamatan Babat Kabupaten Lamongan', '0856-0632-4395', 'UIN SUNAN AMPEL SURABAYA', '', 'Lamongan', '2000-06-07', 3, 25, 'Y', 2017, '20171126222016.png', '2017-11-27 05:17:45', 'V', 1, 'Y', 'Elsavira Nurizzah', 'e.nurizzah'),
(78, 'fannisa.kyu@gmail.com', 'Y1JuTElEa2JkVDQ4UzJDL2MzemlvUT09', 'Anisa', 'Nur Fauzia', 'Anisa Nur Fauzia', 'Perempuan', 'Jl Jembatan Lama Ling. Gerdu Kel. Banaran Kec. Babat', '0858-5352-9049', '', '', 'Lamongan', '1995-05-08', 3, 28, 'Y', 2013, '20171126224933.png', '2017-11-27 05:46:35', 'V', 1, 'Y', 'Anieza ziea', '@anizaa_nf'),
(79, 'alvianm51@gmail.com', 'RE02K2c1eCtwczMyNmEreGNpelJTQT09', 'Mohamad', 'Alvian', 'Mohamad Alvian', 'Laki-Laki', 'Ds. Banjar. Kec. Widang Kab. Tuban', '085731106218', NULL, NULL, 'Tuban', '1999-01-05', 3, 25, 'Y', 2016, '20171126230425.png', '2017-11-27 05:54:49', 'V', 1, 'Y', NULL, NULL),
(80, 'Deawulan18@gmail.com', 'aWJHYnMyVnlabW5GbUlKajByY1kzZz09', 'Dea', 'Wulan', 'Dea Wulan', 'Perempuan', 'Babat Lamongan', '0856-4545-4616', '', '', 'Lamongan', '1997-01-21', 3, 25, 'Y', 2015, '20171126234625.png', '2017-11-27 06:42:29', 'V', 1, NULL, '', ''),
(81, 'masrurroh9@gmail.com', 'a3RLSlF1RHRqRXJ5Lzlnam1SN0RhQjNWdVI5ZVVUWm0xZmY0cSs2SmFYMD0=', 'Siti', 'Masruroh', 'Siti Masruroh', 'Perempuan', 'Rt 002 Rw 001 Ds Warukulon Kec Pucuk Kab Lamongan Prov Jawa Timur', '085645456339', NULL, NULL, 'Lamongan', '1998-06-18', 3, 25, 'Y', 2016, '20171127070459.png', '2017-11-27 14:03:32', 'V', 1, NULL, NULL, NULL),
(82, 'kameliayholia@gmail.com', 'Tk91S3k4ZHcwWTVodERnUytrSGZLQT09', 'Dina', 'kamelia sukma', 'Dina kamelia sukma', 'Perempuan', 'Jln. Mawar RT 03/RW 03, Desa Patihan\r\nKec. Babat\r\nKab. Lamongan', '0838-5702-9672', NULL, NULL, 'Lamongan', '2000-12-22', 2, 23, 'T', NULL, '20171130073851.png', '2017-11-27 14:35:56', 'V', 1, 'T', 'Dina kamelia sukma', 'Dina_kamelia12'),
(83, 'Rokhimaif05@gmail.com', 'WUtmdllBTXk4M1ZnanFxaENJeVk1QT09', 'Rokhima', 'Isnanul Fitrotin', 'Rokhima Isnanul Fitrotin', 'Perempuan', 'Nawong 02/05 datinawong, babat, lamongan', '0857-3126-9598', '', '', 'Lamongan', '1998-01-05', 3, 25, 'Y', 2016, '20171128022950.png', '2017-11-28 09:27:58', 'V', 1, 'T', '', ''),
(84, 'qolbu.dzikru10@gmail.com', 'bk11dy9jRHVYdXM3c0VUWS95R004dz09', 'Qolbu', 'Dzikru R', 'Qolbu Dzikru R', 'Laki-Laki', 'Pucuk Pucuk Lamongan', '0856-5570-9577', NULL, NULL, 'Bojonegoro', '2001-12-30', 2, 13, 'T', NULL, '20171128060456.png', '2017-11-28 13:04:35', 'V', 1, 'Y', '', ''),
(85, 'diyayuni@gmail.com', 'VkZTeWN0V3lnVlI5c0lDK3RYdGF5Zz09', 'diya', 'yuni', 'diya yuni', 'Perempuan', 'Wanar-pucuk-lamongan', '085785168759', NULL, NULL, 'Lamongan', '2001-01-20', 3, 27, 'T', NULL, '20171202060740.png', '2017-12-02 13:06:16', 'V', 1, NULL, NULL, NULL),
(86, 'khotimaranka@gmail.com', 'QXk1eUhjNnZDbmprSm16ZTREbDVwZz09', 'Khotimmatul', 'Anwariyah', 'Khotimmatul Anwariyah', 'Perempuan', 'Ds.sambangan kec.babat kab.lamongan jawa timur', '081214546047', NULL, NULL, 'Lamongan', '2001-01-05', 3, 26, 'T', NULL, NULL, '2017-12-08 07:50:16', 'V', 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feed`
--
ALTER TABLE `feed`
  ADD PRIMARY KEY (`id_feed`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `struktur`
--
ALTER TABLE `struktur`
  ADD PRIMARY KEY (`id_struktur`);

--
-- Indexes for table `tentang`
--
ALTER TABLE `tentang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feed`
--
ALTER TABLE `feed`
  MODIFY `id_feed` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `struktur`
--
ALTER TABLE `struktur`
  MODIFY `id_struktur` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tentang`
--
ALTER TABLE `tentang`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
