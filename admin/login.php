<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>BKX Confessions - Administrator</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</head>
<body>
	<?php 
		if (isset($_POST['sbm'])) {
		// Lấy pass từ trong database 
			$mail = isset($_POST['mail'])? $_POST['mail']: null ;
			$pass = isset($_POST['pass'])? $_POST['pass']: null ;
	    // $sql = "SELECT user_pass FROM user WHERE user_mail = '$mail' " ;
		// $query = mysqli_query($conn,$sql);
		// $row = mysqli_fetch_array($query,MYSQLI_BOTH);
		// $dbuser_level = isset($row['user_level'])? $row['user_level'] : null ;
		// $dbPassword = isset($row['user_pass'])? $row['user_pass'] : null ;
		// $dbSalt = 'doan3';
		// $inputHashed = crypt($pass, $dbSalt);
		// // Mã hóa password của người dùng với key chính là password trong database, nếu password đúng thì 
		// // sẽ trả về đoạn hash giống hệt trong database
		// if ( hash_equals($inputHashed, $dbPassword) && $dbuser_level == 3) {
		// 	$_SESSION['mail']=$mail;
		// 	$_SESSION['pass']=$pass;
		// 	header('location:index.php?page_layout=money');
		//  }
			$sql = "SELECT user_pass,user_level,user_id FROM user WHERE user_mail = '$mail' " ;
			$query = mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($query,MYSQLI_BOTH);
			$dbuser_level = isset($row['user_level'])? $row['user_level'] : null ;
			$dbPassword = isset($row['user_pass'])? $row['user_pass'] : null ;
			$dbuser_id = isset($row['user_id'])? $row['user_id'] : null ;
			$_SESSION['mail']=$mail;
			$_SESSION['pass']=$pass;
			$_SESSION['user_id']=$dbuser_id;
			$_SESSION['user_level']=$dbuser_level;
			if ( $dbPassword == $pass && $dbuser_level == 1 ) {
			
				header('location:index.php?page_layout=pay');
			} else if ($dbPassword == $pass && $dbuser_level == 2) {
				header('location:index.php?page_layout=leader');
		 	} else if ($dbPassword == $pass && $dbuser_level == 3){

				header('location:index.php?page_layout=money');
		 	} else {
				$error = ' <div class="alert alert-danger">Tài khoản không hợp lệ !</div> ';
		 	} 
		}
	?>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading"><img src="img/sky.png" alt="" >	Skymap - Global</div>
				<div class="panel-body">
					<?php if (isset($error)) echo $error ;?>
						<form role="form" method="post">
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="E-mail" name="mail" type="email" autofocus>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Mật khẩu" name="pass" type="password" value="">
								</div>
								<button type="submit" class="btn btn-primary" name="sbm">Đăng nhập</button>
							</fieldset>
						</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
</body>
</html>
