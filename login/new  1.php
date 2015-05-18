<?php


	
	//data dosen
	$nama="Fajar";
	$pendidikan="D3";
	$status="Tetap";
	$keahlian="komputer";
	$golongan="IIIA";
	
	//kriteria Pendidikan
	if($pendidikan=="D3"){$poinpendidikan=0.25;}
	if($pendidikan=="S1"){$poinpendidikan=0.50;}
	if($pendidikan=="S2"){$poinpendidikan=0.75;}
	if($pendidikan=="S3"){$poinpendidikan=1;}
	
	//kriteria Status
	if($status=="Tetap"){$poinstatus=1;}
	if($status=="Tidak tetap"){$poinstatus=0.50;}
	
	//kriteria keahlian
	if($keahlian=="komputer"){$poinkeahlian=1;}
	if($keahlian=="nonkomputer"){$poinkeahlian=0.5;}
	
	//kriteria Pendidikan
	if($golongan=="IIIA"){$poingolongan=0.25;}
	if($golongan=="IIIB"){$poingolongan=0.50;}
	if($golongan=="IIIC"){$poingolongan=0.75;}
	if($golongan=="IIID"){$poingolongan=1;}
	
	
	//Rating kecocokan
	echo '
	<table>
	<tr>
	<th>Dosen</th>
	<th>C1</th>
	<th>C2</th>
	<th>C3</th>
	<th>C4</th>
	</tr>
	<tr>
	<td>'.$nama.'</td>
	<td>'.$poinpendidikan.'</td>
	<td>'.$status.'</td>
	<td>'.$keahlian.'</td>
	<td>'.$golongan.'</td>
	
	</tr>
	
	
	</table>
	
	
	
	';
	
	
	
	
	//Proses perhitungan
	
	
	
	
	



?>