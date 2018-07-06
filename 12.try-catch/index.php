<meta charset="UTF-8"/>
<?php
	try {
		echo "起床了<br>";
		//抛出异常
		throw new Exception("拉肚子了",20);
		echo "上学了啊<br>";
	} catch(Exception $e ){
		echo "出错了<br>";
		echo $e->getMessage();
		echo '<br>';
		echo $e->getCode();
		echo '<br>';
	}
	//这里代码还会继续执行
	echo "走起---报错也会继续执行";
?>