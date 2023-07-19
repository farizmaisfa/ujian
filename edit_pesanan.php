<!DOCTYPE html>
<html>
<head>
  <title>Edit Pesanan</title>
  <link rel="stylesheet" type="text/css" href="css/style_index.css">
</head>
<body>
  <h1>Edit Pesanan</h1>

  <?php
    $koneksi = mysqli_connect("localhost", "root", "", "bioskop");
    if (mysqli_connect_errno()) {
      echo "Koneksi database gagal: " . mysqli_connect_error();
      exit();
    }
    $pesanan_id = $_GET['pesanan_id'];
    $query = "SELECT * FROM pesanan WHERE pesanan_id = $pesanan_id";
    $result = mysqli_query($koneksi, $query);
    $pesanan = mysqli_fetch_assoc($result);
    $query = "SELECT * FROM films";
    $result = mysqli_query($koneksi, $query);
    echo "<form action='proses_edit_pesanan.php' method='POST'>";
    echo "<input type='hidden' name='pesanan_id' value='" . $pesanan['pesanan_id'] . "'>";
    echo "<label for='film'>Film:</label>";
    echo "<select name='film' id='film'>";
    while ($row = mysqli_fetch_assoc($result)) {
      $selected = ($row['film_id'] == $pesanan['film_id']) ? "selected" : "";
      echo "<option value='" . $row['film_id'] . "' " . $selected . ">" . $row['judul'] . "</option>";
    }
    echo "</select><br><br>";

    echo "<label for='nama'>Nama:</label>";
    echo "<input type='text' name='nama' id='nama' value='" . $pesanan['nama'] . "' required><br><br>";

    echo "<label for='email'>Email:</label>";
    echo "<input type='email' name='email' id='email' value='" . $pesanan['email'] . "' required><br><br>";

    echo "<label for='jumlah_tiket'>Jumlah Tiket:</label>";
    echo "<input type='number' name='jumlah_tiket' id='jumlah_tiket' value='" . $pesanan['jumlah_tiket'] . "' required><br><br>";

    echo "<input type='submit' value='Simpan'>";
    echo "</form>";
    mysqli_close($koneksi);
  ?>

  <footer>
  <p>bioskop &copy; kelompok 3</p>
  </footer>
</body>
</html>
