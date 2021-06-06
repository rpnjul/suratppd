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
	font-family: serif;
	text-align: left;
	display: block;
	position: relative;
	line-height: 1.2;
	tab-size: 36;
	word-break: break-all;
}
.list-inline-r{
	font-family: serif;
	text-align: right;
	display: inline;
	position: absolute;
	top: 160px;
	right: 0px;
	line-height: 1.2;
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
	<script type="text/php">
		
		function angka_penyebut($nilai) {
				$nilai = abs($nilai);
				$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
				$temp = "";
				if ($nilai < 12) {
					$temp = " ". $huruf[$nilai];
				} else if ($nilai <20) {
					$temp = angka_penyebut($nilai - 10). " belas";
				} else if ($nilai < 100) {
					$temp = angka_penyebut($nilai/10)." puluh". angka_penyebut($nilai % 10);
				} else if ($nilai < 200) {
					$temp = " seratus" . angka_penyebut($nilai - 100);
				} else if ($nilai < 1000) {
					$temp = angka_penyebut($nilai/100) . " ratus" . angka_penyebut($nilai % 100);
				} else if ($nilai < 2000) {
					$temp = " seribu" . angka_penyebut($nilai - 1000);
				} else if ($nilai < 1000000) {
					$temp = angka_penyebut($nilai/1000) . " ribu" . angka_penyebut($nilai % 1000);
				} else if ($nilai < 1000000000) {
					$temp = angka_penyebut($nilai/1000000) . " juta" . angka_penyebut($nilai % 1000000);
				} else if ($nilai < 1000000000000) {
					$temp = angka_penyebut($nilai/1000000000) . " milyar" . angka_penyebut(fmod($nilai,1000000000));
				} else if ($nilai < 1000000000000000) {
					$temp = angka_penyebut($nilai/1000000000000) . " trilyun" . angka_penyebut(fmod($nilai,1000000000000));
				}     
				return $temp;
			}
		
		function angka_terbilang($nilai) {
			$nilai = (int) $nilai;
			if($nilai<0) {
				$hasil = "minus ". trim(angka_penyebut($nilai));
			} else {
				$hasil = trim(angka_penyebut($nilai));
			}     		
			return $hasil;
		}
		if (isset($pdf))
		 {
		     $pdf->page_script('
				if ($PAGE_NUM == 1) {
				    $cnt=$PAGE_COUNT;
				    $x = 146;
				    $y = 215;
				    $text = $PAGE_COUNT." (".angka_terbilang( $PAGE_COUNT).") Lembar";
				    $font = $fontMetrics->get_font("serif", "normal");
				    $size = 12;
				    $color = array(0,0,0);
				    $word_space = 0.0;  //  default
				    $char_space = 0.0;  //  default
				    $angle = 0.0;   //  default
				    $pdf->text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
				} 
			');
		 }
	
	</script>
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
		<br>
		<table>
			<tr>
				<td class="list-inline-r"><?php echo $this->loader->konversi_tanggal($surat_masuk['srtms_tgl']); ?></td>
				<td class="list-normal">Perihal<span class="spacer-1">: <?php echo $surat_masuk['psl_prh'] ?></span></td>
				<td class="list-normal">Lampiran<span class="spacer-1">:</span></td>
				<td class="list-normal">Sifat<span class="spacer-1">: <?php echo $surat_masuk['srtms_sft']; ?></span></td>
				<td class="list-normal">Nomor<span class="spacer-1">: <?php echo $surat_masuk['srtms_no'] ?></span></td>
			</tr>
		</table>
	</div>
	<br><br>
	<div style="line-height: 1.5"><?php echo $surat_masuk['psl_srt']; ?></div>
	<br>
	<div style="float: right;text-align: left;display: block;">
		<?php foreach ($surat_masuk['kepala_kantor'] as $value): ?>
			<span><?php echo $value->pgw_jab; ?></span>
			<br><br><br><br>
			<span><?php echo $value->pgw_nm; ?></span>
			<br>
			<span><?php echo 'NIP '.$value->pgw_nip; ?></span>
		<?php endforeach ?>	
	</div>
</body>
</html>