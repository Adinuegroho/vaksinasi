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
    
      <div class="row mt-4">
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
             <a href="<?=base_url()?>pasien/jadwal_vaksinasi">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-info shadow-primary border-radius-lg py-3 pe-1">
                <div class="chart" style="color: white;text-align: center;">
                <img src="<?=base_url()?>/assets/icons/schedule.png" style="width: 130px; height: 130px;">
                  
                </div>
              </div>
            </div>
            
            <div class="card-body">
       
              <h6 class="mb-0 ">Jadwal Vaksinasi</h6>
              <p class="text-sm ">Ketahui Jadwal Vaksin Yang Tepat Untuk Anda</p>
              <hr class="dark horizontal">
              <div class="d-flex ">
              </div>
            </div>
          </div>
           </a>
        </div>
       


        <div class="col-lg-4 col-md-6 mt-4 mb-4">
             <a href="<?=base_url()?>pasien/riwayat_vaksinasi">

          <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                <div class="chart" style="color: white;text-align: center;">
                 <img src="<?=base_url()?>/assets/icons/review.png" style="width: 130px; height: 130px;">
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 "> Riwayat Vaksin </h6>
              <p class="text-sm "> Halaman Untuk Mengetahui Riwayat Vaksinasi Anda </p>
              <hr class="dark horizontal">
          
            </div>
          </div>
          </a>
        </div>


        <div class="col-lg-4 mt-4 mb-3">
             <a href="<?=base_url()?>pasien/jenis_vaksin">

          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-warning shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart" style="color: white;text-align: center;">
                  <img src="<?=base_url()?>/assets/icons/vaccine.png" style="width: 130px; height: 130px;">
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Jenis Vaksin</h6>
              <p class="text-sm ">Ketahui Jenis Vaksin yang cocok untuk anda gunakan</p>
              <hr class="dark horizontal">
             
            </div>
          </div>
        </div>
        </a>
      </div>
      
  <!--   Core JS Files   -->
  <script src="<?=base_url()?>/assets/js/core/popper.min.js"></script>
  <script src="<?=base_url()?>/assets/js/core/bootstrap.min.js"></script>
  <script src="<?=base_url()?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?=base_url()?>/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="<?=base_url()?>/assets/js/plugins/chartjs.min.js"></script>
  
  <script src="<?=base_url()?>/assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>