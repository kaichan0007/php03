<?php
//１．PHP
//select.phpの[PHPコードだけ！]をマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。

$id = $_GET["id"];

include("funcs.php");  //funcs.phpを読み込む（関数群）
$pdo = db_conn();      //DB接続関数

//２．データ登録SQL作成
$stmt   = $pdo->prepare("SELECT * FROM gs_bm_table WHERE num=:id" ); //SQLをセット
$stmt->bindValue(':id',   $id,    PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //SQLを実行→エラーの場合falseを$statusに代入

//３．データ表示
$view=""; //HTML文字列作り、入れる変数
if($status==false) {
  //SQLエラーの場合
  sql_error($stmt);
}else{
  //SQL成功の場合
  $row = $stmt->fetch();
  //var_dump($row);
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="update.php">
  <div class="jumbotron">
   <fieldset>
   <legend>該当日付の適時開示情報を記録します。</legend>
     <label>会社名: <input type="text" name="c_name" value="<?=$row["c_name"]?>"></label><br>
     <label>タイトル: <input type="text" name="title" value="<?=$row["title"]?>"></label><br>
     <label>URL: <input type="text" name="url" value="<?=$row["url"]?>"></label><br>
     <label>内容: <input type="text" name="content" value="<?=$row["content"]?>"></label><br>
     <label>キーワード数: <input type="text" name="count" value="<?=$row["count"]?>"></label><br>
     <!-- idを隠して送信 -->
     <input type="hidden" name="id" value="<?=$row["num"]?>">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>




