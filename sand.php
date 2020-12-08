<?php
  include('s_start.php');
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sucess</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style media="screen">
      .brand{
        background: #137af9 !important;
      }
      .brand-text{
        color: #137af9 !important;
      }
    </style>
  </head>
  <body>
    <a href="dash.php?buyer_id=<?php echo $b_id?>" class="btn brand">Go Back</a>
    <?php include('templates/scripts.php') ?>
  </body>
</html>
