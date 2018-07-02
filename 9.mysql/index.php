<meta charset="UTF-8"/>
<?php
	header("Content-type:text/html;charset=utf-8");
	$servername = "localhost";
	$username = "root";
	$password = "admin";
	 
	// 创建连接
	$conn = mysqli_connect($servername, $username, $password);
	 
	// 检测连接
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	echo "连接成功";
//	phpinfo()

//try{
//  //解析config.ini文件
//  $config = parse_ini_file(realpath(dirname(__FILE__) . '/config/config.ini'));
//  //对mysqli类进行实例化
//  $mysqli = new mysqli($config['host'], $config['username'], $config['password'], $config['dbname']);   
//  if(mysqli_connect_errno()){    //判断是否成功连接上MySQL数据库
//      throw new Exception('数据库连接错误！');  //如果连接错误，则抛出异常
//  }else{
//      echo '数据库连接成功！';   //打印连接成功的提示
//  }
//}catch (Exception $e){        //捕获异常
//  echo $e->getMessage();    //打印异常信息
//}
?>



<!--关闭连接
连接在脚本执行完后会自动关闭。你也可以使用以下代码来关闭连接：

实例 (MySQLi - 面向对象)
$conn->close();


实例 (MySQLi - 面向过程)
mysqli_close($conn);-->