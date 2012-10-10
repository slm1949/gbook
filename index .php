<?php
// 项目入口
// 根据不同的参数调用不同的controller
// controller=?&action=?
// 定义常用的常量
define('WEBROOT', dirname(__FILE__));
define('VIEW', WEBROOT.DS.'view');//DS 什么意思？
define('MODEL', WEBROOT.DS.'model');
define('CONTROLLER', WEBROOT.DS.'controller');
require VIEW.'index'.DS.'index.php';
?>
