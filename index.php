<?php
// 项目入口
// 根据不通的参数调用不通的controller
// controller=?&action=?
// 定义常用的常量
define('WEBROOT', dirname(__FILE__));
define('VIEW', WEBROOT.DS.'view');
define('MODEL', WEBROOT.DS.'model');
define('CONTROLLER', WEBROOT.DS.'controller');