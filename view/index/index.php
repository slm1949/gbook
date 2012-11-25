<?php
  class View{
    protected $model;
    protected $output;//从数据库中读出的数组
    public function __construct($model){
     $this->model=$model;
    }
  }
  class ShowView extends View{
    public function __construct($model){
       //parent::__construct($model); 
        $this->model=$model;
        $this->output=$this->model->read();
    }
    public function display(){
      $title='留言显示';
      include VIEW.DS.'common'.DS.'header.php';
      //var_dump($this->output);
       $mun=0;
      echo "<table border=\"1\">";
      foreach($this->output as $temp){
      $mun++;
      echo "<tr>\n";
      echo "<td>\n";
      echo '主题'.$mun.':'.$temp[title].'作者'.$temp[username].'写于：'.$temp[time];
      echo "</td>\n";
      echo "</tr>\n";
      echo "<tr>\n";
      echo "<td>\n";
      echo $temp[content];
      echo "</td>\n";
      echo "</tr>\n";
     // echo '<br>';
      //var_dump($temp);
      }
      echo '</table>';
      include VIEW.DS.'common'.DS.'footer.php';
    }
  }
  class AddView extends View{
   public function __construct($model,$user){
    parent::__construct($model);
   } 
  }
