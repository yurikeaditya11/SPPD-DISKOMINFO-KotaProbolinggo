<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin Edit
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('admin');?>">Admin</a></li>
        <li class="active">Edit</li>
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
                                    <h3 class="box-title">Admin > Edit</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" enctype="multipart/form-data" method="post" action="<?php echo site_url('admin/actionedit');?>">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username</label>
                                            <input type="username" name="username" class="form-control" id="exampleInputUsername1" placeholder="Enter username" value="<?php echo $data['username_admin'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama</label>
                                            <input type="nama" name="nama" class="form-control" id="exampleInputUsername1" placeholder="Enter name" value="<?php echo $data['nama_admin'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo $data['email_admin'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Level User</label>
                                            <select class="form-control" name="level_admin">
                                            <option value="admin" <?php if($data['level_admin'] == 'admin'){ echo 'selected';} ?>>Admin</option>
                                            <option value="master" <?php if($data['level_admin'] == 'master'){ echo 'selected';} ?>>Master</option>
                                            </select>
                                        </div>
                                        <div class="box-body no-padding">
                                          <div class="x_content">
                                            <div class="form-group">
                                            <?php if (!empty($data['foto_admin'])) {?>
                                              <img src="<?php echo $path.'/'.$data['foto_admin'];?>" id="showgambar" style="max-width:200px;max-height:200px;" /><br/>
                                              <input type="hidden" name="imagex" value="<?php echo $data['foto_admin']; ?>">
                                            <?php }else{?>
                                              <img src="http://placehold.it/100x100" id="showgambar" style="max-width:200px;max-height:200px;" /><br/>
                                            <?php ;} ?>
                                              <label for="exampleInputFile">Input Image</label>
                                              <input type="file" id="inputgambar" name="foto_admin">
                                              <br/>
                                            </div>
                                          </div>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <input type="hidden" name="id" value="<?php echo $data['id_admin'];?>">
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
<script type="text/javascript">
function readURL(input) {
if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $('#showgambar').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
}
}
$("#inputgambar").change(function () {
readURL(this);
});
</script>
</script>
