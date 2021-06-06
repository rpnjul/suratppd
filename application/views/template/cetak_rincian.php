<html>
<head>
<title><?php echo $nama_file; ?></title>
<meta http-equiv=Content-Type content="text/html; charset=UTF-8">
<style type="text/css">

.header{
	margin-bottom: 10px;
}
.head-1{
	font-family: sans-serif;
	text-align: center;
	text-transform: uppercase;
	display: inline-block;
	font-weight: normal;
	font-size: 16px;
	position: relative;
	line-height: 1.3;
	vertical-align: middle;
}
.list-inline-r{
	font-family: serif;
	text-align: right;
	display: inline;
	position: absolute;
	top: 182px;
	right: 0px;
	line-height: 1.2;
}
.head-2{
	font-family: serif;
	font-stretch: expanded;
	text-align: center;
	text-transform: uppercase;
	display: block;
	font-weight: bolder;
	text-decoration: underline;
	font-size: 13px;
	position: relative;
	line-height: 1.3;
	margin-bottom: 5px;
}
.list-normal{
	list-style: none;
	font-family: serif;
	text-align: left;
	display: block;
	position: relative;
	line-height: 1.2;
	tab-size: 36;
}
.spacer-1{
	position: absolute;
	display: inline-block;
	left: 114px;
}
.logo{
	display: inline-block;
	margin-right: 24px;
	margin-top: -8px;
	position: relative;
	width: 96px;
	height: 96px;
}
.line-separator{
	display: block;
	height:1px;
	background:#717171;
	border-bottom:1px solid #313030;
	margin-bottom: 24px;
}
.tabel{
	width: 100%;
}
.tabel th{
	font-weight: bold;
}
.tabel td{
	vertical-align: center;
}
.tabel,.tabel th,.tabel td{
	border:1px solid black;border-collapse:collapse;
	padding: 8px;
}
.tabel tr{vertical-align: top;}
.tabel tr td,.tabel tr th{padding: 8px 4px; word-break: break-all;}
body{
	margin: 37px 37px;
}
</style>
</head>

<body>
	<div class="header">
		<img src="<?php echo $logo ?>" alt="logo" class="logo">
		<div class="head-1">
			KEMENTERIAN KEUANGAN REPUBLIK INDONESIA<br>	
			DIREKTORAT JENDRAL KEKAYAAN NEGARA<br>
			KANTOR PELAYANAN KEKAYAAN NEGARA DAN LELANG<br>Bekasi<br>	
		</div>
	<small style="margin-top:-10px;margin-left:24px;position:relative;text-align:center;display:block;font-weight: normal;line-height: 1.0;font-size: 10px;">JALAN SERSAN ASWAN NO. 8D, BEKASI.<br>TELEPON (021) 880-8888, FAKSIMILE (021) 880-3832</small>
	</div>
	<div class="line-separator"></div>
	<div class="header">
		<div class="head-2">
				Rincian Biaya Perjalanan Dinas <?php echo $st['srtgs_tmt']; ?>				
		</div>
	</div>
	<br>
	<table>
		<tr>
			<?php if (isset($pengikut['pgw_nm'])): ?>
			<td class="list-normal">Pengikut
				<span class="spacer-1">: 
						<ul style="list-style-type: upper-roman">
							<?php foreach ($pengikut as $key => $value): ?>
								<li><?php echo $value['pgw_nm'].' ( '.$value['pgw_nip'].' )' ?></li>
							<?php endforeach ?>
						</ul>
				</span>
			</td>
			<?php endif ?>	
			<td class="list-inline-r"><?php echo $this->loader->konversi_tanggal($rincian['rcn_tgl']); ?></td>
			<td class="list-normal">Tanggal bertugas<span class="spacer-1">: <?php echo $this->loader->konversi_tanggal($st['srtgs_tgl']); ?></span></td>
			<td class="list-normal">Tempat Tujuan<span class="spacer-1">: <?php echo $st['srtgs_tmt'] ?></span></td>
			<td class="list-normal">No. Surat Tugas<span class="spacer-1">: <?php echo $st['srtgs_no'] ?></span></td>
			<td class="list-normal">Pegawai<span class="spacer-1">: <?php echo ($st['pgw_nm']); ?></span></td>
		</tr>
	</table>
	<br>
	<div class="line-separator"></div>
	<table class="tabel">
		<?php 
		$e = 1;
		$d=0;
		$row[0] 		= (isset($detail['rnd_binap']) 	|| $detail['rnd_binap']!=0 ? 'Biaya penginapan '.$detail['rnd_jmlinap'].($detail['rnd_jmlinap']>1?' hari':'') : null);
		$row[1] 		= (isset($detail['rnd_btrkt']) 	|| $detail['rnd_binap']!=0 ? 'Biaya transportasi berangkat Bekasi - '.$st['srtgs_tmt'] : null);
		$row[2] 		= (isset($detail['rnd_bplg']) 	|| $detail['rnd_binap']!=0 ? 'Biaya transportasi pulang '.$st['srtgs_tmt'].' - Bekasi' : null);
		$row[3] 		= (isset($detail['rnd_sku']) 	|| $detail['rnd_sku']!=0 ? 'Uang saku': 'Uang saku');
		$row[4] 		= (isset($detail['rnd_ketlln']) || !empty($detail['rnd_ketlln'])||$detail['rnd_ketlln']!=null ? $detail['rnd_ketlln'] : 'Lain-lain');
		 ?>
		<thead>
			<tr>
				<th width="30">No.</th>
				<th>Keterangan</th>
				<th>Biaya</th>
			</tr>
		</thead>
		<tbody>
			 	<tr>
			 			<td align="center"><?php echo $e;$e++; ?></td>
			 			<td><?php echo $row[0] ?></td>
			 			<td><?php echo $this->loader->rupiah($detail['rnd_binap']*($detail['rnd_jmlinap']<1?1:$detail['rnd_jmlinap'])) ?></td>
			 	</tr>
			 	<tr>
			 			<td align="center"><?php echo $e;$e++; ?></td>
			 			<td><?php echo $row[1] ?></td>
			 			<td><?php echo $this->loader->rupiah($detail['rnd_btrkt']) ?></td>
			 	</tr>
				 <tr>
				 		<td align="center"><?php echo $e;$e++; ?></td>
				 		<td><?php echo $row[2] ?></td>
				 		<td><?php echo $this->loader->rupiah($detail['rnd_bplg']) ?></td>
				 </tr>
				<tr>
						<td align="center"><?php echo $e;$e++; ?></td>
						<td><?php echo 'Uang saku' ?></td>
						<td><?php echo $this->loader->rupiah($detail['rnd_sku']) ?></td>
				</tr>
				<tr>
						<td align="center"><?php echo $e;$e++; ?></td>
						<td><?php echo $row[4]!= null?$row[4]:"Lain-lain"   ?></td>
						<td><?php echo $this->loader->rupiah($detail['rnd_lln']) ?></td>
				</tr>
		</tbody>				
		<tfoot>
			<tr>
				<td colspan="2">Total</td>
				<td><?php echo $this->loader->rupiah($detail['total']); ?></td>
			</tr>
		</tfoot>
	</table>
</body>
</html>