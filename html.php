<?php

// 获取 HTML 站点地图
function mk_get_html_sitemap() {
    ob_start(); // 启用回收
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <meta name="author" content="mengkun">
    <meta name="generator" content="KodCloud">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    
    <meta name="description" content="<?php bloginfo('name'); ?>站点地图">
    <meta name="keywords" content="<?php bloginfo('name'); ?>,站点地图,sitemap">
    
    <title><?php bloginfo('name'); ?> | 站点地图</title>
    
    <!-- RSS -->
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />

    <style>
    *{margin:0;padding:0;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;font-family:Microsoft Yahei,"微软雅黑","Helvetica Neue",Helvetica,Hiragino Sans GB,WenQuanYi Micro Hei,sans-serif}
    html,body{width:100%;height:100%}
    a{text-decoration:none;color:#333;-webkit-transition:.3s ease all;-moz-transition:.3s ease all;-o-transition:.3s ease all;transition:.3s ease all}
    a:focus{outline:none}
    .sitemap-lists a{padding:8px 5px;border-radius:5px}
    .sitemap-lists a:hover{background:#eee}
    img{border:none}
    li{list-style:none}
    .clear-fix{zoom:1}
    .clear-fix:before,.clear-fix:after{display:table;line-height:0;content:""}
    .clear-fix:after{clear:both}
    .hidden{display:none}
    .container{max-width:900px;margin:0 auto;position:relative;padding:5px}
    .page-title{font-weight:600;font-size:30px;text-align:center;padding:40px;position:relative}
    .page-title:after{content:"";border-bottom:3px #bdbdbd solid;position:absolute;left:50%;top:50%;padding-top:60px;transform:translate(-50%,-50%);width:60px;z-index:-1}
    .section-title{font-weight:500;font-size:16px;position:relative;margin:15px 0 10px;color:#fff;background:#565555;display:inline-block;padding:5px 8px;border-radius:5px}
    .post-lists li{padding:4px 0}
    .post-lists li>a{display:block}
    .category-lists li>a,.tag-lists li>a{display:inline-block;float:left;margin-right:4px;margin-bottom:4px}
    .page-footer{text-align:center;padding:10px;font-size:14px;color:#c7c7c7}
    </style>

</head>
<body>

<div class="container">
    <h1 class="page-title"><a href="<?php bloginfo('url'); ?>" target="_blank">SiteMap</a></h1>
    
    <?php
    $posts = get_posts('numberposts=-1&orderby=post_date&order=DESC');
    if(count($posts)):
    ?>
    <h2 class="section-title">文章 / Article</h2>
    <ul class="sitemap-lists post-lists clear-fix">
        <?php foreach($posts as $post) : ?>
        <li><a href="<?php echo get_permalink($post->ID); ?>" title="<?php echo $post->post_title; ?>" target="_blank"><?php echo $post->post_title; ?></a></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    
    <?php
    $pages = get_pages('numberposts=-1&orderby=post_date&order=DESC');
    if(count($pages)):
    ?>
    <h2 class="section-title">页面 / Page</h2>
    <ul class="sitemap-lists post-lists clear-fix">
        <?php foreach($pages as $page) : ?>
        <li><a href="<?php echo get_page_link($page->ID); ?>" title="<?php echo $page->post_title; ?>" target="_blank"><?php echo $page->post_title; ?></a></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    
    <?php
    $categorys = get_terms('category', 'orderby=name&hide_empty=0');
    if(count($categorys)) :
    ?>
    <h2 class="section-title">分类 / Category</h2>
    <ul class="sitemap-lists category-lists clear-fix">
        <?php foreach ($categorys as $category) : ?>
        <li><a href="<?php echo get_term_link($category, $category->slug); ?>" title="<?php echo $category->name; ?>" target="_blank"><?php echo $category->name; ?></a></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    
    <?php
    $tags = get_terms('post_tag', 'orderby=name&hide_empty=0');
    if(count($tags)) :
    ?>
    <h2 class="section-title">标签 / Tag</h2>
    <ul class="sitemap-lists tag-lists clear-fix">
        <?php foreach ($tags as $tag) : ?>
        <li><a href="<?php echo get_term_link($tag, $tag->slug); ?>" title="<?php echo $tag->name; ?>" target="_blank"><?php echo $tag->name; ?></a></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    
</div>  <!-- .container -->

<footer class="page-footer">
    最后更新于 <?php echo get_lastpostdate('blog'); ?>
    <!-- 本站点地图使用 mk-sitemap 插件生成。插件作者：https://mkblog.cn/ -->
</footer>

</body>
</html>
<?php
    return ob_get_contents();
    ob_clean();
}
?>