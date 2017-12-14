<?php
$data['2017-05-01']='看电影';
$data['2017-06-01']='学习';
$data['2017-07-01']='工作';
$data['2017-08-01']='考试';
$data['2017-09-01']='写代码';
$flag=false;
if(isset($_POST['sub'])){
    $date=$_POST['chaxun'];
    foreach($data as $k=>$v){
        if($k==$date){
            echo "<script>alert('".$k."日备忘：".$v."')</script>";
            $flag=true;
            break;
        }
    }
    if(!$flag){
        echo "<script>alert('没有备忘')</script>";
    }
}
?>
<h1>单击查询当前日程</h1>
<form action="01-test.php" method="post">
    <h3>输入查询日期</h3>

    <input type='text' name='chaxun'>
    <br/>
    <input type='submit' name='sub'>
    <input type='reset' name='res'>
</form>