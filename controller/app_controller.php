<?php
// 对web的操作，例如处理文件上传，数据过滤，数据验证，数据转化
class AppController{              //控制器将$_GET['action']中不同的参数（add、modify、delete）
	var $model;
        var $view;
        public function __construct(&$dao){  //地址传值
          $this->model=& new basemodel($dao);
        }
        public function getview(){
         return $this->view;
	public function render($view){    //这个函数用来做什么呢？
          
	}
}
