<!DOCTYPE html>
 
<html lang="ja">
 
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>test</title>
</head>
<body>
  <h1>ログイン画面</h1>
  <form action="./payslip.php" method="POST">
    <label for=""><span>メールアドレス</span>
      <input type="email" name="email" id=""><br>
    </label>
    <label for=""><span>パスワード</span>
      <input type="password" name="password" id=""><br>
    </label>
    <input type="hidden" name="check" value="check">
    <input type="submit" value="送信">
  </form>
</body>
</html>
