<?php
	//PHP数据类型 
	//四个标量类型  int float string bool
          //两个复合类型 array object
         // 两个特殊类型  resource  null
    
         
    //var_dump

    $name="laoshan";
	var_dump($name);
	
	echo "<br/>";
	$num=456;
	$num1=23.47;
	var_dump($num);
	echo "<br/>";
	var_dump($num1);
	
	echo "<br/>";
	$a=true;
	var_dump($a);
	echo "<br/>";
	
	$arr=array(1,2,3,4,5);
	
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
	//die();
	//echo 123;
	//echo 456;
	
	$arr=array(1,2,3,4,5);
	
	for($i=0;$i<count($arr);$i++){
		echo $i."<br/>";
	}
	
?>











