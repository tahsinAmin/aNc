<!-- NOTE: WORK remain:
2. sHOIW THE IMAGE
 -->
<?php
	include('config/db_connect.php');

	// check GET request item_id param
	if (isset($_GET['item_id']) && isset($_GET['buyer_id'])) {
		// print_r($_GET['item_id']);
		$item_id = mysqli_real_escape_string($conn, $_GET['item_id']);
		$buyer_id= $_GET['buyer_id'];
		$sql = "SELECT * FROM item_info WHERE item_id = '".$item_id."'";
		$result = mysqli_query($conn, $sql);

		// fetch resuylt ion aray NumberFormatter
		$item = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);

		// print_r($item);
	}else if(isset($_POST['submit'])){
		$buyer_id = $_POST['buyer_id'];
		$item_id = $_POST['item_id'];


		$errors = array('frequency' => '');
		$frequency = $_POST['frequency'];

		//	$sql = "SELECT item_info.sell_price*added_to_cart.frequency as Amount from item_info inner join added_to_cart on item_info.item_id='".$item_id."'";
		$sql="SELECT * FROM item_info WHERE item_id = '".$item_id."'";
		$result = mysqli_query($conn, $sql);
		$item = mysqli_fetch_assoc($result);

		$amount = $frequency * $item['sell_price'];
		echo ($amount);

		$sql2 = "INSERT INTO added_to_cart(buyer_id, item_id, frequency, amount_to_pay) VALUES($buyer_id, '$item_id', '$frequency', '$amount')";

		// save to db and check
		if(mysqli_query($conn, $sql2)){
			// sucess
			// echo "form is valid";
			header("Location:dash.php?buyer_id=".$buyer_id."");
		}else{
			// fails
			echo "Query Error: " . mysqli_error($conn);
		}

		mysqli_free_result($result);
		mysqli_close($conn);

		}else{
			echo '<script type ="text/Javascript">alert("NOT A USER OF THIS WEBSITE");</script>';
		}
	// code.../

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<?php include('templates/header.php'); ?>
	<br><br><br><br><br><br>
	<div class="container">
		<div class="row">
			<div class="col s12">
				<a href="dash.php?buyer_id=<?php echo $_GET['buyer_id']?>" class="btn brand">Go Back</a>
				<br><br>
			</div>


				<?php if($item): ?>
				<div class="col s6">
					<img class="det-image" src="img/<?php echo $item['item_id'] ?>.jpg" alt="">
				</div>
				<div class="col s6">

					<div class="card z-depth-0">
						<div class="card-content center">
							<h4><?php echo htmlspecialchars($item['item_name']); ?></h4>
							<p>
								<ul style="font-size: 20px;">
									<?php foreach (explode(',', $item['item_description']) as $desc): ?>
										<li><?php echo htmlspecialchars($desc); ?></li>
									<?php endforeach; ?>
								</ul>
							</p>
						</div>

						<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method= "POST">
							<input type="text" name="buyer_id" value="<?php echo "$buyer_id"; ?>" hidden>
							<input type="number" name="item_id" value="<?php echo "$item_id"; ?>" hidden>
							Quantity:<input type="number" name="frequency" value=1 required min=1 max="<?php echo htmlspecialchars($item['in_stock']);?>"/>
							<div class="right-align">
								<input type="submit" name="submit" value="Add" class="btn brand">
							</div>
						</form>
					</div>
				</div>
		</div>
		<?php else: ?>
			<h5>No such Item exists!</h5>
		<?php endif; ?>
	</div>
  <?php include('templates/footer.php'); ?>
</html>
