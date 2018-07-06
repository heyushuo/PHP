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
	} catch (PDOException $e) {
	    die ("Error!: " . $e->getMessage() . "<br/>");
	}
	
	try{
		
		//开启一个事物
		$dbh->beginTransaction();
		
		$sql='update myguests set money=money-500 where id=1';
		$ret=$dbh->exec($sql);
		if($ret>0){
			echo "转出成功<br/>";
		}else{
			throw new PDOException("转出失败");
		}
		//如果转出成功后
		$sql='update myguests set money=money+500 where id=2';
		$ret=$dbh->exec($sql);
		if($ret>0){
			echo "转入成功<br/>";
		}else{
			throw new PDOException("转入失败");
		}
		
		//两个操作都成功, 提交两个的操作
		$dbh->commit();
		echo '交易成功';
		
	} catch (PDOException $e){
		//如果出错就回滚到最初始的状态
		$dbh->rollback();
		echo $e->getMessage();
	}
?>