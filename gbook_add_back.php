<?php
 echo "<html>\n";
 echo "<head>\n";
 echo "<title>\n";
 echo "留言板添加模块后台处理\n";
 echo "</title>\n";
 echo "</head>\n";
 echo "<body>\n";
 //echo $_POST[username];
 //echo $_POST[content];
 if(!$_POST[username] || !$_POST[content])   //如果没有用户名或者留言内容,POST的是如何传递参数的呢？
 {
  echo "<meta http-equiv=\"refresh\" content=\"2; url=gbook_add_front.php\">\n";  //输出的是？？？
  echo "没有填写的用户名或者留言内容!\n";
  echo "<p>\n";                         //为什么输出了空行后面还要回车呢？
  echo "两秒后返回提交前台\n";
  exit();                               //终止所有PHP代码
  }
else
  {
   echo $_POST[re_id];
   $re_id=$_POST[re_id];
   include "common.php";
   $sql="select re_id from $t_name where id='$re_id'";    //注意 ''里$re_id的值在什么时候传到SQL数据库的额？
   $tem=mysql_fetch_row(mysql_query($sql,$my_connect));
   if($tem[0]!=0)                                         // 如果回复的留言不是主留言
    {
      echo "<meta http-equiv=\"refesh\" content=\"2; url=gbook_show.php\">\n";
      echo "所回复的留言不是主留言!\n";
      exit();                         //终止所有php代码
    }
  else
     {
     $username=htmlspecialchars($_POST[username]);        //获取用户名,学习htmlspecialchars函数
     if($_POST[title])                                     //如果有标题
        {
         $title=htmlspecialchars($_POST[title]);
         }
      else
         {
          $title="无标题";
         }
      $content=htmlspecialchars($_POST[content]);       //获取内容，并转换换行符
      $content=ereg_replace(" ","&nbsp;",$content);     //转换空格
      $content=nl2br($connect);                         //转换回车换行符,是NL2BR 不是N12BR
      $face=$_POST[face];
      $time=date("y-m-d h:i:s");                        //获取留言时间
      if($re_id!=0)                                     //如果是回复留言
        {
         $re_time="";                                    //则本条留言回复时间为空
         }
      else
        {
         $re_time=$time;                                //回复时间为发表留言时间  ？
         }
      $sql="insert into $t_name(username,title,content,re_id,face,time,re_time,re_num)
            values ('$username','$title','$content','$re_id','$face','$time','$re_time','0')";
      $result=mysql_query($sql,$my_connect); //or die(mysql_error());   //学习这句
       if($re_id!=0)
         {
           $strsql="update $t_name set re_time='$time',re_num=re_num+1 where id='$re_id'";
           $result=mysql_query($strsql,$connect) or die(mysql_error());
          }
        echo "<meta http-equiv=\"refresh\" content=\"2; url=gbook_show.php\">\n";     //这是一句html?
        echo "提交留言成功!\n";
        echo "<P>\n";
        echo "两秒后返回留言首页\n";
     }
  }
   echo "</body>\n";
   echo "</html>\n";
 ?>   
      
      




     
      

