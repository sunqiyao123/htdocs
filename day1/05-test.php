<?php

	//phpinfo();
    echo "<pre>";
	print_r($_SERVER);
	echo "</pre>";
	
	$str=$_SERVER['REQUEST_URI'];
    echo $str;

	$arr=explode('?',$str);
    print_r($arr);
    echo "<br/>";
    echo "<pre>";
    print_r($arr);//Array()
    echo "</pre>";


    $arrnext=explode('&',$arr[1]);
    echo "<pre>";
	print_r($arrnext);
	echo "</pre>";


    var_dump($_SERVER);
    echo "<br/>";
    echo "<pre>";
	var_dump($_SERVER);//array(10){}
	echo "</pre>";
?>