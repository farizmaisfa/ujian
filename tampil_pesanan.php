<!DOCTYPE html>
<html>
<head>
  <title>Tampilkan Pesanan</title>
  <link rel="stylesheet" type="text/css" href="css/style_index.css">
</head>
<body>
   <header>
   <h1>Tampilkan Pesanan</h1>
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

  <table>
    <thead>
      <tr>
        <th>No.</th>
        <th>Film</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jumlah Tiket</th>
        <th>Total Harga</th>
        <th>Tanggal Pemesanan</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $koneksi = mysqli_connect("localhost", "root", "", "bioskop");

        if (mysqli_connect_errno()) {
          echo "Koneksi database gagal: " . mysqli_connect_error();
          exit();
        }

        $query = "SELECT * FROM pesanan";
        $result = mysqli_query($koneksi, $query);

        
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $no . "</td>";
          echo "<td>" . getFilmJudul($koneksi, $row['film_id']) . "</td>";
          echo "<td>" . $row['nama'] . "</td>";
          echo "<td>" . $row['email'] . "</td>";
          echo "<td>" . $row['jumlah_tiket'] . "</td>";
          echo "<td>" . $row['total_harga'] . "</td>";
          echo "<td>" . $row['tanggal_pemesanan'] . "</td>";
          echo "</tr>";

          $no++;
        }

      
        mysqli_close($koneksi);

    
        function getFilmJudul($koneksi, $film_id) {
          $query = "SELECT judul FROM films WHERE film_id = $film_id";
          $result = mysqli_query($koneksi, $query);
          $film = mysqli_fetch_assoc($result);
          return $film['judul'];
        }
      ?>
    </tbody>
  </table>

  <footer>
  <p>bioskop &copy; kelompok 3</p>
  </footer>
</body>
</html>
