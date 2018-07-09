<?php
	var_dump($_SERVER);
	//REQUEST_SCHEME   获取协议
	//HTTP_HOST  SERVER_NAME       获取主域名 www.baidu.com
	//SERVER_PORT      获取端口 
	//REQUEST_URI        /index.php?name=heyushuo&page=10
	
//	$url = 'http://www.baidu.com/index.php?name=heyushuo&page=10';
//	$arr = parse_url($url);   //query  得到 'name=heyushuo&page=10'
//	var_dump($arr);
	
//	$str = 'name=heyushuo&page=10';
//	parse_str($str,$arr);
//	var_dump($arr);   //解析成关联数组 name=>'heyushuo',page=>'10';


	$arr=["name"=>"heyushuo","page"=>10];
	$str = http_build_query($arr);
	var_dump($str);
	//可以吧关联数组解析为 'name=heyushuo&page=10'
?>