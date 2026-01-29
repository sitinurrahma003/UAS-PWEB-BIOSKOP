<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <title>Pilih Kursi - Sam's Studios</title>

    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      }

      body {
        background: #f9f7fb;
        padding-bottom: 160px; /* FIX BIAR FOOTER GA NUTUP */
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
      .header {
        max-width: 1100px;
        margin: 40px auto 20px;
      }

      .header h2 {
        color: #083d77;
        font-size: 26px;
        margin-bottom: 6px;
      }

      .header .time {
        color: #e0b76a;
        font-weight: 700;
        font-size: 18px;
      }

      /* ================= SCREEN ================= */
      .screen {
        width: 520px;
        height: 8px;
        background: #083d77;
        margin: 20px auto 10px;
        border-radius: 6px;
      }

      /* ================= SEATS ================= */
      .seat-map {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
        margin-top: 20px;
        margin-bottom: 80px;
      }

      .seat-row {
        display: flex;
        gap: 8px;
      }

      .aisle {
        width: 40px;
      }

      /* Seat Style */
      .seat {
        width: 42px;
        height: 42px;
        border: 2px solid #083d77;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        cursor: pointer;
        background: white;
        transition: 0.15s ease;
      }

      .seat:hover {
        transform: scale(1.05);
      }

      .seat.selected {
        background: #4caf50;
        color: white;
        border-color: #4caf50;
      }

      .seat.sold {
        background: #f44336;
        color: white;
        border-color: #f44336;
        cursor: not-allowed;
      }

      /* ================= LEGEND ================= */
      .legend {
        text-align: center;
        margin-top: 25px;
        font-size: 14px;
      }

      /* ================= BOTTOM BAR ================= */
      .bottom-bar {
        position: fixed;
        bottom: 0;
        width: 100%;
        background: #083d77;
        color: white;
        padding: 18px 50px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 999;
      }

      .bottom-info {
        font-size: 14px;
      }

      .subtotal {
        font-size: 22px;
        font-weight: 700;
      }

      .btn-buy {
        background: #e0b76a;
        color: #083d77;
        padding: 12px 28px;
        border-radius: 30px;
        border: none;
        font-weight: 700;
        cursor: pointer;
      }
    </style>
  </head>

  <body>
    <!-- NAVBAR -->
    <nav class="navbar">
      <div class="navbar-left">
        <img src="sams-logo.webp" alt="Sam's Studios" class="logo" />
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

    <!-- HEADER -->
    <div class="header">
      <h2>Sam's Studio</h2>
      <div>PILIH KURSI</div>
      <div class="time" id="currentTime"></div>
    </div>

    <!-- SCREEN -->
    <div class="screen"></div>

    <!-- SEATS -->
    <div class="seat-map" id="seatMap"></div>

    <!-- LEGEND -->
    <div class="legend">
      ⬜ Tersedia &nbsp;&nbsp; 🟢 Dipilih &nbsp;&nbsp; 🔴 Terjual
    </div>

    <!-- BOTTOM BAR -->
    <div class="bottom-bar">
      <div class="bottom-info">
        <div id="currentDate"></div>
        <div>Studio 3 • Harga Rp30.000</div>
      </div>

      <div class="subtotal">Subtotal: Rp <span id="total">0</span></div>

      <button class="btn-buy" onclick="goToPayment()">Beli Tiket</button>
    </div>

    <script>
      // ================= CREATE SEATS =================
      const seatMap = document.getElementById("seatMap");

      const rows = ["A", "B", "C", "D", "E", "F", "G", "H"];
      const leftSeats = 7;
      const rightSeats = 5;

      let selectedSeats = [];
      const price = 30000;

      rows.forEach((row) => {
        const rowDiv = document.createElement("div");
        rowDiv.classList.add("seat-row");

        // LEFT SIDE
        for (let i = 1; i <= leftSeats; i++) {
          createSeat(row, i, rowDiv);
        }

        // AISLE
        const aisle = document.createElement("div");
        aisle.classList.add("aisle");
        rowDiv.appendChild(aisle);

        // RIGHT SIDE
        for (let i = 1; i <= rightSeats; i++) {
          createSeat(row, i + leftSeats, rowDiv);
        }

        seatMap.appendChild(rowDiv);
      });

      function createSeat(row, number, rowDiv) {
        const seat = document.createElement("div");
        seat.classList.add("seat");
        seat.innerText = row + number;

        // random sold
        if (Math.random() < 0.12) seat.classList.add("sold");

        seat.onclick = () => {
          if (seat.classList.contains("sold")) return;

          seat.classList.toggle("selected");

          const seatCode = seat.innerText;
          if (selectedSeats.includes(seatCode)) {
            selectedSeats = selectedSeats.filter((s) => s !== seatCode);
          } else {
            selectedSeats.push(seatCode);
          }

          updateTotal();
        };

        rowDiv.appendChild(seat);
      }

      // ================= UPDATE TOTAL =================
      function updateTotal() {
        const total = selectedSeats.length * price;
        document.getElementById("total").innerText =
          total.toLocaleString("id-ID");
      }

      // ================= DATE & TIME =================
      function updateDateTime() {
        const now = new Date();

        const days = [
          "Sunday",
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday",
          "Saturday",
        ];
        const months = [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December",
        ];

        const dayName = days[now.getDay()];
        const date = now.getDate();
        const month = months[now.getMonth()];
        const year = now.getFullYear();

        const hours = String(now.getHours()).padStart(2, "0");
        const minutes = String(now.getMinutes()).padStart(2, "0");
        const seconds = String(now.getSeconds()).padStart(2, "0");

        document.getElementById("currentTime").innerText =
          `${hours}:${minutes}:${seconds}`;
        document.getElementById("currentDate").innerText =
          `${dayName}, ${date} ${month} ${year} • ${hours}:${minutes}`;

        localStorage.setItem("ticketSeats", JSON.stringify(selectedSeats));
        localStorage.setItem("ticketTotal", selectedSeats.length * price);
        localStorage.setItem(
          "ticketDate",
          `${dayName}, ${date} ${month} ${year}`,
        );
        localStorage.setItem("ticketTime", `${hours}:${minutes}`);
      }

      updateDateTime();
      setInterval(updateDateTime, 1000);

      // ================= GO PAYMENT =================
      function goToPayment() {
        if (selectedSeats.length === 0) {
          alert("Pilih kursi dulu yaa 😄");
          return;
        }

        window.location.href = "pembayaran.php";
      }
    </script>
  </body>
</html>
