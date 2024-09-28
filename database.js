// database.js
const sqlite3 = require('sqlite3').verbose();

// إنشاء قاعدة البيانات
const db = new sqlite3.Database(':memory:');

// إنشاء جدول لتخزين الأكواد
db.serialize(() => {
    db.run("CREATE TABLE codes (id INTEGER PRIMARY KEY, code TEXT, created_at DATETIME DEFAULT CURRENT_TIMESTAMP)");
});

// دالة لتوليد كود عشوائي
function generateRandomCode() {
    return Math.random().toString(36).substr(2, 8);
}

// دالة لتوليد الأكواد وحفظها في قاعدة البيانات
function generateCodes() {
    db.serialize(() => {
        db.run("DELETE FROM codes"); // حذف الأكواد القديمة

        let stmt = db.prepare("INSERT INTO codes (code) VALUES (?)");

        for (let i = 0; i < 10; i++) {
            let code = generateRandomCode();
            stmt.run(code);
        }

        stmt.finalize();
    });
}

// دالة لجلب الأكواد من قاعدة البيانات
function getCodes(callback) {
    db.all("SELECT code FROM codes", [], (err, rows) => {
        if (err) {
            throw err;
        }
        const codes = rows.map(row => row.code);
        callback(codes);
    });
}

// تحديث الأكواد كل 10 دقائق
generateCodes();
setInterval(generateCodes, 600000); // 10 دقائق = 600000 ميلي ثانية

module.exports = {
    getCodes: getCodes
};
