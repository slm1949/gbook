<?php
// base model
// 实现 CRUD  所有model继承这个
// 在model 实现对数据库的操作
class BaseModel {
                 protected $dao;//DataAccess类
                 public function __construct($dao){      //地址传值
                  $this->dao=$dao;
                 }
                 public function read(){                 //读取留言信息
                 $t_name=$this->dao->gett_name();//因为$this->dao->gett_name()不是全局变量
                 $sql="select * from $t_name order by id asc";
                 //echo $sql;
                 $this->dao->query($sql);
                 return $this->dao->getrow();               //返回结果数组                 
                  }
                 public function create($user){  //添加留言
                  $t_name=$this->dao->gett_name();
                  $sql="insert into $t_name(username,title,content,re_id,face,time,re_time,re_num)
                        values ('$user[username]','$user[title]','$user[content]',$user[re_id],'$user[face]','$user[time]','$user[re_time]',0)";
                  $this->dao->query($sql);
	         }

	         public function update($user){   //修改留言
                 $t_name=$this->dao->gett_name();
                 $sql="update $t_name set username='$user[username]',title='$user[title]',content='$user[content]',face='$user[face]' where id=$user[id]";
                 $this->dao->query($sql);
	         }

	          public function delete($user){                                    //删除留言
                   $t_name=$this->dao->gett_name();
                   $t_sql="select re_id from $t_name where id=$user[id]";
                   $this->dao->query($t_sql);
                   $row=$this->dao->getrow();
                   if($row[re_id]!=0){                //如果删除的留言为某主题的回复
                      $this->dao->query($up_sql);
                      $sql="delete from $this->dao->gett_name() where id=$user[id]";
                      $this->dao->query($sql);
                    }
                   else{                           //如果留言为主题
                    $sql="delete from $this->dao->gett_name() where id=$user[id] or re_id=$user[id]";  //删除记录的sql语句，删除主题及其回复
                    $this->dao->query($sql);
                    }
	          }
                  public function getnote(){
                     if($note=$this->dao->getrow())
                        return $note;
                      else
                        return false;
                  }

}

?>
