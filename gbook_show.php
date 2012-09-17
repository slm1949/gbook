<?php
echo "<html>\n";                       //输出标准HTML内容
echo "<head>\n";
echo "<title>\n";
echo "留言显示模块";
echo "</title>\n";
echo "</head>\n";
echo "<body>\n";
echo "<center>\n";
echo "<font size=5 color=#ff0000>\n";           //字体大小5，颜色=?
echo "数据库留言薄显示模块"；
echo "</font>\n";
echo "<p>";
echo "<a href=\"gbook_add_front.php\">添加留言</a>";//这里加深了 \ ,转义符的理解
echo "<p>\n";


if(!$_GET[page])                                //获取提交的当前显示页，我想知道怎么获得的呢???为什么$_GET 后跟着中括号？
{
  $page=1;                                      //当前显示第一页，？？?
}
else
{
 $page=$_GET[page];                             //显示指定页
}
include "common.php";                           //调用通用配置文件
$sql="select id from $t_name where re_id=0";    //查询所有记录， 注意t_name 前有$，第一次都写错了
$result=mysql_query($sql,$my_connect);
$re_num=mysql_num_rows($result);                //获取所有留言数
$page_z=ceil($re_num/$p_num);                   //获取留言显示的页数， 这里 记住一个函数  ceil，进一取整
echo "目前共有".$re_num."条留言";
echo "&nbsp;&nbsp;分".$page_z."页显示";         //输入留言总页数， 这里学习一个  &nbsp;---在html里表示空格
echo "&nbsp;&nbsp;当前显示第".$page."页\n";
echo "<p>";
if($re_num==0)
{
echo "现在还没有留言！请先<a href=\"gbook_add_front.php\">添加</a>!";
}
else
{                                                   //开始显示内容代码QQQ
echo "<script language=\"javascript\">          
      <!--
      function conf()
      {
        if(confirm(\"时候要删除操作？\\n删除之后将无法恢复！\\n删除主题将删除其下所有回复！\\n请在确认一下，这是你最后的机会！\"))
        return ture;
        else
        return false;
      }
      -->
      </script>";                                //嵌入的这段JAVASCRIPT，不太清楚他的意图
echo "<table border=\"1\">";

$temp=($page-1)*$p_num;
/*一下代码定义SQL语句，从表中读取主留言，并按最后回复日期降序排列，每页从偏移量$temp开始
  最多显示$p_num条留言*/
$sql="select * from t_name where re_id=0 order by retime decs limit $temp,$p_num";   //学习这条SQL
$result=mysql_query($sql,$my_connect);
while($row=mysql_fetch_arrary($result))               //遍历结果数组
{
  $temp++;                                            //循环变量自增
  echo "<tr>";
  echo "<td rowspan=2><img src=img\\".$row[face]."></td>";   //src  后跟个img没明白 什么个情况？？
  echo "<td>\n";
  echo "主题".$temp;
  echo ":".$row[title];
  echo "|";
  echo "作者:";
  echo $row[username]."写于:";
  echo $row[time];
  echo "|";
  echo "<a href=\"gbook_add_front.php?id=".$row[id]."\">回复</a>";
  echo "[".$row[re_num]."]\n";
  echo "<a href=\"gbook_modify.php?action=edit&id=".$row[id]."\"编辑></a>";  //url传递的传值 action=edit
  echo "|";
  echo "<a href=\"gbook_modify.php?action=del&id=".$row[id]."\"onclick=\"return conf()\">删除</a>";  //什么机制调用script的conf()??
  echo "</td>\n";
  echo "</tr>";
  echo "<tr>\n";                          //好久要加\n的回车输出？
  cho "<td>";
  echo $row[content];
  echo "</td>\n";
  echo "</tr>";
  if($row[re_num]>0)
  {
   //定义子SQL语句
   //从所有记录中取出该主留言的回复留言
   $sub_sql="select * from t_name where re_id='$row[id]' and time>'$row[re_time]'";   //学习其中双引号里面单引号里面变量的方法？？
   $result=mysql_query($sub_sql,$my_connect);
   $j=0;
   while($sub_row=mysql_fetch_array($result,my_connect))                //遍历数组sql反馈的结果
   {
    $j++;
    echo "<tr>\n";
    echo "<td rowspan=2><img src=img\\".$sub_row[face]."></td>";
    echo "<td>";
    echo "回复."$j.":";
    echo $sub_row[title];
    echo "|";
    echo "作者".$sub_row[username].":回复于".$sub_row[time]."\n";
    echo "nbsp;|nbsp:";
    echo "<a href=\"gbook_modify.php?action=edit&id=".$sub_row[id]."\">编辑</a>";   
    echo "|";
    echo "<a href=\"gbook_modify.php?action=del&id=".$sub_row[id]."\" onclick=\"return conf()\">删除</a>";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>\n";
    echo $sub_row[content];
    echo "</td>";
    echo "</tr>";
     }               //结束 while $sub_row
   }                 //结束 if $row
}                    //结束 while $row
echo "</table>";
echo "<p>";
if(page_z>1)         //如果总页数大于1，分页显示
{
 $prev_page=$page-1;
 $next_page=$page-1;
 if($page<1)
  {
   echo "第一页|";
   }
 else
     {
       echo "<a href=gbook_show.php?page=1>第一页</a>|";
     }
  if($prev_page<1)
   {
    echo "上一页|";
    }
  else
    {
     echo "<a href=gook_show.php?page=".$prev_page.">上一页</a>|";  
    }
  if($next_page>$page_z)
    {
      echo "下一页";
    }
  else
    {
      echo "<a href=gbook_show.php?page=".$next_page."下一页</a>|";
     }
  if($page>=$page_z)
    {
      echo "最后一页";
    }
   else
    {
     echo "<a href=gook_show.php?page=".$page_z.">最后一页</a>";
    }
  }
}                               //结束else ,结束显示的代码
echo "</center>";
echo "</body>\n";
echo "</html>\n";

?>
