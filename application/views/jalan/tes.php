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
    @page { size: legal portrait; margin: 1mm; }
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
            <h3>DINAS KOMUNIKASI DAN INFORMATIKA KOTA PROBOLINGGO</h3>
          </div>
      </div>
      <div class="text-center">
        <u><H4><b>SURAT PERINTAH PERJALANAN DINAS</b></H4></u>
      </div>
      <table class="table table-bordered" style="width: 100%">
        <tr>
          <td>
            1. Pejabat yang berwenang memberi perintah
          </td>
          <td>
            KEPALA DINAS KOMUNIKASI DAN INFORMATIKA
          </td>
        </tr>
        <tr>
          <td>
            2. Nama pegawai yang di perintah
          </td>
          <td>
            <?php echo $karyawan['nama_karyawan'] ?>
          </td>
        </tr>
        <tr>
          <td>
            <ol type="a">
              <li>Pangkat dan golongan menurut PGPS-1968</li>
              <li>Jabatan</li>
              <li>Gaji Pokok</li>
              <li>Tingkat menurut peraturan perjalanan dinas</li>
            </ol>
          </td>
          <td>
            <ol type="a">
              <li><?php echo $karyawan['pangkat_karyawan'] ?></li>
              <li><?php echo $karyawan['jabatan_karyawan'] ?></li>
              <li>-</li>
              <li><?php echo $karyawan['gol_karyawan'] ?></li>
            </ol>
          </td>
        </tr>
        <tr>
          <td>
            3. Maksut Perjalanan Dinas
          </td>
          <td>
            Dinas
          </td>
        </tr>
        <tr>
          <td>
            4. Alat angkut yang di pergunakan
          </td>
          <td>
            <?php echo $data['jenis_ticket'] ?>
          </td>
        </tr>
        <tr>
          <td>
            6. <ol type="a">
                  <li>Tempat Berangkat</li>
                  <li>Tempat Tujuan</li>
                </ol>
          </td>
          <td>
            </br>
              <ol type="a">
                <li>Probolinggo</li>
                <li><?php echo $kota['nama_tujuan'] ?></li>
              </ol>
          </td>
        </tr>
        <tr>
          <td>
            7. <ol type="a">
                  <li>Lama perjalanan dinas</li>
                  <li>Tanggal berangkat</li>
                  <li>Tanggal harus kembali</li>
                </ol>
          </td>
          <td>
            </br>
              <ol type="a">
                <?php
                $startTimeStamp = strtotime($data['tanggal_berangkat']);
                $endTimeStamp = strtotime($data['tanggal_pulang']);

                $timeDiff = abs($endTimeStamp - $startTimeStamp);

                $numberDays = $timeDiff/86400;  // 86400 seconds in one day

                // and you might want to convert to integer
                $numberDays = intval($numberDays);
                 ?>
                <li><?php echo $numberDays; ?> (<?php echo terbilang($numberDays); ?>) hari</li>
                <li><?php echo date("d F Y", strtotime($data['tanggal_berangkat'])); ?></li>
                <li><?php echo date("d F Y", strtotime($data['tanggal_pulang'])); ?></li>
              </ol>
          </td>
        </tr>
        <tr>
          <td>
            8. Pembebanan Anggaran
            <ol type="a">
              <li>Instansi</li>
              <li>Mata Anggaran</li>
            </ol>
          </td>
          <td>
            </br>
              <ol type="a">
                <li>Dinas Komunikasi dan Informasi</li>
                <li>Perjalanan dinas luar daerah</li>
              </ol>
          </td>
        </tr>
        <tr>
          <td>
            9. Keterangan Lain-lain
          </td>
          <td>
            Menghadiri acara FGD Pengendalian Infrastruktur TIK dengan tema “Pengendalian Infrastruktur Data Center dan Ruang Server”
          </td>
        </tr>
      </table>
      <div>
        <h4>Tembusan kepada </h4>
        <ol type="1">
          <li></li>
          <li></li>
        </ol>
      </div>
      <div class="text-right">
        <p>Dikeluarkan di : Probolinggo</p>
        <p>Pada tanggal : <?php echo date("d F Y"); ?></p>
        <p><b>KEPALA DINAS KOMUNIKASI DAN INFORMATIKA</b></p>
        <p style="padding-right: 80px;"><b>KOTA PROBOLINGGO</b></p></br></br></br>
        <p style="padding-right: 60px;"><u><b>AMAN SURYAMAN, AP. MM</b></u></p>
        <p style="padding-right: 80px;"><b>Pembina Utama Muda</b></p>
        <p style="padding-right: 60px;"><b>NIP. 19751206 199412 1 001</b></p>
      </div>
      </br>
      <table class="table table-bordered" style="width: 100%">
        <tr>
          <td>
            I. -
          </td>
          <td>
            <p>
              <div class="row">
                <div class="col-xs-2">
                  Berangkat Dari
                </div>
                <div class="col-xs-1">
                  :
                </div>
                <div class="col-xs-9">
                  Probolinggo
                </div>
              </div>
            </p>
            <p>(Tempat Kedudukan)</p>
            <p>
              <div class="row">
                <div class="col-xs-2">
                  Ke
                </div>
                <div class="col-xs-1">
                  :
                </div>
                <div class="col-xs-9">
                  -
                </div>
              </div>
            </p>
            <p>
              <div class="row">
                <div class="col-xs-2">
                  Pada Tanggal
                </div>
                <div class="col-xs-1">
                  :
                </div>
                <div class="col-xs-9">
                  <?php echo date("d F Y", strtotime($data['tanggal_berangkat'])); ?>
                </div>
              </div>
            </p>
            <div>
              <p><b>KEPALA DINAS KOMUNIKASI DAN INFORMATIKA</b></p>
              <p style="padding-left: 80px;"><b>KOTA PROBOLINGGO</b></p></br></br></br>
              <p style="padding-left: 60px;"><u><b>AMAN SURYAMAN, AP. MM</b></u></p>
              <p style="padding-left: 80px;"><b>Pembina Utama Muda</b></p>
              <p style="padding-left: 60px;"><b>NIP. 19751206 199412 1 001</b></p>
            </div>
          </td>
        </tr>
        <tr>
          <td>
            <p>
              <div class="row">
                <div class="col-md-4">
                  II. Tiba Di
                </div>
                <div class="col-md-8">
                  : Surabaya
                </div>
              </div>
            </p>
            <p>
              <div class="row">
                <div class="col-md-3">
                  Pada tanggal
                </div>
                <div class="col-md-9">
                  : 25 Nopember 2019
                </div>
              </div>
            </p>
          </td>
          <td>
            <p>
              <div class="row">
                <div class="col-xs-2">
                  Berangkat Dari
                </div>
                <div class="col-xs-1">
                  :
                </div>
                <div class="col-xs-9">
                  Probolinggo
                </div>
              </div>
            </p>
            <p>(Tempat Kedudukan)</p>
            <p>
              <div class="row">
                <div class="col-xs-2">
                  Ke
                </div>
                <div class="col-xs-1">
                  :
                </div>
                <div class="col-xs-9">
                  -
                </div>
              </div>
            </p>
            <p>
              <div class="row">
                <div class="col-xs-2">
                  Pada Tanggal
                </div>
                <div class="col-xs-1">
                  :
                </div>
                <div class="col-xs-9">
                  <?php echo date("d F Y", strtotime($data['tanggal_pulang'])); ?>
                </div>
              </div>
            </p>
          </td>
        </tr>
        <tr>
          <td>
            <p>
              <div class="row">
                <div class="col-md-4">
                  III. Tiba Di
                </div>
                <div class="col-md-8">
                  : -
                </div>
              </div>
            </p>
            <p>
              <div class="row">
                <div class="col-md-4">
                  Pada tanggal
                </div>
                <div class="col-md-8">
                  : -
                </div>
              </div>
            </p>
          </td>
          <td>
            <p>
              <div class="row">
                <div class="col-xs-2">
                  Berangkat Dari
                </div>
                <div class="col-xs-1">
                  :
                </div>
                <div class="col-xs-9">
                  -
                </div>
              </div>
            </p>
            <p>(Tempat Kedudukan)</p>
            <p>
              <div class="row">
                <div class="col-xs-2">
                  Ke
                </div>
                <div class="col-xs-1">
                  :
                </div>
                <div class="col-xs-9">
                  -
                </div>
              </div>
            </p>
            <p>
              <div class="row">
                <div class="col-xs-2">
                  Pada Tanggal
                </div>
                <div class="col-xs-1">
                  :
                </div>
                <div class="col-xs-9">
                  -
                </div>
              </div>
            </p>
          </td>
        </tr>
        <tr>
          <td>
            <p>
              <div class="row">
                <div class="col-md-4">
                  IV. Tiba Di
                </div>
                <div class="col-md-8">
                  : -
                </div>
              </div>
            </p>
            <p>
              <div class="row">
                <div class="col-md-4">
                  Pada tanggal
                </div>
                <div class="col-md-8">
                  : -
                </div>
              </div>
            </p>
          </td>
          <td>
            <p>
              <div class="row">
                <div class="col-xs-2">
                  Berangkat Dari
                </div>
                <div class="col-xs-1">
                  :
                </div>
                <div class="col-xs-9">
                  -
                </div>
              </div>
            </p>
            <p>(Tempat Kedudukan)</p>
            <p>
              <div class="row">
                <div class="col-xs-2">
                  Ke
                </div>
                <div class="col-xs-1">
                  :
                </div>
                <div class="col-xs-9">
                  -
                </div>
              </div>
            </p>
            <p>
              <div class="row">
                <div class="col-xs-2">
                  Pada Tanggal
                </div>
                <div class="col-xs-1">
                  :
                </div>
                <div class="col-xs-9">
                  -
                </div>
              </div>
            </p>
          </td>
        </tr>
        <tr>
          <td>
            <p>
              <div class="row">
                <div class="col-md-4">
                  V. Tiba Di
                </div>
                <div class="col-md-8">
                  : -
                </div>
              </div>
            </p>
            <p>
              <div class="row">
                <div class="col-md-4">
                  Pada tanggal
                </div>
                <div class="col-md-8">
                  : -
                </div>
              </div>
            </p>
          </td>
          <td>
            <p>
              <div class="row">
                <div class="col-xs-2">
                  Berangkat Dari
                </div>
                <div class="col-xs-1">
                  :
                </div>
                <div class="col-xs-9">
                  -
                </div>
              </div>
            </p>
            <p>(Tempat Kedudukan)</p>
            <p>
              <div class="row">
                <div class="col-xs-2">
                  Ke
                </div>
                <div class="col-xs-1">
                  :
                </div>
                <div class="col-xs-9">
                  -
                </div>
              </div>
            </p>
            <p>
              <div class="row">
                <div class="col-xs-2">
                  Pada Tanggal
                </div>
                <div class="col-xs-1">
                  :
                </div>
                <div class="col-xs-9">
                  -
                </div>
              </div>
            </p>
            <p>Telah diperiksa dengan keterangan bahwa perjalanan</p>
            <p>tersebut diatas benar dilakukan perintahnya dan</p>
            <p>semata - mata untuk kepentingan jabatan dalam </p>
            <p>waktu yang sesingkat - singkatnya </p>
            <div>
              <p><b>KEPALA DINAS KOMUNIKASI DAN INFORMATIKA</b></p>
              <p style="padding-left: 80px;"><b>KOTA PROBOLINGGO</b></p></br></br></br>
              <p style="padding-left: 60px;"><u><b>AMAN SURYAMAN, AP. MM</b></u></p>
              <p style="padding-left: 80px;"><b>Pembina Utama Muda</b></p>
              <p style="padding-left: 60px;"><b>NIP. 19751206 199412 1 001</b></p>
            </div>
          </td>
        </tr>
      </table>
      <div>
        <h5>VI. Catatan lain-lain: -</h5>
      </div>
      <div>
        <h4><b>PERHATIAN</b></h4>
        <p>Pejabat yang berwenang menertibkan SPPD pegawai yang melakukan perjalanan dinas, para pejabat yang mengesahkan tanggal berangkat / tiba serta bendaharawan bertanggung jawab berdasarkan peraturan-peraturan keuangan Negara, apabila Negara menderita rugi akibat kesalahan, kelalaian dan kealpaan (angka 8 Surat Menteri Keuangan, pada tanggal 30 April 1974 No.B-296/MK/1/4/1974)</p>
      </div>
    </div>
  </body>
  <script src="<?php echo $assets;?>/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo $assets;?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    window.print();
  </script>
</html>
