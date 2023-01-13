<?php
//memanggil modul fungsi
require('functions.php');
session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
  }
//ambil data dari URL
$getnpm = $_GET["npm"];
//ambil data mahasiswa
$mhs = query("SELECT * FROM tbl_mahasiswa WHERE npm='$getnpm'")[0];
    //cek apakah tombol submit sudah ditekan apa belum
    if(isset($_POST["submit"])) {

        //menjalankan fungsi update
        if(updatee($_POST)>0) {
        echo "
            <script>
            alert('Data Berhasil Diupdate');
            document.location.href='index.php';
            </script>
            ";
        }else{
            echo "
            <script>
            alert('Data Gagal Diupdate');
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
  <title>Admin | Update Data</title>
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
            <h1>Edit Data Mahasiswa</h1>
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
			  <?php 
					$id = $_GET['npm'];
					$sql = mysqli_query($conn,"SELECT * FROM tbl_mahasiswa WHERE npm='$id'");
					$data = mysqli_fetch_array($sql);
				?>
              <form role="form" action="" method="POST" enctype="multipart/form-data">
			  <input type="hidden" name="npm" value="<?php echo $data['npm'] ?>" required>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">NPM</label>
                    <input type="text" name="npm" class="form-control" value="<?php echo $data['npm'] ?>" required>
                  </div>
				  
				  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo $data['nama'] ?>" required>
                  </div>
				  
				  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $data['email'] ?>" required>
                  </div>
				  
				  <div class="form-group">
                    <label for="exampleInputEmail1">Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" value="<?php echo $data['jurusan'] ?>">
                  </div>
				  
				  <div class="form-group">
                    <label for="exampleInputEmail1">Gambar</label>
                    <input type="text" name="gambar" class="form-control" value="<?php echo $data['gambar'] ?>" required>
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
