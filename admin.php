<!DOCTYPE html>
<html>
<head>
  <title>Website Bioskop</title>
  <link rel="stylesheet" type="text/css" href="css/style_index.css">
</head>
<body>
  <header>
    <h1>Selamat datang di Website Bioskop</h1>
  </header>

  <nav>
    <ul>
      <li><a href="admin.php">Halaman Utama</a></li>
      <li><a href="booking_admin.php">tampilkan pesanan</a></li>
      <li><a href="cetak_tiket_admin.php">Cetak Tiket</a></li>
      <li><a href="index.php">Log Out</a></li>
    </ul>
  
  <section class="hero">
    <div class="hero-content">
      <h2>Nikmati Film-film Terbaik</h2>
      <p>Temukan pengalaman menonton yang tak terlupakan</p>
      <a href="pesan.php" class="button">Pesan Tiket</a>
    </div>
  </section>

  <section class="film-list">
    <h2>Film Terbaru</h2>
    <div class="grid-container">
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
          echo "<img src='data:image/jpeg;base64," . base64_encode($row['cover_image']) . "' alt='Cover Film'>";
          echo "<h3>" . $row['judul'] . "</h3>";
          echo "<p>" . $row['sinopsis'] . "</p>";
          echo "<a href='pesan.php' class='button'>Pesan Tiket</a>";
          echo "</div>";
        }
        mysqli_close($koneksi);
      ?>
    </div>
  </section>

  <footer>
    <p>bioskop &copy; kelompok 3</p>
  </footer>
</body>
</html>
