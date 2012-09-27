<?php
     //if(!$_COOKIE[admin]);
      // {
      //   echo "<meta http-equiv=\"refresh\" content=\"2; url=gbook_show.php\">\n";
        // echo "管理员没有登录!\n";
         //echo "<p>\n";
        // echo "两秒后返回留言显示页面\n";
        // exit();
       //}
     echo "<html>";
     echo "<head>";
     echo "<title>留言修改前台页面</title>";
     echo "</head>";
     echo "<body>";
     if(!$_GET[id])             //如果没有用户或者留言内容
        {
          echo "<meta http-equiv=\"refresh\"  content=\"2; url=gbook_show.php>";
          echo "没有指定修改id!\n";
          echo "<p>\n";
          echo "两秒后返回留言显示页面\n";
          exit();
        }
      else
        {
          $id=$_GET[id];
          echo "<script languge=\"javascript\">
           <!--
          function c_img()
            {
              document.img.src=\"img/\"+document.f.face.value;
            }
          function go(form)
            {
             if(form.username.value==\"\")
                 {
                    alert(\"请输入留言者名称!\");
                    form.username.focus();
                    return (false);
                  }
              if(form.content.value==\"\")
                 {
                   alert(\"请输入留言内容!\");
                   form.content.focus();
                   return (false);
                 }
              }
             -->
                 </script>";
             echo "<center>";
             echo "<font size=5 color=#ff0000> 留言添加模块前台页面</font>";
             echo "<P>";
             echo "<a href=\"gbook_show.php\">返回首页</a>";
             echo "<p>";
             include "common.php";
             $sql="select * from $t_name where id=$id";
             $result=mysql_query($sql,$my_connect);
             $row=mysql_fetch_array($result);
             echo "<form  action=\"gbook_modify_back.php\" method=\"post\" name=\"f\" onsubmit=\"return go(this)\">";
             echo "<table border=\"1\">";
             echo "<tr>";
             echo "<td><font color=\"#ff0000\">*</font>作者名称:</td>";
             echo "<td><input type=\"text\" name=\"username\" value=\"".$row[username]."\"></td>";
             echo "<td>";
             echo "<select name=\"face\" size=\"1\" onchange=c_img()>
                   <option value=\"1.gif\">五星
                   <option value=\"2.gif\">四星
                   <option value=\"3.gif\">月芽
                   <option value=\"4.gif\">倒弧
                   <option value=\"5.gif\">闪电
                   <option value=\"6.gif\">笑脸
                   <option value=\"7.gif\">八星
                   <option value=\"8.gif\">爱心
                   <option value=\"9.gif\">浮云
                   <option value=\"10.gif\">太阳
                   <option value=\"11.gif\">正弧
                   <option value=\"12.gif\">倒脸
                  </select>";
            echo  "<img src=\"img\\1.gif\" name=\"img\">";
            echo "</td></tr>";
            echo "<tr>";
            echo "<td><font color=\"ff0000\">*</font>留言内容:</td>";
            echo "<td><textarea name=\"content\" cols=\"40\" rows=\"10\">";
            echo $row[content];
            echo "</textarea>";
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>提交留言：</td>";
            echo "<td><input type=\"submit\" value=\"提交选择\"></td>";
            echo "</tr>";
           
            echo "</table>";
            echo "</form>";
          }
             echo "</center>";
             echo "</body>";
             echo "</html>";
   ?>
