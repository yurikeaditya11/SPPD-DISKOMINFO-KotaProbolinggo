<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Data Tujuan
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
                                    <h3 class="box-title">Data Tujuan</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" enctype="multipart/form-data" method="post" action="<?php echo site_url('tujuan/actionedit');?>">
                                  <div class="box-body">
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">Tujuan</label>
                                          <input type="text" name="nama_tujuan" class="form-control" placeholder="Enter Tujuan" value="<?php echo $data['nama_tujuan'] ?>">
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">Golongan</label>
                                          <input type="text" name="tingkat_tujuan" class="form-control" placeholder="Enter Golongan" value="<?php echo $data['tingkat_tujuan'] ?>">
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">Nominal</label>
                                          <input type="text" name="budget_tujuan" class="form-control" placeholder="Enter Nominal" value="<?php echo $data['budget_tujuan'] ?>">
                                      </div>
                                  </div><!-- /.box-body -->

                                  <div class="box-footer">
                                      <input type="hidden" name="id" value="<?php echo $data['id_tujuan'];?>">
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
