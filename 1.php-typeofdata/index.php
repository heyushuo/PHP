<?php
	header("Content-type:text/html;charset=utf-8");
	$name = "何玉硕1";
	$age = 14;
	$x = 5;
	$y = 6;
	$z = $x + $y;
	echo $z;
	echo "$name$age";
?>
	<hr />
<?php
//PHP 将所有全局变量存储在一个名为 $GLOBALS[index] 的数组中。 index 保存变量的名称。这个数组可以在函数内部访问，也可以直接用来更新全局变量。
	$n = 5; // 全局变量
	
	function myTest(){
//		global $n;//要使用global
		//或者这样获取
		$n1=10;
		echo "变量n为:{$GLOBALS['n']}";  //这里要想拿到全局变量需要使用global
		echo "变量n1为: $n1";
	}
	myTest()
	
//	Static 作用域
//当一个函数完成时，它的所有变量通常都会被删除。然而，有时候您希望某个局部变量不要被删除。
//
//要做到这一点，请在您第一次声明变量时使用 static 关键字：
//<?php
//function myTest()
//{
//  static $x=0;
//  echo $x;
//  $x++;
//}
// 
//myTest();
//myTest();
//myTest();
//
?>
	<hr />
<?php
echo <<<EOF
    <h1>我的第一个标题</h1>
    <p>我的第一个段落。</p>
EOF;
// 结束需要独立一行且前后不能空格
?>
	<hr />
<?php
$name="runoob";
$a= <<<EOF
    "abc"$name
    "123"
EOF;
// 结束需要独立一行且前后不能空格
echo $a;
?>



<!--
	PHP数据类型
	String(字符串)
	Integer(整形)
	Float(浮点型)
	Boolean(布尔类型)
	Arrar(数组类型)
	Object(对象)
	NULL(空值)
	
	PHP的var_dump() 函数返回变量的数据类型和值：
	
	-->
		<hr />
<?php 
	$cars=array("Volvo","BMW","Toyota");
	var_dump($cars);
	
	
	
?>
	<hr />
<?php
// 不区分大小写的常量名
define("GREETING", "欢迎访问 Runoob.com", true);
echo greeting;  // 输出 "欢迎访问 Runoob.com"
?>
	<hr />

<?php
	$arr = array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
	foreach($arr as $x=>$x_value){
		echo "key=". $x . ",value=".$x_value;
		echo "<br>";
	}
	
	echo __DIR__;
	echo "<br>";
	echo __FILE__;
	
	
	
?>