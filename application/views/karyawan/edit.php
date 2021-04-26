<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Data Karyawan
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Data Karyawan</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" enctype="multipart/form-data" method="post" action="<?php echo site_url('karyawan/actionedit');?>">
                                  <div class="box-body">
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">NIP</label>
                                          <input type="text" name="nip_karyawan" class="form-control" placeholder="Enter NIP" value="<?php echo $data['nip_karyawan'] ?>">
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">Nama</label>
                                          <input type="text" name="nama_karyawan" class="form-control" placeholder="Enter Nama" value="<?php echo $data['nama_karyawan'] ?>">
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">Pangkat</label>
                                          <input type="text" name="pangkat_karyawan" class="form-control" placeholder="Enter Pangkat" value="<?php echo $data['pangkat_karyawan'] ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Golongan</label>
                                        <input type="text" name="gol_karyawan" class="form-control" placeholder="Enter Golongan" value="<?php echo $data['gol_karyawan'] ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Jabatan</label>
                                        <input type="text" name="jabatan_karyawan" class="form-control" placeholder="Enter Jabatan" value="<?php echo $data['jabatan_karyawan'] ?>">
                                      </div>
                                  </div><!-- /.box-body -->

                                  <div class="box-footer">
                                      <input type="hidden" name="id" value="<?php echo $data['id_karyawan'];?>">
                                      <button type="submit" class="btn btn-primary">Submit</button>
                                  </div>
                                </form>
                            </div><!-- /.box -->
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section>
    <!-- /.content -->
  </div>

<?php include_once dirname(__FILE__).'/../layouts/footer.php';?>
