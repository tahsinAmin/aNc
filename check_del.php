<?php
  $link = include('config/db_connect.php');

  if(isset($_GET['buyer_id'])&& isset($_GET['item_id'])){
    $buyer_id = $_GET['buyer_id'];
    $item_id = $_GET['item_id'];

    $sql = "DELETE FROM added_to_cart WHERE buyer_id='".$buyer_id."' AND item_id='".$item_id."'";
    if (mysqli_query($conn, $sql)) {
      header("Location:checkout.php?buyer_id=".$buyer_id."");
    }
  }else if (isset($_GET['buyer_id']) && isset($_GET['visa_masterCard'])) {
    $buyer_id = $_GET['buyer_id'];
    $visa_masterCard = $_GET['visa_masterCard'];
    // echo "$buyer_id" ."<br/>";
    $sql="SELECT * FROM buyer_profile WHERE buyer_id = '".$buyer_id."'";
    $result = mysqli_query($conn, $sql);
    $buyer_info = mysqli_fetch_assoc($result);

    if ($visa_masterCard == $buyer_info['visa_masterCard']) {
      $sql2 = "SELECT * FROM added_to_cart";
      $result2 = mysqli_query($conn, $sql2);
      $item_ids = mysqli_fetch_all($result2, MYSQLI_ASSOC);


      foreach($item_ids as $item_id){
        $i = $item_id['item_id'];

        $sql3 =  "INSERT INTO sold_info(buyer_id, item_id, frequency) VALUES ($buyer_id, $i, 80)";
        $result3 = mysqli_query($conn, $sql3);
        if(!$result3){
          echo "Query Error: " . mysqli_error($conn);
        }
      }

      $sql3 = "DELETE FROM added_to_cart";
      if (mysqli_query($conn, $sql3)) {
        mysqli_close($conn);
        header("Location:dash.php?buyer_id=".$buyer_id."");
      }
    }
  } else if (isset($_GET['buyer_id'])) {
    $buyer_id = $_GET['buyer_id'];
    $sql = "DELETE FROM added_to_cart";
    if (mysqli_query($conn, $sql)) {
      session_unset();
      header("Location:index.php?");
    }
  }
?>
