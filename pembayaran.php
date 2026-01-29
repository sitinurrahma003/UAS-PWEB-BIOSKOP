
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Pembayaran - Sam's Studios</title>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}

body {
  background: #f7f9fc;
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


/* ================= HEADER ================= */
.page-title {
  max-width: 1100px;
  margin: 40px auto 10px;
  color: #083d77;
}

.page-title h2 {
  font-size: 26px;
}

/* ================= MAIN CONTAINER ================= */
.container {
  max-width: 1100px;
  margin: 20px auto 80px;
  display: grid;
  grid-template-columns: 2fr 1fr;
  gap: 20px;
}

/* ================= PANELS ================= */
.panel {
  background: white;
  border-radius: 14px;
  padding: 24px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.06);
}

.panel h3 {
  color: #083d77;
  margin-bottom: 14px;
}

/* ================= PAYMENT OPTIONS ================= */
.payment-option {
  border: 2px solid #083d77;
  border-radius: 12px;
  padding: 14px;
  margin-bottom: 12px;
  cursor: pointer;
  transition: 0.2s ease;
}

.payment-option:hover {
  background: #f0f6ff;
}

.payment-option.selected {
  background: #083d77;
  color: white;
}

/* ================= SUMMARY ================= */
.summary p {
  font-size: 15px;
  margin-bottom: 8px;
}

.total {
  font-size: 22px;
  font-weight: 700;
  margin-top: 12px;
}

/* ================= BUTTON ================= */
.btn-pay {
  width: 100%;
  margin-top: 20px;
  padding: 14px;
  background: #e0b76a;
  color: #083d77;
  border: none;
  border-radius: 30px;
  font-weight: 700;
  cursor: pointer;
}
</style>
</head>

<body>

<!-- ================= NAVBAR ================= -->
<nav class="navbar">
  <div class="navbar-left">
    <img src="sams-logo.webp" alt="Sam's Studios" class="logo">
  </div>

  <div class="navbar-right">
    <ul class="navbar-menu">
      <li><a href="#" class="active">Now Playing</a></li>
      <li><a href="upcoming.php">Up Coming</a></li>
      <li><a href="snack.php">KulineRans</a></li>
    </ul>

    <a href="login.php" class="btn-login">LogIn</a>
  </div>
</nav>

<!-- ================= TITLE ================= -->
<div class="page-title">
  <h2>Konfirmasi & Pembayaran</h2>
</div>

<!-- ================= MAIN ================= -->
<div class="container">

  <!-- LEFT PANEL -->
  <div class="panel">
    <h3>Detail Pemesanan</h3>

    <p><b>Studio:</b> Sam's Studio - Studio 3</p>
    <p><b>Tanggal:</b> <span id="ticketDate"></span></p>
    <p><b>Jam:</b> <span id="ticketTime"></span></p>
    <p><b>Kursi:</b> <span id="ticketSeats"></span></p>
    <p><b>Jumlah Tiket:</b> <span id="ticketCount"></span></p>

    <h3 style="margin-top:20px;">Metode Pembayaran</h3>

    <div class="payment-option" onclick="selectPayment(this)">
      💳 Kartu Debit / Kredit
    </div>

    <div class="payment-option" onclick="selectPayment(this)">
      📱 QRIS (GoPay / OVO / DANA)
    </div>

    <div class="payment-option" onclick="selectPayment(this)">
      🏦 Virtual Account
    </div>
  </div>

  <!-- RIGHT PANEL -->
  <div class="panel summary">
    <h3>Ringkasan Pembayaran</h3>

    <p>Harga per Tiket: Rp30.000</p>
    <p>Jumlah Tiket: <span id="ticketCount2"></span></p>

    <div class="total">
      Total: Rp <span id="ticketTotal"></span>
    </div>

    <button class="btn-pay" onclick="confirmPayment()">Bayar Sekarang</button>
  </div>

</div>

<script>
// LOAD DATA
const seats = JSON.parse(localStorage.getItem("ticketSeats")) || [];
const total = localStorage.getItem("ticketTotal") || 0;
const date = localStorage.getItem("ticketDate") || "-";
const time = localStorage.getItem("ticketTime") || "-";

document.getElementById("ticketSeats").innerText = seats.join(", ");
document.getElementById("ticketCount").innerText = seats.length;
document.getElementById("ticketCount2").innerText = seats.length;
document.getElementById("ticketTotal").innerText = Number(total).toLocaleString("id-ID");
document.getElementById("ticketDate").innerText = date;
document.getElementById("ticketTime").innerText = time;

// PAYMENT SELECT
let selectedPayment = null;

function selectPayment(el) {
  document.querySelectorAll(".payment-option").forEach(opt => opt.classList.remove("selected"));
  el.classList.add("selected");
  selectedPayment = el.innerText;
}

// CONFIRM
function confirmPayment() {
  if (!selectedPayment) {
    alert("Pilih metode pembayaran dulu yaa 😄");
    return;
  }

  localStorage.setItem("paymentMethod", selectedPayment);
  window.location.href = "detail_payment.php";
}
</script>

</body>
</html>
