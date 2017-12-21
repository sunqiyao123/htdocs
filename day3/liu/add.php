<?php
if(!isset($_COOKIE['uid'])){
    $url=$_SERVER['REQUEST_URI'];
    $arr=explode('/',$url);
    $le=count($arr)-1;
    $urlname=$arr[$le];

    echo "<script>location='login.php?url=$urlname'</script>";
}

?>
<?php
//先连接数据库
    include "conn.php";
    if(isset($_POST['sub'])){
        $title=$_POST['title'];
        $con=$_POST['con'];
    //    $date=date('Y-m-d');

        //操作数据库插入数据
    //    $sql="insert into blog(bid,title,content,time) values(null,'$title','$con','$date')";
        $sql="insert into blog(bid,title,content,time) values(null,'$title','$con',now())";//数据库函数
        //发送这个字符串
        $query=mysqli_query($link,$sql);
        if($query){
            echo "插入成功";
            header("location:index.php");
        }else{
            echo "插入失败";
        }

    }

?>

<meta charset="utf-8">
<form action="add.php" method="post">
    标题:<input type="text" name="title"><br/>
    内容:<textarea cols='30' rows='10' name="con"></textarea><br/>
    <input type="submit" name="sub" value="发表">
</form>