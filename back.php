<?php include_once "base.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0055)?do=admin -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>影城</title>
<link href="css/css.css" rel="stylesheet">
<link href="css/s2.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/js.js"></script>
</head>

<body>
<div id="main">
<div id="top" style=" background:#999 center; background-size:cover; " title="替代文字">
	<h1>ABC影城</h1>
</div>
<div id="top2">
	<a href="index.php">首頁</a>
	<a href="index.php?do=order">線上訂票</a>
	<a href="#">會員系統</a>
	<a href="back.php">管理系統</a> 
</div>
<div id="text"> <span class="ct">最新活動</span>
	<marquee direction="right">
	ABC影城票價全面八折優惠1個月
	</marquee>
</div>
<div id="mm">

	<?php
	if (!empty($_POST)) {
		if ($_POST['acc'] == 'admin' && $_POST['pw'] == '1234') {
			$_SESSION['login'] = 1;
		} else {
			echo "<div class='ct' style='color: red;'>帳號或密碼錯誤</div>";
		}
	}

	if (isset($_SESSION['login'])) {
		//Backstage
		include "./back/nav.php";
		$do = $_GET['do'] ?? '';
		$file = "./back/". $do . ".php";
		if (file_exists($file)) {
			include $file;
		} else {
			include "./back/main.php";
		}
	} else {
		include "./back/login.php";
	}
	?>
</div>
<div id="bo"> ©Copyright 2010~2014 ABC影城 版權所有 </div>
</div>
</body>
</html>