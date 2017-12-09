<?php

	function aa(){

		static $a=12;
		$a=$a+1;
		echo $a;
	}
	
	aa();
	aa();
	aa();
//13,14,15

function bb(){

	static $a=12;
	$a=13;
	$a=$a+1;
	echo $a;
}

bb();
bb();
bb();
//14,14,14

$a=100;
function cc(){
	global $a;
	static $a=12;
//	$a=13;
//	$a=$a+1;
	echo $a;
}

cc();
cc();
cc();
//12,12,12

//打印100行10列 隔行换色
/*
echo "<table width=800 border=1 align='center'>";
echo "<caption>隔行换色</caption>";
for($i=0;$i<100;$i++){
	if($i %2==0){
		$color='red';
	}else{
		$color='green';
	}
	echo "<tr bgColor='".$color."' onmouseover=lrow(this) onmouseout=drow(this)>";
	for($j=0;$j<10;$j++){
		echo "<td>".$i."</td>";
	}
	echo "</tr>";


}
echo "</table>";*/
?>

<script>
	var ys="";
	function lrow(obj){
		ys=obj.bgColor;
		obj.bgColor="yellow";
	}
	
	function drow(obj){
		obj.bgColor=ys;
	}

</script>







