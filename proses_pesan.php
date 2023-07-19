<?php
$koneksi = mysqli_connect("localhost", "root", "", "bioskop");

if (mysqli_connect_errno()) {
  echo "Koneksi database gagal: " . mysqli_connect_error();
  exit();
}

$film_id = $_POST['film'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$jumlah_tiket = $_POST['jumlah_tiket'];

$query = "SELECT * FROM films WHERE film_id = $film_id";
$result = mysqli_query($koneksi, $query);
$film = mysqli_fetch_assoc($result);

$total_harga = $jumlah_tiket * 10000;

$query = "INSERT INTO pesanan (film_id, nama, email, jumlah_tiket, total_harga) VALUES ($film_id, '$nama', '$email', $jumlah_tiket, $total_harga)";
mysqli_query($koneksi, $query);

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Proses Pesan Tiket</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <nav>
    <ul>
      <li><a href="index.php">Halaman Utama</a></li>
      <li><a href="pesan.php">Pesan Tiket</a></li>
      <li><a href="tampil_pesanan.php">Tampilkan Pesanan</a></li>
      <li><a href="cetak_tiket.php">Cetak Tiket</a></li>
    </ul>
  </nav>
</head>
<body>
  <h1>Pesanan Tiket Berhasil</h1>

  <h2>Detail Pesanan</h2>
  <p>Film: <?php echo $film['judul']; ?></p>
  <p>Nama: <?php echo $nama; ?></p>
  <p>Email: <?php echo $email; ?></p>
  <p>Jumlah Tiket: <?php echo $jumlah_tiket; ?></p>
  <p>Total Harga: <?php echo $total_harga; ?></p>

  <footer>
  <p>bioskop &copy; kelompok 3</p>
  </footer>
</body>
</html>
