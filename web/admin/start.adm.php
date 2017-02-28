<?php
session_start();
$sessionauid=$input->session('sessionauid');

@$user=$db->get("select * from adminuser where auid ='{$sessionauid}'");



if(($sessionauid<1||!is_array($user))&&defined('NOT_LOGIN')==false){
    header("location:".ADM_URL_PATH."/login.php");
    //exit;
}
    

