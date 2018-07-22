mk-sitemap
========
mk-sitemap 是一个简洁的 WordPress 站点地图插件。

本插件无需任何设置，直接在 WordPress 后台上传并启用即可。每次发表、修改、或删除文章时，会自动触发更新站点地图的操作，在站根目录生成 `sitemap.html` 和 `sitemap.xml` 两个文件。

[![GitHub issues](https://img.shields.io/github/issues/mengkunsoft/mk-sitemap.svg)](https://github.com/mengkunsoft/mk-sitemap/issues) [![GitHub forks](https://img.shields.io/github/forks/mengkunsoft/mk-sitemap.svg)](https://github.com/mengkunsoft/mk-sitemap/network) [![GitHub stars](https://img.shields.io/github/stars/mengkunsoft/mk-sitemap.svg)](https://github.com/mengkunsoft/mk-sitemap/stargazers) [![GitHub license](https://img.shields.io/github/license/mengkunsoft/mk-sitemap.svg)](https://github.com/mengkunsoft/mk-sitemap/blob/master/LICENSE)


### 在线演示
-----

[sitemap.html](https://mkblog.cn/sitemap.html)、[sitemap.xml](https://mkblog.cn/sitemap.xml)


### 常见问题
-----
#### 无法生成站点地图

请给予站点根目录写权限（sitemap.html、sitemap.xml）。

#### 没有自动更新站点地图

因为生成的站点地图是静态文件，可能是网站的 CDN 还没刷新引起的。请刷新 CDN 或通过 FTP 检查根目录的站点地图是否已更新。


### 更新日志
-----
#### v1.0.1 `2018/7/22`
- 修复 RSS 生成报错；
- 修复 XSS 漏洞。

#### v1.0.0 `2018/5/26`
- 横空出世！