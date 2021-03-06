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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>
    Material Dashboard 2 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="<?=base_url()?>/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?=base_url()?>/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="<?=base_url()?>/assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/datatable/dataTables.bootstrap4.css" rel="stylesheet">

</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="<?=base_url()?>/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Administrator Vaksinasi</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-200" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white  <?php if ($konten=='dashboard') { echo 'bg-gradient-warning';} ?>" href="<?=base_url()?>admin/dashboard">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php if ($konten=='pasien') { echo 'bg-gradient-warning';} ?>" href="<?=base_url()?>admin/pasien">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Pasien</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php if ($konten=='jadwal_vaksinasi') { echo 'bg-gradient-warning';} ?>" href="<?=base_url()?>admin/jadwal_vaksinasi">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Jadwal Vaksinasi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php if ($konten=='pilihan_vaksinasi') { echo 'bg-gradient-warning';} ?>" href="<?=base_url()?>admin/pilihan_vaksinasi">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Pilihan Vaksinasi</span>
          </a>
        </li>
          <li class="nav-item">
          <a class="nav-link text-white <?php if ($konten=='jenis_vaksin') { echo 'bg-gradient-warning';} ?>" href="<?=base_url()?>admin/jenis_vaksin">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Jenis Vaksin</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white " href="<?=base_url()?>/masukadmin/logout">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-sign-out"></i>
            </div>
            <span class="nav-link-text ms-1">Logout</span></a>
          
        </li>
      
  
       
      </ul>
    </div>

  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true" style="background-color: white; margin-top: 10px;">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><?php echo $breadcrumb; ?></li>
          </ol>
          <h6 class="font-weight-bolder mb-0"><?php echo $breadcrumb; ?></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="<?=base_url()?>/masukadmin/logout" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">logout</span>
              </a>
            </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
       <?php include("admin/$konten.php") ?>

     
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="<?=base_url()?>/assets/js/core/popper.min.js"></script>
  <script src="<?=base_url()?>/assets/js/core/bootstrap.min.js"></script>
  <script src="<?=base_url()?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?=base_url()?>/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="<?=base_url()?>/assets/js/plugins/chartjs.min.js"></script>
  <script src="<?=base_url()?>/assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/datatable/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>/assets/datatable/custom-datatable.js"></script>
<script src="<?php echo base_url() ?>/assets/datatable/datatable-basic.init.js"></script>

    <script src="<?=base_url()?>/assets/sweetalert-master/docs/assets/sweetalert/sweetalert.min.js"></script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->m

</body>

</html>

<script type="text/javascript">
  var base = '<?=base_url()?>';
</script>