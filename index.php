<?php
session_start();
require 'config.php';

// الحصول على معلومات المستخدم
$userId = 1; // يجب تغيير هذا ID حسب المستخدم
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute(['id' => $userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>محفظة المستخدم</title>
</head>
<body>
    <h1>محفظة المستخدم</h1>
    <p>الرصيد: <?php echo $user['balance']; ?> دولار</p>
    <a href="admin.php">لوحة التحكم</a>
</body>
</html>
