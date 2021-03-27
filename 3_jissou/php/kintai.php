<?php
//dbの情報を持ってくる
require_once('../DB/config.php');
require_once('../DB/senddb.php');
require_once('../inc/login.php');





?>
<!DOCTYPE html>

<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="keywords"content="キーワード">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
  </script>


  <script type="text/javascript">

  //ajax非同期通信
  //時間の取得
  //ボタンを押したら
  //ボタンを押したタイミングの初期値
  //$inputnowstring通知メッセージの初期値
  //$inputtime出勤時間の初期値
  
  $(function(){
    $('.work').on('click',function(){
      if(
        $(this).hasClass('ax')){                <!--axがいたら-->
          $(".work").removeClass("ax");      <!-- 消す-->
        }
        else{                             <!--axがいなかったら-->
          $(".work").removeClass("ax");    <!-- 消す-->
          $(this).addClass("ax");               <!-- 付ける-->
        }
     
    $test =  new Date($.now()).getFullYear()+"-"+
        + (new Date($.now()).getMonth()+1)+"-"+
        + new Date($.now()).getDate()+" "+
        + (new Date($.now()).getHours())+":"+
        + new Date($.now()).getMinutes()+":"+
        + new Date($.now()).getSeconds();
  
        $.ajax({
          //?date=0309に意味がなくキャッシュを残さないようにしている
          url: 'http://localhost/test/3_jissou/DB/send-time.php?date=0309',
          type: 'POST',
          data: {
            user_id: '<?php echo $_SESSION['test']['id'];?>',
            //押したときの時間をinputtimeに入れている
            gettime: $test,
            outtime: 'null',
            overtime: 'null'
          },
          //json形式
          dataType: 'jsom'
        })
        //成功失敗両方
        .always(function( data ) {
          alert($test);     
        });
    
     });


     $('.departure').on('click',function(){
    
     
    $test =  new Date($.now()).getFullYear()+"-"+
        + (new Date($.now()).getMonth()+1)+"-"+
        + new Date($.now()).getDate()+" "+
        + (new Date($.now()).getHours())+":"+
        + new Date($.now()).getMinutes()+":"+
        + new Date($.now()).getSeconds();
  
        $.ajax({
          //?date=0309に意味がなくキャッシュを残さないようにしている
          url: 'http://localhost/test/3_jissou/DB/send-time.php?date=0309',
          type: 'POST',
          data: {
            user_id: '<?php echo $_SESSION['test']['id'];?>',
            //押したときの時間をinputtimeに入れている
            gettime: 'null',
            outtime: $test,
            overtime: 'null'
          },
          //json形式
          dataType: 'jsom'
        })
        //成功失敗両方
        .always(function( data ) {
          alert($test);     
        });
    
     });    
  });


  
  

    
  
</script>

      <title>Lesson1</title>
      <link rel="stylesheet" href="../css/kinta.css">
      <body>

      <?php require_once('../inc/nav.php');?>
      
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
