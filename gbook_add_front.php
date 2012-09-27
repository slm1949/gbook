<?php
if($_GET[id])
{
 $re_id=0;
}
else
{
 $re_id=$_GET[id];
}
?>
<html>
<head>
<title>留言添加前台页面</title>
</head>
<center>
<script language="javascript">
<!--
function c_img()
   {
    document.img.src=="img/"+document.f.face.value;
   }
function go(form)
   {
     if(form.username.value=="")
      {
       alert("请输入留言者名称!");
       form.username.focus();
       return (false);            //为什么return 后边有个空格？？？
      }
     if(form.content.value=="")
      {
        alert("请输入留言内容!");
        form.content.focus();
        return (false);
      }
    }
-->
</script>
<font size=5 color=#ff0000>
留言添加模块前台页面
</font>
<P>
<a href="gbook_show.php">返回首页</a>
<p>

 <form action="gbook_add_back.php" method="post" name="f" onsubmit="return go(this)">
<table border="1">
 <input type="hidden" name="re_id" value="<?php echo $re_id?>">
 <tr>
   <td><font color="#ff0000">*</font>作者名称：</td>
   <td><input type="text" name="username" size="30"></td>
 </tr>
 <tr>
   <td>留言标题:</td>
   <td><input type="text" name="title"  size="30"></td>
 </tr>
 <tr>
    <td>留言表情:</td>
    <td>
     <select name="face" size="1" onchang=c_img()>
     <option value="1.gif">五星
     <option value="2.gif">四星
     <option value="3.gif">月牙
     <option value="4.gif">倒弧
     <option value="5.gif">闪电
     <option value="6.gif">笑脸
     <option value="7.gif">八星
     <option value="8.gif">爱心
     <option value="9.gif">浮云
     <option value="10.gif">太阳
     <option value="11.gif">正弧
     <option value="12.gif">倒脸
   </select>
   <img src="img\1.gif" name="img">
  </td>
 </tr>
 <tr>
 <td><font color="#ff0000">*</font>留言内容:</td>
 <td>
   <textarea name="content" cols="40" rows="10"></textarea>
 </td>
 </tr>
 <tr>
 <td colspan="2">
  提交留言：
 <input type="submit" value="提交选择">
 </td>
 </tr>

</table>
 </form>
</center>
</body>
</html>
