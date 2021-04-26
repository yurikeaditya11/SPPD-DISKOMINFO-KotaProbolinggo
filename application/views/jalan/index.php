<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DATA SURAT JALAN
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">DATA SURAT JALAN</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">DATA SURAT JALAN</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div style='padding-bottom:10px'>
                    <a href="<?php echo site_url('jalan/add');?>"><button type="button" class="btn btn-info">Add</button></a>
                </div>
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nomor Surat</th>
                  <th>Nama Karyawan</th>
                  <th>NIP</th>
                  <th>Tujuan</th>
                  <th>Tanggal Berangkat</th>
                  <th>Tanggal Pulang</th>
                  <th>Option</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($data as $a) {
                    $karyawan = $this->model_surat_jalan->get_karyawan_by_nip($a['nip']);
                    ?>
                  <tr>
                    <td><?php echo $a['nomor_surat'] ?></td>
                    <td><?php echo $karyawan['nama_karyawan'];?></td>
                    <td><?php echo $a['nip'] ?></td>
                    <td><?php echo $a['nama_tujuan'] ?></td>
                    <td><?php echo date("d-F-Y", strtotime($a['tanggal_berangkat'])); ?></td>
                    <td><?php echo date("d-F-Y", strtotime($a['tanggal_pulang'])); ?></td>
                    <td>
                      <p>
                      <a href="<?php echo site_url('jalan/kwitansi/'.$a['id_surat']);?>"><i title="cetak kwitansi" class="fa fa-external-link" target="_blank"></i></a>
                      <a href="<?php echo site_url('jalan/print/'.$a['id_surat']);?>"><i title="cetak pdf" class="fa fa-print" target="_blank"></i></a>
                      <a href="<?php echo site_url('jalan/view/'.$a['id_surat']);?>"><i title="view" class="fa fa-eye"></i></a></p>
                      <p><a href="<?php echo site_url('jalan/edit/'.$a['id_surat']);?>"><i title="edit" class="fa fa-edit"></i></a>
                      <a data-href="<?php echo site_url('jalan/actiondelete/'.$a['id_surat']);?>" data-toggle="modal" data-target="#confirm-delete<?php echo $i;?>" href="#"><i title="delete" class="fa fa-trash"></i></a>

                      <div class="modal fade" id="confirm-delete<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">

                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                      <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                                  </div>

                                  <div class="modal-body">
                                      <p>You are about to delete this data.</p>
                                      <p>Do you want to proceed?</p>
                                      <p class="debug-url"></p>
                                  </div>

                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                      <a href="<?php echo site_url('jalan/actiondelete/'.$a['id_surat']);?>" class="btn btn-danger danger">Delete</a>
                                  </div>
                              </div>
                          </div>
                      </div></p>
                    </td>
                  </tr>
                  <?php $i++;} ?>
                </tbody>
              </table>
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
