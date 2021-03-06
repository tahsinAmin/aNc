<?php

  include('config/db_connect.php');

  $first_name = $password = '';

  $errors = array('first_name' => '', 'password' => '');

	if(isset($_POST['submit'])){

    // check first_name
    if(empty($_POST['first_name'])){
      $errors['first_name'] = 'First Name is required';
    } else{
      $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    }

    // check password
    if(empty($_POST['password'])){
      $errors['password'] = 'Password is required';
    } else{
      $password = $_POST['password'];
    }

    if (array_filter($errors)) {
      // echo "errors in the form";
    }else {
      $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);

      $sql = "SELECT password, buyer_id FROM buyer_profile WHERE first_name='".$first_name."'";
      $result = mysqli_query($conn, $sql);
      $userInfo = mysqli_fetch_assoc($result);

      if($userInfo['password'] == $password){
        session_start();
        $_SESSION['buyer_id'] = $userInfo['buyer_id'];

        header("Location:dash.php?buyer_id=".$userInfo['buyer_id']."");
        exit();
      }else{
        echo '<script type ="text/Javascript">alert("NOT A USER OF THIS WEBSITE");</script>';
      }
    }
	} // end POST check

?>

<!DOCTYPE html>
<html>
  <div class="signin">
    	<?php include('templates/header0.php'); ?>
      <br><br><br><br><br><br>
	<section class="container grey-text">
		<h4 class="center white-text" style="font-weight: bold;">Sign In</h4>
		<form class="" action="<?php echo $_SERVER['PHP_SELF'] ?>" style="background-color: #111725e3 !important;" method="POST">
      <label>First Name</label>
      <input type="text" name="first_name" class="classy-text" value="<?php echo htmlspecialchars($first_name) ?>" required>
      <div class="red-text"><?php echo $errors['first_name']; ?></div>
      <label>Password</label>
      <input type="text" name="password" class="classy-text" value="<?php echo htmlspecialchars($password) ?>" required>
      <div class="red-text"><?php echo $errors['password']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0" required>
			</div>
      <div class="center">
        <a href="verify.php">Forgot Password?</a>
      </div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>
  </div>

</html>
