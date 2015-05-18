<?php
//pada file php ini terdapat aksi lihat,hapus dan ubah data
error_reporting(0);
//memanggil koneksi database
include_once("database/koneksi.php");
//proses menyimpan data
if(isset($_GET[savedata])){
$kode_proyek=$_POST[kode_proyek];
$nama_proyek=$_POST[nama_proyek];
$deskripsi_proyek=$_POST[deskripsi_proyek];
$petugas=$_POST[petugas];
$tanggal_mulai=$_POST[tanggal_mulai];
$tanggal_selesai=$_POST[tanggal_selesai];
$nilai_proyek=$_POST[nilai_proyek];
$klien=$_POST[klien];
$total_termin=$_POST[total_termin];
$status="Menunggu";


mysql_query("
INSERT INTO `proyek` (`kode_proyek`, `nama_proyek`, `deskripsi_proyek`, `petugas`, `tanggal_mulai`, `tanggal_selesai`, `status`, `nilai_proyek`, `klien`, `total_termin`) 
VALUES ('$kode_proyek', '$nama_proyek', '$deskripsi_proyek', '$petugas', '$tanggal_mulai', '$tanggal_selesai', '$status', '$nilai_proyek', '$klien', '$total_termin')
") or die (mysql_error());


echo'<script>alert("Tersimpan");window.location="?termin&kodepro='.$kode_proyek.'&termin='.$total_termin.'&total='.$nilai_proyek.'"</script>';
}
if(isset($_GET[savetermin])){
	$GEGE=$_POST[kodepropro];
	$GEGE1=$_POST[kodepropro1];
	$cek=mysql_query("select * from pembayaran_termin where kode_proyek='$GEGE1'");
	$cekdata=mysql_fetch_object($cek);
	if($cekdata==""){

	
	foreach($GEGE as $key=>$value){
	   $status=$_POST[status][$key];
	   $termin_ke=$_POST[termin_ke][$key];
	   $dana_masuk=$_POST[dana_masuk][$key];
	   $presentase=$_POST[presentase][$key];
	   $jatuh_tempo=$_POST[jatuh_tempo][$key];

       mysql_query("insert into pembayaran_termin (`kode_proyek`,`termin_ke`,`status`,`dana_masuk`,`presentase`,`jatuh_tempo`)
	   values ('$value','$termin_ke','$status','$dana_masuk','$presentase','$jatuh_tempo')") or die (mysql_error());
	}
echo'<script>alert("Tersimpan");window.location="?termin&kode='.$GEGE1.'"</script>';
	}else{
		foreach($GEGE as $key=>$value){
	   $status=$_POST[status][$key];
	   $termin_ke=$_POST[termin_ke][$key];
	   $dana_masuk=$_POST[dana_masuk][$key];
	   $presentase=$_POST[presentase][$key];
	   $jatuh_tempo=$_POST[jatuh_tempo][$key];

       mysql_query("
		UPDATE `pembayaran_termin` SET `status` = '$status',`dana_masuk` = '$dana_masuk',`presentase` = '$presentase',`jatuh_tempo` = '$jatuh_tempo'
		WHERE `kode_proyek` = '$GEGE1' and `termin_ke` = '$termin_ke'
		") or die (mysql_error());
	}
echo'<script>alert("Data Berhasil Diubah");window.location="?termin&kode='.$GEGE1.'"</script>';
	}
}
//proses ubah data
if(isset($_GET["ubahdata"])){
$kode_proyek=$_POST[kode_proyek];
$nama_proyek=$_POST[nama_proyek];
$deskripsi_proyek=$_POST[deskripsi_proyek];
$petugas=$_POST[petugas];
$tanggal_mulai=$_POST[tanggal_mulai];
$tanggal_selesai=$_POST[tanggal_selesai];
$nilai_proyek=$_POST[nilai_proyek];
$klien=$_POST[klien];
$total_termin=$_POST[total_termin];
mysql_query("
UPDATE `proyek` SET `nama_proyek` = '$nama_proyek',`deskripsi_proyek` = '$deskripsi_proyek',`total_termin` = '$total_termin',`petugas` = '$petugas',`tanggal_mulai` = '$tanggal_mulai',`klien` = '$klien'
WHERE `kode_proyek` = '$kode_proyek'
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
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
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
									<h1 class="mainTitle">Kelola Data Proyek</h1>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Beranda</span>
									</li>
									<li class="active">
										<span><a href="proyek.php?">Proyek</a></span>
									</li>
									
								</ol>
							</div>
						</section>
						
							
							<?php if(isset($_GET["termin"])){
								  $kode=$_GET["kode"];
								  $termin=$_GET["termin"];
								  $total=$_GET["total"];
								  
								  $termin=mysql_query("select * from proyek where kode_proyek='$kode'");
								  $datatermin=mysql_fetch_object($termin);
								  
								  $kliendata=mysql_query("select * from klien where kode_klien='$datatermin->klien'");
								  $dataklien=mysql_fetch_object($kliendata);
								
							
						?>
					
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<h3>Pembayaran Termin</h3>
								
									<hr>
									<div class="col-md-12">
									<div id="timeline" style="margin-left:-270px"  style="width:650px">
										<div class="timeline">
											<div class="spine"></div>
											<ul class="columns">
												<li>
													<div class="timeline_element partition-white">
														<div class="timeline_date">
															<div>
																
																<div class="inline-block">
																	<span class="block week-day text-extra-large"><b><?php echo $datatermin->nama_proyek;?></b></span><hr/>
																	
																</div>
															</div>
														</div>
														
														<div class="timeline_content">
															<h4><b>Klien:</b> <?php echo   $dataklien->nama_instansi ?></h4>
														</div>
														<div class="timeline_content">
															<h4><b>Tanggal Pelaksanaan:</b> Not Available</h4>
														</div>
														<div class="timeline_content">
															<h4><b>Banyak Termin :</b> <?php echo $datatermin->total_termin ?></h4>
														</div>
														<div class="timeline_content">
															<h4><b>Nominal Proyek :</b> Rp.<?php echo number_format($datatermin->nilai_proyek) ?></h4>
														</div>
														
													</div>
												</li>
												<li>
													<div class="timeline_element partition-white" >
														
														
											<div class="timeline_content" style="width:650px">
											<form action="?savetermin" method="POST">
											<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
											<thead>
											<tr>
												<th style="width:50px">Termin Ke-</th>
												<th>Presentase Pembayaran</th>
												<th>Dana Masuk</th>
												<th style="width:200px">Status</th>
												<th>Tempo Pembayaran</th>
											
											</tr>
										</thead>
										<tbody>
									
										
										
										
										<?php
											$nilaiproyek=$datatermin->nilai_proyek;
											$kodepropro=$datatermin->kode_proyek;
											for($toter;$toter<$datatermin->total_termin;$toter++){
											$no++;
											echo'<script>
											
											function sum'.$no.'() {
											  var txtFirstNumberValue = document.value="'.$nilaiproyek.'";
											  var txtSecondNumberValue = document.getElementById("txt1'.$no.'").value;
											  var result= parseInt(txtFirstNumberValue) / 100 * parseInt(txtSecondNumberValue);
							
												
											  if (!isNaN(result) ) {
												 document.getElementById("txt2'.$no.'").value = result;
											
													}
												}

										</script>';
											
											echo '
										
											<tr >
												<input type="hidden" class="form-control" readonly name="kodepropro1" value="'.$kodepropro.'">
												<input type="hidden" class="form-control" readonly name="kodepropro[]" value="'.$kodepropro.'">
												';
												$getdatatermin=mysql_query("select * from pembayaran_termin where termin_ke='$no' and kode_proyek='$kodepropro'");
												$viewdatatermin=mysql_fetch_object($getdatatermin);
												echo'
												<td><input type="text" class="form-control" readonly name="termin_ke[]" value="'.$no.'"></td>
												<td><input type="text" class="form-control"  id="txt1'.$no.'"  onkeyup="sum'.$no.'();" placeholder="%" name="presentase[]" value="'.$viewdatatermin->presentase.'"></td>
												<td><input type="text" class="form-control" id="txt2'.$no.'" readonly name="dana_masuk" placeholder="Rp." value="'.$viewdatatermin->dana_masuk.'"></td>
												
												<td><select name="status[]" class="form-control">
													<option value="Menunggu" ';if($viewdatatermin->status=="Menunggu"){echo"selected";}  echo'>Menunggu</option>
													<option value="Penagihan" ';if($viewdatatermin->status=="Penagihan"){echo"selected";}  echo' >Penagihan</option>
													<option value="Lunas"  ';if($viewdatatermin->status=="Lunas"){echo"selected";}  echo'>Lunas</option>
													</select>
												</td>
												<td><input class="form-control datepicker" name="jatuh_tempo[]" value="'.$viewdatatermin->jatuh_tempo.'" type="text" ></td>
											';
										
											echo'
											</tr>';
											}
										?>
										
										
										
				<script type="text/javascript">
				function findTotal(){
				var arr = document.getElementsByName('danamasuk');
				var tot=0;
				for(var i=0;i<arr.length;i++){
					if(parseInt(arr[i].value))
						tot += parseInt(arr[i].value);
				}
				document.getElementById('total').value = tot;
			}

				</script>
				</tbody>
				</table>
				<hr/>
				<!--<a href="#" onclick="findTotal();">hitung</a>
				<input type="text" class="form-control" readonly name="notermin" id="total" value="">-->
					<input type="submit" class="btn btn-info" value="Simpan Perubahan Termin" ><hr/>
											
										</form>
														</div>
													
														
													</div>
												</li>
											</ul>
											
										</div>
									</div>
								</div>
							
									</div>
							</div>
						</div>
						
					
					<?php } ?>
					
							<?php if(isset($_GET["detail"])){
					
								  $kode=$_GET["kode"];
								  $geteditdata=mysql_query("select * from proyek where kode_proyek='$kode'");
								  $viewgetdata=mysql_fetch_object($geteditdata);
								  
								  $getklien=mysql_query("select * from klien where kode_klien='$viewgetdata->klien'");
								  $viewklien=mysql_fetch_object($getklien);
								  
								  $getkodelaksana=mysql_query("select * from pelaksanaan_proses_proyek where kode_klien='$kode'");
								  $viewlaksana=mysql_fetch_object($getkodelaksana);
								  
								  $getkodeteam=mysql_query("select * from team where kode_pelaksanaan='$viewlaksana->kode_pelaksanaan'");
								  $viewteam=mysql_fetch_object($getkodeteam);
					
						?>
					
					
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						
						<div class="container-fluid container-fullw bg-white">
						
							<div class="row">
							
								<div class="col-md-12">
									<div class="tabbable">
										<ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
											<li class="active">
												<a data-toggle="tab" href="#panel_overview">
												
												</a>
											</li>
											<li>
												<a data-toggle="tab" href="#termin">
													Data Termin Pembayaran
												</a>
											</li>
											<li>
												<a data-toggle="tab" href="#material">
													Kebutuhan Material
												</a>
											</li>
											<li>
												<a data-toggle="tab" href="#sdm">
													Kebutuhan SDM
												</a>
											</li>
											<li>
												<a data-toggle="tab" href="#dokumentasi">
													Progress
												</a>
											</li>
										</ul>
										<div class="tab-content">
												<div id="panel_overview" class="tab-pane fade in active">
												<div class="row">
													<div class="col-sm-5 col-md-4">
														<div class="user-left">
															<div class="center">
																<h4><?php echo  $viewgetdata->nama_proyek;?></h4>
																<div class="fileinput fileinput-new" data-provides="fileinput">
																	<div class="user-image">
																		<div class="fileinput-new thumbnail"><img src="assets/images/avatar-1.png" alt="">
																		</div>
																		<div class="fileinput-preview fileinput-exists thumbnail"><?php echo  $viewklien->nama_instansi;?></div>
																		
																	</div>
																</div>
																<hr>
															
															</div>
															<table class="table table-condensed">
																<thead>
																	<tr>
																		<th colspan="3">General Information</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>Penanggung Jawab:</td>
																		<td><?php echo $viewklien->penanggung_jawab;?></td>
																	</tr>
																	<tr>
																		<td>Alamat:</td>
																		<td><?php echo $viewklien->alamat;?></td>
																	</tr>
																	<tr>
																		<td>No Telepon:</td>
																		<td><?php echo $viewklien->no_telp;?></td>
																	</tr>
																	<tr>
																		<td>Email:</td>
																		<td><?php echo $viewklien->email;?></td>
																	</tr>
																	
																	
																</tbody>
															</table>
														</div>
													</div>
													<div class="col-sm-7 col-md-8">
														<div class="panel panel-white" id="activities">
															<div class="panel-heading border-light">
																<h4 class="panel-title text-primary">Deskripsi Proyek</h4>
																<paneltool class="panel-tools" tool-collapse="tool-collapse" tool-refresh="load1" tool-dismiss="tool-dismiss"></paneltool>
															</div>
															<div collapse="activities" ng-init="activities=false" class="panel-wrapper">
																<div class="panel-body">
																	<ul class="timeline-xs">
																		<li class="timeline-item success">
																			<div class="margin-left-15">
																				<div class="text-muted text-small">
																			
																				</div>
																				<p>
																				
																				<?php echo $viewgetdata->deskripsi_proyek;?>
																				</p>
																			</div>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
													
													</div>
												</div>
											</div>
										
												<div id="termin" class="tab-pane fade in active">
												<div class="row">
													<div class="col-sm-5 col-md-4">
														<div class="user-left">
															<div class="center">
																<h4><?php echo  $viewgetdata->nama_proyek;?></h4>
																<div class="fileinput fileinput-new" data-provides="fileinput">
																	<div class="user-image">
																		<div class="fileinput-new thumbnail"><img src="assets/images/avatar-1.png" alt="">
																		</div>
																		<div class="fileinput-preview fileinput-exists thumbnail"><?php echo  $viewklien->nama_instansi;?></div>
																		
																	</div>
																</div>
																<hr>
															
															</div>
															<table class="table table-condensed">
																<thead>
																	<tr>
																		<th colspan="3">General Information</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>Penanggung Jawab:</td>
																		<td><?php echo $viewklien->penanggung_jawab;?></td>
																	</tr>
																	<tr>
																		<td>Alamat:</td>
																		<td><?php echo $viewklien->alamat;?></td>
																	</tr>
																	<tr>
																		<td>No Telepon:</td>
																		<td><?php echo $viewklien->no_telp;?></td>
																	</tr>
																	<tr>
																		<td>Email:</td>
																		<td><?php echo $viewklien->email;?></td>
																	</tr>
																	
																	
																</tbody>
															</table>
														</div>
													</div>
													<div class="col-sm-7 col-md-8">
														<div class="panel panel-white" id="activities">
															<div class="panel-heading border-light">
																<h4 class="panel-title text-primary">Data Termin Pembayaran</h4>
																<paneltool class="panel-tools" tool-collapse="tool-collapse" tool-refresh="load1" tool-dismiss="tool-dismiss"></paneltool>
															</div>
															<div collapse="activities" ng-init="activities=false" class="panel-wrapper">
																<div class="panel-body">
																	<ul class="timeline-xs">
																		<li class="timeline-item success">
																			<div class="margin-left-15">
																				<div class="text-muted text-small">
																			
																				</div>
																				<p>
																				
															<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
															<thead>
																<tr>
																	<th>Kode termin</th>
																	<th>Termin Ke-</th>
																	<th>Presentase</th>
																	<th>Dana Masuk</th>
																	<th>Status</th>
																
																</tr>
															</thead>
															<tbody>
															<?php
																$getdata=mysql_query("select * from pembayaran_termin where kode_proyek='$viewgetdata->kode_proyek'");
																while($viewdata=mysql_fetch_object($getdata)){
																echo '
																	<tr >
																	<td>'.$viewdata->kode_termin.'</td>
																	<td>'.$viewdata->termin_ke.'</td>
																	<td>'.$viewdata->presentase.'%</td>
																	<td>Rp.'.number_format($viewdata->dana_masuk).'</td>
																	<td>'.$viewdata->status.'</td>
																	</tr>';
																}
															?>
														</tbody>
														</table>
							
																				</p>
																			</div>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
													
													</div>
												</div>
											</div>
												
												<div id="material" class="tab-pane fade in active">
												<div class="row">
													<div class="col-sm-5 col-md-4">
														<div class="user-left">
															<div class="center">
																<h4><?php echo  $viewgetdata->nama_proyek;?></h4>
																<div class="fileinput fileinput-new" data-provides="fileinput">
																	<div class="user-image">
																		<div class="fileinput-new thumbnail"><img src="assets/images/avatar-1.png" alt="">
																		</div>
																		<div class="fileinput-preview fileinput-exists thumbnail"><?php echo  $viewklien->nama_instansi;?></div>
																		
																	</div>
																</div>
																<hr>
															
															</div>
															<table class="table table-condensed">
																<thead>
																	<tr>
																		<th colspan="3">General Information</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>Penanggung Jawab:</td>
																		<td><?php echo $viewklien->penanggung_jawab;?></td>
																	</tr>
																	<tr>
																		<td>Alamat:</td>
																		<td><?php echo $viewklien->alamat;?></td>
																	</tr>
																	<tr>
																		<td>No Telepon:</td>
																		<td><?php echo $viewklien->no_telp;?></td>
																	</tr>
																	<tr>
																		<td>Email:</td>
																		<td><?php echo $viewklien->email;?></td>
																	</tr>
																	
																	
																</tbody>
															</table>
														</div>
													</div>
													<div class="col-sm-7 col-md-8">
														<div class="panel panel-white" id="activities">
															<div class="panel-heading border-light">
																<h4 class="panel-title text-primary">Kebutuhan material</h4>
																<paneltool class="panel-tools" tool-collapse="tool-collapse" tool-refresh="load1" tool-dismiss="tool-dismiss"></paneltool>
															</div>
															<div collapse="activities" ng-init="activities=false" class="panel-wrapper">
																<div class="panel-body">
																	<ul class="timeline-xs">
																		<li class="timeline-item success">
																			<div class="margin-left-15">
																				<div class="text-muted text-small">
																			
																				</div>
																				<p>
																				
																				<table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
															<thead>
																<tr>
																	<th>Kode material</th>
																	<th>Dana Material</th>
																	<th>Status</th>
																
																</tr>
															</thead>
															<tbody>
															<?php
																$getdata=mysql_query("select * from kebutuhan_material where kode_pelaksanaan=' $viewlaksana->kode_pelaksanaan'");
																while($viewdata=mysql_fetch_object($getdata)){
																echo '
																	<tr >
																	<td>'.$viewdata->kode_material.'</td>
																	<td>'.$viewdata->nama_material.'</td>
																	<td>'.$viewdata->status.'</td>
																	</tr>';
																}
															?>
														</tbody>
														</table>
							
																				</p>
																			</div>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
													
													</div>
												</div>
											</div>
												
												<div id="sdm" class="tab-pane fade in active">
												<div class="row">
													<div class="col-sm-5 col-md-4">
														<div class="user-left">
															<div class="center">
																<h4><?php echo  $viewgetdata->nama_proyek;?></h4>
																<div class="fileinput fileinput-new" data-provides="fileinput">
																	<div class="user-image">
																		<div class="fileinput-new thumbnail"><img src="assets/images/avatar-1.png" alt="">
																		</div>
																		<div class="fileinput-preview fileinput-exists thumbnail"><?php echo  $viewklien->nama_instansi;?></div>
																		
																	</div>
																</div>
																<hr>
															
															</div>
															<table class="table table-condensed">
																<thead>
																	<tr>
																		<th colspan="3">General Information</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>Penanggung Jawab:</td>
																		<td><?php echo $viewklien->penanggung_jawab;?></td>
																	</tr>
																	<tr>
																		<td>Alamat:</td>
																		<td><?php echo $viewklien->alamat;?></td>
																	</tr>
																	<tr>
																		<td>No Telepon:</td>
																		<td><?php echo $viewklien->no_telp;?></td>
																	</tr>
																	<tr>
																		<td>Email:</td>
																		<td><?php echo $viewklien->email;?></td>
																	</tr>
																	
																	
																</tbody>
															</table>
														</div>
													</div>
													<div class="col-sm-7 col-md-8">
														<div class="panel panel-white" id="activities">
															<div class="panel-heading border-light">
																<h4 class="panel-title text-primary">Deskripsi Proyek</h4>
																<paneltool class="panel-tools" tool-collapse="tool-collapse" tool-refresh="load1" tool-dismiss="tool-dismiss"></paneltool>
															</div>
															<div collapse="activities" ng-init="activities=false" class="panel-wrapper">
																<div class="panel-body">
																	<ul class="timeline-xs">
																		<li class="timeline-item success">
																			<div class="margin-left-15">
																				<div class="text-muted text-small">
																			
																				</div>
																				<p>
																				
																				<table class="table table-striped table-bordered table-hover table-full-width" id="sample_4">
															<thead>
																<tr>
																	<th>Kode SDM</th>
																	<th>Petugas</th>
																
																
																</tr>
															</thead>
															<tbody>
															<?php
																$getdata=mysql_query("select * from kebutuhan_sdm where kode_team=' $viewteam->kode_team'");
																while($viewdata=mysql_fetch_object($getdata)){
																echo '
																	<tr >
																	<td>'.$viewdata->kode_kebutuhan .'</td>
																	<td>'.$viewdata->petugas  .'</td>
																	
																	</tr>';
																}
															?>
														</tbody>
														</table>
							
																				</p>
																			</div>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
													
													</div>
												</div>
											</div>
												
												<div id="dokumentasi" class="tab-pane fade in active">
												<div class="row">
													<div class="col-sm-5 col-md-4">
														<div class="user-left">
															<div class="center">
																<h4><?php echo  $viewgetdata->nama_proyek;?></h4>
																<div class="fileinput fileinput-new" data-provides="fileinput">
																	<div class="user-image">
																		<div class="fileinput-new thumbnail"><img src="assets/images/avatar-1.png" alt="">
																		</div>
																		<div class="fileinput-preview fileinput-exists thumbnail"><?php echo  $viewklien->nama_instansi;?></div>
																		
																	</div>
																</div>
																<hr>
															
															</div>
															<table class="table table-condensed">
																<thead>
																	<tr>
																		<th colspan="3">General Information</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>Penanggung Jawab:</td>
																		<td><?php echo $viewklien->penanggung_jawab;?></td>
																	</tr>
																	<tr>
																		<td>Alamat:</td>
																		<td><?php echo $viewklien->alamat;?></td>
																	</tr>
																	<tr>
																		<td>No Telepon:</td>
																		<td><?php echo $viewklien->no_telp;?></td>
																	</tr>
																	<tr>
																		<td>Email:</td>
																		<td><?php echo $viewklien->email;?></td>
																	</tr>
																	
																	
																</tbody>
															</table>
														</div>
													</div>
													<div class="col-sm-7 col-md-8">
														<div class="panel panel-white" id="activities">
															<div class="panel-heading border-light">
																<h4 class="panel-title text-primary">Progress</h4>
																<paneltool class="panel-tools" tool-collapse="tool-collapse" tool-refresh="load1" tool-dismiss="tool-dismiss"></paneltool>
															</div>
															<div collapse="activities" ng-init="activities=false" class="panel-wrapper">
																<div class="panel-body">
																	<ul class="timeline-xs">
																		<li class="timeline-item success">
																			<div class="margin-left-15">
																				<div class="text-muted text-small">
																			
																				</div>
																				<p>
																				
																			<table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
															<thead>
																<tr>
																	<th>Kode Progress</th>
																	<th>Task</th>
																	<th>Presentase</th>
																	<th>Tanggal Awal</th>
																	<th>Tanggal Akhir</th>
																	<th>Catatan</th>
																
																</tr>
															</thead>
															<tbody>
															<?php
																$getdata=mysql_query("select * from progress where kode_pelaksanaan=' $viewlaksana->kode_pelaksanaan'");
																while($viewdata=mysql_fetch_object($getdata)){
																echo '
																	<tr >
																	<td>'.$viewdata->kode_progress .'</td>
																	<td>'.$viewdata->task .'</td>
																	<td>'.$viewdata->presentase.'</td>
																	<td>'.$viewdata->dari_tanggal.'</td>
																	<td>'.$viewdata->sampai_tanggal.'</td>
																	<td>'.$viewdata->catatan.'</td>
																	</tr>';
																}
															?>
														</tbody>
														</table>
																				</p>
																			</div>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
													
													</div>
												</div>
											</div>
								
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end: USER PROFILE -->
					</div>
		
		
					
					<?php } ?>
				
				
							<?php if(isset($_GET["editdata"])){
					
								  $kode=$_GET["kode"];
								  $geteditdata=mysql_query("select * from proyek where kode_proyek='$kode'");
								  $viewgetdata=mysql_fetch_object($geteditdata);
					
						?>
					
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<h3>Form Tambah Data Proyek</h3>
								
									<hr>
									<form action="?ubahdata" method="POST" role="form" id="form">
										<div class="row">
											
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														Kode Proyek <span class="symbol required"></span>
													</label>
													<input type="text" value="<?php echo $viewgetdata->kode_proyek;?>"  readonly class="form-control" id="kode_proyek" name="kode_proyek" required>
												</div>
												<div class="form-group">
													<label class="control-label">
														Nama Proyek <span class="symbol required"></span>
													</label>
													<input type="text" value="<?php echo $viewgetdata->nama_proyek;?>" class="form-control" id="nama_proyek" name="nama_proyek" required>
												</div>
											
											<div class="panel panel-white">
												<div class="panel-heading">
													<div class="panel-title">
														Deskripsi Proyek
													</div>
												</div>
												<div class="panel-body">
													<div class="form-group">
														<div class="note-editor">
															<textarea class="form-control" name="deskripsi_proyek"><?php echo $viewgetdata->deskripsi_proyek;?></textarea>
														</div>
													</div>
												</div>
											</div>
											</div>
											<div class="col-md-6">
												<div class="row">
												<div class="col-md-12">
													<div class="form-group">
													<label class="control-label">
																Penanggung Jawab Proyek <span class="symbol required"></span>
															</label>
															<select name="petugas" class="cs-select cs-skin-slide" required>
																<option data-class="fa fa-user" value="">Silahkan Pilih</option>
																<?php
																$getlevel1=mysql_query("select * from pengguna");
																while($getlevelaa1=mysql_fetch_object($getlevel1)){
																$no++;
																echo'
																<option value="'.$getlevelaa1->kode_pengguna.'"';
																if($getlevelaa1->kode_pengguna==$viewgetdata->petugas){echo "selected";}
																
																
																echo'>
																
																'.$no.'.'.$getlevelaa1->nama_pengguna.'<br/>
																</option>
																';
																}
																?>
															</select>
													</div>
														
													</div>
													<div class="col-md-12">
													<div class="form-group">
													
													<label class="control-label">
																Klien <span class="symbol required"></span>
															</label>
															<select name="klien" class="cs-select cs-skin-slide" required>
																<option data-class="fa fa-user" value="">Silahkan Pilih</option>
																<?php
																$getlevel1=mysql_query("select * from klien");
																while($getlevelaa1=mysql_fetch_object($getlevel1)){
																$no++;
																echo'
																<option value="'.$getlevelaa1->kode_klien.'"';
																if($getlevelaa1->kode_klien==$viewgetdata->klien){echo "selected";}
																
																
																echo'>
																
																'.$no.'.'.$getlevelaa1->nama_instansi.'<br/>
																</option>
																';
																}
																?>
															</select>
												</div>
														
													</div>	
													
													<div class="col-md-12">
													<div class="form-group">
													
													<label class="control-label">
																Tanggal Mulai <span class="symbol required"></span>
															</label>
													<div class="input-group input-daterange datepicker">
														<input type="text" value="<?php echo $viewgetdata->tanggal_mulai; ?>" name="tanggal_mulai" class="form-control"/>
														<span class="input-group-addon bg-primary">Sampai</span>
														<input type="text" value="<?php echo $viewgetdata->tanggal_selesai; ?>" name="tanggal_selesai" class="form-control" />
													</div>
													</div>
													
													</div>
													<div class="col-md-12">
													<div class="form-group">
													
													<label class="control-label">
																Jumlah termin <span class="symbol required"></span>
															</label>
													
														<input type="text" style="width:60px" value="<?php echo $viewgetdata->total_termin; ?>" name="total_termin" class="form-control"/>
												
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
							
							<?php if(isset($_GET["adddata"])){
					
					$query = "SELECT max(kode_proyek) as idMaks FROM proyek";
					$hasil = mysql_query($query);
					$data  = mysql_fetch_array($hasil);
					$nim = $data['idMaks'];

					//mengatur 6 karakter sebagai jumalh karakter yang tetap
					//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
					$noUrut = (int) substr($nim, 7, 6);
					$noUrut++;

					//menjadikan 201353 sebagai 6 karakter yang tetap
					$char =  date('ym');
					$w = "PRO";
					//%03s untuk mengatur 3 karakter di belakang 201353
					$IDbaru = $char . sprintf("%05s", $noUrut);
					
					?>
					
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<h3>Form Tambah Data Proyek</h3>
								
									<hr>
									<form action="?savedata" method="POST" role="form" id="form">
										<div class="row">
											
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														Kode Proyek <span class="symbol required"></span>
													</label>
													<input type="text" value="<?php echo $w.$IDbaru;?>"  readonly class="form-control" id="kode_proyek" name="kode_proyek" required>
												</div>
												<div class="form-group">
													<label class="control-label">
														Nama Proyek <span class="symbol required"></span>
													</label>
													<input type="text" class="form-control" id="nama_proyek" name="nama_proyek" required>
												</div>
											
											<div class="panel panel-white">
												<div class="panel-heading">
													<div class="panel-title">
														Deskripsi Proyek
													</div>
												</div>
												<div class="panel-body">
													<div class="form-group">
														<div class="note-editor">
															<textarea class="form-control" name="deskripsi_proyek"></textarea>
														</div>
													</div>
												</div>
											</div>
												
											</div>
										
												
												
													
											
											
											<div class="col-md-6">
												<div class="row">
														
												<div class="col-md-12">
													<div class="form-group">
													
													<label class="control-label">
																Penanggung Jawab Proyek <span class="symbol required"></span>
															</label>
															<select name="petugas" class="cs-select cs-skin-slide" required>
																<option data-class="fa fa-user" value="">Silahkan Pilih</option>
																<?php
																$getlevel1=mysql_query("select * from pengguna");
																while($getlevela=mysql_fetch_object($getlevel1)){
																echo'
																<option data-class="fa fa-user" value="'.$getlevela->kode_pengguna.'">
																'.$getlevela->nama_pengguna.'
																
																</option>
																';
																}
																?>
															</select>
												</div>
														
													</div>
													<div class="col-md-12">
													<div class="form-group">
													
													<label class="control-label">
																Klien <span class="symbol required"></span>
															</label>
															<select name="klien" class="cs-select cs-skin-slide" required>
																<option data-class="fa fa-user" value="">Silahkan Pilih</option>
																<?php
																$getlevel1=mysql_query("select * from klien");
																while($getlevela=mysql_fetch_object($getlevel1)){
																echo'
																<option data-class="fa fa-user" value="'.$getlevela->kode_klien.'">
																'.$getlevela->nama_instansi.'
																
																</option>
																';
																}
																?>
															</select>
												</div>
														
													</div>	
													
													<div class="col-md-12">
													<div class="form-group">
													
													<label class="control-label">
																Tanggal Mulai <span class="symbol required"></span>
															</label>
														
													<div class="input-group input-daterange datepicker">
														<input type="text" name="tanggal_mulai" class="form-control"/>
														<span class="input-group-addon bg-primary">Sampai</span>
														<input type="text" name="tanggal_selesai" class="form-control" />
													</div>
												</div>
														
													</div>
												
												
													<div class="col-md-12">
													<div class="form-group">
													<label class="control-label">
														Nilai Proyek <span class="symbol required"></span>
													</label>
													<input type="text" placeholder="Rp." class="form-control" id="nilai_proyek" name="nilai_proyek" required>
													</div>
														
													</div>
													
													
													<div class="col-md-12">
													<div class="form-group">
													<label class="control-label">
														Jumlah Termin  <span class="symbol required"></span>
													</label>
													<input type="number" class="form-control" id="total_termin" name="total_termin" required>
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
					
							<?php if(!isset($_GET[adddata])){?>
						<?php if(!isset($_GET[editdata])){?>
						<?php if(!isset($_GET[termin])){?>
						<?php if(!isset($_GET[detail])){?>
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
								<div class="row">
										<div class="col-md-12 space20">
											<a href="?adddata=true" class="btn btn-green">
												Tambah Data Proyek <i class="fa fa-plus"></i>
											</a>
										</div>
									</div>
									<hr/>
									<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
										<thead>
											<tr>
												<th>Kode</th>
												<th>Proyek</th>
												
												<th>Mulai</th>
												<th>Sampai</th>
												<th>Status</th>
												<th>Nominal</th>
												<th>Klien</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$getdata=mysql_query("select * from proyek order by kode_proyek desc");
											while($viewdata=mysql_fetch_object($getdata)){
											echo '
											<tr >
												<td>'.$viewdata->kode_proyek.'</td>
												<td>'.$viewdata->nama_proyek.'</td>
												
												<td>'.$viewdata->tanggal_mulai.'</td>
												<td>'.$viewdata->tanggal_selesai.'</td>
												<td ><span class="label label-sm label-success">'.$viewdata->status.'</span></td>
												<td>Rp.'.number_format($viewdata->nilai_proyek).'</td>
												<td>'.$viewdata->klien.'</td>
												<td>
												<a href="?editdata&kode='.$viewdata->kode_proyek.'" class="btn btn-primary  btn-scroll btn-scroll-top ti-pencil"><span>Ubah</span></a>
												<a href="?detail&kode='.$viewdata->kode_proyek.'" class="btn btn-primary  btn-scroll btn-scroll-top ti-list"><span>Detail</span></a>
												';
												 $validasibutton=mysql_query("select * from pembayaran_termin where kode_proyek='$viewdata->kode_proyek' and termin_ke='1'") or die (mysql_error());
												 $cekvalidasi=mysql_fetch_object($validasibutton);
												 $hasil=$cekvalidasi->kode_proyek;
												 $status=$cekvalidasi->status;
												
												echo'
												<a ';  if($hasil=="" or $status!="Lunas"){echo 'Disabled';} echo' href="?editdata&kode='.$viewdata->kode_proyek.'" class="btn btn-primary  btn-scroll btn-scroll-top ti-user"><span>Pelaksanaan</span></a>
												';
												
												echo'
												<a href="?termin&kode='.$viewdata->kode_proyek.'" class="btn btn-primary  btn-scroll btn-scroll-top ti-money"><span>Termin</span></a>
												</td>
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
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script src="vendor/DataTables/jquery.dataTables.min.js"></script>
		<script src="assets/js/table-data.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
	<?php if(!isset($_GET["adddata"])){?>
	<?php if(!isset($_GET["editdata"])){?>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				TableData.init();
			});
		</script>
	<?php } ?>
	<?php } ?>
	</body>
</html>
