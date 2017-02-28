<?php
    include('../start.php');
    include(ADM_PATH.'/start.adm.php');
    
    $config=$db->gets("select * from settings order by sid asc");
    
    if($input->get('do')=='save'){
       $v = $input->post('v',false); 
       foreach ($v as $key=>$val){
           $sql="update settings set v='{$val}' where k='{$key}'";
           $db->query($sql);
       }
       header("loaction:".ADM_URL_PATH."/admin/settings.php");
       
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
                <h1>博客设置 <small>设置网站的基本属性</small></h1>
            </div>
            <div class="col-md-12">
                
                <form class="form-horizontal" action="<?php echo ADM_URL_PATH;?>/settings.php?do=save" method="post">
                <?php foreach($config as $item){ ?>
                <div class="form-group">
                  <label class="col-sm-2 control-label"><?php echo $item['kname'];?></label>
                  <div class="col-sm-10">
                     <input type="text" name="v[<?php echo $item['k'];?>]" class="form-control" placeholder="请输入配置" value="<?php echo $item['v'];?>">
                     <p class="glyphicon glyphicon-circle-arrow-right" style="top: 5px;"><?php echo $item['intro'];?>(<?php echo $item['k'];?>)</p>
                  </div>
                </div>
                <?php } ?>
           
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">提交</button>
                  </div>
                </div>
            </form>
            </div>
        </div>
    </body>
</html>

