<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <title><?php if (!include_slot('title')): ?>优拓－建筑工程技术与项目管理的交流平台 优拓图片<?php endif; ?></title>
    <meta name="robots" content="<?php if (!include_slot('robots')): ?>优拓－建筑工程技术与项目管理的交流平台 优拓<?php endif; ?>" />
    <meta name="description" content="<?php if (!include_slot('description')): ?>优拓－建筑工程技术与项目管理的交流平台 优拓<?php endif; ?>" />
    <meta name="keywords" content="<?php if (!include_slot('keywords')): ?>优拓－建筑工程技术与项目管理的交流平台 优拓<?php endif; ?>" />
    <link rel="shortcut icon" href="/favicon.ico" />

    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
  <div class="content">
			<?php echo $sf_content ?>
  </div>
  </body>
</html>
