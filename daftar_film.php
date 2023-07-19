<!DOCTYPE html>
<html>
<head>
  <title>Daftar Film</title>
  <style>
    .film-container {
      display: flex;
      flex-wrap: wrap;
    }

    .film-card {
      width: 200px;
      margin: 10px;
      padding: 10px;
      border: 1px solid #ccc;
      text-align: center;
    }

    .film-image {
      max-width: 100%;
      height: auto;
    }
  </style>
  
</head>
<body>
  <h1>Daftar Film Tersedia</h1>
  <nav>
    <ul>
      <li><a href="index.php">Halaman Utama</a></li>
      <li><a href="pesan.php">Pesan Tiket</a></li>
      <li><a href="tampil_pesanan.php">Tampilkan Pesanan</a></li>
      <li><a href="cetak_tiket.php">Cetak Tiket</a></li>
    </ul>
  </nav>

  <div class="film-container">
    <?php
    $koneksi = mysqli_connect("localhost", "root", "", "bioskop");
    if (mysqli_connect_errno()) {
      echo "Koneksi database gagal: " . mysqli_connect_error();
      exit();
    }
    $query = "SELECT * FROM films";
    $result = mysqli_query($koneksi, $query);
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<div class='film-card'>";
      echo "<img class='film-image' src='data:image/jpeg;base64," . base64_encode($row['cover_image']) . "' alt='Cover Film'>";
      echo "<h2>" . $row['judul'] . "</h2>";
      echo "<p>" . $row['sinopsis'] . "</p>";
      echo "<p>Genre: " . $row['genre'] . "</p>";
      echo "<p>Durasi: " . $row['durasi'] . " menit</p>";
      echo "<p>Tahun Rilis: " . $row['tahun_rilis'] . "</p>";
      echo "</div>";
    }
    mysqli_close($koneksi);
    ?>
  </div>
</body>
</html>
