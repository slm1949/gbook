<?php
$host="localhost";
$user="root";
$pass="6515";
$dataname="gbook";
global $t_name;
$t_name="gbook";
$p_num="10";                                     //每页显示的条数
$admin_name="admin";                             //管理员用户名
$admin_password="12345";                             //管理员密码
//$my_connect=mysql_connect($host,$user,$pass);    //连接数据库
//mysql_select_db($dataname,$my_connect);          //选择数据库
class DataAccess {
                 private $t_name;
	         private $db;
                 private $query;
                 public function __construct($host,$user,$pass,$db,$t_name){
                 $this->db=mysql_connect($host,$user,$pass);//连接数据库
                 mysql_select_db($db,$this->db);
                 $this->t_name=$t_name;
                 }
                 public function query($sql){
                 $this->query=mysql_query($sql,$this->db) or die(mysql_error());//请求MYSQL
                 }
                 public function getrow(){
                 if($row=mysql_fetch_array($this->query,MYSQL_ASSOC))
                            //MYSQL_ASSOC参数决定了数组键名用字段名表示
                  return $row;
                 else
                  return false;//请求结果
                 }
                 public function gett_name(){
                  return $this->t_name;
                 }
}
?>
