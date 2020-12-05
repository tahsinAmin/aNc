<?php
  include('config\db_connect.php');

  // write query for all buyer_profile
  $sql = "SELECT * from added_to_cart where buyer_id=1";

  // make query & get result
  $result = mysqli_query($conn, $sql);

  // fetchg the resulting rows as an array
  $lists = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // freee result from memory
  mysqli_free_result($result);

  // close the connectiuon
  mysqli_close($conn);
  // print_r($lists);
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php include('templates/header.php') ?>
  <br><br><br><br>
  <section class="container center">
    <h4 class="center">Shopping Cart</h4>
    <div class="card">
      <div class="col s6 md3">
        <table>
            <thead>
              <tr>
                  <th>Item ID</th>
                  <th>Quantity</th>
                  <th>Amount</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>Alvin</td>
                <td>Eclair</td>
                <td>$0.87</td>
              </tr>
              <tr>
                <td>Alan</td>
                <td>Jellybean</td>
                <td>$3.76</td>
              </tr>
              <tr>
                <td>Jonathan</td>
                <td>Lollipop</td>
                <td>$7.00</td>
              </tr>
            </tbody>
          </table>
        </div>
    </div>
  </section>

  <?php include('templates/footer.php') ?>
</body>
</html>
