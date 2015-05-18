<?php
//pada file php ini terdapat aksi lihat,hapus dan ubah data
error_reporting(0);
//memanggil koneksi database
include_once("database/koneksi.php");
//proses menyimpan data
if(isset($_GET[savedata])){
$kode_pengguna=$_POST[kode_pengguna];
$nama_pengguna=$_POST[nama_pengguna];
$password=$_POST[password];
$level=$_POST[level];
$email=$_POST[email];
$no_telp=$_POST[no_telp];
$tempat_lahir=$_POST[tempat_lahir];
$jenis_kelamin=$_POST[jenis_kelamin];
$tanggal=$_POST[tanggal];
$bulan=$_POST[bulan];
$tahun=$_POST[tahun];
$tanggallahir=$tahun.'-'.$bulan.'-'.$tanggal;
mysql_query("
INSERT INTO `pengguna` (`kode_pengguna`, `nama_pengguna`, `password`, `level`, `email`, `no_telp`, `tanggal_lahir`, `tempat_lahir`, `jenis_kelamin`) 
VALUES ('$kode_pengguna', '$nama_pengguna', '$password', '$level', '$email', '$no_telp', '$tanggallahir', '$tempat_lahir', '$jenis_kelamin')
") or die (mysql_error());
echo'<script>alert("Tersimpan");window.location="?"</script>';
}
//proses ubah data
if(isset($_GET[ubahdata])){
$kode_pengguna=$_POST[kode_pengguna];
$nama_pengguna=$_POST[nama_pengguna];
$password=$_POST[password];
$level=$_POST[level];
$email=$_POST[email];
$no_telp=$_POST[no_telp];
$tempat_lahir=$_POST[tempat_lahir];
$jenis_kelamin=$_POST[jenis_kelamin];
$tanggal=$_POST[tanggal];
$bulan=$_POST[bulan];
$tahun=$_POST[tahun];
$tanggallahir=$tahun.'-'.$bulan.'-'.$tanggal;
mysql_query("
UPDATE `pengguna` SET `nama_pengguna` = '$nama_pengguna',`password` = '$password',`level` = '$level',`email` = '$email',`no_telp` = '$no_telp',
`tempat_lahir` = '$tempat_lahir',`jenis_kelamin` = '$jenis_kelamin',`tanggal_lahir` = '$tanggallahir'  WHERE `kode_pengguna` = '$kode_pengguna'
") or die (mysql_error());
echo'<script>alert("Sukses Mengubah data");window.location="?"</script>';
}
if(isset($_GET[deletedata])){
mysql_query("delete from pengguna where kode_pengguna='$_GET[kode]'");
echo'<script>alert("Sukses Menghapus data");window.location="?"</script>';

}


?>
<!DOCTYPE html>
<!-- Template Name: Clip-Two - Responsive Admin Template build with Twitter Bootstrap 3.x | Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>Pengajuan Proyek</title>
	
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
	
		<!-- start: GOOGLE FONTS -->
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<!-- end: GOOGLE FONTS -->
		<!-- start: MAIN CSS -->
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<!-- end: MAIN CSS -->
		<!-- start: CLIP-TWO CSS -->
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		<!-- end: CLIP-TWO CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/DataTables/css/DT_bootstrap.css" rel="stylesheet" media="screen">
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
	</head>
	<!-- end: HEAD -->
	<body>
		<div id="app">
			<!-- sidebar -->
			<?php include_once("tampilan/menu.php");?>
			
			<!-- / sidebar -->
			<div class="app-content">
				<!-- start: TOP NAVBAR -->
				<?php include_once("tampilan/header.php");?>
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Kelola Data Pegawai</h1>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Beranda</span>
									</li>
									<li class="active">
										<span>Pegawai</span>
									</li>
								</ol>
							</div>
						</section>
						
						
						
					
					<!--Menampilkan Form Ubah Data -->
							<?php if(isset($_GET[editdata])){
								  $kode=$_GET[kode];
								  $geteditdata=mysql_query("select * from pengguna where kode_pengguna='$kode'");
								  $viewgetdata=mysql_fetch_object($geteditdata);
							
							?>
					
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<h3>Form Ubah Data Pegawai</h3>
								
									<hr>
									<form action="?ubahdata" method="POST" role="form" id="form">
										<div class="row">
											
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														Kode Pegawai <span class="symbol required"></span>
													</label>
													<input type="text" value="<?php echo $viewgetdata->kode_pengguna;?>" readonly="true"  class="form-control" id="kode_pengguna" name="kode_pengguna" required>
												</div>
												<div class="form-group">
													<label class="control-label">
														Nama Pegawai <span class="symbol required"></span>
													</label>
													<input type="text" value="<?php echo $viewgetdata->nama_pengguna;?>" class="form-control" id="nama_pengguna" name="nama_pengguna" required>
												</div>
											
												<div class="form-group">
													<label class="control-label">
														Katasandi <span class="symbol required"></span>
													</label>
													<input type="password" class="form-control" value="<?php echo $viewgetdata->password;?>" name="password" id="password" required> 
												</div>
											<div class="form-group">
													<label class="control-label">
														Email <span class="symbol required"></span>
													</label>
													<input type="email" class="form-control" value="<?php echo $viewgetdata->email;?>" id="email" name="email" required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group connected-group">
													
													<div class="row">
														<div class="col-md-3">
														Tanggal
															<select name="tanggal" id="tanggal" class="form-control" required>
																<?php  $tanggal=substr($viewgetdata->tanggal_lahir,8,2);?>
																<option value="01" <?php if($tanggal=="01"){ echo "selected";};?>>1</option>
																<option value="02" <?php if($tanggal=="02"){ echo "selected";};?>>2</option>
																<option value="03" <?php if($tanggal=="03"){ echo "selected";};?>>3</option>
																<option value="04" <?php if($tanggal=="04"){ echo "selected";};?>>4</option>
																<option value="05" <?php if($tanggal=="05"){ echo "selected";};?>>5</option>
																<option value="06" <?php if($tanggal=="06"){ echo "selected";};?>>6</option>
																<option value="07" <?php if($tanggal=="07"){ echo "selected";};?>>7</option>
																<option value="08" <?php if($tanggal=="08"){ echo "selected";};?>>8</option>
																<option value="09" <?php if($tanggal=="09"){ echo "selected";};?>>9</option>
																<option value="10" <?php if($tanggal=="10"){ echo "selected";};?>>10</option>
																<option value="11" <?php if($tanggal=="11"){ echo "selected";};?>>11</option>
																<option value="12" <?php if($tanggal=="12"){ echo "selected";};?>>12</option>
																<option value="13" <?php if($tanggal=="13"){ echo "selected";};?>>13</option>
																<option value="14" <?php if($tanggal=="14"){ echo "selected";};?>>14</option>
																<option value="15" <?php if($tanggal=="15"){ echo "selected";};?>>15</option>
																<option value="16" <?php if($tanggal=="16"){ echo "selected";};?>>16</option>
																<option value="17" <?php if($tanggal=="17"){ echo "selected";};?>>17</option>
																<option value="18" <?php if($tanggal=="18"){ echo "selected";};?>>18</option>
																<option value="19" <?php if($tanggal=="19"){ echo "selected";};?>>19</option>
																<option value="20" <?php if($tanggal=="20"){ echo "selected";};?>>20</option>
																<option value="21" <?php if($tanggal=="21"){ echo "selected";};?>>21</option>
																<option value="22" <?php if($tanggal=="22"){ echo "selected";};?>>22</option>
																<option value="23" <?php if($tanggal=="23"){ echo "selected";};?>>23</option>
																<option value="24" <?php if($tanggal=="24"){ echo "selected";};?>>24</option>
																<option value="25" <?php if($tanggal=="25"){ echo "selected";};?>>25</option>
																<option value="26" <?php if($tanggal=="26"){ echo "selected";};?>>26</option>
																<option value="27" <?php if($tanggal=="27"){ echo "selected";};?>>27</option>
																<option value="28" <?php if($tanggal=="28"){ echo "selected";};?>>28</option>
																<option value="29" <?php if($tanggal=="29"){ echo "selected";};?>>29</option>
																<option value="30" <?php if($tanggal=="30"){ echo "selected";};?>>30</option>
																<option value="31" <?php if($tanggal=="31"){ echo "selected";};?>>31</option>
															</select>
														</div>
														<div class="col-md-3">
														Bulan
															<select name="bulan" id="bulan" class="form-control" required>
																<?php  $bulan=substr($viewgetdata->tanggal_lahir,5,2);?>
																<option value="01" <?php if($bulan=="01"){ echo "selected";};?>>1</option>
																<option value="02" <?php if($bulan=="02"){ echo "selected";};?>>2</option>
																<option value="03" <?php if($bulan=="03"){ echo "selected";};?>>3</option>
																<option value="04" <?php if($bulan=="04"){ echo "selected";};?>>4</option>
																<option value="05" <?php if($bulan=="05"){ echo "selected";};?>>5</option>
																<option value="06" <?php if($bulan=="06"){ echo "selected";};?>>6</option>
																<option value="07" <?php if($bulan=="07"){ echo "selected";};?>>7</option>
																<option value="08" <?php if($bulan=="08"){ echo "selected";};?>>8</option>
																<option value="09" <?php if($bulan=="09"){ echo "selected";};?>>9</option>
																<option value="10" <?php if($bulan=="10"){ echo "selected";};?>>10</option>
																<option value="11" <?php if($bulan=="11"){ echo "selected";};?>>11</option>
																<option value="12" <?php if($bulan=="12"){ echo "selected";};?>>12</option>
															</select>
														</div>
														<div class="col-md-3">
														Tahun
															<input type="text" value="<?php echo substr($viewgetdata->tanggal_lahir,0,4);?>" placeholder="Tahun" maxlength="4" id="tahun" name="tahun" class="form-control" required>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label">
														Jenis Kelamin <span class="symbol required"></span>
													</label>
													<div class="clip-radio radio-primary">
														<input type="radio" value="P" name="jenis_kelamin" <?php if($viewgetdata->jenis_kelamin=="P"){echo "checked";} ?> id="gender_female" >
														<label for="gender_female">
															Peremuan
														</label>
														<input type="radio" value="L" name="jenis_kelamin" <?php if($viewgetdata->jenis_kelamin=="L"){echo "checked";} ?> id="gender_male">
														<label for="gender_male">
															Laki-laki
														</label>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																Level <span class="symbol required"></span>
															</label>
															<select name="level" id="level" class="form-control" required>
																<option value="">Pilih Level</option>
																<?php
																$getlevel=mysql_query("select * from level");
																while($getlevelaa=mysql_fetch_object($getlevel)){
																$no++;
																echo'
																<option value="'.$getlevelaa->kode_level.'"';
																if($getlevelaa->kode_level==$viewgetdata->level){echo "selected";}
																
																
																echo'>
																
																'.$no.'.'.$getlevelaa->nama_level.'<br/>
																</option>
																';
																}
																?>
															</select>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																No Telepon <span class="symbol required"></span>
															</label>
															<input class="form-control tooltips" value="<?php echo $viewgetdata->no_telp;?>" type="text"  data-placement="top" name="no_telp" id="no_telp" required>
														</div>
														
													</div>
													<div class="col-md-12">
													<div class="form-group">
													<label class="control-label">
														Tempat Lahir <span class="symbol required"></span>
													</label>
													<input type="text" class="form-control" value="<?php echo $viewgetdata->tempat_lahir;?>" id="tempat_lahir" name="tempat_lahir" required>
												</div>
														
													</div>
													
												</div>
												
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div>
													<span class="symbol required"></span>Wajib Diisi
													<hr>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-8">
													<a href="?" class="btn btn-danger btn-wide " >
												<i class="fa fa-arrow-circle-left"></i>	Batal 
												</a>	
											</div>
											<div class="col-md-4">
												<button class="btn btn-primary btn-wide pull-right" type="submit">
													Ubah <i class="fa fa-arrow-circle-right"></i>
												</button>	
												
											
												
												
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						
					
					<?php } ?>
				
					
					<!--Menampilkan Form IInput Data -->
					<?php if(isset($_GET[adddata])){
					
					$query = "SELECT max(kode_pengguna) as idMaks FROM pengguna";
					$hasil = mysql_query($query);
					$data  = mysql_fetch_array($hasil);
					$nim = $data['idMaks'];

					//mengatur 6 karakter sebagai jumalh karakter yang tetap
					//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
					$noUrut = (int) substr($nim, 7, 5);
					$noUrut++;

					//menjadikan 201353 sebagai 6 karakter yang tetap
					$char =  date('ym');
					$w = "PG";
					//%03s untuk mengatur 3 karakter di belakang 201353
					$IDbaru = $char . sprintf("%05s", $noUrut);
					
					?>
					
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<h3>Form Tambah Data Pegawai</h3>
								
									<hr>
									<form action="?savedata" method="POST" role="form" id="form">
										<div class="row">
											
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														Kode Pegawai <span class="symbol required"></span>
													</label>
													<input type="text" value="<?php echo $w.$IDbaru;?>"  readonly class="form-control" id="kode_pengguna" name="kode_pengguna" required>
												</div>
												<div class="form-group">
													<label class="control-label">
														Nama Pegawai <span class="symbol required"></span>
													</label>
													<input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" required>
												</div>
											
												<div class="form-group">
													<label class="control-label">
														Katasandi <span class="symbol required"></span>
													</label>
													<input type="password" class="form-control" name="password" id="password" required> 
												</div>
											<div class="form-group">
													<label class="control-label">
														Email <span class="symbol required"></span>
													</label>
													<input type="email" class="form-control" id="email" name="email" required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group connected-group">
													<label class="control-label">
														Tanggal Lahir <span class="symbol required"></span>
													</label>
													<div class="row">
														<div class="col-md-3">
															<select name="tanggal" id="tanggal" class="form-control" required>
																<option value="">Tanggal</option>
																<option value="01">1</option>
																<option value="02">2</option>
																<option value="03">3</option>
																<option value="04">4</option>
																<option value="05">5</option>
																<option value="06">6</option>
																<option value="07">7</option>
																<option value="08">8</option>
																<option value="09">9</option>
																<option value="10">10</option>
																<option value="11">11</option>
																<option value="12">12</option>
																<option value="13">13</option>
																<option value="14">14</option>
																<option value="15">15</option>
																<option value="16">16</option>
																<option value="17">17</option>
																<option value="18">18</option>
																<option value="19">19</option>
																<option value="20">20</option>
																<option value="21">21</option>
																<option value="22">22</option>
																<option value="23">23</option>
																<option value="24">24</option>
																<option value="25">25</option>
																<option value="26">26</option>
																<option value="27">27</option>
																<option value="28">28</option>
																<option value="29">29</option>
																<option value="30">30</option>
																<option value="31">31</option>
															</select>
														</div>
														<div class="col-md-3">
															<select name="bulan" id="bulan" class="form-control" required>
																<option value="">Bulan</option>
																<option value="01">1</option>
																<option value="02">2</option>
																<option value="03">3</option>
																<option value="04">4</option>
																<option value="05">5</option>
																<option value="06">6</option>
																<option value="07">7</option>
																<option value="08">8</option>
																<option value="09">9</option>
																<option value="10">10</option>
																<option value="11">11</option>
																<option value="12">12</option>
															</select>
														</div>
														<div class="col-md-3">
															<input type="text" placeholder="Tahun" maxlength="4" id="tahun" name="tahun" class="form-control" required>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label">
														Jenis Kelamin <span class="symbol required"></span>
													</label>
													<div class="clip-radio radio-primary">
														<input type="radio" value="P" name="jenis_kelamin" id="gender_female" >
														<label for="gender_female">
															Peremuan
														</label>
														<input type="radio" value="L" name="jenis_kelamin" id="gender_male">
														<label for="gender_male">
															Laki-laki
														</label>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																Level <span class="symbol required"></span>
															</label>
															<select name="level" id="level" class="form-control" required>
																<option value="">Pilih Level</option>
																<?php
																$getlevel1=mysql_query("select * from level");
																while($getlevela=mysql_fetch_object($getlevel1)){
																echo'
																<option value="'.$getlevela->kode_level.'">
																'.$getlevela->nama_level.'
																
																</option>
																';
																}
																?>
															</select>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																No Telepon <span class="symbol required"></span>
															</label>
															<input class="form-control tooltips" type="text"  data-placement="top" name="no_telp" id="no_telp" required>
														</div>
														
													</div>
													<div class="col-md-12">
													<div class="form-group">
													<label class="control-label">
														Tempat Lahir <span class="symbol required"></span>
													</label>
													<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
												</div>
														
													</div>
													
												</div>
												
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div>
													<span class="symbol required"></span>Wajib Diisi
													<hr>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-8">
													<a href="?" class="btn btn-danger btn-wide " >
												<i class="fa fa-arrow-circle-left"></i>	Batal 
												</a>	
											</div>
											<div class="col-md-4">
												<button class="btn btn-primary btn-wide pull-right" type="submit">
													Simpan <i class="fa fa-arrow-circle-right"></i>
												</button>	
												
											
												
												
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						
					
					<?php } ?>
					<!--Menampilkan data-->
						<?php if(!isset($_GET[adddata])){?>
						<?php if(!isset($_GET[editdata])){?>
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
								<div class="row">
										<div class="col-md-12 space20">
											<a href="?adddata=true" class="btn btn-green">
												Tambah Data Pegawai <i class="fa fa-plus"></i>
											</a>
										</div>
									</div>
									<hr/>
										<div class="tabbable">
										<ul id="myTab1" class="nav nav-tabs">
										<?php
											$getdatatab=mysql_query("select * from level ");
											while($viewdatatab=mysql_fetch_object($getdatatab)){
											$no++;
											echo '
											<li >
												<a href="#myTab1_example'.$no.'"  data-toggle="tab">
													'.$viewdatatab->nama_level.'
												</a>
											</li>
											';
											}
											?>
										</ul>
										<div class="tab-content">
											<?php
											$getdatatab=mysql_query("select * from level ");
											while($viewdatatab=mysql_fetch_object($getdatatab)){
											$no1++;
											?>
											
											<div class="tab-pane fade in active" id="myTab1_example<?php echo $no1;?>">
													<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
											<thead>
											<tr>
												<th></th>
												<th>Nama</th>
												<th>Password</th>
												<th>Level</th>
												<th>Email</th>
												<th>No Telepon</th>
												<th>Tanggal Lahir</th>
												<th>Tempat Lahir</th>
												<th>Kelamin</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$getdata=mysql_query("select * from pengguna where level='$viewdatatab->kode_level'");
											while($viewdata=mysql_fetch_object($getdata)){
											echo '
											<tr>
											<td class="center"><img src="assets/images/media-user.png" class="img-rounded" alt="image"/></td>
											
											<td>'.$viewdata->nama_pengguna.'</td>
												<td>'.$viewdata->password.'</td>
												
												';
												$getlevel=mysql_query("select * from level where kode_level='$viewdata->level'");
												$viewlevel=mysql_fetch_object($getlevel);
												echo'
												<td>'.$viewlevel->nama_level.'</td>
												<td>'.$viewdata->email.'</td>
												<td>'.$viewdata->no_telp.'</td>
												<td>'.$viewdata->tanggal_lahir.'</td>
												<td>'.$viewdata->tempat_lahir.'</td>
												<td>'.$viewdata->jenis_kelamin.'</td>
												<td><a href="?editdata&kode='.$viewdata->kode_pengguna.'" class="btn btn-primary  btn-scroll btn-scroll-top ti-pencil"><span>Ubah</span></a>
												<a href="?deletedata&kode='.$viewdata->kode_pengguna.'" class="btn btn-danger  btn-scroll btn-scroll-top ti-trash"><span>Hapus</span></a>
											</tr>';
											}
										?>
									</tbody>
									</table>
											</div>
											<?php 
											}
											?>
										</div>
									</div>
								
								</div>
							</div>
						</div>
					<?php } ?>
					<?php } ?>
					</div>
				</div>
			</div>
	
		<?php include_once("tampilan/footer.php");?>
		</div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
	
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/DataTables/jquery.dataTables.min.js"></script>
		
		<script src="assets/js/main.js"></script>
	
		<script src="assets/js/table-data.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				TableData.init();
			});
		</script>
	
	</body>
</html>
