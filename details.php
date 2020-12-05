<?php
	include('config/db_connect.php');

	if (isset($_GET['item_id'])) {
	$item_id = $_GET['item_id'];

	$sql = "SELECT * from item_info WHERE item_id='".$item_id."'";

	$result = mysqli_query($conn, $sql);
	// $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$item = mysqli_fetch_assoc($result);
}

	// // check GET request item_id param
	// if (isset($_GET['item_id'])) {
	// 	// print_r($_GET['item_id']);
	// 	$item_id = mysqli_real_escape_string($conn, $_GET['item_id']);
	//
	// 	$sql = "SELECT * FROM item_info WHERE item_id = '".$item_id."'";
	//
	// 	// get the query result
	// 	$result = mysqli_query($conn, $sql);
	//
	// 	// fetch resuylt ion aray NumberFormatter
	// 	$item = mysqli_fetch_assoc($result);
	//
	// 	mysqli_free_result($result);
	// 	mysqli_close($conn);
	//
	// 	// print_r($item);
	// }else {
	// 	echo "Nothing";
	// }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<?php include('templates/header.php'); ?>

	<div class="container center">
	<?php if($item): ?>
		<h4><?php echo htmlspecialchars($item['item_name']); ?></h4>
		<p><?php  echo htmlspecialchars($item['item_description']); ?></p>
		<?php else: ?>
			<h5>No such Item exists!</h5>
		<?php endif; ?>
	</div>

  <?php include('templates/footer.php'); ?>
</html>
