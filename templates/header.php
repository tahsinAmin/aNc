<!-- C:\xampp\htdocs\arts -->
<!-- https://github.com/tahsinAmin/aNc.git -->
<!-- NOTE: WORK REMAIN
-->

<head>
  <meta charset="utf-8">
  <title>Arts&Crafts</title>
  <!-- Compiled and minified CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&family=Yellowtail&display=swap" rel="stylesheet"> <script src="https://kit.fontawesome.com/1b49d7e787.js"></script>
   <style media="screen">
     body{
       font-family: 'Roboto', sans-serif;
     }
     .brand{
       background: #009688 !important;
     }
     .brand-text{
       color: #009688 !important;
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
     .pizza{
        width: 100px;
        margin: 40px auto -30px;
        display: block;
        position: relative;
        top: -30px;
      }
   </style>
</head>
  <body class="grey lighten-4">
    <nav class="white z-depth-0">
      <div class="container">
        <a href="dash.php?buyer_id=<?php echo $buyer_id ?>" class="brand-logo brand-text" style="font-family: 'Yellowtail', cursive;">Arts&Crafts</a> // Work remain. Only goes iff the user is signed in
        <ul id="nav-mobile" class="right hide-on-small-and-down">
          <li>
            <a href="checkout.php?buyer_id=<?php echo $_GET['buyer_id'] ?>"
             class="btn brand z-depth-0" style="background-color: #cbb09c !important;">
              Checkout
            </a>
          </li>
          <li>
            <a href="check_del.php?buyer_id=<?php echo $buyer_id ?>" class="btn brand z-depth-0">Log Out</a>
          </li>
        </ul>
      </div>
    </nav>
