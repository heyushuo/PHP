<meta charset="UTF-8"/>
<?php
	class MyException extends Exception
	{
		function demo(){
			echo '执行第二套方案自己的<br>';
		}
	}
	
	
	try {
		echo "玩游戏<br>";
		throw new MyException("出错了",20);
	} catch (Exception $e) {
		echo $e->getCode();
		echo "<br>";
		echo $e->demo();
	}
	
	function test($e)
	{
		echo $e->getMessage();
	}	
	//自定义异常处理函数
	
	set_exception_handler('test');
	
	throw new MyException("测试",20)
?>