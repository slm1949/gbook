<?php
 echo "<html>";
 echo "<head>";
 echo "<title>";
 echo "变量引用赋值";
 echo "</title>";
 echo "</head>";
 echo "<body>";
 $var1=" this  word";
 $var2=&$var1;
 echo $var1;
 $var2="that word";
 echo "<p>";
 echo $var1;
 echo "<p>";
 $var1="999999";
 echo $var2;
 echo "</body>";
 echo "</html>";
 ?>
