<?php
	if(isset($_POST['sub'])){
		$num=$_POST['num'];
		var_dump($num);
		switch($num){
			case 10:
				echo 123;
				break;
			case 20:
				echo 456;
				break;
			default:
				echo 'llalaa';
				break;
		}
	}
	
	$a='10';
	$b=$a+'a1bc';
	echo $b;

?>

<meta charset="utf-8">
<form action="07-test.php" method="post">
	数据:<input type="text" name="num">
	<input type="submit" name="sub" value="提交">
</form>