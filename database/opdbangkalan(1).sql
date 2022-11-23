-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jan 2021 pada 11.29
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opdbangkalan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `IDBERITA` int(11) NOT NULL,
  `IDUSER` int(11) DEFAULT NULL,
  `GAMBAR` varchar(200) DEFAULT NULL,
  `JUDULBERITA` varchar(255) NOT NULL,
  `ISIBERITA` varchar(35000) DEFAULT NULL,
  `TGLBERITA` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`IDBERITA`, `IDUSER`, `GAMBAR`, `JUDULBERITA`, `ISIBERITA`, `TGLBERITA`) VALUES
(100001, 20032, 'b1.jpg', 'Kebijakan Baru, Dana Banpol Diprioritaskan Untuk Pendidikan Politik', '<p><strong>PENGGUNAAN </strong>dana bantuan partai politik (banpol) tahun 2018 berubah. Yakni realisasi kegiatan anggaran harus memprioritaskan pendidikan politik. Hal itu berdasarkan hasil rapat dengan Direktorat Jenderal Politik dan Pemerintahan Umum (Ditjen Polpum) Kementerian Dalam Negeri (Kemendagri) beberapa waktu lalu.</p>\r\n\r\n<p>Kepala Badan Kesatuan Bangsa dan Politik (Bakesbangpol) Bangkalan Sugeng Tommy Firyanto menyampaikan, bahwa perubahan mekanisme komposisi alokasi bantuan dana banpol menitikberatkan pada pendidikan politik. &ldquo;Prosentasenya lebih besar untuk pendidikan politik daripada ke sekretariat,&rdquo; terangnya, Rabu (30/06/2018).</p>\r\n\r\n<p>Komposisi itu, lanjut Tomy, bisa dilihat dari proposal pengajuan pencairan dana dari partai politik (parpol). Apabila lebih besar untuk kegiatan kesekretariatan, otomatis bagian tim verifikasi akan menolak. &ldquo;Intinya harus lebih tinggi anggaran pendidikan politik ketimbang anggaran kebutuhan lainnya,&rdquo; ungkapnya.</p>\r\n\r\n<p>Tommy mengungkapkan, pihaknya sudah melayangkan surat pemberitahuan kepada pimpinan parpol untuk segera mengajukan bantuan dana banpol tersebut. Targetnya sebelum lebaran sudah kelar dan bantuan dana banpol bisa diserap. &ldquo;Kemarin kami layangkan surat ke semua pimpinan parpol untuk mengajukan proposal ke kami,&rdquo; ujarnya. (<strong>yus/mas</strong>)</p>\r\n', '2020-03-15 09:07:22'),
(100002, 20032, 'b2.jpg', 'Bersama Baznaz, Pemkab Bangkalan Salurkan Ribuan Paket Bantuan', '<p><strong>BADAN </strong>Amil Zakat Nasional (Baznas) bersama Pemerintah Kabupaten Kabupaten Bangkalan, membagikan ribuan paket zakat kepada warga miskin dan kurang mampu pada Ramadhan 1439 Hijriah kali ini. Pembagian dilakukan di Pendopo Agung Pemkab Bangkalan, Kamis (31/5/2018).</p>\r\n\r\n<p>Menurut Ketua Baznas Kabupaten Bangkalan KH Nurudin A Rahman mengatakan, sembako yang didistribusikan tahun 2018/1439 H. Ini sebanyak 1,920 paket. Dengan rincian, 700 paket bantuan untuk anak yatim, 700 paket bantuan untuk kaum duafa, 500 paket untuk guru ngaji dan masjid/mushalla yang direhap sebanyak 20 paket bantuan.</p>\r\n\r\n<p>&ldquo;Sedakah yang khususnya dari SKPD yang diserahkan ke Baznas tahun ini totalnya sebanya Rp. 750 juta dan ada peningkatan dari tahun lalu. Harapan kami kedepan penyalurannya lebih banyak lagi,&rdquo; harap Pengasuh Pondok Pesanten Al-Hikam Burneh, Bangkalan ini.</p>\r\n\r\n<p>Ia menambahkan, Baznas Bangkalan sudah melaksanakan bantuan bergulir kepada 75 UMKM, bantuan tetap sebanyak 16 orang per bulan menerima Rp. 400 ribu. &ldquo;Untuk khitanan massal gratis akan dilaksanakan pada 1 Juli 2018 dan pemberian beasiswa kepada 200 anak yatim,&rdquo; ungkapnya.</p>\r\n\r\n<p>Dibanding tahun lalu, jumlah paket zakat yang didistribusikan kepada warga miskin dan kurang mampu tahun ini lebih sedikit. Yakni tahun 2017 lalu terdapat 2000 paket dan tahun 2016 hanya 1500 paket.</p>\r\n\r\n<p>Baznas merupakan badan khusus yang ditunjuk pemerintah sebagaimana amanat Undang-Undang Nomor 23 Tahun 2011 dan Peraturan Pemerintah (PP) Nomor 14 Tahun 2014 sebagai Pengelola Zakat.</p>\r\n\r\n<p>Sementara Pj Bupati Bangkalan I Gusti Ngurah Indra Setiabudi Ranuh saat mendampingi Baznas menuturkan, pihaknya atas nama pribadi dan Pemerintah Kabupaten Bangkalan sangat bersukur bahwa uang yang dititipkan oleh masyarakat di Baznas betul-betul dimanfaatkan dengan baik dan maksimal. &ldquo;Semoga pada tahun mendatang penyalurannya lebih banyak lagi, sehingga keberadaan Baznas di Bangkalan betul-betul sangat dirasakan oleh masyarakat,&rdquo; tandasnya.</p>\r\n\r\n<p>Indra, sapaan Pj Bupati Bangkalan juga meminta kepada masyarakat yang tergolong ekonomi mampu agar tidak segan-segan untuk juga membantu sesamanya. &ldquo;Terus terang, paket bantuan yang disalurkan baznas ini tidak mungkin bisa menjangkau semua lapisan masyarakat yang membutuhkan. Oleh karenanya, saya berharap semua yang merasa mampu agar sama-sama meningkatkan kepeduliannya untuk meringankan beben hidup sesama,&rdquo; pintanya.</p>\r\n\r\n<p>Abdullah, salah satu penerima bantuan mengaku sangat bersyukur terhadap bantuan yang diberikan kepadanya. Ia merasa bebannya sedikit terkurangi dengan adanya bantuan tersebut, terlebuh saat bulan ramadhan seperti saat ini. &ldquo;Adanya bantuan ini mengurangi beban hidup kita selaku orang tidak mampu,&rdquo; tandasnya.</p>\r\n\r\n<p>Ia berharap, pemberian bantuan langsung seperti saat ini diadakan sesering mungkin sehingga kesulitan ekonomi masyarakat bawah seperti dirinya dapat teratasi. &ldquo;Kalau bisa pemberian bantuan seperti ini diadakan sesering mungkin,&rdquo; pintanya. (<strong>eko/mas</strong>)&nbsp; &nbsp;&nbsp;</p>\r\n', '2020-03-15 09:07:37'),
(100003, 20032, 'b3.jpg', 'DPRD Bangkalan Dorong Pengelolaan Pariwisata Lebih Ditingkatkan', '<p><strong>DPRD</strong> Kabupaten Bangkalan mendorong Dinas Pariwisata dan Kebudayaan (Dispudbar) setempat untuk melakukan pendataan ulang aset wisata yang ada di Bangkalan. Hal ini berkaitan juga dengan capaian Pendapatan Asli Daerah (PAD) kedepan.&nbsp;&nbsp;</p>\r\n\r\n<p>Anggota Komisi D DPRD Bangkalan Abdurrahman menyampaikan, PAD pariwisata selama ini hanya diperoleh dari persewaan gedung Ratu Ebu. Sementara pariwisata lainnya yang ada di Bangkalan tidak dapat menyumbang PAD dari sektor pariwisata. &ldquo;Masih kecil lah, perlu dikelola yang lebih baik. Perlu adanya pendataan aset wisata dan kemudian digarapnya dengan baik,&rdquo; katanya, Kamis (31/05/2018).</p>\r\n\r\n<p>Abdurahman menilai selama ini tidak ada wisata yang patut dan layak untuk dipertontonkan. Pariwisata yang ada di Bangkalan masih standart dan biasa saja. Bahkan dikatakannya, belum ada pariwisata yang dianggap menarik untuk dipromosikan. &ldquo;Bagi kami masih standart-standart saja. Tidak punya kreativitas yang dapat meningkatkan PAD dari sektor pariwisata. Masih begitu-begitu saja. Anggaran dan regulasi dari tahun ke tahun hanya begitu saja,&rdquo; keluhnya.</p>\r\n\r\n<p>Untuk itu, Abdurahman meminta agar Disbudpar Kabupaten Bangkalan mencari cara agar pariwisata Bangkalan banyak dilirik oleh wisatawan, terpenting bisa menggandeng investor maupun pihak ketiga. &ldquo;Sektor wisata itu sangat menjanjikan. Jadi eman-eman jika tidak dikembangkan dengan maksimal. Apalagi di Kabupaten Bangkalan banyak destinasi yang bisa permak menjadi menarik, sehingga mengundang wisatwan untuk datang,&rdquo; tegasnya.</p>\r\n\r\n<p>Sementara, Kepala Dispudbar Lily Setiawati Mukti mengatakan, pihaknya berencana mengadakan program paket wisata pada tahun ini. Untuk pariwisata, dirinya telah merencanakan juga akan membangun semua sektor pariwisata yang ada di Bangkalan. &ldquo;Yang jelas semua pariwisata yang ada di Bangkalan akan dikembangkan secara bertahap, terutama yang sudah ada. Nanti kita akan membuat suatu paket wisata,&rdquo; tandasnya.</p>\r\n\r\n<p>Beberapa tempat wisata yang telah masuk agenda pengembangan tahun ini, kata Lily, diantaranya sungai Tonjung, Desa Tonjung, Kecamatan Burneh, yang akan dikembangkan menjadi destinasi wisata air. Selain airnya jernih, sungai yang tak pernah kering di musim kemarau tersebut juga dikelilingi oleh pepohonan yang rindang dan asri, sehingga menambah keindahan tempat tersebut. &ldquo;Tempatnya sangat bagus. Jadi, untuk sekedar menikmati keindahan alam atau sekedar foto-foto disitu sangat bagus,&rdquo; terangnya.</p>\r\n\r\n<p>Daerah yang juga dekat dengan kebun jeruk tersebut, akan dibuatkan sarana tubing, seluncur Riverboarding, Getek Tradisional, Spot Selfie Jembatan Warna, dan tempat untuk Selfie (<em>Spot Selfie</em>) yang saat ini menjadi trending.</p>\r\n\r\n<p>Selain Sungai Tojung, lanjut Lily, Disbupar Kabupaten Bangkalan akan melacak kepemilikan <strong>Pantai</strong>&nbsp;Siring Kemuning. Pasalnya, pantai yang sempat populer pada era tahun 1985 hingga 1990-an itu, status kepemilikan tanah di area pantai belum diketahui pasti.&nbsp;Sehingga Pemkab Bangkalan belum bisa mengembangkan pantai berpasir putih tersebut.</p>\r\n\r\n<p>Secara garis besar, Sambung Lily, status tanah itu milik negara. Tetapi jika kembali pada aturan, negara harus menghibahkan tanah itu ke Pemerintah setempat dalam pengelolaannya. (<strong>yus/mas</strong>)</p>\r\n', '2020-03-15 09:07:51'),
(100004, 20032, 'b4.jpg', 'Kemendagri Sosialisasikan UU No. 7 Tahun 2017 tentang Pemilu di Bangkalan', '<div class=\"span8\">\r\n<div style=\"margin-top:15px; text-align:justify; text-justify:inter-word\">\r\n<p><strong>PEMILIHAN </strong>Umum merupakan salah satu pilar demokrasi sebagai wahana perwujudan kedaulatan rakyat guna menghasilkan pemerintahan yang demokratis. Pemerintahan yang dihasilkan dari Pemilu diharapkan menjadi pemerintahan yang mendapatkan legitimasi yang kuat dan amanah. &nbsp;Oleh karena itu, diperlukan upaya dari seluruh komponen bangsa untuk menjaga kualitas Pemilu.</p>\r\n\r\n<p>&ldquo;Sosialisasi Undang-Undang Nomor 7 Tahun 2017 ini memiliki nilai yang sangat strategis dan penting mengingat sudah dekatnya pelaksanaan Pemilu serentak tahun 2019. Undang-Undang Nomor 7 Tahun 2017 tentang Pemilihan Umum ini merupakan sebagai landasan hukum dalam penyelenggaraan Pemilu serentak tahun 2019. Karena itu, kualitas pemilu bergantung pada sejuhmana undang-undang ini disosialisasikan dengan baik kepada penyelenggara pemilu dan stake holder terkait lainnya,&rdquo; kata Bakhtir, Direktur Politik Dirjen Politik dan Pemerintahan Umum (Polpum) Kemendagri, di gedung Rato Ebuh Bangkalan, Kamis (31/5/2018).</p>\r\n\r\n<p>Menurutnya, upaya memperbaiki kualitas pelaksanaan Pemilu merupakan bagian dari proses penguatan demokrasi serta upaya mewujudkan tata pemerintahan yang efektif dan efisien. Sehingga dengan demikian, proses demokratisasi dapat tetap berlangsung melalui Pemilu yang lebih berkualitas dan pada saat yang bersamaan proses demokratisasi berjalan dengan baik, terkelola, dan terlembaga.</p>\r\n\r\n<p>Pemilu, lanjut Bakhtir, sebagaimana diamanatkan dalam Pasal 2 Undang-Undang Nomor 7 Tahun 2017 tentang Pemilihan Umum, harus dilaksanakan berdasarkan asas langsung, umum, bebas, rahasia, jujur dan adil. &nbsp;Hal ini akan dapat tercapai, apabila seluruh komponen bangsa saling bahu-membahu mendukung pelaksanaan Pemilu dengan didasarkan pada peraturan perundang-undangan yang berlaku dan penghormatan hak-hak politik setiap warga negara.</p>\r\n\r\n<p>Di samping itu, suksesnya Pemilu bukan hanya bersandar pada integritas penyelenggara Pemilu dan peserta Pemilu saja. Namun demikian, juga harus didukung seluruh pemangku kepentingan Pemilu demi terciptanya sinergitas yang kuat dan saling berkesinambungan. Hal ini secara tegas diamanatkan pada Pasal 434 Undang-Undang Nomor 7 Tahun 2017 tentang Pemilihan Umum, di mana Pemerintah dan Pemerintah Daerah wajib memberikan bantuan dan fasilitas untuk kelancaran penyelenggaraan Pemilu.</p>\r\n\r\n<p>&ldquo;Intinya, diperlukan persamaan persepsi diantara pemangku kepentingan Pemilu dalam upaya pencapaian Pemilu yang demokratis tersebut,&rdquo; tuturnya.</p>\r\n\r\n<p>Bakhtir menjelaskan, salah satu bagian terpenting dari sebuah proses Pemilu adalah peran dan partisipasi masyarakat. Pertimbangan rasional, dengan menjadi pemilih cerdas perlu terus-menerus disosialisasikan sehingga nantinya diharapkan dapat terpilih pemimpin dan wakil-wakil rakyat yang mempunyai integritas dan kualitas yang tinggi.<br />\r\nSelain aspek pertimbangan rasional pemilih tersebut, tingkat partisipasi politik masyarakat juga menjadi perhatian khusus pada Pemilu serentak tahun 2019. Fakta yang ada menunjukkan bahwa saat ini telah terjadi satu kecenderungan fenomena fluktuasi tingkat partisipasi politik masyarakat dalam Pemilu.</p>\r\n\r\n<p>Ditjen Polpum mencatat, beberapa hasil pelaksanaan Pemilu Legislatif sebelumnya, yaitu Pemilu 1999 dengan tingkat partisipasi politik masyarakat 92%, Pemilu 2004 dengan tingkat partisipasi politik masyarakat 84%, Pemilu 2009 dengan tingkat partisipasi politik masyarakat 71%, dan Pemilu 2014 dengan tingkat partisipasi politik masyarakat 74%.<br />\r\nFenomena tersebut harus kita sikapi bersama dengan bijak. Sinergitas dari seluruh pemangku kepentingan Pemilu sangat diharapkan untuk memberikan sosialisasi yang tepat kepada masyarakat tentang arti pentingnya Pemilu bagi kehidupan berbangsa dan bernegara.</p>\r\n\r\n<p>Sementara itu, Pj Bupati Bangkalan I Gusti Ngurah Setya Budi Ranuh mengungkapkan, jika kondisi Bangkalan menjelang Pilkada Bangkalan aman dan damai. Sebab, pihaknya terus menjaga kondisufitas melalui sinergitas tiga pilar yakni Pemerintah Daerah, Kepolisian dan TNI.<br />\r\n&nbsp;<br />\r\n&ldquo;Kita ingin mengkampanyekan pilkada damai yang menyejukkan masyarakarat. Pemerintah harus hadir, dalam hal ini menjaga dan menjamin terlaksananya Pilkada dengan baik,&quot; tuturnya saat menyampaikan sambutan pembukaan sosialisasi Undang-Undang Nomor 7 Tahun 2017 tentang pemilihan umum.&nbsp;</p>\r\n\r\n<p>Sementara itu, peserta yang dalam sosialisasi tersebut terdiri dari para Ketua Partai Politik, Ormas serta organisasi kepemudaan lainya se-Kabupaten Bangkalan. (<strong>eko/mas</strong>)</p>\r\n</div>\r\n</div>\r\n', '2020-03-15 09:08:02'),
(100005, 20032, 'b5.jpg', 'Pemkab Bangkalan Sediakan 34,7 miliar Untuk THR ASN', '<p><strong>PEMERINTAH </strong>Kabupaten Bangkalan telah menyiapkan anggaran Tunjangan Hari Raya (THR) bagi Aparatur Sipil Negara (ASN). Tunjangan tersebut akan segera dicairkan pada awal bulan Juni ini. Selain THR, ASN Juga mendapatkan gaji Ke 13.&nbsp;</p>\r\n\r\n<p>Pj Bupati Bangkalan, I Gusti Ngurah Indra Setiabudi Ranuh menyampaikan lebaran tahun ini hanya ASN saja yang menerima THR dan gaji ke 13, sementara untuk Tenaga Harian Lepas (THL) tidak mendapatkan tunjangan. Tahun ini, Pemkab Bangkalan belum menganggarkan.</p>\r\n\r\n<p>&ldquo;Tahun ini belum bisa kita bagi. Untuk tahun 2019 akan dianggarkan untuk gaji 13 honorer dan THR. Tahun ini mereka belum dapat THR, tapi mereka dapat rapelan yang cukup besar,&rdquo; katanya, Senin (04/06/2018).</p>\r\n\r\n<p>Sementara itu Kepala Badan Pengelolaan Keuangan dan Aset Daerah (BPKAD) Syamsul Arifin ketika ditemui di ruang kerjanya menjelaskan Pemkab Bangkalan menganggarkan 37,4 Miliar yang akan disalurkan ke 8.807 ASN.</p>\r\n\r\n<p>Sedangkan untuk pencairan THR dan gaji ke 14 tergantung kepada pengajuan Organisasi perangkat daerah (OPD) masing-masing.&nbsp;&ldquo;Cepat tidaknya pencairan itu tergantung OPD. Yang masuk hari ini sudah ada 7 OPD. Jadi semua tergantung dari permintaan OPD masing-masing,&rdquo; ungkapnya.&nbsp;</p>\r\n\r\n<p>Sekedar diketahui, didalam Anggaran Pendapatan dan Belanja Negara (APBN) 2018, pemerintah akan menggelontorkan belanja pegawai sebesar Rp 356,7 triliun, naik dibandingkan tahun lalu Rp 330,9 triliun. Ini sudah termasuk gaji ke-13 dan THR bagi pensiunan PNS. (<strong>yus/mas</strong>)</p>\r\n', '2020-03-15 09:05:41'),
(100006, 20032, 'b6.jpg', 'RSUD Syamrabu Bangkalan Mulai Operasikan Alat Colonscopy', '<p><strong>RUMAH</strong> Sakit Umum Daerah Syarifah Ambami Ratu Ebu (RSUD Syamrabu) Bangkalan mulai mengoperasikan alat baru <em>colonscopy</em>. Terlihat beberapa pasien yang mengalami gangguan pencernaan diperiksa melalui alat tersebut.</p>\r\n\r\n<p>Dokter Ahli Bedah RSUD Syamrabu Bangkalan Nurul Hidayat mengungkapkan, bahwa <em>colonoscopy</em> merupakan alat yang multifungsi. Alat ini bisa digunakan untuk mendiagnostik dan terapeltic. <em>Colonscopy</em> juga bisa digunakan untuk mengetahui kondisi saluran pencernaan bagian bawah. <em>Colonoscopy</em> merupakan tabung empat kaki panjang yang fleksibel dengan kamera kecil di bagian ujungnya yang dapat menampilkan bagaimana kondisi ususnya. &ldquo;Dengan alat ini semua penyakit yang ada didalam pencernaan, seperti usus besar dapat terlihat dengan jelas,&rdquo; katanya, Senin (04/06/2018).</p>\r\n\r\n<p>Selain itu, dapat digunakan sebagai pengobatan pendarahan usus dan striktura. Sehingga, menurut dokter ahli bedah ini, dapat melakukan pemeriksaan bospsy jaringan atau polip sebagai <em>screening</em> dari tindak lanjut pasien. &ldquo;Semisal ternyata pasien dengan polip, kami bisa angkat polipnya dengan alat ini,&rdquo; imbuhnya.</p>\r\n\r\n<p>Dokter yang akrab dipanggil Yayak ini menjelaskan, selain alat untuk melihat penyakit yang ada di pencernaan bawah, <em>colonoscopy</em> juga bisa digunakan untuk <em>endoscopy</em> (EGD). EGD merupakan alat yang dapat melihat gangguan pada bagian pencernaan atas seperti tenggorokan maupun gangguan saluran pernafasan.</p>\r\n\r\n<p>Jika <em>colonoscopy</em> dimasukkan melalui tubuh bagian bawah (Anus, red). EGD dimasukkan melalui atas yakni melalui mulut maupun hidung. Fungsi alat inipun sama dengan <em>colonoscopy</em> yakni mendiagnosis dan mengangkat penyakit bagian atas.</p>\r\n\r\n<p><em>Endoscopy</em> mampu mengikat pembuluh darah yang melebar sehingga mempersempit saluran cerna, memotong daging tumbuh yang dapat menghalangi saluran cerna maupun penyakit pencernaan lainnya.</p>\r\n\r\n<p>&ldquo;Maka alat ini bisa digunakan untuk <em>endoscopy</em>, EGD namanya. Jadi dimasukkan dari hidung atau mulut masuk hingga lambung. Sehingga mampu melihat gangguan dari pencernaan dari atas,&rdquo; paparnya.</p>\r\n\r\n<p>Sementara itu, Humas RSUD Syamrabu Urip Budiman mengatakan, alat ini merupakan alat satu-satunya yang ada di Madura. &ldquo;Kami sudah punya alat <em>colonoscopy</em> dan <em>endoscopy</em>. Jadi ngapain harus jauh-jauh dan antre berjam-jam di Rumah Sakit Dr. Soetomo Surabaya,&rdquo; tandasnya.&nbsp;(<strong>yus/mas</strong>)</p>\r\n', '2020-03-15 09:06:33'),
(100007, 20032, 'b7.jpg', 'Komisi A Godok Perda Penyelenggaraan Rumah Kos', '<p><strong>KOMISI </strong>A Dewan Perwakilan Rakyat Daerah (DPRD) Kabupaten Bangkalan, telah merampungkan rancangan Peraturan Daerah (Perda) &ldquo;Penyelenggaraan Rumah Kos&rdquo;. Perda tersebut dilakukan untuk menertibkan pengelolaan rumah kos yang ada di wilayah Bangkalan.</p>\r\n\r\n<p>Anggota Komisi A DPRD Bangkalan, Muhamad Sahri mengatakan, selain untuk menertibkan pengelolaan rumah kos yang ada di wilayah Bangkalan, juga sebagai antisipasi penyalahgunaan fungsi kos. Dengan aturan itu, pemerintah dapat mengontrol pengelolaan kos tanpa mengabaikan hak penggunanya.</p>\r\n\r\n<p>&ldquo;Dalam raperda ini juga diatur, mulai dari ijin operasionalnya, sampai penghuninya. Sehingga semua dapat dikontrol dan ditertibkan. Apalagi sekarang marak pelaku terorisme,&rdquo; terang dia, Senin (04/06/2018).</p>\r\n\r\n<p>Dikatakan Sahri, perda tersebut akan menjadi acuan hukum bagi daerah untuk menarik retribusi dari pengelola rumah kos. Setiap rumah kos akan didata oleh dan memeroleh ijin dari pemerintah secara periodik. Pemisahan antara kamar perempuan dan penghuni laki laki. &ldquo;Perijinannya nanti akan ditangani dari dinas perijinan. Setiap rumah diatas sepuluh kamar akan dikenakan retrebusi,&rdquo; katanya.</p>\r\n\r\n<p>Dia menambahkan, raperda penyelenggaraan rumah kos itu tidak lain untuk memperjelas aturan dan kewajiban pengelola. Sehingga setiap pengelola mempunyai tanggung jawab sesuai dengan aturan yang ada. Lebih dari itu, lanjut Sahri, pengelola kos diharapkan bisa lebih peduli dalam melakukan pengawasan terhadap penghuni kosnya. &ldquo;Bukan setelah&nbsp; penghuninya bayar kemudia lepas tanggung jawab,&rdquo; sergahnya.</p>\r\n\r\n<p>Hingga saat ini, sambung Sahri, Raperda tentang penyelenggaraan rumah kos itu sudah rampung dan siap untuk diparipurnakan. &ldquo;Smuanya sudah siap termasuk kajian akademiknya. Nanti tinggak memparipurnakan saja,&rdquo; ungkapnya.</p>\r\n\r\n<p>Sebelumnya Dinas Penanaman Modal dan Pelayanan Perijinan Terpadu Satu Pintu&nbsp; (DPM-P2TSP) berjanji akan lebih memperketat izin pembangunan rumah kos. Hal itu lantaran tahun lalu petugas Satpol PP sering melakukan razia rumah kos yang terkesan bebas, terutama yang berada di daerah kampus.</p>\r\n\r\n<p>Kepala Dinas Penanaman Modal dan Pelayanan Perijinan Terpadu Satu Pintu&nbsp; (DPM-P2TSP) Moh. Hasan Faisol mengungkapkan jika pada awalnya warga memberikan surat pemberitahuan untuk membangun rumah, akan tetapi setelah bangunan tersebut selesai malah menjadi sebuah rumah kos. &ldquo;Itu yang sering terjadi di lapangan,&rdquo; ungkapnya.</p>\r\n\r\n<p>Maka dari itu, pihaknya akan segera mendesak para pemilik rumah kos agar segera melaporkan data real bahwa telah mendirikan rumah kos. Faisol menambahkan jika rumah yang termasuk salah satu rumah kos harus mempunyai syarat tertentu, yakni memiliki jam tutup di malam hari dan mempunyai penjaga. (<strong>eko/mas</strong>)</p>\r\n', '2020-03-15 09:10:05'),
(100008, 20032, 'b8.jpg', 'Jelang Lebaran, Harga Telur Mulai Mengalami Kenaikan', '<p><strong>DINAS </strong>perdagangan (disdag) memprediksi kenaikan harga komoditas akan mengalami lonjakan mulai H-7 Lebaran Idulfitri. Itu terjadi karena permintaan atau kebutuhan masyarakat naik. Sementara stok komoditas di pasaran terbatas.</p>\r\n\r\n<p>Mengetahui hal itu, anggota Komisi B DPRD Bangkalan M. Husni Syakur meminta pemerintah segera mengambil langkah antisipatif. Dua pekan sebelum perayaan Idulfitri, pemerintah bisa menstabilkan stok dan harga di pasaran. &ldquo;Jangan dianggap kenaikan harga selama Ramadan dan hari raya sudah biasa. Karena masyarakat tentu berharap harga tetap stabil,&rdquo; desaknya, Senin (04/06/2018).</p>\r\n\r\n<p>Menanggapi itu, Kepala Disdag Bangkalan Budi Utomo mengklaim terus melakukan koordinasi terkait stok komoditas dengan sejumlah pihak. Menurutnya, sampai saat ini harga sejumlah komoditas di pasaran masih stabil. &ldquo;Daging masih tetap di harga Rp 110 ribu per kilogram. Itu untuk daging lokal. Kalau untuk daging beku berkisar antara Rp 90 ribu sampai Rp 100 ribu per kilogram,&rdquo; paparnya.</p>\r\n\r\n<p>Selain itu, untuk harga komoditas lainnya seperti telur berkisar Rp 25 ribu. Sementara untuk daging ayam per kilogramnya saat ini berada di harga Rp 40 ribu. &ldquo;Terus kami pantau,&rdquo; kata Budi.</p>\r\n\r\n<p>Dia menambahkan, kemungkinan lonjakan harga akan terjadi mulai H-7 Lebaran. Sebab, banyak perantauan yang pulang kampung. Sehingga pemenuhan kebutuhan semakin bertambah. &ldquo;Tapi tetap kami usahakan untuk terus stabil,&rdquo; tukasnya.</p>\r\n\r\n<p>Salah satu yang menonjol kata Budi adalah kenaikan harga telur ayam. Telur ayam terus merangkak naik. Seminggu terakhir harga telur ayam yang biasa dijual dengan harga sekitar Rp 20-22 ribu per kilogram kini mengalami kenaikan hingga 25 ribu per kilogramnya.</p>\r\n\r\n<p>Sebelumnya, Kepala Dinas Perdagangan (Disdag) Bangkalan Budi Utomo mengatakan bahwakenaikan harga pangan menjelang ramadhan merupakan hal biasa. Untuk itu ia menghimbau agar masyarakat tidak panik dan tetap tenang menghadapi kenaikan ini.&nbsp;&ldquo;Naiknya tidak sampai tinggi untuk harga telur dan daging ayam. Jadi masih tahap aman,&rdquo; tandasnya.</p>\r\n\r\n<p>Budi menambahkan, pihaknya selalu memantau kondisi pasar setiap menjelang hari-hari besar. &ldquo;Kadang kita turun lapangan langsung, terkadang mengintruksikan setiap kepala pasar untuk melaporkan kondisi harga pada kita,&rdquo; terangnya. (<strong>eko/mas</strong>)</p>\r\n', '2020-03-15 09:11:17'),
(100009, 20032, 'b9.jpg', 'Kelancaran Lalin dan Keamanan Warga Jadi Prioritas Dalam Rakor 2018', '<p><strong>MENJELANG </strong>arus mudik dan balik lebaran Idul Fitri 2018, Dinas Perhubungan Kabupaten Bangkalan menggelar rapat koordinasi rencana operasi angkutan lebaran terpadu di Aula kantor Dishub setempat, Selasa (5/6/2018). Hadir dalam rakor bersama tersebut adalah Polres Bangkalan, Kodim 0829, Dinas Perdagangan, Dinas Kesehatan, ASDP dan Jasa Marga.</p>\r\n\r\n<p>Dalam rapat tersebut sejumlah titik kemacetan pasar tumpah di wilayah Kabupaten Bangkalan dan pintu tol Suramadu, menjadi perhatian khusus oleh pihak terkait.</p>\r\n\r\n<p>Menurut Kepala Dinas Perhubungan (Dishub) Kabupaten Bangkalan, Ram Halili mengatakan, operasi angkutan lebaran terpadu 2018 akan di mulai H-8 sampai H+8 lebaran Idul Fitri. &ldquo;Berdasarkan hasil evaluasi dari tahun sebelumnya yang perlu diantasispasi sejumlah titik kemacetan di pasar tumpah dan di tol get Suramadu,&rdquo; kata Ram Halili.</p>\r\n\r\n<p>Dijelaskan Ram Halili, untuk pasar tumpah yang ada di jalur nasional Madura dipastikan terjadi kemacetan pada masa arus mudik dan balik lebaran, yaitu Pasar Patemon, Pasar Tanah Merah, Pasar Galis, Pasar Blega, Pasar Klampis dan Pasar Sepuluh, serta Pasar Tanjung Bumi.</p>\r\n\r\n<p>&ldquo;Untuk mengantisipasi kemacetan itu,&nbsp; semua pihak terkait bersepakat akan terjun ke lapangan dalam mengatur dan melakukan rekayasa arus lalulintas agar masyarakat yang melintas di wilayah Bangkalan merasa nyaman dan aman,&rdquo; tandasnya.</p>\r\n\r\n<p>Dishub pun memastikan volume lalu lintas kendaraan yang melintas di jalan akses Suramadu pada masa angkutan lebaran tahun 2018 ini diperkirakan 1.360.569 kendaraan&nbsp; atau naik 6 persen dibandingkan pada masa angkutan lebarah tahun 2017 lalu yang hanya 1.283.556. kendaraan. &ldquo;Volume lalu lintas di akses Suramadu pada lebaran tahun ini diprediksikan meningkat sekitar 6 persen,&rdquo; kata mantan Kasatpol PP itu.</p>\r\n\r\n<p>Dikatakan dia, selain melalui jalan akses Suramadu, angkutan lebaran di Kabupaten Bangkalan juga akan melalui angkutan penyeberangan&nbsp;pelabuhan ujung Kamal. &ldquo;Kalau kendaraan yang melalui penyeberangan pelabuhan Ujung &ndash; Kamal&nbsp; pada lebaran tahun 2018 ini diprediksi naik sekitar 3 persen,&rdquo; jelas Ram Halili.</p>\r\n\r\n<p>Dalam penyelenggaran angkutan lebaran tahun 2018 ini kata Ram Halili, semua <em>steakholder</em> mulai dari Jasa Marga, Kepolisian Dinas Kesehatan, Dinas Perdagangan, Satpol PP semuanya siap mendukung untuk kesuksesan angkutan lebaran ini.&nbsp;&ldquo;<em>Alhamdulilah</em> semua instansi dan <em>steakholder</em> mendukung angkutan lebaran arus mudik dan arus balik ini,&rdquo; katanya.</p>\r\n\r\n<p>Ditambahkan Ram Halili, karena saat ini di tol Suramadu telah menggunakan kartu e-tol, maka diharapkan kepada semua masyarakat agar supaya yang tidak mempunyai kartu e-tol&nbsp;menyiapkannya terlebih dahulu. &ldquo;Masyarakat harus sadar diri, sekarang semuanya memakai e-tol. Jadi jangan masuk ke Suramadu kalau tidak memiliki e-tol,&rdquo; tegasnya.</p>\r\n\r\n<p>Kadishub Bangkalan ini mengharapkan, apa yang dibahas dalam rapat koordinasi rencana operasi angkutan lebaran terpadu tahun 2018 ini, bisa memperlancar pelaksanaan operasi angkutan lebaran tersebut. &ldquo;Ya kita berharap dalam pelaksanaanya nanti berjalan dengan lancar,&rdquo; pungkasnya.</p>\r\n\r\n<p>Sementara dalam pemaparannya, IPDA Mansur selaku KBO Lantas Polres Bangkalan menjelaskan dengan sangat detail terkait dengan rencana rekayasi lalulintas (lalin) yang akan diterapkan pada arus mudik dan balik nanti. Beberapa rekyasa yang telah disiapkan, diantaranya untuk mengantisipasi pasar tumpah Patemon, Tanah Merah dan Pasar Blega.</p>\r\n\r\n<p>&ldquo;Untuk tahun ini (2018 red) kita akan memakai rekayasa lalin tahun lalu karena sudah terbukti dapat meminimalisir kemacetan di beberapa pasar tumpah,&rdquo; terangnya.</p>\r\n\r\n<p>Disamping kelancaran arus lalin, Satuan Lalulintas (Satlantas) Polres Bangkalan juga mendirikan beberapa pos pantau di beberapa lokasi yang dinilai rawan kriminalitas. Diantaranya, di pintu tol Jembatan Suramadu, Pelabuhan Kamal, Kota Bangkalan dan daerah wisata Jaddih. &ldquo;Karena daerah Jaddih masuk area wisata, maka kita pasang pos pantau juga untuk memberikan rasa aman kepada masyarakat atau pengunjung,&rdquo; pungkas Mansur. (<strong>eko/mas</strong>)</p>\r\n', '2020-03-15 09:12:20'),
(100010, 20032, 'b10.jpg', 'Diskominfo Bangkalan Gelar Forum Sinkronisasi Informasi dengan Awak Media', '<p><strong>DINAS </strong>Komunikasi dan Informasi (Diskominfo) menggelar sinkronisasi informasi penyelenggaraan Pemerintah Kabupaten Bangkalan Tahun 2018 di ruang meeting Pendopo Bupati Bangkalan, Selasa (05/06/2018). Dalam sinkronisasi tersebut dihadiri langsung Pj Bupati Bangkalan I Gusti Ngurah Setia Budi Ranuh.</p>\r\n\r\n<p>Sedikitnya 43 wartawan dari berbagai media di Kabupaten Bangkalan, baik media cetak, elektronik maupun online yang hadir. Menurut kepala Dinas Komunikasi dan Informasi (Diskominfo) Kabupaten Bangkalan Bambang Setiawan, mengatakan bahwa media massa mempunyai peran penting dalam menyampaikan informasi-informasi yang terkait dengan penyelenggaraan pemerintah daerah. &ldquo;Dengan adanya pertemuan dan kerjasama ini kita berharap ada silaturahmi yang baik kedepannya,&rdquo; tuturnya.</p>\r\n\r\n<p>Bambang menambahkan, kedepan segenap Organisasi Perangkat Daerah (OPD) tidak lagi merasa alergi terhadap media massa. &ldquo;Sebetulnya rekan-rekan OPD tidak alergi dengan media, hanya saja mungkin waktunya saja yang kurang pas,&rdquo; imbuhnya.</p>\r\n\r\n<p>Sementara itu Pj Bupati Bangkalan I Gusti Ngurah Setia Budi Ranuh menyampaikan terima kasih kepada awak media yang sudah menyampaikan beragam informasi masyarakat selama kurun waktu 60 hari keberadaanya di Kabupaten Bangkalan. &ldquo;Rapat ini istimewa karena bersamaan dengan malam dua puluh satu bulan Ramadan dan dua puluh satu hari lagi menuju pilkada,&rdquo; ungkapnya.</p>\r\n\r\n<p>Pria keturunan Bali-Pamekasan itupun menceritakan, jika setiap hari dirinya merima 250 SMS yang berisi keluhan dari masyarakat, mulai dari jalan rusak, lampu padam, hingga soal KTP.&nbsp;</p>\r\n\r\n<p>Indra, sapaan akrab Pj Bupati Bangkalan ini mengakui tak semua keluhan itu langsung direspon. Terlalu banyak katanya. Tapi, dia pastikan, informasi itu dibaca dan dicek. Lalu, diteruskan ke instansi terkait agar ditindaklanjuti. &ldquo;Terkadang saya juga lebih dulu tahu karena membaca berita dari pada laporan dari kepala OPD,&rdquo; tandasnya.</p>\r\n\r\n<p>Selain itu, Indra juga meminta kepada semua awak media yang ada di Bangkalan untuk ikut mensukseskan pelaksanaan pilkada yang sudah tinggal menghitung hari. &ldquo;Pilkada Bangkalan merupakan pesta demokrasi untuk memilih pemimpin Bangkalan dalam lima tahun kedepan. Mari kita sukseskan bersama-sama karena peran media sangat penting, utamanya dalam menjaga kondusifitas,&rdquo; pintanya.</p>\r\n\r\n<p>Dalam forum tersebut, Pj Bupati Bangkalan juga membuka dialog dengan seluruh awak media terkait dengan kinerja Pemerintah Kabupaten Bangkalan. &ldquo;Terus terang, saya sangat suka dengan kritik tapi yang membangun. Karena tanpa adanya kritik dan masukan, kinerja kita tidak akan pernah menjadi lebih baik,&rdquo; tegasnya.</p>\r\n\r\n<p>Kritik membangun yang saya maksud itu, lanjut Indra, utamanya apabila berkaitan dengan pelayanan dasar karena itu langsung bersentuhan dengan masyarakat. &ldquo;Semua pasti saya perhatikan dan langsung saya teruskan ke OPD terkait. Hanya saja yang perlu dipahami bahwa tidak semua keluhan maupun masukan itu langsung ditindaklanjuti saat itu juga, tapi butuh waktu. Yang pasti, masa tugas saya dalam beberapa bulan kedepan ini, akan memperbaiki apa yang kurang baik dan akan meningkatkan apa-apa yang sudah baik,&rdquo; tegasnya.</p>\r\n\r\n<p>Kepada selaruh awak media, Pj Bupati Bangkalan meminta agar tidak sungkan-sungkan untuk memberikan masukan maupun kritikan. &ldquo;Meski tidak ketemu langsung, bisa disampaikan lewat SMS dan pasti saya perhatikan,&rdquo; pungkasnya. (<strong>eko/mas</strong>)</p>\r\n', '2020-03-15 09:13:34'),
(100011, 20032, 'b11.jpeg', 'Pemkab Bangkalan Rutin Gelar Dzikir dan Sholawat Bersama', '<div style=\"margin-top:15px; text-align:justify; text-justify:inter-word\">\r\n<p style=\"text-align:justify\"><strong>SEBAGAI</strong> wujud implementasi kota dzikir dan sholawat, Pemerintah Kabupaten Bangkalan secara rutin menggelar dzikir dan sholawat bersama. Pelaksanaan Dzikir dan sholawat yang rutin dilaksanakan setiap tiga bulan sekali tersebut, mendapat respon positif. Bukan hanya dari kalangan ASN saja, masyarakat umum juga antusias mengikuti kegiatan dizikir dan sholawat.</p>\r\n\r\n<p style=\"text-align:justify\">Bupati Bangkalan, R. Abdul Latif Amin Imron yang membuka secara langsung kegiatan dzikir dan sholawat mengatakan, kegiatan tersebut memiliki banyak manfaat bagi masyarakat. Terutama sebagai wujud rasa syukur kepada Allah SWT. &quot;Kegiatan dzikir dan sholawat juga menjadi media silaturahmi pemerintah dengan masyarakat, dan kita sesama umat muslim,&quot; kata Ra Latif, sapaan akrab Bupati Bangkalan.</p>\r\n\r\n<p style=\"text-align:justify\">Kegiatan dzikir dan shalawat ini, sambungnya, juga dalam rangka untuk menjaga keseimbangan sebagai manusia yang melaksanakan aktifitas dan tugas yang diemban. Dalam kapasitas sebagai pemimpin masyarakat dan sebagai manusia hamba Allah yang wajib memohon petunjuk dan ampunan dari Allah SWT.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&quot;Saya harap melalui kegiatan yang rutin kita adakan ini, dapat membangun pemerintahan dan masyarakat yang beriman, bermoral dan teguh pada nilai-nilai islam,&quot; harapnya. Selain dzikir dan shalawat, acar juga diisi dengan ceramah agama yang disampikan oleh Habib Ubaidillah Bin Idrus Al-Habsyi Surabaya. <strong>(yus/mas)</strong></p>\r\n</div>\r\n', '2020-03-15 09:14:47'),
(100012, 20032, 'b12.jpeg', 'Bupati Lantik Forum Pengurus Karang Taruna Kabupaten Bangkalan Priode 2019-2024', '<div style=\"margin-top:15px; text-align:justify; text-justify:inter-word\">\r\n<p style=\"text-align:justify\"><strong>BUPATI</strong> Bangkalan R. Abdul Latif Amin Imron melantik sekaligus mengukuhkan Forum Pengurus Karang Taruna Kabupaten Bangkalan Priode 2019-2024. Acara pelantikan yang dilaksanakan di Gedung Diklat Kabupaten Bangkalan, diikuti perwakilan karang taruna kecamatan dan kelurahan se Kabupaten Bangkalan.</p>\r\n\r\n<p style=\"text-align:justify\">Dalam sambutannya, Ra Latif, sapaan akrab Bupati Bangkalan mengatakan bahwa karang taruna merupakan salah satu organisasi kepemudaan yang memiliki peranan penting. Tidak hanya sebagai media pengembangan generasi muda, namun karang taruna juga memiliki fungsi sebagai wadah pemberdayaan masyarakat sekaligus sebagai penggerak pembangunan.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&ldquo;Untuk dapat meningkatkan potensi dan peran aktifnya, diperlukan upaya koordinasi, kolaborasi, komunikasi dan kerjasama antar karang taruna. Dengan kata lain, koordinasi konstruktif dengan pemerintah kabupaten selaku pembina fungsional sehingga apa yang dikerjakan ke depan dapat seiring dan sejalan,&quot; papar bupati.</p>\r\n\r\n<p style=\"text-align:justify\">Selain itu, sebagai potensi pemberdayaan masyarakat, karang taruna yang bergerak dalam bidang Usaha Kesejahteraan Sosial (UKS), perlu untuk selalu meningkatkan kualitas kelembagaan. Karenanya, Ra Latif berharap Kepengurusan Karang Taruna Masa Bhakti 2019-2024 dapat menggali segala aspek yang menyangkut pembangunan kesejahteraan sosial.</p>\r\n\r\n<p style=\"text-align:justify\">Karang taruna juga diharapkan mampu membina para generasi muda untuk tampil dalam pembangunan secara kreatif dan inovatif. Sehingga dapat meningkatkan kesejahteraan masyarakat. &quot;Nanti pada gilirannya dapat membina generasi muda secara efektif dan efisien. Khususnya dalam kegiatan usaha-usaha kesejahteraan sosial,&quot; tuupnya. <strong>(eko/mas)</strong></p>\r\n</div>\r\n', '2020-03-15 09:15:48'),
(100013, 20032, 'b131.jpeg', 'waw Bupati Resmikan Ground Breaking Gedung Baru DPRD Bangkalan', '<div style=\"margin-top:15px; text-align:justify; text-justify:inter-word\">\r\n<p style=\"text-align:justify\"><strong>BUPATI</strong> Bangkalan R. Abdul Latif Amin Imron meresmikan Groud Breaking Pembangunan gedung DPRD Kabupaten Bangkalan di Jalan Halim Perdana Kusuma, Kamis (11/07/2019). Pada Kesempatan itu, bupati meminta agar pembangunan gedung yang ditargetkan selesai akhir tahun itu dapat selesai tepat waktu.</p>\r\n\r\n<p style=\"text-align:justify\">&quot;Kami juga berharap kualitas dan kuantitas bangunan layak dan representatif,&quot; pinta Ra Latif, panggilan akrab Bupati Bangkalan ini. Diharapkan, dengan adanya gedung baru dapat menjadi tempat warga berkeluh kesah kepada para wakil rakyat.</p>\r\n\r\n<p style=\"text-align:justify\">&quot;Dengan sarana dan prasarana yang memadai ini, kita juga berharap agar kinerja DPRD lebih produktif dalam menyerap aspirasi masyarakat,&quot; imbuh mantan Wakil Ketua DPRD Bangkalan ini.</p>\r\n\r\n<p style=\"text-align:justify\">Sementara itu, Kepala Dinas Perumahan Rakyat dan Kawasan Pemukiman (PRKP) Kabupaten Bangkalan Ishak Sudibyo menjelaskan, anggaran pembangunan gedung baru DPRD Bangkalan bersumber dari Dana Alokasi Umum (DAUM) APBD 2019 sebesar Rp 48 miliar. Gedung tersebut berdiri di atas lahan seluas 13.250 meter persegi dengan luas bangunan 5.778 meter persegi dan terdiri dari empat lantai.</p>\r\n\r\n<p style=\"text-align:justify\">Gedung para anggota legislatif di Bangkalan memiliki kantor dan gedung baru yang pengerjaan proyek pembangunannya akan dikebut. &quot;Kalau sesuai jadwal hanya memakan waktu selama 180 hari atau 6 bulan. Jadi waktu pengerjaan hanya setengah tahun saja,&quot; pungkasnya. <strong>(eko/mas)</strong></p>\r\n</div>\r\n', '2020-03-30 09:35:38'),
(100015, 20032, 'b14.jpeg', 'Wakil Bupati Bangkalan Tutup Diklat Kepemimpinan Tingkat VI', '<div style=\"margin-top:15px; text-align:justify; text-justify:inter-word\">\r\n<p style=\"text-align:justify\"><strong>WAKIL</strong> Bupati Bangkalan Drs. Mohni MM menutup Diklat Kepemimpinan Tingkat IV angkatan 18 tahun 2019, Senin (15/07/2019). Diklat ini merupakan pola kemitraan Pemerintah Kabupaten Bangkalan dengan Badan Pengembangan Sumber Daya Manusia Provinsi Jawa Timur.</p>\r\n\r\n<p style=\"text-align:justify\">Mengawali sambutanya Wabup menyampaikan selamat kepada para peserta diklat PIM IV. Mohni berharap para peserta membawa hasil berupa proyek perubahan yang telah diimplementasikan di unit kerja masing-masing.</p>\r\n\r\n<p style=\"text-align:justify\">&ldquo;Saya berharap, hasil tersebut tidak sekedar menjadi kenangan, arsip atau dokumen yang disimpan di file atau menghiasi rak buku. Sebaliknya, mampu membawa hasil berupa proyek perubahan. Dimana proyek perubahan tersebut dapat dilaksanakan serta menginspirasi lahirnya gagasan-gagasan dan inovasi berikutnya,&quot; ungkap Mohni.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Sebagaimana inti dari penyelenggaraan diklat PIM yakni ingin melahirkan kepemimpinan yang trasformatif dan inovatif, Mohni menekankan pentingnya inovasi. Karena hal tersebut sudah menjadi tuntutan publik saat ini.</p>\r\n\r\n<p style=\"text-align:justify\">&ldquo;Perlu saya tekankan kembali, bahwa inovasi menjadi tuntutan publik saat ini. Dengan kata lain, apabila birokrasi berhenti berinovasi, maka akan terjadi stagnan. Inovasi dapat terus tumbuh apabila kita peka membaca situasi, menangkap peluang dan menganalisis kebutuhan serta berpikir kratif,&quot; ucapnya. <strong>(yus/mas)</strong></p>\r\n</div>\r\n', '2020-03-31 07:11:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `IDDOKUMEN` int(11) NOT NULL,
  `IDUSER` int(11) DEFAULT NULL,
  `NAMADOKUMEN` varchar(255) DEFAULT NULL,
  `IMGthumbnail` varchar(255) NOT NULL,
  `JUDULDOKUMEN` varchar(255) NOT NULL,
  `KETDOKUMEN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`IDDOKUMEN`, `IDUSER`, `NAMADOKUMEN`, `IMGthumbnail`, `JUDULDOKUMEN`, `KETDOKUMEN`) VALUES
(5, 20032, 'IKU.pdf', 'iku.jpg', 'IKU', 'IKU DISKOMINFO 2019'),
(6, 20032, 'LAKIP2019.pdf', 'lakip2019.JPG', 'LAKIP', 'LAKIP 2019'),
(7, 20032, 'RENSTRA_2018-2023_KOMINFO.pdf', 'renstra_kominfo_2019.JPG', 'RENSTRA ', 'RENSTRA 2018-2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galery`
--

CREATE TABLE `galery` (
  `IDGALERY` int(11) NOT NULL,
  `IDKATEGORIGALERY` int(11) DEFAULT NULL,
  `IDUSER` int(11) DEFAULT NULL,
  `NAMAGALERY` varchar(250) DEFAULT NULL,
  `JUDULGALERY` varchar(250) DEFAULT NULL,
  `KETGALERY` varchar(250) DEFAULT NULL,
  `TGL` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `galery`
--

INSERT INTO `galery` (`IDGALERY`, `IDKATEGORIGALERY`, `IDUSER`, `NAMAGALERY`, `JUDULGALERY`, `KETGALERY`, `TGL`) VALUES
(3000, 3, 20032, '1__PEKAN_KIM_JATIM.jpg', 'penjenlajahan 2', 'orem ipsum dolor sit amet consectetur, adipisicing elit. Quidem animi esse, nisi quod magni voluptates asperiores, voluptate debitis, blanditiis fugiat veritatis unde a. Eos nemo, necessitatibus natus reiciendis debitis dicta.', '2020-07-27 05:22:17'),
(3001, 3, 20032, '2__PEKAN_KIM_JATIM.jpg', 'Permainan 2221', 'orem ipsum dolor sit amet conse', '2020-07-27 05:22:42'),
(3003, 3, 20032, '3__PEKAN_KIM_JATIM.jpg', 'senangnya', 'adhfkjadhfkjaf akfhajk fajkfh akjdhf akdjfhak fka fkajdhf afhkj', '2020-07-27 05:25:21'),
(3004, 3, 20032, '4__PEMBINAAN_KIM.jpg', 'alhasil lumayan', 'sajhkd fakhjhsf jhfjhafksajhkd fakhjhsf jhfjhafksajhkd fakhjhsf jhfjhafksajhkd fakhjhsf jhfjhafksajhkd fakhjhsf jhfjhafksajhkd fakhjhsf jhfjhafksajhkd fakhjhsf jhfjhafksajhkd fakhjhsf jhfjhafksajhkd fakhjhsf jhfjhafksajhkd fakhjhsf jhfjhafksajhkd fak', '2020-07-27 05:23:30'),
(3008, 1, 20032, 'slide1.jpg', '', '', '2020-08-15 10:23:27'),
(3011, 3, 20032, '5__PEMBINAAN_KIM.jpg', 'h', 'h', '2020-07-27 05:24:08'),
(3012, 3, 20032, '6__PEMBINAAN_KIM.jpg', '', '', '2020-07-27 05:24:45'),
(3015, 1, 20032, 'slide31.jpg', '', '', '2020-03-10 11:55:37'),
(3019, 2, 20032, 'bangkalan.png', '', 'http://www.bangkalankab.go.id/v4/', '2020-05-03 01:18:35'),
(3026, 1, 20032, 'slide22.jpg', '', '', '2020-03-10 11:55:45'),
(3027, 2, 20032, 'ppid.png', '', 'http://www.bangkalankab.go.id/v4/', '2020-05-03 01:18:22'),
(3028, 2, 20032, 'lpse.png', '', 'https://lpse.bangkalankab.go.id/eproc4', '2020-05-03 01:25:45'),
(3029, 2, 20032, 'kemkominfo.png', '', 'https://kominfo.go.id/', '2020-05-03 01:26:12'),
(3030, 2, 20032, 'lapor2.png', '', 'https://lapor.go.id/', '2020-05-03 01:26:49'),
(3031, 2, 20032, 'ri.png', '', 'https://www.presidenri.go.id/', '2020-05-03 01:27:25'),
(3032, 2, 20032, 'fbkominfo.png', '', 'https://web.facebook.com/Kemkominfo/?_rdc=1&_rdr', '2020-05-03 01:27:52'),
(3033, 3, 20032, '7__PEMBINAAN_APARATUR.jpg', NULL, NULL, '2020-07-27 05:13:57'),
(3034, 3, 20032, '8__PEMBINAAN_APARATUR1.jpg', NULL, NULL, '2020-07-27 05:13:57'),
(3035, 3, 20032, '9__PEMBINAAN_APARATUR.jpg', NULL, NULL, '2020-07-27 05:18:13'),
(3036, 3, 20032, '10__RAKOR_PPID.jpg', NULL, NULL, '2020-07-27 05:18:13'),
(3037, 3, 20032, '11__RAKOR_PPID1.jpg', NULL, NULL, '2020-07-27 05:19:32'),
(3038, 3, 20032, '12__PERAWATAN_TOWER.jpg', NULL, NULL, '2020-07-27 05:19:32'),
(3039, 3, 20032, '13__KADIS-02.jpg', NULL, NULL, '2020-07-27 05:20:39'),
(3040, 3, 20032, '14__SEKDA-03.jpg', NULL, NULL, '2020-07-27 05:20:39'),
(3041, 3, 20032, '15__TROPHY-02.jpg', 'PENYERAHAN TROPHY', 'Sekretaris Daerah Kabupaten Bangkalan Dr. H. Eddy Moeljono didampingi Kepala Dinas Komunikasi dan Informatika Kabupaten Bangkalan, Drs. Bambang Setyawan MM menyerahkan tropi kepada pemenang lomba penyiar inovatif serta lomba jingle Suara Bangkalan FM', '2020-08-15 07:22:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategorigambar`
--

CREATE TABLE `kategorigambar` (
  `IDKATEGORIGALERY` int(11) NOT NULL,
  `KATEGORIGALERY` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategorigambar`
--

INSERT INTO `kategorigambar` (`IDKATEGORIGALERY`, `KATEGORIGALERY`) VALUES
(1, 'Carousel image'),
(2, 'Carousel link'),
(3, 'Image gallery');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `KOMENTAR_ID` int(11) NOT NULL,
  `IDBERITA` int(11) DEFAULT NULL,
  `IDUSER` int(11) DEFAULT NULL,
  `PARENT_KOMENTAR_ID` int(11) NOT NULL,
  `KOMENTAR` varchar(100) NOT NULL,
  `TGLKOMENTAR` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`KOMENTAR_ID`, `IDBERITA`, `IDUSER`, `PARENT_KOMENTAR_ID`, `KOMENTAR`, `TGLKOMENTAR`) VALUES
(411, 100013, 20032, 0, 'gg', '2020-05-06 10:45:42'),
(412, 100013, 20032, 411, 'fs', '2020-05-06 10:45:48'),
(417, 100015, 20037, 0, 'Semoga kedepannya tambah maju :)', '2020-08-15 03:04:22'),
(418, 100015, 20032, 417, 'Amin.....', '2020-08-15 03:06:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `IDUSER` int(11) NOT NULL,
  `NAMALENGKAP` varchar(30) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` text NOT NULL,
  `VERIFICATIONKEY` varchar(255) NOT NULL,
  `EMAILVERIFIED` varchar(3) NOT NULL,
  `CHANGEPASSWORDVERIFIED` varchar(3) NOT NULL,
  `ROLE` varchar(5) NOT NULL,
  `GENDER` varchar(1) NOT NULL,
  `ALAMAT` varchar(250) NOT NULL,
  `PHOTOUSER` varchar(250) NOT NULL,
  `NOHP` varchar(13) NOT NULL,
  `TGLREGISTER` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`IDUSER`, `NAMALENGKAP`, `EMAIL`, `PASSWORD`, `VERIFICATIONKEY`, `EMAILVERIFIED`, `CHANGEPASSWORDVERIFIED`, `ROLE`, `GENDER`, `ALAMAT`, `PHOTOUSER`, `NOHP`, `TGLREGISTER`) VALUES
(20032, 'ifan way', 'irfanlaskoceng97@gmail.com', '$2y$10$/FJUZ84J1ShYkyaj3pl6ge5nziqeVuqWiV6LO.OHfS9Ehhcn3UHai', '377ccf15760050dda1f1b8f1c2958288', 'yes', 'yes', 'bkl01', '1', 'asdadasdadasdad', 'p3.jpg', '12345678900', '2020-12-08 00:36:43'),
(20034, 'jack way2', 'jack@gmail.com', '$2y$10$LzrkTy8HqCBDh39waWdWW.eAsJzW7QVM3qpKE2tADnScpogbjk27m', 'e9b69c8d35afbadf57aa0ed7e5894a8b', 'yes', 'no', 'bkl02', '2', 'Ds. Bancelok kec. jrengik kab. sampang', '9003b42b368df908afef6741c4646d314bc6f933_hq30.jpg', '12345678900', '2020-03-29 20:16:04'),
(20035, 'roki', 'jacklasvegas0@gmail.com', '$2y$10$fI59FB0qQ0LqjG3QVQcfBOrGXbXj0r/rFjeNy3q3psPy804I6juNu', '42aa5c2dac994e7b0ae6faffd3ca0eac', 'yes', 'no', 'bkl03', '1', 'asdadasdadasdad', 'bg1.jpg', '12345678900', '2020-03-29 20:21:51'),
(20037, 'M Irfan', '160411100137@student.trunojoyo.ac.id', '$2y$10$Us/vt5BgTF0Kj/BFslPGcOMSVzdS1keSX2mbMkDv6GhptS3S6hSoG', 'bf4580d3c9ca451490ddffb5776c02af', 'yes', 'no', 'bkl03', '1', 'sampang madura', 'p2.jpg', '085954801049', '2020-08-14 14:31:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`IDBERITA`),
  ADD KEY `FK_DAPAT_MELAKUKANCRUD_BERDASARKANROLE` (`IDUSER`);

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`IDDOKUMEN`),
  ADD KEY `FK_UPLOAD_DOKUMEN` (`IDUSER`);

--
-- Indeks untuk tabel `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`IDGALERY`),
  ADD KEY `FK_MEMPUNYAI` (`IDKATEGORIGALERY`),
  ADD KEY `FK_UPLOAD_GALERY` (`IDUSER`);

--
-- Indeks untuk tabel `kategorigambar`
--
ALTER TABLE `kategorigambar`
  ADD PRIMARY KEY (`IDKATEGORIGALERY`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`KOMENTAR_ID`),
  ADD KEY `FK_DAPAT_MENGOMENTARI` (`IDUSER`),
  ADD KEY `FK_MEMILIKI` (`IDBERITA`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IDUSER`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `IDBERITA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100020;

--
-- AUTO_INCREMENT untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `IDDOKUMEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `galery`
--
ALTER TABLE `galery`
  MODIFY `IDGALERY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3042;

--
-- AUTO_INCREMENT untuk tabel `kategorigambar`
--
ALTER TABLE `kategorigambar`
  MODIFY `IDKATEGORIGALERY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `KOMENTAR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=419;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `IDUSER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20038;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `FK_DAPAT_MELAKUKANCRUD_BERDASARKANROLE` FOREIGN KEY (`IDUSER`) REFERENCES `user` (`IDUSER`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD CONSTRAINT `FK_UPLOAD_DOKUMEN` FOREIGN KEY (`IDUSER`) REFERENCES `user` (`IDUSER`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `galery`
--
ALTER TABLE `galery`
  ADD CONSTRAINT `FK_MEMPUNYAI` FOREIGN KEY (`IDKATEGORIGALERY`) REFERENCES `kategorigambar` (`IDKATEGORIGALERY`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_UPLOAD_GALERY` FOREIGN KEY (`IDUSER`) REFERENCES `user` (`IDUSER`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `FK_DAPAT_MENGOMENTARI` FOREIGN KEY (`IDUSER`) REFERENCES `user` (`IDUSER`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`IDBERITA`) REFERENCES `berita` (`IDBERITA`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
