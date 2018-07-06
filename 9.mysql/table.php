<?php
	header("Content-type:text/html;charset=utf-8");
	$servername = "localhost";
	$username = "root";
	$password = "admin";
	$dbname = "test";
	
	// 创建连接
	$conn = new mysqli($servername, $username, $password, $dbname);
	// 检测连接
	if ($conn->connect_error) {
	    die("连接失败: " . $conn->connect_error);
	} 
	
	// 使用 sql 创建数据表
	$sql = "CREATE TABLE MyGuests(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	firstname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL,
	email VARCHAR(50),
	reg_date TIMESTAMP
	)";
	
	if ($conn->query($sql) === TRUE) {
	    echo "Table MyGuests created successfully";
	} else {
	    echo "创建数据表错误: " . $conn->error;
	}

//  mysql_query("set names 'utf8'");
//  mysqli_set_charset($con, "utf8");	//复制汉字乱码
	//向表中插入数据
//	$sql = "INSERT INTO MyGuests (firstname, lastname, email)
//	VALUES ('John', 'Doe', 'john@example.com');";
//	$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
//	VALUES ('Mary', 'Moe', 'mary@example.com');";
//	$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
//	VALUES ('Julie', 'Dooley', 'julie@example.com')";
	
//	if ($conn->query($sql) === TRUE) {
//	    echo "新记录插入成功";
//	} else {
//	    echo "Error: " . $sql . "<br>" . $conn->error;
//	}
	
	$conn->close();
?>