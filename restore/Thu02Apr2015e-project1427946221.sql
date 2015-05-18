DROP TABLE departemen;

CREATE TABLE `departemen` (
  `kode_departemen` int(11) NOT NULL AUTO_INCREMENT,
  `nama_departemen` varchar(50) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `Jabatan` varchar(100) NOT NULL,
  PRIMARY KEY (`kode_departemen`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO departemen VALUES("1","MIGAS","pelaksanaan","Kepala Proyek\n");



DROP TABLE history_biaya;

CREATE TABLE `history_biaya` (
  `kode_history` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pengajuan` varchar(100) NOT NULL,
  `perkiraan_biaya` int(11) NOT NULL,
  PRIMARY KEY (`kode_history`),
  KEY `kode_pengajuan` (`kode_pengajuan`),
  CONSTRAINT `history_biaya_ibfk_1` FOREIGN KEY (`kode_pengajuan`) REFERENCES `pengajuan_proposal` (`kode_pengajuan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE pelaksanaan;

CREATE TABLE `pelaksanaan` (
  `kode_pelaksanaan` int(11) NOT NULL,
  `kode_pengajuan` varchar(100) NOT NULL,
  `pengguna` varchar(10) NOT NULL,
  `rincian_SDM` text NOT NULL,
  `rincian_material` text NOT NULL,
  `survei_lokasi` text NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `keterangan_lainnya` text NOT NULL,
  PRIMARY KEY (`kode_pelaksanaan`),
  KEY `kode_pengajuan` (`kode_pengajuan`,`pengguna`),
  KEY `kode_pengajuan_2` (`kode_pengajuan`),
  KEY `pengguna` (`pengguna`),
  CONSTRAINT `pelaksanaan_ibfk_1` FOREIGN KEY (`kode_pengajuan`) REFERENCES `pengajuan_proposal` (`kode_pengajuan`),
  CONSTRAINT `pelaksanaan_ibfk_2` FOREIGN KEY (`pengguna`) REFERENCES `pengguna` (`kode_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE pengaju;

CREATE TABLE `pengaju` (
  `kode_pengaju` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pekerjaan` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  PRIMARY KEY (`kode_pengaju`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE pengajuan_proposal;

CREATE TABLE `pengajuan_proposal` (
  `kode_pengajuan` varchar(100) NOT NULL,
  `kode_pengaju` varchar(100) NOT NULL,
  `lokasi` text NOT NULL,
  `perkiraan_waktu` varchar(10) NOT NULL,
  `material` text NOT NULL,
  `sdm` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`kode_pengajuan`),
  KEY `kode_pengaju` (`kode_pengaju`),
  KEY `kode_pengaju_2` (`kode_pengaju`),
  CONSTRAINT `pengajuan_proposal_ibfk_1` FOREIGN KEY (`kode_pengaju`) REFERENCES `pengaju` (`kode_pengaju`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE pengguna;

CREATE TABLE `pengguna` (
  `kode_pengguna` varchar(10) NOT NULL,
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
  CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`level`) REFERENCES `departemen` (`kode_departemen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO pengguna VALUES("6311021","mella","mella","1","mella_shanty@ymail.com","2147483647","1994-09-05","Bandung","L");
INSERT INTO pengguna VALUES("6311239","Fajar Abby","admin","1","fajar@gmail.com","2147483647","0000-00-00","Bandung","L");



