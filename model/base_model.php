<?php
// base model
// 实现 CRUD  所有model继承这个
// 在model 实现对数据库的操作
class DataAccess {
	         var $db;
                 var $query;
                 function __construct($host,$user,$pass,$db){
                 $this->connect=mysql_connect($host,$user,$pass);//连接数据库
                 mysql_select_db($db,$this->connect);
                 }
                 function query($sql){
                 $this->$query=mysql_query($sql,this->connect) or die(mysql_error());//请求MYSQL
                 }
                 function getrow(){
                 if($row=mysql_fetch_array($this->query,MYSQL_ASSOC))
                            //MYSQL_ASSOC参数决定了数组键名用字段名表示
                  return $row;
                 else
                  return false;//请求结果
                 }
}
class BaseModel {
                 var $dao;//DataAccess类
                 function __construct(&$dao){      //地址传值
                  $this->dao=$dao;
                 }
                 public function read($user){                 //读取留言信息
                 $sql="select * from $user[t_name]  order by id asc";
                 $dao->query($sql);
                 return $dao->getrow();               //返回结果数组                 
                  }
                 public function create($user){  //添加留言
                  $sql="insert into $t_name(username,title,content,re_id,face,time,re_time,re_num)
                        values ('$user[username]','$user[title]','$user[content]',$user[re_id],'$user[face]','$user[time]','$user[re_time]',0)";
                  $dao->query($sql);
	         }

	         public function update($user){
                 $sql="update $t_name set username='$user[username]',title='$user[title]',content='$user[content]',face='$user[face]' where id=$user[id]";
                 $dao->query($sql);
	         }

	          public function delete($user){                                    //删除留言
                   $t_sql="select re_id from $user[t_name] where id=$user[id]";
                   $dao->query($t_sql);
                   $row=$dao->getrow();
                   if($row[re_id]!=0){                //如果删除的留言为某主题的回复
                      $dao->query($up_sql);
                      $sql="delete from $user[t_name] where id=$user[id]";
                      $dao->query($sql);
                    }
                   else{                           //如果留言为主题
                    $sql="delete from $user[t_name] where id=$user[id] or re_id=$user[id]";  //删除记录的sql语句，删除主题及其回复
                    $dao->query($sql);
                    }
	          }

}

?>
