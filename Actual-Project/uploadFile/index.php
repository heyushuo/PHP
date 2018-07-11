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
 
 	$up = new Upload();
	$up->uploadFile('fm');
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
		
		public function __construct($arr = [])
		{
			foreach($arr as $key => $value) {
				$this->setOption($key,$value);
			}
		}
		//判断找个$key是不是我的成员属性,如果是,则设置
		protected function setOption($key,$value)
		{
			//得到所有的成员属性
			//get_class_vars(__CLASS__); 这是一个数组
			//只需要得到键名
			$keys =array_keys(get_class_vars(__CLASS__)) ;
			//如果$key是我的成员属性,那么设置
			if(in_array( $key, $keys)) {
				$this->key = $value;
			}
		}
		
		//$key 就是input框中的name属性值
		public function uploadFile($key)
		{
		
//			1.判断有没有设置路径 path
 			if(empty($this->path)){
			 	$this->setOption("errorNumber",-1);
				 return false;
			 }
//			2.判断该路径是否存在,是否可写
 			if(!$this->check()){
			 	$this->setOption("errorNumber",-2);
				 return false;
			 }
//			3.判断$_FILES 里面的error信息是否为0,如果为0说明文件信息在服务器端可以直接获取
//			   提取信息保存在成员属性中
			$error = $_FILES[$key]['error'];
			if($error){
				$this->setOption("errorNumber",$error);
				return false;
			}else{
				//提取文件相关信息,保存到成员属性中
				$this->getFileInfo($key);
				
			}
//			4.判断文件大小,mime,后缀名是否符合
			if(!$this->checkSize()||!$this->checkMime()||!$this->checkSuffix()){
				return false;
			}
//			5.得到新的文件名字
			$this->newName = $this->createNewName();
//			6.判断是否是上上传文件,并且移动上传文件
			 if(!is_uploaded_file($this->tmpName)){
			 	$this->setOption("errorNumber",-6);
				 return false;
			 }else{
			 	//移动文件                        //文件名字             //新路径和新的文件名字
			 	if(move_uploaded_file($this->tmpName, $this->path.$this->newName)){
			 		return $this->path.$this->newName;
			 	}else{
			 		//移动失败
			 		$this->setOption("errorNumber",-7);
				 	return false;
			 	}
			 }
			 
		}
		//得到新名字
		protected function createNewName()
		{
//			判断是否启用新名字
			if($this->isRandName){
						//文件前缀                     //文件后缀                 
				$name = $this->prefix.uniqid().'.'.$this->suffix;
			}else{
						//文件前缀
				$name = $this->prefix.$this->oldName;
			}
			return $name;
		}
		//判断条件是否满足
		protected function checkSize(){
			if($this->size >$this->maxSize){
				$this->setOption("errorNumber",-3);
				return false;
			}else{
				return true;
			}
		}
		//判断条件是否满足
		protected function checkMime(){
			//数组中是否包含某个值
			if(!in_array($this->mime,$this->allMime)){
				$this->setOption("errorNumber",-4);
				return false;
			}else{
				return true;
			}
		}
		//判断条件是否满足
		protected function checkSuffix(){
			//数组中是否包含某个值
			if(!in_array($this->suffix,$this->allowSuffix)){
				$this->setOption("errorNumber",-5);
				return false;
			}else{
				return true;
			}
		}
		//获得文件信息
		protected function getFileInfo($key)
		{
			//得到文件名字
			$this->oldName = $_FILES[$key]['name'];
			//mime
			$this->mime = $_FILES[$key]['type'];
			//size
			$this->size = $_FILES[$key]['size'];
			//临时文件名
			$this->tmpName = $_FILES[$key]['tmp_name'];
			//得到文件后缀
			$this->suffix = pathinfo($this->oldName)['extension'];
		}
		protected function check()
		{
			//文件夹是否存在或者不是目录,创建文件夹
			if(!file_exists($this->path) || !is_dir($this->path) ){
					//创建文件夹
				return mkdir($this->path,0777,true);
			}
			
			//判断文件是否可写
			if(!is_writable($this->path)){
				return chmod($this->path, 0777);
			}
			
			return true;
		}
	}	
?>