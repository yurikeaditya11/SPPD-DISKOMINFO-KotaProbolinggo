<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Surat Tugas Jalan
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
                                    <h3 class="box-title">Surat Tugas Jalan</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <?php if ($this->session->flashdata('alert_error')) { ?>
                                  <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Maaf!</strong>
                                    <strong><?php echo $this->session->flashdata('alert_error'); ?></strong>
                                  </div>
                                <?php ;} ?>
                                <form role="form" enctype="multipart/form-data" method="post" action="<?php echo site_url('jalan/actionedit');?>">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nomor Surat Tugas</label>
                                            <input type="text" name="nomor_surat" class="form-control" placeholder="Enter Nomor Surat Tugas" value="<?php echo $data['nomor_surat'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">NIP</label>
                                            <input type="text" name="nip" id="nip" class="form-control" placeholder="Enter NIP" value="<?php echo $data['nip'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Kota Tujuan</label>
                                                <select name="tujuan" class="form-control select2" id="tujuan">
                                                </select>
                                        </div>
                                        <div class="form-group">
                                          <div class="box" id="box_pegawai" hidden>
                                            <div class="box-header">
                                              <h3 class="box-title">Data Karyawan</h3>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body" id="data_pegawai">

                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="control-label">Tanggal Berangkat</label>
                                          <input type="text" name="tanggal_berangkat" id="tanggal_berangkat" class="form-control" value="<?php echo date("d/m/Y", strtotime($data['tanggal_berangkat'])); ?>">
                                        </div>
                                        <div class="form-group">
                                          <label class="control-label">Tanggal Pulang</label>
                                          <input type="text" name="tanggal_pulang" id="tanggal_pulang" class="form-control" value="<?php echo date("d/m/Y", strtotime($data['tanggal_pulang'])); ?>">
                                        </div>
                                        <div class="form-group">
                                          <span><b>-- Biaya Lain --</b></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Ticket Kendaraan</label>
                                                <select name="jenis_ticket" class="form-control">
                                                    <option value="Kereta" <?php if($data['jenis_ticket'] == 'Kereta'){ echo 'selected';} ?>>Kereta</option>
                                                    <option value="Motor" <?php if($data['jenis_ticket'] == 'Motor'){ echo 'selected';} ?>>Motor</option>
                                                    <option value="Mobil" <?php if($data['jenis_ticket'] == 'Mobil'){ echo 'selected';} ?>>Mobil</option>
                                                    <option value="Pesawat" <?php if($data['jenis_ticket'] == 'Pesawat'){ echo 'selected';} ?>>Pesawat</option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nomor Ticket</label>
                                            <input type="text" name="nomor_ticket" class="form-control" placeholder="Enter Nomor Ticket" value="<?php echo $data['nomor_ticket']; ?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Harga Ticket</label>
                                          <input type="text" name="biaya_akomodasi" id="harga_ticket" class="form-control" placeholder="Enter Harga Ticket" value="<?php echo $data['biaya_akomodasi']; ?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Nama Penginapan</label>
                                          <input type="text" name="nama_hotel" class="form-control" placeholder="Enter Nama Penginapan" value="<?php echo $data['nama_hotel']; ?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Nomor Kamar</label>
                                          <input type="text" name="nomor_kamar" class="form-control" placeholder="Enter Nomor Kamar" value="<?php echo $data['nomor_kamar']; ?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Harga Penginapan</label>
                                          <input type="text" name="harga_permalam" id="harga_permalam" class="form-control" placeholder="Enter Harga Penginapan Per Malam" value="<?php echo $data['harga_permalam']; ?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Total</label>
                                          <input type="text" name="total" id="total" class="form-control" placeholder="Enter Total Pembiayaan" value="<?php echo $data['total']; ?>">
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <input type="hidden" name="id" value="<?php echo $data['id_surat'];?>">
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
$(function(){
  var content = $('#box_pegawai');
  var id=$('#nip').val();
  var id2=$('#tujuan').val();
  $.ajax({
      type: "POST", // Method pengiriman data bisa dengan GET atau POST
      url: "<?php echo base_url("Jalan/get_tujuan"); ?>", // Isi dengan url/path file php yang dituju
      data: {id : id}, // data yang akan dikirim ke file yang dituju
      dataType: "json",
      success: function(response){ // Ketika proses pengiriman berhasil

          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $("#tujuan").html(response.list);
      },
      error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
      }
  });
  $('#tujuan').change(function(){
    var content = $('#box_pegawai');
    var id   =$('#nip').val();
    var id2  =$('#tujuan').val();
    $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("Jalan/get_data_karyawan"); ?>", // Isi dengan url/path file php yang dituju
        data: {id : id, id2 : id2}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        success: function(response){ // Ketika proses pengiriman berhasil

            // set isi dari combobox kota
            // lalu munculkan kembali combobox kotanya
            content.show('visibility');
            $("#data_pegawai").html(response.list);
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
    });
  });
  $('#nip').change(function(){
      var content = $('#box_pegawai');
      var id=$('#nip').val();
      $.ajax({
          type: "POST", // Method pengiriman data bisa dengan GET atau POST
          url: "<?php echo base_url("Jalan/get_data_karyawan"); ?>", // Isi dengan url/path file php yang dituju
          data: {id : id}, // data yang akan dikirim ke file yang dituju
          dataType: "json",
          success: function(response){ // Ketika proses pengiriman berhasil

              // set isi dari combobox kota
              // lalu munculkan kembali combobox kotanya
              content.show('visibility');
              $("#data_pegawai").html(response.list);
          },
          error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
              alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
          }
      });
      $.ajax({
          type: "POST", // Method pengiriman data bisa dengan GET atau POST
          url: "<?php echo base_url("Jalan/get_tujuan"); ?>", // Isi dengan url/path file php yang dituju
          data: {id : id}, // data yang akan dikirim ke file yang dituju
          dataType: "json",
          success: function(response){ // Ketika proses pengiriman berhasil

              // set isi dari combobox kota
              // lalu munculkan kembali combobox kotanya
              $("#tujuan").html(response.list);
          },
          error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
              alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
          }
      });
  });
  $('#tanggal_berangkat').datepicker({
    autoclose: true,
    format: "dd/mm/yyyy"
  });
  $('#tanggal_pulang').datepicker({
    autoclose: true,
    format: "dd/mm/yyyy"
  });

  var ticket = document.getElementById("harga_ticket");
  var hotel  = document.getElementById("harga_permalam");
  var total  = document.getElementById("total");
  ticket.addEventListener("keyup", function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    ticket.value = formatRupiah(this.value, "Rp. ");
  });
  hotel.addEventListener("keyup", function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    hotel.value = formatRupiah(this.value, "Rp. ");
  });
  total.addEventListener("keyup", function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    total.value = formatRupiah(this.value, "Rp. ");
  });

  /* Fungsi formatRupiah */
  function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
      split = number_string.split(","),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
      separator = sisa ? "." : "";
      rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
  }

  $("#tanggal_berangkat_old").on("change", function() {
    var type = $("#tanggal_berangkat_old").attr("name");
    $("#tanggal_berangkat_old").prop('name','tanggal_berangkat');
  });
});
</script>
