<?php
一.
// 循环
foreach($arr as $key = > $value) {				
}

二.
//得到所有的成员属性
//get_class_vars(__CLASS__); 这是一个数组
//只需要得到键名
$keys =array_keys(get_class_vars(__CLASS__)) ;
//如果$key是我的成员属性,那么设置
//数组中是否包含某个值
in_array($this->mime,$this->allowMime)
if(in_array( $key, $keys)) {
	$this->key = $value;
}

三.
//文件夹是否存在或者不是目录,创建文件夹
if(!file_exists($this->path) || !is_dir($this->path) ){
		//创建文件夹
	return mkdir($this->path,0777,true)
}
//判断文件是否可写
if(!is_writable($this->path)){
	//设置为可写
	return chmod($this->path, 07777)
}

//得到文件后缀
$this->suffix = pathinfo($this->oldName)['extension'];

//生成随机字符串
uniqid()
?>