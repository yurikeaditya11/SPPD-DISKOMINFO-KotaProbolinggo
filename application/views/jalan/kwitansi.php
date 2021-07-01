<?php
$assets  = $this->config->item('assets');
$path    = $this->config->item('path');
function penyebut($nilai) {
	$nilai = abs($nilai);
	$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	$temp = "";
	if ($nilai < 12) {
		$temp = " ". $huruf[$nilai];
	} else if ($nilai <20) {
		$temp = penyebut($nilai - 10). " belas";
	} else if ($nilai < 100) {
		$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
	} else if ($nilai < 200) {
		$temp = " seratus" . penyebut($nilai - 100);
	} else if ($nilai < 1000) {
		$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
	} else if ($nilai < 2000) {
		$temp = " seribu" . penyebut($nilai - 1000);
	} else if ($nilai < 1000000) {
		$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
	} else if ($nilai < 1000000000) {
		$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
	} else if ($nilai < 1000000000000) {
		$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
	} else if ($nilai < 1000000000000000) {
		$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
	}
	return $temp;
}

function terbilang($nilai) {
	if($nilai<0) {
		$hasil = "minus ". trim(penyebut($nilai));
	} else {
		$hasil = trim(penyebut($nilai));
	}
	return $hasil;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    @page { size: auto portrait; margin: 1mm; }
    </style>
    <link rel="stylesheet" href="<?php echo $assets;?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $assets;?>/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo $assets;?>/dist/css/AdminLTE.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
          <div class="col-xs-2">
            <img src="<?php echo $this->config->item('path'); ?>diskominfo.png" style="height: 80px; width: auto">
          </div>
          <div class="col-md-10">
            <p><h3>Surat Terima Dari Bendahara Pengecekan</h3></p>
            <p><h3>Dinas Komunikasi dan Informatika</h3></p>
          </div>
      </div></br>
      <div class="row" style="padding-left: 80px;">
        <div class="col-md-12">
          <h4>Senilai Rp. <?= $data['total']; ?> untuk biaya perjalanan</h4>
        </div>
        <div class="col-md-3">
          <h4>Dengan Rincian</h4>
        </div>
        <div class="col-md-9">
          <h4>
            <ol type="a">
              <li>Uang Saku : Rp. <?= $kota['budget_tujuan']; ?> </li>
              <li>Ticket : <?= $data['biaya_akomodasi']; ?> </li>
              <li>Penginapan : <?= $data['harga_permalam']; ?> </li>
            </ol>
          </h4>
        </div>
        <div class="col-sm-12">
          <?php
           ?>
          <h4>Total : <?= $data['total']; ?></h4>
        </div>
      </div>
      <div class="text-right" style="padding-right: 80px;">
        <p>Dikeluarkan di : Probolinggo</p>
        <p>Pada tanggal : <?php echo date("d F Y"); ?></p>
        <p style="padding-right: 20px;"><b>Yang Bersangkutan</b></p></br></br></br>
        <p><b><?= $karyawan['nama_karyawan']; ?></b></p>
      </div>
  </body>
  <script src="<?php echo $assets;?>/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo $assets;?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    window.print();
  </script>
</html>
