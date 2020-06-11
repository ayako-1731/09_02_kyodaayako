<?php
session_start();
include('functions.php'); 
check_session_id();

// DB接続の設定

 $pdo = connect_to_db();
// DB名は`gsacf_x00_00`にする
// $dbn = 'mysql:dbname=YOUR_DB_NAME;charset=utf8;port=3306;host=localhost';
// $user = 'root';
// $pwd = '';

// try {
//   // ここでDB接続処理を実行する
//   $pdo = new PDO($dbn, $user, $pwd);
// } catch (PDOException $e) {
//   // DB接続に失敗した場合はここでエラーを出力し，以降の処理を中止する
//   echo json_encode(["db error" => "{$e->getMessage()}"]);
//   exit();
// }

// データ取得SQL作成
$sql = 'SELECT * FROM kakeibo_table';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データ登録処理後
$view='';
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  // fetchAll()関数でSQLで取得したレコードを配列で取得できる
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
  $output = "";
  // <tr><td>deadline</td><td>todo</td><tr>の形になるようにforeachで順番に$outputへデータを追加
  // `.=`は後ろに文字列を追加する，の意味
  foreach ($result as $record) {
    $output .= "<tr>";
    $output .= "<td>{$record["budget"]}</td>";
    $output .= "<td>{$record["deadline"]}</td>";
    $output .= "<td>{$record["items"]}</td>";
    $output .= "<td>{$record["amount"]}</td>";
    $output .= "<td>{$record["spending"]}</td>";

    // edit deleteリンクを追加
    $output .= "<td><a href='kakeibo_edit.php?id={$record["id"]}'>編集</a></td>";    
    $output .= "<td>                
                <a href='kakeibo_delete.php?id={$record["id"]}'>消去</a></td>";
    $output .= "</tr>";
  }
  // $valueの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
  // 今回は以降foreachしないので影響なし
//   unset($record);
}  
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/kakeibo.css">
  <title>家計簿履歴（一覧画面）</title>
</head>

<body>
  <div>

  <div class="header_title"> 
    <h1>家計簿履歴</h1>
  </div>   
    <div id="tbl_bdr">
      <table width="100%">
        <thead>
          <tr>
            <th>予  算</th>
            <th>日  付</th>
            <th>項  目</th>
            <th>金  額</th>
            <th>支出入</th>
            <th>操 作①</th>
            <th>操 作②</th>
          </tr>
        </thead>
        <tbody>
          <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
          <?= $output ?>
        </tbody>
     </table>
    </div> 
    <p>合計金額 : <input type="number" name="sum_number"></input> 円</p>

    </p><a href="kakeibo_input.php">入力画面</a>
    </p><a href="kakeibo_logout.php">ログアウト</a>
    <p>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="./js/highcharts.js"></script>
    <script type="text/javascript" src="./js/chart.js"></script> -->

    <!-- <div id="container"></div>

    <script>
      $(function () {
        $('#container').highcharts({
          chart: {
            width:500,
            heigth:300
          },
          title: {
            text: 'Monthly Average Temperature',
            x: -20 //center
          },
          subtitle: {
            text: 'Source: WorldClimate.com',
            x: -20
          },
          xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
              'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
          },
          yAxis: {
            title: {
              text: 'Temperature (°C)'
            },
            plotLines: [{
              value: 0,
              width: 1,
              color: '#808080'
            }]
          },
          tooltip: {
            valueSuffix: '°C'
          },
          legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
          },
          series: [{
            name: 'Tokyo',
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
          }, {
            name: 'New York',
            data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
          }, {
            name: 'Berlin',
            data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
          }, {
            name: 'London',
            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
          }]
        });
      });
    </script> -->

</body>

</html>