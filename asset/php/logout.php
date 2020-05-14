<!DOCTYPE html>

<html>
	<head>
		<?php
			setcookie("id", "", time()+86300, "/");
			echo
				"<script type='text/javascript'>
					alert('로그아웃 하였습니다.');
					location.href='/main.html';
				</script>";
		?>
	</head>
</html>