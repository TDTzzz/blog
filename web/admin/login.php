<?php
    include("../start.php");
    define("NOT_LOGIN",true);
    include(ADM_PATH.'/start.adm.php');
    
    
    if($input->get('do')=='get'){
        $auname=$input->post('username');
        $passwd=$input->post('passwd');
        $sql="select * from adminuser where auname='{$auname}' and passwd='{$passwd}' limit 1";
        $row=$db->get($sql);
        if($row){
            $_SESSION['sessionauid']=$row['auid'];
            header("location:index.php");
        }else{
            echo "登陆失败";
        }
    }
    if($input->get('do')=='out'){
        $_SESSION['auid']=0;
        header("location:".ADM_URL_PATH."/login.php");
    }

          
?>

<!DOCTYPE html>
<html>
    <title>管理员登录页面</title>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="http://blog.com/public/bootstrap/css/bootstrap.css">
        <script src="http://blog.com/public/bootstrap/js/jquery-1.9.1.js"></script>
        <script src="http://blog.com/public/bootstrap/js/bootstrap.js"></script>

    </head>
    <body>
        <div class="container" style="position:absolute; top:150px;left:200px;">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">管理员登录</div>
                    <div class="panel-body">
                        <form  action="<?php echo ADM_URL_PATH;?>/login.php?do=get" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">UserName</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Password">
                            </div>

                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                    <div class="panel-footer text-right">版权所有，违者必究</div>
                </div>
           </div>
        </div>
    </body>
    
</html>

