// server.js
const express = require('express');
const path = require('path');
const app = express();
const db = require('./database'); // استيراد ملف قاعدة البيانات

// لعرض الملفات الثابتة (HTML, CSS, JS)
app.use(express.static(path.join(__dirname, 'public')));

// Endpoint لجلب الأكواد
app.get('/codes', (req, res) => {
    db.getCodes((codes) => {
        res.json(codes); // إرسال الأكواد كـ JSON
    });
});

// بدء السيرفر
app.listen(3000, () => {
    console.log('Server is running on http://localhost:3000');
});
