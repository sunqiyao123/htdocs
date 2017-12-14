<?php
include "conn.php";
if(isset($_POST['sub'])){
    $title=$_POST['title'];
    $con=$_POST['con'];
    $sql="insert into blog(bid,title,content,time) values(null,'$title','$con',null)";
    $query=mysqli_query($link,$sql);
    if($query){

    }
}
?>
<meta charset="UTF-8">
<form action=add.php" method="post">
    标题:<input type="text" name="title"><br/>
    内容:<textrea cols="30" rows="10" name="con"></textrea><br/>
    <input type="submit" name="sub" value="发表">
</form>
