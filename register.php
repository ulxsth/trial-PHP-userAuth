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

// パスワードとパスワード確認が一致しているか
if ($_POST['password'] !== $_POST['password_confirm']) {
    echo 'パスワードとパスワード確認が一致しません。';
    exit;
}

// ユーザー名が既に登録されていないか
$stmt = $db->prepare('SELECT COUNT(*) FROM users WHERE name = ?');
$stmt->execute([$_POST['name']]);
if ($stmt->fetchColumn() > 0) {
    echo 'ユーザー名が既に使用されています。';
    exit;
}


// ユーザー登録
$stmt = $db->prepare('INSERT INTO users (name, password) VALUES (?, ?)');
$stmt->execute([$_POST['name'], password_hash($_POST['password'], PASSWORD_DEFAULT)]); // パスワードは暗号化して保存
echo 'ユーザー登録が完了しました。';

// 登録完了後にtop.phpに遷移
header('Location: top.php');
exit;
?>
