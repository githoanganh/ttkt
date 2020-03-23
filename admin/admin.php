<?php
if(!defined('SECURITY'))
{
	die('BẠN KHÔNG CÓ QUYỀN');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Skymap - Global </title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<script src="js/lumino.glyphs.js"></script>

</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Skymap</span>Global</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
					<li><a href="logout.php"><svg class="glyph stroked cancel"></svg> Đăng xuất</a></li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
		<?php  
			$page = isset($_GET['page_layout']) ? $_GET['page_layout'] : '';
			$user_level = $_SESSION['user_level'];
		?>
		<?php  if ($user_level == 3): ?> 	
	    	<li class="<?php if($page == 'money') {echo 'active'; }?>"><a href="index.php?page_layout=money"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Chấm công</a></li>
		<?php elseif ($user_level == 2 ): ?>
			<li class="<?php if($page == 'leader') {echo 'active';}?>"><a href="index.php?page_layout=leader"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"></svg>Kiểm định</a></li>
			<li class="<?php if($page == 'user') {echo 'active';}?>"><a href="index.php?page_layout=user"><svg class="glyph stroked open folder "><use xlink:href="#stroked-open-folder"/></svg>Thành viên</a></li>
        <?php else: ?>
			<li class="<?php if($page == 'pay' ) {echo 'active';}?>"><a href="index.php?page_layout=pay"><svg class="glyph stroked open folder "><use xlink:href="#stroked-open-folder"/></svg>Quyết toán</a></li>
		<?php endif; ?>
		</ul>
	</div>
	 <!-- Master page here -->
	<?php
		if (isset($_GET['page_layout'])) {
			switch($_GET['page_layout']) {
				//money
				case 'money': include_once('money.php');break;
				case 'add_money': include_once('add_money.php');break;
				//leader
				case 'leader': include_once('leader.php');break;
				case 'edit_leader': include_once('edit_leader.php');break;
				// user
				case 'user': include_once('user.php');break;
				case 'add_user': include_once('add_user.php');break;
				case 'edit_user': include_once('edit_user.php');break;
				//print
				case 'pay': include_once('pay.php');break;
				break;
			}
		}
		else {
			include_once('sub_admin.php');
		}
	?>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-table.js"></script>
</body>
</html>
