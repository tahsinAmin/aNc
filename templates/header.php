<!-- C:\xampp\htdocs\arts -->
<!-- https://github.com/tahsinAmin/aNc.git -->


<head>
  <meta charset="utf-8">
  <title>Shop My Crafty Arts</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&family=Yellowtail&display=swap" rel="stylesheet"> <script src="https://kit.fontawesome.com/1b49d7e787.js"></script>
   <style media="screen">
     body{
       font-family: 'Roboto', sans-serif;
     }
     .brand{
       background: #137af9 !important;
     }
     .brand-text{
       color: #137af9 !important;
     }
     .brand-red{
       background: #f44336 !important;
     }
     form{
       max-width: 460px;
       margin: 20px auto;
       padding: 20px;
     }
     nav{
       position: fixed;
       top: 0;
       z-index: 1;
     }
     .dash-image{
        width: 100px;
        margin: 40px auto -30px;
        display: block;
        position: relative;
        top: -30px;
      }

      .det-image{
         width: 100%;
         height: 100%;
       }
       .dash{
         background-image: url('img/c.jpg');
         background-size: contain;
       }
       nav{
         padding: 0 40px;
       }
       .check{
         background-image: url('img/n.jpg');
         height: 100vh;
       }
       
   </style>
</head>
  <body class="">
    <nav class="white z-depth-0">
      <div class="">
        <a href="dash.php?buyer_id=<?php echo $buyer_id ?>" class="brand-logo brand-text" style="font-family: 'Yellowtail', cursive;">
          Shop My Crafty Arts
        </a>
        <ul id="nav-mobile" class="right hide-on-small-and-down">
          <li>
            <a href="checkout.php?buyer_id=<?php echo $_GET['buyer_id'] ?>"
             class="btn brand z-depth-0 pulse" style="background-color: #cbb09c !important;">
              Checkout
            </a>
          </li>
          <li>
            <a href="check_del.php?buyer_id=<?php echo $buyer_id ?>" class="btn brand-red z-depth-0">Log Out</a>
          </li>
        </ul>
      </div>
    </nav>
