<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <base href="<?php echo site_url();?>">
</head>
<body>
<ul>
    <?php foreach ($list as $user){?>

        <li>
            <?php echo $user->uid.",".$user->uname?>
            <a href="We/del_user/<?php echo $user->uid?>">删除</a>|<a href="We/update_user/<?php echo $user->uid?>">修改</a>
        </li>
        

    <?php }?>
</ul>
</body>
</html>


