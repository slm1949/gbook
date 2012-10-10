<?php
// base model
// 实现 CRUD  所有model继承这个
// 在model 实现对数据库的操作
class BaseModel {
	public function read($id){
                                   if(!$_GET[page])                                
                                                 {
                                                   $page=1;                                      
                                                  }
                                   else
                                               {
                                                  $page=$_GET[page];                            
                                               }                                   //获取$page
                                  include WEBROOT.'config'.DS.'db.config.php';     //调用通用配置文件
                                  $sql="select id from $t_name where re_id=0";    //查询所有记录
                                  $result=mysql_query($sql,$my_connect);
                                  $re_num=mysql_num_rows($result);                //获取所有留言数
                                  $page_z=ceil($re_num/$p_num);                   //获取留言显示的页数
                                  $temp=($page-1)*$p_num;                         //定义临时变量$temp,为
                                  $sql="select * from $t_name where re_id=0 order by re_time desc limit $temp,$p_num";
                                  $result=mysql_query($sql,$my_connect) or die(mysql_error());
                                  while($row=mysql_fetch_array($result))               //遍历结果数组
                                   {
                                     $temp++;                                            //循环变量自增
 
                                     if($row[re_num]>0)
                                        {
                                            //从所有记录中取出该主留言的回复留言
                                        $sub_sql="select * from $t_name where re_id=$row[id] ";  
                                        $result2=mysql_query($sub_sql,$my_connect) or die(mysql_error());
                                        $j=0;
                                        while($sub_row=mysql_fetch_array($result2))                //遍历数组sql反馈的结果
                                             {
                                                 $j++;
   
     }               //结束 while $sub_row
   }                 //结束 if $row
}                    //结束 while $row



	}

	public function create($object){

	}

	public function update($object){

	}

	public function delete($object){

	}
}

?>
