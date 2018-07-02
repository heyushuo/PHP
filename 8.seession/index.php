<?php 
	session_start(); 
	// 存储 session 数据
	$_SESSION['views']=1;
?>

<html>
	<meta charset="utf-8">
<body>
<?php
// 检索 session 数据
echo "浏览量：". $_SESSION['views'];
?>
</body>
</html>

<!--销毁 Session
如果您希望删除某些 session 数据，可以使用 unset() 或 session_destroy() 函数。

unset() 函数用于释放指定的 session 变量：

<?php
session_start();
if(isset($_SESSION['views']))
{
    unset($_SESSION['views']);
}
?>
您也可以通过调用 session_destroy() 函数彻底销毁 session：

<?php
session_destroy();
?>
注释：session_destroy() 将重置 session，您将失去所有已存储的 session 数据。-->