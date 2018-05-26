<?php
/*
Plugin Name: mk-sitemap
Plugin URI: https://mkblog.cn/
Description: 孟坤站点地图插件
Author: mengkun
Version: 1.0.0
Author URI: https://mkblog.cn/
*/

if ( !defined('MK_SITEMAP_PATH') )
	define('MK_SITEMAP_PATH', dirname(__FILE__) . '/');

require_once(MK_SITEMAP_PATH.'xml.php');
require_once(MK_SITEMAP_PATH.'html.php');

// 刷新站点地图
function mk_sitemap_refresh() {
    $sitemap_xml = mk_get_xml_sitemap();
    $sitemap_html = mk_get_html_sitemap();
    // 写入站点地图
    file_put_contents(ABSPATH.'sitemap.xml', $sitemap_xml);
    file_put_contents(ABSPATH.'sitemap.html', $sitemap_html);
}

if ( defined('ABSPATH') ) {
    // 挂载钩子
    add_action('publish_post', 'mk_sitemap_refresh');
    // add_action('save_post', 'mk_sitemap_refresh');
    add_action('edit_post', 'mk_sitemap_refresh');
    add_action('delete_post', 'mk_sitemap_refresh');
}