<!DOCTYPE html>
<html>
<head>
<title>Register Sams Studio</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
<h2 data="register">Daftar</h2>

<form action="proses_register.php" method="POST">
<input name="nama_lengkap" data="name" placeholder="Nama Lengkap" required>
<input name="no_hp" placeholder="08xxxx" required>
<input name="email" placeholder="Email" required>

<select name="gender">
<option value="Pria">Pria</option>
<option value="Wanita">Wanita</option>
</select>

<input type="date" name="tanggal_lahir" required>
<input type="password" name="password" placeholder="Password" required>
<input name="pin" placeholder="PIN (4 digit)" required>

<button data="register">Daftar</button>
</form>

<div class="link" data="haveacc">Sudah punya akun? <a href="login.php">Login</a></div>
</div>

<script src="script.js"></script>
</body>
</html>
