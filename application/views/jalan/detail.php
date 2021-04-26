<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DETAIL SURAT JALAN
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">DETAIL SURAT JALAN</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">DETAIL SURAT JALAN</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-sm-3">
                  <b>Nomor Surat</b>
                </div>
                <div class="col-sm-1">
                  :
                </div>
                <div class="col-sm-8">
                  <?php echo $data['nomor_surat']; ?>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <b>Nama Karyawan</b>
                </div>
                <div class="col-sm-1">
                  :
                </div>
                <div class="col-sm-8">
                  <?php echo $karyawan['nama_karyawan']; ?>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <b>NIP</b>
                </div>
                <div class="col-sm-1">
                  :
                </div>
                <div class="col-sm-8">
                  <?php echo $data['nip']; ?>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <b>Pangkat/gol</b>
                </div>
                <div class="col-sm-1">
                  :
                </div>
                <div class="col-sm-8">
                  <?php echo $karyawan['pangkat_karyawan']; ?>/<b><?php echo $karyawan['gol_karyawan']; ?></b>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <b>Jabatan</b>
                </div>
                <div class="col-sm-1">
                  :
                </div>
                <div class="col-sm-8">
                  <?php echo $karyawan['jabatan_karyawan']; ?>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <b>Tujuan</b>
                </div>
                <div class="col-sm-1">
                  :
                </div>
                <div class="col-sm-8">
                  <?php echo $kota['nama_tujuan']; ?>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <b>Tanggal Berangkat</b>
                </div>
                <div class="col-sm-1">
                  :
                </div>
                <div class="col-sm-8">
                  <?php echo date("d-F-Y", strtotime($data['tanggal_berangkat'])); ?>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <b>Tanggal Pulang</b>
                </div>
                <div class="col-sm-1">
                  :
                </div>
                <div class="col-sm-8">
                  <?php echo date("d-F-Y", strtotime($data['tanggal_pulang'])); ?>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <b>Jenis Ticket</b>
                </div>
                <div class="col-sm-1">
                  :
                </div>
                <div class="col-sm-8">
                  <?php echo $data['jenis_ticket']; ?>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <b>Nomor Ticket</b>
                </div>
                <div class="col-sm-1">
                  :
                </div>
                <div class="col-sm-8">
                  <?php echo $data['nomor_ticket']; ?>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <b>Biaya Akomodasi</b>
                </div>
                <div class="col-sm-1">
                  :
                </div>
                <div class="col-sm-8">
                   <?php echo $data['biaya_akomodasi']; ?>,-
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <b>Nama Hotel</b>
                </div>
                <div class="col-sm-1">
                  :
                </div>
                <div class="col-sm-8">
                  <?php echo $data['nama_hotel']; ?>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <b>Nomor Kamar</b>
                </div>
                <div class="col-sm-1">
                  :
                </div>
                <div class="col-sm-8">
                  <?php echo $data['nomor_kamar']; ?>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <b>Harga Permalam</b>
                </div>
                <div class="col-sm-1">
                  :
                </div>
                <div class="col-sm-8">
                   <?php echo $data['harga_permalam']; ?>,-
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <b>Total</b>
                </div>
                <div class="col-sm-1">
                  :
                </div>
                <div class="col-sm-8">
                  <?php echo $data['total']; ?>,-
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <b>Nama Penginput</b>
                </div>
                <div class="col-sm-1">
                  :
                </div>
                <div class="col-sm-8">
                  <?php echo $admin['nama_admin']; ?>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <b>Kekurangan</b>
                </div>
                <div class="col-sm-1">
                  :
                </div>
                <div class="col-sm-8">
                  <?php if(!empty($kekurangan)){ ?>
                    <?= $kekurangan['keterangan']; ?>
                  <?php }else{ ?>
                    <?= 'Belum ada laporan kekurangan'; ?>
                  <?php } ?>
                </div>
              </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php include_once dirname(__FILE__).'/../layouts/footer.php';?>
