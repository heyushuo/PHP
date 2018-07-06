<meta charset="UTF-8"/>
<?php
	function test()
	{
		echo "测试<br/>";
	}
    //执行方法后边可以加参数  call_user_func('test','很好');
	call_user_func('test');
	//执行方法并且带参数(参数是数组)
//	call_user_func_array($callback, $param_arr)


//如何调用类里边的方法

	class Person
	{
		function say(){
			echo "我会说话";
		}
	}
	
	
	
	 $xiaoliang=new Person();
	call_user_func([$xiaoliang,'say']);
	
	
//	sql_autoload_register //注册自己的函数
?>