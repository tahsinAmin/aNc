
<!-- NOTE:
1. how do i deduct the frequency of the items -->
<?php
  include('config/db_connect.php');

  if (isset($_GET['buyer_id'])) {
    $buyer_id = $_GET['buyer_id'];
    $sql = "SELECT * from added_to_cart where buyer_id='".$buyer_id."'";
    $result = mysqli_query($conn, $sql);
    $lists = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);
  }else {
    echo "Query Error: " . mysqli_error($conn);
  }

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
      $fn = mysqli_real_escape_string($conn, $_POST['first_name']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);

      $sql = "SELECT password, buyer_id FROM buyer_profile WHERE first_name='".$fn."'";
      $result = mysqli_query($conn, $sql);
      $userInfo = mysqli_fetch_assoc($result);

      if($userInfo['password'] == $password){
        header("Location:dash.php?buyer_id=".$userInfo['buyer_id']."");
        exit();
      }else{
        echo '<script type ="text/Javascript">alert("NOT A USER OF THIS WEBSITE");</script>';
      }
    }
  } // end POST check

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php include('templates/header.php') ?>
  <br><br><br><br>
  <section class="container center">
    <div class="left-align">
      <a href="dash.php?buyer_id=<?php echo $_GET['buyer_id']?>" class="btn brand">Go Back</a>
    </div>
    <h4 class="center">Shopping Cart</h4>
    <div class="card">
      <div class="col s6 md4">
        <table>
            <thead>
              <tr>
                  <th class="center">Item ID</th>
                  <th class="center">Quantity</th>
                  <th class="center">Amount</th>
                  <th></th>
              </tr>
            </thead>

            <tbody>
              <?php $sum = 0; ?>
              <?php foreach ($lists as $list): ?>
                <tr>
                  <td class="center"><?php echo htmlspecialchars($list['item_id']) ?></td>
                  <td class="center"><?php echo htmlspecialchars($list['frequency']) ?></td>
                  <td class="center"><?php echo htmlspecialchars($list['amount_to_pay']) ?></td>
                  <?php $sum += $list['amount_to_pay'] ?>
                  <td>
                    <a href="check_del.php?buyer_id=<?php echo $list['buyer_id'] ?>&item_id=<?php echo $list['item_id'] ?>" class="brand-text">Delete</a>
                  </td>
                </tr>
              <?php  endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>

    <form class="col s6 md3 center" action="index.html" method="post">
      <h5>Total Amount: <?php echo "OMR " . $sum ?></h5>
      Enter PIN to confirm Purchase:
      <div class="input-field inline">
        <input name="visa_masterCard" type="password" class="">
      </div>
      <input type="hidden" name="buyer_id" value="<?php echo $buyer_id; ?>">
      <div class="right-align">
        <input type="submit" name="submit" value="Confirm Purchase" class="input-field btn brand">
      </div>
    </form>

  <?php include('templates/footer.php') ?>
</body>
