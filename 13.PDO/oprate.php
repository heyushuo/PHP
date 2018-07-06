<meta charset="UTF-8"/>
<?php
    $dbms='mysql';     //数据库类型
	$host='localhost'; //数据库主机名
	$dbName='test';    //使用的数据库
	$user='root';      //数据库连接用户名
	$pass='admin';          //对应的密码
	$dsn="$dbms:host=$host;dbname=$dbName";
	
	
	try {
	    $dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
	    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);  //抛出异常
	    echo "连接成功<br/>";
	    /*你还可以进行一次搜索操作
	    foreach ($dbh->query('SELECT * from FOO') as $row) {
	        print_r($row); //你可以用 echo($GLOBAL); 来看到这些值
	    }
	    */
//	    $dbh = null;
	} catch (PDOException $e) {
	    die ("Error!: " . $e->getMessage() . "<br/>");
	}
	
	try {
		//增加数据
//		$sql='insert into myguests(firstname,lastname,email) values("dajian","good","123456@qq.com")';exec($sql)
	    //跟新数据
//	   $sql='update myguests set firstname="aaa" where id=27' ;exec($sql)
//查询数据
        $sql='select * from myguests';
	    $ret=$dbh->query($sql);
		var_dump($ret);
//		 if($ret >0){
//		 	echo "插入成功";
//		 }
	}catch(PDOException $e){
		echo $e->getMessage();
	}
//	PDO提供两个执行sql的方法
//1.exec 执行不要结果集的语句  比如 增删改   不需要结果集
//2.query 执行要结果集的语句  比如 查询 desc
//3.lastInsertId 最后插入语句的id号

////wargin 警告错误
//
//setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING)
////抛出异常
//setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION)
?>