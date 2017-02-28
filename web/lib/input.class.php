<?php
    class input{
        function  session($key){
            if(isset($_SESSION[$key])){
                $val=$_SESSION[$key];
            }
            else{
                $val=NULL;
            }
            $execValue=strip_tags($val);
            return $execValue;
        }
        function  post($key,$filter=true){
            if(isset($_POST[$key])){
                $val=$_POST[$key];
            }
            else{
                $val=null;
            }
            if($filter){
            $val= strip_tags($val);
            }
            return $val;
        }
        function get($key){
            if(isset($_GET[$key])){
                $val=$_GET[$key];
            }
            else{
                return NULL;
            }
            $execValue= strip_tags($val);
            return $execValue;
        }
        function  cookie($key){
            if(isset($_COOKIE[$key])){
                $val=$_COOKIE[$key];
            }
            else{
                $val=NULL;
            }
            $execValue=strip_tags($val);
            return $execValue;
        }
        
        
    }

