<?php
$koneksi = mysqli_connect("localhost", "root", "", "bioskop");
if (mysqli_connect_errno()) {
  echo "Koneksi database gagal: " . mysqli_connect_error();
  exit();
}

$pesanan_id = $_POST['pesanan_id'];
$film_id = $_POST['film'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$jumlah_tiket = $_POST['jumlah_tiket'];

$query = "UPDATE pesanan SET film_id = $film_id, nama = '$nama', email = '$email', jumlah_tiket = $jumlah_tiket WHERE pesanan_id = $pesanan_id";
mysqli_query($koneksi, $query);

mysqli_close($koneksi);

header("Location: booking_admin.php");
exit();
?>
