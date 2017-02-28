<?php
    include('../start.php');
    include(ADM_PATH.'/start.adm.php');
    include(APP_PATH.'/lib/page.class.php');
    
    
    //当前页数
$p  = (int) $input->get('p');
if( $p<1 ){
    $p = 1;
}

//每页显示数(从系统配置中读取)
$blog_num       =  C('index_page');

$offset = $blog_num * ($p-1);
//数据总数
$blogs_count    = $db->get("select count(*) as total from blog")[0];

$page = new page($blogs_count, $blog_num, $p, ADM_URL_PATH . '/index.php');

//读取blog的数据
$sql = "select * from blog order by bid desc limit {$offset},{$blog_num}";
$blogs = $db->gets($sql);
?>
<!DOCTYPE html>
<html>
    <head>
       <?php include(ADM_PATH.'/inc/header.inc.php');?>
    </head>
    <body>
        <?php include(ADM_PATH.'/inc/nav.inc.php');?>
        
        <div class="container">    
            <div class="jumbotron" >
                <h1><?php echo C("web_name");?><small>
                    <?php echo C("web_intro");?></small>
                </h1>
            </div>
            <div class="col-md-9">
                <?php foreach($blogs as $blog){ ?>
                <div class="panel panel-default">
                    <div class="panel panel-heading">
                        <a href="blog.php"><?php echo $blog['title'] ;?></a>
                        <span style="position:absolute;right:30px;">作者：<?php echo $blog['author'];?></span>
                    </div>
                    <div class="panel panel-body"><?php echo mb_substr( strip_tags($blog['content']),0,50);?></div>
                </div>
                <?php } ?>
                <nav class="pull-right">
                  <ul class="pagination">
                    <?php echo $page->showPage();?>
                  </ul>
                </nav> 

            </div>
            <div class="col-md-3" >
                <div class="panel panel-success">
                    <div class="panel panel-heading">一个大佬</div>
                    <div class="panel panel-body">哈哈哈哈</div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel panel-heading" style="font-size: 16px ;height: 50px;"><?php echo C("web_footer"); ?></div>
                    <div class="panel panel-body"><h3 class="text-center">盗版必究</h3></div>
                </div>
            </div>
    </div>            
    </body>
</html>


