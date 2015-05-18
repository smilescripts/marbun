<?php
//pada file php ini terdapat aksi lihat,hapus dan ubah data
error_reporting(0);
//memanggil koneksi database
include_once("database/koneksi.php");
//proses menyimpan data
if(isset($_GET[savedata])){
$kode_klien=$_POST[kode_klien];
$nama_instansi=$_POST[nama_instansi];
$penanggung_jawab=$_POST[penanggung_jawab];
$alamat=$_POST[alamat];
$no_telp=$_POST[no_telp];
$email=$_POST[email];
$username=$_POST[username];
$password=$_POST[password];

mysql_query("
INSERT INTO `klien` (`kode_klien`, `nama_instansi`, `penanggung_jawab`, `alamat`, `no_telp`, `email`, `username`, `password`) 
VALUES ('$kode_klien', '$nama_instansi', '$penanggung_jawab', '$alamat', '$no_telp', '$email', '$username', '$password')
") or die (mysql_error());
echo'<script>alert("Tersimpan");window.location="?"</script>';
}
//proses ubah data
if(isset($_GET[ubahdata])){
$kode_klien=$_POST[kode_klien];
$nama_instansi=$_POST[nama_instansi];
$penanggung_jawab=$_POST[penanggung_jawab];
$alamat=$_POST[alamat];
$no_telp=$_POST[no_telp];
$email=$_POST[email];
$username=$_POST[username];
$password=$_POST[password];

mysql_query("
UPDATE `klien` SET `nama_instansi` = '$nama_instansi',`penanggung_jawab` = '$penanggung_jawab',`alamat` = '$alamat',`no_telp` = '$no_telp',`email` = '$email',
`username` = '$username',`password` = '$password' WHERE `kode_klien` = '$kode_klien'
") or die (mysql_error());
echo'<script>alert("Sukses Mengubah data");window.location="?"</script>';
}
if(isset($_GET[deletedata])){
mysql_query("delete from klien where kode_klien='$_GET[kode]'");
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
		<title>klienan Proyek</title>
	
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
									<h1 class="mainTitle">Kelola Data klien</h1>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Beranda</span>
									</li>
									<li class="active">
										<span>klien</span>
									</li>
								</ol>
							</div>
						</section>
						
						
						
					
					<!--Menampilkan Form Ubah Data -->
							<?php if(isset($_GET[editdata])){
								  $kode=$_GET[kode];
								  $geteditdata=mysql_query("select * from klien where kode_klien='$kode'");
								  $viewgetdata=mysql_fetch_object($geteditdata);
							
							?>
					
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<h3>Form Ubah Data klien</h3>
								
									<hr>
									<form action="?ubahdata" method="POST" role="form" id="form">
										<div class="row">
											
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														Kode klien <span class="symbol required"></span>
													</label>
													<input type="text" value="<?php echo $viewgetdata->kode_klien;?>" readonly="true"  class="form-control" id="kode_klien" name="kode_klien" required>
												</div>
												<div class="form-group">
													<label class="control-label">
														Username <span class="symbol required"></span>
													</label>
													<input type="text" value="<?php echo $viewgetdata->username;?>" class="form-control" id="username" name="username" required>
												</div>
												<div class="form-group">
													<label class="control-label">
														password <span class="symbol required"></span>
													</label>
													<input type="password" value="<?php echo $viewgetdata->password;?>" class="form-control" id="password" name="password" required>
												</div>
												<div class="form-group">
													<label class="control-label">
														Nama Instansi <span class="symbol required"></span>
													</label>
													<input type="text" value="<?php echo $viewgetdata->nama_instansi;?>" class="form-control" id="nama_instansi" name="nama_instansi" required>
												</div>
											
												<div class="form-group">
													<label class="control-label">
														penanggung_jawab <span class="symbol required"></span>
													</label>
													<input type="text" class="form-control" value="<?php echo $viewgetdata->penanggung_jawab;?>" name="penanggung_jawab" id="penanggung_jawab" required> 
												</div>
											<div class="form-group">
													<label class="control-label">
														Email <span class="symbol required"></span>
													</label>
													<input type="email" class="form-control" value="<?php echo $viewgetdata->email;?>" id="email" name="email" required>
												</div>
											</div>
											<div class="col-md-6">
												
												<div class="row">
													
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
														Alamat <span class="symbol required"></span>
													</label>
													<textarea class="form-control" name="alamat" id="alamat" required ><?php echo $viewgetdata->alamat;?> </textarea>
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
					$query = "SELECT max(kode_klien) as idMaks FROM klien";
					$hasil = mysql_query($query);
					$data  = mysql_fetch_array($hasil);
					$nim = $data['idMaks'];

					//mengatur 6 karakter sebagai jumalh karakter yang tetap
					//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
					$noUrut = (int) substr($nim, 7, 5);
					$noUrut++;

					//menjadikan 201353 sebagai 6 karakter yang tetap
					$char =  date('ym');
					$w = "KL";
					//%03s untuk mengatur 3 karakter di belakang 201353
					$IDbaru = $char . sprintf("%05s", $noUrut);
					?>
					
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<h3>Form Tambah Data klien</h3>
								
									<hr>
									<form action="?savedata" method="POST" role="form" id="form">
										<div class="row">
											
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														Kode klien <span class="symbol required"></span>
													</label>
													<input type="text" value="<?php echo $w.$IDbaru;?>" readonly="true"  class="form-control" id="kode_klien" name="kode_klien" required>
												</div>
												<div class="form-group">
													<label class="control-label">
														Username <span class="symbol required"></span>
													</label>
													<input type="text" value="<?php echo $viewgetdata->username;?>" class="form-control" id="username" name="username" required>
												</div>
												<div class="form-group">
													<label class="control-label">
														password <span class="symbol required"></span>
													</label>
													<input type="password" value="<?php echo $viewgetdata->password;?>" class="form-control" id="password" name="password" required>
												</div>
												<div class="form-group">
													<label class="control-label">
														Nama Instansi <span class="symbol required"></span>
													</label>
													<input type="text" value="<?php echo $viewgetdata->nama_instansi;?>" class="form-control" id="nama_instansi" name="nama_instansi" required>
												</div>
											
												<div class="form-group">
													<label class="control-label">
														penanggung_jawab <span class="symbol required"></span>
													</label>
													<input type="text" class="form-control" value="<?php echo $viewgetdata->penanggung_jawab;?>" name="penanggung_jawab" id="penanggung_jawab" required> 
												</div>
											<div class="form-group">
													<label class="control-label">
														Email <span class="symbol required"></span>
													</label>
													<input type="email" class="form-control" value="<?php echo $viewgetdata->email;?>" id="email" name="email" required>
												</div>
											</div>
											<div class="col-md-6">
												
												<div class="row">
													
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
														Alamat <span class="symbol required"></span>
													</label>
													<textarea class="form-control" name="alamat" id="alamat" required ><?php echo $viewgetdata->alamat;?> </textarea>
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
												Tambah Data klien <i class="fa fa-plus"></i>
											</a>
										</div>
									</div>
									<hr/>
									<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
										<thead>
											<tr>
												<th></th>
												<th>Instansi</th>
												<th>PJ</th>
												<th>Alamat</th>
												<th>Email</th>
												<th>No Telepon</th>
												
												
											
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$getdata=mysql_query("select * from klien order by kode_klien desc");
											while($viewdata=mysql_fetch_object($getdata)){
											echo '
											<tr>
												<td class="center"><img src="assets/images/media-user.png" class="img-rounded" alt="image"/></td>
												<td>'.$viewdata->nama_instansi.'</td>
												<td>'.$viewdata->penanggung_jawab.'</td>
												<td>'.$viewdata->alamat.'</td>
												<td>'.$viewdata->email.'</td>
												<td>'.$viewdata->no_telp.'</td>
												
												<td><a href="?editdata&kode='.$viewdata->kode_klien.'" class="btn btn-primary  btn-scroll btn-scroll-top ti-pencil"><span>Ubah</span></a>
												<a href="?deletedata&kode='.$viewdata->kode_klien.'"class="btn btn-danger  btn-scroll btn-scroll-top ti-trash"><span>Hapus</span></a>
											</tr>';
											}
										?>
									</tbody>
									</table>
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
