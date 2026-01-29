<?php
include "config.php";

$nama   = $_POST['nama_lengkap'];
$email  = $_POST['email'];
$hp     = $_POST['no_hp'];
$gender = $_POST['gender'];
$tgl    = $_POST['tanggal_lahir'];
$pass   = password_hash($_POST['password'], PASSWORD_DEFAULT);
$pin    = $_POST['pin'];

$query = "INSERT INTO users 
(nama_lengkap, email, no_hp, gender, tanggal_lahir, password, pin, created_at)
VALUES 
('$nama','$email','$hp','$gender','$tgl','$pass','$pin',NOW())";

mysqli_query($conn, $query);

header("Location: login.php");
exit;