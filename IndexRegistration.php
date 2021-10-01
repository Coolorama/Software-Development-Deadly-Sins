<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration Form</title>
	<link rel="stylesheet" type="text/css" href="CSS/Registration.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
  			$("form").submit(function(){
    		alert("You have been registered as a Student!");
  			});
		});

		 $(document).ready(function(){
        var $submitBtn = $("#form input[type='submit']");
        var $passwordBox = $("#password");
        var $confirmBox = $("#confirm_password");
        var $errorMsg =  $('<span id="error_msg">Passwords do not match.</span>');

        // This is incase the user hits refresh - some browsers will maintain the disabled state of the button.
        $submitBtn.removeAttr("disabled");

        function checkMatchingPasswords(){
            if($confirmBox.val() != "" && $passwordBox.val != ""){
                if( $confirmBox.val() != $passwordBox.val() ){
                    $submitBtn.attr("disabled", "disabled");
                    $errorMsg.insertAfter($confirmBox);
                }
            }
        }

        function resetPasswordError(){
            $submitBtn.removeAttr("disabled");
            var $errorCont = $("#error_msg");
            if($errorCont.length > 0){
                $errorCont.remove();
            }  
        }

        $("#confirm_password, #password")
             .on("keydown", function(e){
                /* only check when the tab or enter keys are pressed
                 * to prevent the method from being called needlessly  */
                if(e.keyCode == 13 || e.keyCode == 9) {
                    checkMatchingPasswords();
                }
             })
             .on("blur", function(){                    
                // also check when the element looses focus (clicks somewhere else)
                checkMatchingPasswords();
            })
            .on("focus", function(){
                // reset the error message when they go to make a change
                resetPasswordError();
            })

    });
	</script>
</head>
<body>
		<div id="Registration">
			<center><h1>Registration Form</h1></center>
				<form id="form" name="form" action='' method='POST'>
				<label class="x">First Name</label>
				<CENTER><input type="text" name="fname" placeholder="First" required></CENTER>
				<label class="x">Last Name</label>
				<CENTER><input type="text" name="lname" placeholder="Last" required></CENTER>
				<label class="x">Username</label>
				<center><input type="text" name="username" placeholder="Username" required></center>
				<label class="x">Email</label>
				<center><input type="email" name="email"  placeholder="Email"required></center>
				<label class="x" for="password">Password</label>
				<center><input type="password" name="password" id="password" placeholder="Password"required></center>
				<label class="x" for="confirm_password">Confirm Password</label>
				<center><input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password"required></center>
				<CENTER><input type="submit" name="submit" value="Register"></CENTER>	
			</form>
				<center><a href="IndexLogin.php">Click here to Login</a></center>
		</div>
<?php
	$conn = new mysqli("localhost","root","","software_exercise");

	$descrip = "I am a new User!";
	$image = "Images/Profile.png";

	if(isset($_POST['submit'])){
		$name = $_POST['fname']." ".$_POST['lname'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		//HASH PASSWORD
		$password = md5($password);
		

		$sql = "INSERT INTO Person (user_name, user_username, user_email, user_password, user_descript, user_image) 
			               VALUES ('$name','$username','$email','$password','$descrip','$image')";
		$conn->query($sql);

		header('location:IndexLogin.php');
	}
?>
</body>
</html>