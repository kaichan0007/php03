<?php
//1. POSTデータ取得
$c_name   = $_POST["c_name"];
$title  = $_POST["title"];
$url = $_POST["url"];
$content    = $_POST["content"];   //今回追加してます
$count = $_POST["count"];
$id    = $_POST["id"];   //idを取得

//2. DB接続します
include("funcs.php");  //funcs.phpを読み込む（関数群）
$pdo = db_conn();      //DB接続関数


//３．データ登録SQL作成
$sql = "update gs_bm_table set c_name=:c_name, title=:title, url=:url, content=:content, count=:count where num=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':c_name',  $c_name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':title', $title,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url',   $url,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':content',$content, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':count',$count, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',$id,  PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{
    redirect("select.php");
}

?>
