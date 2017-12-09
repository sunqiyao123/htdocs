<?php
$a=20;
$b=$a++;//本身加,整体不加
echo $a;//21
echo $b;//20
echo "<br/>";


$aa=20;
$bb=$aa++ + ++$aa;//20+22
echo $aa;
echo $bb;
echo "<br/>";


$c=20;
$d=++$c;//都加
echo $c;//21
echo $d;//21
echo "<br/>";



$c=--$b - $b--;//0-0
echo $c;//0
$d=$c++ + --$c;//0+0
echo $d;//0
echo "<br/>";


$one="$$$$$";
$two="one";
$three="two";
$four="three";
echo $four."<br/>"; //three
echo $$four."<br/>";//two

	

$one=100;
$two=&$one;
echo $one."<br/>";
echo $two."<br/>";
$one=10;
$two="hello";
echo $one."<br/>";
echo $two."<br/>";







