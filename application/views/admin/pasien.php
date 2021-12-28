<!--
=========================================================
* Material Dashboard 2 - v3.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-warning shadow-info border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Berikut adalah data pasien yang sudah mendaftar.
                <button class="btn btn-success " style="margin-right: 20px; float: right;" onclick="add()"><i class="fa fa-plus"></i> Tambah</button></h6> 
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0 table-bordered" id="datatable1">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nomor</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Pasien</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Hp</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Alamat</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aksi</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->

</body>

<div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Pasien</h5>
        <button type="button" class="close" onclick="tutup()" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="formTambah">
        
        <input type="text" name="id_pasien" id="id_pasien" hidden="">
        <input type="text" name="kode" id="kode" hidden="">
        <label class="label">NIK:</label>
        <input type="text" name="nik" id="nik" placeholder="Masukan NIK" class="form-control">
        <br>
        <label class="label">Nama:</label>
        <input type="text" name="nama_pasien" id="nama_pasien" placeholder="Masukan Nama Pasien" class="form-control">
        <br>
        <label class="label">Telp. :</label>
        <input type="text" name="hp" id="hp" placeholder="Masukan Telp." class="form-control">
        <br>
        <label class="label">Alamat:</label>
        <input type="text" name="alamat" id="alamat" placeholder="Masukan Alamat" class="form-control">
        <br>
      </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="tutup()">Close</button>
        <button type="button" class="btn btn-primary" onclick="tambah()">Simpan</button>
      </div>
    </div>
  </div>
</div>

</html>
  <script src="<?=base_url()?>/assets/js/jquery.min.js"></script>


<script type="text/javascript">
   var tabel = '<?=$tabel?>';
    var breadcrumb = '<?=$breadcrumb?>';
    var log = '';
    var logs = '';

    $(function() {
            'use strict';

            $('#datatable1').DataTable({
         
          responsive: false,
          processing: true, 
          serverSide: true,
          stateSave: false,
          bAutoWidth: false,
          language: {
            searchPlaceholder: 'Pencarian '+breadcrumb+'...',
            sSearch: '',
            sInfoFiltered: "(difilter dari _MAX_ total data)", 
            sInfoEmpty: "Menampilkan 0 s/d 0 dari <b>_TOTAL_ data</b> ",
            sZeroRecords: "Pencarian tidak ditemukan", 
            sEmptyTable: "Data kosong", 
            lengthMenu: '_MENU_ Data '+breadcrumb+'  Per Halaman    ',
            sInfo: "Menampilkan _START_ s/d _END_ dari <b>_TOTAL_ data</b>",
            oPaginate: {
              "sPrevious": "Prev",
              "sNext": "Next"
            }
          },
  

           ajax:{
            url: base+"tabel/"+tabel,
            type: "GET",
            error: function(){ 

            }
          } 
          
        });
    });

function add(){
  $("#kode").val('0');
  $('#Modal1').modal('show');

}

    function edit(id) {
         $('#formTambah')[0].reset();
       

        $.ajax({
           url: base+"ambil/get_pasien/"+id,
            type: "GET",
            dataType: "JSON",
            success: function (json) {
                $('#id_pasien').val(id);
                $('#nik').val(json.nik);
                $('#nama_pasien').val(json.nama_pasien);
                $('#hp').val(json.hp);
                $('#alamat').val(json.alamat);
                $("#kode").val('1');
                $('#Modal1').modal('show');

            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function tutup(){
       $('#Modal1').modal('toggle');

    }

      function tambah() {
        var kode = $("#kode").val();
        if (kode == 0) {
            var url = base + 'tambah/pasien';
       }else{
            var url = base + 'edit/pasien';

       }
        $.ajax({
            url: url,
            type: 'POST',
            data: $('#formTambah').serialize(),
            dataType: 'JSON',
            success: function (json) {
                if (json.status == 1) {
                    swal({
                        title: "Berhasil!",
                        text: "Simpan Data sukses!",
                        icon: "success",
                        button: "Oke",
                    });
                    $('#datatable1').DataTable().ajax.reload(null, false);
                
                    $('#myModal').modal('toggle');



                } else {
                    $('#error-message').html(json.pesan);
                    $("#error-message").fadeIn('fast').show().delay(6000).fadeOut('fast');

                    $('#csrfs_upload').attr('value', json.csrfHash);


                }
            }
        });
    }



        function deletes(id) {

        swal("Anda yakin akan menghapus data?", {
                icon: "warning",
                buttons: {

                    cancel: "Tidak",
                    catch: {
                        text: "Ya",
                        value: "catch",
                    }
                },
            })
            .then((value) => {
                switch (value) {



                    case "catch":
                        var token = $('input[name="<?php echo $this->security->get_csrf_token_name(); ?>"]').attr(
                            '<?php echo $this->security->get_csrf_hash(); ?>')
                        $.ajaxSetup({
                            beforeSend: function (xhr) {
                                xhr.setRequestHeader('Csrf-Token', token);
                            }
                        });
                        $.ajax({
                            url: base + '/hapus/pasien/' + id,
                            type: "GET",
                            dataType: "JSON",
                            success: function (data) {
                                swal({
                                    title: "Sukses",
                                    icon: "success",
                                    text: "Data anda sudah terhapus",
                                    type: "success",
                                    timer: 2000
                                });
                                $('#datatable1').DataTable().ajax.reload(null, false);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                swal('Error deleting data');
                            }
                        });
                        break;

                    default:
                        swal("Gagal hapus data");
                }
            });


    }

</script>