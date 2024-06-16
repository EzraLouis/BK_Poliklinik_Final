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
$id_dokter = $_SESSION['id'];

if($akses != 'dokter'){
  echo "<meta http-equiv='refresh' content='0; url=../..'>";
  die();
}

$url = $_SERVER['REQUEST_URI'];
$url = explode("/", $url);
$id = $url[count($url) - 1];
$obat = query("SELECT * FROM obat");

$pasien = query("SELECT pasien.id AS id_pasien,
                        periksa.biaya_periksa AS biaya_periksa,
                        pasien.nama AS nama_pasien,
                        periksa.catatan AS catatan,
                        periksa.tgl_periksa AS tgl_periksa,
                        daftar_poli.id AS id_daftar_poli,
                        daftar_poli.no_antrian AS no_antrian,
                        daftar_poli.keluhan AS keluhan,
                        daftar_poli.status_periksa AS status_periksa
                        FROM pasien
                        INNER JOIN daftar_poli ON pasien.id = daftar_poli.id_pasien
                        INNER JOIN periksa ON daftar_poli.id = periksa.id_daftar_poli
                        WHERE periksa.id = '$id'")[0];

$selected_obat = [];
$detail_periksa = query("SELECT * FROM detail_periksa WHERE id_periksa='" . $id . "'");
foreach($detail_periksa as $dp){
  $selected_obat[] = $dp['id_obat'];
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
  <link rel="stylesheet" href="../../../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../../../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../../../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../../../plugins/summernote/summernote-bs4.min.css">
  <!-- select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../../../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
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
      <img src="../../../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">BK-Poliklinik</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Dokter</a>
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
            <a href="#" class="nav-link">
              <p>
                Jadwal Periksa
                <span class="right badge badge-danger">Dokter</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <p>
                Memeriksa Pasien
                <span class="right badge badge-danger">Dokter</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <p>
                Riwayat Pasien
                <span class="right badge badge-danger">Dokter</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
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
            <h1 class="m-0">Admin</h1>
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
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Edit Periksa Pasien</h3>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <div class="form-group">
                <label for="nama_pasien">Nama Pasien</label>
                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?= $pasien['nama_pasien']; ?>" readonly>
              </div>
              <div class="form-group">
                <label for="tgl_periksa">Tanggal Periksa</label>
                <input type="datetime-local" class="form-control" id="tgl_periksa" name="tgl_periksa" value="<?= $pasien['tgl_periksa'] ?>">
              </div>
              <div class="form-group">
                <label for="catatan">Catatan</label>
                <input type="text" class="form-control" id="catatan" name="catatan" value="<?= $pasien['catatan'] ?>">
              </div>
              <div class="form-group">
                <label for="nama_pasien">Obat</label>
                <select class="form-control" name="obat[]" multiple="multiple" id="id_obat">
                <?php foreach ($obat as $obats) : ?>
                    <option value="<?= $obats['id']; ?>|<?= $obats['harga'] ?>"><?= $obats['nama_obat']; ?> - <?= $obats['kemasan']; ?> - Rp.<?= $obats['harga']; ?></option>
                <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="total_harga">Total Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" readonly value="<?= $pasien['biaya_periksa'] ?>">
              </div>
              <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary" id="simpan_periksa" name="simpan_periksa">
                  <i class="fa fa-save"></i> Simpan
                </button>
              </div>
            </form>
            <?php
              if(isset($_POST['simpan_periksa'])) {
                $biaya_periksa = 150000;
                $total_biaya_obat = 0;
                $tgl_periksa = $_POST['tgl_periksa'];
                $catatan = $_POST['catatan'];
                $obat = $_POST['obat'];
                $id_daftar_poli = $pasien['id_daftar_poli'];
                $id_obat = [];

                for($i = 0; $i < count($obat); $i++){
                  $data_obat = explode("|", $obat[$i]);
                  $id_obat[] = $data_obat[0];
                  $total_biaya_obat += $data_obat[1];
                }
                $total_biaya = $biaya_periksa + $total_biaya_obat;

                $query = "UPDATE periksa SET tgl_periksa = '$tgl_periksa', catatan = '$catatan', biaya_periksa = '$total_biaya' WHERE id_daftar_poli = $id_daftar_poli";
                $result = mysqli_query($conn, $query);

                $query2 = "DELETE FROM detail_periksa WHERE id_periksa = $id";
                $result2 = mysqli_query($conn, $query2);

                $query3 = "INSERT INTO detail_periksa (id_obat, id_periksa) VALUES ";
                for ($i = 0;$i < count($id_obat);$i++){
                  $query3 .= "($id_obat[$i], $id),";
                }
                $query3 = substr($query3, 0, -1);

                $result3 = mysqli_query($conn, $query3);

                if($result && $result2 && $result3){
                  echo "
                  <script>
                  alert('Data berhasil diubah');
                  document.location.href = '../ ';
                  </script>
                  ";
                } else {
                  echo "
                      <script>
                        alert('Gagal diubah');
                        alert('$query');
                        document.location.href = '../edit.php/$id';
                      </script>
                  ";
                }
              }
            ?>
          </div>
        </div>
        <!-- jquery -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
          $(document).ready(function() {
            $('#id_obat').select2();
            $('#id_obat').on('change.select2', function (e) {
              var selectedValuesArray = $(this).val();

              //calculate the sum
              var sum = 150000;
              if (selectedValuesArray) {
                for(var i = 0; i < selectedValuesArray.length; i++){
                  //split the value and get the second part after "|"
                  var parts = selectedValuesArray[i].split("|");
                  if(parts.length === 2) {
                    sum += parseFloat(parts[1]);
                  }
                }
              }
              $('#harga').val(sum);
            });
          });
        </script>
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

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../../../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../../../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../../../plugins/moment/moment.min.js"></script>
<script src="../../../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../../../dist/js/pages/dashboard.js"></script>
</body>
</html>