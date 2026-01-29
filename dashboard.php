<?php
// ================= DATA KOTA =================
$kota = [
    "CIANJUR", "GOMBONG", "INDRAMAYU", "KEBUMEN", "KEDIRI",
    "KLATEN", "LABUAN BAJO", "NGANJUK", "PASURUAN", "PEKALONGAN",
    "PEMALANG", "PROBOLINGGO", "SALATIGA", "SOLO", "SUBANG",
    "SUKABUMI", "UNGARAN"
];

// Kota aktif dari klik user
$kotaAktif = $_GET['kota'] ?? "CIANJUR";

// ================= DATA FILM + KOTA TAYANG =================
$movies = [
    [
        "judul"=>"Anaconda",
        "poster"=>"anaconda.jpg",
        "rating"=>"D17+",
        "kelas"=>"d17",
        "kota"=>["CIANJUR","SUKABUMI","SOLO"],
        "detail"=>"detail_anaconda.php",
        "youtube"=>"https://youtu.be/q0UxtQfgz0A?si=ExrkFLLI4ecS-uuN"
    ],
    [
        "judul"=>"Bidadari Surga",
        "poster"=>"bidadari_surga.jpg",
        "rating"=>"R13+",
        "kelas"=>"r13",
        "kota"=>["GOMBONG","KEBUMEN","SALATIGA","CIANJUR"],
        "detail"=>"detail_bidadari.php"
    ],
    [
        "judul"=>"Esok Tanpa Ibu",
        "poster"=>"esoktanpaibu.jpg",
        "rating"=>"SU",
        "kelas"=>"su",
        "kota"=>["CIANJUR","SUBANG","PEMALANG","KEBUMEN"],
        "detail"=>"detail_esok.php"
    ],
    
    [
        "judul"=>"Zootopia 2",
        "poster"=>"zootopia.jpg",
        "rating"=>"SU",
        "kelas"=>"su",
        "kota"=>["SOLO","SALATIGA","KLATEN","SUKABUMI","CIANJUR"],
        "detail"=>"detail_zootopia.php"
    ],
];
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Now Playing - Sam's Studios</title>

    <style>
        /* ===== CSS ASLI KAMU (TIDAK DIUBAH) ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        body { background-color: #ffffff; }

        .navbar {
            width: 100%;
            height: 85px;
            background-color: #083d77;
            display: flex;
            align-items: center;
            padding: 0 60px;
        }

        .navbar-left { flex: 1; }
        .logo { height: 48px; }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 45px;
        }

        .navbar-menu {
            list-style: none;
            display: flex;
            gap: 38px;
        }

        .navbar-menu li a {
            color: #ffffff;
            text-decoration: none;
            font-size: 18px;
            font-weight: 500;
            padding-bottom: 6px;
            position: relative;
        }

        .navbar-menu li a.active::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            background-color: #e0b76a;
        }

        .navbar-menu li a:hover { color: #e0b76a; }

        .btn-login {
            background-color: #e0b76a;
            color: #083d77;
            padding: 10px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
        }

        .now-playing { padding: 40px 60px; }

        .np-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 35px;
        }

        .np-label {
            background-color:#083d77;
            color: #ffffff;
            padding: 8px 18px;
            font-weight: 600;
            border-radius: 3px;
            font-size: 14px;
        }

        .city-dropdown { position: relative; }

        .city-btn {
            background: #e6e6e6;
            border: none;
            padding: 8px 14px;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .city-menu {
            position: absolute;
            top: 42px;
            right: 0;
            width: 220px;
            max-height: 260px;
            overflow-y: auto;
            background: #ededed;
            display: none;
            z-index: 10;
        }

        .city-menu a {
            display: block;
            padding: 10px 14px;
            color: #0a4f63;
            text-decoration: none;
            font-size: 14px;
        }

        .city-menu a:hover { background: #d9d9d9; }

        .city-menu a.active {
            background: #7a7a7a;
            color: #fff;
        }

        .city-dropdown:hover .city-menu { display: block; }

        .movie-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .movie-card { text-align: center; }

        .poster img {
            width: 100%;
            border-radius: 4px;
        }

        .movie-title {
            margin-top: 14px;
            font-size: 16px;
            font-weight: 600;
        }

        .rating {
            margin-top: 8px;
            display: inline-block;
            padding: 4px 8px;
            font-size: 12px;
            font-weight: 700;
            border-radius: 3px;
            color: #fff;
        }

        .d17 { background-color: #c62828; }
        .r13 { background-color: #1565c0; }
        .su  { background-color: #2e7d32; }

        /* ===== FOOTER MODERN ===== */
.footer {
    background-color: #0b2f4a;
    color: #ffffff;
    padding: 50px 60px 25px;
    margin-top: 60px;
}

.footer-container {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    gap: 40px;
}

.footer-brand img {
    height: 42px;
    margin-bottom: 15px;
}

.footer-brand p {
    font-size: 14px;
    line-height: 1.6;
    color: #dcdcdc;
}

.footer h4 {
    font-size: 16px;
    margin-bottom: 18px;
    color: #e0b76a;
}

.footer ul {
    list-style: none;
}

.footer ul li {
    margin-bottom: 10px;
}

.footer ul li a {
    text-decoration: none;
    color: #dcdcdc;
    font-size: 14px;
}

.footer ul li a:hover {
    color: #e0b76a;
}

.footer-bottom {
    border-top: 1px solid rgba(255,255,255,0.2);
    margin-top: 35px;
    padding-top: 15px;
    text-align: center;
    font-size: 13px;
    color: #cccccc;
}


    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="navbar-left">
        <img src="sams-logo.webp" class="logo">
    </div>
    <div class="navbar-right">
        <ul class="navbar-menu">
            <li><a href="#" class="active">Now Playing</a></li>
            <li><a href="upcoming.php">Up Coming</a></li>
            <li><a href="snack.php">KulineRans</a></li>
        </ul>
        <a href="login.php" class="btn-login">Login</a>
    </div>
</nav>

<section class="now-playing">

<div class="np-header">
    <div class="np-label">Now Playing</div>

    <div class="city-dropdown">
        <button class="city-btn">
            <?= $kotaAktif ?>
            <span class="arrow">▾</span>
        </button>

        <div class="city-menu">
            <?php foreach ($kota as $k): ?>
                <a href="?kota=<?= urlencode($k); ?>"
                    class="<?= ($k == $kotaAktif) ? 'active' : '' ?>">
                    <?= $k ?>
                </a>
            <?php endforeach; ?>
        </div>

    </div>
</div>

<div class="movie-grid">
<?php
$adaFilm = false;
foreach ($movies as $film):
    if (in_array($kotaAktif, $film['kota'])):
        $adaFilm = true;
?>
    <div class="movie-card">
        <div class="poster">
            <a href="<?= $film['detail']; ?>">
                <img src="<?= $film['poster']; ?>" alt="<?= $film['judul']; ?>">
            </a>
        </div>
        <div class="movie-title"><?= $film['judul']; ?></div>
        <span class="rating <?= $film['kelas']; ?>">
            <?= $film['rating']; ?>
        </span>
    </div>
<?php
    endif;
endforeach;

if (!$adaFilm):
?>
    <p>Tidak ada film yang sedang tayang di kota ini.</p>
<?php endif; ?>
</div>


</section>

<footer class="footer">
    <div class="footer-container">

        <div class="footer-brand">
            <img src="sams-logo.webp" alt="Sam's Studios">
            <p>
                Sam's Studios adalah jaringan bioskop modern yang menghadirkan
                pengalaman menonton terbaik dengan film-film pilihan di berbagai kota.
            </p>
        </div>

        <div class="footer-links">
            <h4>Menu</h4>
            <ul>
                <li><a href="#">Now Playing</a></li>
                <li><a href="upcoming.php">Up Coming</a></li>
                <li><a href="snack.php">KulineRans</a></li>
            </ul>
        </div>

        <div class="footer-links">
            <h4>Bantuan</h4>
            <ul>
                <li><a href="#">Kontak Kami</a></li>
            </ul>
        </div>

    </div>

    <div class="footer-bottom">
        © <?= date('Y'); ?> Sam's Studios. All Rights Reserved.
    </div>
</footer>


</body>
</html>