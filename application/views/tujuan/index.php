<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DATA TUJUAN
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">DATA TUJUAN</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">DATA TUJUAN</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div style='padding-bottom:10px'>
                    <a href="<?php echo site_url('tujuan/add');?>"><button type="button" class="btn btn-info">Add</button></a>
                </div>
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tujuan</th>
                  <th>Golongan</th>
                  <th>Nominal</th>
                  <th>Option</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $i = 1;
                    foreach ($data as $a) {
                      ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $a['nama_tujuan'] ?></td>
                      <td><?php echo $a['tingkat_tujuan'] ?></td>
                      <td>Rp. <?php echo $a['budget_tujuan'] ?></td>
                      <td>
                        <a href="<?php echo site_url('tujuan/edit/'.$a['id_tujuan']);?>"><i title="edit" class="fa fa-edit"></i></a>
                        <a data-href="<?php echo site_url('tujuan/actiondelete/'.$a['id_tujuan']);?>" data-toggle="modal" data-target="#confirm-delete<?php echo $i;?>" href="#"><i title="delete" class="fa fa-trash"></i></a>

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
                                        <a href="<?php echo site_url('tujuan/actiondelete/'.$a['id_tujuan']);?>" class="btn btn-danger danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
