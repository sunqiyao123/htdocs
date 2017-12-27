<?php
include "conn.php";
$sid=$_COOKIE['uid'];
$arr=array();
$sql="select * from a,sx where a.uid=sx.sid and sx.sid='$sid'";
$query=mysqli_query($link,$sql);
while($rs=mysqli_fetch_array($query)){
    $arr[]=$rs;
}
foreach($arr as $k=>$v){
    $rid=$v['rid'];
    $sql="select * from a,sx where a.uid=sx.rid and sx.rid='$rid'";
    $query=mysqli_query($link,$sql);
    $rows=mysqli_fetch_array($query);
    $newarr[]=$rows;
}

echo "发送者是".$_COOKIE['uid'];
echo "<br/>";
echo "接受者是".$v['rid'];
echo "<br/>";
echo "<pre>";
print_r($newarr);
echo "</pre>";
?>

