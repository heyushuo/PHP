<?php

	class Model 
	{
		//主机名
		protected $host;
		//用户名
		protected $user;
		//密码
		protected $pwd;
		//数据库名
		protected $dbname;
		//字符集
		protected $charset;
		//.数据表前缀
		protected $prefix;
		
		
		//数据库连接资源
		protected $link;
		//数据库表名    可以自己指定表名
		protected $tableName;
		//sql语句
		protected $sql;
		//操作数组  存放的就是所有的查询条件 
		protected $options;
		
		//构造方法 ,对成员变量进行初始化
		public function __construct($config)
		{
			//对成员变量一一初始化
			$this->host = $confog['DB_HOST'];
			$this->user = $confog['DB_USER'];
			$this->pwd = $confog['DB_PWS'];
			$this->dnname = $confog['DB_NAME'];
			$this->charset = $confog['DB_CHARSET'];
			$this->prefix = $confog['DB_PREFIX'];
			
			//连接数据库
			$this->link =$this->connect();
			
			//得到数据表名  user表对应userModel类
			$this->tableName = $this->getTableName();
			//初始化option数组
			$this->options = $this->initOptions();
		}
		//field方法
		public function field($field){
			//如果不为空,在进行处理
			if(!empty($field)){
				if(is_string($field)){
					$this->options['field'] = $field;
				}else if(is_array($field)){
					$this->options['field'] = join(',', $field);
				}
			}
			return $this;
		}
		//table方法
		public function table($table)
		{
				//如果不为空,在进行处理
			if(!empty($table)){
				$this->options['table'] = $table;
			}
			return $this;
		}
		//where方法
		public function where($where)
		{
				//如果不为空,在进行处理
			if(!empty($where)){
				$this->options['where'] = 'where '.$where;
			}
			return $this;
		}
		//group方法
		public function group($group)
		{
				//如果不为空,在进行处理
			if(!empty($group)){
				$this->options['group'] = 'group by '.$group;
			}
			return $this;
		}
		//having方法
		public function having($having)
		{
				//如果不为空,在进行处理
			if(!empty($having)){
				$this->options['having'] = 'having '.$having;
			}
			return $this;
		}
		//order
		public function order($order)
		{
				//如果不为空,在进行处理
			if(!empty($order)){
				$this->options['order'] = 'order by '.$order;
			}
			return $this;
		}
		//limit方法  可以传递字符串或者数组
		public function limit($limit)
		{
			//如果不为空,在进行处理
			if(!empty($limit)){
				if(is_string($limit)){
					$this->options['limit'] = 'limit '.$limit;
				}else if(is_array($limit)){
					$this->options['limit'] = 'limit '.join(",", $limit);
				}
				
			}
			return $this;
		}
		//select方法
		
		//query 需要结果集
		//exec 不需要结果集  
		
		
		
		
		//初始化
		protected function initOptions()
		{
			$arr = ['where','table','field','order','group','having','limit'];
			foreach ($arr as  $value) {
				$this->options[$value]='';
				//将table默认设置为tableName,如果调用table方法,就用自己设置的
				if($value='table'){
					$this->options[$value] = $this->tableName;
				}
			}
		}
		protected function connect()
		{
			// 创建连接
			$link = mysqli_connect($this->host, $this->user, $this->pwd);
			if (!$link) {
			    die("数据库连接失败");
			}
			//连接哪个数据库
			mysqli_select_db($link, $this->dbname);
			//设置字符集
			mysqli_set_charset($link, $this->charset);
			//返回连接成功的资源
			return $link;
		}
		
		protected function getTableName()
		{
			//如果设置了成员变量,通过变量来得到表名
			if(!empty($this->tableName)){
				return $this->prefix.$this->tableName;
			}else{
				//没有设置,通过类名来得到表名	
				//得到当前类名字符
				$className = get_class($this);
									//截取除了后五个
				$table = strtolower(substr($className, 0,-5));
				return $this->prefix.$table;
			}
			
			
		}
		
		
		
		
	}
	
?>