<?php
?>

<!DOCTYPE html>
<head>
<html lang="ja">
  <meta charset="UTF-8">
  <meta name="keywords"content="キーワード">
  <title>Lesson1</title>
  <link rel="stylesheet" href="../css/send.css">
  <body>
    <div>
  
      <div id="send">

        <h1>新規登録</h1>
        <!--自分自身にポストする-->
        <!--value=$_POSTsend[name]-->
        <form action="#" method="post">
          <div class="cp_iptxt">
            <label class="ef">
              <input type="text" name="" placeholder="お名前">
              <lavel><input type="radio" name="" placeholder="男" value="" checked>男</lavel>
              <lavel><input type="radio" name="" placeholder="女" value="">女</lavel>
              <input type="text" name="" placeholder="メールアドレス">
              <input type="text" name="" placeholder="電話番号">
              <input type="date" name="" placeholder="生年">

              <input type="checkbox" name="" value="面白い" checked="checked" class="check">面白い
              <input type="checkbox" name="" value="役に立つ" class="check">役に立つ
              <input type="checkbox" name="" value="いまいち" class="check">いまいち

              <input type="password" name="" placeholder="パスワード">
              <p>血液型</p>
              <select name="" id="option">
              </select>
              <br>
              <button id="button" type="submit">送信</button>
            </label>
            </form>

            <form action="done.php">
              <button id="button" type="submit"><a href="">ログイン</a></button>
            </form>
          </div>
      </div>
    </div>
  </body>
  </html>
