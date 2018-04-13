<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>test13</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<link href="" rel="stylesheet">
	</head>
	
	<body>
		变量a=<?php echo ($a); ?>，变量b=<?php echo ($b); ?><br/>
		a+b=<?php echo ($a+$b); ?><br/>
		a-b=<?php echo ($a-$b); ?><br/>
		a*b=<?php echo ($a*$b); ?><br/>
		a/b=<?php echo ($a/$b); ?><br/>
		a%b=<?php echo ($a%$b); ?><br/>
		a++=<?php echo ($a++); ?> ++a=<?php echo ++$a;?><br/>
		b--=<?php echo ($b--); ?> --b=<?php echo --$b;?>
	</body>
</html>