<meta charset="UTF-8"/>

<!--
	封装生成验证码类

	验证码的个数 $number
	验证码的类型$codeType
	验证码图像的宽度$width
	验证码图像的高度$height
	验证码$code
	图像资源$image
	
	封装验证码类的步骤:
	1.生成验证码
	2.创建画布
	3.填充颜色
	4.将验证码画到画布中
	5.添加干扰元素
	6.输出显示
-->

<?php

	$code = new Code();
	//读取不可访问属性的值时，__get() 会被调用。
	$code->outImage();

	class Code
	{
		//验证码个数
		protected $number;
		//验证类型
		protected $codeType;
		//验证码图像的宽度$width
		protected $width;
		//验证码图像的高度$height
		protected $height;
		//图像资源$image
		protected $image;
		//验证码$code
		protected $code;
		
		//构造方法需要用户传递那些参数
		public function __construct($number=4,$codeType=2,$width=100,$height=50)
		{
			
			//初始化自己的成员属性
			$this->number=$number;
			$this->codeType=$codeType;
			$this->width=$width;
			$this->height=$height;
			//生成验证码函数
			$this->code =$this->createCode();
			
		}
		
		//魔术方法
		//读取不可访问属性的值时，__get() 会被调用。
		public function __get($name)
		{
			if($name == 'code') {
				return $this->code;
			}
			return fasle;
		}
		//销毁图片
		public function __destruct()
		{
			imagedestroy($this->image);
		}
		
		
		//生成验证码
		protected function createCode()
		{
			//t通过你的验证码类型,生成不同的验证码
			switch ($this->codeType){
				case 0: //纯数字
					$code=$this->getNumberCode();
				    break;
				case 1: //纯字母
				    $code=$this->getCharCode();
					break;
				case 2: //数字和字母混合
					$code=$this->getNumCharCode();
					break;
				default:
					die("不支持此类型验证码类型");
			}
			
			return $code;
		}
		
		//生成纯数字验证码
		protected function getNumberCode()
		{
			//range生成0-9的数组
			//join把数组连接为字符串
			$str = join('', range(0, 9));
			//str_shuffle 讲字符串乱序排列
			//substr 截取字符串
			return substr(str_shuffle($str), 0,$this->number);
		}
		//生成纯字母验证码
		protected function getCharCode()
		{
			$str = join('', range('a', 'z'));
			//把大写字符和小写字母拼接在一起
			$str = $str.strtoupper($str);
			return substr(str_shuffle($str), 0,$this->number);
		}
		//生成字母和数字混合
		protected function getNumCharCode()
		{
			$numStr = join('', range(0, 9));
			$str = join('', range('a', 'z'));
			//把数字和大写字符和小写字母拼接在一起
			$str = $numStr.$str.strtoupper($str);
			return substr(str_shuffle($str), 0,$this->number);
		}
		
		
		public function outImage()
		{
			//创建画布
			$this->createImage();
			//填充背景色
			$this->fillBack();
			//将验证码字符串画到画布上
			$this->drawChar();
			//添加干扰元素
			$this->drawDisturb();
			//输出并显示
			$this->show();
		}
		//创建画布
		protected function createImage()
		{
//			如果大家经历上面的两个步骤发现还是不起作用，那就要祭出杀手锏了。
//使用ob_clean()了，清除一下缓存。
//ob_clean这个函数的作用就是用来丢弃输出缓冲区中的内容,如果你的有许多生成的图片类文件,那么想要访问正确,就要经常清除缓冲区。
			ob_clean();
			//创建画布
			$this->image = imagecreatetruecolor($this->width, $this->height);
			
		}
		//背景色
		protected function fillBack()
		{
			//填充背景色
			imagefill($this->image, 0, 0, $this->lightColor());
		}
		//浅色
		protected function lightColor()
		{
			return imagecolorallocate($this->image, mt_rand(130,255), mt_rand(130,255), mt_rand(130,255));
		}
		//深色
		protected function darkColor()
		{
			return imagecolorallocate($this->image, mt_rand(0,120),mt_rand(0,120), mt_rand(0,120));
		}
		//画字符到画布上
		protected function drawChar()
		{
			$width = ceil($this->width / $this->number);
			for($i=0;$i<$this->number;$i++){
				$x = mt_rand($i*$width+10, ($i+1)*$width-10);
				$y = mt_rand(5,$this->height/2);
				
				//画字符到画布上
				imagechar($this->image, 5, $x, $y,  $this->code[$i], $this->darkColor());
			}
		}
		//画干扰元素
		protected function drawDisturb()
		{
			//画150个点
			for($i=0;$i<300;$i++){
				$x = mt_rand(0, $this->width);
				$y = mt_rand(0, $this->height);
				imagesetpixel($this->image, $x, $y, $this->lightColor());
			}
		}
		
		protected function show()
		{
			header('Content-Type:image/png');
			imagepng($this->image);
		}
		
	}
?>