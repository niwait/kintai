
<?php

require_once("db.php");
//今までDB.ｐｈｐでしか使えなかった物がセンドでも使えるようになった。
class time extends DB{
  //SELECT文
  function find($filter=""){
    $select = $this->conectobject->query("SELECT
      send_tb.name,
      time.id,
      time.get_time,
      time.out_time,
      time.over_time,
      CAST(get_time AS DATE) as date_time
      FROM time INNER JOIN send_tb ON time.user_id = send_tb.id".$filter);
      //CASTは日付けに変換している。gettimeを日付に
      //gettimeだと日付けと日時が一緒に入ってしまう為
      //datetimeに変更して日付と日時を分けた別のカラムを返却した
      //空の要素を入れないとarraypushができないので入れる
      $result=[];

      //データベースから取得した値をforeachで回す
      if (empty($select)) {
        return $result;
      }
      foreach ($select as $key => $value) {
      $value['getput_time']="";
      $value['output_time']="";


         if (!empty($value['get_time'])) {
           preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2} ([0-9]{2}:[0-9]{2}:[0-9]{2})$/', $value['get_time'],$putmatched );
           preg_match('/^([0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}):[0-9]{2}$/', $value['get_time'],$matched );
           $value['get_time'] = str_replace(' ', 'T', $matched[1]);
           $value['getput_time']=$putmatched[1];
         }


         if (!empty($value['out_time'])) {
           preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2} ([0-9]{2}:[0-9]{2}:[0-9]{2})$/', $value['out_time'],$putmatched );
           preg_match('/^([0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}):[0-9]{2}$/', $value['out_time'],$matched );
             $value['out_time'] = str_replace(' ', 'T', $matched[1]);
             $value['output_time']=$putmatched[1];
         }
        //matchのなかに入れる
        //preg_match左は0　右は１
        //シフト一覧で出すデータ
        //preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2} ([0-9]{2}:[0-9]{2}:[0-9]{2})$/', $value['get_time'],$putmatched );
        //年月日分まで入れている$matide
        //preg_match('/^([0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}):[0-9]{2}$/', $value['get_time'],$matched );
        //$value['get_time']の中のーを／に置き換えた
        //$value['get_time'] = str_replace(' ', 'T', $value['get_time']);
        //matched[1]に
        //$value['get_time'] = str_replace(' ', 'T', $matched[1]);
        //0から9が3つ続いてるものをマッチしたものを取得
        //$value['getput_time']=$putmatched[1];

        //matchのなかに入れる
        //preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2} ([0-9]{2}:[0-9]{2}:[0-9]{2})$/', $value['out_time'],$putmatched );
        //preg_match('/^([0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}):[0-9]{2}$/', $value['out_time'],$matched );
        //0から9が3つ続いてるものをマッチしたものを取得
          //$value['out_time'] = str_replace(' ', 'T', $matched[1]);
        //  $value['output_time']=$putmatched[1];
        //rearutにvalueを入れた
        array_push($result, $value);
      }

      return $result;
    }



    //INSERT文
    function add($user,$gettime="null",$outtime="null",$overtime="null"){
      //gettimeがnullだった場合nullを代入している
      if ($gettime!="null") {
        $gettime="'".$gettime."'";
      }
      if ($outtime!="null") {
        $outtime="'".$outtime."'";
      }

   

      $this->conectobject->query(
            
        sprintf(
          "INSERT INTO time VALUES(%s,'%s',%s,%s,%s)",
          "null",
          $user,$gettime,$outtime,$overtime
          )
        );
      }

      //アップデート文
      function update($id,$gettime="null",$outtime="null",$overtime="null"){
        $this->conectobject->query(
          sprintf(
            "UPDATE time SET `get_time`='%s',`out_time`='%s',`over_time`='%s' WHERE id=%s",
            $gettime,$outtime,$overtime,$id
            )
          );
        }
      }
      ?>
