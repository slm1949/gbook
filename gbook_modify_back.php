<?php
      echo "<html>\n";
      echo "<head>\n";
      echo "<title>\n";
      echo "留言修改模块后台处理\n";
      echo "</title>";
      echo "</head>";
      echo "<body>";
      if(!$_POST[username] || !$_POST[content])    //如果没有用户名或者留言内容
         {
           echo "没有填写的用户名或者留言内容!\n";
           echo "<p>\n";
           echo "点<a href=# onclick=history.go(-1)>这里</a>后退继续操作!\n";
           exit();
          }
       else
          {
            $id=$_POST[id];
            include "common.php";
            $username=htmlapecialchars($_POST[username]);
            if($_POST[title])                                   //如果有标题
               {
                $title=htmlspecialchars($_POST[tilte]);
                }
             else
                {
                 $title="无标题";
                 }
            $content=htmlspecialchars($_POST[content]);
            $content=ereg_replace(" ","$nsbp;",$content);
            $content=n12br($content);
            $face=$_POST[face];
            $strsql="updata $t_name set username='$username',title='$title',content='$content',face='$face' where id='$id'";
            $result=mysql_query($strsql,$connect) or die(mysql_error());
            if($result)
               {
                 echo "<meta http-equiv=\"refresh\" content \"2; url=gbook_show.php\">\n";
                 echo "提交留言成功!";
                 echo "<P>\n";
                 echo "两秒后返回留言首页\n";
                }
              }
   echo "</body>";
   echo "</html>";
?>         
            

