<?php

  include('config/db_connect.php');

  $last_name = $email = $password = '';

  $errors = array('last_name' => '', 'password' => '', 'email' => '');

	if(isset($_POST['submit'])){

    // check last_name
    if(empty($_POST['last_name'])){
      $errors['last_name'] = 'Last Name is required';
    } else{
      $first_name = $_POST['last_name'];
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
        header("Location:checkout.php?buyer_id=".$buyer_id."");
      }
    }
	} // end POST check

?>

<!DOCTYPE html>
<html>

	<?php include('templates/header0.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Reset Password</h4>
		<form class="white" action="signin.php" method="POST">
      <label>Last Name</label>
      <input type="text" name="last_name" value="<?php echo htmlspecialchars($last_name) ?>">
      <label>Email</label>
      <input type="text" name="last_name" value="<?php echo htmlspecialchars($email) ?>">
      <label>Password</label>
      <input type="text" name="password" value="<?php echo htmlspecialchars($password) ?>">
      <div class="red-text"><?php echo $errors['password']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
      <div class="center">
        <a href="verify.php">Forgot Password?</a>
      </div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>
