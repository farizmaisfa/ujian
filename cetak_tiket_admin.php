<!DOCTYPE html>
<html>
<head>
  <title>Cetak Tiket</title>
  <link rel="stylesheet" type="text/css" href="css/style_index.css">
</head>
<body>
  <header>
    <h1>Cetak Tiket</h1>
  </header>
  
  <nav>
    <ul>
      <li><a href="admin.php">Halaman Utama</a></li>
      <li><a href="booking_admin.php">tampilkan pesanan</a></li>
      <li><a href="cetak_tiket_admin.php">Cetak Tiket</a></li>
      <li><a href="index.php">Log Out</a></li>
    </ul>

  <form action="proses_cetak.php" method="POST">
    <label for="pesanan">Pilih Pesanan:</label>
    <select name="pesanan" id="pesanan">
      <?php
        $koneksi = mysqli_connect("localhost", "root", "", "bioskop");
        if (mysqli_connect_errno()) {
          echo "Koneksi database gagal: " . mysqli_connect_error();
          exit();
        }
        $query = "SELECT pesanan_id FROM pesanan";
        $result = mysqli_query($koneksi, $query);
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<option value='" . $row['pesanan_id'] . "'>" . $row['pesanan_id'] . "</option>";
        }
        mysqli_close($koneksi);
      ?>
    </select><br><br>

    <input type="submit" value="Cetak">
  </form>

  <footer>
  <p>bioskop &copy; kelompok 3</p>
  </footer>
</body>
</html>
