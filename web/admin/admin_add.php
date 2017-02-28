<?php
    include('../start.php');
    include(ADM_PATH.'/start.adm.php');
    
    $auid=(int)$input->get('auid');
    $item=array(
        'auid'=>0,
        'auname'=>'',
        'passwd'=>'',
    );
    
    if($input->get('do')=='save'){
        $auid=(int)$input->post('auid');
        $auname=trim($input->post('auname'));
        $passwd=trim($input->post('passwd'));
        if(empty($auname)||empty($passwd)){
            exit("密码或姓名不能为空");
        }
        //仅仅在添加账号的时候，验证账号重复
        if($auid<1){
            $usercheck=$db->get("select * from adminuser where auname='{$auname}'");

            if(is_array($usercheck)){
                exit("账号已经存在");
            }
        }
        //根据添加，修改的不同需要，执行sql语句
        if($auid<1){
            $db->query("insert into adminuser(auname,passwd) values ('{$auname}','{$passwd}')");
        }else{
            //如果密码字段为空，则不修改密码
            if(empty($passwd)){
                $db->query("update adminuser set auname='{$auname}' where auid='{$auid}'");
            }else{
            $db->query("update adminuser set auname='{$auname}',passwd='{$passwd}' where auid='{$auid}'");
            }
        }
        header("location:".ADM_URL_PATH."/admin.php");
        exit;
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include(ADM_PATH.'/inc/header.inc.php'); ?>
    </head>
    <body>
        <?php include(ADM_PATH.'/inc/nav.inc.php');?>
        <div class="container">
            <div class="page-header">
                <h1>管理员管理
                    <small class="pull-right"><a class="btn btn-primary" href="<?php echo ADM_URL_PATH;?>/admin.php"><span class="glyphicon glyphicon-plus"></span>返回</a></small>
                </h1>
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel-body">
                        <form  action="<?php echo ADM_URL_PATH;?>/admin_add.php?do=save" method="post">
                            <input type="hidden" name="auid" value="<?php echo $auid;?>"/>
                            <div class="form-group">
                                <label for="exampleInputEmail1">姓名：</label>
                                <input value="<?php echo $item['auname']; ?>" type="text" class="form-control" id="auname" name="auname" placeholder="Enter Username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">密码：</label>
                                <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Password">
                            </div>

                            <button type="submit" class="btn btn-primary">提交</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


