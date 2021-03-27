
<?php
session_start();
require_once('../DB/config.php');
require_once('../DB/senddb.php');


if(!empty($_POST["test"])){
  $senddb = new senddb($host,$dbname,$user,$pass);
  $senddb->connect();

  $filter=sprintf(
    " WHERE email='%s' and password='%s'",
    $_POST["test"]["email"],
    $_POST["test"]["password"]
  );

  //メールとパスワードをもとにした検索結果
  $result=$senddb->find($filter);
    if($result->rowCount()==1){
      //rowCounは件数の確認
      //DBの値はオブジェクト型で帰ってくるのでfetchAll();で配列に変更する
      $result=$result->fetchAll();
      $_SESSION['test']["id"] = $result[0]["id"];
      $_SESSION['test']["name"] = $result[0]["name"];
      $_SESSION['test']["gender"] = $result[0]["gender"];
      $_SESSION['test']["email"] = $result[0]["email"];
      $_SESSION['test']["tel"] = $result[0]["tel"];
      $_SESSION['test']["birth"] = $result[0]["birth"];
      $_SESSION['test']["riyu"] = $result[0]["riyu"];
      $_SESSION['test']["password"] = $result[0]["password"];
      $_SESSION['test']["blood"] = $result[0]["blood"];
      $_SESSION['test']["user_img"] = $result[0]["user_img"];
      header('Location: kintai.php');
    }
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="keywords"content="キーワード">
  <title>Lesson1</title>
  <link rel="stylesheet" href="../css/check.css">
  <body>
    <div>
      <div id="send">
        <h1>完了</h1>
        <p>ログインしてください。</p>
        <form action="#" method="post">

          <div class="cp_iptxt">
            <label class="ef">
              
              <input type="text" name="test[email]" placeholder="メールアドレス">
              <input type="text" name="test[password]" placeholder="パスワード">
              <button id="button" type="submit">ログイン</button>
              
            </label>
          </div>
        </form>
        <button onclick="location.href='send.php'">新規登録へ</button>
      </div>
    </div>
  </body>
  </html>
