<!DOCTYPE html>
<html>
<head>
  <title>Pesan Tiket</title>
  <link rel="stylesheet" type="text/css" href="css/style_index.css">
</head>
<body>
  <header>
  <h1>Pesan Tiket</h1>
  </header>
  
  <nav>
    <ul>
      <li><a href="index.php">Halaman Utama</a></li>
      <li><a href="daftar_film.php">Daftar Film</a></li>
      <li><a href="pesan.php">Pesan Tiket</a></li>
      <li><a href="tampil_pesanan.php">Tampilkan Pesanan</a></li>
      <li><a href="cetak_tiket.php">Cetak Tiket</a></li>
      <li><a href="login.php">login admin</a></li>
    </ul>
  </nav>

  <form action="proses_pesan.php" method="POST">
    <label for="film">Film:</label>
    <select name="film" id="film">
      <?php
        $koneksi = mysqli_connect("localhost", "root", "", "bioskop");

        if (mysqli_connect_errno()) {
          echo "Koneksi database gagal: " . mysqli_connect_error();
          exit();
        }

        $query = "SELECT film_id, judul FROM films";
        $result = mysqli_query($koneksi, $query);
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<option value='" . $row['film_id'] . "'>" . $row['judul'] . "</option>";
        }
        mysqli_close($koneksi);
      ?>
    </select><br><br>

    <label for="nama">Nama:</label>
    <input type="text" name="nama" id="nama" required><br><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required><br><br>

    <label for="jumlah_tiket">Jumlah Tiket:</label>
    <input type="number" name="jumlah_tiket" id="jumlah_tiket" required><br><br>

    <input type="submit" value="Pesan">
  </form>

  <footer>
    <p>Bioskop &copy; kelompok 3</p>
  </footer>
</body>
</html>
