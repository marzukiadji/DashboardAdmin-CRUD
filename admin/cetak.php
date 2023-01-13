<?php
require_once __DIR__ . '/vendor/autoload.php';

require('functions.php');
$mahasiswa = query('SELECT * FROM `tbl_mahasiswa` ORDER BY `tbl_mahasiswa`.`nama` ASC');

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
        <html>
        <head>
            <title>Daftar Mahasiswa</title>
        </head>
        <body>
        <h1 style="text-align:center;">Daftar Mahasiswa</h1>
        
        <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Gambar</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>';

$i = 1;
foreach($mahasiswa as $mhs) {
    $html .= '<tr>
    <td>' . $i++ . ' </td>
    <td> <img src="img/' . $mhs["gambar"] . '" width="50"></td>
    <td>' . $mhs["npm"] . '</td>
    <td>' . $mhs["nama"] . '</td>
    <td>' . $mhs["email"] . '</td>
    <td>' . $mhs["jurusan"] . '</td>
    </tr>';
}

$html .= '
            </table>
            </body>
            </html>';

$mpdf->WriteHTML($html);
// $mpdf->Output('Daftar-Mahasiswa.pdf',\Mpdf\Output\Destination::INLINE);
// $mpdf->Output('Daftar-Mahasiswa.pdf', 'I');
// $mpdf->Output('Daftar-Mahasiswa.pdf',\Mpdf\Output\Destination::DOWNLOAD);
// $mpdf->Output('Daftar-Mahasiswa.pdf', 'D');
$mpdf->Output('Daftar-Mahasiswa.pdf', 'I');
?>