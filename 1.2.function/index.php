<?php
//	header("Content-type:text/html;charset=utf-8");
	header('Content-type:text/html;charset=utf-8');
	function say($name="何玉硕",$age=18){
		echo "我的名字叫".$name." ---年龄是:".$age."<br>";
	}
	
	say();
	say("小白用户",100);
?>	