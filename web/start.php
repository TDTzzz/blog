<?php
    date_default_timezone_set('Asia/Shanghai');
    //前台的网址陆路径
    @define("URL_PATH",'http://blog.com');
    //前台的硬盘路径
    @define("APP_PATH",dirname(__FILE__));
    //后台的硬盘路径前缀
    @define("ADM_PATH", APP_PATH.'/admin');
    //后台的网址路径
    @define("ADM_URL_PATH","http://blog.com/admin");
    
    
    include(APP_PATH.'/config.php');
    include(APP_PATH.'/lib/db.class.php');
    $db=new db('127.0.0.1','root','','blog');
    $db->query("SET NAMES UTF8");
    include(APP_PATH.'/lib/input.class.php');
    $input=new input();
    include(APP_PATH."/lib/functions.php");
    
