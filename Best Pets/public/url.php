<?php
  $port=$_SERVER['SERVER_PROTOCOL'];
  $port=strtolower(substr($port,0,strrpos($port,'/')));
  $uri=$_SERVER['REQUEST_URI'];
  $uri=substr($uri,0,strrpos($uri,'/'));
  $uri=substr($uri,0,strrpos($uri,'/'));
  $uri=substr($uri,0,strrpos($uri,'/'));
  $url=$port.'://'.$_SERVER['HTTP_HOST'].$uri;
  //后台
  $cssurl=$url.'/css';
  $jsurl=$url.'/js';
  $indexurl=$url.'/index';
  $phpurl=$url.'/php';

  //前台
  $cssurlF=$url.'/best pets/css';
  $jsurlF=$url.'/best pets/js';
  $htmlurlF=$url.'/best pets/html';
  $imgurlF=$url.'/best pets/img';