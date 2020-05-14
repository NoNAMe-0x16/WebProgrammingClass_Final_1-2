
<!DOCTYPE html>

<html>
	<head>
		<?php
			$cmp_result = strcmp($_POST["password"], $_POST["password2"]);

			if($cmp_result){
			/*다른경우 : 오류메세지 + 돌아가기*/	
				echo 
				"<script type='text/javascript'>
					alert('비밀번호가 일치하지 않습니다.');
					history.back();
				</script>";
			}else{
			/*같은경우 : 회원가입 진행*/
				$chk_username = $_POST["username"];
				$chk_password = $_POST["password"];
				$chk_email = $_POST["email"];
				
				$mysqli = new mysqli('localhost', 'einokt2', 'dbdb!20215', 'einokt2');
 
				if(!$mysqli){        
					echo "MySQL 접속 실패: ";
				}
				
				$sql="select * from register_user where email = '".$chk_email."'";
				$res = $mysqli -> query($sql); 			
				$count = mysqli_num_rows($res); 
				
				if($count > 0) {
					echo
					"<script type='text/javascript'>
						alert('이미 가입된 이메일입니다.');
						history.back();
					</script>";
				}
				else {
					$sql="insert into register_user values('$chk_username', '$chk_password', '$chk_email')";
					
					if($mysqli -> query($sql)) {
						echo "<script>alert('성공하였습니다');
							location.href = '/loginform.html'</script>";
					} else {
						echo "<script>";
						echo "alert('INSERT 오류발생');";
						echo "history.back();";
						echo "</script>";
					}  
				}

			}
		?>
	</head>
</html>

