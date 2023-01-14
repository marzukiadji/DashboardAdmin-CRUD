<?php 
//Koneksi Ke Database
$conn = mysqli_connect("localhost","root","","db_kampus");

function query($sql){
    global $conn;
    //Ambil data dari tabel mahasiswa / query data mahasiswa
    $result = mysqli_query($conn, $sql);
    $rows = [];

    if (!$result){
        echo mysqli_error($conn);
    }

// Ambil data mahasiswa dari object Result
//mysqli_fetch_row() -- mengembalikan array numerik
//mysqli_fetch_assoc() -- menegembalikan array assosiative
//mysqli_fetch_array() -- mengembalikan array keduanya
//mysqli_fetch_onject() -- mengembalikan array assosiative

while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
}
    return $rows;
}
function create($data){
    global $conn;
        //ambil data dari tiap elemen dalam form
        $npm = htmlspecialchars($data["npm"]);
        $nama = $data["nama"];
        $email = $data["email"];
        $jurusan = $data["jurusan"];
        $gambar = $data["gambar"];
        //query insert data
        $sql = "INSERT INTO tbl_mahasiswa (npm,nama,email,jurusan,gambar)
        VALUES
        ('$npm','$nama','$email','$jurusan','$gambar')";
    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);


}
function updatee($data){
    global $conn;
    //ambil data dari tiap elemen dalam form
    $npm = htmlspecialchars($data["npm"]);
    $nama = $data["nama"];
    $email = $data["email"];
    $jurusan = $data["jurusan"];
    $gambar = $data["gambar"];

    //query update data
    $sql = "UPDATE tbl_mahasiswa SET
    nama='$nama',
    email='$email',
    jurusan='$jurusan',
    gambar='$gambar'
    WHERE npm='$npm'
    ";

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}
function deleted($npm){
    global $conn;

    $sql = "DELETE FROM tbl_mahasiswa WHERE npm=$npm";

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}

function registrasi($data){
    global $conn;
    //ambil data dari tiap elemen form
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username sudah ada apa belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username='$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
        alert('Username Sudah Terdaftar');
        </script>";
        return false;
    }

    //cek konfirmasi password
    if($password !== $password2) {
        echo "<script>
        alert('Konfirmasi Password Tidak Sesuai');
        </script>";
        return false;
    }
    //enkripsi password
    $password = md5($password);

    //query insert data
    $sql = "INSERT INTO user (username,password) VALUES ('$username','$password')";
    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);

}

?>