
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Jadwal Studio - Sam's Studios</title>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}

body {
  background-color: #faf7fb;
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
}

.navbar-menu li a.active {
  font-weight: 700;
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
  max-width: 1100px;
  margin: 45px auto;
}

/* ================= MOVIE HEADER ================= */
.movie-header {
  display: flex;
  gap: 25px;
  margin-bottom: 30px;
}

.movie-header img {
  width: 170px;
  border-radius: 10px;
  box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.movie-info h1 {
  color: #083d77;
  margin-bottom: 6px;
}

.movie-info p {
  color: #555;
}

/* ================= STUDIO ================= */
.studio-box {
  background: white;
  padding: 22px;
  border-radius: 14px;
  border: 1px solid #ddd;
  margin-bottom: 18px;
}

.studio-header {
  display: flex;
  justify-content: space-between;
  margin-bottom: 12px;
}

.studio-title {
  font-weight: 700;
  color: #083d77;
}

.price {
  font-weight: 700;
  color: #083d77;
}

.time-list {
  display: flex;
  gap: 12px;
  flex-wrap: wrap;
}

.time-btn {
  padding: 10px 18px;
  border: 2px solid #e0b76a;
  border-radius: 12px;
  background: white;
  color: #083d77;
  font-weight: 700;
  cursor: pointer;
  text-decoration: none;
  transition: 0.15s ease;
}

.time-btn:hover {
  background: #e0b76a;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar">
  <img src="sams-logo.webp" class="logo">

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

<div class="page-container">

  <!-- MOVIE HEADER -->
  <div class="movie-header">
    <img id="moviePoster" src="default.jpg">
    <div class="movie-info">
      <h1 id="movieTitle"></h1>
      <p id="movieMeta"></p>
    </div>
  </div>

  <!-- STUDIOS -->
  <div id="studioList"></div>

</div>

<script>
// ================= GET PARAMS =================
const params = new URLSearchParams(window.location.search);
let film = params.get("film");

// FALLBACK IF EMPTY
if (!film || film === "null") {
  film = localStorage.getItem("selectedFilm") || "Film Tidak Diketahui";
} else {
  localStorage.setItem("selectedFilm", film);
}

// ================= FILM DATA =================
const filmData = {
  "Anaconda": { poster: "anaconda.jpg", meta: "89 Menit • R 17+" },
  "Esok Tanpa Ibu": { poster: "esoktanpaibu.jpg", meta: "107 Menit • 13+" },
  "Bidadari Surga": { poster: "bidadari_surga.jpg", meta: "80 Menit • SU 13+" },
  "Zootopia 2": { poster: "zootopia.jpg", meta: "110 Menit • SU" }
};

// ================= SET HEADER =================
document.getElementById("movieTitle").innerText = film;

document.getElementById("moviePoster").src =
  filmData[film]?.poster || "default.jpg";

document.getElementById("movieMeta").innerText =
  filmData[film]?.meta || "Durasi belum tersedia";

// ================= STUDIO DATA =================
const studios = [
  { name: "Studio 1", price: 30000, times: ["12:00", "15:30", "18:40"] },
  { name: "Studio 2", price: 30000, times: ["13:10", "16:20", "19:50"] },
  { name: "Studio 3", price: 30000, times: ["14:00", "17:45", "20:30"] }
];

const studioList = document.getElementById("studioList");

studios.forEach(studio => {
  const box = document.createElement("div");
  box.className = "studio-box";

  let timesHTML = studio.times.map(time => `
    <a class="time-btn" href="pilih_kursi.php?film=${encodeURIComponent(film)}&studio=${encodeURIComponent(studio.name)}&time=${encodeURIComponent(time)}&price=${studio.price}">
      ${time}
    </a>
  `).join("");

  box.innerHTML = `
    <div class="studio-header">
      <div class="studio-title">${studio.name}</div>
      <div class="price">Rp ${studio.price.toLocaleString("id-ID")}</div>
    </div>
    <div class="time-list">${timesHTML}</div>
  `;

  studioList.appendChild(box);
});
</script>

</body>
</html>
