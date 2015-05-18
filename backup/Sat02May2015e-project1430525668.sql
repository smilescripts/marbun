DROP TABLE dokumentasi;

CREATE TABLE `dokumentasi` (
  `id_dokumentasi` int(11) NOT NULL AUTO_INCREMENT,
  `file_dokumentasi` text NOT NULL,
  PRIMARY KEY (`id_dokumentasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE kebutuhan_material;

CREATE TABLE `kebutuhan_material` (
  `kode_material` int(11) NOT NULL AUTO_INCREMENT,
  `nama_material` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `kode_pelaksanaan` varchar(20) NOT NULL,
  PRIMARY KEY (`kode_material`),
  KEY `kode_pelaksanaan` (`kode_pelaksanaan`),
  CONSTRAINT `kebutuhan_material_ibfk_1` FOREIGN KEY (`kode_pelaksanaan`) REFERENCES `pelaksanaan_proses_proyek` (`kode_pelaksanaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE kebutuhan_sdm;

CREATE TABLE `kebutuhan_sdm` (
  `kode_kebutuhan` int(11) NOT NULL AUTO_INCREMENT,
  `petugas` varchar(20) NOT NULL,
  `kode_team` int(11) NOT NULL,
  PRIMARY KEY (`kode_kebutuhan`),
  KEY `petugas` (`petugas`),
  KEY `kode_team` (`kode_team`),
  CONSTRAINT `kebutuhan_sdm_ibfk_1` FOREIGN KEY (`petugas`) REFERENCES `pengguna` (`kode_pengguna`),
  CONSTRAINT `kebutuhan_sdm_ibfk_2` FOREIGN KEY (`kode_team`) REFERENCES `team` (`kode_team`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE klien;

CREATE TABLE `klien` (
  `kode_klien` varchar(20) NOT NULL,
  `nama_instansi` varchar(50) NOT NULL,
  `penanggung_jawab` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` int(16) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`kode_klien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO klien VALUES("KL150400001","PT.Nuansa Cerah Bangsa","DR.Dedi mursaid"," Jl.Soekarno Hatta no.456 bandung jawa barat","2147483647","dedi@gmail.com","fajar","fajar");
INSERT INTO klien VALUES("KL150400002","CV.Muara baru indah","Donny Setiabudi","Jl.muarabaru indah ","2147483647","rere123bandung@gmail.com","doni Setiabudi","doni");
INSERT INTO klien VALUES("KL150400003","PT.Ghanim design & Networking","Rendi","Jl.Cimahi barat 1 bandung ","9821980","rendi@gmail.com","rendi","rendi");
INSERT INTO klien VALUES("KL150400004","PT.Sumber Maju Jaya","Angga Permadi","Jl.Taman Kopo INdah 2 ","2147483647","angga@gmail.com","angga","angga");
INSERT INTO klien VALUES("KL150400005","CV.Pembangunan daerah ","Rahmat RA","Jl.GBI 2 bandung raya ","989890898","rahmat@gmail.com","rahmat","rahmat");
INSERT INTO klien VALUES("KL150400006","CV.Sumber Daya Nuansa","Diah","Jl.Veteran raya selatan No.321 Jakarta ","2147483647","diah@gmail.com","Diah","diah");
INSERT INTO klien VALUES("KL150400007","CV.Cerah Baru Bangsa","dendi setiabudi"," Jl.Raya muara baru indah 2 no 43, Jakarta indonesia","2147483647","dendi@gmail.com","dendi","dendi");
INSERT INTO klien VALUES("KL150400008","PT.Internofa","dinda","Jl.Margaluyu barat 2 no 199 bandung ","2147483647","dinda@gmail.com","dinda","dinda");
INSERT INTO klien VALUES("KL150400009","PT.Pelajar Pejuang 45","Dinda Permatasari","Jl.Caringin barat 1 n0 456 bandung ","2147483647","dinda45@gmail.com","Dinda","dinda");



DROP TABLE level;

CREATE TABLE `level` (
  `kode_level` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_level`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO level VALUES("7","Manager Analis");
INSERT INTO level VALUES("8","Kepala Proyek");
INSERT INTO level VALUES("9","Engineering");



DROP TABLE pelaksanaan;

;




DROP TABLE pelaksanaan_proses_proyek;

CREATE TABLE `pelaksanaan_proses_proyek` (
  `kode_pelaksanaan` varchar(10) NOT NULL,
  `kode_proyek` varchar(10) NOT NULL,
  `catatan` text NOT NULL,
  PRIMARY KEY (`kode_pelaksanaan`),
  KEY `kode_proyek` (`kode_proyek`),
  KEY `kode_proyek_2` (`kode_proyek`),
  CONSTRAINT `pelaksanaan_proses_proyek_ibfk_1` FOREIGN KEY (`kode_proyek`) REFERENCES `proyek` (`kode_proyek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE pelaksanaan_proyek;

;




DROP TABLE pembayaran_termin;

CREATE TABLE `pembayaran_termin` (
  `kode_termin` int(11) NOT NULL AUTO_INCREMENT,
  `kode_proyek` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `dana_masuk` int(11) NOT NULL,
  `presentase` int(11) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  PRIMARY KEY (`kode_termin`),
  KEY `kode_proyek` (`kode_proyek`),
  CONSTRAINT `pembayaran_termin_ibfk_1` FOREIGN KEY (`kode_proyek`) REFERENCES `proyek` (`kode_proyek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE pengguna;

CREATE TABLE `pengguna` (
  `kode_pengguna` varchar(20) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `level` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` int(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  PRIMARY KEY (`kode_pengguna`),
  KEY `level` (`level`),
  CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`level`) REFERENCES `level` (`kode_level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO pengguna VALUES("PG150400001","Doni S","doni","7","donny@yahoo.com","2147483647","1990-05-10","Bandung","L");
INSERT INTO pengguna VALUES("PG150400002","Fajar","fajar","8","fajarprasetyo45@gmail.com","2147483647","1994-01-10","Bandung","L");
INSERT INTO pengguna VALUES("PG150400003","Rendi","rendi","7","rendi@gmail.com","2147483647","1991-01-03","Bandung","L");
INSERT INTO pengguna VALUES("PG150400005","Rere","rere","7","rere123bandung@gmail.com","2147483647","1988-06-04","Bandung","P");
INSERT INTO pengguna VALUES("PG150400006","Resa","resa","7","resa@gmail.com","2147483647","1997-06-03","Jakarta","P");
INSERT INTO pengguna VALUES("PG150400007","Rudi","rudi","7","rudi@gmail.com","2147483647","1993-03-04","Jakarta","L");
INSERT INTO pengguna VALUES("PG150400008","Ronal","ronal","7","ronal@gmail.com","2147483647","1994-04-04","Bandung","L");
INSERT INTO pengguna VALUES("PG150400009","dedin","dedin","7","dedin@gmail.com","2147483647","1994-08-03","Jakarta","L");
INSERT INTO pengguna VALUES("PG150400010","dodo","dodo","9","dodo@gmail.com","2147483647","1994-03-03","Jakarta","L");



DROP TABLE progress;

CREATE TABLE `progress` (
  `kode_progress` int(11) NOT NULL AUTO_INCREMENT,
  `task` text NOT NULL,
  `presentase` int(11) NOT NULL,
  `dari_tanggal` date NOT NULL,
  `sampai_tanggal` date NOT NULL,
  `dokumentasi` int(11) NOT NULL,
  `kode_pelaksanaan` varchar(20) NOT NULL,
  `catatan` text NOT NULL,
  PRIMARY KEY (`kode_progress`),
  KEY `dokumentasi` (`dokumentasi`),
  KEY `kode_pelaksanaan` (`kode_pelaksanaan`),
  CONSTRAINT `progress_ibfk_1` FOREIGN KEY (`dokumentasi`) REFERENCES `dokumentasi` (`id_dokumentasi`),
  CONSTRAINT `progress_ibfk_2` FOREIGN KEY (`kode_pelaksanaan`) REFERENCES `pelaksanaan_proses_proyek` (`kode_pelaksanaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE proyek;

CREATE TABLE `proyek` (
  `kode_proyek` varchar(20) NOT NULL,
  `nama_proyek` text NOT NULL,
  `deskripsi_proyek` text NOT NULL,
  `petugas` varchar(20) NOT NULL,
  `tanggal_mulai` varchar(50) NOT NULL,
  `tanggal_selesai` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `nilai_proyek` int(11) NOT NULL,
  `klien` varchar(20) NOT NULL,
  `total_termin` int(11) NOT NULL,
  PRIMARY KEY (`kode_proyek`),
  KEY `petugas` (`petugas`),
  KEY `klien` (`klien`),
  CONSTRAINT `proyek_ibfk_1` FOREIGN KEY (`petugas`) REFERENCES `pengguna` (`kode_pengguna`),
  CONSTRAINT `proyek_ibfk_2` FOREIGN KEY (`klien`) REFERENCES `klien` (`kode_klien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO proyek VALUES("PRO150400001","Perbaikan Jalan Muara Angke","Isi Deskripsi Disini","PG150400001","02/22/2015","04/02/2015","Menunggu","150000000","KL150400005","3");
INSERT INTO proyek VALUES("PRO150400002","Pembangunan Jaringan Instalasi gedung","Isi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi DeskrIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaipsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini ajaIsi Deskripsi disini aja","PG150400002","04/30/2015","05/09/2015","Menunggu","150000000","KL150400002","4");



DROP TABLE team;

CREATE TABLE `team` (
  `kode_team` int(11) NOT NULL AUTO_INCREMENT,
  `nama_team` varchar(20) NOT NULL,
  `kode_pelaksanaan` varchar(20) NOT NULL,
  PRIMARY KEY (`kode_team`),
  KEY `kode_pelaksanaan` (`kode_pelaksanaan`),
  CONSTRAINT `team_ibfk_1` FOREIGN KEY (`kode_pelaksanaan`) REFERENCES `pelaksanaan_proses_proyek` (`kode_pelaksanaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




