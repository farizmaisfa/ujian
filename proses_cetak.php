<?php
$koneksi = mysqli_connect("localhost", "root", "", "bioskop");

if (mysqli_connect_errno()) {
  echo "Koneksi database gagal: " . mysqli_connect_error();
  exit();
}

$pesanan_id = $_POST['pesanan'];
$query = "SELECT * FROM pesanan WHERE pesanan_id = $pesanan_id";
$result = mysqli_query($koneksi, $query);
$pesanan = mysqli_fetch_assoc($result);

$query = "SELECT * FROM films WHERE film_id = " . $pesanan['film_id'];
$result = mysqli_query($koneksi, $query);
$film = mysqli_fetch_assoc($result);
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Proses Cetak Tiket</title>
  <link rel="stylesheet" type="text/css" href="css/style_index.css">
  <style>
    .ticket {
      border: 1px solid #000;
      padding: 10px;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <header>
    <h1>Tiket Pesanan</h1>
  </header>
 

  <div class="ticket">
    <h2><?php echo $film['judul']; ?></h2>
    <p>Sinopsis: <?php echo $film['sinopsis']; ?></p>
    <p>Genre: <?php echo $film['genre']; ?></p>
    <p>Durasi: <?php echo $film['durasi']; ?> menit</p>
    <p>Tahun Rilis: <?php echo $film['tahun_rilis']; ?></p>
    <p>Jumlah Tiket: <?php echo $pesanan['jumlah_tiket']; ?></p>
    <p>Total Harga: <?php echo $pesanan['total_harga']; ?></p>
  </div>

  <button onclick="window.print()">Cetak Tiket</button>

  <footer>
  <p>bioskop &copy; kelompok 3</p>
  </footer>
</body>
</html>
