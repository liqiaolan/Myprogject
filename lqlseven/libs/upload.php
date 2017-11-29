<?php
//$str='fddfd';
//strrpos($str,"g");
//最后出现的位置，找到返回下标，没有返回空
//创建目录
// date("y-m-d");   时间函数
class Upload{
    //构造函数一
    public $size;
    public  $type=',image/jpeg,image/png,image/gif';
    public $filename='file';
    public $uploadRoot='upload';
//     public  $time=date("y-m-d");
    private $fullpath;
    function __construct(){
        //运算的时候可以放在构造函数
        $this->size=1024*1024;
    }
    //构造函数二
//    function  Upload(){}
//在php中写函数必须写function
  private function accept(){
       $this->data=$_FILES[$this->filename];
  }
  private function check(){
      if(is_uploaded_file($this->data['tmp_name'])){
          if($this->data['size']<$this->size&&strrpos($this->type,
                  $this->data['type'])){
               return true;
          }
          return false;
      }
  }
  private function createDir(){
      //判断根目录
      if(!is_dir($this->uploadRoot)){
           mkdir("$this->uploadRoot");
      }
      //创建日期目录
      $date=date('y-m-d');
      if(!is_dir($this->uploadRoot.'/'.$date)){
          mkdir($this->uploadRoot.'/'.$date,true);
      }


      //整合路径
      $name=time().mt_rand(0,3000).$this->data['name'];
      //识别中文
      $name=iconv('utf-8','gb2312',$name);
      $this->fullpath=$this->uploadRoot.'/'.$date.'/'.$name;
      move_uploaded_file($this->data['tmp_name'],"$this->fullpath");

  }
   public function move(){
       //1.接收
       $this->accept();
       //2.检查
       $this->check();
       //3.创建目录
       $this->createDir();
       //创建名字
       echo $this->fullpath;

   }

}