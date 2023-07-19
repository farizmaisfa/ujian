<?php
$id = $_POST['id'];
$password = $_POST['password'];

$valid_id = "admin";
$valid_password = "admin";

if ($id === $valid_id && $password === $valid_password) {
  header("Location: admin.php");
  exit();
} else {
  echo "ID atau password salah. Silakan coba lagi.";
}
?>
