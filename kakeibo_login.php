<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/kakeibo.css">
  <title>家計簿アプリログイン画面</title>
</head>

<body>
  <form action="kakeibo_login_act.php" method="POST">
    <div class="header_title">
      <h1>家計簿アプリ</h><img src="img/images.jpg" alt="ぶたの貯金箱">
    </div>
    <p>【ユーザーログイン画面】</p>
    <p>利用時にIDとパスワードをご入力ください☺</p>

    <div>
      user_id : <input type="text"  name="user_id">
    </div>
    <div>
      password: <input type="text" name="password">
    </div>
    <div>
      <button>Login</button>
    </div>
    <a href="kakeibo_register.php">初回登録</a>
  </form>

</body>

</html>