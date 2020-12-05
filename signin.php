<?php

  include('config\db_connect.php');

  $first_name = $password = '';

  $errors = array('fname_or_pass' => '');

	if(isset($_POST['submit'])){

    // check first_name
    if(empty($_POST['first_name'])){
      $errors['fname_or_pass'] = 'First Name or Password is incorrect';
    } else{
      $first_name = $_POST['first_name'];
    }

    // check password
    if(empty($_POST['password'])){
      $errors['fname_or_pass'] = 'First Name or Password is incorrect';
    } else{
      $password = $_POST['password'];
    }

    if (array_filter($errors)) {
      // echo "errors in the form";
    }else {
      $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);

      $sql1 = "SELECT password FROM buyer_profile WHERE first_name='".$first_name."'";
      $result1 = mysqli_query($conn, $sql1);
      $row1 = mysqli_fetch_assoc($result1);

      if($row1['password'] == $password){
        header("Location:dash.php");
        exit();
      }else{
        echo '<script type ="text/Javascript">alert("NOT A USER OF THIS WEBSITE");</script>';
      }
    }
	} // end POST check

?>

<!DOCTYPE html>
<html>

	<?php include('templates/header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Sign In</h4>
		<form class="white" action="signin.php" method="POST">
      <label>First Name</label>
      <input type="text" name="first_name" value="<?php echo htmlspecialchars($first_name) ?>">
      <label>Password</label>
      <input type="text" name="password" value="<?php echo htmlspecialchars($password) ?>">
      <div class="red-text"><?php echo $errors['fname_or_pass']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>
