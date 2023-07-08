<?php
// データベースに接続
$db = new PDO('sqlite:blog.db');

// テーブル作成
$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    password TEXT NOT NULL
)");

// ユーザー名とパスワードが入力されているか
if (empty($_POST['name']) || empty($_POST['password'])) {
    echo 'ユーザー名かパスワードが未入力です。';
    exit;
}

// ユーザー名とパスワードが一致するか
$stmt = $db->prepare('SELECT * FROM users WHERE name = ?');
$stmt->execute([$_POST['name']]);
$user = $stmt->fetch();                                                  // ユーザー情報を取得
if (!$user || !password_verify($_POST['password'], $user['password'])) {
    echo 'ユーザー名かパスワードが間違っています。';
    exit;
}

// セッションにユーザーIDをセット
session_start();
$_SESSION['id'] = $user['id'];
$_SESSION['time'] = time();

// ログイン完了後にdashboard.phpに遷移
header('Location: dashboard.php');
exit;
?>
