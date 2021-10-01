<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>User Display Page</title>
	<link rel="stylesheet" type="text/css" href="CSS/Display.css">
</head>
<body>
<nav>  
  <ul>
    <form action="IndexLogin.php" method="POST">
    <li><button class="x" name="LogOut">   <img src="Images/LogOutNav.png" height="60" width="60"></button></li>
    </form>
  </ul>
</nav>

<?php
	session_start();
	$conn = new mysqli("localhost","root","","software_exercise");
	
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		//HASH PASSWORD
		$password = md5($password);

		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;

		$result = $conn->query("SELECT * FROM Person WHERE user_username = '{$_SESSION['username']}' AND user_password = '{$_SESSION['password']}'");  

		$row = $result->fetch_assoc();

		if($username==$row['user_username'] && $password==$row['user_password']){
			$_SESSION['user_id'] 			= $row['user_id'];
			$_SESSION['user_name'] 			= $row['user_name'];
			$_SESSION['user_username'] 		= $row['user_username'];
			$_SESSION['user_email'] 		= $row['user_email'];
			$_SESSION['user_password'] 		= $row['user_password'];
			$_SESSION['user_descript'] 		= $row['user_descript'];
			$_SESSION['user_image'] 		= $row['user_image'];
		
		}else{
			header('location:IndexLogin.php');
		}
	}	
		echo '
	    <div id="x"><center>
	    <img class="profileBack" src="Images/BackgroundProfile.jpeg" width=800px height=275px><br>
	    <section class="profile"> <!--bantayan-->
	    <img class="profilePic" src='.$row['user_image'].' width=150px height=150px>
	    </center>
	    </section>
	    
	    <section class="profile-details">
	    <h4>'.$row['user_name'].'</h4><br>
	    <p>'.$row['user_descript'].'</p><br><center><hr></center>
	     
	    <h2>Contact Information</h2>
	    <p>'.$row['user_email'].'</p><br>
	    </section>
	    </div>
	    ';

?>
</body>
</html>