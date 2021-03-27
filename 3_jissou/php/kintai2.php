<?php
require_once('../DB/config.php');
require_once('../DB/senddb.php');
session_start();
//初期化　ポストがない時の初期値
$email="";
$password="";
if(!empty($_POST["test"])){
  //リダイレクト処理ポストしてきたかどうかに確認

  $email = $_POST["test"]["email"];
  $password = $_POST["test"]["password"];
}
//if (!empty($_POST["email"])and !empty($_POST["password"])){


if (!empty($_POST["test"])){
  //dbに接続
  $senddb = new senddb($host,$dbname,$user,$pass);
  $senddb->connect();
  //postのデータをフィルターに入れてる検索をかけている
  //sprintf
  $filter=sprintf(" WHERE `email`='%s' and `password`='%s' "
  ,$_POST["test"]['email'],$_POST['test']['password']);
  //doneの名前とEmailとパスワードを入れている
  $result=$senddb->find($filter);

  //登録していて検索結果が1の人
  if ($result->rowCount()== 1){
    
    //0番目の何々みたいな値の取得ができないからfetchAll()オブジェクトを配列に変換している
    //一番最初の要素の指定
    $result=$result->fetchAll();
    //同じメールアドレスidを持っている人は一人しかいない
    $_SESSION["id"] = $result[0]["id"];
    $_SESSION["name"] = $result[0]["name"];
    $_SESSION["kana"] = $result[0]["kana"];
    $_SESSION["tel"] = $result[0]["tel"];
    $_SESSION["email"] = $result[0]["email"];
    $_SESSION["password"] = $result[0]["password"];
    //header('Location: kintai.php');
    //exit();
    //何もしないことでログインができる
  }
}
if (empty($_SESSION["id"])) {
  header('Location: done.php');
}




?>
<!DOCTYPE html>

<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="keywords"content="キーワード","">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
  </script>
  <script type="text/javascript">

  //ajax非同期通信
  //時間の取得
  //ボタンを押したら
  //ボタンを押したタイミングの初期値
  //$inputnowstring通知メッセージの初期値
  //$inputtime出勤時間の初期値

  var time =  $(function(){
    $('.work').on('click',function(){

      if(
        $(this).hasClass('ax')){                <!--axがいたら-->
          $(".work").removeClass("ax");      <!-- 消す-->
        }
        else{                             <!--axがいなかったら-->
          $(".work").removeClass("ax");    <!-- 消す-->
          $(this).addClass("ax");               <!-- 付ける-->
        }
        var $inputnow = new Date();    //$inputnowに今の日付
        var $inputnowstring = "";
        var $inputtime ="";
        $inputtime=
        //データベースに入りやすいように整形している
        $inputnow.getFullYear()+"-"+
        + ($inputnow.getMonth()+1)+"-"+
        + $inputnow.getDate()+" "+
        + $inputnow.getHours()+":"+
        + $inputnow.getMinutes()+":"+
        + $inputnow.getSeconds();

        $inputnowstring=
        //通知できるように整形している
        $inputnow.getFullYear()+"年"+
        + ($inputnow.getMonth()+1)+"年"+
        + $inputnow.getDate()+"日"+
        + $inputnow.getHours()+"時"+
        + $inputnow.getMinutes()+"分"+
        + $inputnow.getSeconds()+"秒";
        //表示
        alert($inputnowstring);
        //jabasquriptがphpを実行するためにajaxを使っている
        $.ajax({
          url: 'http://localhost/jisaku_git/db/send-time.php?date=0309',
          type: 'POST',
          data: {
            user_id: '<?php echo $_SESSION['id'];?>',
            //押したときの時間をinputtimeに入れている
            gettime: $inputtime,
            outtime: 'null',
            overtime: 'null'
          },
          //json形式
          dataType: 'jsom'
        })
        //成功失敗両方
        .always(function( data ) {
          console.log('実行しました。');
          console.log(data);
        });
      });
    });


    var time =  $(function(){
      $('.departure').on('click',function(){
        if(
          $(this).hasClass('bx')){                <!--axがいたら-->
            $(".departure").removeClass("bx");      <!-- 消す-->
          }
          else{                             <!--axがいなかったら-->
            $(".departure").removeClass("bx");    <!-- 消す-->
            $(this).addClass("bx");               <!-- 付ける-->
          }
          var $inputnow = new Date();
          var $inputnowstring = "";
          var $inputtime ="";
          $inputtime=
          $inputnow.getFullYear()+"-"+
          + ($inputnow.getMonth()+1)+"-"+
          + $inputnow.getDate()+" "+
          + $inputnow.getHours()+":"+
          + $inputnow.getMinutes()+":"+
          + $inputnow.getSeconds();

          $inputnowstring=
          $inputnow.getFullYear()+"年"+
          + ($inputnow.getMonth()+1)+"年"+
          + $inputnow.getDate()+"日"+
          + $inputnow.getHours()+"時"+
          + $inputnow.getMinutes()+"分"+
          + $inputnow.getSeconds()+"秒";
          alert($inputnowstring);
          $.ajax({
            url: 'http://localhost/jisaku_git/db/send-time.php?date=0309',
            type: 'POST',
            data: {
              user_id: '<?php echo $_SESSION['id'];?>',
              gettime: 'null',
              outtime: $inputtime,
              overtime: 'null'
            },
            dataType: 'jsom'
          })
          //失敗しても成功しても
          .always(function( data ) {
            console.log('実行しました。');
            console.log(data);
          });
        });
      });

      </script>


      <title>Lesson1</title>
      <link rel="stylesheet" href="../css/kinta.css">
      <body>

        <nav id="nav" class="nav">
          <li><a href="sift.php">シフト管理</a></li>
          <li><a href="kintai.php">出退勤管理</a></li>
          <li><a href="user-info.php">ユーザー情報</a></li>
          <li><a href="send.php">ログアウト</a></li>
        </nav>

        <div id="attendance">
          <h2 id="font1">出退勤登録</h2>
          <div class="work">
            <p>出勤</p>
          </div>
          <div class="departure">
            <p>退勤</p>
          </div>
        </div>

      </body>
      </html>
