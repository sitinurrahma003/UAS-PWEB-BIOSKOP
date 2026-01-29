<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Detail Pembayaran - Sam's Studios</title>

<style>
* {
  box-sizing: border-box;
  font-family: "Segoe UI", Tahoma, sans-serif;
}

body {
  margin: 0;
  background: #f7f9fc;
}

/* NAVBAR */
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
/* CONTAINER */
.container {
  max-width: 900px;
  margin: 40px auto;
  background: white;
  padding: 28px;
  border-radius: 16px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.06);
}

h2 {
  color: #083d77;
}

.box {
  border: 2px solid #083d77;
  border-radius: 14px;
  padding: 18px;
  margin-top: 16px;
}

.status {
  margin-top: 16px;
  font-weight: 700;
  font-size: 16px;
}

.success {
  color: green;
}

.loading {
  color: orange;
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

<!-- CONTENT -->
<div class="container">

  <h2>Detail Pembayaran</h2>
  <p><b>Metode:</b> <span id="paymentMethod"></span></p>
  <p><b>Total Bayar:</b> Rp <span id="total"></span></p>

  <div id="paymentBox" class="box"></div>

  <div id="statusText" class="status loading">⏳ Menunggu pembayaran...</div>

</div>

<script>
const method = localStorage.getItem("paymentMethod");
const total = localStorage.getItem("ticketTotal");

document.getElementById("paymentMethod").innerText = method;
document.getElementById("total").innerText = Number(total).toLocaleString("id-ID");

const box = document.getElementById("paymentBox");

// ================= BANK TRANSFER =================
if (method.includes("Debit") || method.includes("Bank")) {
  box.innerHTML = `
    <h3>Transfer Bank</h3>
    <p>Rekening Tujuan:</p>
    <b style="font-size:20px;">1234 5678 9012</b>

    <h4>Tutorial:</h4>
    <ol>
      <li>Buka Mobile Banking</li>
      <li>Pilih Transfer</li>
      <li>Masukkan nomor rekening</li>
      <li>Masukkan nominal sesuai total</li>
      <li>Konfirmasi pembayaran</li>
    </ol>
  `;
}

// ================= QRIS =================
else if (method.includes("QRIS")) {
  box.innerHTML = `
    <h3>Scan QRIS</h3>
    <img src="https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=QRIS-PAYMENT" style="display:block;margin:10px auto;">
    <h4>Tutorial:</h4>
    <ol>
      <li>Buka GoPay / OVO / DANA</li>
      <li>Pilih Scan QR</li>
      <li>Scan barcode</li>
      <li>Konfirmasi pembayaran</li>
    </ol>
  `;
}

// ================= VIRTUAL ACCOUNT =================
else {
  const va = "88081234" + Math.floor(Math.random() * 10000);

  box.innerHTML = `
    <h3>Virtual Account</h3>
    <p>Nomor VA:</p>
    <b style="font-size:22px;">${va}</b>

    <h4>Tutorial:</h4>
    <ol>
      <li>Buka Mobile Banking</li>
      <li>Pilih Virtual Account</li>
      <li>Masukkan nomor VA</li>
      <li>Konfirmasi pembayaran</li>
    </ol>
  `;
}

// ================= AUTO PAYMENT CONFIRM =================
const statusText = document.getElementById("statusText");

setTimeout(() => {
  statusText.innerText = "🔄 Memproses pembayaran...";
}, 3000);

setTimeout(() => {
  statusText.innerText = "✅ Pembayaran Berhasil!";
  statusText.classList.remove("loading");
  statusText.classList.add("success");

  setTimeout(() => {
    window.location.href = "etiket.php";
  }, 2000);

}, 7000);
</script>

</body>
</html>
