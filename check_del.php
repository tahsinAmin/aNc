<?php
  include('config/db_connect.php');

  if (isset($_GET['buyer_id']) && isset($_GET['visa_masterCard'])) {
    $buyer_id = $_GET['buyer_id'];
    $visa_masterCard = $_GET['visa_masterCard'];
    echo "$buyer_id" ."<br/>";
    $sql="SELECT * FROM buyer_profile WHERE buyer_id = '".$buyer_id."'";
    $result = mysqli_query($conn, $sql);
    $buyer_info = mysqli_fetch_assoc($result);

    echo "$visa_masterCard" ."<br/>";
    // echo "$buyer_info['visa_masterCard']" ."<br/>";
    print_r($buyer_info);
    echo "<br/>";



    if ($visa_masterCard == $buyer_info['visa_masterCard']) {

      $sql2 = "SELECT added_to_cart.item_id AS item_ids FROM added_to_cart";
      $result2 = mysqli_query($conn, $sql2);
      $item_ids = mysqli_fetch_all($result2, MYSQLI_ASSOC);
      mysqli_free_result($result2);
      // print_r($buyer_info);
      // echo "<br/>";
      // print_r($item_ids);
      // echo "<br/>";
      //

      $sql2 = "DELETE FROM added_to_cart";

      foreach($item_ids as $item_id){

        // print_r($item_id);
        // echo "<br/>";
         $sql3 =  "INSERT INTO sold_info(buyer_id, item_id, profit_gain) VALUES ($buyer_id, $item_id, 80)";

         if(mysqli_query($conn, $sql3)){
         }else{
           echo "Query Error: " . mysqli_error($conn);
          }
      }
    }else{
      echo "Error";
    }
    echo "$buyer_id";
    // mysqli_close($conn);
    // header("Location:dash.php?buyer_id=".$buyer_id."");
  } else if (isset($_GET['buyer_id'])) {
    $buyer_id = $_GET['buyer_id'];
    $sql = "DELETE FROM added_to_cart";
    if (mysqli_query($conn, $sql)) {
      header("Location:index.php?");
    }
  }

	if(isset($_GET['buyer_id'])&& isset($_GET['item_id'])){
		$buyer_id = $_GET['buyer_id'];
    $item_id = $_GET['item_id'];

    $sql = "DELETE FROM added_to_cart WHERE buyer_id='".$buyer_id."' AND item_id='".$item_id."'";
    if (mysqli_query($conn, $sql)) {
      header("Location:checkout.php?buyer_id=".$buyer_id."");
    }
	}
?>
