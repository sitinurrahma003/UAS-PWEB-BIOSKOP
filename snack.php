<?php
// ================= DATA SNACK =================
$snacks = [
    ["nama"=>"Combo Double","gambar"=>"combodouble.png","harga"=>"Rp 50.000"],
    ["nama"=>"Corn Dog","gambar"=>"corndog.png","harga"=>"Rp 15.000"],
    ["nama"=>"Pop Corn","gambar"=>"popcorn.png","harga"=>"Rp 17.000"],
    ["nama"=>"Saus Sage","gambar"=>"saussage.png","harga"=>"Rp 20.000"],
    ["nama"=>"French Fries","gambar"=>"minifrench.png","harga"=>"Rp 10.000"],
    ["nama"=>"French Fries Combo","gambar"=>"frenchcola.png","harga"=>"Rp 17.000"],
    ["nama"=>"Special Burger","gambar"=>"burger.png","harga"=>"Rp 39.000"],
    ["nama"=>"Chiken Balls","gambar"=>"chikenballs.png","harga"=>"Rp 55.000"]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>KulineRans - Sam's Studios</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
/* ===== CSS ASLI KAMU (TIDAK DIUBAH) ===== */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Segoe UI",Tahoma,sans-serif;
}
body{background:#fff}

/* NAVBAR */
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

/* SNACK */
.snack-section{padding:40px 60px}
.snack-grid{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(220px,1fr));
    gap:30px;
}
.snack-card{
    background:#fff;
    border-radius:16px;
    box-shadow:0 6px 18px rgba(0,0,0,.15);
    padding:20px;
    text-align:center;
}
.snack-card img{
    width:100%;
    height:160px;
    object-fit:contain;
}
.snack-title{
    font-size:18px;
    font-weight:600;
    margin-top:10px;
}
.snack-price{
    font-weight:700;
    margin:10px 0;
}
.btn-buy{
    display:inline-block;
    padding:10px 20px;
    background:#0d6efd;
    color:#fff;
    text-decoration:none;
    border-radius:20px;
    font-weight:600;
    text-align:center;
}
.btn-buy:hover{ background:#0b5ed7; }

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

<nav class="navbar">
    <div class="navbar-left">
        <img src="sams-logo.webp" class="logo">
    </div>
    <div class="navbar-right">
        <ul class="navbar-menu">
            <li><a href="dashboard.php">Now Playing</a></li>
            <li><a href="#">Up Coming</a></li>
            <li><a href="snack.php" class="active">KulineRans</a></li>
        </ul>
        <a href="login.php" class="btn-login">Login</a>
    </div>
</nav>

<section class="snack-section">
<div class="snack-grid">

<?php foreach ($snacks as $snack): ?>
    <div class="snack-card">
        <img src="<?= $snack['gambar']; ?>" alt="<?= $snack['nama']; ?>">
        <div class="snack-title"><?= $snack['nama']; ?></div>
        <div class="snack-price"><?= $snack['harga']; ?></div>
        <a href="pembayaran.php" class="btn-buy">BUY</a>
    </div>
<?php endforeach; ?>

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
                <li><a>Kontak Kami</a></li>
            </ul>
        </div>

    </div>

    <div class="footer-bottom">
        © <?= date('Y'); ?> Sam's Studios. All Rights Reserved.
    </div>
</footer>


</body>
</html>