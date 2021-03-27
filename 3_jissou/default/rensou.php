<?php

//連想配列
//testにnameという値が入りその中にtarouがいる
$test=[ 
"name"=>"tarou",
"kana"=>"kana"  
];

foreach($test as $key=>$value){
  echo $key.":".$value."<br>";
}


?>