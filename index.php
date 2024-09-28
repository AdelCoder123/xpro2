𝐓 𝐎 𝐏 𝐎 𝐖 𝐍 𝐄 𝐑:
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لعبة الطائرة</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1b1b3a;
            color: white;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .header {
            background-color: #4e665e;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 2;
        }
        .balance {
            background-color: #0a730f;
            padding: 10px;
            border-radius: 10px;
            display: inline-block;
        }
        .id-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .id-container img {
            cursor: pointer;
            width: 20px;
            height: 20px;
        }
        .game-area {
            position: relative;
            width: 100%;
            height: 200px;
            background-color: #24244d;
            background-image: url('https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjfzgDvX3aO1c_cy0-DJR5Mh4Yu7KVmIncBXL5hocDd_8M5747yX4XBS_ZUXQ2lQ2I8RHP7N4AWYMv1cvWHEeBqz8oI-AESVxfCwBhdQ4tx2nqOTXgg76M83lX0Xn73oDjNf0hRt94MtCM_cbBpYCU_J9YVh2Q4oC4Ezs2R439NiS0CrAifR6i4Y7-NXPk/s4096/Picsart_24-08-11_18-07-36-712.jpg');
            background-size: cover;
            background-position: center;
            margin-bottom: 20px;
            overflow: hidden;
            z-index: 1;
        }
        .airplane, .end-image {
            position: absolute;
            width: 50px;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
        }
        .multiplier {
            position: absolute;
            bottom: 10px;
            right: 10px;
            font-size: 40px;
            margin: 0;
            display: none; /* إخفاء المضاعف في البداية */
        }
        .countdown {
            position: absolute;
            bottom: 10px;
            right: 10px;
            font-size: 40px;
            margin: 0;
            display: none;
            color: #fff;
            font-weight: bold;
            animation: fadeInOut 1s linear infinite;
        }
        @keyframes fadeInOut {
            0% { opacity: 1; }
            50% { opacity: 0.5; }
            100% { opacity: 1; }
        }
        .bet-section {
            margin-top: 20px;
            position: relative;
            z-index: 2;
        }
        .bet-input {
            width: 60%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 10px;
            text-align: center;
        }
        .btn {
            padding: 10px;
            margin: 5px;
            border-radius: 10px;
            cursor: pointer;
            color: white;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.3s;
            user-select: none; /* منع تحديد النص عند النقر */
        }
        .btn-orange {
            background-color: orange;
        }
        .btn-red {
            background-color: red;
        }
        .btn-disabled {
            background-color: grey;
            cursor: not-allowed;
        }
        .btn:hover:not(.btn-disabled) {
            transform: scale(1.05);
        }
        .status {
            font-size: 20px;
            margin-top: 10px;
        }
        .bet-log {
            width: 100%;
            height: 400px;
            background-color: #4e665e;
            display: flex;
            flex-direction: column;
            justify-content: space-between;

padding: 10px;
            box-sizing: border-box;
            color: white;
            font-size: 14px;
            margin-top: 20px;
            overflow: auto;
        }
        .bet-log table {
            width: 100%;
            border-collapse: collapse;
        }
        .bet-log table, .bet-log th, .bet-log td {
            border: 1px solid white;
        }
        .bet-log th, .bet-log td {
            padding: 5px;
            text-align: center;
        }
        .bet-log th {
            background-color: #3a5a40;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="balance">الرصيد: ج.م <span id="balance">100</span></div>
        <div class="id-container">
            <div id="deviceId">ID: ...</div>
            <!-- يرجى استبدال الرابط أدناه بصورة مناسبة -->
            <img src="https://example.com/icon.png" alt="رابط الصفحة" onclick="window.location.href='https://example.com';">
        </div>
    </div>
    <div class="game-area">
        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEigOb-8H2TJKMzB8z7g7NCKC2pK9pNsaKqU8QhQIz3anR2wZSnQzb4Shlf5CIQ9vdxTnPb2ceOLgkTsqqCCYNrfOVR_SJbzGj1c8atZ02BPKpbI4LX1beNKPuqXMpbNWuIuV7UkmVrgNkbrj8LNJ1jBZr-VJ3AWry9yeVSdrAqB7fH1qsOObQMGKZs3DLc/s2352/Picsart_24-08-11_17-03-05-213.png" id="airplane" class="airplane">
        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhhuoiTmDJiAg70acKmC2HP0WgxU7rOLNg_CCMT7rjxFbHsbD_b2vk7qNdiYMDX45yjDEiCgKb-lbudluylkHT-vS69_neOncRcAfEeKMNF1kQ_DyzEspOXPIjkRu38Q2K-mWWNnV3tSZG21FJWO8vWeHPwi1-fLI2_UNpCbh0oquOP-mi8oAwrW9WYqFg/s1136/Picsart_24-08-11_18-26-42-312.png" id="endImage" class="end-image" style="display: none;"> <!-- صورة نهاية اللعبة -->
        <div class="multiplier" id="multiplier">1.00x</div>
        <div id="countdown" class="countdown"></div>
    </div>
    <div class="bet-section">
        <input type="number" id="betAmount" class="bet-input" value="100" min="10" max="5000">
        <div class="btn btn-orange" id="betButton" onclick="placeBet()">وضع الرهان</div>
        <div class="status" id="status">انتظر...</div>
        <div class="btn btn-red btn-disabled" id="cashoutButton" onclick="cashout()" disabled>سحب الأرباح</div>
    </div>
    <div class="bet-log">
        <table>
            <thead>
                <tr>
                    <th>رقم الرهان</th>
                    <th>مبلغ الرهان</th>
                    <th>حالة الرهان</th>
                </tr>
            </thead>
            <tbody id="betLogBody">
                <!-- سيتم ملء الجدول بالبيانات عبر الجافاسكربت -->
            </tbody>
        </table>
    </div>
    <script>
        // توليد ID عشوائي مكون من 9 أرقام
        function generateRandomId() {
            return Math.floor(100000000 + Math.random() * 900000000);
        }

        // تعيين ID عند تحميل الصفحة
        document.addEventListener("DOMContentLoaded", () => {
            let deviceId = localStorage.getItem('deviceId');
            if (!deviceId) {
                deviceId = generateRandomId();
                localStorage.setItem('deviceId', deviceId);
            }
            document.getElementById("deviceId").innerText = ID: ${deviceId};
            
            // تعيين الرصيد عند تحميل الصفحة
            balance = parseFloat(localStorage.getItem('balance')) || 100;
            document.getElementById("balance").innerText = balance.toFixed(2);
        });

        let balance = 100;
        let multiplier = 1.00;
        let betAmount = 0;
        let gameInterval;
        let gameStarted = false;
        let hasCashedOut = false; // متغير لتتبع حالة سحب الأرباح
        let airplaneSpeed = 3; // سرعة الطائرة
        let gameEnded = false; // متغير لتتبع حالة انتهاء اللعبة
        let countdownInterval;
        let betId = 1; // معرف الرهان الذي سيتم زيادته لكل رهان

function placeBet() {
            if (gameStarted) {
                alert("اللعبة جارية بالفعل");
                return;
            }
            betAmount = parseFloat(document.getElementById("betAmount").value);
            if (isNaN(betAmount)  betAmount > balance  betAmount < 10 || betAmount > 5000) {
                alert("الرجاء إدخال مبلغ صحيح بين 10 و 5000 ج.م");
                return;
            }
            balance -= betAmount;
            localStorage.setItem('balance', balance.toFixed(2)); // حفظ الرصيد في التخزين المحلي
            document.getElementById("balance").innerText = balance.toFixed(2);
            document.getElementById("status").innerText = "العد التنازلي يبدأ الآن...";
            document.getElementById("betButton").classList.add("btn-disabled");
            document.getElementById("cashoutButton").classList.remove("btn-disabled");
            document.getElementById("cashoutButton").removeAttribute("disabled");
            document.getElementById("multiplier").style.display = 'none'; // إخفاء عدد المضاعفة
            document.getElementById("countdown").style.display = 'block'; // عرض العد التنازلي
            startCountdown();
            gameStarted = true; // تعيين حالة اللعبة على أنها بدأت
        }

        function startCountdown() {
            let timeLeft = 10; // ثواني
            document.getElementById("countdown").innerText = ${timeLeft};
            countdownInterval = setInterval(() => {
                timeLeft--;
                document.getElementById("countdown").innerText = ${timeLeft};
                if (timeLeft <= 0) {
                    clearInterval(countdownInterval);
                    document.getElementById("countdown").style.display = 'none'; // إخفاء العد التنازلي
                    document.getElementById("multiplier").style.display = 'block'; // عرض عدد المضاعفة
                    document.getElementById("status").innerText = "اللعبة تبدأ الآن...";
                    startGame();
                }
            }, 1000);
        }

        function startGame() {
            multiplier = 1.00;
            document.getElementById("multiplier").innerText = ${multiplier.toFixed(2)}x;
            let airplane = document.getElementById("airplane");
            let endImage = document.getElementById("endImage");
            airplane.style.left = "0px"; // ابدأ من اليسار
            endImage.style.display = 'none'; // تأكد من إخفاء صورة النهاية في البداية
            gameEnded = false; // إعادة تعيين حالة انتهاء اللعبة
            gameInterval = setInterval(() => {
                multiplier += 0.01;
                document.getElementById("multiplier").innerText = ${multiplier.toFixed(2)}x;
                airplane.style.left = (parseInt(airplane.style.left) + airplaneSpeed) + "px";
                if (Math.random() < 0.01) {  // احتمال انفجار الطائرة
                    clearInterval(gameInterval);
                    gameOver();
                }
                // إذا خرجت الطائرة من الشاشة
                if (parseInt(airplane.style.left) > window.innerWidth) {
                    clearInterval(gameInterval);
                    gameOver();
                }
            }, 100);
        }

        function gameOver() {
            gameEnded = true;
            let airplane = document.getElementById("airplane");
            let endImage = document.getElementById("endImage");
            // ضبط موقع صورة النهاية ليكون في نفس موقع الطائرة عند الانفجار
            endImage.style.left = airplane.style.left;
            endImage.style.top = airplane.style.top;
            endImage.style.display = 'block'; // عرض صورة النهاية
            document.getElementById("status").innerText = "انفجرت الطائرة! خسرت الرهان.";
            document.getElementById("cashoutButton").classList.add("btn-disabled");

document.getElementById("cashoutButton").setAttribute("disabled", true); // تعطيل زر سحب الأرباح
            document.getElementById("betButton").classList.remove("btn-disabled");
            hasCashedOut = false; // إعادة تعيين حالة سحب الأرباح
            gameStarted = false;
            logBet("خسارة"); // تسجيل حالة الخسارة
        }

        function cashout() {
            if (gameEnded) {
                alert("لا يمكنك سحب الأرباح بعد انتهاء اللعبة.");
                return;
            }
            if (hasCashedOut) {
                alert("لقد سحبت أرباحك بالفعل.");
                return;
            }
            clearInterval(gameInterval);
            let winnings = betAmount * multiplier;
            balance += winnings;
            localStorage.setItem('balance', balance.toFixed(2)); // حفظ الرصيد في التخزين المحلي
            document.getElementById("balance").innerText = balance.toFixed(2);
            document.getElementById("status").innerText = لقد سحبت أرباحك: ج.م ${winnings.toFixed(2)};
            document.getElementById("cashoutButton").classList.add("btn-disabled");
            document.getElementById("cashoutButton").setAttribute("disabled", true);
            document.getElementById("betButton").classList.remove("btn-disabled");
            hasCashedOut = true; // تعيين الحالة على أنه تم سحب الأرباح
            gameStarted = false;
            logBet("فوز"); // تسجيل حالة الفوز
        }

        function logBet(result) {
            const betLogBody = document.getElementById("betLogBody");
            const row = document.createElement("tr");
            row.innerHTML = 
                <td>${betId}</td>
                <td>${betAmount.toFixed(2)}</td>
                <td>${result}</td>
            ;
            betLogBody.prepend(row); // إضافة السطر في الأعلى بدلاً من الأسفل
            betId++; // زيادة معرف الرهان
        }
    </script>
</body>
</html>