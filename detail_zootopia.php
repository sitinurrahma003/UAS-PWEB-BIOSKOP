<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Zootopia - Sam's Studios</title>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}

body {
  background-color: #ffffff;
}

/* ================= NAVBAR ================= */
.navbar {
  width: 100%;
  height: 85px;
  background-color: #083d77;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 70px;
}

.navbar-left {
  display: flex;
  align-items: center;
}

.logo {
  height: 45px;
}

.navbar-right {
  display: flex;
  align-items: center;
  gap: 38px;
}

.navbar-menu {
  list-style: none;
  display: flex;
  gap: 30px;
}

.navbar-menu li a {
  color: #ffffff;
  text-decoration: none;
  font-size: 17px;
  font-weight: 500;
  padding-bottom: 6px;
  position: relative;
}

.navbar-menu li a.active {
  font-weight: 600;
}

.navbar-menu li a.active::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: -6px;
  width: 100%;
  height: 3px;
  background-color: #e0b76a;
  border-radius: 3px;
}

.navbar-menu li a:hover {
  color: #e0b76a;
}

.btn-login {
  background-color: #e0b76a;
  color: #083d77;
  padding: 10px 26px;
  border-radius: 25px;
  text-decoration: none;
  font-weight: 700;
  font-size: 15px;
  transition: 0.2s ease;
}

.btn-login:hover {
  background-color: #f2cc8f;
}
/* ================= DETAIL MOVIE ================= */
.detail-container {
  max-width: 1150px;
  margin: 50px auto;
  display: flex;
  gap: 40px;
}

.poster img {
  width: 290px;
  border-radius: 10px;
  box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.info h1 {
  color: #083d77;
  font-size: 30px;
  margin-bottom: 8px;
}

.meta {
  color: #666;
  font-size: 15px;
  margin-bottom: 18px;
}

.label {
  color: #083d77;
  font-weight: 700;
  margin-top: 14px;
}

.text {
  color: #333;
  font-size: 15px;
  line-height: 1.7;
}

/* ================= BUTTON ================= */
.btn-ticket, .btn-trailer {
  display: inline-block;
  margin-top: 28px;
  padding: 13px 34px;
  background: #e0b76a;
  color: #083d77;
  font-weight: 700;
  border-radius: 30px;
  text-decoration: none;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar">
  <div class="navbar-left">
    <img src="sams-logo.webp" alt="Sam's Studios" class="logo">
  </div>

  <div class="navbar-right">
    <ul class="navbar-menu">
      <li><a href="#" class="active">Now Playing</a></li>
      <li><a href="#">Up Coming</a></li>
      <li><a href="#">KulineRans</a></li>
      <li><a href="#">Theaters</a></li>
    </ul>

    <a href="#" class="btn-login">LogIn</a>
  </div>
</nav>

<!-- DETAIL MOVIE -->
<div class="detail-container">

  <!-- POSTER -->
  <div class="poster">
    <img src="zootopia.jpg" alt="Anaconda">
  </div>

  <!-- INFO -->
  <div class="info">

    <h1>Zootopia</h1>
    <div class="meta">Animasi, Komedi, Petualangan, Keluarga • 89 Menit • R 17+</div>

    <div class="label">Bahasa</div>
    <div class="text">Inggris</div>

    <div class="label">Aktor</div>
    <div class="text">
      Ginnifer Goodwin, Jason Bateman, Ke Huy Quan, Fortune Feimster
    </div>

    <div class="label">Sinopsis</div>
    <div class="text">
      Judy Hopps dan Nick Wilde kembali menghadapi misteri baru yang mengancam keseimbangan kota Zootopia dan menguji persahabatan mereka.
    </div>

    <!-- PASS FILM NAME -->
    <a href="jadwal_studio.php?film=Zootopia" class="btn-ticket">Pesan Tiket</a>
    <a href="trailer.php" class="btn-trailer">Trailer</a>

  </div>
</div>

</body>
</html>
