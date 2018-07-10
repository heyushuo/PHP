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
	echo $page->first();
	var_dump($page->allUrl());
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
//			echo $scheme."://".$host.":".$port.$path;
			return  $scheme."://".$host.":".$port.$path;
		}

		//设置分页
		protected function setUrl($str)
		{
				//查看是否包含 ? 这个字符
			if(strstr($this->url, "?")){
				$url = $this->url.'&'.$str;
			}else{
				$url = $this->url.'?'.$str;
			}
			return $url;
		}

		public function allUrl()
		{
			return [
				'first'=> $this->first(),
				'prev'=> $this->prev(),
				'next'=>$this->next(),
				'end'=>$this->end()
			];
		}
		public function first()
		{
			return $this->setUrl('page=1');
		}
		public function prev()
		{
			//根据当前page得到下一页的页码
			if($this->page+1 > $this->totalPage){
				$page=$this->totalPage;
			}else{
				$page = $this->page+1;
			}
			return $this->setUrl("page=".$page);
		}
		public function next()
		{
			//根据当前page得到下一页的页码
			if($this->page-1 <1){
				$page=1;
			}else{
				$page = $this->page-1;
			}
			return $this->setUrl("page=".$page);
		}
		public function end()
		{
			return $this->setUrl("page=".$this->totalPage);
		}
//		public function limit()
//		{
//			
//		}
		
	}
	
?>