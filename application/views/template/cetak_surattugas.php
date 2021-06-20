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
	/* text-decoration: underline; */
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
.tabell{
	width: 100%;
}
/* .tabell th{
	font-weight: bold;
	vertical-align: left;
} */
.tabell td{
	vertical-align: left;
}
.tabell,.tabell th,.tabell td{
	border:none;
	padding: 8px;
}
.tabell tr{vertical-align: top;}
.tabell tr td,.tabell tr th{padding: 8px 4px;word-break: break-all;}
body{
	margin: 37px 37px;
}
</style>
</head>

<body>
	<div class="header">
		<div class="head-2">
					<u>SURAT TUGAS</u> <br>
					NOMOR : <?php echo $surat_tugas['srtgs_no']; ?>				
		</div>
	</div>
	<br>
	<table class="tabell" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<td width="10%">Dasar</td>
				<td width="5%">-</td>
				<td>Peraturan Menteri Keuangan Republik Indonesia NOMOR : 190/PMK.05/2012 Tentang Cara Pembayaran dalam rangka Pelaksanaan Anggaran Pendapatan dan Belanja Negara</td>
			</tr>
			<tr>
				<td width="10%"></td>
				<td width="5%">-</td>
				<td>Peraturan Menteri Keuangan Republik Indonesia Nomor : 32/PMK.02/2018 tentang Standar Biaya Masukan Tahun Anggaran 2019</td>
			</tr>
			<tr>
				<td width="10%"></td>
				<td width="5%">-</td>
				<td>Peraturan Menteri Keuangan Republik Indonesia Nomor : 113/PMK.05/2012 tentang Perjalanan Dinas Dalam Negeri Bagi Pejabat Negara, Pegawai Negeri dan Pegawai Tidak Tetap</td>
			</tr>
		</thead>
		<?php
		$range = date('d',strtotime($surat_tugas['srtgs_tgl'])).' s/d '.date('d M Y',strtotime($surat_tugas['srtgs_kmb']));
		$tglOTW = (int) date('d',strtotime($surat_tugas['srtgs_tgl']))??0;
		$tglKMB = (int) date('d',strtotime($surat_tugas['srtgs_kmb']))??0;
		$hari = $tglKMB-$tglOTW??0;

		?>
	</table>
	<table class="tabell" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
			<td colspan="4" align="center"><b>MENUGASKAN</b></td>
			</tr>
			<tr>
				<td width="10%">Kepada</td>
				<td width="5%">1.
				<?php if(isset($pengikut_tugas)):?>
					<br>
					<?php foreach($pengikut_tugas as $p) : $i=1; ?>
						<?php echo $i++; ?>
						<br>
					<?php endforeach; ?>
				<?php endif; ?>
				</td>
				<td><?php echo $surat_tugas['pgw_nm']; ?>
				<?php if(isset($pengikut_tugas)):?>
					<br>
					<?php foreach($pengikut_tugas as $p) : $i=1; ?>
						<?php echo $p->pgw_nm; ?>
					<?php endforeach; ?>
				<?php endif; ?>
				</td>
				<td align="center">NIP. <?php echo $surat_tugas['pgw_nip'];?>
				<?php if(isset($pengikut_tugas)):?>
					<br>
					<?php foreach($pengikut_tugas as $p) : $i=1; ?>
					NIP. <?php echo $p->pgw_nip; ?>
					<?php endforeach; ?>
				<?php endif; ?>
				</td>
			</tr>
		</thead>
		<tbody>
		
		</tbody>
	</table>
	<table class="tabell" cellspacing="0" cellpadding="0">	
		<tbody>
			<tr >
				<td width="10%">Tugas</td>
				<td width="5%"width="5%">1. </td>
				<td>Melaksanakan surat tugas ini selama <?php echo $hari;?> hari terhitung mulai tanggal <?php echo $range;?>.</td>
			</tr>
			<tr>
				<td width="10%"></td>
				<td width="5%">2. </td>
				<td>Segera membuat laporan tertulis mengenai hasil-hasil dari pelaksanaan tugas selambat-lambatnya 6 (enam) hari setelah selesai menjalankan tugas</td>
			</tr>
			<tr>
				<td width="10%">Biaya</td>
				<td width="5%">1. </td>
				<td>Dibebankan kepada Satker Sekretariat Direktorat Jendral TA. 2020, Nomor DIPA-032.04.1.632462/2020 tanggal 20 Desember 2020, Revisi 02</td>
			</tr>
			<tr>
				<td width="10%"></td>
				<td></td>
				<td>Demikian Surat Tugas ini dibuat untuk dilaksanakan dengan sebaik-baiknya</td>
			</tr>
		</tbody>
	</table>
	<table class="tabell" cellspacing="0" cellpadding="0">
		<thead>
			<tbody>
				<tr>
					<td></td>
					<td align="right">Jakarta, <?php echo date('d M Y',strtotime($surat_tugas['srtgs_tgl']))??'0'; ?><br>
					Ditjen Perikanan Budidaya</td>
				</tr>
				<tr>
					<td></td>
					<td align="right"></td>
				</tr>
				<tr>
					<td></td>
					<td align="right"></td>
				</tr>
				<tr>
					<td></td>
					<td align="right"></td>
				</tr>
				<tr>
					<td></td>
					<td align="right"></td>
				</tr>
				<tr>
					<td></td>
					<td align="right">Joco Kokarkin Soetrisno, M.Sc<br>
					NIP : 19610926 198603 1 002</td>
				</tr>
				
			</tbody>
		</thead>
	</table>
</body>
</html>