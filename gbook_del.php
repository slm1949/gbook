<html>
<head>
<title>
"留言删除模块执行页面"
</title>
</head>
<body>
<?php
     if(!$_GET[id])            //如果没有用户名或者留言内容
          {
            echo "<meta http-equiv=\"refresh\" content=\"2; url=gbook_show.php\"\n";
            echo "没有指定删除的ID！\n";
            echo "<p>\n";
            echo "两秒后返回留言显示页面\n";
            exit();
          }
      else
         {
          $id=$_GET[id];
          include "common.php";
          $t_sql="select re_id from $t_name where id=$id";
          echo $t_sql;
          $result=mysql_query($t_sql,$my_connect);
          $row=mysql_fetch_array($result);
          if($row[0]!=0)                //如果删除的留言为某主题的回复
                 {
                   $up_sql="updata $t_name set re_num=re_num-1 where id=$row[0]";  //修改主题回复数
                   mysql_query($up_sql,$my_connect);
                   $sql="delete from $t_name where id=$id";
                   mysql_query($sql,$my_connect);
                  }
          else                           //如果留言为主题
                  {
                   $sql="delete from $t_name where id=$id or re_id=$id";  //删除记录的sql语句，删除主题及其回复
                   mysql_query($sql,$my_connect);
                   }
          echo "<meta http-equiv=\"refresh\" content=\"2; url=gbook_show.php\">\n";
          echo "删除留言记录成功\n";
          echo "<p>\n";
          echo "两秒后返回留言首页\n";
         }
 ?>
</body>
</html>
                   
                  
