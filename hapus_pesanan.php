<?php
$koneksi = mysqli_connect("localhost", "root", "", "bioskop");
if (mysqli_connect_errno()) {
  echo "Koneksi database gagal: " . mysqli_connect_error();
  exit();
}

$pesanan_id = $_GET['pesanan_id'];
$query = "DELETE FROM pesanan WHERE pesanan_id = $pesanan_id";
mysqli_query($koneksi, $query);
mysqli_close($koneksi);
header("Location: booking_admin.php");
exit();
?>
