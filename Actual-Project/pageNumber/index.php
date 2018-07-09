<?php
	/*//每页显示个数
	$number
	//一共多少数据
	$totalCount
	//一共多少页
	$totalPage
	//当前页
	$page
	//url地址
	$url
	allUrl first prev next end limit*/
	$page = new Page(5,50);
	class Page
	{
		//每页显示个数
		protected $number;
		//一共多少数据
		protected $totalCount;
		//一共多少页
		protected $totalPage;
		//当前页
		protected $page;
		//url地址
		protected $url;
		
		public function __construct($number,$totalCount)
		{
			$this->number = $number;
			$this->totalCount = $totalCount;
			//得到总页数
			$this->totalPage = $this->getTotalPage();
			//得到当前页数
			$this->page = $this->getPage();
			//获取地址
			$this->url  = $this->getUrl();
		}
		
		protected function getTotalPage()
		{
					//向上取整
			return  ceil($this->totalCount/$this->number);
		}
		
		protected function getPage()
		{
			if(empty($_GET['page'])){
				$page = 1;
			} else if($_GET['page']>$this->totalPage){
				$page = $this->totalPage;
			}else if($_GET['page']<1){
				$page = 1;
			}else{
				$page = $_GET['page'];
			}
			return $page;
		}
		
		protected function getUrl()
		{
			//协议
			$scheme = $_SERVER['REQUEST_SCHEME'];
			//host
			$host = $_SERVER['SERVER_NAME'];
			
			//得到端口号
			$port = $_SERVER['SERVER_PORT'];
			//得到路径和请求字符串
			$uri = $_SERVER['REQUEST_URI'];
			
			$uriArray = parse_url($uri);
			
			$path = $uriArray['path'];
			if(!empty($uriArray['query'])){
				//变成关联数组
				parse_str($uriArray['query'],$array);
				//去掉数组中page
				unset($array['page']);
				//在拼接连接形式'name=heyushuo&page=12'
				$query = http_build_query($array);
				if($query != ''){
					$path = $path."?".$query;
				}
			}
			echo $scheme."://".$host.":".$port.$path;
			return  $scheme."://".$host.":".$port.$path;
		}
		public function allUrl()
		{
			
		}
		public function first()
		{
			
		}
		public function prev()
		{
			
		}
		public function next()
		{
			
		}
		public function end()
		{
			
		}
		public function limit()
		{
			
		}
		
	}
	
?>