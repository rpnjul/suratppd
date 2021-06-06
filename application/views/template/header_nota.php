<html>
<head>
<title><?php echo $nama_file; ?></title>
<meta http-equiv=Content-Type content="text/html; charset=UTF-8">
<style type="text/css">
body{
	margin: 37px 37px;
}
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
}
.head-2{
	font-family: serif;
	font-stretch: expanded;
	text-align: center;
	text-transform: uppercase;
	display: block;
	font-weight: bolder;
	text-decoration: underline;
	font-size: 14px;
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
	left: 104px;
}
.logo{
	display: inline-block;
	margin-right: 24px;
	margin-top: -8px;
	position: relative;
	width: 100px;
	height: 100px;
}
.line-separator{
	display: block;
	height:1px;
	background:#717171;
	border-bottom:1px solid #313030;
	margin-bottom: 24px;
}
.tabel th{
	font-weight: bold;
}
.tabel td{
	vertical-align: top;
}
.tabel,.tabel th,.tabel td{
	border:1px solid black;border-collapse:collapse;
}
.tabel tr{vertical-align: top;}
.tabel tr td,.tabel tr th{padding: 8px 4px; word-break: break-all;}

</style>
</head>
<body>
	<div class="header">
		<img src="<?php echo $logo ?>" alt="KPKNL" class="logo">
		<div class="head-1">
			KEMENTERIAN KEUANGAN REPUBLIK INDONESIA<br>	
			DIREKTORAT JENDRAL KEKAYAAN NEGARA<br>
			KANTOR PELAYANAN KEKAYAAN NEGARA DAN LELANG<br>Bekasi
		</div>
		<small style="margin-top:-10px;margin-left:24px;position:relative;text-align:center;display:block;font-weight: normal;line-height: 1.0;font-size: 10px;">JALAN SERSAN ASWAN NO. 8D, BEKASI.<br>TELEPON (021) 880-8888, FAKSIMILE (021) 880-3832</small>
	</div>
	<div class="line-separator"></div>
	<div class="header">
		<div class="head-2">
			nota dinas
		</div>
		<div class="head-2" style="font-weight: normal;font-stretch: normal;text-decoration: none;text-transform: normal;">
			Nomor : <?php echo $nota_dinas['nds_no'] ?>
		</div>
		<br>
		<table>
			<tr>
				<td class="list-normal">Tanggal<span class="spacer-1">: <?php echo $this->loader->konversi_tanggal($nota_dinas['nds_tgl']); ?></span></td>
				<td class="list-normal">Perihal<span class="spacer-1">: <?php echo $nota_dinas['nds_prh'] ?></span></td>
				<td class="list-normal">Tembusan<span class="spacer-1">: <?php echo ($tembusan['pgw_jab']=='Kepala Sub Bagian Umum'?'Kasubbag Umum':$tembusan['pgw_jab']); ?></span></td>
				<td class="list-normal">Dari<span class="spacer-1">: <?php echo $permintaan['pgw_jab']; ?></span></td>
				<td class="list-normal">Kepada<span class="spacer-1">: Kepala KPKNL Bekasi</span></td>
			</tr>
		</table>
	</div>
	<div class="line-separator"></div>
	<div style="text-indent: 3em;line-height: 1.5"><?php echo $nota_dinas['nds_dsr']; ?></div>
	<?php if(isset($pgw_dinas[0]['pgwnds_id'])): ?>
	<br>
		<table class="tabel">
			<thead>
				<tr>
					<th width="24px">No.</th>
					<th>Nama Pegawai</th>
					<th>Jabatan</th>
					<th>Tanggal &amp; tempat sidang</th>
					<th width="96px">No perkara dan acara sidang</th>
					<th width="40px">Keterangan</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=0; foreach ($pgw_dinas as $key => $value): ++$i; ?>
				<tr>
					<td align="center"><?php echo ($i); ?></td>
					<td><?php echo $value['pgw_nm']; ?></td>
					<td><?php echo $value['pgw_jab']; ?></td>
					<td><?php echo $this->loader->hari($value['pgwnds_tgl']).', '.$this->loader->konversi_tanggal($value['pgwnds_tgl']).' '.$value['pgwnds_tmt']; ?></td>
					<td width="96px"><?php echo $value['pgwnds_pkr']; ?></td>
					<td width="40px"><?php echo $value['pgwnds_ket']; ?></td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	<?php endif; ?>
	<p style="text-indent: 3em">Demikian kami sampaikan, mohon petunjuk Bapak/Ibu lebih lanjut.</p>
	<br>
	<div style="float: right;text-align: left;display: block;">
		<span><?php echo $permintaan['pgw_jab']; ?></span>
		<br><br><br><br>
		<span><?php echo $permintaan['pgw_nm']; ?></span>
		<br>
		<span><?php echo 'NIP '.$permintaan['pgw_nip']; ?></span>
	</div>
</body>
</html>