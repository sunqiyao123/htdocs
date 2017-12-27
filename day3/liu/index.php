<?php
if(isset($_COOKIE['uid'])){
    $id=$_COOKIE['uid'];
    echo $_COOKIE['uname']." 已登录 ";
    echo "<a href='ulogin.php?id=$id'>注销</a>";
    echo "&nbsp";
    echo "<a href='box.php'>box</a>";
}else{
    echo "<a href='login.php'>未登录</a>";
}
echo "<br/>";
?>
    <style>
        *{
            margin:0;
            padding:0
        }
        #div1{
            float:left;
        }
        #div2{
            float:right;
            margin-top:100px;
            width:200px;
            height:200px;
        }
    </style>

<a href="add.php">添加文章</a></br>
<form action="index.php" method="get">
    标题所含字:<input type="text" name="title">
    <input type="submit" name="sub" value="搜索">
</form>
<div id="div1">
<?php

include "conn.php";
/*if(isset($_GET['sub'])){
    $title=$_GET['title'];
    $s="title like "."'%".$title."%'";
}
else{
    $s=1;
}
    $sql="select * from blog where $s order by bid desc";*///正序:asc/不写,倒序:desc
//echo $sql;
//die();
if(isset($_GET['cid'])){
    $cid=$_GET['cid'];
    $sql="select * from a,blog,b where blog.uid=a.uid and b.catalog_id=blog.catalog_id and b.catalog_id='$cid'";
}else {
    $sql = "select * from blog,a where blog.uid=a.uid";
}
    $query=mysqli_query($link,$sql);
    /*$rs=mysqli_fetch_array($query);
    $rs=mysqli_fetch_array($query);
    echo "<pre>";
    var_dump($rs);
    echo "</pre>";*/
    while($rs=mysqli_fetch_array($query)){
?>
    <h3><a href="all.php?id=<?php echo $rs['bid'] ?>">标题:<?php echo $rs['title'];?></a>|<a href="del.php?id=<?php echo $rs['bid'] ?>">删除</a>|<a href="update.php?id=<?php echo $rs['bid'] ?>">修改</a></h3>
    <li>时间:<?php echo $rs['time'];?></li>
    <li>作者:<a href="sx.php?uid=<?php echo $rs['uid']?>"><?php echo $rs['uname'];?></a></li>
    <p><?php echo iconv_substr($rs['content'], 0, 3);?>...</p>
    <hr/>
<?php
    }
?>
</div>

<div id="div2">
    <ul>
        <?php
        $sql="select * from b";
        $query=mysqli_query($link,$sql);
        while($rows=mysqli_fetch_array($query)) {
        ?>
        <a href="index.php?cid=<?php echo $rows['catalog_id']?>"><li><?php echo $rows['catalog_name']?></li></a>
        <?php
           }
        ?>
    </ul>
</div>
