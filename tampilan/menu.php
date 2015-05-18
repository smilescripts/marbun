<?php 
//validasi cek login pengguna
session_start();
if(!isset($_SESSION["kode_pengguna"])){

echo"<script>alert('Silahkan Lakukan Login');window.location='index.php'</script>";


}

?>
	<div class="sidebar app-aside" id="sidebar">
				<div class="sidebar-container perfect-scrollbar">
					<nav>
					
						<div class="navbar-title">
							<span>Main Menu</span>
						</div>
						<ul class="main-navigation-menu">
							<li class="active open">
								<a href="beranda.php">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-home"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Beranda </span>
										</div>
									</div>
								</a>
							</li>	
							<li class="open">
								<a href="pegawai.php">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-user"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Pegawai </span>
										</div>
									</div>
								</a>
							</li>
							<li class="open">
								<a href="level.php">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-list"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Level Pegawai </span>
										</div>
									</div>
								</a>
							</li>
							
							<li class="open">
								<a href="proyek.php">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-pencil"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Data Proyek </span>
										</div>
									</div>
								</a>
							</li>
							
							
							<li class="open">
								<a href="klien.php">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-user"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Data Klien </span>
										</div>
									</div>
								</a>
							</li>
							<li class="open">
								<a href="">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-user"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Laporan Data </span>
										</div>
									</div>
								</a>
							</li>
							<li class="open">
								<a href="">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-user"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Laporan Grafik </span>
										</div>
									</div>
								</a>
							</li>
							
							<li class="open">
								<a href="">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-money"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Invoice Data </span>
										</div>
									</div>
								</a>
							</li>
							<li class="open">
								<a href="ambildata.php">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-download"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Backup Database </span>
										</div>
									</div>
								</a>
							</li>
							<li class="open">
								<a href="kirimdata.php">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-upload"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Restore Database </span>
										</div>
									</div>
								</a>
							</li>
							<li class="open">
								<a href="">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-book"></i>
										</div>
										<div class="item-inner">
											<span class="title">Panduan Penggunaan</span>
										</div>
									</div>
								</a>
							</li>
							<li class="open">
								<a href="login/keluar.php">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-user"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Keluar </span>
										</div>
									</div>
								</a>
							</li>
							</ul>
					
					
						
					</nav>
				</div>
			</div>
		