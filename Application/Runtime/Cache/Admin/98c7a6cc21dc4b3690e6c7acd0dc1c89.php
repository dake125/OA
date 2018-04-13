<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>test8</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<link href="" rel="stylesheet">
	</head>
	
	<body>
		中括号形式：<?php echo ($array[0]); ?> - <?php echo ($array[1]); ?> - <?php echo ($array[2]); ?> - <?php echo ($array[3]); ?><br/>
		点形式：<?php echo ($array["0"]); ?> - <?php echo ($array["1"]); ?> - <?php echo ($array["2"]); ?> - <?php echo ($array["3"]); ?><hr/>
		中括号形式：<?php echo ($array2[0][0]); ?> - <?php echo ($array2[0][1]); ?> - <?php echo ($array2[0][2]); ?> - <?php echo ($array2[0][3]); ?><br/>
		点形式：<?php echo ($array2["1"]["0"]); ?> - <?php echo ($array2["1"]["1"]); ?> - <?php echo ($array2["1"]["2"]); ?> - <?php echo ($array2["1"]["3"]); ?>
	</body>
</html>