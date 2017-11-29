<?php
class pages{
    public  $nums=4;
    public  $total=0;
    public  $pageNum;
    public  $limit;
    function show(){
        if(!defined("PROT")) {
            define("PROT", strtolower(strchr($_SERVER["SERVER_PROTOCOL"], "/", true)));
            //主机地址
            define("HOST_URL", $_SERVER["HTTP_HOST"]);
        }
        define("PAGE_URL", PROT . "://" . HOST_URL . $_SERVER["SCRIPT_NAME"] . "?" . $_SERVER["QUERY_STRING"]);
        $this->pageNum=ceil($this->total/$this->nums);
        $originUrl=PAGE_URL;
        if(!strrpos($originUrl,"pages")){
            $originUrl=$originUrl."&pages=0";
        }
        $fullUrl=substr($originUrl,0,strrpos($originUrl,"&pages"));
        $pages=substr($originUrl,strrpos($originUrl,"=")+1);
        $str="";
        $str.="<a href='{$fullUrl}&pages=0' class='pagesfirst'>[首页]</a>";
        $up=$pages-1<0?0:$pages-1;
        $str.="<a href='{$fullUrl}&pages={$up}' class='pagesup'>[上一页]</a>";
        $pageNums=$this->pageNum;
        $start=$pages-3<0?0:$pages-3;
        $end=$pages+6>$pageNums-1?$pageNums-1:$pages+6;
        for($i=$start;$i<=$end;$i++){
            $num=$i+1;
            if($i==$pages){
                $style="style='color:red'";
            }else{
                $style="style='color:#000'";
            }
            $str.="<a href='{$fullUrl}&pages={$i}' {$style} class='pages'>[{$num}]</a>";
        }
        $next=$pages+1>$pageNums-1?$pageNums-1:$pages+1;
        $str.="<a href='{$fullUrl}&pages={$next}'class='pagesnext'>[下一页]</a>";
        $last=$pageNums-1;
        $str.="<a href='{$fullUrl}&pages={$last}'class='pageslast'>[尾页]</a>";
        $nums=$pages*$this->nums;
        $this->limit=$nums.", ".$this->nums;
        return $str;
    }
}