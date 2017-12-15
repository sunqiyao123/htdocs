<?php
    $link=@mysqli_connect('localhost','root','') or die("打开数据库失败");//打开数据库
    @mysqli_select_db($link,'newblog') or die("选择数据库失败");//选择数据库
    mysqli_set_charset($link,"utf8");//设置传输编码
