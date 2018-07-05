<meta charset="UTF-8"/>
<?php
	$arr = ["a"=>"aaaa","b"=>"bbbb","c"=>"aacccaa","d"=>"dddd "];
	
	foreach($arr as $key=>$value){
		echo $key."值为:".$value."<br>";
		echo $arr[$key]."<hr>";
	}
	//不需要key的时候
//	foreach($arr as $val){
//		
//	}
$abb=['a','b','c'];
list($a,$b,$c)=$abb;
echo $a.$b.$c;


var_dump(each($abb)) ;
var_dump(each($abb)) ;

list($key,$val)=each($abb);
echo $key.$val;






//超全局数组
//$_GET
//$_POST
//$_REQUEST
//$_SERVER
//$_SESSION
//$_COOKIE

var_dump($_SERVER)
?>
