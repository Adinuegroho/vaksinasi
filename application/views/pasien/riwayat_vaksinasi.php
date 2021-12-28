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
<div class="container-fluid px-2 px-md-4">
  <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('<?=base_url()?>/assets/pics/vacc.jpg');">
    <span class="mask  bg-gradient-info  opacity-6"></span>
  </div>
  <div class="card card-body mx-3 mx-md-4 mt-n6">
    <div class="row gx-4 mb-2">
      <div class="col-auto">
        <div class="avatar avatar-xl position-relative">
          <img src="<?=base_url()?>/assets/pics/user.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
        </div>
      </div>
      <div class="col-auto my-auto">
        <div class="h-100">
          <h5 class="mb-1">
            <?php echo $this->session->userdata('nama_pasien'); ?>
          </h5>
          <p class="mb-0 font-weight-normal text-sm">
           <?php echo $this->session->userdata('nik'); ?>
         </p>
       </div>
     </div>
     <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
      <div class="nav-wrapper position-relative end-0">
  
      </div>
    </div>
  </div>
  <div class="row">

    <div class="col-12 col-xl-4">
      <div class="card card-plain h-100 " style="box-shadow: 0 0 5px silver;" >
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-md-8 d-flex align-items-center">
              <h6 class="mb-0">Informasi Profil</h6>
            </div>
            <div class="col-md-4 text-end">

            </div>
          </div>
        </div>
        <div class="card-body p-3">

          <ul class="list-group">
            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nama:</strong> &nbsp; <?=$this->session->userdata('nama_pasien')?></li>
            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">NIK:</strong> &nbsp; <?=$this->session->userdata('nik')?></li>
            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">No. Telp:</strong> &nbsp; <?=$this->session->userdata('hp')?></li>
            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Alamat:</strong> &nbsp; <?=$this->session->userdata('alamat')?></li>
          </ul>
        </div>
      </div>

    </div>

    <div class="col-12 col-xl-8">
      <div class="card card-plain h-100 " style="box-shadow: 0 0 5px silver; padding: 10px;" >

    <div class="row">
    <div class="col-md-8 d-flex align-items-center">
              <h6 class="mb-0">Riwayat Vaksinasi</h6>
            </div>
            <br>

<?php foreach ($pilihan_vaksinasi as $p) {
  # code...
 
 ?>
      <div class="col-xl-6 col-sm-6 mb-xl-0 mb-10" > 
        <div class="card" style="margin-bottom: 20px; margin-top: 20px; box-shadow: 0 0 5px silver;">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-dark text-center border-radius-xl mt-n4 position-absolute">
              <i class="fa fa-user"></i>
             
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">No. Pendaftaran : </p>
              <h4 class="mb-0"><?=$p->nomor_antrian?></h4>
              <p class="text-sm mb-0 text-capitalize"><i> Jenis Vaksin :  <?=$p->nama_vaksin?> , <?=$p->tanggal?></i></p>

            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0">Status : <span class="badge badge-sm <?php if($p->status == 'Terdaftar'){echo 'bg-gradient-warning';}else{ echo 'bg-gradient-success';} ?>"><?=$p->status?></span></p>
          </div>
        </div>
      </div>
<?php 

foreach($count as $c) { 
if ($c->count < 2) {
  # code...

  ?>

 <div class="col-xl-6 col-sm-6 mb-xl-0 mb-10" > 
        <div class="card bg-gradient-warning text-white" style="margin-bottom: 20px; margin-top: 20px; box-shadow: 0 0 5px silver;">
          <div class="card-header bg-gradient-warning text-white  p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-danger shadow-dark text-center border-radius-xl mt-n4 position-absolute">
               <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Vaksin berikutnya tanggal : </p>
              <h4 class="mb-0 text-white"><?=date('d-m-Y',strtotime("+3 months", strtotime($p->tanggal)))?></h4>

            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
           Silahkan datang kembali pada tanggal tersebut
          </div>
        </div>
      </div>


  <?php
  }
 }

 ?>

<?php } ?>



      </div>
      </div>

    </div>

  </div>


</div>
</div>
</div>
<footer class="footer py-4  ">
  <div class="container-fluid">
    <div class="row align-items-center justify-content-lg-between">
      <div class="col-lg-6 mb-lg-0 mb-4">

      </div>
      <div class="col-lg-6">
        <ul class="nav nav-footer justify-content-center justify-content-lg-end">

        </ul>
      </div>
    </div>
  </div>
</footer>