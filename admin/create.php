<?php 
//memanggil modul fungsi dengan cara require atau include
require('functions.php');

session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
}

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])){

    //menjalankan fungsi tambah sekalian cek return sukses tambah atau tidak
    if (create($_POST)>0) {
        echo "
        <script>
        alert('Data Berhasil Ditambahkan');
        document.location.href='index.php';
        </script>
        ";
    }else {
        echo "
        <script>
        alert('Data Gagal Ditambahkan';
        document.location.href='index.php';
        </script>
        ";
        echo mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Admin | Create New Data</title>
	<?php include 'header.php' ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <?php include 'nav.php' ?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php include 'sidebar.php' ?>

  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Mahasiswa</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-8">
            
            <div class="card">
              <div class="card-header">
               <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Inputkan Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">NPM</label>
                    <input type="text" name="npm" class="form-control" placeholder="Enter NIM" required>
                  </div>
				  
				  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Enter Nama" required>
                  </div>
				  
				  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter Email" required>
                  </div>
				  
				  <div class="form-group">
                    <label for="exampleInputEmail1">Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" placeholder="Enter Jurusan" required>
                  </div>

				  <div class="form-group">
                    <label for="exampleInputEmail1">Gambar</label>
                    <input type="text" name="gambar" class="form-control" placeholder="Gambar">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
              </form>
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
  <footer class="main-footer">
	<?php include 'footer.php' ?>
  </footer>

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
  $(function () {
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
             function konfirmasi()
             {
             tanya = confirm("Anda Yakin Akan Logout ?");
             if (tanya == true) return true;
             else return false;
             }
        </script>
</body>
</html>
