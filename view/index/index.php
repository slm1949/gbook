<?php
  class View{
    protected $model;
    protected $output;//从数据库中读出的数组
    public function __construct($model){
     $this->model=$model;
    }
    public function display(){
     echo '输出一条留言';
     print_r($this->output);
    }
  }
  class ShowView extends View{
    public function __construct($model){
    //parent::__construct($model); 
   $this->model=$model;
   $this->output=$this->model->read();
        }
  }
  class AddView extends View{
   public function __construct($model,$user){
    parent::__construct($model);
   } 
  }
