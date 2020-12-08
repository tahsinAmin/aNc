<?php

include('config/db_connect.php');

$last_name = $password = $email = '';

$errors = array('last_name' => '', 'password' => '', 'email' => '');

if(isset($_POST['submit'])){

  // check last_name
  if(empty($_POST['last_name'])){
    $errors['last_name'] = 'Last Name is required';
  } else{
    $last_name = $_POST['last_name'];
    if(!preg_match('/^[a-zA-Z\s]+$/', $last_name)){
      $errors['last_name'] = 'Last Name must be letters and spaces only';
    }
  }

  // check password
  if(empty($_POST['password'])){
    $errors['password'] = 'password is required';
  } else{
    $password = $_POST['password'];
    if(!preg_match('/^[a-zA-Z0-9]+$/', $password)){
      $errors['password'] = 'password must be letters and numbers only';
    }
  }

  // check email
  if(empty($_POST['email'])){
    $errors['email'] = 'An email is required';
  } else{
    $email = $_POST['email'];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $errors['email'] = 'Email must be a valid email address';
    }
  }


    if (array_filter($errors)) {
      // echo "errors in the form";
    }else {
      $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);

      $sql = "UPDATE buyer_profile SET password='".$password."' WHERE last_name='".$last_name."' AND email='".$email."'";

      if (mysqli_query($conn, $sql)) {
        header("Location:signin.php");
      }else{
        echo '<script type ="text/Javascript">alert("There was an error");</script>';
      }
    }
	} // end POST check

?>

<!DOCTYPE html>
<html>



  <section class=" verify">

    	<?php include('templates/header0.php'); ?>
          <br><br><br>
		<h4 class="center white-text">Reset Password</h4>
		<form class="white" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
      <label>Last Name</label>
      <input type="text" name="last_name" value="<?php echo htmlspecialchars($last_name) ?>" required>
      <div class="red-text"><?php echo $errors['last_name']; ?></div>
      <label>Email</label>
      <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>" required>
      <div class="red-text"><?php echo $errors['email']; ?></div>
      <label>Password</label>
      <input type="text" name="password" value="<?php echo htmlspecialchars($password) ?>" required>
      <div class="red-text"><?php echo $errors['password']; ?></div>

			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
    	<?php include('templates/footer.php'); ?>
	</section>



</html>
