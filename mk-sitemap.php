<?php
/**
 * Plugin Name: mk-sitemap
 * Plugin URI: https://github.com/mengkunsoft/mk-sitemap
 * Description: 一款简洁的 WordPress 站点地图插件 A simple WordPress sitemap plugin
 * Author: mengkun
 * Version: 1.1
 * Author URI: https://mkblog.cn/
 */

if ( !defined('MK_SITEMAP_PATH') )
	define('MK_SITEMAP_PATH', dirname(__FILE__) . '/');


// 刷新站点地图
function mk_sitemap_refresh() 
{
    // 生成 XML 格式的站点地图
    // 因为 WordPress 已自带了 xml 的站点地图，因此以下三行不再执行
    //require_once(MK_SITEMAP_PATH.'xml.php');
    //$sitemap_xml = mk_get_xml_sitemap();
    //file_put_contents(ABSPATH.'sitemap.xml', $sitemap_xml);
    
    // 生成 HTML 格式的站点地图
    require_once(MK_SITEMAP_PATH.'html.php');
    $sitemap_html = mk_get_html_sitemap();
    file_put_contents(ABSPATH.'sitemap.html', $sitemap_html);
}

// 插件被启用
function mk_sitemap_activation() 
{
    mk_sitemap_refresh();
}


if (defined('ABSPATH')) {
    // 挂载钩子
    add_action('publish_post', 'mk_sitemap_refresh');   // 发表内容
    add_action('save_post', 'mk_sitemap_refresh');      // 保存内容
    add_action('edit_post', 'mk_sitemap_refresh');      // 编辑内容
    add_action('delete_post', 'mk_sitemap_refresh');    // 删除内容

    register_activation_hook(__FILE__, 'mk_sitemap_activation');
}