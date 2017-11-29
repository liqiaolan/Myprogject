<?php
   class main{
         public $smartyObj;
       function __construct(){
           $smarty=new Smarty();
           $smarty->setTemplateDir('template');
           $smarty->setCompileDir('compile');
           $smarty->setCacheDir('cache');
           $smarty->caching=false;
           $this->smartyObj=$smarty;
       }
   }