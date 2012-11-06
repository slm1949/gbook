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
include WEBROOT.DS.'config'.DS.'db.config.php';
include MODEL.DS.'base_model.php';
include MODEL.DS.'note_model.php';
include CONTROLLER.DS.'app_controller.php';
include CONTROLLER.DS.'index_controller.php';
//include VIEW.DS.'common'.DS.'header.php';//不应该写在这里
//include VIEW.DS.'common'.DS.'footer.php';//不应该写在这里
include VIEW.DS.'index'.DS.'index.php';

$dao=new DataAccess($host,$user,$pass,$dataname,$t_name);//建立数据库连接对象
$model=new NoteModel($dao);  //建立了一个数据处理的对象
 switch($_GET['action'])
{
  case 'show':
  $controller=new ShowController($model);  
  
  break;
  case 'add':
  $controller=new AddController($dao);  
  break;
  case 'delete':
  $controller=new DelecteController($dao);
  break;
  default:
  echo 'case defalt 被执行';
  $controller=new ShowController($model);//$model是NoteMode类型 
     
 }
$view=$controller->getView(); //获取视图对象
echo '获取视图正确';
$view->display();             //输出HTML

