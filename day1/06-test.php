<?php
	//phpinfo();
	
	if(isset($_POST['sub'])){
		$str=$_POST['address'];
//		echo $str;
//		echo "</br>";
		/*$dizhi=base64_encode($str);
		$add="thunder://".$dizhi;
		echo $add;
		echo "</br>";*/



		$addr=substr($str,10);
		/*echo $addr;*/
        echo base64_decode($addr);
	}
	
	
	//base64_encode  base64_decode
	//md5(md5($pass)+$salt);
	


?>

<meta charset="utf-8">
<form action="06-test.php" method="post">
	地址:<input type="text" name="address">
	<input type="submit" name="sub" value="提交">
</form>