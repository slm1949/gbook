<?php
$host="localhost";
$user="root";
$pass="6515";
$dataname="gbook";
$t_name="gbook";
$p_num="10";                                     //每页显示的条数
$admin_name="admin";                             //管理员用户名
$admin_pass="12345";                             //管理员密码
$my_connect=mysql_connect($host,$user,$pass);    //连接数据库
mysql_select_db($dataname,$my_connect);          //选择数据库
?>
