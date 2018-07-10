<?php
//"INSERT INTO MyGuests (firstname, lastname, email)
//	VALUES ('John', 'Doe', 'john@example.com');";

一.插入数据/添加数组
insert into 表 (字段) values (值)
//例子
insert into MyGuests (firstname, lastname, email) values ('John', 'Doe', 'john@example.com');

二.查询数据
select * from MyGuests where 加条件
//例子
select * from MyGuests where id=1;

三.跟新数据/改数据
update MyGuests set firstname="学习 Python" where id=3';

四.删除数据
delete from MyGuests where id=3;

五.创建表
creat table if not exists `runoob_tbl`(
   `runoob_id` INT UNSIGNED AUTO_INCREMENT,
   `runoob_title` VARCHAR(100) NOT NULL,
   `runoob_author` VARCHAR(40) NOT NULL,
   `submission_date` DATE,
   primary key ( `runoob_id` )
)engine=InnoDB default charset=utf8;


CREATE TABLE IF NOT EXISTS `runoob_tbl`(
   `runoob_id` INT UNSIGNED AUTO_INCREMENT,
   `runoob_title` VARCHAR(100) NOT NULL,
   `runoob_author` VARCHAR(40) NOT NULL,
   `submission_date` DATE,
   PRIMARY KEY ( `runoob_id` )
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

?>