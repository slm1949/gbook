<?php
  if(!$_GET)
   {
    echo "<meta http_equiv=\"refresh\" content=\"2; url=gbook_show.php\">\n";
    echo "没有指定操作方法与操作ID！\n";
    echo "两秒后返回显示留言页面\n";
    exit();
    }
   else
    {
     if(!$_POST)
      {
       echo "<html>\n";
       echo "<head>\n";
       echo "title>\n";
       echo "进入留言管理模块\n";
       echo "</title>\n";
       echo "</head>\n";
       echo "<body>\n";
       echo "<center>";           //居中
       echo "<font size=5 color=#ff0000>\n";
       echo "管理模块进入接口";
       echo "</font>\n";
       echo "<p>";
       echo "<a href=\"gbook_show.php\">返回首页</a>";
       echo "<p>\n";
       echo "<table border=1>";
       echo "<form action=\"gbook_.php?id=".$_GET[id]."&action=".$_GET[action]."\"method=\"post\" name=\"f\" onsubmit=\"return go(this)\">";
       echo "<tr>";
       echo "<td>";
       echo "管理员名称：";
       echo "</td>";
       echo "<td>";
       echo "input type=\"text\" name=\"admin\">";
       echo "</td>";
       echo "</tr>";
       echo "<tr>";
       echo "<td>";
       echo "管理员密码: ";
       echo "</td>";
       echo "<td>";
       echo "input type=\"password\" name=\"psasword\">";
       echo "</td>";
       echo "</tr>";
       echo "<tr>";
       echo "<td colspan=2 align=\"center\">";
       echo "当前操作为： ";
       if($_GET[action]=="edit")
         {
           echo "修改";
          }
       else
         {
           echo "删除";
         }
        echo "第".$_GET[id]."条记录";
        echo "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan=2 align=\"center\">";
        echo "input type=\"button\" value="\上一步\" onclick=\"history.go(-1)\">";
        echo "</td>";
        echo "</tr>";
        echo "</table>";
       }
       else                    //$_POST 为true
          {
            include "common.php";
            if($_POST[admin]==$admin_name && $POST[password]==$admin_pass)
              {
               setcookie("admin",$_POST[admin]);         //学习使用cookie
               if($_GET[action]=="edit")
                 {
                  $url="gbook_modify_front.php?id=".$_GET[id]:
                  }
                else
                  {
                   $url="gbook_del.php?id=".$_GET[id];
                   }
                echo "meta http-equiv=\"refresh\" content=\"2; url=".$url."\">\n";
                echo "登录成功!\n";
                echo "<p>\n";
                echo "两秒后进入相应操作页面\n";
                exit();                        //什么是时候该使用exit 推出php
               }
            else
              {
                echo "meta http-equiv=\"refresh\" content=\"2; url=gbook_show.php\">\n";
                echo "用户名或者密码错误！\n";
                echo "<p>\n";
                echo "两秒后返回显示留言\n";
                exit();
               }
            }
         }
      echo "</center>";
      echo "</body>";
      echo "</html>:
  ?>






