<?php
include_once("../../../config/conn.php");
session_start();

if(isset($_SESSION['login'])){
  $_SESSION['login'] = true;
} else {
  echo "<meta http-equiv='refresh' content='0; url=../auth/login.php'>";
  die();
}

$nama = $_SESSION['username'];
$akses = $_SESSION['akses'];

if($akses != 'dokter'){
  echo "<meta http-equiv='refresh' content='0; url=../..'>";
  die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Dokter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../../plugins/summernote/summernote-bs4.min.css">
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/BK_Poliklinik/pages/auth/logout.php" class="nav-link">Logout</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
        </a>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">BK-Poliklinik</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
              <p>
                Dashboard
                <span class="right badge badge-danger">Dokter</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/BK_Poliklinik/pages/dokter/jadwal_periksa" class="nav-link">
              <p>
                Jadwal Periksa
                <span class="right badge badge-danger">Dokter</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/BK_Poliklinik/pages/dokter/memeriksa_pasien" class="nav-link">
              <p>
                Memeriksa Pasien
                <span class="right badge badge-danger">Dokter</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/BK_Poliklinik/pages/dokter/riwayat_pasien" class="nav-link">
              <p>
                Riwayat Pasien
                <span class="right badge badge-danger">Dokter</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/BK_Poliklinik/pages/dokter/profil" class="nav-link">
              <p>
                Profil
                <span class="right badge badge-danger">Dokter</span>
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Riwayat Periksa Pasien</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="card-header">
          <h3 class="card-title">Daftar Riwayat Pasien</h3>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Alamat</th>
                <th>No. KTP</th>
                <th>No. Telepon</th>
                <th>No. RM</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php
              // Definisikan fungsi formatRupiah
              function formatRupiah($angka)
              {
                  return 'Rp ' . number_format($angka, 0, ',', '.');
              }
            ?>
            <tbody>
              <?php
              $index = 1;
              $data = $pdo->query("SELECT * FROM pasien");
              if($data === false || $data->rowCount() == 0) {
                echo "<tr><td colspan='7' align='center'>Tidak ada data</td></tr>";
              } else {
                while($d = $data->fetch()){
              ?>
                  <tr>
                    <td><?= $index++; ?></td>
                    <td><?= $d['nama']; ?></td>
                    <td><?= $d['alamat']; ?></td>
                    <td><?= $d['no_ktp']; ?></td>
                    <td><?= $d['no_hp']; ?></td>
                    <td><?= $d['no_rm']; ?></td>
                    <td>
                      <button type="button" data-toggle="modal" data-target="#detailModal<?= $d['id'] ?>" class="btn btn-info btn-sm">Detail Riwayat Periksa</button>
                    </td>
                  </tr>
                  <!-- Modal Detail Riwayat Periksa start here -->
                  <?php
                  $no = 1;
                  $pasien_id = $d['id'];
                  $data2 = $pdo->query("SELECT
                                        p.nama AS 'nama_pasien',
                                        pr.*,
                                        d.nama AS 'nama_dokter',
                                        dpo.keluhan AS 'keluhan',
                                        GROUP_CONCAT(o.nama_obat SEPARATOR ', ') AS 'obat'
                                        FROM periksa pr
                                        LEFT JOIN daftar_poli dpo ON (pr.id_daftar_poli = dpo.id)
                                        LEFT JOIN jadwal_periksa jp ON (dpo.id_jadwal = jp.id)
                                        LEFT JOIN dokter d ON (jp.id_dokter = d.id)
                                        LEFT JOIN pasien p ON (dpo.id_pasien = p.id)
                                        LEFT JOIN detail_periksa dp ON (pr.id = dp.id_periksa)
                                        LEFT JOIN obat o ON (dp.id_obat = o.id)
                                        WHERE dpo.id_pasien = '$pasien_id'
                                        GROUP BY pr.id
                                        ORDER BY pr.tgl_periksa DESC;");
                  ?>
                  <div class="modal fade" id="detailModal<?= $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalScrollableTitle">Riwayat <?= $d['nama'] ?></h5>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <!-- Mulai Label  -->
                          <?php if($data2->rowCount() == 0) : ?>
                            <h5>Tidak Ditemukan Riwayat Periksa</h5>
                          <?php else : ?>
                            <div class="container">
                              <div class="row justify-content-md-center">
                                <span class="col-sm">No</span>
                                <span class="col-sm-2">Tanggal Periksa</span>
                                <span class="col-sm">Nama Pasien</span>
                                <span class="col-sm">Nama Dokter</span>
                                <span class="col-sm">Keluhan</span>
                                <span class="col-sm">Catatan</span>
                                <span class="col-sm">Obat</span>
                                <span class="col-sm">Biaya Periksa</span>
                                <span class="w-100"></span>
                            <div>
                            <div class="container">
                              <div class="row align-items-center" >
                                <?php while ($da = $data2->fetch()) : ?>
                                  <span class="col-sm"><?= $no++; ?></span>
                                  <span class="col-sm-2"><?= $da['tgl_periksa']; ?></span>
                                  <span class="col-sm"><?= $da['nama_pasien']; ?></span>
                                  <span class="col-sm"><?= $da['nama_dokter']; ?></span>
                                  <span class="col-sm"><?= $da['keluhan']; ?></span>
                                  <span class="col-sm"><?= $da['catatan']; ?></span>
                                  <span class="col-sm"><?= $da['obat']; ?></span>
                                  <span class="col-sm"><?= formatRupiah($da['biaya_periksa']); ?></span>
                                  <span class="w-100"></span>
                                <?php endwhile ?>
                              </div>
                            </div>
                          <?php $no = 1; ?>
                        </div>
                      </div>
                    <?php endif ?>
                            <!-- Akhir dari Tabel  -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                  <?php } ?>
            </tbody>
          </table>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery UI 1.11.4 -->
<script src="../../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- ChartJS -->
<script src="../../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../../plugins/moment/moment.min.js"></script>
<script src="../../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../../dist/js/pages/dashboard.js"></script>

</body>
</html>
