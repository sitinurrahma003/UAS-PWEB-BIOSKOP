<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>E-Ticket Bioskop</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://cdn.jsdelivr.net/npm/qrcode/build/qrcode.min.js"></script>

<style>
body {
  font-family: 'Segoe UI', sans-serif;
  background: linear-gradient(135deg, #081b4b, #0b2a8f);
  margin: 0;
  padding: 20px;
  color: white;
}

/* Navbar */
.navbar {
  background: #001f5c;
  padding: 14px 18px;
  font-weight: bold;
  font-size: 18px;
  border-radius: 12px;
  margin-bottom: 20px;
}

/* Ticket Card */
.ticket-card {
  max-width: 420px;
  margin: auto;
  background: white;
  color: #222;
  border-radius: 18px;
  padding: 18px;
  box-shadow: 0 15px 35px rgba(0,0,0,0.35);
}

/* Header */
.ticket-header {
  text-align: center;
  font-weight: bold;
  font-size: 20px;
  margin-bottom: 10px;
}

/* Info */
.ticket-info {
  font-size: 14px;
  margin-bottom: 8px;
}

.label {
  color: gray;
}

/* QR Area */
.qr-area {
  margin-top: 18px;
  text-align: center;
}

canvas {
  margin-top: 10px;
  border: 6px solid #0b2a8f;
  border-radius: 14px;
  background: white;
}

/* Buttons */
.btn {
  display: block;
  width: 100%;
  margin-top: 14px;
  padding: 12px;
  border-radius: 12px;
  border: none;
  font-weight: bold;
  cursor: pointer;
}

.btn-download {
  background: #0b2a8f;
  color: white;
}

.btn-home {
  background: #ddd;
}
</style>
</head>

<body>

<div class="navbar">🎬 Sam's Ticket</div>

<div class="ticket-card">

  <div class="ticket-header">🎟️ E-TICKET</div>

  <div class="ticket-info"><span class="label">Film:</span> Esok Tanpa Ibu</div>
  <div class="ticket-info"><span class="label">Tanggal:</span> <span id="tanggal"></span></div>
  <div class="ticket-info"><span class="label">Jam:</span> <span id="jam"></span></div>
  <div class="ticket-info"><span class="label">Studio:</span> Studio 3</div>
  <div class="ticket-info"><span class="label">Kursi:</span> C5, C6</div>
  <div class="ticket-info"><span class="label">Booking ID:</span> <b id="booking"></b></div>

  <div class="qr-area">
    <p><b>Scan QR Code saat masuk bioskop</b></p>
    <canvas id="qrcode"></canvas>
  </div>

  <button class="btn btn-download" onclick="downloadQR()">⬇ Download QR Code</button>
  <a href="dashboard.php" class="btn btn-home" style="text-align:center; text-decoration:none;">
  🏠 Kembali ke Home
</a>

</div>

<script>
// Generate Booking ID
let bookingId = "BOOK-" + Math.floor(Math.random() * 999999);
document.getElementById("booking").innerText = bookingId;

// Set Date & Time
let now = new Date();
let tanggal = now.toLocaleDateString("id-ID", {
  weekday: "long", year: "numeric", month: "long", day: "numeric"
});
let jam = now.toLocaleTimeString("id-ID", {
  hour: "2-digit", minute: "2-digit"
});

document.getElementById("tanggal").innerText = tanggal;
document.getElementById("jam").innerText = jam;

// QR Code Data
let qrData = `
Sam's Ticket
Film: Esok Tanpa Ibu
Tanggal: ${tanggal}
Jam: ${jam}
Kursi: C5, C6
Booking ID: ${bookingId}
`;

// Generate QR
QRCode.toCanvas(document.getElementById("qrcode"), qrData, {
  width: 220
});

// Download QR
function downloadQR() {
  let canvas = document.getElementById("qrcode");
  let link = document.createElement("a");
  link.download = "qr-ticket.png";
  link.href = canvas.toDataURL();
  link.click();
}
</script>

</body>
</html>
