<?php
$link=mysqli_connect('localhost','root','') or die("123");
mysqli_select_db($link,'newblog') or die("选择数据库失败");
mysqli_set_charset($link,"utf8");