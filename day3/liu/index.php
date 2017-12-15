<a href="add.php">添加文章</a>
<?php
    include "conn.php";
    $sql="select * from blog order by bid desc";//正序:asc/不写,倒序:desc
    $query=mysqli_query($link,$sql);
    /*$rs=mysqli_fetch_array($query);
    $rs=mysqli_fetch_array($query);
    echo "<pre>";
    var_dump($rs);
    echo "</pre>";*/
    while($rs=mysqli_fetch_array($query)){
?>
    <h3><a href='all.php?id=<?php echo $rs['bid']?>'>标题:<?php echo $rs['title'];?></a>|<a href='del.php?id=<?php echo $rs['bid']?>'>删除</a>|<a href='update.php?id=<?php echo $rs['bid']?>'>修改</a></h3>
    <li>时间:<?php echo $rs['time'];?></li>
    <p><?php echo $rs['content']?></p>
    <hr/>

<?php
    }
?>