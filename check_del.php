<?php
  include('config/db_connect.php');

	if(isset($_GET['buyer_id'])&& isset($_GET['item_id'])){
		$buyer_id = $_GET['buyer_id'];
    $item_id = $_GET['item_id'];

    $sql = "DELETE FROM added_to_cart WHERE buyer_id='".$buyer_id."' AND item_id='".$item_id."'";
    if (mysqli_query($conn, $sql)) {
      echo '<script type ="text/Javascript">alert("THE Item THAT YOU CHOSE TO DELETE, HAS BEEN REMOVED SUCCESSFULLY.");</script>';
    }
	}
?>
