<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <base href="<?php echo site_url()?>">
</head>
<body>
<form action="We/update/<?php echo $user->uid?>" method="post">
    name: <input type="text" name='username' value="<?php echo $user->uname?>">
    <input type="submit">

</form>
</body>
</html>
