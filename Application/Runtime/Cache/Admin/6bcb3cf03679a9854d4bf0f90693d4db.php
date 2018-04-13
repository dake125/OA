<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>test10</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<link href="" rel="stylesheet">
	</head>
	
	<body>
		$Think.server.path：<?php echo ($_SERVER['PATH']); ?><br/>
		$Think.get.id：<?php echo ($_GET['id']); ?><br/>
		$Think.request.pid：<?php echo ($_REQUEST['pid']); ?><br/>
		$Think.cookie.PHPSESSID：<?php echo (cookie('PHPSESSID')); ?><br/>
		$Think.config.DEFAULT_MODULE：<?php echo (C("DEFAULT_MODULE")); ?>
	</body>
</html>