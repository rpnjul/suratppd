<html>
<head>
<title><?php echo $nama_file; ?></title>
<meta http-equiv=Content-Type content="text/html; charset=UTF-8">
<style type="text/css">
body{
	margin: 37px 37px;
	padding-top: .5in; padding-bottom: .5in; border: 2in solid black; 
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
.tabel tr td,.tabel tr th{padding: 8px 4px; word-break: break-all;
	
}
.body {
	border: 1px solid black;
}
@page { margin: 0in; }

.tabell td{
	vertical-align: left;
}
.tabell th{
	font-weight: normal;
}
.tabell,.tabell th,.tabell td{
	border:none;
	padding: 8px;
}
.tabell tr{vertical-align: top;}
.tabell tr td,.tabell tr th{padding: 8px 4px 0px 4px;word-break: break-all;}
.tabelll td{
	vertical-align: left;
}
.tabelll,.tabelll th,.tabelll td{
	border:none;
	padding: 0px;
}
.tabelll tr{vertical-align: top;}
.tabelll tr td,.tabelll tr th{padding: 0px;word-break: break-all;}
</style>
</head>
<body class="body">
	<div class="header">
		<div class="head-2">
			nota dinas
		</div>
		<div class="head-2" style="font-weight: normal;font-stretch: normal;text-decoration: none;text-transform: normal;">
			Tanggal : <?php echo $this->loader->konversi_tanggal($nota_dinas['nds_tgl']);?> |  Nomor : <?php echo $nota_dinas['nds_no']??0;?>
		</div>
		<br>
		
	</div>
	<div class="line-separator"></div>
	<table class="tabell" style="padding-top:0px !important;">
		<tr>
			<td> Saya yang bertanda tangan dibawah ini selaku Pejabat Pembuat Komitmen memerintahkan Bendahara Pengeluaran agar melakukan pembayaran sejumlah : </td>
		</tr>
	</table>
	<table class="tabell" style="width: 100%;">
		<thead>
			<tr>
				<th width="1%" align="left">Rp </th>
				<th align="left" style="border-bottom: 1px dotted black"><?php echo $this->loader->rupiahs($total)??0; ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th width="2%" align="left">Terbilang: </th>
				<th align="left" style="border-bottom: 1px dotted black"><?php echo $total_terbilang;?></th>
			</tr>
			<tr>
				<th width="2%" align="left"></th>
				<th align="left" style="border-bottom: 1px dotted black ; margin-top: 10px;" ></th>
			</tr>
		</tbody>
	</table>
	<div class="line-separator"></div>
	<table  class="tabell"  style="width: 100%;" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th colspan="3" align="left">Atas dasar: </th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td width="2%">1</td>
				<td>Kuitansi / Bukti pembelian</td>
				<td style="border-bottom: 1px dotted black">: <?php echo $rincian['srtgs_no'];?></td>
			</tr>
			<tr>
				<td width="2%">2</td>
				<td>Nota/bukti penerimaan barang/ bukti lainnya</td>
				<td style="border-bottom: 1px dotted black">: <?php echo $nota_dinas['nds_dsr']??null;?></td>
			</tr>
		</tbody><br>
	</table>
	<div class="line-separator"></div>
	<?php for($a=0;$a<8;$a++):?>
	<br>
	<?php endfor;?>
	<table  class="tabell"  style="width: 100%;" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th align="left">Setuju/lunas dibayar,</th>
				<th align="left">Diterima Tanggal</th>
				<th align="left">Jakarta .............</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td align="left">Tanggal: </td>
				<td align="left"></td>
				<td align="left"></td>
			</tr>
			<tr>
				<td align="left">Pegawai yang bertugas</td>
				<td align="left">Kepala Sub Bagian Umum</td>
				<td align="left">Direktorat Ditjen Perikanan Budidaya</td>
			</tr>
			<?php for($i=0;$i<15;$i++): ?>
			<tr>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"></td>
			</tr>
			<?php endfor;?>
			<tr>
				<td align="left"><?php echo $pegawai['pgw_nm'];?></td>
				<td align="left"><?php echo $kasubbag['pgw_nm'];?></td>
				<td align="left">Joco Kokarkin Soetrisno, M.Sc</td>
			</tr>
			<tr>
				<td align="left"><?php echo $pegawai['pgw_nip'];?></td>
				<td align="left"><?php echo $kasubbag['pgw_nip'];?></td>
				<td align="left">NIP : 19610926 198603 1 002</td>
			</tr>
		</tbody>
	</table>
</body>
<body class="body">
	<div class="header">
		<div class="head-2">
			nota dinas
		</div>
		<div class="head-2" style="font-weight: normal;font-stretch: normal;text-decoration: none;text-transform: normal;">
			Tanggal : <?php echo $this->loader->konversi_tanggal($nota_dinas['nds_tgl']);?> |  Nomor : <?php echo $nota_dinas['nds_no']??0;?>
		</div>
		<br>
		
	</div>
	<div class="line-separator"></div>
	<table class="tabell" style="padding-top:0px !important;">
		<tr>
			<td> Saya yang bertanda tangan dibawah ini selaku Pejabat Pembuat Komitmen memerintahkan Bendahara Pengeluaran agar melakukan pembayaran sejumlah : </td>
		</tr>
	</table>
	<table class="tabell" style="width: 100%;">
		<thead>
			<tr>
				<th width="1%" align="left">Rp </th>
				<th align="left" style="border-bottom: 1px dotted black"><?php echo $this->loader->rupiahs($total)??0; ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th width="2%" align="left">Terbilang: </th>
				<th align="left" style="border-bottom: 1px dotted black"><?php echo $total_terbilang;?></th>
			</tr>
			<tr>
				<th width="2%" align="left"></th>
				<th align="left" style="border-bottom: 1px dotted black ; margin-top: 10px;" ></th>
			</tr>
		</tbody>
	</table>
	<div class="line-separator"></div>
	<table  class="tabell"  style="width: 100%;" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th colspan="3" align="left">Atas dasar: </th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td width="2%">1</td>
				<td>Kuitansi / Bukti pembelian</td>
				<td style="border-bottom: 1px dotted black">: <?php echo $rincian['srtgs_no'];?></td>
			</tr>
			<tr>
				<td width="2%">2</td>
				<td>Nota/bukti penerimaan barang/ bukti lainnya</td>
				<td style="border-bottom: 1px dotted black">: <?php echo $nota_dinas['nds_dsr']??null;?></td>
			</tr>
		</tbody><br>
	</table>
	<div class="line-separator"></div>
	<?php for($a=0;$a<8;$a++):?>
	<br>
	<?php endfor;?>
	<table  class="tabell"  style="width: 100%;" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th align="left">Setuju/lunas dibayar,</th>
				<th align="left">Diterima Tanggal</th>
				<th align="left">Jakarta .............</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td align="left">Tanggal: </td>
				<td align="left"></td>
				<td align="left"></td>
			</tr>
			<tr>
				<td align="left">Pegawai yang bertugas</td>
				<td align="left">Kepala Sub Bagian Umum</td>
				<td align="left">Direktorat Ditjen Perikanan Budidaya</td>
			</tr>
			<?php for($i=0;$i<15;$i++): ?>
			<tr>
				<td align="left"></td>
				<td align="left"></td>
				<td align="left"></td>
			</tr>
			<?php endfor;?>
			<tr>
				<td align="left"><?php echo $pegawai['pgw_nm'];?></td>
				<td align="left"><?php echo $kasubbag['pgw_nm'];?></td>
				<td align="left">Joco Kokarkin Soetrisno, M.Sc</td>
			</tr>
			<tr>
				<td align="left"><?php echo $pegawai['pgw_nip'];?></td>
				<td align="left"><?php echo $kasubbag['pgw_nip'];?></td>
				<td align="left">NIP : 19610926 198603 1 002</td>
			</tr>
		</tbody>
	</table>
</body>
</html>