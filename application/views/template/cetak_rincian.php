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
					Rincian Biaya Perjalanan Dinas				
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
			<td class="list-normal">Lampiran SPD Nomor  <span class="spacer-3">: <?php echo $st['srtgs_no'] ?></span></td>
			<td class="list-normal">Tanggal<span class="spacer-3">: <?php echo $this->loader->konversi_tanggal($st['srtgs_tgl']); ?></span></td>
		</tr>
	</table>
	<br>
	<!-- <div class="line-separator"></div> -->
	<table class="tabel">
		<?php 
			$e = 1;
			$d=0;
			$row[0] 		= (isset($detail['rnd_binap']) 	|| $detail['rnd_binap']!=0 ? 'Biaya penginapan '.$detail['rnd_jmlinap'].($detail['rnd_jmlinap']>1?' hari':'') : null);
			$row[1] 		= (isset($detail['rnd_btrkt']) 	|| $detail['rnd_binap']!=0 ? 'Jakarta - '.$st['srtgs_tmt'] : null);
			$row[2] 		= (isset($detail['rnd_bplg']) 	|| $detail['rnd_binap']!=0 ? $st['srtgs_tmt'].' - Jakarta' : null);
			$row[3] 		= (isset($detail['rnd_sku']) 	|| $detail['rnd_sku']!=0 ? 'Uang saku': 'Uang saku');
			$row[4] 		= (isset($detail['rnd_kettmbhn']) || !empty($detail['rnd_kettmbhn'])||$detail['rnd_kettmbhn']!=null ? $detail['rnd_kettmbhn'] : 'Lain-lain');
			switch ($detail['rnd_ttype']) {
				case 'kereta':
					$type = 'Kereta';
					break;
				case 'klaut':
					$type = 'Kapal Laut';
					break;
				case 'pudara':
					$type = 'Pesawat Udara';
					break;
				case 'tonline':
					$type = 'Transportasi Online';
					break;
				case 'tkonvensional':
					$type = 'Transportasi Konvensional';
					break;
				default:
					$type = $detail['rnd_ttype'];
					break;
			}
		?>
		<thead>
			<tr>
				<th width="30">No.</th>
				<th>Perincian Biaya</th>
				<th>Jumlah</th>
				<th>Keterangan</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td><?php echo $e;$e++; ?></td>
					<td>Transport<br>
						<?php echo $row[1] ?><br>
						<?php echo $row[2] ?><br>
					</td>
					<td><br>
						<?php echo $this->loader->rupiah($detail['rnd_btrkt']) ?> <br>
						<?php echo $this->loader->rupiah($detail['rnd_bplg']) ?>
					</td>
					<td><br>
						<?php echo $type; ?><br>
						<?php echo $type; ?></td>
				</tr>
				<tr>
						<td align="center"><?php echo $e;$e++; ?></td>
						<td>Uang Harian <br>
							<?php echo $detail['rnd_jmlsaku'].' Hari  * '. $this->loader->rupiah($detail['rnd_sku']) ?></td>
						<td><br><?php echo $this->loader->rupiah((int)$detail['rnd_jmlsaku']*(int)$detail['rnd_sku']) ?></td>
						<td></td>
				</tr>
			 	<tr>
			 			<td align="center"><?php echo $e;$e++; ?></td>
			 			<td>Penginapan <br>
							<?php echo $detail['rnd_jmlinap'].' Hari  * '. $this->loader->rupiah($detail['rnd_binap']) ?></td>
						<td><br><?php echo $this->loader->rupiah((int)$detail['rnd_jmlinap']*(int)$detail['rnd_binap']) ?></td>
						<td></td>
				</tr>
				<tr>
						<td align="center"><?php echo $e;$e++; ?></td>
						<td><?php echo $row[4]!= null?$row[4]:"Pengeluaran Rill"   ?></td>
						<td><?php echo $this->loader->rupiah($detail['rnd_kettmbhn']) ?></td>
						<td></td>
				</tr>
		</tbody>				
		<tfoot>
			<tr>
				<td></td>
				<td align="center"><b>JUMLAH</b></td>
				<td><?php echo $this->loader->rupiah($total); ?></td>
				<td><?php echo $terbilang; ?></td>
			</tr>
		</tfoot>
	</table><br>
	<table class="tabell" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th align="left" width="60%"></th>
				<th align="left">Jakarta, <?php echo $this->loader->konversi_tanggal($st['srtgs_tgl']); ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td align="left">Telah Dibayar Sejumlah</td>
				<td align="left">Telah Menerima Uang Sebesar</td>
			</tr>
			<tr>
				<td align="left"><b>Rp. 0</b></td>
				<td align="left"><b>Rp. 0</b></td>
			</tr>
			<tr>
				<td align="left">Bendahara Pengeluaran.</td>
				<td align="left">Yang Menerima.</td>
			</tr>
			<tr>
				<td align="left"></td>
				<td align="left"></td>
			</tr>
			<tr>
				<td align="left"></td>
				<td align="left"></td>
			</tr>
			<tr>
				<td align="left"></td>
				<td align="left"></td>
			</tr>
			<tr>
				<td align="left">Ahmad Rohmad<br>
				NIP : 195845524853454
				</td>
				<td align="left"><?php echo ($st['pgw_nm']); ?><br>
				NIP : <?php echo ($st['pgw_nip']); ?></td>
			</tr>
		</tbody>
	</table>
</body>
</html>