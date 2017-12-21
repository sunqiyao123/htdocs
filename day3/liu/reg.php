<?php
include "conn.php";
//1:验证是不是有重名
if(isset($_POST['sub'])){
    $uname=$_POST['uname'];
    $upass=$_POST['pass'];
    $sfile=$_FILES['sfile'];
//    var_dump($uname);
//    echo "<br/>";
//    var_dump($upass);
//    echo "<br/>";
//    var_dump($sfile);
//    die();


//    string(3) "123"
//    string(3) "123"
//    array(5) {
//        ["name"]=> string(14) "无标题1.png"
//        ["type"]=> string(9) "image/png"
//        ["tmp_name"]=> string(45) "/Applications/XAMPP/xamppfiles/temp/phpHSaxVC"
//        ["error"]=> int(0) ["size"]=> int(2686) }

    $sql="select * from a where uname='$uname'";
    $query=mysqli_query($link,$sql);
    $result=mysqli_fetch_array($query);
    if($result){
        echo "<script>alert('重名')</script>";
        echo "<script>location='reg.php'</script>";
    }else{
        //2:用户名是不是合法
        $flag=true;
        $arr=array('%','=','#');
        for($i=0;$i<count($arr);$i++){
            for($j=0;$j<strlen($uname);$j++){
                if($arr[$i]==$uname[$j]){
                    $flag=false;
                }
            }
        }
        if($flag==false){
            echo "<script>alert('用户名非法')</script>";
            echo "<script>location='reg.php'</script>";
        }else{
            //3:把用户名放入数据库
            $mpass=md5($upass);
            //4:写上传文件
            $hou=$sfile['name'];
            $arr=explode('.',$hou);
            $houlength=count($arr)-1;
            $houname=$arr[$houlength];
            $urlname="./upload/"."header".$uname.".".$houname;
//            echo $urlname;  ./upload/header.png
//            die();
            $rs=move_uploaded_file($sfile['tmp_name'], $urlname);
            if($rs){
                $url="/upload/"."header".$uname.".".$houname;
//                echo $url;
//                die();
                $sql="insert into a(uid,uname,pass,ulevel,uimg) values(null,'$uname','$mpass',0,'$url')";
                $query=mysqli_query($link,$sql);
                if($query){
                    echo "<script>location='login.php'</script>";
                }else{
                    echo "<script>location='reg.php'</script>";
                }
            }
        }
    }
}

?>

<meta charset="utf-8">
<form action="reg.php" method="post" enctype="multipart/form-data">
    用户名:<input type="text" name="uname"><br/>
    密码:<input type="password" name="pass"><br/>
    <input type="file" name="sfile">
    <input type="submit" name="sub" value="注册">
</form>