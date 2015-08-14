<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Calm breeze login screen</title>
        <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="wrapper">
	<div class="container">
		<h1>Welcome</h1>
		<?php
		session_start();
		include_once 'lib/users.php';
		if(isset($_POST['submit'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$users = new users();
			$users->set_users_acc($username);
			$users->set_users_pass($password);
			$users->get_users_acc();
			$users->get_users_pass();
			if($users->login() == 'acc not valid') {
				echo "Tài khoản hoặc mật khẩu không hợp lệ";
			}
			else {
				echo $username."<br />";
				echo $password."<br />";
			}
		}
		?>
		<form class="form" method="post">
			<input type="text" placeholder="Username" name="username">
			<input type="password" placeholder="Password" name="password">
			<button type="submit" id="login-button" name="submit">Login</button>
		</form>
	</div>
</div>
  </body>
</html>
