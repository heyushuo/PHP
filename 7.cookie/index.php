<?php
	$expire=time()+60*60*24*30;
	echo $expire ."<br>";
	setcookie("user", "runoob", $expire);
	// 输出 cookie 值
	echo $_COOKIE["user"];
?>

<meta charset="utf-8">
	<br />
		<br />	<br />
			<br />
				<br />
<?php
//isset($_COOKIE["user"])查看是否有cookie
if (isset($_COOKIE["user"]))
    echo "欢迎 " . $_COOKIE["user"] . "你已经登录过了,无需再次登录!<br>";
else
    echo "普通访客!<br>";
?>
<html>
	
<!--如何删除 Cookie？
当删除 cookie 时，您应当使过期日期变更为过去的时间点。

删除的实例：

<?php
// 设置 cookie 过期时间为过去 1 小时
setcookie("user", "", time()-3600);
?>-->