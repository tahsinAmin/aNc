<!-- NOTE:
1. Get a go back button here as well -->
<?php
  include('config/db_connect.php');

//  Comment below
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
  //  Comment above
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
                  <th></th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($lists as $list): ?>
                <tr>
                  <td class="center"><?php echo htmlspecialchars($list['item_id']) ?></td>
                  <td class="center"><?php echo htmlspecialchars($list['frequency']) ?></td>
                  <td class="center"><?php echo htmlspecialchars($list['amount_to_pay']) ?></td>
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

  <?php include('templates/footer.php') ?>
</body>
</html>
