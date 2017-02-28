<?php
    include('../start.php');
    include(ADM_PATH.'/start.adm.php');
    
    $bid=(int)$input->get('bid');
   $item=array(
       'bid'=>0,
       'title'=>'',
       'author'=>$user['auname'],
       'content'=>'',
       
       
   );
   if($input->get('do')=='save'){
       $bid=(int)trim($input->post('bid'));
       $title= trim($input->post('title'));
       $author=trim($input->post('author'));
       $content=trim($input->post('content',false));
       $intime=time();
       if(empty($title)||empty($author)||empty($content)){
           exit("请完整填写表单");
       }
       if($bid>0){
           $sqlStr = "UPDATE blog set title='%s', author='%s',content='%s', intime='%d' WHERE bid='%d'";
           $sql = sprintf($sqlStr,$title, $author, $content, $intime, $bid);
       }else{
           $sql="insert into blog(title,author,content,intime) VALUES ('{$title}','{$author}','{$content}','{$intime}')";
       }
       $db->query($sql);
       header("location:".ADM_URL_PATH."/blog.php");
   }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include(ADM_PATH.'/inc/header.inc.php'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo URL_PATH ;?>/public/simditor/styles/simditor.css" />

        
        <script type="text/javascript" src="<?php echo URL_PATH ;?>/public/simditor/scripts/module.js"></script>
        <script type="text/javascript" src="<?php echo URL_PATH ;?>/public/simditor/scripts/hotkeys.js"></script>
        <script type="text/javascript" src="<?php echo URL_PATH ;?>/public/simditor/scripts/uploader.js"></script>
        <script type="text/javascript" src="<?php echo URL_PATH ;?>/public/simditor/scripts/simditor.js"></script>

    </head>
    <body>
        <?php include(ADM_PATH.'/inc/nav.inc.php');?>
        <div class="container">
            <div class="page-header">
                <h1>日志管理
                    <small class="pull-right"><a class="btn btn-primary" href="<?php echo ADM_URL_PATH;?>/blog.php"><span class="glyphicon glyphicon-plus" >返回</span></a></small>
                </h1>
                <div class="col-md-12 ">
                    <div class="panel-body">
                        <form  action="<?php echo ADM_URL_PATH;?>/blog_add.php?do=save" method="post">
                            <input type="hidden" name="bid" value="<?php echo $bid;?>"/>
                            <div class="form-group">
                                <label for="title">标题：</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $item['title'];?>" placeholder="请输入标题">
                            </div>
                            <div class="form-group">
                                <label for="author">作者：</label>
                                <input type="text" name="author" class="form-control" id="author" placeholder="请输入作者" value="<?php echo $item['author'];?>">
                            </div>
                            <div class="form-group">
                                <label for="content">内容：</label>
                                <textarea id="content" name="content" value="<?php echo htmlspecialchars($item['content']);?>"></textarea>
                                 <script>
                                   var editor = new Simditor({
                                        textarea: $('#content'),
                                         upload: {
                                            url:'<?php echo ADM_URL_PATH . "/upload.php";?>',
                                            fileKey:'file1'
                                        },
                                        placeholder: '请输入正文...',
                                        toolbar: [
                                            'title',
                                            'bold',
                                            'italic',
                                            'underline',
                                            'strikethrough',
                                            'fontScale',
                                            'color',
                                            'ol'    ,
                                            'ul'  ,
                                            'blockquote',
                                            'code'    ,
                                            'table',
                                            'link',
                                            'image',
                                            'hr'   ,
                                            'indent',
                                            'outdent',
                                            'alignment'
                                        ]
                                        //optional options
                                    });
                                </script>
                            </div>
                           
                            <button type="submit" class="btn btn-primary">提交</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


