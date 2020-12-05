<!-- NOTE: WORK remain:
1. sHOW IT AS A LIST FOR item_description
2. sHOIW THE IMAGE
 -->
<?php
	include('config/db_connect.php');

	// check GET request item_id param
	if (isset($_GET['item_id'])) {
		// print_r($_GET['item_id']);
		$item_id = mysqli_real_escape_string($conn, $_GET['item_id']);

		$sql = "SELECT * FROM item_info WHERE item_id = '".$item_id."'";

		// get the query result
		$result = mysqli_query($conn, $sql);

		// fetch resuylt ion aray NumberFormatter
		$item = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);

		// print_r($item);
	}else {
		echo "Nothing";
	}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<?php include('templates/header.php'); ?>

	<div class="container center">
		<div>
				<?php if($item): ?>
				<div class="col s6 md3">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h4><?php echo htmlspecialchars($item['item_name']); ?></h4>
							<p><?php  echo htmlspecialchars($item['item_description']); ?></p>
							<!-- <img src="<?php  echo $item['image']; ?>" alt="image of a product"> -->
						</div>
						<form action="#" class="card-action display="flex" flexDirection="row" ">
										Quantity:<input type="number" min=0 max="<?php echo htmlspecialchars($item['in_stock']); ?>"/>
										<input type="submit" name="submit" value="Add to Cart" class="btn brand">
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
