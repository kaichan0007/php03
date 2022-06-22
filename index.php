<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
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
<form method="POST" action="insert.php">
  <div class="jumbotron">
   <fieldset>
   <legend>該当日付の適時開示情報を記録します。</legend>
     <label>日付(yyyymmdd): <input type="text" name="date"></label><br>
     <label>会社コード: <input type="text" name="company_code"></label><br>
     <label>検索キーワード: <input type="text" name="search_key"></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
