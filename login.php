<?php
session_start();
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hp  = $_POST['no_hp'];
    $pin = $_POST['pin'];

    $q = mysqli_query($conn, "SELECT * FROM users WHERE no_hp='$hp'");
    $u = mysqli_fetch_assoc($q);

    if ($u && $pin == $u['pin']) {
        $_SESSION['user'] = $u;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Nomor HP atau PIN salah";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login | Sams Studio</title>

<style>
:root{
  --blue:#0B3C74;
  --blue2:#114F9A;
  --gold:#D4AF6A;
  --bg:#f4f6f9;
}

body{
  margin:0;
  min-height:100vh;
  background:linear-gradient(var(--blue),var(--blue2));
  font-family:Segoe UI, sans-serif;
  display:flex;
  justify-content:center;
  align-items:center;
}

body.dark{
  background:#0f172a;
}

.card{
  background:white;
  width:360px;
  padding:30px;
  border-radius:18px;
}

body.dark .card{
  background:#1e293b;
  color:white;
}

h2{
  text-align:center;
  color:var(--gold);
}

label{
  font-size:14px;
}

input{
  width:100%;
  padding:12px;
  border:none;
  border-bottom:1px solid #ccc;
  margin-bottom:15px;
  background:transparent;
  color:inherit;
}

button{
  width:100%;
  padding:12px;
  background:var(--gold);
  border:none;
  border-radius:10px;
  font-weight:bold;
  cursor:pointer;
}

button:hover{
  opacity:.9;
}

.link{
  text-align:center;
  margin-top:12px;
  font-size:14px;
}

footer{
  margin-top:25px;
  text-align:center;
  font-size:13px;
}

footer a{
  margin:0 6px;
  color:var(--blue);
  text-decoration:none;
}

.toggle{
  display:flex;
  justify-content:flex-end;
  margin-bottom:10px;
}

/* === TOGGLE PROFESIONAL === */
.theme-switch{
  position:relative;
  width:42px;
  height:22px;
  background:#ccc;
  border-radius:20px;
  cursor:pointer;
  transition:.3s;
}

.theme-switch::after{
  content:'';
  position:absolute;
  width:18px;
  height:18px;
  background:white;
  border-radius:50%;
  top:2px;
  left:2px;
  transition:.3s;
}

body.dark .theme-switch{
  background:var(--gold);
}

body.dark .theme-switch::after{
  left:22px;
}

.error{
  color:red;
  text-align:center;
  margin-bottom:10px;
}
</style>

<script>
function toggleMode(){
  document.body.classList.toggle('dark');
}
</script>

</head>
<body>

<div class="card">
  <div class="toggle">
    <div class="theme-switch" onclick="toggleMode()"></div>
  </div>

  <h2>Login Sams Studio</h2>

  <?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>

  <form method="POST">
    <label>Masukkan Nomor HP</label>
    <input type="text" name="no_hp" placeholder="08xxxxxxxxxx" required>

    <label>Masukkan PIN</label>
    <input type="password" name="pin" placeholder="**" required>

    <button type="submit">Masuk</button>
  </form>

  <div class="link">
    Belum punya akun? <a href="register.php">Daftar</a>
  </div>
</div>

</body>
</html>