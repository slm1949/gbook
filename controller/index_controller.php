<?php
class IndexController extends AppController{
	public function index(){
		render('index');
	}
}

class ShowController extends AppController{   //控制显示留言的子类
      public function __construct(&$model){
         parent::__construct($model);
         $this->view=new ShowView($this->model); //把model对象传给View子类供其获取数据   
       }
}
class AddController extends APPController{       //用于控制添加留言的子类
      public function __construct(&$dao,$user){
      parent::__construct($dao);
      $this->view=new AddView($this->model,$user);    //$user的实参为$_POST数组
                        //表单中的留言项目存储在该系统数组中
      }
}
class DeleteController extends Appcontroller{   //用于控制删除留言的子类
  function __construct(&$dao,$user){
  parent::__construct($dao);
  $this->view=new DeleteView($this->model,$user);
  }
}
?>  

