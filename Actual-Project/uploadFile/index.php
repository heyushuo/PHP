<?php
/*	
 * 成员属性
		 文件上传路径
		 允许上传的后缀
		 允许上传的mime 类型
		 允许上传的文件size
		 是否启用随机名
		 加上文件前缀
	自定义的错误号码和错误信息
	要保存的文件信息
		文件名
		文件后缀
		文件大小
		文件mime
		文件临时路径
	文件新名字
	对外公开的方法有
	$key 就是 传的name=""的值
		uploadFile($key); 上传成功返回文件路径,上传失败返回false
		外部可以直接获取错误号码和错误信息
 * */
	class Upload
	{
		//文件上传保存路径
		protected $path = "./upload/";
		//文件后缀
		protected $allowSuffix=['jpg','jpeg','gif','png','wbmp'];
		protected $allMime = ["image/jpeg","image/gif","image/png","image/wbmp"];
		protected $maxSize = 2000000; //2M
		protected $isRandName = true; //随机名字
		protected $prefix = 'up_'; //文件前缀
		
		//自定义的错误号码和错误信息
		protected $errorNumber;
		protected $errorInfo;
		
		//文件的信息
		protected $oldName;
		protected $suffix;
		protected $size;
		protected $mime;
		protected $tmpName; //文件临时路径
		
		//文件新名字
		protected $newName;
		
		public funtion __construct()
		{
			
		}
		
		public function uploadFile($key)
		{
			
		}
	}	
?>