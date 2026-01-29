
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Pesan Tiket - Sam's Studios</title>

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
}

/* ================= PAGE ================= */
.page-container {
  max-width: 1150px;
  margin: 45px auto;
}

.page-title {
  color: #083d77;
  font-size: 28px;
  margin-bottom: 20px;
}

/* ================= MOVIE INFO ================= */
.movie-box {
  display: flex;
  gap: 30px;
  margin-bottom: 35px;
}

.movie-box img {
  width: 190px;
  border-radius: 10px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.movie-info h2 {
  color: #083d77;
  margin-bottom: 8px;
}

/* ================= FORM ================= */
.form-box {
  background: #f9f9f9;
  padding: 25px;
  border-radius: 14px;
  border: 1px solid #ddd;
}

.form-group {
  margin-bottom: 16px;
}

.form-group label {
  display: block;
  font-weight: 600;
  margin-bottom: 6px;
}

.form-group select,
.form-group input {
  width: 100%;
  padding: 10px;
  border-radius: 8px;
  border: 1px solid #ccc;
  font-size: 15px;
}

/* ================= BUTTON ================= */
.btn-submit {
  display: inline-block;
  text-decoration: none;
  margin-top: 28px;
  padding: 13px 34px;
  background: #e0b76a;
  color: #083d77;
  font-weight: 700;
  border-radius: 30px;
  border: none;
  cursor: pointer;
  font-size: 16px;
  transition: 0.2s ease;
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
      <li><a href="index.html">Now Playing</a></li>
      <li><a href="#">Up Coming</a></li>
      <li><a href="#">KulineRans</a></li>
      <li><a href="#">Theaters</a></li>
    </ul>

    <a href="#" class="btn-login">LogIn</a>
  </div>
</nav>

<!-- CONTENT -->
<div class="page-container">

  <h1 class="page-title">Pesan Tiket</h1>

  <div class="movie-box">
    <img src="esoktanpaibu.jpeg" alt="Esok Tanpa Ibu">

    <div class="movie-info">
      <h2>Esok Tanpa Ibu</h2>
      <p>Animasi • 112 Menit • SU</p>
    </div>
  </div>

  <div class="form-box">
    <form>

      <div class="form-group">
        <label>Pilih Bioskop</label>
        <select>
          <option>Sam's Studios Jakarta</option>
          <option>Sam's Studios Bandung</option>
          <option>Sam's Studios Bekasi</option>
        </select>
      </div>

      <div class="form-group">
        <label>Pilih Tanggal</label>
        <input type="date">
      </div>

      <div class="form-group">
        <label>Pilih Jam Tayang</label>
        <select>
          <option>12:00</option>
          <option>15:30</option>
          <option>18:45</option>
          <option>21:00</option>
        </select>
      </div>

      <div class="form-group">
        <label>Jumlah Tiket</label>
        <select>
          <option>1 Tiket</option>
          <option>2 Tiket</option>
          <option>3 Tiket</option>
          <option>4 Tiket</option>
        </select>
      </div>

      <a href="pilih_kursi.html" class="btn-submit">Lanjut Pilih Kursi</a>
    </form>
  </div>

</div>

</body>
</html>
