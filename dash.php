<!-- NOTE: WORK REMAIN
1. MAKE NSURE THAT A USER CAN'T LOGIN USING THE URL -->
<?php
  include('config/db_connect.php');
  include('s_start.php');

  $sql = "SELECT * FROM buyer_profile WHERE buyer_id='".$b_id."'";
  $result = mysqli_query($conn, $sql);
  $buyer_info = mysqli_fetch_assoc($result);

  // check GET request item_id param
	if (isset($_GET['buyer_id'])) {
    $buyer_id = $_GET['buyer_id'];
    $sql = "SELECT item_name, sell_price, in_stock, item_id FROM item_info";
    $result = mysqli_query($conn, $sql);
    $items_info = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);
	}else {
    echo "Query Error: " . mysqli_error($conn);
	}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php include('templates/header.php') ?>

  <br><br><br><br>
  <h4 class="center grey-text">Welcome <?php echo $buyer_info['first_name'] ?></h4>

  <div class="container">
    <div class="row">
      <?php foreach ($items_info as $item_info): ?>

        <div class="col s6 md3">
          <div class="card z-depth-0">
            <img class="dash-image" src="img/<?php echo $item_info['item_id'] ?>.jpg" alt="">
            <div class="card-content center">
              <h5><?php echo htmlspecialchars($item_info['item_name']) ?></h5>
              <div>Sellig Price: <?php echo htmlspecialchars($item_info['sell_price']) ?></div>
              <div>In Stock: <?php echo htmlspecialchars($item_info['in_stock']) ?></div>
            </div>
            <div class="card-action right-align">
              <a href="details.php?buyer_id=<?php echo $_GET['buyer_id'] ?>&item_id=<?php echo $item_info['item_id'] ?>" class="brand-text">More Info</a>
            </div>
          </div>
        </div>
      <?php  endforeach; ?>
    </div>
  </div>

  <?php include('templates/footer.php') ?>
  </body>
</html>

<!-- Cross site scripting attacks -->
