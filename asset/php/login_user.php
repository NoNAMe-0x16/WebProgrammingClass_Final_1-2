
<!DOCTYPE html>

<html>
	<head>
		<?php
			$chk_password = $_POST["password"];
			$chk_email = $_POST["email"];
			
			$mysqli = new mysqli('localhost', 'einokt2', 'dbdb!20215', 'einokt2');
 
			if(!$mysqli){        
				echo "MySQL 접속 실패: ";
			}
				
			$sql="select user_name from register_user where email = '$chk_email' and password = '$chk_password'";
			$res = $mysqli -> query($sql); 					
			$count = mysqli_num_rows($res); 
			if($count > 0) {
				$row = mysqli_fetch_array($res);
				$chk_username = $row['user_name'];
				setcookie("id", $chk_username, time()+86300, "/");
				setcookie("login_time", time(), time()+86300, "/");
				setcookie("token", md5($chk_password), time()+86300, "/");
				
				echo
				"<script type='text/javascript'>
					alert('로그인을 성공하였습니다.');
					location.href='/main.html';
				</script>";
				
			}
			else {
				echo
				"<script type='text/javascript'>
					alert('로그인을 실패하였습니다.');
					history.back();
				</script>";
			}
		?>
	</head>
</html>

