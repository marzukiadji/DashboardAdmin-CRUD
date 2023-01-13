<?php
  require ('functions.php');
  $mahasiswa = query("SELECT * FROM `tbl_mahasiswa` ORDER BY `tbl_mahasiswa`.`nama` ASC");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Admin | Data Mahasiswa</title> <?php include 'header.php' ?>
  <?php 
    session_start();
    if($_SESSION['status']!="login"){
      header("location:../index.php?pesan=belum_login");
    }
  ?>
  </head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light"> <?php include 'nav.php' ?> </nav>
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4"> <?php include 'sidebar.php' ?> </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Data Mahasiswa</h1>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <a href="create.php">
                      <button type="submit" class="btn btn-primary">Tambah</button>
                      <a>
                        <a href="cetak.php">
                          <button type="submit" class="btn btn-primary">Print</button>
                          <a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Gambar</th>
                          <th>NPM</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Jurusan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody> <?php $i = 1; ?> <?php foreach ($mahasiswa as $mhs): ?> <tr>
                          <td> <?= $i; ?> </td>
                          <td>
                            <img src="img/
																			<?= $mhs["gambar"]; ?>" width="50">
                          </td>
                          <td> <?= $mhs["npm"]; ?> </td>
                          <td> <?= $mhs["nama"]; ?> </td>
                          <td> <?= $mhs["email"]; ?> </td>
                          <td> <?= $mhs["jurusan"]; ?> </td>
                          <td class="aksi">
                            <a href="update.php?npm=
																				<?= $mhs["npm"]; ?>">Update </a>
                            <a href="delete.php?npm=
																				<?= $mhs["npm"]; ?>" onclick="return confirm('Apakah Anda Yakin menghapus Data Ini?');">Delete </a>
                          </td>
                        </tr>
                      </tbody> <?php $i++; ?> <?php endforeach; ?>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer"> <?php include 'footer.php' ?> </footer>
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function() {
        $("#example1").DataTable({
          "responsive": true,
          "autoWidth": false,
        });
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>
    <script type="text/javascript" language="JavaScript">
      function konfirmasi() {
        tanya = confirm("Anda Yakin Akan Logout ?");
        if (tanya == true) return true;
        else return false;
      }
    </script>
  </body>
</html>