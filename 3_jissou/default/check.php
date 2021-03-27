<?php

?>






<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="keywords"content="キーワード">
  <title>Lesson1</title>
  <link rel="stylesheet" href="../css/send.css">

  <body>
    <div>
      <div id="send">

        <h1>確認</h1>
        <p>こちらでよろしいでしょうか？</p>
        <p>登録ボタンを押してください。</p>
        <form action="#" method="post">
          <div class="cp_iptxt">
          <label class="ef">
              <input type="text" name="send[name]" value="<?php echo $name; ?>">

              <lavel><input type="radio" name="" value="男" >男</lavel>
              <lavel><input type="radio" name="" value="女">女</lavel>
              <input type="text" name="" value="">
              <input type="text" name="" value="">
              <input type="date" name="" value="">
              <input type="checkbox" name="" value="面白い"  class="check"  value="" >面白い
              <input type="checkbox" name="" value="役に立つ" class="check" value="">役に立つ
              <input type="checkbox" name="" value="いまいち" class="check"  value="">いまいち
              <input type="password" name="" value="">
              <p>血液型</p>
              <select name="" id="option">
              <option value="A">A型</option>
              <option value="B">B型</option>
              <option value="O">O型</option>
              <option value="AB">AB型</option>
              </select></p>
              <br>
              <button id="button" type="submit" name="" value="送信">送信</button>
            </label>
          </div>
        </form>
      </div>
    </div>
  </body>
  </html>
