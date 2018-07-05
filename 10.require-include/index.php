<meta charset="UTF-8"/>
<?php
//include_once("1.php")  //只能引入一次这样不报错,
//	include("1.php");    //include重复引入一个文件两次就会报错
//	add();
?>
<?php
	require("1.php");
	require_once('1.php');
	add();
?>


<!--
	include和require区别在于
	include如果引入有错,下边代码照样执行,
	require如果引入有错,下边代码不在执行
-->