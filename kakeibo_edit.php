<?php
// 送信データのチェック
// var_dump($_GET);
// exit();

// 関数ファイルの読み込み
include("functions.php");
 

// idの受け取り
$id = $_GET['id'];

// DB接続
$pdo = connect_to_db();  



// データ取得SQL作成
$sql = 'SELECT * FROM kakeibo_table WHERE id=:id';  
$stmt = $pdo->prepare($sql);  
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  
$status = $stmt->execute();

// SQL準備&実行
$sql = '';



// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 正常にSQLが実行された場合は指定の11レコードを取得
  // fetch()関数でSQLで取得したレコードを取得できる
  $record = $stmt->fetch(PDO::FETCH_ASSOC); 
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/kakeibo.css">
  <title>家計簿アプリ（編集画面）</title>
</head>

<body>
  <form action="kakeibo_update.php" method="POST">
   <input type="hidden" name="id" value="<?=$record['id']?>">
   <div class="header_title"> 
      <h1>家計簿アプリ</h1>
   </div>    
      <p>（編集画面）</p>
      <a href="kakeibo_read.php">一覧画面</a>

      <div class="budget">
      ☺ 予　算 : <select name="budget" value="<?= $record["budget"] ?>">
        <option value="200000">200,000</option>
        <option value="190000">190,000</option>
        <option value="180000">180,000</option>
        <option value="170000">170,000</option>
        </select> 円
    </div>

    <div class="date">
      ☺ 日　付 : <input type="date" name="deadline" value="<?= $record["deadline"] ?>">
    </div>

    <div class="items">
      ☺ 項　目 : <select name="items" value="<?= $record["items"] ?>">
        <option value="固定費">固定費（住宅費、水道光熱費など）</option>
        <option value="食費">食費（自炊のための食材購入費）</option>
        <option value="外食費">外食費</option>
        <option value="日用品費">日用品費</option>
        <option value="被服・美容費">被服・美容費</option>
        <option value="娯楽費">娯楽費</option>
        <option value="交通費">交通費</option>
        <option value="医療費">医療費</option>
        </select>
    </div>

    <div class="amount">
      ☺ 金　額 : <input type="nubemr" name="amount" value="<?= $record["amount"] ?>"> 円
    </div>

    <div class="spending">
      ☺ 支出入 :<select name="spending" value="<?= $record["spending"] ?>">
        <option value="支出">支出</option>
        <option value="収入">収入</option>
        </select>
    </div>

      <div>
        <button>送信する</button>
      </div>
  </form>

  <!-- <script>
    /* テキストボックスを取得 */
    var NBR = document.querySelectorAll( "[data-type='number']" );
    /* イベント操作 */
    for(var i=0;i<NBR.length;i++){ NBR[ i ].oninput = fmtInput }

    /* 入力時に実行する処理 */
    function fmtInput( evt ){
    var target = evt.target;
    var data = target.value[ target.value.length-1 ];
    if( ! data.match( /[0-9]/ ) ){
    target.value = target.value.slice( 0, target.value.length-1 );
    }
    target.value = target.value
    .replace( /,/g, '' )
    .replace( /(\d)(?=(\d\d\d)+(?!\d))/g, '$1,' );
    }
  </script> -->

</body>

</html>