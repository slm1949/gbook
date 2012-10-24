<?php
// 项目入口
// 根据不同的参数调用不同的controller
// controller=?&action=?
// 定义常用的常量
define('DS', DIRECTORY_SEPARATOR);
define('WEBROOT', dirname(__FILE__));
define('VIEW', WEBROOT.DS.'view');
define('MODEL', WEBROOT.DS.'model');
define('CONTROLLER', WEBROOT.DS.'controller');
 switch($_GET[controller])
{
  case user_controller:
      include CONTROLLER.DS.'user_controller.php';
  break;
  case admin_controller:
       include CONTROLLER.DS.'admin_controller.php';
  break;
  default:
  echo '取得CONTRLE方法错误';
 }

