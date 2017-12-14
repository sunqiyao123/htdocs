<?php
$arr=array();
$str='';
for($i=0;$i<5;$i++){
    $arr[]=rand(0,9);
    $newarr=array_unique($arr);
    if(count($arr)==count($newarr)+1){
        array_pop($arr);
        $i--;
    }
}
for($j=0;$j<count($arr);$j++){
    $str.=$arr[$j]."&nbsp;";
}
echo $str;



