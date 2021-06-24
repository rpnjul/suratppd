<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'views/vendor/autoload.php');
function hex2dec($couleur = "#000000"){
    $R = substr($couleur, 1, 2);
    $rouge = hexdec($R);
    $V = substr($couleur, 3, 2);
    $vert = hexdec($V);
    $B = substr($couleur, 5, 2);
    $bleu = hexdec($B);
    $tbl_couleur = array();
    $tbl_couleur['R']=$rouge;
    $tbl_couleur['G']=$vert;
    $tbl_couleur['B']=$bleu;
    return $tbl_couleur;
}

//conversion pixel -> millimeter in 72 dpi
function px2mm($px){
    return $px*25.4/72;
}

function txtentities($html){
    $trans = get_html_translation_table(HTML_ENTITIES);
    $trans = array_flip($trans);
    return strtr($html, $trans);
}

/**
 * 
 */
class Loader extends FPDF
{

	protected $B;
	protected $I;
	protected $U;
	protected $HREF;
	protected $ALIGN;
	protected $fontList;
	protected $issetfont;
	protected $issetcolor;

	function __construct($orientation='P', $unit='mm', $format='A4')
	{
	    //Call parent constructor
	    parent::__construct($orientation,$unit,$format);

	    //Initialization
	    $this->B=0;
	    $this->I=0;
	    $this->U=0;
	    $this->HREF='';
	    $this->ALIGN='';

	    $this->tableborder=0;
	    $this->tdbegin=false;
	    $this->tdwidth=0;
	    $this->tdheight=0;
	    $this->tdalign="L";
	    $this->textalign="L";
	    $this->tablealign="C";
	    $this->tdbgcolor=false;

	    $this->oldx=0;
	    $this->oldy=0;

	    $this->fontlist=array("arial","times","courier","helvetica","symbol");
	    $this->issetfont=false;
	    $this->issetcolor=false;
	}

	function load($data=array())
	{
		$ses['id_login'] = $_SESSION['id_login'];
		$ses['nip'] = $_SESSION['nip'];
		$ses['nama'] = $_SESSION['nama'];
		$ses['email'] = $_SESSION['email'];
		$ses['level'] = $_SESSION['level'];
		$ses['status'] = $_SESSION['status'];
	    return $data+$ses;
	}

	function config_email()
	{
		$smtp_user='kpknl.sppd@gmail.com';
		$smtp_pass='kpknl.->>sppd001aa';
		$config = [
                    'mailtype'  => 'html',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'charset'   => 'utf-8',
                    'protocol'  => 'smtp',
                    'smtp_host' => 'smtp.gmail.com',
                    'smtp_user' => $smtp_user,  // Email gmail
                    'smtp_pass'   => $smtp_pass,  // Password gmail
                    'smtp_crypto' => 'ssl',
                    'smtp_port'   => 465,
                    'crlf'    => "\r\n",
                    'newline' => "\r\n"
                ];
		return $config;
	}

    function hari($tanggal){
        $hari = date ("D",strtotime(($tanggal)));
        switch($hari){
            case 'Sun':
                $hari = "Minggu";
            break;
     
            case 'Mon':         
                $hari = "Senin";
            break;
     
            case 'Tue':
                $hari = "Selasa";
            break;
     
            case 'Wed':
                $hari = "Rabu";
            break;
     
            case 'Thu':
                $hari = "Kamis";
            break;
     
            case 'Fri':
                $hari = "Jumat";
            break;
     
            case 'Sat':
                $hari = "Sabtu";
            break;
            
            default:
                $hari = "Tidak di ketahui";     
            break;
        }
     
        return $hari;
     
    }

	function angka_penyebut($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = $this->angka_penyebut($nilai - 10). " belas";
        } else if ($nilai < 100) {
            $temp = $this->angka_penyebut($nilai/10)." puluh". $this->angka_penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . $this->angka_penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = $this->angka_penyebut($nilai/100) . " ratus" . $this->angka_penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . $this->angka_penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = $this->angka_penyebut($nilai/1000) . " ribu" . $this->angka_penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = $this->angka_penyebut($nilai/1000000) . " juta" . $this->angka_penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = $this->angka_penyebut($nilai/1000000000) . " milyar" . $this->angka_penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = $this->angka_penyebut($nilai/1000000000000) . " trilyun" . $this->angka_penyebut(fmod($nilai,1000000000000));
        }     
        return $temp;
    }
	
	function angka_terbilang($nilai) {
		$nilai = (int) $nilai;
		if($nilai<0) {
			$hasil = "minus ". trim($this->angka_penyebut($nilai));
		} else {
			$hasil = trim($this->angka_penyebut($nilai));
		}     		
		return $hasil;
	}

	function konversi_tanggal($tanggal){
		$bulan = array (
			1 =>
			'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $tanggal);

		// variabel pecahkan 0 = tanggal
		// variabel pecahkan 1 = bulan
		// variabel pecahkan 2 = tahun
	 
		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}

	function rupiah($angka){	
		$hasil_rupiah = "Rp " . number_format((int)$angka,0,',','.');
		return $hasil_rupiah; 
	}
	function rupiahs($angka){	
		$hasil_rupiah = number_format((int)$angka,0,',','.');
		return $hasil_rupiah; 
	}

	function WriteTable($data, $w)
{
    $this->SetLineWidth(.3);
    $this->SetFillColor(255,255,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    foreach($data as $row)
    {
        $nb=0;
        for($i=0;$i<count($row);$i++)
            $nb=max($nb,$this->NbLines($w[$i],trim($row[$i])));
        $h=5*$nb;
        $this->CheckPageBreak($h);
        for($i=0;$i<count($row);$i++)
        {
            $x=$this->GetX();
            $y=$this->GetY();
            $this->Rect($x,$y,$w[$i],$h);
            $this->MultiCell($w[$i],5,trim($row[$i]),0,'C');
            //Put the position to the right of the cell
            $this->SetXY($x+$w[$i],$y);                    
        }
        $this->Ln($h);

    }
}

function NbLines($w, $txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 && $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
}

function ReplaceHTML($html)
{
    $html = str_replace( '<li>', "\n<br> - " , $html );
    $html = str_replace( '<LI>', "\n - " , $html );
    $html = str_replace( '</ul>', "\n\n" , $html );
    $html = str_replace( '<strong>', "<b>" , $html );
    $html = str_replace( '</strong>', "</b>" , $html );
    $html = str_replace( '&#160;', "\n" , $html );
    $html = str_replace( '&nbsp;', " " , $html );
    $html = str_replace( '&quot;', "\"" , $html ); 
    $html = str_replace( '&#39;', "'" , $html );
    return $html;
}

function ParseTable($Table)
{
    $_var='';
    $htmlText = $Table;
    $parser = new HtmlParser ($htmlText);
    while ($parser->parse())
    {
        if(strtolower($parser->iNodeName)=='table')
        {
            if($parser->iNodeType == NODE_TYPE_ENDELEMENT)
                $_var .='/::';
            else
                $_var .='::';
        }

        if(strtolower($parser->iNodeName)=='tr')
        {
            if($parser->iNodeType == NODE_TYPE_ENDELEMENT)
                $_var .='!-:'; //opening row
            else
                $_var .=':-!'; //closing row
        }
        if(strtolower($parser->iNodeName)=='td' && $parser->iNodeType == NODE_TYPE_ENDELEMENT)
        {
            $_var .='#,#';
        }
        if ($parser->iNodeName=='Text' && isset($parser->iNodeValue))
        {
            $_var .= $parser->iNodeValue;
        }
    }
    $elems = explode(':-!',str_replace('/','',str_replace('::','',str_replace('!-:','',$_var)))); //opening row
    foreach($elems as $key=>$value)
    {
        if(trim($value)!='')
        {
            $elems2 = explode('#,#',$value);
            array_pop($elems2);
            $data[] = $elems2;
        }
    }
    return $data;
}

	function WriteHTML($html)
	{
	    $html=strip_tags($html,"<b><u><i><a><img><p><br><strong><em><font><tr><blockquote><hr><td><tr><table><sup>"); //remove all unsupported tags
	    $html=str_replace("\n",'',$html); //replace carriage returns with spaces
	    $html=str_replace("\t",'',$html); //replace carriage returns with spaces
	    $a=preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE); //explode the string
	    foreach($a as $i=>$e)
	    {
	    	//var_dump($e);
	        if($i%2==0)
	        {
	            //Text
	            if($this->HREF)
	                $this->PutLink($this->HREF,$e);
	            elseif($this->tdbegin) {
	                if(trim($e)!='' && $e!="&nbsp;") {
	                    $this->Cell($this->tdwidth,$this->tdheight,$e,$this->tableborder,'',$this->tdalign,$this->tdbgcolor);
	                }
	                elseif($e=="&nbsp;") {
	                    $this->Cell($this->tdwidth,$this->tdheight,'',$this->tableborder,'',$this->tdalign,$this->tdbgcolor);
	                }
	            } 
/*	            elseif($this->textalign) {
	            //	$this->Cell($this->tdwidth,$this->tdheight,$e,$this->tableborder,'',$this->tdalign,$this->tdbgcolor);
	                $this->Cell(0,5,$e,0,1,'C');
	            }*/
	            else
	                $this->Write(5,stripslashes(txtentities($e)));
	        //        $this->MultiCell(0,5,"\t\t\t\t\t\t\t\t".stripslashes(txtentities($e)),0,'J');
	        }
	        else
	        {
	            //Tag
	            if($e[0]=='/')
	                $this->CloseTag(strtoupper(substr($e,1)));
	            else
	            {
	                //Extract attributes
	                $a2=explode(' ',$e);
	                $tag=strtoupper(array_shift($a2));
	                $attr=array();
	                foreach($a2 as $v)
	                {
	                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
	                        $attr[strtoupper($a3[1])]=$a3[2];
	                }
	                $this->OpenTag($tag,$attr);
	            }
	        }
	    }
	}

	function OpenTag($tag, $attr)
{
    //Opening tag
    switch($tag){

        case 'SUP':
            if( !empty($attr['SUP']) ) {    
                //Set current font to 6pt     
                $this->SetFont('','',6);
                //Start 125cm plus width of cell to the right of left margin         
                //Superscript "1" 
                $this->Cell(2,2,$attr['SUP'],0,0,'L');
            }
            break;

        case 'TABLE': // TABLE-BEGIN
            if( !empty($attr['BORDER']) ) {$this->tableborder=$attr['BORDER'];} else {$this->tableborder=0;}
            if( !empty($attr['ALIGN']) ) {
            	$this->tablealign=$attr['ALIGN'];
                $align=$attr['ALIGN'];        
                if($align=='LEFT') $this->tablealign='L';
                if($align=='CENTER') $this->tablealign='C';
                if($align=='RIGHT') $this->tablealign='R';
                //var_dump($this->tablealign);
            }else{
            	$this->tablealign='C';
            }
           
            break;
        case 'TR': //TR-BEGIN
            break;
        case 'TD': // TD-BEGIN
            if( !empty($attr['WIDTH']) ) $this->tdwidth=($attr['WIDTH']/4);
            else $this->tdwidth=40; // Set to your own width if you need bigger fixed cells
            if( !empty($attr['HEIGHT']) ) $this->tdheight=($attr['HEIGHT']/6);
            else $this->tdheight=6; // Set to your own height if you need bigger fixed cells
            if( !empty($attr['ALIGN']) ) {
                $align=$attr['ALIGN'];        
                if($align=='LEFT') $this->tdalign='L';
                if($align=='CENTER') $this->tdalign='C';
                if($align=='RIGHT') $this->tdalign='R';
            }
            else $this->tdalign='L'; // Set to your own
            if( !empty($attr['BGCOLOR']) ) {
                $coul=hex2dec($attr['BGCOLOR']);
                    $this->SetFillColor($coul['R'],$coul['G'],$coul['B']);
                    $this->tdbgcolor=true;
                }
            $this->tdbegin=true;
            break;

        case 'HR':
            if( !empty($attr['WIDTH']) )
                $Width = $attr['WIDTH'];
            else
                $Width = $this->w - $this->lMargin-$this->rMargin;
            $x = $this->GetX();
            $y = $this->GetY();
            $this->SetLineWidth(0.2);
            $this->Line($x,$y,$x+$Width,$y);
            $this->SetLineWidth(0.2);
            $this->Ln(1);
            break;
        case 'STRONG':
            $this->SetStyle('B',true);
            break;
        case 'EM':
            $this->SetStyle('I',true);
            break;
        case 'B':
        case 'I':
        case 'U':
            $this->SetStyle($tag,true);
            break;
        case 'A':
            $this->HREF=$attr['HREF'];
            break;
        case 'IMG':
            if(isset($attr['SRC']) && (isset($attr['WIDTH']) || isset($attr['HEIGHT']))) {
                if(!isset($attr['WIDTH']))
                    $attr['WIDTH'] = 0;
                if(!isset($attr['HEIGHT']))
                    $attr['HEIGHT'] = 0;
                $this->Image($attr['SRC'], $this->GetX(), $this->GetY(), px2mm($attr['WIDTH']), px2mm($attr['HEIGHT']));
            }
            break;
        case 'BLOCKQUOTE':
        case 'BR':
            $this->Ln(5);
            break;
        case 'P':
        	if( !empty($attr['ALIGN']) ) {
                $align=$attr['ALIGN'];        
                if($align=='LEFT') $this->textalign='L';
                if($align=='CENTER') $this->textalign='C';
                if($align=='RIGHT') $this->textalign='R';
            }
            //$this->Ln(5);
            break;
        case 'FONT':
            if (isset($attr['COLOR']) && $attr['COLOR']!='') {
                $coul=hex2dec($attr['COLOR']);
                $this->SetTextColor($coul['R'],$coul['G'],$coul['B']);
                $this->issetcolor=true;
            }
            if (isset($attr['FACE']) && in_array(strtolower($attr['FACE']), $this->fontlist)) {
                $this->SetFont(strtolower($attr['FACE']));
                $this->issetfont=true;
            }
            if (isset($attr['FACE']) && in_array(strtolower($attr['FACE']), $this->fontlist) && isset($attr['SIZE']) && $attr['SIZE']!='') {
                $this->SetFont(strtolower($attr['FACE']),'',$attr['SIZE']);
                $this->issetfont=true;
            }
            break;
    }
}

	function CloseTag($tag)
	{
	    //Closing tag
	    if($tag=='SUP') {
	    }

	    if($tag=='TD') { // TD-END
	        $this->tdbegin=false;
	        $this->tdwidth=0;
	        $this->tdheight=0;
	        $this->tdalign="L";
	        $this->tdbgcolor=false;
	    }
	    if($tag=='TR') { // TR-END
	        $this->Ln();
	    }
	    if($tag=='TABLE') { // TABLE-END
	        $this->tableborder=0;
	        $this->tablealign="C";
	    }
	    if($tag=='P')
	    	//$this->textalign='L';
	    	//$this->Ln(3);
	    if($tag=='STRONG')
	        $tag='B';
	    if($tag=='EM')
	        $tag='I';
	    if($tag=='B' || $tag=='I' || $tag=='U')
	        $this->SetStyle($tag,false);
	    if($tag=='A')
	        $this->HREF='';
	    if($tag=='FONT'){
	        if ($this->issetcolor==true) {
	            $this->SetTextColor(0);
	        }
	        if ($this->issetfont) {
	            $this->SetFont('arial');
	            $this->issetfont=false;
	        }
	    }
	}

	function SetStyle($tag, $enable)
	{
	    //Modify style and select corresponding font
	    $this->$tag+=($enable ? 1 : -1);
	    $style='';
	    foreach(array('B','I','U') as $s) {
	        if($this->$s>0)
	            $style.=$s;
	    }
	    $this->SetFont('',$style);
	}

	function PutLink($URL, $txt)
	{
	    //Put a hyperlink
	    $this->SetTextColor(0,0,255);
	    $this->SetStyle('U',true);
	    $this->Write(5,$txt,$URL);
	    $this->SetStyle('U',false);
	    $this->SetTextColor(0);
	}

	function cetak($or='P',$data=array()){
		parent::__construct($or,'mm','A4');
		$default['header_cell'] = ($or=='L'?277:200);
		$default['header_line'] = ($or=='L'?277:190);
		$default['center_page'] = ($or=='L'?(297):(210));
		$this->SetTitle((isset($data['judul'])?$data['judul']:$data['surat_masuk']['srtms_prh'].' - '.$this->konversi_tanggal($data['surat_masuk']['srtms_tgl'])));
		$this->AddPage();
		$tabspasi = "\t\t\t\t\t\t\t\t\t\t\t\t";
		//$this->AliasNbPages();
		$this->AliasNbPages();
		// $this->Image($data['logo'],20,6,25,25);
		$this->SetFont('Arial','','12');
		//$this->Cell(80);
		$this->Ln();
		// $this->Cell($default['header_cell'],5,"SISTEM INFORMASI SPPD",0,1,'C');
		//$this->SetFont('Arial','B','10');
		// $this->Cell($default['header_cell'],5,"(Surat Perintah Perjalanan Dinas)",0,1,'C');
		//$this->Cell($default['header_cell'],5,"KANTOR WILAYAH DJKN JAWA BARAT",0,1,'C');
		//$this->SetFont('Arial','B','10');
		// $this->Cell($default['header_cell'],5,"STMIK NUSA MANDIRI",0,1,'C');
		// $this->Cell($default['header_cell'],5,"DEPOK",0,1,'C');
		$this->SetFont('Arial','','8');
		// $this->Cell($default['header_cell'],4,"JALAN SERSAN ASWAN NO. 8D, DEPOK.",0,1,'C');
		// $this->Cell($default['header_cell'],3,"TELEPON (021) 880-8888, FAKSIMILE (021) 880-3832",0,1,'C');
		// $this->Line(20,38,$default['header_line'],38);
		$this->Ln(10);
		if (isset($data['judul'])) {
			$this->SetFont('Times','BU','12');
			$this->Cell(($or=='L'?$default['center_page']-30:$default['center_page']-10),7,strtoupper($data['judul']),0,1,'C');
		}
		$this->SetTextColor(0, 0, 0);
		if(isset($data['direktur'])){
			$this->Ln(8);
            $this->Cell(10);
            $this->SetFont('TImes','B','9');
            $this->SetFillColor(0, 51, 102);
            $this->SetTextColor(255, 255, 255);
            $this->Cell(10,6,"NIP",1,0,'C',true);
            $this->Cell(53,6,"Nama Lengkap",1,0,'C',true);
            $this->Cell(30,6,"Nomor Telepon",1,0,'C',true);
            $this->Cell(44,6,"Email",1,0,'C',true);
            $this->Cell(120,6,"Alamat",1,1,'C',true);
            $this->SetTextColor(0, 0, 0);
            $this->SetFont('Arial','','9');
            foreach ($data['direktur'] as $num => $row){
                 $this->Cell(10);
                 $this->Cell(10,6,++$num,1,0,'C');
                 $this->Cell(53,6,$row->direktur_nm,1,0);
                 $this->Cell(30,6,$row->direktur_tlp,1,0);
                 $this->Cell(44,6,$row->direktur_eml,1,0); 
                 $this->Cell(120,6,$row->direktur_alm,1,1); 
             }
             $this->SetY(0);
             $this->SetFont('Arial','I','9');
             $this->Cell(0,10,$this->PageNo().' /{nb}',0,0,'R');
		}elseif(isset($data['pegawai'])) {
			$this->Ln(8);
			$this->Cell(10);
			$this->SetFont('TImes','B','9');
			$this->SetFillColor(0, 51, 102);
			$this->SetTextColor(255, 255, 255);
			$this->Cell(10,6,"NO",1,0,'C',true);
			$this->Cell(28,6,"NIP",1,0,'C',true);
			$this->Cell(53,6,"Nama Lengkap",1,0,'C',true);
			$this->Cell(30,6,"Jenis Kelamin",1,0,'C',true);
			$this->Cell(44,6,"Tempat & Tgl. Lahir",1,0,'C',true);
			$this->Cell(44,6,"Pangkat & Golongan",1,0,'C',true);
			$this->Cell(48,6,"Jabatan",1,1,'C',true);
			$this->SetTextColor(0, 0, 0);
			$this->SetFont('Arial','','9');
            foreach ($data['pegawai'] as $num => $row){
                $tgl=$this->konversi_tanggal($row->pgw_tll);
                $this->Cell(10);
                $this->Cell(10,6,++$num,1,0,'C');
                $this->Cell(28,6,$row->pgw_nip,1,0);
                $this->Cell(53,6,$row->pgw_nm,1,0);
                $this->Cell(30,6,$row->pgw_jnk,1,0);
                $this->Cell(44,6,$row->pgw_tlh.', '.$tgl,1,0); 
                $this->Cell(44,6,$row->pgw_gpt,1,0); 
                $this->Cell(48,6,$row->pgw_jab,1,1); 
            }
			 $this->SetY(0);
			 $this->SetFont('Arial','I','9');
			 $this->Cell(0,10,$this->PageNo().' /{nb}',0,0,'R');
		}elseif (isset($data['nota_dinas'])) {
            $dompdf = new Dompdf();
            $dompdf->loadHtml($data['nota_dinas']['template_cetak']);
            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'portait');
            $dompdf->render();
            $dompdf->stream("Nota Dinas",array("Attachment"=>0));

	
		}elseif (isset($data['rincian'])) {
			# code...
		}elseif(isset($data['surat_tugas'])){
            $this->SetLeftMargin(20);
            $this->SetRightMargin(20);
            $this->SetFont('Times','','11');
            $this->Cell($default['center_page']-30,3,"Nomor : ".$data['surat_tugas']['srtgs_no'],0,1,'C');
            $this->Ln(5);
            $this->MultiCell($default['center_page']-30,8,"\t\t\t\t\t\t\t\t\t\tDalam rangka melaksanakan ".strtolower($data['surat_tugas']['psl_prh']).', kami menugaskan : ',0,'L',false);
            $this->Ln(5);
            $this->Cell(2,6,"1.",0,0,'L');
            $this->Cell(8);
            $this->Cell(10,6,"Nama/NIP ",0,0,'L');
            $this->Cell(24);
            $this->Cell(10,6,': '.$data['surat_tugas']['pgw_nm'].' / '.$data['surat_tugas']['pgw_nip'],0,1,'L');
            $this->Cell(10);
            $this->Cell(10,6,"Pangkat/Golongan ",0,0,'L');
            $this->Cell(24);
            $this->Cell(10,6,': '.$data['surat_tugas']['pgw_gpt'],0,1,'L');
            $this->Cell(10);
            $this->Cell(10,6,"Jabatan ",0,0,'L');
            $this->Cell(24);
            $this->Cell(10,6,': '.$data['surat_tugas']['pgw_jab'],0,1,'L');
            if (isset($data['pengikut_tugas'])) {
                $this->Ln(3);
                foreach ($data['pengikut_tugas'] as $key => $value) {
                    ++$key;
                    $this->Cell(2,6,++$key.".",0,0,'L');
                    $this->Cell(8);
                    $this->Cell(10,6,"Nama/NIP ",0,0,'L');
                    $this->Cell(24);
                    $this->Cell(10,6,': '.$value->pgw_nm.' / '.$value->pgw_nip,0,1,'L');
                    $this->Cell(10);
                    $this->Cell(10,6,"Pangkat/Golongan ",0,0,'L');
                    $this->Cell(24);
                    $this->Cell(10,6,': '.$value->pgw_gpt,0,1,'L');
                    $this->Cell(10);
                    $this->Cell(10,6,"Jabatan ",0,0,'L');
                    $this->Cell(24);
                    $this->Cell(10,6,': '.($value->pgw_jab==$data['surat_tugas']['pgw_jab']?'Asisten '.$value->pgw_jab:$value->pgw_jab),0,1,'L');
                    $this->Ln(3);
                }
                $this->Ln(3);
                $this->MultiCell(160,6,"Untuk melaksanakan ".strtolower($data['surat_tugas']['psl_prh']??"perjalanan dinas")." atas permintaan ".$data['surat_tugas']['direktur_nm'].', yang bertempat di '.$data['surat_tugas']['srtgs_tmt'].'.',0,'J',false);
                $this->Ln(5);
                $this->SetFont('Times','B','12');
                $tgl_tgs = date_create($data['surat_tugas']['srtgs_tgl']);
                $tgl_kmb = date_create($data['surat_tugas']['srtgs_kmb']);
                $dif = date_diff($tgl_tgs,$tgl_kmb);
                if ($dif->format("%a")>0) {
                    $this->Cell(10,6,"Pada tanggal ".date_format($tgl_tgs,"d")."-".$this->konversi_tanggal($data['surat_tugas']['srtgs_kmb']),0,1,'L'); 
                }else{
                    $this->Cell(10,6,"Pada tanggal ".$this->konversi_tanggal($data['surat_tugas']['srtgs_tgl']),0,1,'L');
                }
                $this->Ln(5);
                //$this->Cell(10);
                $this->SetFont('Times','','11');
                $this->MultiCell(160,6,$tabspasi."Surat tugas ini disusun untuk dilaksanakan dan setelah selesai dilaksanakan, pelaksana segera menyampaikan laporan. Kepada instansi terkait, kami mohon bantuan demi kelancaran pelaksanaan tugas tersebut.",0,'J',false);
                $this->Ln(10);
                $this->SetX(-54);
                $this->Cell(10,4,"DEPOK, ",0,1,'L');
                $this->SetX(-54);
                $this->Cell(10,4,"Kepala Kantor",0,1,'L');
                $this->Ln(18);
                foreach ($data['kepala_kantor'] as $value) {
                    $this->SetX(-54);
                    $this->Cell(10,4,$value->pgw_nm,0,1,'L');
                    $this->SetX(-54);
                    $this->Cell(10,4,'NIP '.$value->pgw_nip,0,1,'L');                       
                }   
                $this->SetX(30);
                $this->Ln(19);
                $this->Cell(13,5,"Tembusan ".': ',0,1,'L');
                $this->Cell(13,5,$data['tembusan'][0]->pgw_jab,0,1,'L');
            }
        }   
		//$this->SetMargins(10,10,10);
		$this->Output('I',strtolower((isset($data['judul'])?$data['judul']:$data['nama_file']).' - '. date('d M Y')).'.pdf');
	}

    public function load_view($view,$paper='A4',$orientasi='portait', $data = array())
    {
        $dompdf = new Dompdf();
        $html = $this->ci()->load->view($view, $data, TRUE);

        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($paper, $orientasi);

        // Render the HTML as PDF
        $dompdf->render();
        //$time = time();

        // Output the generated PDF to Browser
        $dompdf->stream("welcome-". $time,array("Attachment"=>0));
    }

    function konversi_romawi($num){ 
        $n = intval($num); 
        $res = ''; 

        //array of roman numbers
        $romanNumber_Array = array( 
            'M'  => 1000, 
            'CM' => 900, 
            'D'  => 500, 
            'CD' => 400, 
            'C'  => 100, 
            'XC' => 90, 
            'L'  => 50, 
            'XL' => 40, 
            'X'  => 10, 
            'IX' => 9, 
            'V'  => 5, 
            'IV' => 4, 
            'I'  => 1); 

        foreach ($romanNumber_Array as $roman => $number){ 
            //divide to get  matches
            $matches = intval($n / $number); 

            //assign the roman char * $matches
            $res .= str_repeat($roman, $matches); 

            //substract from the number
            $n = $n % $number; 
        } 

        // return the result
        return $res; 
    } 


}

/* End of file Init_sesi.php */
/* Location: ./application/libraries/Init_sesi.php */