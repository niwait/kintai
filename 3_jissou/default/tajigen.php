<?php

//連想配列
//testにnameという値が入りその中にtarouがいる
$test=[
  ["山田",20,"女"],
  ["加藤",18,"男"]
];

foreach($test as $key=>$value){
  foreach($value as $testkey=>$testvalue){
    echo $testkey."-".$testvalue."<br>";
  
  }
}

foreach($test as $key=>$value){
  echo $value."=".$key;
}






?>