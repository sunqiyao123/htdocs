<?php
if(isset($_POST['sub'])){
    $sfile=$_FILES['sfile'];
    echo "<pre>";
    print_r($sfile);
    echo "</pre>";
    $arr=explode(".",$sfile["name"]);
    $hou=count($arr)-1;
    echo "$arr[$hou]";
    echo "<br/>";
    echo "$arr[1]";
    $newhou=$arr[$hou];
    $harr=array("txt",'rar','exe');
    $flag=true;
    for($i=0;$i<count($harr);$i++){
        if(($harr[$i])==$newhou){
            $flag=false;
        }

    }
    if($flag==false){
        echo "<script>alert('上传文件非法');</script>";
    }
    else{
        echo "<script>alert('上传成功');</script>";
        $a=move_uploaded_file($sfile['tmp_name'],"./upload/b.png");
        if($a){
            echo "<script>alert('上传成功并移动成功');</script>";
        }
        else{
            echo "移动失败";
        }
    }

}
?>
<form action="15-test.php" method="post" enctype="multipart/form-data">
    <input type="file" name="sfile">
    <input type="submit" name="sub" value="上传">
</form>