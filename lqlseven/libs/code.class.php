<?php
   class code{
       //定义属性
       public $width=200;
       public $height=200;
       public $codenum=4;
       public $linenum=10;
       public $pixnum=100;
       public $image='';
       public $codesize=array('min'=>30,'max'=>50);
       public $angle=array("min"=>-15,"max"=>15);
       public $zhongzi='23456789ABCDEFGHJKLMNPQRSTabcdefjhjkmnopqrstuvwxyz';
       public $type='png';
       public $code='';
       //设置文字引入的路径
       public $codeUrl='';
       public $tname='index';

       //1.设置颜色
       public function Color($type="bgcolor"){
           $r=$type=='bgcolor'?mt_rand(160,255):mt_rand(0,159);
           $g=$type=='bgcolor'?mt_rand(160,255):mt_rand(0,159);
           $b=$type=='bgcolor'?mt_rand(160,255):mt_rand(0,159);
           $this->Colortype=imagecolorallocate($this->image,$r,$g,$b);
       }
       //2.设置画板，返回图像资源
       public function Canvas(){
           $this->image=imagecreatetruecolor($this->width,$this->height);
           $this->Color();
           imagefill($this->image,0,0,$this->Colortype);
       }
       //设置内容
       public function Con(){
           $str='';
           for($i=0;$i<$this->codenum;$i++){
               $code=$this->zhongzi[mt_rand(0,strlen($this->zhongzi)-1)];
               $str.=$code;
           }
           $this->code=$str;
       }
       //3.设置文字
       public function Font(){
           $this->Con();
           $space=($this->width/$this->codenum);
           for($j=0;$j<$this->codenum;$j++){
               $this->Color($type="fontcolor");
               $arr=imagettfbbox(mt_rand($this->codesize["min"],$this->codesize["max"]),mt_rand($this->angle["min"],$this->angle["max"]),$this->codeUrl,$this->code[$j]);
               imagettftext($this->image,mt_rand($this->codesize["min"],$this->codesize["max"]),mt_rand($this->angle["min"],$this->angle["max"]),($j*$space)+mt_rand(-2,2),($arr[1]-$arr[5])+mt_rand(min(0,$this->height-($arr[1]-$arr[5])),max(0,$this->height-($arr[1]-$arr[5]))),$this->Colortype,$this->codeUrl,$this->code[$j]);
           }
           }

       //4.画线
       public function Line(){
          for($k=0;$k<$this->linenum;$k++){
              $startX=mt_rand(0,($this->width)/3);
              $endX=mt_rand(0,($this->width)*2/3);
              $startY=mt_rand(0,$this->height);
              $endY=mt_rand(0,$this->height);
              $this->Color($type='linecolor');
            imageline($this->image,$startX,$startY,$endX,$endY,$this->Colortype);
          }
       }
       //5.画像素点
       public function Pix(){
           for($i=0;$i<$this->pixnum;$i++){
               $this->Color($type='pixcolor');
               imagesetpixel($this->image,mt_rand(0,$this->width),mt_rand(0,$this->height),$this->Colortype);
           }
       }
       //6.输出out
       public function Out(){
           $this->Canvas();
           $this->Font();
           $this->Line();
           $this->Pix();
           header('content-type:image/'.$this->type);
           $imagetype='image'.$this->type;
           $imagetype($this->image);
           $stname=$this->tname.'imgcode';
           $_SESSION[$stname]=strtolower($this->code);
           imagedestory($this->image);
       }

   }
