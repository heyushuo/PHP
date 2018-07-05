<meta charset="UTF-8"/>
<?php
// array(1,2,3,4,5)
	$newArr = [1,2,3,4,5];
	//可以查看变量的数值和类型
    var_dump($newArr);
	/*
	 * 
	 * 在php中可以指定下标
	 * 
	 * */
	 
	 $arr = ["name"=>1,2,3,4,5];
	//可以查看变量的数值和类型
    var_dump($arr);
	
	$arr1 = [
		"java"=>"大数据",
		"html"=>"前端"
	];
	//可以查看变量的数值和类型
    var_dump($arr1);
	//二维数组
	$arr2 = [
		"java"=>"大数据",
		"html"=>[
			"a",
			"b"
		]
	];
	//可以查看变量的数值和类型
    var_dump($arr2);

?>
<?php
	$new= ['a','d','f','r'];
	//可以查看变量的数值和类型
   echo $new[0];
	//添加一个元素
	$new[4]="我是添加得";
	//删除一个元素
	unset($new[2]);
	//修改一个元素
	$new[1]="修改元素";
	var_dump($new);
	//获取数组的总长度
	echo count($new)
?>