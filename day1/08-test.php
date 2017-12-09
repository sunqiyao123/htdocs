<?php

	if(isset($_POST['sub'])){
		$year=$_POST['year'];
		if(is_numeric($year)){
			if(strlen($year)==4){
				if($year % 400==0 || ($year % 4==0 && $year % 100 !=0)){
					echo $year."是闰年";
				}else{
					echo $year."不是闰年";
				}
			}else{
				echo "数字不够长";
			}
			
		}else{
			echo "输入的不是数字";
		}
		
	}
	
	/*
	$str="laoshan";
	for($i=0;$i<strlen($str);$i++){
		echo $str[$i]."<br/>";
	}
	
	echo "<br/>";
	
	$user=array('lao','shan','loves');
	
	for($i=0;$i<count($user);$i++){
		//echo '$user[$i]'.' = '.$user[$i]."<br/>";
		echo "\$user[{$i}]"." = ".$user[$i]."<br/>";
	}
	*/
	//$user[0]=lao
	//$user[1]=shan

?>

<meta charset="utf-8">
<form action="08-test.php" method="post">
	year:<input type="text" name="year" value="<?php echo $_POST['year']?$year:"";?>">
	<input type="submit" name="sub" value="提交">
</form>







