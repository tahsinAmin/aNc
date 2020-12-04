<?php

  $first_name = $last_name = $location = $age = $occupation = $visa_masterCard = $password = $email = '';

  $errors = array('first_name' => '', 'last_name' => '', 'location' => '',
   'age' => '', 'occupation' => '','visa_masterCard' => '', 'password' => '',
   'email' => '');

	if(isset($_POST['submit'])){

    // check first_name
    if(empty($_POST['first_name'])){
      $errors['first_name'] = 'First Name is required';
    } else{
      $first_name = $_POST['first_name'];
      if(!preg_match('/^[a-zA-Z\s]+$/', $first_name)){
        $errors['first_name'] = 'First Name must be letters and spaces only';
      }
    }

    // check last_name
    if(empty($_POST['last_name'])){
      $errors['last_name'] = 'Last Name is required';
    } else{
      $last_name = $_POST['last_name'];
      if(!preg_match('/^[a-zA-Z\s]+$/', $last_name)){
        $errors['last_name'] = 'Last Name must be letters and spaces only';
      }
    }

    // check location
    if(empty($_POST['location'])){
      $errors['location'] = 'Location is required';
    } else{
      $location = $_POST['location'];
    }

    // check location
    if(empty($_POST['age'])){
      $errors['age'] = 'Age is required';
    } else{
      $age = $_POST['age'];
      if(!preg_match('/^[0-9]+$/', $age)){
        $errors['age'] = 'age must be numbers';
      }
    }

    // check occupation
    if(empty($_POST['occupation'])){
      $errors['occupation'] = 'occupation is required';
    } else{
      $occupation = $_POST['occupation'];
      if(!preg_match('/^[a-zA-Z\s]+$/', $occupation)){
        $errors['occupation'] = 'occupation must be letters and spaces only';
      }
    }

    // check visa_masterCard
    if(empty($_POST['visa_masterCard'])){
      $errors['visa_masterCard'] = 'visa_masterCard is required';
    } else{
      $visa_masterCard = $_POST['visa_masterCard'];
      if(!preg_match('/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]/', $visa_masterCard)){
        $errors['visa_masterCard'] = 'Visa MasterCard must be 10 digits';
      }
    }

    // check password
    if(empty($_POST['password'])){
      $errors['password'] = 'password is required';
    } else{
      $password = $_POST['password'];
      if(!preg_match('/^[a-zA-Z]+$/', $password)){
        $errors['password'] = 'password must be letters only';
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
      // echo "form is valid";
      header('Location: index.php');
    }

	} // end POST check

?>

<!DOCTYPE html>
<html>

	<?php include('templates/header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Sign Up</h4>
		<form class="white" action="signup.php" method="POST">


      <label>First Name</label>
      <input type="text" name="first_name" value="<?php echo htmlspecialchars($first_name) ?>">
      <div class="red-text"><?php echo $errors['first_name']; ?></div>
      <label>Last Name</label>
      <input type="text" name="last_name" value="<?php echo htmlspecialchars($last_name) ?>">
      <div class="red-text"><?php echo $errors['last_name']; ?></div>
      <label>Location</label>
      <input type="text" name="location" value="<?php echo htmlspecialchars($location) ?>">
      <div class="red-text"><?php echo $errors['location']; ?></div>
      <label>Age</label>
      <input type="text" name="age" value="<?php echo htmlspecialchars($age) ?>">
      <div class="red-text"><?php echo $errors['age']; ?></div>
      <label>Occupation</label>
      <input type="text" name="occupation" value="<?php echo htmlspecialchars($occupation) ?>">
      <div class="red-text"><?php echo $errors['occupation']; ?></div>
      <label>Visa MasterCard</label>
      <input type="text" name="visa_masterCard" value="<?php echo htmlspecialchars($visa_masterCard) ?>">
      <div class="red-text"><?php echo $errors['visa_masterCard']; ?></div>
      <label>Password</label>
      <input type="text" name="password" value="<?php echo htmlspecialchars($password) ?>">
      <div class="red-text"><?php echo $errors['password']; ?></div>
      <label>Email</label>
      <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
      <div class="red-text"><?php echo $errors['email']; ?></div>

			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>
