<?php
session_start();
require 'config.php';

// إضافة الأموال للمستخدم
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_money'])) {
    $userId = $_POST['user_id'];
    $amount = $_POST['amount'];

    $stmt = $pdo->prepare("UPDATE users SET balance = balance + :amount WHERE id = :id");
    $stmt->execute(['amount' => $amount, 'id' => $userId]);
}

// إنشاء خطة جديدة
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create_plan'])) {
    $planName = $_POST['plan_name'];
    $stmt = $pdo->prepare("INSERT INTO plans (name) VALUES (:name)");
    $stmt->execute(['name' => $planName]);
}

// استعراض المستخدمين
$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم</title>
</head>
<body>
    <h1>لوحة التحكم</h1>

    <h2>إضافة أموال للمستخدم</h2>
    <form method="POST">
        <select name="user_id">
            <?php foreach ($users as $user): ?>
                <option value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="number" name="amount" required>
        <button type="submit" name="add_money">إضافة أموال</button>
    </form>

    <h2>إنشاء خطة جديدة</h2>
    <form method="POST">
        <input type="text" name="plan_name" required>
        <button type="submit" name="create_plan">إنشاء خطة</button>
    </form>

    <h2>قائمة المستخدمين</h2>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?php echo $user['name'] . " - " . $user['balance'] . " دولار"; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
