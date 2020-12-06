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
                  <th class="center">Item ID</th>
                  <th class="center">Quantity</th>
                  <th class="center">Amount</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($lists as $list): ?>
                <tr>
                  <td class="center"><?php echo htmlspecialchars($list['item_id']) ?></td>
                  <td class="center"><?php echo htmlspecialchars($list['frequency']) ?></td>
                  <td class="center"><?php echo htmlspecialchars($list['amount_to_pay']) ?></td>
                </tr>
              <?php  endforeach; ?>
            </tbody>
          </table>
        </div>
    </div>
  </section>

  <?php include('templates/footer.php') ?>
</body>
</html>
