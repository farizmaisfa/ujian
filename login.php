<!DOCTYPE html>
<html>
<head>
  <title>Login Admin</title>
  <link rel="stylesheet" type="text/css" href="css/style_login.css">
</head>
<body>
  <h1>Login Admin</h1>

  <form action="proses_login.php" method="POST">
    <label for="id">ID:</label>
    <input type="text" name="id" id="id" required><br><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br><br>

    <input type="submit" value="Login">
  </form>

  <footer>
  <p>bioskop &copy; kelompok 3</p>
  </footer>
</body>
</html>
