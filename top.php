<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOP</title>
</head>
<body>
    <!-- ログイン画面 -->
    <h1>ログイン</h1>
    <form action="login.php" method="post">
        <input type="text" name="name" placeholder="ユーザー名">
        <input type="password" name="password" placeholder="パスワード">
        <input type="submit" value="ログイン">
    </form>

    <!-- 新規登録画面 -->
    <h1>新規登録</h1>
    <form action="register.php" method="post">
        <input type="text" name="name" placeholder="ユーザー名">
        <input type="password" name="password" placeholder="パスワード">
        <input type="password" name="password_confirm" placeholder="パスワード確認">
        <input type="submit" value="新規登録">
    </form>
</body>
</html>
