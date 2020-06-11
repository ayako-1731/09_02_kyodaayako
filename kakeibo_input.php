<?php
session_start();
include('functions.php');
check_session_id();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/kakeibo.css">
  <title>家計簿アプリ</title>
</head>

<body>
  <form action="kakeibo_create.php" method="POST">
    <div class="header_title">
      <h1>家計簿アプリ</h><img src="img/images.jpg" alt="ぶたの貯金箱">
    </div>
    
    <div class="budget">
      ☺ 予　算 : <select type="number" name="budget">
        <option value="0" selected>今月の予算を選択</option>
        <option value="200000">200,000</option>
        <option value="190000">190,000</option>
        <option value="180000">180,000</option>
        <option value="170000">170,000</option>
        </select> 円
    </div>

    <div class="date">
      ☺ 日　付 : <input type="date" name="deadline">
    </div>

    <div class="items">
      ☺ 項　目 : <select type="text" name="items">
        <option value="選択肢" selected>項目を選択</option>
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
      ☺ 金　額 : <input type="number" name="amount" > 円
    </div>

    <div class="spending">
      ☺ 支出入 : <select type="text" name="spending">
        <option value="支出">支出</option>
        <option value="収入">収入</option>
        </select>
    </div>

    <div>
      <button>送信する</button>
    </div>
    <a href="kakeibo_read.php">登録確認画面</a>
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